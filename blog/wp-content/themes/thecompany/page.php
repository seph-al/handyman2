<?php global $rf_theme_options, $wp_query;
get_header();
the_post();

$pageid = get_the_ID();
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

if (isset($rf_theme_options['cp_sidebar_position'])) $sidebar_pos = $rf_theme_options['cp_sidebar_position'];
if (isset($pageid)) $sidebar_pos_page = get_post_meta($pageid, "pagelayout", true);
if (isset($sidebar_pos_page) && $sidebar_pos_page != '' && $sidebar_pos_page != 'Global setting') $sidebar_pos = $sidebar_pos_page;
?>


<div id="page-title">

	<?php if (!is_front_page()) { ?>
	<div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <h1><?php the_title() ?></h1>
                
            </div>
        </div>
    </div>
    <?php } ?>
    
</div>



<div class="container">

    <div class="row">
    
        <div class="<?php if (isset($sidebar_pos) && $sidebar_pos == 'Fullwidth page') { echo 'col-md-12'; } elseif ($sidebar_pos == 'Sidebar left') { echo 'col-md-8 col-md-offset-1 sidebar-left'; } else { echo 'col-md-8'; } ?>">
    
            <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    
                <div class="post-content">
    
                    <?php the_content() ?>
    
                </div>
                
                <?php comments_template(); ?>
    
            </div><!-- .post -->
            
        </div>
        
        <?php get_sidebar(); ?>
        
    </div>

</div>

<?php get_footer(); ?>