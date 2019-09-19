<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?></title>
		<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/util.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/vendor/main.css">
	</head>
	<body background="<?php echo base_url()?>assets/img/background.jpg" style="color: black;">

		<div class="limiter">
			<div class="container-login100" >
				<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<form action="<?php echo site_url('c_login/ceklogin')?>" method="POST">
						<span class="login100-form-title p-b-49">
							Login
						</span>
						<?php if($error = $this->session->flashdata('info')): ?>
								<div class="form-group">
									<div class="col-md-12">
										<div class="alert alert-dismissible alert-danger">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<?php echo $error ?>
										</div>
									</div>
								</div>
								<?php endif ?>
						<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
							<span class="label-input100">Username</span>
							<input class="input100" type="text" name="user" placeholder="Type your username" required="">
							<!-- <span class="focus-input100" data-symbol="&#xf206;"></span> -->

						</div>
						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="pass" placeholder="Type your password" required="">
							<!-- <span class="focus-input100" data-symbol="&#xf190;"></span> -->
						</div>
						<div>
						</div>	
						<br>			
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button  type="submit" name="login" class="login100-form-btn" value="login">
									Login
								</button>
							</div>
						</div>
						<br>
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button  type="reset" name="reset" class="login100-form-btn" value="reset">
									Reset
								</button>
							</div>
						</div>	
					</form>
				</div>
			</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url()?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/animsition/js/animsition.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/select2/select2.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/daterangepicker/moment.min.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/countdowntime/countdowntime.js"></script>
		<script src="<?php echo base_url()?>assets/vendor/js/main.js"></script>
	</body>
</html>