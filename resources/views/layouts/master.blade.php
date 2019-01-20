<!DOCTYPE html>
<html lang="en">
<head>
<title>Unistadt - {{ $title }}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ url('styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ url('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('styles/responsive.css') }}">
<style>

.popupContainer {
		position: absolute;
		width: 330px;
		height: auto;
		left: 45%;
		top: 60px;
		background: #FFF;
}
.btn {
		padding: 10px 20px;
		background: #F4F4F2;
}

.btn_red {
		background: #ED6347;
		color: #FFF;
}

.btn:hover {
		background: #E4E4E2;
}

.btn_red:hover {
		background: #C12B05;
}

a.btn {
		color: #666;
		text-align: center;
		text-decoration: none;
}

a.btn_red {
		color: #FFF;
}

.one_half {
		width: 50%;
		display: block;
		float: left;
}

.one_half.last {
		width: 45%;
		margin-left: 5%;
}
/* Popup Styles*/

.popupHeader {
		font-size: 16px;
		text-transform: uppercase;
}

.popupHeader {
		background: #F4F4F2;
		position: relative;
		padding: 10px 20px;
		border-bottom: 1px solid #DDD;
		font-weight: bold;
}

.popupHeader .modal_close {
		position: absolute;
		right: 0;
		top: 0;
		padding: 10px 15px;
		background: #E4E4E2;
		cursor: pointer;
		color: #aaa;
		font-size: 16px;
}

.popupBody {
		padding: 20px;
}
/* Social Login Form */

.social_login {}

.social_login .social_box {
		display: block;
		clear: both;
		padding: 10px;
		margin-bottom: 10px;
		background: #F4F4F2;
		overflow: hidden;
}

.social_login .icon {
		display: block;
		width: 10px;
		padding: 5px 10px;
		margin-right: 10px;
		float: left;
		color: #FFF;
		font-size: 16px;
		text-align: center;
}

.social_login .fb .icon {
		background: #3B5998;
}

.social_login .google .icon {
		background: #DD4B39;
}

.social_login .icon_title {
		display: block;
		padding: 5px 0;
		float: left;
		font-weight: bold;
		font-size: 16px;
		color: #777;
}

.social_login .social_box:hover {
		background: #E4E4E2;
}

.centeredText {
		text-align: center;
		margin: 20px 0;
		clear: both;
		overflow: hidden;
		text-transform: uppercase;
}

.action_btns {
		clear: both;
		overflow: hidden;
}

.action_btns a {
		display: block;
}
/* User Login Form */

.user_login {
		display: none;
}

.user_login label {
		display: block;
		margin-bottom: 5px;
}

.user_login input[type="text"],
.user_login input[type="email"],
.user_login input[type="password"] {
		display: block;
		width: 90%;
		padding: 10px;
		border: 1px solid #DDD;
		color: #666;
}

.user_login input[type="checkbox"] {
		float: left;
		margin-right: 5px;
}

.user_login input[type="checkbox"]+label {
		float: left;
}

.user_login .checkbox {
		margin-bottom: 10px;
		clear: both;
		overflow: hidden;
}

.forgot_password {
		display: block;
		margin: 20px 0 10px;
		clear: both;
		overflow: hidden;
		text-decoration: none;
		color: #ED6347;
}
/* User Register Form */

.user_register {
		display: none;
}

.user_register label {
		display: block;
		margin-bottom: 5px;
}

.user_register input[type="text"],
.user_register input[type="email"],
.user_register input[type="password"] {
		display: block;
		width: 90%;
		padding: 10px;
		border: 1px solid #DDD;
		color: #666;
}

.user_register input[type="checkbox"] {
		float: left;
		margin-right: 5px;
}

.user_register input[type="checkbox"]+label {
		float: left;
}

.user_register .checkbox {
		margin-bottom: 10px;
		clear: both;
		overflow: hidden;
}
</style>
@yield('after_style')
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
    @include('layouts.inc.header')

	@yield('content')

	<!-- Footer -->
    @include('layouts.inc.footer')

</div>

<script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ url('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ url('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ url('plugins/easing/easing.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>
<script src="https://andwecode.com/wp-content/uploads/2015/10/jquery.leanModal.min_.js"></script>
<script>
	// Plugin options and our code
	$("#modal_trigger").leanModal({
		top: 100,
		overlay: 0.6,
		closeButton: ".modal_close"
	});

	$(function() {
		// Calling Login Form
		$("#login_form").click(function() {
				$(".social_login").hide();
				$(".user_login").show();
				return false;
		});

		// Calling Register Form
		$("#register_form").click(function() {
				$(".social_login").hide();
				$(".user_register").show();
				$(".header_title").text('Register');
				return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function() {
				$(".user_login").hide();
				$(".user_register").hide();
				$(".social_login").show();
				$(".header_title").text('Login');
				return false;
		});
	});
</script>
@yield('after_script');
</body>

</html>