<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Slide Panel</h3>
</div>
   <div class="panel-body">
<div class="content-row">
   <div class="col-md-12 panel">
<div class="panel-heading">
<div class="panel-title"><b>Settings</b>
</div>

<div class="panel-options">
<a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
<a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
<a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
</div>
</div>

 <div class="tab-contents">
  <ul id="myTab1" class="nav nav-tabs nav-justified">
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Volumes</a></li>
 <li class=""><a href="#tab2" data-toggle="tab">Issues</a></li>
  <li class=""><a href="#tab3" data-toggle="tab">Archives</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">

  <div class="col-md-12">
   <a href="#add_volume" data-toggle="modal" id="newvol" class="btn btn-none btn-primary btn-block">ADD VOLUME + </a>
  </div>

<div class="col-md-12">
  <div class="panel">
 <table class="table table-hover table-responsive custom-tbl">
   <thead>
 <tr class="active">
   <th>#</th>
   <th>Volume</th>
  <th>Archive</th>
   <th>Date</th>
   <th>Actions</th>
    </tr>
   </thead>
   <tbody>
 <?php if($volume==false): ?>
   <tr><td colspan="5"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
 <?php else: $i = 1;?>
<?php foreach ($volume as $res): ?>
    <tr>
  <td><?php  echo $i++.'.';?>
   <td><?php echo $res['volume']; ?></td>
    <td><?php echo $res['archive']; ?></td>
   <td><?php echo $res['date']; ?></td>
   <td class="actions">
     <a href="#edit_volume_<?php echo $res['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fa fa-pencil"></i></a>|
     <a id="del-vol-<?php echo $res['id'];?>"><b style="color:red;">Delete&nbsp;<i class="fa fa-trash-o"></i></a></b>
     <form id="del_volume-<?php echo $res['id'];?>">
     <input type="hidden" name="id" value="<?php echo $res['id'];?>">
     <input type="hidden" name="type" value="volume">
   </form>
   <div class="modal fade" id="edit_volume_<?php echo $res['id'];?>" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
     <h3 class="modal-title text-center">Edit Volume</h3>
      </div>
      <div class="modal-body">
   <form name="edit_vol-<?php echo $res['id'];?>" method="post" id="edit_vol-<?php echo $res['id'];?>">
      <div class="form-group">
    <label for="volume">Volume</label>
    <div class="input-group">
      <span class="input-group-addon">
      <i class="fa fa-user"></i>
      </span>
    <input type="text" name="volume" value="<?php echo $res['volume'];?>" required class="form-control" id="volume" placeholder="Volume">
      </div></div>
      <div class="form-group">
        <label class="control-label">Archive</label>
        <div class="input-group">
      <span class="input-group-addon">
      <i class="fa fa-th-list"></i>
      </span>
        <select name="archive" class="form-control input-sm">
        <option>- Archive -</option>
        <?php foreach ($archive as $arcs ) {
       ?> <option value="<?php echo $arcs['archive'];?>" <?php if($res['archive']==$arcs['archive']){ echo 'selected';}?>><?php echo $arcs['archive'];?></option>
     <?php }?>
        </select>
        </div></div>
      <input type="hidden" name="id" value="<?php echo $res['id'];?>">
      <div class="form-group" id="editvolmsg-<?php echo $res['id'];?>"></div>
      </div>
      <div class="modal-footer">
     <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
     <button type="button" id="save-vol-edit-<?php echo $res['id'];?>" class="btn btn-primary">SUBMIT <i id="loadingvol-<?php echo $res['id'];?>" class="fa fa-gear fa-spin"></i></button>
   </form>
      </div>
   </div>
   </div>
      </div>
       </td>
 </tr>
