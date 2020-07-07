
       <div class="home-sec" id="home" >
           <div class="overlay">
 <div class="container">
           <div class="row text-center " >

               <div class="col-lg-12  col-md-12 col-sm-12">

                <div class="flexslider set-flexi" id="main-section" >
                    <ul class=" move-me">
                        <!-- Slider 01 -->
                        <l>
                          <h3>Departmental Elections</h3>
                       <h1>DEPARTMENT OF COMPUTER & ELECTRICAL/ELECTRONICS ENGINEERING</h1>

                        </l>
                        <!-- End Slider 01 -->
                        <br>
                        <h2>Election Ends in</h2>
 <h2 style="font-size:80px;" id="time"></h2>
                        <!-- Slider 02 -->

                    </ul>
                </div>

            </div>

               </div>
                </div>
           </div>

       </div>
       <!--HOME SECTION END-->
    <div  class="tag-line" >
         <div class="container">
           <div class="row text-center">

               <div class="col-lg-12  col-md-12 col-sm-12">

        <h2 data-scroll-reveal="enter from the bottom after 0.1s" ><i class="fa fa-circle-o-notch"></i>
          FACULTY OF ENGINEERING - UNIUYO <i class="fa fa-circle-o-notch"></i> </h2>
                   </div>
               </div>
             </div>
<?php
$lod = $load;
$load = $voted; ?>
    </div>
    <!--HOME SECTION TAG LINE END-->
<div id="load"></div>
<div id="loads"></div>
</div>
   <!-- FEATURES SECTION END-->
<script>
$(document).ready(function(){

$('#load').<?php echo $lod;?>('<?php echo $load;?>');
});
$('#loadingv').hide();
$(document).on("click","#save_vote",function(){

$('#loadingv').show();
   $.ajax({
url:'<?php echo base_url();?>home/save_vote',
type: "POST",
data: $('#savevote').serialize(),
success:function(data) {
$('#loadingv').hide();
    $('#msg').html(data);
    }
                 });
            });
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $stop;?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("time").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("time").innerHTML = "ELECTION ENDED";
$('#load').load('<?php echo base_url();?>home/display_result');
  }
}, 1000);

</script>
