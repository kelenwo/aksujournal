

<section id="center" class="center_home"  style="background-color: #def7de;">
  <div class="container">
   <div class="col-xs-12 col-sm-12">
    <div class="col-sm-12 col-xs-12" style="padding: 10px">
  &nbsp;&nbsp;&nbsp;&nbsp;
</div>
    <div class="row">
      <div class="">
        <form id="add_article">
          <div class="container-fluid">

                <div class="col-md-8 col-xs-6">
              <div class="form-group">
              <label for="Title">Title</label>
              <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-user"></i>
                </span>
              <input type="text" name="title" required=""   class="form-control" id="title" placeholder="Title">
            </div></div></div>

            <div class="col-md-8 col-xs-6">
          <div class="form-group">
          <label for="Title">Email Address</label>
          <div class="input-group">
            <span class="input-group-addon">
            <i class="fa fa-user"></i>
            </span>
          <input type="text" name="email" required=""   class="form-control" id="email" placeholder="Email Address">
        </div></div></div>

              <div class="col-md-8 col-xs-6"> <div class="form-group">
           <label for="Author">Author <small style="color:red">(seperate with a comma(,) for more than one author)</small></label>
           <div class="input-group">
             <span class="input-group-addon">
             <i class="fa fa-user"></i>
             </span>
           <input type="text" name="author" required=""   class="form-control" id="author" placeholder="Author">
         </div></div></div>

   <input type="hidden" name="document" value="" id="doc">
   <input type="hidden" name="verify" value="" id="img">
    <input type="hidden" name="date" value="<?php echo date('d-M-Y'); ?>">

    </form>
    <form id="upload">
    <div class="col-md-12 col-xs-6">
    <div class="form-group">
    <label for="file">Upload Article <small style="color:red">(.doc, .docx)</small></label>
    <br><b id="loading-file"><i class="fa fa-spinner fa-spin"></i> Uploading file, please wait.</b>
    <b id="success"></b>
    <div class="input-group">
      <span class="input-group-addon">
      <i class="fa fa-file-word-o"></i>
      </span>
      <input type="file" class="form-control" name="document" id="document">
      <input type="hidden" name="type" value="document">
      <input type="hidden" name="title" value="" id="ttl">
    </div></div></div>
   </form>

   <form id="upload2">
   <div class="col-md-8 col-xs-6">
   <div class="form-group">
   <label for="file">Upload Payment Reciept  <small style="color:red">(.jpg,jpeg,png)</small></label>
   <br><b id="loading-verify"><i class="fa fa-spinner fa-spin"></i> Uploading file, please wait.</b>
   <b id="success2"></b>
   <div class="input-group">
     <span class="input-group-addon">
     <i class="fa fa-file-word-o"></i>
     </span>
     <input type="file" class="form-control" name="verify" id="verify">
     <input type="hidden" name="type" value="verify">
     <input type="hidden" name="title" value="" id="ttls">
   </div></div></div>
 </form>
           <div class="col-md-8 col-xs-12">
         <div class="form-group">
                 <button type="button" class="btn btn-primary" id="submit">Submit
             <i class="fa fa-gear fa-spin" id="loading"></i>
           </button>
         </div></div>
             <div style="color:red;" class="form-group" id="msg"></div>
           </div>
           </div>


          </div>
        </div>


      </div>
    </div>
  </div>
  </div>
</div>
</section>
<script>
$(document).ready(function() {

//Hide all loading icons
$('#loading-issue').hide();
$('#loading-file').hide();
$('#loading-verify').hide();
$('#loading').hide();

//$('#submit').attr('disabled','disabled');
//$('#success').hide();

$('#document').on('change',function() {
  var title = $('#title').val();
$('#ttl').val(title);
$('#upload').submit();
});

$('#verify').on('change',function() {
  $('#loading-verify').show();
  var title = $('#title').val();
$('#ttls').val(title);
$('#upload2').submit();
});

$('#upload').submit(function(e){
$('#loading-file').show();
            e.preventDefault();
                 $.ajax({
                     url:'<?php echo base_url();?>aksu/do_upload',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
$('#loading-file').hide();
$('#success').html(data);
    }
                 });
            });

$('#upload2').submit(function(e){
$('#loading-verify').show();
            e.preventDefault();
                 $.ajax({
                     url:'<?php echo base_url();?>aksu/do_upload',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
$('#loading-verify').hide();
$('#success2').html(data);
$('#submit').removeAttr('disabled');
    }
                 });
            });

$('#submit').on('click',function() {
$('#loading').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/submit";?>',
  type: "POST",
  data: $('#add_article').serialize(),
  success:function(data) {
$('#loading').hide();
alert(data);
}
});
});
});
</script>