<script>
$(document).ready(function() {
$('#loadingvol-<?php echo $res["id"];?>').hide();
  //Save volume edit
  $('#save-vol-edit-<?php echo $res["id"];?>').click(function() {
  $('#loadingvol-<?php echo $res["id"];?>').show();
  $.ajax({
    url:'<?php echo base_url()."ucp/manage/update_volume";?>',
    type: "POST",
    data: $('#edit_vol-<?php echo $res["id"];?>').serialize(),
    success:function(data) {
  $('#loadingvol-<?php echo $res["id"];?>').hide();
    if(data=="saved") {
  $('#editvolmsg-<?php echo $res["id"];?>').html('saved');
  $('#edit_vol-<?php echo $res["id"];?>')[0].reset();
  window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
    } else {
  $('#editvolmsg-<?php echo $res["id"];?>').html(data);
    }
    }
  });
  });

  //Delete Volume
  $("#del-vol-<?php echo $res['id'];?>").click(function(){
    if (confirm("Do you want to delete")){
      $.ajax({
        url:'<?php echo base_url()."ucp/manage/delete_item";?>',
        type: "POST",
        data: $('#del_volume-<?php echo $res["id"];?>').serialize(),
        success:function(data) {
  if(data=='true') {
  window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
    alert(data);
  }
  }
  });
  } else{
      return false;
    }
  });
});
</script>
   <?php endforeach;
 endif;?>
   </tbody>
 </table>
  </div>
  </div>
  </div><!-- panel body -->

<!-- Department -->
<div class="tab-pane" id="tab2">
 <div class="col-md-12">
  <a href="#add_issue" data-toggle="modal" id="newissue" class="btn btn-none btn-primary btn-block">ADD ISSUE + </a>
 </div>
<div class="col-md-12">
 <div class="panel">
<table class="table table-hover table-responsive custom-tbl">
  <thead>
<tr class="active">
  <th>#</th>
  <th>issue Title</th>
  <th>Volume</th>
  <th>Archive</th>
  <th>Date</th>
  <th>Actions</th>
</tr>
  </thead>
    <tbody>
  <?php if($issue==false): ?>
    <tr><td colspan="5"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
  <?php else: $i=1;?>
<?php  foreach($issue as $req): ?>
<tr>
    <td><?php  echo $i++.'.';?>
  <td><?php echo $req['issue']; ?></td>
    <td><?php echo $req['volume']; ?></td>
    <td><?php echo $req['archive']; ?></td>
  <td><?php echo $req['date']; ?></td>
  <td class="actions">
    <a href="#edit_issue_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fa fa-pencil"></i></a>|
    <a class="cursor-pointer" id="del-issue-<?php echo $req['id'];?>"><b style="color:red;">Delete&nbsp;<i class="fa fa-trash-o"></i></a></b>
    <form id="del_issues-<?php echo $req['id'];?>">
    <input type="hidden" name="id" value="<?php echo $req['id'];?>">
    <input type="hidden" name="type" value="issue">
  </form>
  </td>
</tr>
<div class="modal fade" id="edit_issue_<?php echo $req['id'];?>" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
   <div class="modal-header">
  <h3 class="modal-title text-center">Edit Issue</h3>
   </div>
   <div class="modal-body">
<form name="edit_issue-<?php echo $req['id'];?>" method="post" id="edit_issue-<?php echo $req['id'];?>">
   <div class="form-group">
 <label for="issue">Issue</label>
 <div class="input-group">
   <span class="input-group-addon">
   <i class="fa fa-user"></i>
   </span>
 <input type="text" name="issue" value="<?php echo $req['issue'];?>" required class="form-control" id="issue">
 <input type="hidden" name="id" value="<?php echo $req['id'];?>">
 </div></div>
 <div class="form-group">
   <label class="control-label">Volume</label>
   <div class="input-group">
 <span class="input-group-addon">
 <i class="fa fa-th-list"></i>
 </span>
   <select name="volume" id="optionvol" class="form-control input-sm">
   <option>- Volume -</option>
   <?php foreach ($volume as $vol ) {
  ?> <option value="<?php echo $vol['volume'];?>" <?php if($req['volume']==$vol['volume']){ echo 'selected';}?>><?php echo $vol['volume'];?></option>
<?php }?>
   </select>
   </div></div>
   <div class="form-group">
     <label class="control-label">Archive</label>
     <div class="input-group">
   <span class="input-group-addon">
   <i class="fa fa-th-list"></i>
   </span>
     <select name="archive" class="form-control input-sm">
     <option>- Archive -</option>
     <?php foreach ($archive as $arcs ) {
    ?> <option value="<?php echo $arcs['archive'];?>" <?php if($res['archive']==$arcs['archive']){ echo 'selected';}?>><?php echo $arcs['archive'];?></option>
  <?php }?>
     </select>
     </div></div>
   <div class="form-group" id="editissuemsg-<?php echo $req['id'];?>"></div>
   </div>
   <div class="modal-footer">
  <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
  <button type="button" id="save-issue-edit-<?php echo $req['id'];?>" class="btn btn-primary">SUBMIT <i id="loadingissue-<?php echo $req['id'];?>" class="fa fa-gear fa-spin"></i></button>
   </div>
   </form>
