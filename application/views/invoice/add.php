<div class="col-md-12">
   <div class="card">
      <div class="card-header">
         <h4 class="card-title">Tìm khách hàng</h4>
          <div class="row">
               <div class="col-md-12 ">
                  <div class="form-group">
                    <input type="text" name ="search_text" id ="search_text" class="form-control input-sm" maxlength="64" placeholder="Search" value="" />

                   
                  </div>
               </div>
            </div>  
      </div>
      <div class="card-body">
      </div>
   </div>
</div>


<div class="col-md-12">
   <div class="card">
      <div class="card-header">
         <h4 class="card-title">Khách hàng</h4>
      </div>
      <div class="card-body">
         <?php
            $success_msg= $this->session->flashdata('success_msg');
            $error_msg= $this->session->flashdata('error_msg');
            
            ?>
         <?php  if($success_msg){ ?>
         <div class="alert alert-success">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
            <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>
            <b> Thành Công - </b> <?php echo $success_msg; ?></span>
         </div>
         <?php  }
            if($error_msg){
                 ?>   
         <div class="alert alert-danger">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
            <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>
            <b> Lỗi - </b> <?php echo $error_msg; ?></span>
         </div>
         <?php } ?>
         <form action="<?php echo base_url();?>customer/add" method ="post">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="form-group">
                     <label>Họ tên(*)</label>
                     <input type="text" class="form-control" name ="fullname" id ="fullname" placeholder="Gemma Spa" value="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 pr-1">
                  <div class="form-group">
                     <label>Phone</label>
                     <input type="text" class="form-control" name ="phone" id ="phone" placeholder="Phone" value="">
                  </div>
               </div>
               <div class="col-md-6 pl-1">
                  <div class="form-group">
                     <label for="exampleInputEmail1">Email address</label>
                     <input type="email" class="form-control" placeholder="Email" name ="email" id ="email">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Địa chỉ</label>
                     <input type="text" class="form-control" placeholder="327 Nguyễn Thiện Thuật Quận 3" value="" name ="address" id ="address">
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
         </form>
      </div>
   </div>
</div>
<div class="col-md-12">
   <div class="card">
      <div class="card-header">
         <h4 class="card-title">Dịch vụ</h4>
         <div class="row">
            <div class="col-md-6">
                 <label>Loại dịch vụ</label>
                 <select class="form-control" id="service">
                     <?php
                      foreach($services as $row)
                      {
                       
                        echo '<option value ="'.$row['id'].'" >'.$row['name'].' ('.number_format($row['price'], 0, ',', ',').')</option>';
                       
                      }
                      ?>      
                   
                  </select>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" name ="qty" id ="qty" class="form-control input-sm number"  style="width:100px" maxlength="64" placeholder="Số lượng" value="1" />
                   
                    
                 </div>
            </div>                         
             <div class="col-md-2">
                    <button type="button" id="add-service" name="add-service" style="margin-top: 25px" class="btn btn-info btn-fill pull-left" onclick="selected_service()">Thêm</button> 
            
               </div>
         </div>

 
      </div>
      <div class="card-body">
                 <div class="card-body table-full-width table-responsive">
                     <table class="table table-hover table-striped">
                        <thead>                           
                            <th>Dịch vụ</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành Tiền</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody id ="content-table">
                           
                        </tbody>
                    </table>
                    <div class="row hide" id ="show-total" > 
                        <div class="col-md-12">
                                <h4  class="card-title">Tổng tiền: <span id="show-money"> </span> đ</h4>
                       </div>
                    </div>

                    <button type="button" onclick="show_confim()" class="btn btn-info btn-fill pull-right">Lập hóa đơn</button>
                                        <div class="clearfix"></div>
                 </div>


      </div>
   </div>
</div>

<script type="text/javascript">

