<?php global $wp_query, $rf_theme_options;
if (isset($wp_query->post->ID)) { 
	$pageid = $wp_query->post->ID;
} else {
	$pageid = '';
}
if (is_home()) { 
	$pageid = get_option( 'page_for_posts' );
} 
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
		$pageid = get_option('woocommerce_shop_page_id'); 
	} elseif (is_cart()) {
		$pageid = get_option('woocommerce_cart_page_id');
	} elseif (is_checkout()) {
		$pageid = get_option('woocommerce_checkout_page_id'); 
	} elseif (is_account_page()) {
		$pageid = get_option('woocommerce_myaccount_page_id');
	}
}

$sidebar_id = strtolower(get_post_meta($pageid, "sidebar", true));

if (isset($rf_theme_options['cp_sidebar_position'])) $sidebar_pos = $rf_theme_options['cp_sidebar_position'];
if (isset($pageid)) $sidebar_pos_page = get_post_meta($pageid, "pagelayout", true);
if (isset($sidebar_pos_page) && $sidebar_pos_page != '' && $sidebar_pos_page != 'Global setting') $sidebar_pos = $sidebar_pos_page;

if (!$sidebar_id) {
	$sidebar_id = 'sidebar';
}

if (isset($sidebar_pos) && $sidebar_pos != 'Fullwidth page' && is_active_sidebar($sidebar_id)) { ?>
	<div id="sidebar" class="col-md-3 hidden-sm hidden-xs <?php if (isset($sidebar_pos) && $sidebar_pos == 'Sidebar right') echo 'col-md-offset-1'; ?>">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar_id) ) : 
        endif; ?>
	</div>
<?php } ?>