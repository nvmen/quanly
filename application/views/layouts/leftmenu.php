<?php
    $active_left_menu = $this->session->flashdata('active_left_menu');
   

?>

  <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://gemmaspa.vn" class="simple-text">
                        Gemma spa
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item <?php if($active_left_menu=="dashboard") echo "active";?> ">
                        <a class="nav-link" href="<?php echo base_url();?>dashboard">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item  <?php if($active_left_menu=="customer") echo "active";?>">
                        <a class="nav-link" href="<?php echo base_url();?>customer">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Khách hàng</p>
                        </a>
                    </li>
                    <li class="nav-item   <?php if($active_left_menu=="service") echo "active";?>">
                        <a class="nav-link" href="<?php echo base_url();?>service">
                            <i class="nc-icon nc-notes"></i>
                            <p>Danh mục</p>
                        </a>
                    </li>
                    <li class="nav-item <?php if($active_left_menu=="invoice") echo "active";?>">
                        <a class="nav-link" href="<?php echo base_url();?>invoice">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Hóa đơn</p>
                        </a>
                    </li>                  
                   
                </ul>
</div>
