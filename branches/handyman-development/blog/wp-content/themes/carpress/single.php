<?php get_header(); ?>

	<?php get_template_part( 'titlearea' ); ?>

	<?php get_template_part( 'breadcrumbs' ); ?>

	<div class="main-content">
		<div class="container">
			<div class="row">
				<?php
					$sidebar = ot_get_option( 'blog_layout', 'left' );

					if ( "no" == $sidebar ) {
						$main_class_span = 12;
					} else {
						$main_class_span = 9;
					}

					if ( "left" == $sidebar ) {
				?>
				<div class="span3">
					<div class="left sidebar">
						<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					</div>
				</div>
				<?php } ?>

				<div class="span<?php echo $main_class_span; ?>">
					<div class="row">

						<?php if ( have_posts() ) :
								the_post();
						?>
						<div <?php post_class( "span" . $main_class_span ); ?>>
							<div class="post-inner">
								<div class="lined">
									<h2><?php the_title(); ?></h2>
									<div class="meta-data">
										<?php the_time( get_option( 'date_format' ) ); ?>  &nbsp; | &nbsp;
										<?php _e( 'Author' , 'carpress_wp'); ?>: <?php the_author(); ?> &nbsp; | &nbsp;
										<a href="<?php comments_link(); ?>"><?php comments_number( __( 'No comments' , 'carpress_wp'), __( 'One comment' , 'carpress_wp'), __( '% comments' , 'carpress_wp') ); ?></a> &nbsp; | &nbsp;
										<?php _e( 'Categories' , 'carpress_wp'); ?>: <?php the_category(' &bull; '); ?><?php if( has_tag() ) { ?> &nbsp; | &nbsp; <?php _e( 'Tags' , 'carpress_wp'); ?>: <?php the_tags( '', ' &bull; ' ); ?>
											<?php } ?>
									</div>
									<span class="bolded-line"></span>
								</div>
								<?php the_content(); ?>

								<?php
									$args = array(
										'before'           => '<div class="inner-post-navigation clearfix">' . __('Pages:', 'carpress_wp') . ' ',
										'after'            => '</div>',
										'link_before'      => '<span class="btn btn-theme no-bevel">',
										'link_after'       => '</span>',
										'echo'             => 1
									);
									wp_link_pages( $args );
								?>

							</div>
						</div><!-- /blogpost -->

						<div class="span<?php echo $main_class_span; ?>">
							<div class="divide-line">
								<div class="icon icons-<?php echo $content_divider; ?>"></div>
							</div>
						</div>

						<?php else : ?>
							<div class="span<?php echo $main_class_span; ?>">
								<div class="lined">
									<h2><?php _e( 'Not Found' , 'carpress_wp'); ?></a></h2>
									<span class="bolded-line"></span>
								</div>
								<p><?php _e( 'Page not found' , 'carpress_wp'); ?></p>
							</div>
						<?php endif; ?>


						<!--  ==========  -->
						<!--  = Comments =  -->
						<!--  ==========  -->
						<?php comments_template( '', true ); ?>

						<div class="span<?php echo $main_class_span; ?>">
							<div class="divide-line">
								<div class="icon icons-<?php echo $content_divider; ?>"></div>
							</div>
						</div>

					</div>
				</div><!-- /blog -->

				<?php if ( "right" == $sidebar ) { ?>
				<div class="span3">
					<div class="right sidebar">
						<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					</div>
				</div>
				<?php } ?>

			</div><!-- / -->
		</div><!-- /container -->
	</div>

<?php get_footer(); ?>
