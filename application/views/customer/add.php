   <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thông tin khách hàng</h4>
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
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Thêm</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
						