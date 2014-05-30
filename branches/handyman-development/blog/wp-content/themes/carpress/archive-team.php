<?php get_header(); ?>

	<?php get_template_part( 'titlearea' ); ?>

	<?php get_template_part( 'breadcrumbs' ); ?>

	<div class="main-content">
		<div class="container">
			<?php
			$params = array_merge( $wp_query->query_vars, array(
				'orderby' => 'menu_order',
				'nopaging' => true,
				'order' => 'ASC'
			) );
			query_posts( $params );

			?>

			<?php if ( have_posts() ) :
					$member_num = 1;
					while ( have_posts() ) :
						the_post();
						$member_num++;
			?>
			<div class="row">
				<div class="team-member" id="member-id-<?php the_ID(); ?>">
					<?php if ( $member_num % 2 == 0 ) : ?>
					<div class="span3">
						<div class="picture">
							<?php the_post_thumbnail( 'team-large' ); ?>
							<div class="shine-overlay"></div>
						</div>
					</div>
					<div class="span6">
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
						<?php the_content(); ?>
					</div>
					<div class="span3">
						<div class="member-details">
							<div class="lined"><div class="bolded-line"></div></div>

							<?php $team_post_fields = get_post_meta( get_the_ID(), 'team_custom_fields', true );
							if ( ! empty( $team_post_fields ) ) : ?>
								<?php foreach ( $team_post_fields as $custom_key ) : ?>
									<p>
										<strong><?php echo $custom_key['title'] ?>:</strong>
										<?php echo empty( $custom_key['link'] ) ? '' : '<a href="' . $custom_key['link'] . '">'; ?><?php echo $custom_key['description']; ?><?php echo empty( $custom_key['link'] ) ? '' : '</a>'; ?></p>
									<div class="bolded-line"></div>
								<?php endforeach; ?>
							<?php endif; ?>

						</div>
					</div>
					<?php else : ?>
					<div class="span6">
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
						<?php the_content(); ?>
					</div>
					<div class="span3">
						<div class="member-details">
							<div class="lined"><div class="bolded-line"></div></div>

							<?php $team_post_fields = get_post_meta( get_the_ID(), 'team_custom_fields', true );
							if ( ! empty( $team_post_fields ) ) : ?>
								<?php foreach ( $team_post_fields as $custom_key ) : ?>
									<p>
										<strong><?php echo $custom_key['title'] ?>:</strong>
										<?php echo empty( $custom_key['link'] ) ? '' : '<a href="' . $custom_key['link'] . '">'; ?><?php echo $custom_key['description']; ?><?php echo empty( $custom_key['link'] ) ? '' : '</a>'; ?></p>
									<div class="bolded-line"></div>
								<?php endforeach; ?>
							<?php endif; ?>

						</div>
					</div>
					<div class="span3">
						<div class="picture">
							<?php the_post_thumbnail( 'team-large' ); ?>
							<div class="shine-overlay"></div>
						</div>
					</div>
					<?php endif; ?>
				</div><!-- /team-member -->
			</div>

			<div class="row">
				<div class="span12">
					<div class="divide-line">
						<span class="icon icons-<?php echo $content_divider; ?>"></span>
					</div>
				</div>
			</div>

			<?php endwhile; else : ?>
				<p>No members yet</p>
			<?php endif; ?>

		</div><!-- /container -->
	</div>

<?php get_footer(); ?>
