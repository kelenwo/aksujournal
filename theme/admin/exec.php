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
                          Note: All Inputs are compulsory.
                          You must fill all inputs in this form.

                       </div>

                                        <div class="col-md-12 panel">
<div class="panel-heading">
<div class="panel-title"><b>Create Form</b>
</div>

<div class="panel-options">
<a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
<a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
<a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
</div>
</div>
 <?php echo form_open_multipart('ucp/executives'); ?>
                    <div class="panel-body">
                        <?php if(!empty(validation_errors())) { ?><div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
                &times;
                </button>
                Error ! <?php echo validation_errors(); ?>
               </div> <?php } ?>

                          <div class="form-group">
                              <div class="col-md-10">
                            <label for="name">Full name</label>
                            <input type="text" name="name" required="" value="<?php echo set_value('name'); ?>"  class="form-control" id="name" placeholder="Full name">
                        </div></div>
                        <div class="form-group">
                            <div class="col-md-10">
                            <label for="position"> Position</label>
                            <input name="position" type="text" required="" value="<?php echo set_value('position'); ?>"  class="form-control" id="position" placeholder="Position">
                        </div></div>

                        <div class="form-group">
                            <div class="col-md-10">
                          <label for="type">Type</label>
                          <select name="type"  class="form-control input-sm">
                              <option >- Type -</option>
                              <option value="1">Administrative</option>
                              <option value="2">Faculty Executive</option>
                          </select> </div></div>
                          <div class="form-group">
                              <div class="col-md-10">
                            <label for="type">Department</label>
                            <select name="department"  class="form-control input-sm">
                                <option value="">- Category -</option>
                                <option value="Agric Engineering">Agric Engineering</option>
                                <option value="Chemical Engineering">Chemical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Elect/Elect Engineering">Elect/Elect Engineering</option>
                                <option value="Food Engineering">Food Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Petroleum Engineering">Petroleum Engineering</option>
                            </select> </div></div>

                      <div class="form-group">
                          <div class="col-md-10">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" value="<?php echo set_value('avatar'); ?>"  required="" class="form-control" id="avatar" placeholder="Password">
                    </div></div>
                    <div class="form-group">
                        <div class="col-md-10">
                        <label for="position"> About</label>
                        <textarea name="about" required="" value="<?php echo set_value('about'); ?>"  class="form-control" id="about" placeholder="About This Person"></textarea>
                    </div></div>
                        <div class="clear"></div>
                        <div class="form-group col-md-9">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                      </form>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
