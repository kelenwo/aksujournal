<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Articles</h3>
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
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Articles</a></li>
  <li class="" ><a class="" href="#tab2" data-toggle="tab">Publish an Article</a></li>

   </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">
 <div class="col-md-12">
  <div class="panel">
  <table class="table table-hover table-responsive custom-tbl">
<thead>
<tr>
  <th>#</th>
  <th>Title</th>
  <th>Author</th>
  <th>Issue</th>
  <th>Vol.</th>
  <th>Date Published</th>
  <th>Actions</th>
</tr>
</thead>
  <tbody>
<?php if($article==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($article as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><?php echo $req['title']; ?></td>
<td><?php echo $req['author']; ?></td>
<td><?php echo $req['issue']; ?></td>
  <td><?php echo $req['volume']; ?></td>
<td><?php echo $req['date']; ?></td>
<td class="actions">
  <a href="#edit_article_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fa fa-pencil"></i></a>|
  <a id="dl-article-<?php echo $req['id'];?>"><b style="color:red;">(.docx)&nbsp;<i class="fa fa-download"></i></a></b>|
  <a id="del-article-<?php echo $req['id'];?>"><b style="color:red;">delete&nbsp;<i class="fa fa-trash-o"></i></a></b>
  <form id="del_article-<?php echo $req['id'];?>">
  <input type="hidden" name="id" value="<?php echo $req['id'];?>">
  <input type="hidden" name="type" value="article">
</form>
</td>
</tr>
<div class="modal fade" id="edit_article_<?php echo $req['id'];?>" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
 <div class="modal-content">
 <div class="modal-header">
<h3 class="modal-title text-center">Edit Issue</h3>
 </div>
 <div class="modal-body">
<form name="edit_article-<?php echo $req['id'];?>" method="post" id="edit_article-<?php echo $req['id'];?>">
 <div class="form-group">
<label for="title">Title</label>
<div class="input-group">
 <span class="input-group-addon">
 <i class="fa fa-user"></i>
 </span>
<input type="text" name="title" value="<?php echo $req['title'];?>" required class="form-control" id="title">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
</div></div>
<div class="form-group">
 <label class="control-label">Issue</label>
 <div class="input-group">
<span class="input-group-addon">
<i class="fa fa-th-list"></i>
</span>
 <select name="issue" id="optionissue" class="form-control input-sm">
 <option>- Issue -</option>
 <?php foreach ($issue as $iss ) {
?> <option value="<?php echo $iss['volume'];?>" <?php if($req['issue']==$iss['issue']){ echo 'selected';}?>><?php echo $iss['issue'];?></option>
<?php }?>
 </select>
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
 <label for="abstract">Abstract</label>
 <div class="input-group">
   <span class="input-group-addon">
   <i class="fa fa-user"></i>
   </span>
   <textarea class="form-control" name="abstract">
     <?php echo $req['abstract'];?>
   </textarea>
 </div></div>
 <div class="form-group" id="editarticlemsg-<?php echo $req['id'];?>"></div>
 </div>
 <div class="modal-footer">
<button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
<button type="button" id="save-article-edit-<?php echo $req['id'];?>" class="btn btn-primary">SUBMIT <i id="loadingarticle-<?php echo $req['id'];?>" class="fa fa-gear fa-spin"></i></button>
 </div>
 </form>
</div>
</div>
 </div>
<script>
$(document).ready(function() {

$('#loadingarticle-<?php echo $req["id"];?>').hide();
$("#del-article-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."admin/delete_item";?>',
      type: "POST",
      data: $('#del_article-<?php echo $req["id"];?>').serialize(),
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
$("#save-article-edit-<?php echo $req['id'];?>").click(function() {
$("#loadingarticle-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."admin/update_issue";?>',
  type: "POST",
  data: $("#edit_article-<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$("#loadingarticle-<?php echo $req['id'];?>").hide();
  if(data=="saved") {
$("#editarticlemsg-<?php echo $req['id'];?>").html('saved');
$("#edit_article-<?php echo $req['id'];?>")[0].reset();
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
$('#editarticlemsg-<?php echo $req["id"];?>').html(data);
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

 <div class="tab-pane" id="tab2">
   <div class="panel">
     <form id="add_article">
       <div class="container-fluid">

             <div class="col-md-6 col-xs-6">
           <div class="form-group">
           <label for="Title">Title</label>
           <div class="input-group">
             <span class="input-group-addon">
             <i class="fa fa-user"></i>
             </span>
           <input type="text" name="title" required=""   class="form-control" id="title" placeholder="Title">
         </div></div></div>

           <div class="col-md-6 col-xs-6"> <div class="form-group">
        <label for="Author">Author <small style="color:red">(seperate with a comma(,) for more than one author)</small></label>
        <div class="input-group">
          <span class="input-group-addon">
          <i class="fa fa-user"></i>
          </span>
        <input type="text" name="author" required=""   class="form-control" id="author" placeholder="Author">
      </div></div></div>

      <div class="col-md-4 col-xs-6">
    <div class="form-group">
    <label for="volume">Volume</label>
    <div class="input-group">
      <span class="input-group-addon">
      <i class="fa fa-user"></i>
      </span>
      <select class="form-control" name="volume" id="volume-select">
        <option>-Select Volume</option>
        <?php foreach ($volume as $vol ) {
       ?> <option value="<?php echo $vol['volume'];?>"><?php echo $vol['volume'];?></option>
     <?php }?>
             </select>
    </div></div></div>

          <div class="col-md-8 col-xs-6">
        <div class="form-group">
        <label for="issue">Issue <i class="fa fa-gear fa-spin" id="loading-issue"></i></label>
        <div class="input-group">
          <span class="input-group-addon">
          <i class="fa fa-user"></i>
          </span>
          <select class="form-control" name="issue" id="getissue">

          </select>
        </div></div></div>

        <div class="col-md-12 col-xs-12">
      <div class="form-group">
      <label for="abstract">Abstract</label>
      <div class="input-group">
        <span class="input-group-addon">
        <i class="fa fa-user"></i>
        </span>
        <textarea class="form-control" name="abstract">
        </textarea>
      </div></div></div>

      <div class="col-md-12 col-xs-6">
      <div class="form-group">
      <label for="file">Upload Article <small style="color:red">(.doc, .docx)</small></label>
      <div class="input-group">
        <span class="input-group-addon">
        <i class="fa fa-user"></i>
        </span>
        <input type="file" class="form-control" name="document">
      </div></div></div>
      <div class="col-md-6 col-sm-6">
              <div class="box-custom-1 text-center">
              hello world
            </div>
          </div>


        <div class="col-md-12 col-xs-12">
      <div class="form-group">
              <button class="btn btn-primary" name="save_personal" type="submit" id="submit">Submit
          <i class="fa fa-gear fa-spin" id="loading"></i>
        </button>
      </div></div>
          <div style="color:red;" class="form-group" id="msg"></div>
        </div>
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
<script>
$(document).ready(function() {

//Hide all loading icons
$('#loading-issue').hide();
$('#loading').hide();
//get Issue list from db
$('#volume-select').on('change',function() {
$('#loading-issue').show();
$.ajax({
  url:'<?php echo base_url()."admin/get_issue";?>',
  type: "POST",
  data: $('#add_article').serialize(),
  success:function(data) {
$('#loading-issue').hide();
$('#getissue').html(data);
  }
})
});

$('#form').submit(function(e){
$('#loading').show();
            e.preventDefault();
                 $.ajax({
                     url:'<?php echo base_url();?>admin/upload_excel',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
$('#loading').hide();
    $('#msg').html(data);
9    }
                 });
            });
         
});
</script>
