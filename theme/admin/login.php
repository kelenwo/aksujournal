<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="style/login/images/icons/favicon.ico"/>
	<link href="theme/assets/css/font-awesome.min.css" rel="stylesheet" />

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link href="theme/assets/css/font-awesome.min.css" rel="stylesheet" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/s3ktyle/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="style/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('style/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>

													 <div class="panel-body">
															 <?php if(!empty(validation_errors())) { ?><div class="alert alert-danger alert-dismissable">
											 <button type="button" class="close" data-dismiss="alert"
											 aria-hidden="true">
											 &times;
											 </button>
											 Error ! <?php echo validation_errors(); ?>
											</div> <?php } ?>
				<div class="login100-form validate-form p-b-33 p-t-5">
<form id="logins">
					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" style="margin-left: 45px;" type="text" name="email" placeholder="Email Address">
						<span class="focus-input100"  data-placeholder="Email: &nbsp;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" style="margin-left: 45px;" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">

							<button type="button" class="login100-form-btn" id="login">
							Login <i class="fa fa-gear fa-spin" id="loading"></i>
						</button>
					</div>
</form>
				</div>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="/style/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/style/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/style/login/vendor/bootstrap/js/popper.js"></script>
	<script src="/style/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/style/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/style/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="/style/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/style/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/style/login/js/main.js"></script>
	<script>
	$(document).ready(function(){
	$('#loading').hide();
	$("#login").click(function() {
	$('#loading').show();
	$.ajax({
	url: "<?php echo base_url()."ucp/login/logins";?>",
	type: "POST",
	data: $('#logins').serialize(),
	success:function(data){
	$('#loading').hide();
if(data=='true') {
	alert('Login Successfully');
	window.location.href = "<?php echo base_url()."ucp/manage";?>";
} else {
	alert(data);
}
	}
	});

	});
	});
	</script>
</body>
</html>
