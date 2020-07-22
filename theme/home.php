<head>
    <link rel="stylesheet" href="<?php echo base_url();?>theme/news_scroll.css" type="text/css">
</head>
 <style style="text/css">
        .marquee {
            width:80%;
            height: 50px;
            overflow: hidden;
            position: relative;
            background: ;
            color: #333;
            border: ;
            font-weight: 200px;
            padding-top: 10px;
            padding-bottom: 5px;
            margin-left: 100px;
        }

        .marquee p {
        	font-weight: bold;
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            line-height: 50px;
            text-align: center;
            -moz-transform: translateX(100%);
            -webkit-transform: translateX(100%);
            transform: translateX(100%);
            -moz-animation: scroll-left 0s linear infinite;
            -webkit-animation: scroll-left 0s linear infinite;
            animation: scroll-left 50s linear infinite;
        }

        @-moz-keyframes scroll-left {
            0% {
                -moz-transform: translateX(100%);
            }
            100% {
                -moz-transform: translateX(-100%);
            }
        }

        @-webkit-keyframes scroll-left {
            0% {
                -webkit-transform: translateX(100%);
            }
            100% {
                -webkit-transform: translateX(-100%);
            }
        }

        @keyframes scroll-left {
            0% {
                -moz-transform: translateX(100%);
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }
            100% {
                -moz-transform: translateX(-100%);
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
        }
        .search{
        	padding: 35px 50px 35px;
        	background-color: #c9d8c9;
            margin: 0 0 6px 0;
        	margin-top: 20px;
        	height: 100%;
        	width: 100%;
        	border: none;
            border-radius: 5px;
        }
        .dive{
        	padding-bottom: 5px;
        	display: inherit;
        	border-radius: 10px;
        	border:none;
        	width: 100%;
        	position: relative;
            margin-left: 0px;
            margin-top: -25px;

        }
    </style>

<section id="center" class="center_home" style="background-color: #def7de;">
    <div class="marquee">
        <p> <b>AKSU Journal of Agricultural Economics and Extension (AKSUJAEERD) </b></p>
    </div>
    <div class="container">
        <div class="row">
            <div class="center_home_2 clearfix">

            <!-- Search Panel -->
                <div class="col-xs-12 col-md-12">
                    <div class="search">

                        <!--White space-->
                        <div class="col-md-3 col-xs-2">
                        </div>

                        <div class="col-md-6 col-xs-8">
   	                        <div class="dive">
                                <div class="form-group dive">
                                    <div class="col-md-10 col-xs-10">
                                        <input type="text" class="form-control" style="height: 50px;font-size: 20px;" placeholder="Issue, Author name, Volume..." name="search">
                                    </div>
                                    <div class="col-md-2 col-xs-2" style="margin-left:-25px;margin-top: 2px">
                                        <button type="submit" class="btn btn-success btn-block button" href="" style="min-width: 100px"><i class="fa fa-search"> Search...</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--White Space-->
                        <div class="col-md-3 col-xs-2">
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="margin-top: 10px">
                    <div class="col-md-9 col-xs-12" style="background-color: #c9d8c9; margin-top: 10px;margin-bottom: 10px ">
	                   <div class="center_home_2_inner_1 clearfix">
	                       <div class="center_home_2_inner clearfix" style="margin-right:15px;margin-left:25px; font-size: 25px;text-align: justify;">
		                      <p>AKSU Journal of Agricultural Economics and Extension (AKSUJAEERD) is a peer- reviewed open- access Journal, a publication of the Department of Agricultural Economics and Extension - Akwa Ibom State University, Nigeria. AKSU Journal of Agricultural Economics and Extension (AKSUJAEERD) is published in both ONLINE (electronic) and PRINT (hard-copy) versions. These papers are reviewed by eminent scientists.</p>
      	                    </div>
		                </div>
	                </div>

                    <!-- START SCROLLING NEWS WINDOW -->
                    <div class="col-md-2 col-xs-3" style="padding: 0;margin:10px -5px 0px 25px; background-color: #c9d8c9">
                        <div id="news_iframe_scroll">
                            <div class="news_scroll-title">
                                News and Updates<br>
                            </div>
<iframe name="NewsIFrame" src="<?php echo base_url();?>theme/news_scroll.php" frameborder="0" scrolling="no"></iframe>
                        </div>
                    </div>
                    <!-- END SCROLLING NEWS WINDOW -->
                </div>
	       </div>
        </div>
    </div>
</section>
