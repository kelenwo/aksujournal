<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Slide Panel</h3>
    </div>
                  <div class="panel-body">
<div class="content-row">
              <div class="col-md-12 panel">
<div class="panel-heading">
<div class="panel-title"><b></b>
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
              <form name="form" id="form">
                  <div class="col-md-8 col-xs-8">
              <div class="form-group">
                <label for="name">Contestant ID</label>
                <div class="input-group" title="Registration Number">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <input required type="text" name="id" value="015" class="form-control" placeholder="Contestant ID">
              </div></div></div>
        <div class="col-md-4 col-xs-4">
        <div class="form-group">
<br/>
        <button style="margin-top:7px;" class="btn btn-primary" type="button" id="edit">Edit Contestant
          <i class="fa fa-gear fa-spin" id="loading"></i>
        </button> <span class="btn" id="preturn"></span>
      </div>
    </div>
         </form>
         <div id="freturn"></div>
         <div id="return"></div>
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
$(document).ready(function(){
$('#loading').hide();
$('#edit').trigger('click');
$("#edit").click(function() {
$('#loading').show();
$.ajax({
url: "<?php echo base_url()."admin/get_biodata";?>",
type: "POST",
data: $('#form').serialize(),
success:function(data){
$('#loading').hide();
$("#return").html(data);

}
});

});
});
</script>
