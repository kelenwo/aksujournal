

          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Panel Title</h3>
              </div>
                            <div class="panel-body">
                                <div class="content-row">
                                    <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">
                                    &times;
                                    </button>
                                    Note: You need to read this before making your new post
                                 </div>

                                                  <div class="col-md-10 panel">
 <div class="panel-heading">
   <div class="panel-title"><b>Create Form</b>
   </div>

   <div class="panel-options">
     <a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
     <a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
     <a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
   </div>
 </div>

 <div class="panel-body">

   <?php echo form_open('/panel/post/newpost'); ?>

     <div class="form-group">
         <?php if(!empty(validation_errors())) { ?><div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 Error ! <?php echo validation_errors(); ?>
</div> <?php } ?>
<label class="col-md-2 control-label">Category</label><div class="col-md-10">
    <select name="category"  class="form-control input-sm">
        <option value="">- Category -</option>
        <option value="Faculty">Faculty</option>
        <option value="Agric Engineering">Agric Engineering</option>
        <option value="Chemical Engineering">Chemical Engineering</option>
        <option value="Civil Engineering">Civil Engineering</option>
        <option value="Computer Engineering">Computer Engineering</option>
        <option value="Elect/Elect Engineering">Elect/Elect Engineering</option>
        <option value="Food Engineering">Food Engineering</option>
        <option value="Mechanical Engineering">Mechanical Engineering</option>
        <option value="Petroleum Engineering">Petroleum Engineering</option>
    </select>
</div>
       <label class="col-md-2 control-label">Title</label>
       <div class="col-md-10">
         <input type="text" required="" placeholder="Topic Title" id="title" class="form-control" name="title">
       </div>
   </div>
     <div class="form-group">
       <label class="col-md-2 control-label" for="description">Content</label>
       <div class="col-md-10">
         <textarea required="" class="form-control" placeholder="Post Content" rows="10" cols="30" id="content" name="content"></textarea>
       </div>
     </div>
     <div class="form-group">
       <div class="col-md-offset-2 col-md-10">
         <button class="btn btn-info" id="submit" type="submit">Submit</button>
       </div>
     </div>
   </form>
 </div>
                                                  </div>

                                                </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
    </div>
    <!--footer-->
  </body>
</html>
