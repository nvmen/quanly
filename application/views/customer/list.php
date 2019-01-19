
<div class="col-md-12">
    <div class="card strpied-tabled-with-hover">
        <div class="card-header ">
            <h4 class="card-title">Danh sách khách hàng</h4> 
             <form  action="<?php echo $search_url?>" method ="POST">
            <div class="search">
               
               <input type="text" name ="search_text" id ="search_text" class="form-control input-sm" maxlength="64" placeholder="Search" value="<?php echo  $search_text ?>" />
                <button type="submit" name="submit" class="btn btn-search btn-info btn-fill pull-right">Search</button>
            </div> 
             </form>
            <div class="search">   
            <a class=" pull-right btn btn-info btn-fill btn-wd"  href="<?php echo base_url();?>customer/add">
                Thêm
            </a>   
            </div>                          
        </div>
        <div class="card-body table-full-width table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>

                     <?php
                      foreach($customers as $row)
                      {
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['fullname'].'</td>';
                        echo '<td>'.$row['phone'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['address'].'</td>';
                      
                        echo '<td class="text-center">                                               
                        
                            <a class="btn btn-info btn-xs" href="'.base_url("customer").'/update/'.$row['id'].'"><span class="glyphicon glyphicon-edit"></span> Sửa</a> 
                            <a href="javascript:void(0)" onclick = "show_delete('.$row['id'].')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Xóa</a></td>

                        </td>';
                        echo '</tr>';
                      }
                      ?>      

                   
                </tbody>
            </table>
            <div class="col-md-12">
                      <?php echo $pagination->create_links(); ?>

               </div>
            </div>
            
        </div>
    </div>
</div>

 <form action="<?php echo base_url();?>customer/delete" method ="post" id="frm-delete">
    <input type="hidden" name ="id" id ="id" value="">
    <input type="hidden" name ="current_url" id ="current_url" value="">
   
</form>


<script>
    function show_delete(id){
        swal({
              title: "Xác nhận",
              text: "Bạn muốn xóa khách hàng này?",
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