<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> {title}</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/favicon_16.ico"/>
    <link rel="bookmark" href="<?php echo base_url(); ?>/favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/dist/css/site.min.css">
        <link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" />

  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
    <!--  Jquery Core Script -->
    <script src="<?php echo base_url(); ?>theme/admin/assets/jquery.min.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="<?php echo base_url(); ?>/style/assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts -->
         <script src="<?php echo base_url(); ?>/style/assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="<?php echo base_url(); ?>/style/assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts -->
    <script src="<?php echo base_url(); ?>/style/assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts -->
         <script src="<?php echo base_url(); ?>/style/assets/js/custom.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!-- [if lt IE 9] -->
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
     <!--[endif] -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/style/dist/js/site.min.js"></script>
  </head>
  <body>
    <?php //if(!isset($this->session->user_name)) {
       //header('Location:'. base_url().'ucp/login');
  //  } ?>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"><h4>Admin Panel</h4></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse ">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="getting-started.html"><h5>Logout</h5></a></li>
              <li class="disabled"><a href="index.html"><h4>Admin</h4></a></li>
              <!-- <li class="disabled"><a href="#">Link</a></li> -->
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-4 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                  <li><a class="list-group-item" id="index-tab" href="<?php echo base_url();?>admin">
                  <i class="glyphicon glyphicon-certificate" ></i>
                <br>Dashboard </a></li>
              <li><a class="list-group-item" id="courses-tab" href="<?php echo base_url();?>admin/add_contestant"><i class="glyphicon glyphicon-list-alt"></i>
            <br>Add Contestants</a></li>
            <li><a class="list-group-item" id="courses-tab" href="<?php echo base_url();?>admin/add_voters"><i class="glyphicon glyphicon-list-alt"></i>
          <br>Add Voters</a></li>
            <li><a class="list-group-item" id="add-tab" href="<?php echo base_url();?>admin/edit_contestant"><i class="glyphicon glyphicon-certificate">
            </i><br>Edit Contestant</a></li>
            <li><a class="list-group-item" id="settings-tab" href="<?php echo base_url();?>admin/settings">
              <i class="fa fa-cogs"></i><br>Site Settings</a></li>
                <li><a class="list-group-item" id="portal-tab" href="<?php echo base_url();?>admin/portal"><i class="glyphicon glyphicon-indent-left"></i>
                  <br>Close/Open Election</a></li>

              </ul>
          </div>
  <div id="content"></div>

<script>
$(document).ready(function(){
//
//Hide all loading icons
$('#loading1').hide();
$('#loading2').hide();
$('#loading3').hide();
$('#loading4').hide();
$('#loading5').hide();
//Load the dashboard by default
$('#content').load('<?php echo base_url(); ?>admin/candida');

//load Dashboard page
$("#index-tab").click(function() {
$('#loading1').show();
$('#content').load('<?php echo base_url(); ?>student/dashboard');
$('#loading1').hide();
  });
//Load Biodata page
$("#add-tab").click(function() {
$('#loading2').show();
$('#content').load('<?php echo base_url(); ?>admin/candidate');
$('#loading2').hide();
  });
//Load School fees page
$("#settings-tab").click(function() {
$('#loading3').show();
$('#content').load('<?php echo base_url(); ?>admin/settings');
$('#loading3').hide();
  });
//Load course page
$("#courses-tab").click(function() {
$('#loading4').show();
$('#content').load('<?php echo base_url(); ?>admin/courses');
$('#loading4').hide();
  });

//Load portal page
$("#portal-tab").click(function() {
$('#loading5').show();
$('#content').load('<?php echo base_url(); ?>admin/portal');
$('#loading5').hide();
});
  });
  </script>
