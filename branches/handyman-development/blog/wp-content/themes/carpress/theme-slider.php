<?php
/**
 * Theme slider
 *
 * @package Carpress
 */
?>
<div id="headerCarousel" class="carousel slide">
	<ol class="carousel-indicators">
		<?php
			$slider = new WP_Query( array(
				'post_type' => 'slider',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'nopaging' => true,
			) );
			$i = -1;
			while ( $slider->have_posts() ) :
				$slider->the_post();
				$i++;
		?>
		<li data-target="#headerCarousel" data-slide-to="<?php echo $i; ?>"<?php echo 0 === $i ? ' class="active"': ''; ?>></li>
		<?php
			endwhile;
			wp_reset_postdata();
		?>
	</ol>
	<div class="carousel-inner">
		<?php
			$i = -1;
			while ( $slider->have_posts() ) :
				$slider->the_post();
				$i++;
		?>
		<div class="item<?php echo 0 === $i ? ' active': ''; ?>">
			<?php the_post_thumbnail( 'slider' ); ?>
		</div>
		<?php
			endwhile;
			wp_reset_postdata();
		?>
	</div>
</div>
<a class="left carousel-control" href="#headerCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
<a class="right carousel-control" href="#headerCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>