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
          <ul id="myTab1" class="nav nav-tabs nav-justified">
            <li class=""><a class="" href="#personal-deetails" data-toggle="tab"></a></li>

          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade  active in" id="personal-deetails">
     <div class="col-md-12">
       <h3>Toggle Portal Open/Closed</h3>
       <hr/>
       <h4>
<label class="toggle">
      <input type="checkbox">
        <span class="handle"></span>
      </label> &nbsp;&nbsp;&nbsp;&nbsp;Portal Open?
</div>
         </form>
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
    </div>

<script>
$(document).ready(function(){
$('#loading').hide();
$("#pay").click(function() {
$('#loading').show();
$.ajax({
url: "<?php echo base_url()."student/generate_rrr";?>",
type: "POST",
success:function(data){
$('#loading').hide();
if(data=='fail') {
  $("#return1").html(data);
} else {
$('#return').html(data);
}
}
});

});
});
</script>
