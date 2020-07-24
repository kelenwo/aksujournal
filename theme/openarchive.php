<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="template/aksu/css/w3.css">
<link href="template/aksu/css/bootstrap.min.css" rel="stylesheet">
  <link href="template/aksu/css/global.css" rel="stylesheet">
  <link href="template/aksu/css/index.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="template/aksu/css/font-awesome.min.css"/>
    <script src="template/aksu/js/jquery-2.1.1.min.js"></script>
  <script src="template/aksu/js/bootstrap.min.js"></script>

<section id="center" class="center_home" style="background-color: #def7de;">
 	<div class="container">
  		<div class="row">
   			<div class="center_home_2 clearfix">
   				 <div class="col-sm-12 col-xs-12" style="padding: 10px">
          			&nbsp;&nbsp;&nbsp;&nbsp;
        		</div>
   				<div class="col-sm-2"> </div>

				<div class="col-xs-12 col-sm-9" style="color: #000; font-size: 120%">
	 				<div class="center_home_2_inner_1 clearfix">
	   					<div class="center_home_2_inner_1_inner clearfix text-center">
       						<h2 class="" style="text-transform:capitalize;">{archive}</h2>
	   					</div><hr>
	   					<div class="center_home_2_inner_1_inner_1 clearfix">
	    					<div class="col-sm-12 col-md-12">
                  <?php foreach($article as $res): ?>
      		 						<div class="center_home_2_inner_1_inner_1_right clearfix" style="text-transform:uppercase;">
           							<b><h4><?php echo $res['title'];?></h4>
           							<p3><?php echo $res['author'];?></p3></b>

		   							<p><div>
										<div class=""><b><i class="fa fa-eye w3-large w3-margin-right"></i>0 views</b></div>
	<a href="viewarticle/openarchive/<?php echo str_replace(' ','',$res['archive']).'-'.str_replace(' ','_',$res['volume']).'-'.str_replace(' ','_',$res['issue']);?>" rel="nofollow" target="_blank" class="w3-btn w3-border w3-round w3-hover-theme w3-mobile w3-margin-bottom"><i class="fa fa-file-pdf-o"></i> View Abstract</a>
	<a href="viewpdf/archives/articles/publications/<?php echo $res['document'];?>" rel="nofollow" target="_blank" class="w3-btn w3-border w3-round w3-hover-theme w3-mobile w3-margin-bottom"><i class="fa fa-file-pdf-o"></i> View Full Paper</a>
									</div></p>
		 						</div>
              <?php endforeach;?>
							</div>
	   					</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>
