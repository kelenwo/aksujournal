<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Slide Panel</h3>
    </div>
                  <div class="panel-body">
<div class="content-row">
              <div class="col-md-12 panel">
<div class="panel-heading">
<div class="panel-title"><b>Pay School Fees</b>
</div>

<div class="panel-options">
<a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
<a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
<a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
</div>
</div>

        <div class="">
          <div class="">
            <div class="tab-contents">
          <div id="myTabContent" class="tab-content">
            <div>
              <form name="get_student" id="get_student">
                  <div class="col-md-8 col-xs-8">
              <div class="form-group">
                <label for="name">Registration Number</label>
                <div class="input-group" title="Registration Number">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <input required value="registration number" type="text" name="registration_number" class="form-control" placeholder="Registration Number">
              </div></div></div>
        <div class="col-md-4 col-xs-4">
        <div class="form-group">
<br/>
        <button style="margin-top:7px;" class="btn btn-primary" type="button" id="edit">Edit student
          <i id="loading">{loading}</i>
        </button> <span class="btn" id="preturn"></span>
      </div>
    </div>
         </form>
         <div id="return"></div>
</div>
</div>
<div id="bio-content"></div>
          </div>
        </div>
                    </div>


                  </div>

                </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function(){
$('#loading').hide();
$("#edit").click(function() {
$('#loading').show();
$.ajax({
url: "<?php echo base_url()."admin/get_biodata";?>",
type: "POST",
data: $('#get_student').serialize(),
success:function(data){
$('#loading').hide();

$("#bio-content").html(data);

}
});

});
});
</script>
