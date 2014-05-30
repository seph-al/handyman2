<?php
/*
Template Name: Front Page Template With Widgets
*/
?>

<?php get_header(); ?>

	<?php get_template_part( 'jumbotron' ); ?>

	<div class="main-content">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'home-above-map' ); ?>
			</div>
		</div><!-- /container -->

		<?php if ( 'yes' === get_theme_mod( 'maps_front_page', 'yes' ) ) {
			echo '<div id="gmaps-wide-container" class="with-margin"></div>';
		} ?>

		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'home-under-map' ); ?>
			</div>
		</div><!-- /container -->
	</div>


<?php get_footer(); ?>