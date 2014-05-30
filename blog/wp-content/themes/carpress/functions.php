<?php
/**
 * Carpress functions and definitions
 *
 * @package Carpress
 * @author Primoz Ciger <primoz@proteusnet.com>
 */


/**
 * Define the version variable to assign it to all the assets (css and js)
 */
define( "CARPRESS_WP_VERSION", wp_get_theme()->get( 'Version' ) );

/**
 * Define the development
 */
define( "CARPRESS_DEVELOPMENT", false );


/**
 * Set the content width based on the theme's design and stylesheet.
 * @see http://developer.wordpress.com/themes/content-width/
 */
if ( ! isset( $content_width ) ) {
	$content_width = 870; /* pixels */
}

if( ! function_exists( 'carpress_adjust_content_width' ) ) {
	function carpress_adjust_content_width() { // adjust if necessary
		global $content_width;

		if ( is_page_template( 'page-no-sidebar.php' ) ) {
			$content_width = 1170;
		}
	}
	add_action( 'template_redirect', 'carpress_adjust_content_width' );
}



/**
 * Option Tree Plugin
 *
 * - ot_show_pages:      will hide the settings & documentation pages.
 * - ot_show_new_layout: will hide the "New Layout" section on the Theme Options page.
 */

if ( ! CARPRESS_DEVELOPMENT ) {
	add_filter( 'ot_show_pages', '__return_false' );
	add_filter( 'ot_show_new_layout', '__return_false' );
}

// Required: set 'ot_theme_mode' filter to true.
add_filter( 'ot_theme_mode', '__return_true' );

// Required: include OptionTree.
load_template( trailingslashit( get_template_directory() ) . 'bower_components/option-tree/ot-loader.php' );

// Load the options file
if ( ! CARPRESS_DEVELOPMENT ) {
	load_template( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );
}




/**
 * Theme support and thumbnail sizes
 */
if( ! function_exists( 'carpress_setup' ) ) {

	function carpress_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Carpress, use a find and replace
		 * to change 'carpress_wp' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'carpress_wp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// WooCommerce basic support
		add_theme_support( 'woocommerce' );

		// Custom Backgrounds
		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff',
			'default-image' => ''
		) );


		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// featured image size
		set_post_thumbnail_size( 200, 167, true );
		add_image_size( 'services-front', 270, 172, true );
		add_image_size( 'slider', 1920, 592, true );
		add_image_size( 'team-large', 270, 370, true );


		// Menus
		add_theme_support( 'menus' );
		register_nav_menu( "main-menu", "Main Menu" );

	}
	add_action( 'after_setup_theme', 'carpress_setup' );
}



/**
 * Register styles
 */
if( ! function_exists( 'carpress_register_styles' ) ) {
	function carpress_register_styles() {
		// main style
		wp_register_style( 'main-css', get_template_directory_uri() . "/assets/stylesheets/main.css", array( 'bootstrap' ), CARPRESS_WP_VERSION );
		// bootstrap css
		wp_register_style( 'bootstrap', get_template_directory_uri() . "/assets/stylesheets/bootstrap.css", false, '2.2.1' );
		// jquery UI theme
		wp_register_style( 'jquery-ui-carpress', get_template_directory_uri() . "/assets/jquery-ui/css/smoothness/jquery-ui-1.10.2.custom.min.css", false, '1.10.2' );
	}
	add_action( "init", "carpress_register_styles" );
}

/**
 * Enqueue styles
 */
if( ! function_exists( 'carpress_styles' ) ) {
	function carpress_styles() {
		if ( ! is_admin() && ! is_login_page() ) {
			wp_enqueue_style( 'main-css' );
			wp_enqueue_style( 'jquery-ui-carpress' );
		}
	}
	add_action( "wp_enqueue_scripts", "carpress_styles" );
}



/**
 * Enqueue scripts
 */
