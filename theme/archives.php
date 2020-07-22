
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url();?>theme/aksu/css/w3.css">
<link href="<?php echo base_url();?>theme/aksu/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>theme/aksu/css/global.css" rel="stylesheet">
  <link href="<?php echo base_url();?>theme/aksu/css/index.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>theme/aksu/css/font-awesome.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
  <script src="<?php echo base_url();?>theme/aksu/js/jquery-2.1.1.min.js"></script>
  <script src="<?php echo base_url();?>theme/aksu/js/bootstrap.min.js"></script>

<section id="center" class="center_home" style="background-color: #def7de;">
  <div class="container">
    <div class="row">
      <div class="center_home_2 clearfix">
        <div class="col-sm-12 col-xs-12" style="padding: 10px">
          &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="col-sm-12 col-xs-12" style="height: 400px">
          <div class="center_home_2_inner_1 clearfix" style="text-align: center;color: #000">
            <h1><b>Archives</b></h1>
	          <hr>

              <div class="col-md-6 col-xs-6" style="text-transform: capitalize;">
                <div class="w3-container">
  <?php $i=0;  foreach($archive as $req): ?>
      <a onclick="myFunction('Demo<?php echo $req['archive'];?>')" class="n w3-block w3-large w3-left" onclick="openAccordion('archive0')" href="javascript:void(0)">
        <h3><i class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;<?php echo $req['archive'];?>&nbsp;Archive<i id="archive0_i" class="fa fa-caret-right w3-right"></i></h3>
                  </a>

     <div id="Demo<?php echo $req['archive'];?>" class="w3-hide w3-animate-zoom">
     <ul>
 <?php  foreach($issue as $res): ?>
<?php if($res['archive'] == $req['archive']): ?>
  <li><a style="padding-right:4px;padding-left:4px;margin: 5px" class="w3-bar-item w3-btn w3-hover-theme w3-large"
    href="<?php echo base_url();?>aksu/archive/openarchive/<?php echo $res['archive'].'-'.str_replace(' ','_',$res['volume']).'-'.str_replace(' ','_',$res['issue']);?>">
         <i class="fa fa-book"></i><?php echo $res['archive'].'&nbsp;'.$res['volume'].'&nbsp;&nbsp;'.$res['issue'];?></a></li>
       <?php endif;?>
<?php endforeach;?>
     </ul>
   </div>
        <?php endforeach;?>
 </div>
              </div>

                <script>
 function myFunction(id) {
   var x = document.getElementById(id);
   if (x.className.indexOf("w3-show") == -1) {
     x.className += " w3-show";
   } else {
     x.className = x.className.replace(" w3-show", "");
   }
 }
                </script>

          </div>
     	  </div>
	    </div>
    </div>
  </div>
</section>
