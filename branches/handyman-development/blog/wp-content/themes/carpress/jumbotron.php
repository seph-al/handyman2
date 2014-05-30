<?php
$custom_pattern = get_theme_mod( 'front_bg_pattern_custom', false );
$pattern        = false;

if ( empty( $custom_pattern ) ) {
	$pattern = get_theme_mod( 'front_bg_pattern', false );
}

?>
<div class="jumbotron  <?php echo false !== $pattern ? $pattern : sprintf('" style="background: url(%s);', $custom_pattern); ?>">
	<div class="container">
		<div class="row">
			<div class="span12">
				<?php get_template_part( 'social-icons' ); ?>
			</div>
			<div class="span9">
				<div class="header-padding">
					<h1 class="jumbotron-title"><?php echo get_theme_mod( 'front_title', 'Title' ); ?></h1>
					<p class="jumbotron-text">
						<?php echo get_theme_mod( 'front_txt', 'Front text' ); ?>
					</p>
					<p>
						<a href="<?php echo get_theme_mod( 'front_btn_link', '#' ); ?>" class="btn  btn-warning"<?php echo get_theme_mod( 'front_btn_blank' ) === 'no' ? '' : ' target="_blank"'; ?>><?php echo get_theme_mod( 'front_btn_txt', 'READ MORE' ); ?></a>
					</p>
				</div>
			</div>
			<div class="span3">
				<?php dynamic_sidebar( 'above-slider' ); ?>
			</div>
		</div>

		<div class="bottom-widgets  clearfix">
			<?php dynamic_sidebar( 'jumbotron-bottom' ); ?>
		</div><!-- /.bottom-buttons -->
	</div>
</div>