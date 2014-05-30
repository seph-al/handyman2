<?php
/*
Template Name: Contact Page without Sidebar
*/
?>

<?php get_header(); ?>

	<?php get_template_part( 'titlearea' ); ?>

	<?php get_template_part( 'breadcrumbs' ); ?>

	<div id="gmaps-wide-container"></div>

	<div class="main-content">
		<div class="container">
			<div class="row">

				<div class="span12">
					<div class="row">

						<?php the_post(); ?>

						<div class="span12">
							<div class="lined">
								<h2><?php the_title(); ?></h2>
								<?php
									$subtitle = get_post_meta( get_the_ID(), 'subtitle', true );
									if ( ! empty( $subtitle ) ) :
								?>
								<h5><?php echo $subtitle; ?></h5>
								<?php endif; ?>
								<span class="bolded-line"></span>
							</div>
							<div class="row">
								<div class="span12">
									<?php the_content(); ?>
								</div>
							</div>
						</div>

					</div>
				</div>



			</div><!-- / -->
		</div><!-- /container -->
	</div>

<?php get_footer(); ?>
