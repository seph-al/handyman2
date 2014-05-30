<?php
/**
 * Functions for the basic WooCommerce implementation
 *
 * @package Carpress
 */


if ( is_woocommerce_active() ) {

	/**
	 * Theme compatibility
	 *
	 * @link http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
	 */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);



	/**
	 * Missing HTML markup before and after the shop items
	 */
	add_action('woocommerce_before_main_content', 'carpress_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'carpress_theme_wrapper_end', 10);

	function carpress_theme_wrapper_start() {
		get_template_part( 'titlearea' );

		?>

		<div class="main-content">
			<div class="container">
				<div class="row">
					<div class="span3">
						<div class="left sidebar">
							<?php dynamic_sidebar( 'shop-sidebar' ); ?>
						</div>
					</div>
					<div class="span9">
		<?php
	}

	function carpress_theme_wrapper_end() {
		?>
					</div>
				</div><!-- / -->
			</div><!-- /container -->
		</div>
		<?php
	}


	// Display custom number of products per page
	function custom_number_of_products_per_page( $cols ) {
		return get_single_theme_mod( 'products_per_page', $cols );
	}
	add_filter( 'loop_shop_per_page', 'custom_number_of_products_per_page', 20 );

	// remove the title, because we show it elsewhere
	add_filter( 'woocommerce_show_page_title', '__return_false' );

	add_filter( 'woocommerce_get_sidebar', '__return_false' );
}