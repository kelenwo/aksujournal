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
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Users</a></li>
   <li class="" ></li>
   </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">
   <div class="tab-pane" id="tab2">
   <div class="col-md-12">
    <div class="panel">

   <table class="table table-hover table-responsive custom-tbl">
     <thead>
   <tr class="active">
     <th>#</th>
     <th>Name</th>
     <th>Phone Number</th>
     <th>Email</th>
     <th>Institution</th>
      <th>Position</th>
     <th>Date Joined</th>
     <th>Actions</th>
   </tr>
     </thead>
       <tbody>
     <?php if($user==false): ?>
       <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
     <?php else: $i=1;?>
   <?php  foreach($user as $req): ?>
   <tr>
       <td><?php  echo $i++.'.';?>
     <td><?php echo $req['author']; ?></td>
       <td><?php echo $req['phone']; ?></td>
       <td><?php echo $req['email']; ?></td>
        <td><?php echo $req['position']; ?></td>
       <td><?php echo $req['institution'];?></td>
     <td><?php echo $req['date']; ?></td>
     <td class="actions">
       <a href="#edit_user_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fa fa-pencil"></i></a>|
       <a id="del-user-<?php echo $req['id'];?>"><b style="color:red;">Delete&nbsp;<i class="fa fa-trash-o"></i></a></b>
       <form id="del_users-<?php echo $req['id'];?>">
       <input type="hidden" name="id" value="<?php echo $req['id'];?>">
       <input type="hidden" name="type" value="users">
     </form>
     </td>
   </tr>
   <div class="modal fade" id="edit_user_<?php echo $req['id'];?>" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
     <h3 class="modal-title text-center">Edit User</h3>
      </div>
      <div class="modal-body">
   <form name="edit_issue-<?php echo $req['id'];?>" method="post" id="edit_user-<?php echo $req['id'];?>">
      <div class="form-group">
    <label for="issue">Name</label>
    <div class="input-group">
      <span class="input-group-addon">
      <i class="fa fa-user"></i>
      </span>
    <input type="text" name="author" value="<?php echo $req['author'];?>" required class="form-control" id="author">
    <input type="hidden" name="id" value="<?php echo $req['id'];?>">
    </div></div>

    <div class="form-group">
  <label for="issue">Email</label>
  <div class="input-group">
    <span class="input-group-addon">
    <i class="fa fa-user"></i>
    </span>
  <input type="text" name="email" value="<?php echo $req['email'];?>" required class="form-control" id="email">
    </div></div>

  <div class="form-group">
<label for="issue">Phone Number</label>
<div class="input-group">
  <span class="input-group-addon">
  <i class="fa fa-user"></i>
  </span>
<input type="text" name="phone" value="<?php echo $req['phone'];?>" required class="form-control" id="phone">
</div></div>

<div class="form-group">
<label for="issue">Position</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-user"></i>
</span>
<select name="position">
  <option value="member" <?php if($req['position']=='member') {echo 'selected';}?>>Member</option>
  <option value="editor" <?php if($req['position']=='editor') {echo 'selected';}?>>Editor</option>
  <option value="administrator" <?php if($req['position']=='administrator') {echo 'selected';}?>>Administrator</option>
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
       if (confirm("Do you want to delete?")){
         $.ajax({
           url:'<?php echo base_url()."ucp/manage/delete_item";?>',
           type: "POST",
           data: $('#del_users-<?php echo $req["id"];?>').serialize(),
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
       url:'<?php echo base_url()."ucp/manage/update_user";?>',
       type: "POST",
       data: $("#edit_user-<?php echo $req['id'];?>").serialize(),
       success:function(data) {
     $("#loadingissue-<?php echo $req['id'];?>").hide();
       if(data=="saved") {
     $("#editissuemsg-<?php echo $req['id'];?>").html('saved');
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
