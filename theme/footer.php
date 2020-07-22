<section id="footer_bottom">
 <div class="container">
  <div class="row">
   <div class="col-sm-12">
    <div class="footer_bottom_1 clearfix">
	  <p> ©Department of Agricultural Economics & Extension,
   Faculty of Agriculture,
   Akwa Ibom State University, Nigeria </p>
   <p class="text-center">&copy; 2020 | <a href="">Cube Technologies&trade;</a></p>
	</div>
   </div>
  </div>
 </div>
</section>

<script>
$(document).ready(function(){

/*****Fixed Menu******/
var secondaryNav = $('.cd-secondary-nav'),
   secondaryNavTopPosition = secondaryNav.offset().top;
	$(window).on('scroll', function(){
		if($(window).scrollTop() > secondaryNavTopPosition ) {
			secondaryNav.addClass('is-fixed');	
		} else {
			secondaryNav.removeClass('is-fixed');
		}
	});	
	
});
</script>
</body>
 

</html>
