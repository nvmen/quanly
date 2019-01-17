   <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thông tin dịch vụ</h4>
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
                                    <form action="" method ="post">

                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Tên dịch vụ(*)</label>
                                                    <input type="hidden"  name ="id" id ="id"  value="<?php echo $info['id'] ?>">
                                                    <input type="text" class="form-control" name ="name" id ="name" placeholder="Dịch vụ tắm trắng" value="<?php echo $info['name'] ?>">
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Giá</label>
                                                    <input type="text" class="form-control number" name ="price" id ="price" placeholder="Giá" value="<?php echo number_format($info['price'], 0, ',', ','); ?>">
                                                </div>
                                            </div>                                           
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Loại dịch vụ </label>
                                                   <select class="form-control" name="type" id ="type">
                                                      <option value="thuong" <?php if($info['type']=="thuong") echo "selected" ;?> > Thường </option>
                                                      <option value="khuyenmai" <?php if($info['type']=="khuyenmai") echo "selected" ;?> >Khuyến mãi </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Cập nhật</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
						

  <script type="text/javascript">

    jQuery( document ).ready(function() {
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