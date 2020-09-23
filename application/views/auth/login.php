<!DOCTYPE html>
<html lang="en">
<head>
    <title>Video Content Provider - CMS - CNN Indonesia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url('asset/tlogin/images/tm-logo.jpeg')?>"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/tlogin/vendor/bootstrap/css/bootstrap.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/tlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/tlogin/vendor/animate/animate.css')?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/tlogin/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/tlogin/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/tlogin/css/util.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/tlogin/css/main.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/sweetalert/dist/sweetalert.css')?>">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo base_url('asset/tlogin/images/trans-logo.png')?>" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post" id="form-login">
                    <span class="login100-form-title">
                        Please Login
                    </span>

                    <div class="text-center p-t-5" id="message"></div>
                    
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

                    <div class="text-center p-t-5">
                        <input type="checkbox" name="remember_me"/>
                        <span class="txt3">
                            Remember me
                        </span> 
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <a href="#" id="btn-login" class="login100-form-btn" onclick="login()">Login</a>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="forgot_pass.php">
                            Password?
                        </a>
                    </div>

                    <div class="text-center p-t-115 p-b-10"></div>
                </form>
            </div>
        </div>
    </div>
    
<!--===============================================================================================-->  
    <script src="<?php echo base_url('asset/tlogin/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('asset/tlogin/vendor/bootstrap/js/popper.js')?>"></script>
    <script src="<?php echo base_url('asset/tlogin/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('asset/tlogin/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('asset/tlogin/vendor/tilt/tilt.jquery.min.js')?>"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="<?php echo base_url('asset/tlogin/js/main.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/sweetalert/dist/sweetalert.min.js')?>"></script>
    <script type="text/javascript">
        function login(){
            $.ajax({
                url:"<?php echo base_url('auth/login')?>",
                type:"POST",
                data:$('#form-login').serialize(),
                dataType: "JSON",
                beforeSend: function(){
                    $('#btn-login').attr("disabled", true);
                },
                success: function(data){
                    if(!data.status) showAlert(data.message);
                    else window.location = data.url;
                },
                error: function (jqXHR, textStatus, errorThrown){
                    alert(jqXHR+" "+textStatus+" "+errorThrown);
                },
                complete: function(){
                    $('#btn-login').removeAttr("disabled");
                }
            });
        }
        function showAlert(text){
            text = text.toString();
             swal('Login Failure',text.replace(/<[^>]*>/g, ''),'error');
        }
    </script>
</body>
</html>