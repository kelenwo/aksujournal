<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url();?>style/login/images/icons/favicon.ico"/>
	<link href="<?php echo base_url(); ?>theme/assets/css/font-awesome.min.css" rel="stylesheet" />

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link href="<?php echo base_url(); ?>theme/assets/css/font-awesome.min.css" rel="stylesheet" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/s3ktyle/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>style/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>/style/login/images/bg-01.jpg');">
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

					<div class="wrap-input100 validate-input" data-validate = "Enter Reg No">
						<input class="input100" style="margin-left: 45px;" type="text" name="reg" placeholder="Registration Number">
						<span class="focus-input100"  data-placeholder="Reg No: &nbsp;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" style="margin-left: 45px;" type="password" name="password" placeholder="Code">
						<span class="focus-input100" data-placeholder="Code"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="btn btn-primary" id="get-code">
							Get Code <i class="fa fa-gear fa-spin" id="loading"></i>
						</button> &nbsp;&nbsp; | &nbsp;&nbsp;
							<button class="login100-form-btn">
							Login
						</button>
					</div>

				</div>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/style/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/style/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/style/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>/style/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/style/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/style/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>/style/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/style/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>/style/login/js/main.js"></script>
	<script>
	$(document).ready(function(){
	$('#loading').hide();
	$("#get-code").click(function() {
	$('#loading').show();
	$.ajax({
	url: "<?php echo base_url()."admin/get_biodata";?>",
	type: "POST",
	data: $('#get_student').serialize(),
	success:function(data){
	$('#loading').hide();

	$("#bio-content").html(data);

	}
	});

	});
	});
	</script>
</body>
</html>
