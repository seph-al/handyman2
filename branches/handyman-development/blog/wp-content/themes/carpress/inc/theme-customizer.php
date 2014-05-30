<?php
/**
 * Contains methods for customizing the theme customization screen.
 *
 * @package Carpress
 * @link http://codex.wordpress.org/Theme_Customization_API
 */
class Carpress_Customize {

	/**
		* This hooks into 'customize_register' (available as of WP 3.4) and allows
		* you to add new sections and controls to the Theme Customize screen.
		*
		* Note: To enable instant preview, we have to actually write a bit of custom
		* javascript. See live_preview() for more.
		*
		* @see add_action('customize_register',$func)
		*/
	public static function register ( $wp_customize ) {
		// Register new settings to the WP database...
		$wp_customize->add_setting( 'carpress[theme_clr]', array( 'default' => '#305088' ) );
		$wp_customize->add_setting( 'carpress[btn_clr]', array( 'default' => '#f68c24' ) );
		$wp_customize->add_setting( 'carpress[titlearea_txt_clr]', array( 'default' => '#ffffff' ) );
		$wp_customize->add_setting( 'carpress[bodytext_clr]', array( 'default' => '#727272' ) );
		$wp_customize->add_setting( 'carpress[navbar_clr]', array( 'default' => '#f6f6f6' ) );
		$wp_customize->add_setting( 'carpress[navbar_txt_clr]', array( 'default' => '#777777' ) );
		// $wp_customize->add_setting( 'carpress[footer_clr]', array( 'default' => '#333333' ) );
		$wp_customize->add_setting( 'carpress[footer_txt_clr]', array( 'default' => '#ffffff' ) );
		$wp_customize->add_setting( 'carpress[boxed]', array( 'default' => 'no' ) );
		$wp_customize->add_setting( 'maps_front_page', array( 'default' => 'yes' ) );
		$wp_customize->add_setting( 'logo_img', array( 'default' => trailingslashit( get_template_directory_uri() ) . 'assets/images/logo.png' ) );
		$wp_customize->add_setting( 'logo_img_retina', array( 'default' => 'yes' ) );
		$wp_customize->add_setting( 'carpress_charset_setting', array( 'default' => 'latin' ) );
		$wp_customize->add_setting( 'carpress[favicon]', array( 'default' => '%s/assets/images/favicon.png' ) );
		// $wp_customize->add_setting( 'navbar_position', array( 'default' => 'navbar-fixed-top' ) );
		$wp_customize->add_setting( 'map_type', array( 'default' => 'ROADMAP' ) );
		$wp_customize->add_setting( 'map_style', array( 'default' => '[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]' ) );
		$wp_customize->add_setting( 'zoom_level', array( 'default' => 7 ) );
		if ( is_woocommerce_active() ) {
			$wp_customize->add_setting( 'carpress[products_per_page]', array( 'default' => '10' ) );
		}

		$wp_customize->add_setting( 'front_title', array( 'default' => 'Repairing cars since 1966' ) );
		$wp_customize->add_setting( 'front_txt', array( 'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, quae, veritatis, tenetur atque doloremque corporis similique tempora suscipit ex error aperiam eius eos esse quaerat nesciunt quisquam sunt soluta!' ) );
		$wp_customize->add_setting( 'front_btn_txt', array( 'default' => 'Read More' ) );
		$wp_customize->add_setting( 'front_btn_link', array( 'default' => 'http://www.proteusthemes.com' ) );
		$wp_customize->add_setting( 'front_btn_blank', array( 'default' => 'no' ) );
		$wp_customize->add_setting( 'front_bg_pattern', array( 'default' => 'pattern-5' ) );
		$wp_customize->add_setting( 'front_bg_pattern_custom', array( 'default' => '' ) );
		$wp_customize->add_setting( 'front_carousel_interval', array( 'default' => '5000' ) );

		$wp_customize->add_setting( 'front_carousel_bg', array( 'default' => '#000000' ) );
		$wp_customize->add_setting( 'front_carousel_opacity', array( 'default' => '0.5' ) );

		$wp_customize->add_setting( 'tap_to_call_number', array( 'default' => '1800123456' ) );
		$wp_customize->add_setting( 'tap_to_call_text', array( 'default' => 'Tap here to call us (1800-12-34-56)' ) );
		$wp_customize->add_setting( 'tap_to_call_visibility', array( 'default' => 'mobile' ) );

		// footer pattern
		$wp_customize->add_setting( 'footer_pattern_img', array( 'default' => '' ) );

		// breadcrumbs visibility
		$wp_customize->add_setting( 'show_breadcrumbs', array( 'default' => 'yes' ) );


		// add custom sections
		$wp_customize->add_section( 'customizr_front_page', array(
			'title'       => __( 'Front Page &amp; Banners' , 'carpress_wp'),
			'description' => __( 'Settings for the home page and title area' , 'carpress_wp'),
			'priority'    => 30
		) );
		$wp_customize->add_section( 'customizr_images', array(
			'title'       => __( 'Images' , 'carpress_wp'),
			'description' => __( 'Images for the Carpress theme' , 'carpress_wp'),
			'priority'    => 30
		) );
		$wp_customize->add_section( 'contact_page', array(
			'title'       => __( 'Contact Page' , 'carpress_wp'),
			'description' => __( 'Settings for contact page' , 'carpress_wp'),
			'priority'    => 150
		) );
		$wp_customize->add_section( 'other', array(
			'title'       => __( 'Other' , 'carpress_wp'),
			'description' => __( 'Other settings for the theme' , 'carpress_wp'),
			'priority'    => 160
		) );
		if ( is_woocommerce_active() ) {
			$wp_customize->add_section( 'shop_page', array(
				'title'       => __( 'Shop' , 'carpress_wp'),
				'description' => __( 'Settings for shop' , 'carpress_wp'),
				'priority'    => 50
			) );
		}



		// Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		$wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
			$wp_customize, //Pass the $wp_customize object (required)
			'carpress_theme_clr', //Set a unique ID for the control
			array(
				'label'    => __( 'Main Theme Color' , 'carpress_wp'), //Admin-visible name of the control
				'section'  => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				'priority' => 1,
				'settings' => 'carpress[theme_clr]', //Which setting to load and manipulate (serialized is okay)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'carpress_btn_clr',
			array(
				'label'    => __( 'Buttons Color' , 'carpress_wp'),
				'section'  => 'colors',
				'priority' => 2,
				'settings' => 'carpress[btn_clr]',
			)
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'carpress_bodytext_clr',
			array(
				'label'    => __( 'Base Text Color' , 'carpress_wp'),
				'section'  => 'colors',
				'priority' => 3,
				'settings' => 'carpress[bodytext_clr]',
			)
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'carpress_navbar_clr',
			array(
				'label'    => __( 'Navbar Color' , 'carpress_wp'),
				'section'  => 'colors',
				'priority' => 5,
				'settings' => 'carpress[navbar_clr]',
			)
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'carpress_navbar_txt_clr',
			array(
				'label'    => __( 'Navbar Text Color' , 'carpress_wp'),
				'section'  => 'colors',
				'priority' => 6,
				'settings' => 'carpress[navbar_txt_clr]',
			)
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'carpress_titlearea_txt_clr',
			array(
				'label'    => __( 'Color for Titles on Subpages' , 'carpress_wp'),
				'section'  => 'colors',
				'priority' => 11,
				'settings' => 'carpress[titlearea_txt_clr]',
			)
		) );
		// $wp_customize->add_control( new WP_Customize_Color_Control(
		// 	$wp_customize,
		// 	'carpress_footer_clr',
		// 	array(
		// 		'label'    => __( 'Footer Color' ),
		// 		'section'  => 'colors',
		// 		'settings' => 'carpress[footer_clr]',
		// 		'priority' => 20,
		// 	)
		// ) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'carpress_footer_txt_clr',
			array(
				'label'    => __( 'Footer Text Color' , 'carpress_wp'),
				'section'  => 'colors',
				'settings' => 'carpress[footer_txt_clr]',
				'priority' => 21,
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_boxed',
			array(
				'label'    => __( 'Boxed or wide version?' , 'carpress_wp'),
				'section'  => 'background_image',
				'settings' => 'carpress[boxed]',
				'type'     => 'radio',
				'choices'  => array(
					'no'  => __( 'Wide', 'carpress_wp'),
					'yes' => __( 'Boxed', 'carpress_wp')
				)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'carpress_logo_img',
			array(
				'label'    => __( 'Logo image (recommended dimensions: 195(w) x 70(h))' , 'carpress_wp'),
				'section'  => 'customizr_images',
				'settings' => 'logo_img',
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_logo_img_retina',
			array(
				'label'    => __( 'Force logo to be always 70px high' , 'carpress_wp'),
				'section'  => 'customizr_images',
				'settings' => 'logo_img_retina',
				'type'     => 'select',
				'choices'  => array(
					'yes' => __( 'Yes', 'carpress_wp'),
					'no'  => __( 'No', 'carpress_wp'),
				)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Upload_Control(
			$wp_customize,
			'carpress_favicon',
			array(
				'label'    => __( 'Favicon image (16 x 16 px), format .ico' , 'carpress_wp'),
				'section'  => 'customizr_images',
				'settings' => 'carpress[favicon]',
			)
		) );
		// $wp_customize->add_control( new WP_Customize_Control(
		// 	$wp_customize,
		// 	'carpress_navbar_position',
		// 	array(
		// 		'label'    => __( 'Position of main Navbar' ),
		// 		'section'  => 'nav',
		// 		'settings' => 'navbar_position',
		// 		'type'     => 'radio',
		// 		'choices'  => array(
		// 			'navbar-fixed-top' => __( 'Fixed when scrolling'),
		// 			'navbar-static-top' => __( 'Static position on the top')
		// 		)
		// 	)
		// ) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_map_type',
			array(
				'label'    => __( 'Type of Google Maps' , 'carpress_wp'),
				'section'  => 'contact_page',
				'settings' => 'map_type',
				'type'     => 'radio',
				'choices'  => array(
					'ROADMAP' => __( 'Normal map', 'carpress_wp'),
					'SATELLITE' => __( 'Satellite', 'carpress_wp'),
					'HYBRID' => __( 'Hybrid', 'carpress_wp'),
					'TERRAIN' => __( 'Terrain', 'carpress_wp'),
				)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_map_style',
			array(
				'label'    => __( 'Style of Google Maps' , 'carpress_wp'),
				'section'  => 'contact_page',
				'settings' => 'map_style',
				'type'     => 'select',
				'choices'  => array(
					'[]' => __( 'Default', 'carpress_wp'),
					'[{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}]' => __( 'Lunar Landscape', 'carpress_wp'),
					'[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#333739"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2ecc71"}]},{"featureType":"poi","stylers":[{"color":"#2ecc71"},{"lightness":-7}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-28}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"visibility":"on"},{"lightness":-15}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-18}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-34}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#333739"},{"weight":0.8}]},{"featureType":"poi.park","stylers":[{"color":"#2ecc71"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#333739"},{"weight":0.3},{"lightness":10}]}]' => __( 'Snazzy Maps', 'carpress_wp'),
					'[{"featureType":"water","stylers":[{"color":"#021019"}]},{"featureType":"landscape","stylers":[{"color":"#08304b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#0c4152"},{"lightness":5}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#0b434f"},{"lightness":25}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#0b3d51"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"lightness":13}]},{"featureType":"transit","stylers":[{"color":"#146474"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#144b53"},{"lightness":14},{"weight":1.4}]}]' => __( 'Midnight Commander', 'carpress_wp'),
					'[{"featureType":"water","elementType":"all","stylers":[{"hue":"#252525"},{"saturation":-100},{"lightness":-81},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#666666"},{"saturation":-100},{"lightness":-55},{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"hue":"#555555"},{"saturation":-100},{"lightness":-57},{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"hue":"#777777"},{"saturation":-100},{"lightness":-6},{"visibility":"on"}]},{"featureType":"administrative","elementType":"all","stylers":[{"hue":"#cc9900"},{"saturation":100},{"lightness":-22},{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#444444"},{"saturation":0},{"lightness":-64},{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"hue":"#555555"},{"saturation":-100},{"lightness":-57},{"visibility":"off"}]}]' => __( 'Hints of Gold', 'carpress_wp'),
				)
			)
		) );

		// helper function
		function zoom_levels() {
			$arr = array();
			for ($i=1; $i < 25; $i++) {
				$arr["{$i}"] = "{$i}";
			}
			return $arr;
		}
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_map_zoom',
			array(
				'label'    => __( 'Zoom of Google Maps (more is closer view)' , 'carpress_wp'),
				'section'  => 'contact_page',
				'settings' => 'zoom_level',
				'type'     => 'select',
				'choices'  => zoom_levels()
			)
		) );

