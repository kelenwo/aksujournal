<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Editorial Team</h3>
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
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Users</a></li>
  <li class="" ></li>

   </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">
 <div class="col-md-12">
  <div class="panel">

  <table class="table table-hover table-responsive custom-tbl">
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Email</th>
  <th>Mobile Number</th>
  <th>Position</th>
  <th>Date Joined</th>
  <th>Actions</th>
</tr>
  <tr>
    <td>1.</td>
    <td>Kelvin Elenwo</td>
    <td>kelvinelenwo@gmail.com</td>
    <td>08109406889</td>
    <td>Editor</td>
    <td><b style="color:green;">15 September, 2020</b></td>
    <td class="actions">
      <a href="">Edit&nbsp;<i class="fa fa-pencil"></i></a>|
      <a href=""><i class="fa fa-arrow-down"></i>&nbsp;(pdf)</a>|
      <a href=""><b style="color:red;">delete&nbsp;<i class="fa fa-trash-o"></i></a></b>
        </td>
  </tr>
  </table>
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
  url:'<?php echo base_url()."ucp/manage/save_settings";?>',
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