</div>
</div>
   </div>
<script>
$(document).ready(function() {
$('#loadingissue-<?php echo $req["id"];?>').hide();
  $("#del-issue-<?php echo $req['id'];?>").click(function(){
    if (confirm("Do you want to delete")){
      $.ajax({
        url:'<?php echo base_url()."ucp/manage/delete_item";?>',
        type: "POST",
        data: $('#del_issues-<?php echo $req["id"];?>').serialize(),
        success:function(data) {
  if(data=='true') {
  window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
    alert(data);
  }
  }
  });
    } {
      return false;
    }
  });
  //Save Issue edit
  $("#save-issue-edit-<?php echo $req['id'];?>").click(function() {
  $("#loadingissue-<?php echo $req['id'];?>").show();
  $.ajax({
    url:'<?php echo base_url()."ucp/manage/update_issue";?>',
    type: "POST",
    data: $("#edit_issue-<?php echo $req['id'];?>").serialize(),
    success:function(data) {
  $("#loadingissue-<?php echo $req['id'];?>").hide();
    if(data=="saved") {
  $("#editissuemsg-<?php echo $req['id'];?>").html('saved');
  $("#edit_issue-<?php echo $req['id'];?>")[0].reset();
  window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
    } else {
  $('#editissuemsg-<?php echo $req["id"];?>').html(data);
    }
    }
  });
  });
});
</script>
  <?php endforeach;
endif;?>
  </tbody>
</table>
 </div>
 </div>
 </div>

<!-- Archives -->
<div class="tab-pane fade" id="tab3">

 <div class="col-md-12">
  <a href="#add_archives" data-toggle="modal" id="newarch" class="btn btn-none btn-primary btn-block">ADD ARCHIVE + </a>
 </div>

<div class="col-md-12">
 <div class="panel">
<table class="table table-hover table-responsive custom-tbl">
  <thead>
<tr class="active">
  <th>#</th>
  <th>Archive</th>
  <th>Date</th>
  <th>Actions</th>
   </tr>
  </thead>
  <tbody>
<?php if($archive==false): ?>
  <tr><td colspan="3"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php foreach ($archive as $ress): ?>
   <tr>
 <td><?php  echo $i++.'.';?>
  <td><?php echo $ress['archive']; ?></td>
  <td><?php echo $ress['date']; ?></td>
  <td class="actions">
    <a href="#edit_archive_<?php echo $ress['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fa fa-pencil"></i></a>|
    <a id="del-arch-<?php echo $ress['id'];?>"><b style="color:red;">Delete&nbsp;<i class="fa fa-trash-o"></i></a></b>
    <form id="del_archive-<?php echo $ress['id'];?>">
    <input type="hidden" name="id" value="<?php echo $ress['id'];?>">
    <input type="hidden" name="type" value="archive">
  </form>
  <div class="modal fade" id="edit_archive_<?php echo $ress['id'];?>" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
     <div class="modal-header">
    <h3 class="modal-title text-center">Edit Archive</h3>
     </div>
     <div class="modal-body">
  <form name="edit_arch-<?php echo $ress['id'];?>" method="post" id="edit_arch-<?php echo $ress['id'];?>">
     <div class="form-group">
   <label for="archive">Archive</label>
   <div class="input-group">
     <span class="input-group-addon">
     <i class="fa fa-user"></i>
     </span>
   <input type="text" name="archive" value="<?php echo $ress['archive'];?>" required class="form-control" id="archive" placeholder="Archive">
     </div></div>
     <input type="hidden" name="id" value="<?php echo $ress['id'];?>">
     <div class="form-group" id="editarchmsg-<?php echo $ress['id'];?>"></div>
     </div>
     <div class="modal-footer">
    <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
    <button type="button" id="save-arch-edit-<?php echo $ress['id'];?>" class="btn btn-primary">SUBMIT <i id="loadingarch-<?php echo $ress['id'];?>" class="fa fa-gear fa-spin"></i></button>
  </form>
     </div>
  </div>
  </div>
     </div>
      </td>