		if ( is_woocommerce_active() ) {
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_products_per_page',
			array(
				'label'    => __( 'Number of products per page' , 'carpress_wp'),
				'section'  => 'shop_page',
				'settings' => 'carpress[products_per_page]',
				'type'     => 'text',
			)
		) );
		}

		// customizr_front_page
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_front_title',
			array(
				'label'    => __( 'Title for front page (without slider)' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_title',
				'priority' => 10,
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_front_txt',
			array(
				'label'    => __( 'Text for front page (without slider)' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_txt',
				'priority' => 20,
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_front_btn_txt',
			array(
				'label'    => __( 'Text for link button (without slider)' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_btn_txt',
				'priority' => 30,
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_front_btn_link',
			array(
				'label'    => __( 'Link for button (without slider)' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_btn_link',
				'priority' => 40,
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_front_btn_blank',
			array(
				'label'    => __( 'Open link in a new page (without slider)?' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_btn_blank',
				'type'     => 'select',
				'priority' => 50,
				'choices'  => array(
					'no'  => __( 'No' , 'carpress_wp'),
					'yes' => __( 'Yes' , 'carpress_wp'),
				)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_maps_front_page',
			array(
				'label'    => __( 'Display Google Maps on the front page?' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'maps_front_page',
				'type'     => 'select',
				'priority' => 60,
				'choices'  => array(
					'yes' => __( 'Yes' , 'carpress_wp'),
					'no'  => __( 'No' , 'carpress_wp'),
				)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_front_bg_pattern',
			array(
				'label'    => __( 'Pattern for the background (without slider)' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_bg_pattern',
				'type'     => 'select',
				'priority' => 70,
				'choices'  => array(
					'no'        => __( 'No background pattern' , 'carpress_wp'),
					'pattern-1' => __( 'Pattern 1' , 'carpress_wp'),
					'pattern-2' => __( 'Pattern 2' , 'carpress_wp'),
					'pattern-3' => __( 'Pattern 3' , 'carpress_wp'),
					'pattern-4' => __( 'Pattern 4' , 'carpress_wp'),
					'pattern-5' => __( 'Pattern 5' , 'carpress_wp'),
					'pattern-6' => __( 'Pattern 6' , 'carpress_wp'),
				)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'carpress_front_bg_pattern_custom',
			array(
				'label'    => __( 'Upload custom pattern for the background (without slider)' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_bg_pattern_custom',
				'priority' => 80,
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_front_carousel_interval',
			array(
				'label'    => __( 'Slider interval (in miliseconds, 1s = 1000ms)' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_carousel_interval',
				'priority' => 90,
			)
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize,
			'carpress_front_carousel_bg',
			array(
				'label'    => __( 'Slider text background color' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_carousel_bg',
				'priority' => 100,
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_front_carousel_opacity',
			array(
				'label'    => __( 'Slider text background color opacity' , 'carpress_wp'),
				'section'  => 'customizr_front_page',
				'settings' => 'front_carousel_opacity',
				'priority' => 110,
				'type'     => 'select',
				'choices'  => array(
					'0.0' => '0.0',
					'0.1' => '0.1',
					'0.2' => '0.2',
					'0.3' => '0.3',
					'0.4' => '0.4',
					'0.5' => '0.5',
					'0.6' => '0.6',
					'0.7' => '0.7',
					'0.8' => '0.8',
					'0.9' => '0.9',
					'1.0' => '1.0',
				),
			)
		) );

		// other
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_charset_setting_control',
			array(
				'label'    => __( 'Character set for Google Fonts' , 'carpress_wp'),
				'section'  => 'other',
				'settings' => 'carpress_charset_setting',
				'type'     => 'select',
				'choices'  => array(
					'latin'        => 'Latin',
					'latin-ext'    => 'Latin Extended',
					'cyrillic'     => 'Cyrillic',
					'cyrillic-ext' => 'Cyrillic Extended'
				)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_tap_to_call_number',
			array(
				'label'    => __( 'Tap to call number (will be seen on mobile phones)' , 'carpress_wp'),
				'section'  => 'other',
				'settings' => 'tap_to_call_number'
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_tap_to_call_text',
			array(
				'label'    => __( 'Tap to call button text (will be seen on mobile phones)' , 'carpress_wp'),
				'section'  => 'other',
				'settings' => 'tap_to_call_text',
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_tap_to_call_visibility',
			array(
				'label'    => __( 'Show tap to call just on mobile or also on desktop?' , 'carpress_wp'),
				'section'  => 'other',
				'settings' => 'tap_to_call_visibility',
				'type'     => 'select',
				'choices'  => array(
					'mobile'     => __( 'Mobile', 'carpress_wp' ),
					'everywhere' => __( 'Everywhere', 'carpress_wp' ),
				)
			)
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'carpress_footer_pattern_img',
			array(
				'label'    => __( 'Pattern image for the footer' , 'carpress_wp'),
				'section'  => 'other',
				'settings' => 'footer_pattern_img',
			)
		) );
		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'carpress_show_breadcrumbs',
			array(
				'label'    => __( 'Show breadcrumbs?' , 'carpress_wp'),
				'section'  => 'other',
				'settings' => 'show_breadcrumbs',
				'type'     => 'select',
				'choices'  => array(
					'yes' => __( 'Yes' , 'carpress_wp'),
					'no'  => __( 'No' , 'carpress_wp'),
				)
			)
		) );
	}


	/**
		* This will output the custom WordPress settings to the live theme's WP head.
		*
		* Used by hook: 'wp_head'
		*
		* @see add_action('wp_head',$func)
		*/
	public static function header_output() {
		// customizer settings
		$theme_mods = get_theme_mod( 'carpress' );

		?>
		<!--Customizer CSS-->
		<style type="text/css">

		/******************
		Default theme color
		*******************/
		<?php if ( ! empty( $theme_mods['theme_clr'] ) ) : ?>
			a,
			.opening-time .time-table .opening-time--title,
			.theme-clr,
			.navbar .nav > li a:hover,
			.navbar .nav > li.active > a:hover,
			.dropdown-menu > li > a:hover,
			.opening-time .week-day.today dt,
			.sidebar-item.widget_nav_menu .nav-pills > li > a:hover,
			.lined .meta-data a,
			.table tbody .active td,
			.foot a.tweet_user,
			.foot a.read-more,
			.foot .nav a:hover,
			.navbar-inverse .nav-collapse .nav > li > a:hover:hover,
			.opening-time .time-table > .additional-info {
				color: <?php echo $theme_mods['theme_clr']; ?>;
			}

			.navbar .nav > li.dropdown:hover > .dropdown-toggle,
			a:hover {
				color: <?php echo darken_css_color( $theme_mods['theme_clr'], 15 ) ; ?>;
			}

			.navbar .nav > li.active > a,
			.navbar .nav > li.active:after {
				border-bottom-color: <?php echo $theme_mods['theme_clr']; ?>;
			}

			.navbar .nav > li.dropdown.open > a:after,
			.navbar .nav > li.dropdown.active > a:after,
			.navbar .nav > li.dropdown.open.active > a:after,
			.navbar .nav > li.dropdown:hover > a:after {
				border-top-color: <?php echo $theme_mods['theme_clr']; ?>;
			}

			.breadcrumbs-container .divider {
				border-left-color: <?php echo $theme_mods['theme_clr']; ?>;
			}

			.nav-collapse .dropdown-menu,
			#wp-calendar caption,
			.accordion-heading.open a .icon,
			.tap-to-call {
				background-color: <?php echo $theme_mods['theme_clr']; ?>;
			}

			select:focus,
			textarea:focus,
			input[type="text"]:focus,
			input[type="password"]:focus,
			input[type="datetime"]:focus,
			input[type="datetime-local"]:focus,
			input[type="date"]:focus,
			input[type="month"]:focus,
			input[type="time"]:focus,
			input[type="week"]:focus,
			input[type="number"]:focus,
			input[type="email"]:focus,
			input[type="url"]:focus,
			input[type="search"]:focus,
			input[type="tel"]:focus,
			input[type="color"]:focus,
			.uneditable-input:focus {
				border-color: <?php echo $theme_mods['theme_clr']; ?>;
			}

			.table tbody .active {
				border-left-color: <?php echo $theme_mods['theme_clr']; ?>;
				border-right-color: <?php echo $theme_mods['theme_clr']; ?>;
			}

			.table tbody .active td {
				border-top-color: <?php echo $theme_mods['theme_clr']; ?>;
				border-bottom-color: <?php echo $theme_mods['theme_clr']; ?>;
			}

			.btn-featured:hover {
				background-color: <?php echo darken_css_color( $theme_mods['theme_clr'], 15 ) ; ?>;
			}

			.foot {
				background-color: <?php echo $theme_mods['theme_clr']; ?>;
				border-top-color: <?php echo darken_css_color( $theme_mods['theme_clr'], 15 ) ; ?>;
			}

			.arrows .fa-chevron-right:hover:hover,
			.arrows .fa-chevron-left:hover:hover,
			.foot #to-the-top,
			.jumbotron .bottom-widgets,
			.navbar-inverse .btn-navbar,
			.btn-featured {
				background-color: <?php echo $theme_mods['theme_clr']; ?>;
				background-image: -moz-linear-gradient(top, <?php echo $theme_mods['theme_clr']; ?>, <?php echo darken_css_color( $theme_mods['theme_clr'], 15 ) ; ?>);
				background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $theme_mods['theme_clr']; ?>), to(<?php echo darken_css_color( $theme_mods['theme_clr'], 15 ) ; ?>));
				background-image: -webkit-linear-gradient(top, <?php echo $theme_mods['theme_clr']; ?>, <?php echo darken_css_color( $theme_mods['theme_clr'], 15 ) ; ?>);
				background-image: -o-linear-gradient(top, <?php echo $theme_mods['theme_clr']; ?>, <?php echo darken_css_color( $theme_mods['theme_clr'], 15 ) ; ?>);
				background-image: linear-gradient(to bottom, <?php echo $theme_mods['theme_clr']; ?>, <?php echo darken_css_color( $theme_mods['theme_clr'], 15 ) ; ?>);
			}

			/***********
			Button color
			************/
			<?php
				endif;
				if ( ! empty( $theme_mods['btn_clr'] ) ) : ?>
			.btn-warning,
			.btn-theme,
			#comments-submit-button,
			.sidebar-item.widget_nav_menu .nav-pills > li.active > a,
			.sidebar-item.widget_nav_menu .nav-pills > li.active > a:hover,
			.sidebar-item.widget_nav_menu .nav-pills > li.current-menu-ancestor > a,
			.sidebar-item.widget_nav_menu .nav-pills > li.current-menu-ancestor > a:hover,
			.nav-tabs-theme > .active > a,
			.nav-tabs-theme > .active > a:hover,
			.pagination .page-numbers {
				background-color: <?php echo $theme_mods['btn_clr']; ?>;
				background-image: -moz-linear-gradient(top, <?php echo $theme_mods['btn_clr']; ?>, <?php echo darken_css_color( $theme_mods['btn_clr'], 15 ) ; ?>);
				background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $theme_mods['btn_clr']; ?>), to(<?php echo darken_css_color( $theme_mods['btn_clr'], 15 ) ; ?>));
				background-image: -webkit-linear-gradient(top, <?php echo $theme_mods['btn_clr']; ?>, <?php echo darken_css_color( $theme_mods['btn_clr'], 15 ) ; ?>);
				background-image: -o-linear-gradient(top, <?php echo $theme_mods['btn_clr']; ?>, <?php echo darken_css_color( $theme_mods['btn_clr'], 15 ) ; ?>);
				background-image: linear-gradient(to bottom, <?php echo $theme_mods['btn_clr']; ?>, <?php echo darken_css_color( $theme_mods['btn_clr'], 15 ) ; ?>);
			}
			.opening-time .week-day.today dd,
			.opening-time .week-day.today dt {
				color: <?php echo $theme_mods['btn_clr']; ?>;
			}
			.btn-warning:hover,
			.btn-theme:hover,
			.btn-theme:active,
			.btn-theme.active,
			.btn-theme.disabled,
			.btn-theme[disabled],
			#comments-submit-button:hover,
			#comments-submit-button:active,
			#comments-submit-button.active {
				background-color: <?php echo darken_css_color( $theme_mods['btn_clr'], 15 ) ; ?>;
				*background-color: <?php echo darken_css_color( $theme_mods['btn_clr'], 20 ) ; ?>;
			}
			.btn-theme:active,
			.btn-theme.active,
			#comments-submit-button:active
			#comments-submit-button.active,
			.pagination .page-numbers.current {
				background-color: <?php echo darken_css_color( $theme_mods['btn_clr'], 25 ) ; ?>;
			}

			/**************
			Base text color
			***************/
			<?php
				endif;
				if( !empty( $theme_mods['bodytext_clr'] ) ) : ?>

			blockquote p,
			body {
				color: <?php echo $theme_mods['bodytext_clr']; ?>;
			}

	<?php endif;

			if( !empty($theme_mods['titlearea_txt_clr']) ) : ?>

			.title-area h1 {
				color: <?php echo $theme_mods['titlearea_txt_clr']; ?>;
			}


		<?php endif;
			if( !empty( $theme_mods['navbar_clr'] ) && '#000000' !== $theme_mods['navbar_clr'] ) : ?>

			.dropdown-menu {
				border-top-color: <?php echo $theme_mods['navbar_clr']; ?>;
			}
			.navbar .container {
				background: <?php echo $theme_mods['navbar_clr']; ?>;
			}

			.btn-featured:before {
				border-top-color: <?php echo $theme_mods['navbar_clr']; ?>;
			}



		<?php endif;
			if( !empty( $theme_mods['navbar_txt_clr'] ) ) : ?>

			.navbar .nav > li a,
			.navbar .brand,
			.navbar .brand h1,
			.navbar .nav > li.dropdown.active > .dropdown-toggle {
				color: <?php echo $theme_mods['navbar_txt_clr']; ?>;
			}
			@media (max-width: 979px) {
				.navbar .nav > li a,
				.navbar-inverse .nav-collapse .nav > li > a,
				.navbar-inverse .nav-collapse .dropdown-menu a {
					color: <?php echo $theme_mods['navbar_txt_clr']; ?>;
				}
			}

		<?php endif;
			if( !empty( $theme_mods['footer_clr'] ) ) : ?>

			.foot {
				background: <?php echo $theme_mods['footer_clr']; ?>;
			}

		<?php endif;
			if( !empty( $theme_mods['footer_txt_clr'] ) ) : ?>

			.foot,
			.foot a,
			.foot .lined h2 {
				color: <?php echo $theme_mods['footer_txt_clr']; ?> !important;
			}
			.foot .lined h5,
			.foot a:hover {
				color: <?php echo darken_css_color( $theme_mods['footer_txt_clr'], 33 ); ?>  !important;
			}


			<?php
			endif;
			$background_color = get_background_color();
				if( !empty( $background_color ) ) : ?>
			.divide-line .icon {
				background-color: #<?php echo $background_color; ?>;
			}

		<?php
			endif;
			$footer_pattern = get_theme_mod( 'footer_pattern_img' );
			if( ! empty( $footer_pattern ) ) : ?>
			.foot {
				background-image: url('<?php echo $footer_pattern; ?>');
			}

		<?php
			endif;
			$slider_bg_color   = rgb_from_hexdec( get_theme_mod( 'front_carousel_bg', '#000000' ) );
			$slider_bg_opacity = get_theme_mod( 'front_carousel_opacity', '0.5' );
			if( ! empty( $slider_bg_color ) ) : ?>
			.jumbotron .header-padding {
				background-color: rgba(<?php echo $slider_bg_color[0]; ?>, <?php echo $slider_bg_color[1]; ?>, <?php echo $slider_bg_color[2]; ?>, <?php echo $slider_bg_opacity; ?>);
			}

		<?php
			endif;
			$background_color = get_background_color();
				if( !empty( $background_color ) ) : ?>
			.divide-line .icon {
				background-color: #<?php echo $background_color; ?>;
			}


		<?php endif; ?>

				<?php echo ot_get_option( 'user_custom_css', '' ); ?>

			</style>
			<!--/Customizer CSS-->

		<!-- Fav icon -->
		<?php if( !empty( $theme_mods['favicon'] ) ) : ?>
			<link rel="shortcut icon" href="<?php echo $theme_mods['favicon']; ?>">
		<?php else : ?>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
		<?php endif;
		}
	}

//Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'Carpress_Customize' , 'register' ) );

//Output custom CSS to live site
add_action( 'wp_head', array( 'Carpress_Customize' , 'header_output' ) );