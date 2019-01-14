<!DOCTYPE html>
<html lang="en">
<head>
	<title>Gemma Spa Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://w-dog.net/wallpapers/13/15/424349176683935/spa-orchid-flower-stones-candle-cinnamon-bamboo.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  method="post" action="<?php echo base_url('user/login_user'); ?>">
					<span class="login100-form-logo">
						
						<img src="http://gemmaspa.vn/wp-content/uploads/2019/01/LOGO-SPA-1.png" width="60" height="60">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					 <?php
			              $success_msg= $this->session->flashdata('success_msg');
			              $error_msg= $this->session->flashdata('error_msg');

			                  if($success_msg){
			                    ?>
			                    <div class="alert alert-success">
			                      <?php echo $success_msg; ?>
			                    </div>
			                  <?php
			                  }
			                  if($error_msg){
			                    ?>
			                    <div class="alert alert-danger">
			                      <?php echo $error_msg; ?>
			                    </div>
			                    <?php
			                  }
				     ?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="user_email" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password"name="user_password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>public/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>public/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>public/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>public/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>public/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>public/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>public/js/main.js"></script>

</body>
</html>