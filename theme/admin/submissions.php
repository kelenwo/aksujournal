<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Submissions</h3>
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
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Submissions</a></li>
 <li></li>

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
  <th>Author(s)</th>
  <th>Date Submitted</th>
  <th>Actions</th>
</tr>
</thead>
  <tbody>
<?php if($submission==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($submission as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><?php echo $req['title']; ?></td>  <td><?php echo $req['volume']; ?></td>
<td><?php echo $req['date']; ?></td>
<td class="actions">
  <a disabled href="#edit_article_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fa fa-pencil"></i></a>|
  <a href="<?php echo base_url();?>download/articles/submissions/<?php echo $req['document'];?>" id="dl-article-<?php echo $req['id'];?>"><b style="color:red;">(.docx)&nbsp;<i class="fa fa-download"></i>
</a></b>|
  <a id="del-article-<?php echo $req['id'];?>"><b style="color:red;">delete&nbsp;<i class="fa fa-trash-o"></i></a></b>
  <form id="del_article-<?php echo $req['id'];?>">
  <input type="hidden" name="id" value="<?php echo $req['id'];?>">
  <input type="hidden" name="type" value="article">
</form>
</td>
</tr>

<script>
$(document).ready(function() {

//delete article
$('#loadingarticle-<?php echo $req["id"];?>').hide();
$("#del-article-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."ucp/manage/delete_item";?>',
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
$('#loading-issue').hide();
$('#loading-file').hide();
$('#loading').hide();
$('#submit').attr('disabled','disabled');
//$('#success').hide();

//get Issue list from db
$('#volume-select').on('change',function() {
$('#loading-issue').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/get_issue";?>',
  type: "POST",
  data: $('#add_article').serialize(),
  success:function(data) {
$('#loading-issue').hide();
$('#getissue').html(data);
  }
});
});

$('#document').on('change',function() {
  var title = $('#title').val();
$('#ttl').val(title);
$('#upload').submit();
});

$('#upload').submit(function(e){
$('#loading-file').show();
            e.preventDefault();
                 $.ajax({
                     url:'<?php echo base_url();?>ucp/manage/do_upload',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
$('#loading-file').hide();
$('#success').html(data);
$('#submit').removeAttr('disabled');
    }
                 });
            });

$('#submit').on('click',function() {
$('#loading').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/publish_article";?>',
  type: "POST",
  data: $('#add_article').serialize(),
  success:function(data) {
$('#loading').hide();
if(data=="true") {
alert('Article has been published successfully');
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
} else {
  $('#msg').html(data);
}
  }
})
});
});
</script>