</tr>
<script>
$(document).ready(function() {
$('#loadingarch-<?php echo $ress["id"];?>').hide();
 //Save archive edit
 $('#save-arch-edit-<?php echo $ress["id"];?>').click(function() {
 $('#loadingarch-<?php echo $ress["id"];?>').show();
 $.ajax({
   url:'<?php echo base_url()."ucp/manage/update_archive";?>',
   type: "POST",
   data: $('#edit_arch-<?php echo $ress["id"];?>').serialize(),
   success:function(data) {
 $('#loadingarch-<?php echo $ress["id"];?>').hide();
   if(data=="saved") {
 $('#editarchmsg-<?php echo $ress["id"];?>').html('saved');
 $('#edit_arch-<?php echo $ress["id"];?>')[0].reset();
 window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
   } else {
 $('#editarchmsg-<?php echo $ress["id"];?>').html(data);
   }
   }
 });
 });

 //Delete Archive
 $("#del-arch-<?php echo $ress['id'];?>").click(function(){
   if (confirm("Do you want to delete")){
     $.ajax({
       url:'<?php echo base_url()."ucp/manage/delete_item";?>',
       type: "POST",
       data: $('#del_archive-<?php echo $ress["id"];?>').serialize(),
       success:function(data) {
 if(data=='true') {
 window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
 } else {
   alert(data);
 }
 }
 });
 } else{
     return false;
   }
 });
});
</script>
  <?php endforeach;
endif;?>
  </tbody>
</table>
 </div>
 </div>
 </div><!-- panel body -->

 </div>
 <!-- issues end -->
  <!-- Session/semester end -->
  </div>
</div>
 </div>
</div>

 </div>
 </div>

<!-- Add volume -->
<div class="modal fade" id="add_volume" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
   <div class="modal-header">
  <h3 class="modal-title text-center">
   Add Volume
</h3>
   </div>
   <div class="modal-body">
<div class="container-fluid">
  <div class="">
<form name="add_vol" method="post" id="add_vol">
   <div class="form-group">
 <label for="volume">Volume</label>
 <div class="input-group">
   <span class="input-group-addon">
   <i class="fa fa-user"></i>
   </span>
 <input type="text" name="volume" required class="form-control" id="volume" placeholder="Volume">
 <input type="hidden" name="date" value="<?php echo date('d-M-Y'); ?>">
 </div></div>
 <div class="form-group">
<label for="volume">Volume</label>
<div class="input-group">
 <span class="input-group-addon">
 <i class="fa fa-user"></i>
 </span>
 <select name="archive" id="archive" class="form-control input-sm">
 <option>- Archive -</option>
 <?php foreach ($archive as $arch ) {
 ?> <option value="<?php echo $arch['archive'];?>"><?php echo $arch['archive'];?></option>
 <?php }?>
 </select>
</div></div>
   <div class="form-group" id="addvolmsg"></div>
 </div>
 </div>
   </div>
   <div class="modal-footer">
<table class="" width="100%"><tr><td width="30%">
</td><td width="70">
  <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
  <button type="button" id="save-vol" class="btn btn-primary">SUBMIT <i id="loading-vol" class="fa fa-gear fa-spin"></i></button>
</td></tr></table>
   </div>
   </form>
</div>
</div>
   </div>
<!-- Add Volume end -->

<!-- Add Issue -->
<div class="modal fade" id="add_issue" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
   <div class="modal-header">
  <h3 class="modal-title text-center">
   Add Issue
</h3>
   </div>
   <div class="modal-body">
<div class="container-fluid">
  <div class="">
