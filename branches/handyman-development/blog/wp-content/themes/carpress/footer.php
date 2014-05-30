<?php
/**
 * The template for displaying the footer.
 *
 * @package Carpress
 * @since 1.0.0
 */
?>

	<div class="foot">
		<a href="#" id="to-the-top">
			<i class="fa  fa-chevron-up"></i>
		</a>
		<div class="container">

			<div class="row">

				<?php dynamic_sidebar( 'footer-sidebar-area' ); ?>

			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /foot -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="span6">
					<?php echo ot_get_option( 'footer_left', '&copy; Copyright 2013' ); ?>
				</div>
				<div class="span6">
					<div class="pull-right">
					<?php echo ot_get_option( 'footer_right', 'Carpress Theme by <a href="http://www.proteusthemes.com">ProteusThemes</a>' ); ?>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div><!-- .boxed-container -->

<?php echo ot_get_option('footer_scripts', ''); ?>

<?php wp_footer(); ?>
<!-- W3TC-include-js-body-end -->
</body>
</html>