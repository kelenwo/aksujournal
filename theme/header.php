<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AKSUJAEERD</title>
    <link href="<?php echo base_url();?>theme/aksu/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/aksu/css/global.css" rel="stylesheet">
    <link href="<?php echo base_url();?>theme/aksu/css/index.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/aksu/css/font-awesome.min.css"/>
      <script src="<?php echo base_url();?>theme/aksu/js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo base_url();?>theme/aksu/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>theme/assets/jquery.min.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="<?php echo base_url(); ?>theme/assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts -->
         <script src="<?php echo base_url(); ?>theme/assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="<?php echo base_url(); ?>theme/assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts -->
    <script src="<?php echo base_url(); ?>theme/assets/js/jquery.easing.min.js"></script>

  </head>
  <style>
 /* Dropdown Button */
.dropbtn {
  background-color: green;
  color: white;
  padding: 15px 6px;
  font-size: 16px;
  border: none;
  position: relative;
  letter-spacing: 2px;
}

/* The container <div> - needed to position the dropdown content */
.dropdown1 {
  position: relative;
  display: inline-block;
  padding: 15px 6px;

}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-left: -6px;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: #000;
  padding: 15px 8px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: green; color: #fff;}

/* Show the dropdown menu on hover */
.dropdown1:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown1:hover .dropbtn {background-color: #034203;}

</style>


<section id="top">

 <div class="container">
  <div class="row">
   <div class="top clearfix">


  <div class="col-sm-12 col-xs-12">
   <div class="top_3">
<img src="<?php echo base_url();?>theme/aksu/img/0.jpg" alt="abc" class="img1">

    <span class= "head">
   <h1> AKSU Journal of Agricultural Economics, Extension and Rural Development  </h1>
  </span>
 <img src="<?php echo base_url();?>theme/aksu/img/1.jpg" alt="abc" class="img2">
    </div>
  </div>

   </div>
  </div>
 </div>
</section>

<section id="header" class="clearfix cd-secondary-nav">
  <nav class="navbar navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-left">
            <li><a class="menu_tag menu_active" href="<?php echo base_url()?>index"><i class="fa fa-home"></i> HOME</a></li>
                    <li>
                      <div class="dropdown1 menu_tag">
                        <a class="menu_tag"><i class="fa fa-info"></i> ABOUT US</a>
                        <div class="dropdown-content">
                          <a class href="<?php echo base_url()?>who_we_are">Who we are</a>
                          <a class href="<?php echo base_url()?>scope">Aims and Scope</a>
                          <a class href="<?php echo base_url()?>editorial_board">Our Editorial Board</a>
                          <a class href="<?php echo base_url()?>subject_areas">Our Subject Areas</a>
                        </div>
                      </div>
                    </li>
            <li>
              <div class="dropdown1 menu_tag">
                <a class="menu_tag"><i class="fa fa-user"></i> FOR AUTHORS</a>
                <div class="dropdown-content">
                  <a class href="#">How to submit Your Paper</a>
                  <a class href="#">How to Pay Processing Charges</a>
                  <a class href="#">How to Pay Publication Charges</a>
                </div>
              </div>
            </li>

          <li><a class="menu_tag" href="<?php echo base_url()?>archives"><i class="fa fa-briefcase"></i> ARCHIVES</a></li>
          <li><a class="menu_tag" href="<?php echo base_url()?>editorial_policy"><i class="fa fa-book"></i> EDITORIAL POLICY</a></li>
          <li><a class="menu_tag" href="<?php echo base_url();?>contact"><i class="fa fa-globe"></i> CONTACT</a></li>



                  <li><a class="menu_tag" href="<?php echo base_url();?>signup"><i class="fa fa-edit"></i> REGISTER</a></li>
                  <li><a class="menu_tag" href="<?php echo base_url();?>submission"><i class="fa fa-submit"></i> SUBMISSION OF MANUSCRIPT</a></li>
              </ul>

         </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</section>