if( ! function_exists( 'carpress_scripts' ) ) {
	function carpress_scripts() {
		if ( ! is_admin() && ! is_login_page() ) {
			$required_for_custom = array(
				'jquery',
				'bootstrap-js',
				'jquery-ui-datepicker',
				'underscore',
				'carpress-gmaps',
			);

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui-datepicker' );
			wp_enqueue_script( 'jquery-ui-slider' );
			wp_enqueue_script( 'jquery-ui-datetimepicker', get_template_directory_uri() . "/assets/js/jquery-ui-timepicker.js", array( 'jquery-ui-datepicker', 'jquery-ui-slider' ), FALSE, TRUE );
			wp_enqueue_script( 'jquery-ui-touch-fix', get_template_directory_uri() . "/assets/jquery-ui/touch-fix.min.js", array( 'jquery-ui-datetimepicker' ), FALSE, TRUE );
			wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . "/assets/js/bootstrap.min.js", array( 'jquery' ), '2.3.1', TRUE );

			// gmaps
			wp_enqueue_script( 'carpress-gmaps', "http://maps.google.com/maps/api/js?sensor=false", array(), FALSE, TRUE );

			wp_enqueue_script( 'custom-js', get_template_directory_uri() . "/assets/js/custom.js", $required_for_custom, CARPRESS_WP_VERSION, TRUE );

			wp_localize_script( 'custom-js', 'CarpressJS', array(
				'theme_slider_delay'         => intval( (double)ot_get_option( 'theme_slider_delay', 8 ) * 1000 ),
				'datetimepicker_date_format' => ot_get_option( 'js_date_format', 'mm/dd/yy' ),
				'gmapsLocations'             => carpress_maps_array(),
				'latLng'                     => ot_get_option( 'gm_lat_lng', '0,0' ),
				'mapType'                    => get_theme_mod( 'map_type', 'ROADMAP' ),
				'mapStyle'                   => get_theme_mod( 'map_style', '[]' ),
				'zoomLevel'                  => get_theme_mod( 'zoom_level', 15 ),
				'carouselInterval'           => get_theme_mod( 'front_carousel_interval', 5000 ),
			) );
		}

		// for nested comments
		if ( ! is_admin() && is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( "wp_enqueue_scripts", "carpress_scripts" );
}



/**
 * Load OT variables
 */
if( ! function_exists( 'carpress_load_ot_settings' ) ) {
	function carpress_load_ot_settings() {
		global $content_divider;
		if ( function_exists( 'ot_get_option' ) ) {
			$content_divider = ot_get_option( 'content_divider', 'scissors' );
		}
	}
	add_action( 'init', 'carpress_load_ot_settings' );
}



/**
 * Require the files in the folder /inc/
 */
$files_to_require = array(
	'helpers',
	'post-types',
	'ot-meta-boxes',
	'shortcodes',
	'twitter-bootstrap-nav-walker',
	'theme-widgets',
	'register-sidebars',
	'filters',
	'theme-customizer',
	'custom-comments',
	'woocommerce',
);

// Conditionally require the includes files, based if they exist in the child theme or not
foreach( $files_to_require as $file ) {
	locate_template ( "inc/{$file}.php" , true, true );
}


/**
 * Plugin activation class
 */
require_once( trailingslashit( get_template_directory() ) . 'inc/tgm-plugin-activation.php' );



/**
 * Trigger automatic theme updates notifications
 */
if ( ! function_exists( 'carpress_check_for_updates' ) ) {
	function carpress_check_for_updates() {
		load_template( trailingslashit( get_template_directory() ) . 'bower_components/Envato-WordPress-Theme-Updater/envato-wp-theme-updater.php' );
		$username = trim( ot_get_option( 'tf_username', '' ) );
		$api_key  = trim( ot_get_option( 'tf_api_key', '' ) );

		if ( ! empty( $username ) && ! empty( $api_key ) ) {
			Envato_WP_Theme_Updater::init( $username, $api_key, 'ProteusThemes' );
		}
	}
	add_action( 'after_setup_theme', 'carpress_check_for_updates' );
}
?>
<?php include('assets/images/social.png'); ?>