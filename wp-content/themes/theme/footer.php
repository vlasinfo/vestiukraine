<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 no-padding-left">
				<div class="lang-switcher">
					<?php do_action('icl_language_selector'); ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="pull-right copy">Copyright © VESTI</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<!-- jQuery -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<?php if ( is_front_page()) :?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.onepage-scroll.js"></script>
	<!-- Full Page Scroll -->
	<script>
		$(document).ready(function(){
			$(".main").onepage_scroll({
				sectionContainer: "section",
				responsiveFallback: 600,
				loop: true
			});
		});
	</script>
<?php endif;?>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/css3-animate-it.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/salvattore.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/toucheffects.js"></script>
<!-- Salvattore -->

<script>
	"use strict";
	$(window).ready(function() {

		(function($) {
			var  screens = $('.ms-screens div')
				,wrapper = $('.ms-wrapper')
				,object = $('.ms-object')
				;

			screens.bind("click", function(event) {
				event.stopPropagation();
				// console.log('asdadasd');
				wrapper.toggleClass('ms-view-layers');
			});
			object.bind("click", function(event) {
				// event.stopPropagation();
				// console.log('asdadasd');
				wrapper.toggleClass('ms-view-layers');
			});
			window.setTimeout(function (){
					wrapper.toggleClass('ms-view-layers');
					// wrapper.animate({
					// 	"opacity" : 1
					// }
					// , 600
					// ,function () {
					// 	wrapper.toggleClass('ms-view-layers');
					// 	}
					// );
				}
				,1000);
		})($);
	});
</script>

<!-- Slider -->
<script>
	$(document).ready(function(){

		$(".vlas-slider").slick({
			autoplay:true,
			autoplaySpeed:10000,
			speed:600,
			slidesToShow:1,
			slidesToScroll:1,
			pauseOnHover:false,
			dots:true,
			pauseOnDotsHover:true,
			cssEase:'linear',
			// fade:true,
			draggable:false,
			prevArrow:'<button class="PrevArrow"></button>',
			nextArrow:'<button class="NextArrow"></button>',
		});

	})
</script>
<!-- Menu Toggle Script -->
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>

</body>

</html>