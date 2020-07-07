<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Dashboard</h3>
    </div>
                  <div class="panel-body panel">
<div class="content-row">
            <div class="tab-contents" style="width: 100%;">
     <div class="col-md-12 col-lg-12 col-sm-12">
       <h5>Portal Open? - &nbsp;&nbsp; YES</h5>
       <hr/>
       <h5>Election Starts - &nbsp;&nbsp; <b style="color:red;"><?php echo $start;?></b></h5>
       <h5>Election Stops - &nbsp;&nbsp; <b style="color:red;"><?php echo $stop;?></b></h5>
       <hr/>
     </div>
     <br>
     <h4>Contestants</h4>
     <hr/>      <div id="load">

                      </div>

</div>
</div>
</div>

          </div>
        </div>
<script>
$(document).ready(function(){
$('#load').load('<?php echo base_url();?>admin/display');
});
</script>
