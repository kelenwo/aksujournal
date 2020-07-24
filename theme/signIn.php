<html>
<head>
<title>My Form</title>
</head>
<body>

<section id="center" class="center_home"  style="background-color: #f5f9f5;">
  <div class="container">
    <div class="col-sm-12 col-xs-12" style="padding: 10px">
  &nbsp;&nbsp;&nbsp;&nbsp
</div>
   <div class="col-xs-12 col-sm-12">
    <div class="row">

<div class="center_home_2_inner_2_inner_1 clearfix">
        <div class="col-xs-4 col-sm-4">
        
          <div class="center_home_2_inner_login clearfix" style="margin-top: 15px;background-color: #c9d8c9;border-radius:5px;">
              <div class="center_home_2_inner_1_inner clearfix">
<p>Don't have an account with us yet? click <a class="" href="aksu/signup">Register</a></p>

              </div>
            </div>
          </div>
        

      <div class="center_home_2_inner_2_inner_1 clearfix">
        <div class="col-xs-8 col-sm-8">
        
          <div class="center_home_2_inner_login clearfix" style="margin-left:;background-color: #c9d8c9;border-radius:5px;">
              <div class="center_home_2_inner_1_inner clearfix">
      <h1 class="" style="color: #0f2d0f" align="center" >Submission of Manuscript</h1> <br>
     
     </div>
            
            <?php echo validation_errors(); ?>

            <?php echo form_open("aksu/user"); ?>

               <div class="center_home_2_inner_login clearfix" style="margin-left:;background-color: #c9d8c9;">

                       
                           <div class="row">
                              <div class="col-md-12 col-xs-12">
                                 <form class="form" method="post" action="#" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required="">
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required="">
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> Remember me
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" name="signin" class="btn btn-success btn-block button" href="aksu/user">Sign in </button>
                                    </div>
                                 </form>
                              </div>
                           </div>
              
 </div>
           
          </div>
        </div>


      </div>
    </div>
  </div>
  </div>
</div>
</section>

</body>
</html>