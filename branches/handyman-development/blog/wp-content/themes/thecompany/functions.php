<?php global $rf_theme_name, $rf_theme_options;
$rf_theme_name = 'thecompany';
$rf_theme_options = get_option($rf_theme_name);



// Tells WordPress to setup the theme
function rf_theme_setup() {
	global $rf_theme_options;
	
	// Load textdomain for translation plugins
	load_theme_textdomain( 'thecompany' );
	
	// Register the wp3 menu
	register_nav_menus(
		array(
			'main-menu' => 'Main menu',
			'footer-menu' => 'Footer menu',
			'mobile-menu' => 'Mobile main menu'
		)
	);
	
	// Add support for post formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
	
	// Add RSS feeds to the header
	add_theme_support( 'automatic-feed-links' );
	
	// Add WooCommerce support
	add_theme_support( 'woocommerce' );

	// Custom media image sizes
	if ( function_exists( 'add_image_size' ) ) {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'portfolio-2', 600, 999999 );
		add_image_size( 'fullwidth', 1920, 999999, true );
	}	
	
	//register the sidebars
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name' => 'Sidebar',
			'id' => 'sidebar',
			'before_widget' => '<div class="sidepanel ===columnnumber===">',
			'after_widget' => '</div>',
			'before_title' => '<div class="sigline"></div><h3>',
			'after_title' => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer',
			'id' => 'footer-widgets',
			'before_widget' => '<div class="sidepanel ===columnnumber===">',
			'after_widget' => '</div>',
			'before_title' => '<div class="sigline"></div><h3>',
			'after_title' => '</h3>'
		));
		if (isset($rf_theme_options['cp_sidebars']) && $rf_theme_options['cp_sidebars'] != '') {
			$sidebars = explode(',',$rf_theme_options['cp_sidebars']);
			foreach ($sidebars as $sidebarName) {
				if (isset($sidebarName) && $sidebarName != '') {
					$title = str_replace(' ','',$sidebarName);
					$id = strtolower($title);
					register_sidebar(array(
						'name' => $title,
						'id' => $id,
						'before_widget' => '<div class="sidepanel ===columnnumber===">',
						'after_widget' => '</div>',
						'before_title' => '<div class="sigline"></div><h3>',
						'after_title' => '</h3>'
					));
				}
			}
		}
	}
}
add_action( 'after_setup_theme', 'rf_theme_setup' );



// Include the admin controlpanel
require_once(TEMPLATEPATH . '/backend/controlpanel.php');
$rf_cpanel = new rf_ControlPanel();
require_once(TEMPLATEPATH . '/backend/customfields.php');



// Load frontend scripts
function rf_script_loader() {
	global $rf_theme_options;
	
	if (!is_admin()) {
		wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
		wp_enqueue_style('bootstrap');
		
		wp_register_style('style', get_bloginfo('stylesheet_url'), array('bootstrap'));
		wp_enqueue_style('style');
		
		wp_register_style('woocommerce-custom', get_template_directory_uri().'/css/woocommerce-custom.css', array('woocommerce-general'));
		wp_enqueue_style('woocommerce-custom');
		
		wp_register_style('fontawesome', get_template_directory_uri().'/css/font-awesome.min.css', array('style'));
		wp_enqueue_style('fontawesome');
		
		if (isset($rf_theme_options['cp_font1_source'])) {
			wp_register_style('font1', $rf_theme_options['cp_font1_source'], array('style'));
			wp_enqueue_style('font1');
		}
		
		if (isset($rf_theme_options['cp_font2_source'])) {
			wp_register_style('font2', $rf_theme_options['cp_font2_source'], array('style'));
			wp_enqueue_style('font2');
		}

		wp_enqueue_script('jquery');
		
		wp_register_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '', true);
		wp_enqueue_script('bootstrap-js');
		
		wp_register_script('svg-snap', get_template_directory_uri().'/js/snap.svg-min.js', array('jquery'), '', true);
		wp_enqueue_script('svg-snap');
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
}
add_action('wp_enqueue_scripts', 'rf_script_loader');



// Load styles from the Theme Settings
function rf_load_style_settings() {
	include_once('style.php');
}
add_action('wp_head', 'rf_load_style_settings', 999);



