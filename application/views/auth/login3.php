<!DOCTYPE html>
<html lang="en">

<head>
	<title>Video Content Transmedia</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('asset/Login/images/icons/favicon.ico') ?>" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>"> -->
	<link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/fonts/iconic/css/material-design-iconic-font.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/vendor/animate/animate.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/vendor/animsition/css/animsition.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/vendor/select2/select2.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/vendor/daterangepicker/daterangepicker.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/Login/css/main.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/sweetalert/sweetalert.css') ?>">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('asset/Login/images/bg2.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" id="form-login">
					<img src="https://upload.wikimedia.org/wikipedia/commons/0/09/TransMedia.svg" alt="Girl in a jacket" width="400" height="60">
					<span class="login100-form-title ">
						Video Content
					</span>
					<h4 style="text-align: center; color:#3366e8; font-weight: bold;">
						Sharing Media
					</h4>
					<div class="text-right p-t-8 p-b-31">
						<!-- <a href="<?php echo base_url('auth/page404') ?>">
							Forgot password?
						</a> -->
					</div>
					<div class="wrap-input100 validate-input" data-validate="Valid username is required">
						<span class="label-input100"><b>Username</b></span>
						<input class="input100" type="text" name="username" placeholder="Insert your username">
						<span class="focus-input100" data-symbol=""></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100"><b>Password</b></span>
						<input class="input100" type="password" name="pass" placeholder="*********">
						<span class="focus-input100" data-symbol=""></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						<!-- <a href="<?php echo base_url('auth/page404') ?>">
							Forgot password?
						</a> -->
					</div>
					<div class="flex-col-c p-t-155">
						<!-- <span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="<?php echo base_url('auth/page404') ?>">
							Sign Up
						</a> -->
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button href="#" id="btn-login" class="login100-form-btn" onclick="login()" type="button">
								Login
							</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/Login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>

	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/Login/vendor/animsition/js/animsition.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/Login/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?php echo base_url('asset/Login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/Login/vendor/select2/select2.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/Login/vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('asset/Login/vendor/daterangepicker/daterangepicker.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/Login/vendor/countdowntime/countdowntime.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/Login/js/main.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('asset/sweetalert/sweetalert.min.js') ?>"></script>
	<script type="text/javascript">
		function login() {
			$.ajax({
				url: "<?php echo base_url('auth/login') ?>",
				type: "POST",
				data: $('#form-login').serialize(),
				dataType: "JSON",
				beforeSend: function() {
					$('#btn-login').attr("disabled", true);
				},
				success: function(data) {
					if (!data.status) showAlert(data.message);
					else window.location = data.url;
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(jqXHR + " " + textStatus + " " + errorThrown);
				},
				complete: function() {
					$('#btn-login').removeAttr("disabled");
				}
			});
		}

		function showAlert(text) {
			text = text.toString();
			swal('Login Failure', text.replace(/<[^>]*>/g, ''), 'error');
		}
	</script>

</body>

</html>