<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Archives</h3>
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
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Archives</a></li>
   <li class="" ></li>
   </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">
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
     <th>issue</th>
     <th>Volume</th>
     <th>Archive</th>
     <th>Articles</th>
     <th>Date</th>
     <th>Actions</th>
   </tr>
     </thead>
       <tbody>
     <?php if($issue==false): ?>
       <tr><td colspan="4"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
     <?php else: $i=1;?>
   <?php  foreach($issue as $req): ?>
   <tr>
       <td><?php  echo $i++.'.';?>
     <td><?php echo $req['issue']; ?></td>
       <td><?php echo $req['volume']; ?></td>
       <td><?php echo $req['archive']; ?></td>
       <td><b id="article-count-<?php echo $req["id"];?>"></b>
         <form id="articles-<?php echo $req['id'];?>">
         <input type="hidden" name="issue" value="<?php echo $req['issue'];?>">
             </form></td>
     <td><?php echo $req['date']; ?></td>
     <td class="actions">
       <a href="#edit_issue_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fa fa-pencil"></i></a>|
       <a id="del-issue-<?php echo $req['id'];?>"><b style="color:red;">Delete&nbsp;<i class="fa fa-trash-o"></i></a></b>
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
     $.ajax({
       url:'<?php echo base_url()."admin/count_articles";?>',
       type: "POST",
       data: $('#articles-<?php echo $req["id"];?>').serialize(),
       success:function(data) {
$('#article-count-<?php echo $req["id"];?>').html(data);
 }
 });
   $('#loadingissue-<?php echo $req["id"];?>').hide();
     $("#del-issue-<?php echo $req['id'];?>").click(function(){
       if (confirm("Deleting this issue will delete all articles in it. Do you want to delete?")){
         $.ajax({
           url:'<?php echo base_url()."admin/delete_item";?>',
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
       url:'<?php echo base_url()."admin/update_issue";?>',
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
