<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $title;?></title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="<?php echo base_url(); ?>theme/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="<?php echo base_url(); ?>theme/assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
<link href="<?php echo base_url(); ?>theme/assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->

    <link href="<?php echo base_url(); ?>theme/assets/css/style.css" rel="stylesheet" />
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
    <!--  Jquery Core Script -->
    <script src="<?php echo base_url(); ?>theme/assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="<?php echo base_url(); ?>theme/assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts -->
         <script src="<?php echo base_url(); ?>/theme/assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="<?php echo base_url(); ?>/theme/assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts -->
    <script src="<?php echo base_url(); ?>/theme/assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts -->
         <script src="<?php echo base_url(); ?>/theme/assets/js/custom.js"></script>
</head>
<body >
  <div class="navbar navbar-inverse " id="menu">
         <div class="container-fluid">
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <a class="navbar-brand" href="#">
           <img class="logo-custom" src="<?php echo base_url(); ?>/theme/assets/img/nuesa-logo.png" alt=""  />
         ACES&bull;NAEEES E-VOTE</a>
             </div>
             <div class="navbar-collapse collapse move-me">
                 <ul class="nav navbar-nav lnk navbar-right" style="margin-right:2%;">
                     <li ><a href="<?php echo base_url(); ?>">HOME</a></li>
     <li ><a id="v" href="<?php echo base_url(); ?>vote">VOTE</a></li>
     <?php if(isset($name)) { echo '<li><a href="'.base_url().'logout">Logout</a></li>
       <li><h3 style="color:green;border:0px !important;text-transform:uppercase !important;">'.$name.'</h3></li>';}?>

 </ul>    </div>

         </div>
     </div>
      <!--NAVBAR SECTION END-->
    