var services_list = <?php echo json_encode($services) ?>;
var services_selected = [];
var total_money = 0;
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function show_confim() {
   var fullname = $("#fullname").val();
   if(fullname.trim().length ==0){
      swal("Lỗi!", "Tên khách hàng không được bỏ trống", "warning");
        return; 
   }
   
   swal({
        title: "Xác nhận hóa đơn",
        text: "Bạn có chắc thông tin hóa đơn đã chính xác?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            var list_post_service =[];
             for(var i = 0; i<services_selected.length; i++){
               var obj ={
                  id: services_selected[i].id,
                  qty: services_selected[i].qty,
                  price: services_selected[i].service.price,
                  name: services_selected[i].service.name,
                  type: services_selected[i].service.type,
                  total: Number(services_selected[i].service.price)*Number(services_selected[i].qty)

               }
               debugger;
               list_post_service.push(obj);
             }
            var dataPost = {
                  customer:{
                     id:1,
                     fullname:$("#fullname").val(),
                     phone:$("#phone").val(),
                     email:$("#email").val(),
                     address: $("#address").val()
                  },
                  services: list_post_service,
                  total: total_money
               }
            $.ajax({
                 url: "<?php echo base_url();?>invoice/makeinvoice",
                 type: "post",
                 data: dataPost ,
                 success: function (response) {
                    // you will get response from your php page (what you echo or print)  
                    console.log(response)               

                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                 }


    });
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
}
function caculatorMoney(){

   total_money = 0;
    for(var i = 0; i<services_selected.length; i++){
         if(services_selected[i].service.type == "khuyenmai"){
            total_money = total_money - Number(services_selected[i].qty)*Number(services_selected[i].service.price);
         }else{
             total_money = total_money + Number(services_selected[i].qty)*Number(services_selected[i].service.price);
         }
        
    }
     if(total_money < 0)
            total_money = 0;
      
      if(total_money >= 0 && services_selected.length > 0 ){
         $('#show-total').show()
      }else{
         $('#show-total').hide();
      }
      $('#show-money').html(numberWithCommas(total_money));
}

function tableCreate() {
  
    var open_tr ="<tr>";
    var oclose_tr ="</tr>";
    var res ="";
    for(var i = 0; i<services_selected.length; i++){
        var row ="<tr>"+
                    "<td>"+services_selected[i].service.name+"</td>" +
                    "<td>"+services_selected[i].qty+"</td>" +
                    "<td>"+numberWithCommas(services_selected[i].service.price)+" đ</td>" +
                    "<td>"+ numberWithCommas(services_selected[i].total) +" đ</td>" +
                    "<td><a href='javascript:void(0)' onclick = 'show_delete("+services_selected[i].id+")' class='btn btn-danger btn-xs'>"+
                         "<span class='glyphicon glyphicon-remove'></span>Del</a>"+
                    "</td>" +
                "</tr>";

        res =res +row;        
    }
    $("#content-table").html(res);

}


function show_delete(id){
  

    for( var i = 0; i < services_selected.length; i++){ 
           if ( services_selected[i].id == id) {
                services_selected.splice(i, 1); 
                break;
           }
   }
   caculatorMoney();
   tableCreate();
}
function selected_service(){

    var qty = $("#qty").val();
    var obj =  {};
    var service_id = $("#service").val();
   
    for( var i =0;i< services_list.length;i++){

        if(services_list[i].id == service_id){           
            obj = services_list[i];
            break;
        }

    }
    var find = false;
    for( var i =0;i< services_selected.length;i++){

        if(services_selected[i].id == service_id){
            find = true;
            break;
        }

    }
   
    if(qty <= 0){
        swal("Lỗi!", "Xin vui lòng chọn số lượng", "warning");
        return;
    }
   
    if(find){
        swal("Lỗi!", "Dịch vụ này đã được thêm vào rồi", "warning");
        return;
    }else {
        var objAdd = {
            id:service_id,
            service:obj,
            qty:qty,
            total: obj.price*qty
        }
        services_selected.push(objAdd);
        caculatorMoney();
        tableCreate();

    }


   // alert(qty +" "+service_id)
}
$(document).ready(function () {

 $('#show-total').hide();
      var options = {

            url: function(phrase) {
                 return "<?php echo base_url();?>customer/ajax";
            },

             getValue: function(element) {
               return element.fullname;
             },
            template: {
                      type: "description",
                      fields: {
                          description: "phone"
                      }
                  },

             ajaxSettings: {
                  dataType: "json",
                  method: "POST",
                  data: {
                    dataType: "json"
                  }
             },

            preparePostData: function(data) {
                data.search = $("#search_text").val();
                return data;
            },

            list: {
                 onClickEvent: function() {
                     var id = $("#search_text").getSelectedItemData().id;
                     $.post( "<?php echo base_url();?>customer/ajaxcust", { id: id })
                       .done(function( data ) {
                           console.log(data);
                          $("#fullname").val(data.fullname);
                          $("#phone").val(data.phone);
                          $("#email").val(data.email);
                          $("#address").val(data.address);
                       });
                             
                  }
            },

         requestDelay: 400
    };
     
    $("#search_text").easyAutocomplete(options);
    jQuery('input.number').keyup(function(event) {

      // skip for arrow keys
      if(event.which >= 37 && event.which <= 40) return;

      // format number
      jQuery(this).val(function(index, value) {
        return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        ;
      });
    });


});
    
</script>