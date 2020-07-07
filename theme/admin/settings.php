<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Slide Panel</h3>
</div>
   <div class="panel-body">
<div class="content-row">
   <div class="col-md-12 panel">
<div class="panel-heading">

<div class="panel-options">
<a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
<a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
<a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
</div>
</div>

<div class="">
  <div class="">
 <div class="tab-contents">
  <ul id="myTab1" class="nav nav-tabs nav-justified">
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Site Settings</a></li>
  <li class=""><a class="" href="#tab2" data-toggle="tab">Request Student Data</a></li>

   </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">
<form name="startstop" id="startstop">
 <div class="col-md-12">
  <div class="panel">
    <h4>Election Start/Stop</h4>
    <div class="col-md-8 col-xs-8">
   <div class="form-group">
    <label class="control-label">Election Start Time</label>
    <div class="input-group">
      <span class="input-group-addon">
      <i class="fa fa-user"></i>
      </span>
    <input type="datetime-local" <?php if(isset($stop)){echo 'value="'.$start.'"';}?> name="start" class="form-control" id="current_session" placeholder="Start time" required />
    </div></div></div>

    <div class="col-md-8 col-xs-8">
   <div class="form-group">
    <label class="control-label">Election Close Time</label>
    <div class="input-group">
      <span class="input-group-addon">
      <i class="fa fa-user"></i>
      </span>
    <input type="datetime-local" name="stop" <?php if(isset($stop)){echo 'value="'.$stop.'"';}?> class="form-control" id="current_session" placeholder="Stop Time" required />
    </div></div></div>
    <div class="col-md-12 col-xs-12">
<hr/>
<div id="return"></div>
<hr/>
      <button type="button" class="btn btn-primary" id="save">Submit</button>
</div>
  </form>
  </div>
  </div>
  </div>
  <!-- Session/semester end -->
 <div class="tab-pane" id="tab2">
   <div class="panel">
     <h4>Request Students data From portal</h4>
   <hr/>
   <button class="btn btn-primary btn-block">Load Student data </button>
   <hr/>
   <div style="color: red; font-size:14px;">Error: Access denied!! Cannot get students data. Connection to E-portals could not be established.</div>
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
</div>
<script>
$(document).ready(function() {

//Hide all loading icons
$('#loading').hide();
//Get faculty list from

//Save faculty
$('#save').click(function() {
$('#loading').show();
$.ajax({
  url:'<?php echo base_url()."admin/save_settings";?>',
  type: "POST",
  data: $('#startstop').serialize(),
  success:function(data) {
$('#loading').hide();
  if(data=="saved") {
$('#return').html('saved');
  } else {
$('#return').html(data);
  }
  }
})
});


});
</script>
