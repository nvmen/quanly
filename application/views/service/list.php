<div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
        <div class="card-header ">
            <h4 class="card-title">Danh sách dịch vụ</h4> 
            <div class="col-md-12">   
            <a class=" pull-right btn btn-info btn-fill btn-wd"  href="<?php echo base_url();?>/service/add">
                Thêm
            </a>   
            </div>                          
        </div>
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <th>ID</th>
                    <th>Tên dịch vụ</th>
                    <th>Giá</th>
                    <th>Loại</th>                   
                    <th class="text-center">Action</th>
                </thead>
                <tbody>

                     <?php
                      foreach($services as $row)
                      {
                      	$type = "Thường";
                      	if($row['type'] =="khuyenmai"){
							$type = "Khuyến mãi";
                      	}
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['name'].'</td>';
                        echo '<td>'. number_format($row['price'], 0, ',', ',') .' đ</td>';
                        echo '<td>'.$type.'</td>';
                        echo '<td class="text-center">                                               
                        
                            <a class="btn btn-info btn-xs" href="'.base_url("service").'/update/'.$row['id'].'"><span class="glyphicon glyphicon-edit"></span> Sửa</a> 
                            <a href="javascript:void(0)" onclick = "show_delete('.$row['id'].')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Xóa</a></td>

                        </td>';
                        echo '</tr>';
                      }
                      ?>      

                   
                </tbody>
            </table>
            
            </div>
            
        </div>
    </div>
</div>

 <form action="<?php echo base_url();?>service/delete" method ="post" id="frm-delete">
    <input type="hidden" name ="id" id ="id" value="">
    <input type="hidden" name ="current_url" id ="current_url" value="">
   
</form>

<script>
    function show_delete(id){
        swal({
              title: "Xác nhận",
              text: "Bạn muốn xóa dịch vụ này?",
              icon: "warning",
              buttons: [
                'Hủy!',
                'Đồng ý!'
              ],
              dangerMode: true,
            }).then(function(isConfirm) {
              if (isConfirm) {
                // delete  chổ này
                $("#id").val(id);
                $("#current_url").val(window.location.href );
                $('form#frm-delete').submit();
              } 
            })
    }
</script>    