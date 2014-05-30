<?php get_header(); ?>

	<?php get_template_part( 'titlearea' ); ?>

	<?php get_template_part( 'breadcrumbs' ); ?>

	<div class="main-content">
		<div class="container">
			<div class="row">
				<?php
					$sidebar = ot_get_option( 'gallery_layout', 'left' );

					if ( "no" == $sidebar ) {
						$main_class_span = 12;
					} else {
						$main_class_span = 9;
					}

					if ( "left" == $sidebar ) {
				?>
				<div class="span3">
					<div class="left sidebar">
						<?php dynamic_sidebar( 'gallery-sidebar' ); ?>
					</div>
				</div>
				<?php } ?>

				<div class="span<?php echo $main_class_span; ?>">
					<div class="row">

						<?php if ( have_posts() ) :
								the_post();
						?>
						<div class="span<?php echo $main_class_span; ?>">
							<div class="lined">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php
									$subtitle = get_post_meta( get_the_ID(), 'subtitle', true );
									if ( ! empty( $subtitle ) ) :
								?>
								<h5><?php echo $subtitle; ?></h5>
								<?php endif; ?>
								<span class="bolded-line"></span>
							</div>

							<?php the_content(); ?>

						</div><!-- /gallery -->

						<div class="span<?php echo $main_class_span; ?>">
							<div class="divide-line">
								<div class="icon icons-<?php echo $content_divider; ?>"></div>
							</div>
						</div>

						<?php else : ?>
							<p><?php _e( 'Gallery not found' , 'carpress_wp'); ?></p>
						<?php endif; ?>

					</div>
				</div><!-- /galleries -->

				<?php
					if ( "right" == $sidebar ) {
				?>
				<div class="span3">
					<div class="right sidebar">
						<?php dynamic_sidebar( 'gallery-sidebar' ); ?>
					</div>
				</div>
				<?php } ?>


			</div><!-- / -->
		</div><!-- /container -->
	</div>

<?php get_footer(); ?>
