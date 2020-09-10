<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href={{asset("admin/login/images/icons/favicon.ico")}}/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/vendor/bootstrap/css/bootstrap.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/fonts/iconic/css/material-design-iconic-font.min.css")}} >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/vendor/animate/animate.css")}} >
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/vendor/css-hamburgers/hamburgers.min.css")}} >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/vendor/animsition/css/animsition.min.css")}} >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/vendor/select2/select2.min.css")}} >
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/vendor/daterangepicker/daterangepicker.css")}} >
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/css/util.css")}} >
	<link rel="stylesheet" type="text/css" href={{asset("admin/login/css/main.css")}} >
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('public/admin/login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="{{route('auth.loginadmin')}}" method="POST" >
					@csrf
					<span class="login100-form-logo">
						<img style="width:70px;" src="http://sellphone.com:8080/user/img/logo.png" alt="">
					</span>

					<span  class="login100-form-title p-b-34 p-t-27">
						ADMIN
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
						
					</div>
					@if( $errors->has('email'))
	            			<p style ="color: #B40404;">{{$errors->first('email')}}</p>
	        		@endif

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
						
					</div>
					@if( $errors->has('password'))
	            			<p style ="color: #B40404;">{{$errors->first('password')}}</p>
	        		@endif

					<div class="container-login100-form-btn">
						<button style="font-family: sans-Serif" type="submit" class="login100-form-btn">
							Đăng nhập
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src={{asset("admin/login/vendor/jquery/jquery-3.2.1.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("admin/login/vendor/animsition/js/animsition.min.js")}} ></script>
<!--===============================================================================================-->
	<script src={{asset("admin/login/vendor/bootstrap/js/popper.js")}} ></script>
	<script src={{asset("admin/login/vendor/bootstrap/js/bootstrap.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("admin/login/vendor/select2/select2.min.js")}} ></script>
<!--===============================================================================================-->
	<script src={{asset("admin/login/vendor/daterangepicker/moment.min.js")}} ></script>
	<script src={{asset("admin/login/vendor/daterangepicker/daterangepicker.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("admin/login/vendor/countdowntime/countdowntime.js")}} ></script>
<!--===============================================================================================-->
	<script src={{asset("admin/login/js/main.js")}} src="js/main.js"></script>

</body>
</html>