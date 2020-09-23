<!DOCTYPE html>
<html lang="en">
<head>
	<title>CMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/tlogin/images/icons/cnn-logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/tlogin/vendor/bootstrap/css/bootstrap.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/tlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/tlogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/tlogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/tlogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/tlogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/tlogin/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/tlogin/images/cnn-logo.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="cek_login.php">
					<span class="login100-form-title">
						Please Login
					</span>

					<?php 
				        if(isset($_GET["login_error"])){
				            echo "<h5 style='color:red';>NIK atau Password salah</h5>";
				        }
				    ?>

					<!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz"> -->
					<div class="wrap-input100 validate-input" data-validate = "Valid NIK is required">
						<input class="input100" type="text" name="nik" placeholder="NIK">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<!-- <div class="wrap-input100"> -->
						<div class="text-center p-t-5">
							<input type="checkbox" name="remember_me"/>
							<span class="txt3">
								Remember me
							</span> 
						</div>
                    <!-- </div> -->
					
					<div class="container-login100-form-btn">
						<!-- <a href="users/uploader/up_video.php" class="login100-form-btn">
							Login
						</a> -->
						<button class="login100-form-btn" type="submit" name="commit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgot_pass.php">
							Password?
						</a>
					</div>

					<div class="text-center p-t-115 p-b-10">
						<!-- <a class="txt2" href="register.html">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> -->
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="assets/tlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/tlogin/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/tlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/tlogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/tlogin/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/tlogin/js/main.js"></script>

</body>
</html>