<form name="add_issues" id="add_issues">
   <div class="form-group">
 <label for="issue">Issue</label>
 <div class="input-group">
   <span class="input-group-addon">
   <i class="fa fa-user"></i>
   </span>
    <input type="hidden" name="date" value="<?php echo date('d-M-Y'); ?>">
 <input type="text" name="issue" required class="form-control" id="issue" placeholder="Issue">
 </div></div>
 <div class="form-group">
   <label class="control-label">Volume</label>
   <div class="input-group">
 <span class="input-group-addon">
 <i class="fa fa-th-list"></i>
 </span>
   <select name="volume" id="optionvol" class="form-control input-sm">
   <option>- Volume -</option>
   <?php foreach ($volume as $vol ) {
  ?> <option value="<?php echo $vol['volume'];?>"><?php echo $vol['volume'];?></option>
<?php }?>
   </select>
   </div></div>
   <div class="form-group" id="addissuemsg"></div>
 </div>
 </div>
   </div>
   <div class="form-group">
     <label class="control-label">Archive</label>
     <div class="input-group">
   <span class="input-group-addon">
   <i class="fa fa-th-list"></i>
   </span>
     <select name="archive" class="form-control input-sm">
     <option>- Archive -</option>
     <?php foreach ($archive as $arcs ) {
    ?> <option value="<?php echo $arcs['archive'];?>"><?php echo $arcs['archive'];?></option>
  <?php }?>
     </select>
     </div></div>
   <div class="modal-footer">
<table class="" width="100%"><tr><td width="30%">
</td><td width="70">
  <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
  <button type="button" id="save-issue" class="btn btn-primary">SUBMIT <i id="loading-issue" class="fa fa-gear fa-spin"></i></button>
</td></tr></table>
   </div>

   </form>
</div>
</div>
   </div>
<!-- Add Issue end -->
<!-- Add volume -->
<div class="modal fade" id="add_archives" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
   <div class="modal-content">
   <div class="modal-header">
  <h3 class="modal-title text-center">
   Add Archive
</h3>
   </div>
   <div class="modal-body">
<div class="container-fluid">
  <div class="">
<form name="add_vol" method="post" id="add_archive">
   <div class="form-group">
 <label for="archive">Archive Title</label>
 <div class="input-group">
   <span class="input-group-addon">
   <i class="fa fa-user"></i>
   </span>
 <input type="text" name="archive" required class="form-control" id="archive" placeholder="Archive title">
 <input type="hidden" name="date" value="<?php echo date('d-M-Y'); ?>">
 </div></div>
   <div class="form-group" id="addarchivemsg"></div>
 </div>
 </div>
   </div>
   <div class="modal-footer">
<table class="" width="100%"><tr><td width="30%">
</td><td width="70">
  <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
  <button type="button" id="save-archive" class="btn btn-primary">SUBMIT <i id="loading-archive" class="fa fa-gear fa-spin"></i></button>
</td></tr></table>
   </div>
   </form>
</div>
</div>
   </div>

<script>
$(document).ready(function() {
//Hide all loading icons
$('#loading-vol').hide();
$('#loading-issue').hide();
$('#loading-archive').hide();

//Save volume
$('#save-vol').click(function() {
$('#loading-vol').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/save_volume";?>',
  type: "POST",
  data: $('#add_vol').serialize(),
  success:function(data) {
$('#loading-vol').hide();
  if(data=="saved") {
$('#addvolmsg').html('saved');
$('#add_vol')[0].reset();
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
$('#addvolmsg').html(data);
  }
  }
});
});

//Save Issue
$('#save-issue').click(function() {
$('#loading-issue').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/save_issue";?>',
  type: "POST",
  data: $('#add_issues').serialize(),
  success:function(data) {
$('#loading-issue').hide();
  if(data=="saved") {
$('#addissuemsg').html('saved');
$('#add_issues')[0].reset();
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
$('#addissuemsg').html(data);
  }
  }
})
});

//Save Archive
$('#save-archive').click(function() {
$('#loading-archive').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/save_archive";?>',
  type: "POST",
  data: $('#add_archive').serialize(),
  success:function(data) {
$('#loading-archive').hide();
  if(data=="saved") {
$('#addarchivemsg').html('saved');
$('#add_archive')[0].reset();
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
$('#addarchivemsg').html(data);
  }
  }
})
});
});
</script>
