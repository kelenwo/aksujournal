

          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default" id="rem">
              <div class="panel-heading">
                <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Panel Title</h3>
              </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                     <a href="<?php echo base_url(); ?>panel/post/newpost" id="newpost" class="btn btn-primary btn-block">NEW POST + </a>
                                    </div>
                                </div>
                  <div class="row">
                      <div class="col-md-6 col-xs-6"> <label class="col-md-2 control-label">Sort BY</label>
                            <div class="btn-group tooltip-demo">
                              <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort By Name Descending"><i class="glyphicon glyphicon-sort-by-alphabet"></i><small>Name</small></button>
                              <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort By Name Ascending"><i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>Name</button>
                              <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort By Id Descending"><i class="glyphicon glyphicon-sort-by-order"></i>Id</button>
                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort By Id Ascending"><i class="glyphicon glyphicon-sort-by-order-alt"></i>Id</button>
                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort By Date Descending"><i class="glyphicon glyphicon-sort-by-attributes"></i>Date</button>
                          <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sort By Date Ascending"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i>Date</button>
                          </div>
                        </div>
                    <div class="col-md-6 col-xs-6">
                      <div class="input-group form-search">

                        <input type="text" class="search-icon glyphicon glyphicon-search form-control search-query">
                        <span class="input-group-btn">
                          <button data-type="last" class="btn btn-primary" type="submit">Search</button>
                        </span>
                      </div>
                    </div>

                </div>

                <div class="col-md-12">
                  <div class="panel">

                    <table class="table table-hover">
                      <thead>
                        <tr class="active">
                          <th>Topic Title</th>
                          <th>Author</th>
                          <th>Category</th>
                          <th>Time</th>
                        </tr>
                      </thead>
                        <?php foreach ($news as $res): ?>
                      <tbody>
                        <tr>
                          <td><?php echo $res['title']; ?></td>
                          <td><?php echo $res['author']; ?></td>

                          <td><?php echo $res['category']; ?></td>
                          <td><?php echo $res['time']; echo ' , '. $res['date']; ?></td>
                        </tr>
<?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
              </div>
              </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
    </div>
    <!--footer-->

  </body>
</html>
<script>

$(document).ready(function(){

$('#newpost').click(function(){
    alert('helo people');
});
});
</script>