// Load the theme jQuery
function rf_load_script_settings() {
	include_once('jquery.php');
}
add_action('wp_footer', 'rf_load_script_settings');



// Load backend scripts
function rf_admin_script_loader() {
	wp_register_style('controlpanel', get_template_directory_uri().'/backend/css/controlpanel.css');
	wp_enqueue_style('controlpanel');
	
	wp_enqueue_script('jquery-ui-core', array('jquery'));
	
	wp_register_style('mycolorpicker_style', get_template_directory_uri().'/backend/css/colorpicker.css');
	wp_enqueue_style('mycolorpicker_style');
	wp_register_script('mycolorpicker', get_template_directory_uri().'/backend/js/colorpicker.js', array('jquery-ui-core'));
	wp_enqueue_script('mycolorpicker');
	wp_register_script('mycolorpicker_eye', get_template_directory_uri().'/backend/js/eye.js', array('jquery-ui-core'));
	wp_enqueue_script('mycolorpicker_eye');
	wp_register_script('mycolorpicker_utils', get_template_directory_uri().'/backend/js/utils.js', array('jquery-ui-core'));
	wp_enqueue_script('mycolorpicker_utils');
	wp_register_script('mycolorpicker_layout', get_template_directory_uri().'/backend/js/layout.js?ver=1.0.2', array('jquery-ui-core'));
	wp_enqueue_script('mycolorpicker_layout');
		
	wp_register_script('controlpanel_js', get_template_directory_uri().'/backend/js/controlpanel.js', array('mycolorpicker'));
	wp_enqueue_script('controlpanel_js');
	
	wp_register_script('upload', get_template_directory_uri().'/backend/js/upload.js', array('jquery'));
	wp_enqueue_script('upload');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	
	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_script('jquery-ui-sortable');
	wp_register_script('sortable', get_template_directory_uri().'/backend/js/sortable.js', array('jquery-ui-sortable'));
	wp_enqueue_script('sortable');
	
	wp_register_script('pagetemplateselect', get_template_directory_uri().'/backend/js/pagetemplateselect.js');
	wp_enqueue_script('pagetemplateselect');
	
	wp_register_script('jsvalueslider', get_template_directory_uri().'/backend/js/valueslider.js');
	wp_enqueue_script('jsvalueslider');
}
add_action('admin_enqueue_scripts', 'rf_admin_script_loader');



