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
 <?php echo form_open_multipart('panel/register'); ?>
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
                            <label for="email">Email address</label>
                            <input name="email" type="email" required="" value="<?php echo set_value('email'); ?>"  class="form-control" id="email" placeholder="Email Address">
                        </div></div>
                        <div class="form-group">
                            <div class="col-md-10">
                          <label for="mobile">Mobile Number</label>
                          <input type="text" name="mobile" required="" value="<?php echo set_value('mobile'); ?>" class="form-control" id="mobile" placeholder="Mobile Number">
                      </div></div>
                        <div class="form-group">
                            <div class="col-md-10">
                          <label for="password">Password</label>
                          <input type="password" name="password" required="" class="form-control" id="password1" placeholder="Password">
                      </div></div>
                      <div class="form-group">
                          <div class="col-md-10">
                          <label for="password2">Re-enter Password</label>
                          <input type="password" name="passconfirm" required="" class="form-control" id="password2" placeholder="Re-enter Password">
                      </div></div>
                      <div class="form-group">
                          <div class="col-md-10">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" value="<?php echo set_value('avatar'); ?>"  required="" class="form-control" id="avatar" placeholder="Password">
                    </div></div>
                      <div class="form-group"><div class="col-md-4">
                        <label>Gender</label>
                        <div class="radio">
                            <label class="checkbox-inline">
     <input type="radio" name="gender" id="male" value="male" checked="<?php echo set_value('gender'); ?> "> Male
     </label>
     <label class="checkbox-inline">
     <input type="radio" name="gender" id="female" value="female" checked="<?php echo set_value('gender'); ?>">  Female
     </label>
                    </div>
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
