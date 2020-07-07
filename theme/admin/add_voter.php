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

   </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">
<form name="form" id="form">
 <div class="col-md-12">
  <div class="panel">
    <h4>Upload Voters Record</h4>

    <div class="col-md-8 col-xs-8">
   <div class="form-group">
    <label class="control-label">Upload Excel file (.xlx, .xlxs)</label>
    <div class="input-group">
      <span class="input-group-addon">
      <i class="fa fa-file"></i>
      </span>
    <input type="file" name="userfile" class="form-control" id="file" required />
    </div></div></div>
    <div class="col-md-12 col-xs-12">
      <hr/>
      <div id="msg"></div>
<hr/>
      <button type="button" class="btn btn-primary" id="submit">Submit
        <i id="loading" class="fa fa-gear fa-spin"></i></button>

</div>
  </form>
  </div>
  </div>
  </div>
  <!-- Session/semester end -->

</div>
 </div>
</div>

 </div>
 </div>
</div>
</div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
$('#loading').hide();
$('#submit').click(function() {
  $('#loading').show();

  $('#form').submit();
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


    }
                 });
            });
         
 
    });
     
</script>
