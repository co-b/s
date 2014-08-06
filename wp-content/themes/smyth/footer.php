<?php
/**
 * The template for displaying the footer.
 *
 * @package Smyth
 */
?>
		<footer>
			<div class="long-divider"></div>
			<div class="table">
				<div>
					<a class="social instagram" href="/" target="_blank">Instagram</a><a class="social twitter" href="https://twitter.com/SmythRestaurant" target="_blank">Twitter</a><a class="social facebook" href="https://www.facebook.com/SmythRestaurant" target="_blank">Facebook</a>
					<?php wp_nav_menu(array('menu'=>'Footer', 'level' => 0, 'depth' => 1, 'container'=>false, 'menu_id'=>'footer')); ?>
				</div>

				<div>
					<a href="tel:+14148314615">414.831.4615</a>  |  <a href="https://www.google.com/maps/place/Smyth/@43.027552,-87.917249,17z/data=!3m1!4b1!4m2!3m1!1s0x88051996e1d3039b:0x67e72027e527bf7c" target="_blank">500 W Florida St, Milwaukee, WI 53204</a> 
					<a href="http://www.theironhorsehotel.com" target="_blank" class="iron-horse-hotel-logo"></a>
				</div>
			</div>
		</footer>

	</div>
</section>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="<?=get_template_directory_uri()?>/assets/javascripts/application.js"></script>

<?php wp_footer(); ?>

</body>
</html>