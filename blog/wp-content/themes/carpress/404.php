<?php get_header(); ?>

<?php get_template_part( 'titlearea' ); ?>

<?php // get_template_part( 'breadcrumbs' ); ?>

	<div class="main-content error-404">
		<div class="slight-gradient">
			<img src="<?php echo get_template_directory_uri() . '/assets/images/404.png'; ?>" alt="<?php _e( 'Error 404' , 'carpress_wp'); ?>" />
		</div>
		<div class="container">
			<div class="row">

				<div class="span12">
					<p class="error-404-txt"><?php printf(
						/* translators: the first string %s for line break, the second and third %s for link to home page wrap */
						__( 'Looks like something went wrong! The page you were looking for is not here. %s Go %sHome%s or try to search' , 'carpress_wp'),
						'<br />',
						'<a href="' . site_url() . '">',
						'</a>'
					); ?>:</p>
					<?php echo get_search_form(); ?>
				</div><!-- /404 -->

			</div><!-- / -->
		</div><!-- /container -->
	</div>

<?php get_footer(); ?>
