

<section id="center" class="center_home"  style="background-color: #def7de;">
  <div class="container">
   <div class="col-xs-12 col-sm-12">
    <div class="col-sm-12 col-xs-12" style="padding: 10px">
  &nbsp;&nbsp;&nbsp;&nbsp;
</div>
    <div class="row">

      
        <div class="col-xs-8 col-sm-8">
        
       
              
      <h1 class="" style="color: #0f2d0f" align="center" >Submit Manuscript</h1> <br>
     
     
            
            <?php echo validation_errors(); ?>

            <?php echo form_open(); ?>

            
          <div class="form-group">
            <label for="Name">Author(s) <span class="icon_tag">*</span></label>
            <input type="text" class="form-control"  id="name" value="" required="">
          </div>
          <div class="form-group">
            <label for="Institution">Institution <span class="icon_tag">*</span></label>
            <input type="text" class="form-control" id="Institution" value="" required="">
          </div>
          <div class="form-group">
            <label for="Password">userfile</label>
            <input type="file" class="form control" id="userfile" size="20" />
          </div>
                
            <p><button type="submit" class="btn btn-success" name="submit" href="">Submit</button></p>
              
 </div>
           
          </div>
        </div>


      </div>
    </div>
  </div>
  </div>
</div>
</section>