function rf_theme_init() {
	global $rf_theme_options;
	
	// Custom post type for sections
	$section_labels = array(
	  'name' => __('Sections', 'thecompany'),
	  'singular_name' => __('Sections', 'thecompany'),
	  'add_new' => __('Add New', 'thecompany'),
	  'add_new_item' => __('Add New Section', 'thecompany'),
	  'edit_item' => __('Edit Section', 'thecompany'),
	  'new_item' => __('New Section', 'thecompany'),
	  'view_item' => __('View Section', 'thecompany'),
	  'search_items' => __('Search Sections', 'thecompany'),
	  'not_found' =>  __('No Sections found', 'thecompany'),
	  'not_found_in_trash' => __('No Sections found in Trash', 'thecompany'), 
	  'parent_item_colon' => '',
	  'menu_name' => 'Sections'	
	);
	$section_args = array(
	  'labels' => $section_labels,
	  'public' => true,
	  'publicly_queryable' => true,
	  'exclude_from_search' => true,
	  'show_ui' => true, 
	  'show_in_menu' => true, 
	  'query_var' => true,
	  'rewrite' => true,
	  'capability_type' => 'post',
	  'has_archive' => false, 
	  'hierarchical' => false,
	  'menu_position' => 20,
	  'supports' => array('title','thumbnail','editor','custom-fields')
	);
	register_post_type('section',$section_args);
	
	// Custom post type for portfolio
	$portfolio_labels = array(
	  'name' => __('Portfolio', 'thecompany'),
	  'singular_name' => __('Portfolio', 'thecompany'),
	  'add_new' => __('Add New Item', 'thecompany'),
	  'add_new_item' => __('Add New Portfolio Item', 'thecompany'),
	  'edit_item' => __('Edit Portfolio Item', 'thecompany'),
	  'new_item' => __('New Portfolio Item', 'thecompany'),
	  'view_item' => __('View Portfolio Item', 'thecompany'),
	  'search_items' => __('Search Portfolio', 'thecompany'),
	  'not_found' =>  __('No Portfolio items found', 'thecompany'),
	  'not_found_in_trash' => __('No Portfolio items found in Trash', 'thecompany'), 
	  'parent_item_colon' => '',
	  'menu_name' => 'Portfolio items'	
	);
	
	$rf_portfolio_slug = 'portfolio';
	if (isset($rf_theme_options['cp_portfolio_slug']) && $rf_theme_options['cp_portfolio_slug'] != '') $rf_portfolio_slug = $rf_theme_options['cp_portfolio_slug'];
	
	$portfolio_args = array(
	  'labels' => $portfolio_labels,
	  'public' => true,
	  'publicly_queryable' => true,
	  'show_ui' => true, 
	  'show_in_menu' => true, 
	  'query_var' => true,
	  'rewrite' => array( 'slug' => $rf_portfolio_slug ),
	  'capability_type' => 'post',
	  'has_archive' => false, 
	  'hierarchical' => false,
	  'menu_position' => 21,
	  'supports' => array('title','thumbnail','editor','excerpt','custom-fields')
	); 
	register_post_type('portfolio',$portfolio_args);
	
	// create a new taxonomy: Portfolio category
	$portfolio_cat_labels = array(
		'name'              => _x( 'Portfolio category', 'taxonomy general name', 'thecompany' ),
		'singular_name'     => _x( 'Portfolio category', 'taxonomy singular name', 'thecompany' ),
		'search_items'      => __( 'Search categories', 'thecompany' ),
		'all_items'         => __( 'All categories', 'thecompany' ),
		'parent_item'       => __( 'Parent category', 'thecompany' ),
		'parent_item_colon' => __( 'Parent category:', 'thecompany' ),
		'edit_item'         => __( 'Edit category', 'thecompany' ),
		'update_item'       => __( 'Update category', 'thecompany' ),
		'add_new_item'      => __( 'Add New category', 'thecompany' ),
		'new_item_name'     => __( 'New category', 'thecompany' ),
		'menu_name'         => __( 'Portfolio category', 'thecompany' ),
	);	
	$portfolio_cat_args = array(
		'hierarchical'      => true,
		'labels'            => $portfolio_cat_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfoliocat' ),
	);
	register_taxonomy( 'portfoliocat', array( 'portfolio' ), $portfolio_cat_args );
}
add_action( 'init', 'rf_theme_init', 5);



// Default navigation menu before menu setup
function rf_emptymenu() {
	echo "<div class='empty-menu'>You haven't set up a navigation menu yet. You can do this under 'Appearance -> Menus'.</div>";
}



// Setting editor content width
if ( ! isset( $content_width ) ) $content_width = 900;



// Force wordpress to use full image quality (no compression)
function jpeg_full_quality( $quality ) { 
	return 100;
}
add_filter( 'jpeg_quality', 'jpeg_full_quality' );



// hex to rgb converter
function rf_hex2rgb($hex) {
   if (isset($hex)) {
	   $hex = str_replace("#", "", $hex);
	
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   
	   return implode(",", $rgb);
   }
}



// Set up default WooCommerce
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'rf_woocommerce_image_dimensions', 1 );

function rf_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '400',	// px
		'height'	=> '400',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '400',	// px
		'height'	=> '400',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '100',	// px
		'height'	=> '100',	// px
		'crop'		=> 1 		// true
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}



// WooCommerce wrappers, filters and hooks
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
	
	function my_theme_wrapper_start() {
		global $rf_theme_options, $wp_query;
		
		if (isset($wp_query->post->ID)) $pageid = $wp_query->post->ID;
		if (is_home()) { 
			$pageid = get_option( 'page_for_posts' );
		} elseif (is_shop() || is_product_category() || is_product_tag() || is_product()) {
			$pageid = get_option('woocommerce_shop_page_id'); 
		} elseif (is_cart()) {
			$pageid = get_option('woocommerce_cart_page_id');
		} elseif (is_checkout()) {
			$pageid = get_option('woocommerce_checkout_page_id'); 
		} elseif (is_account_page()) {
			$pageid = get_option('woocommerce_myaccount_page_id');
		} else {
			$pageid = '';
		}
		
		$sidebar_pos = $rf_theme_options['cp_sidebar_position'];
		$sidebar_pos_page = get_post_meta($pageid, "pagelayout", true);
		if (isset($sidebar_pos_page) && $sidebar_pos_page != '' && $sidebar_pos_page != 'Global setting') $sidebar_pos = $sidebar_pos_page; ?>
		
		<div id="page-title" style="background-image: url('<?php echo $rf_theme_options['cp_headerimage']; ?>'); background-color:#<?php echo $rf_theme_options['cp_headercolor']; ?>">
			
            <?php if (!is_front_page() || (is_front_page() && $rf_theme_options['cp_frontpage_header'] =! 'hide')) { ?>
            <div class="container">
				<div class="row">
					<div class="col-sm-12">
						
						<h1><?php woocommerce_page_title(); ?></h1>
						
					</div>
				</div>
			</div>
            <?php } ?>
            
		</div>
		
		<div class="container"><div class="row"><div class="<?php if (isset($sidebar_pos) && $sidebar_pos == 'Fullwidth page') { echo 'col-md-12'; } elseif ($sidebar_pos == 'Sidebar left') { echo 'col-md-8 col-md-offset-1 sidebar-left'; } else { echo 'col-md-8'; } ?>"><div class="hentry">
	<?php }
	
	function my_theme_wrapper_end() {
		echo '</div></div>';
	}
	
	function rf_woocommerce_title($wc_title) {
		return false;
	}
	add_filter('woocommerce_show_page_title', 'rf_woocommerce_title');
	
	remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
	
	function rf_woocommerce_sidebar_end() {
		echo '</div></div>';
	}
	add_action('woocommerce_sidebar', 'rf_woocommerce_sidebar_end', 99);
	
	function rf_woocommerce_before_mini_cart() {
		echo '<div id="shopcartcontent">';
	}
	add_action('woocommerce_before_mini_cart', 'rf_woocommerce_before_mini_cart', 1);
	
	function rf_woocommerce_widget_shopping_cart_before_buttons() {
		echo '</div><div id="shopcartbuttons">';
	}
	add_action('woocommerce_widget_shopping_cart_before_buttons', 'rf_woocommerce_widget_shopping_cart_before_buttons', 1);
	
	function rf_woocommerce_after_mini_cart() {
		echo '</div>';
	}
	add_action('woocommerce_after_mini_cart', 'rf_woocommerce_after_mini_cart', 99);
}



// Single comment format
function rf_custom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
    
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
	<?php endif; ?>
    
    <div class="comment-meta commentmetadata">
    	<div class="comment-meta-part vcard">
			<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </div>
    	<div class="comment-meta-part">
			<?php printf(__('<cite class="fn">%s</cite> says:', 'thecompany'), get_comment_author_link()) ?>
            <br />
			<?php printf( __('%1$s at %2$s', 'thecompany'), get_comment_date(),  get_comment_time()) ?>
            <?php edit_comment_link(__('(Edit)', 'thecompany'),'  ','' ); ?>
        </div>
	</div>

    <div class="comment-content">
    	<?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'thecompany') ?></em>
        <?php endif; ?>
    
        <?php comment_text() ?>
    </div>

    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
    
	<?php endif; ?>
	<?php
}



//  Include the TGM_Plugin_Activation class
//require_once( get_template_directory_uri() . '/backend/class-tgm-plugin-activation.php');

require_once(TEMPLATEPATH . '/backend/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'rf_theme_register_required_plugins' );

function rf_theme_register_required_plugins() {

    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/plugins/js_composer.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
		
		array(
            'name'               => 'Revolution Slider', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => get_template_directory_uri() . '/plugins/revslider.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),

        array(
            'name'      => 'Easy Bootstrap Shortcode',
            'slug'      => 'easy-bootstrap-shortcodes',
            'required'  => false,
        ),
		array(
            'name'      => 'WooCommerce',
            'slug'      => 'woocommerce',
            'required'  => false,
        ),
		array(
            'name'      => 'MailChimp for WordPress',
            'slug'      => 'mailchimp-for-wp',
            'required'  => false,
        ),

    );

    $config = array(
        'id'           => 'tgmpa-thecompany',      // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}
?>