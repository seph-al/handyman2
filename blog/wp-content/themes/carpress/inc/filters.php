<?php
/**
 * Filters for Carpress WP theme
 *
 * @package Carpress
 */



/**
 * Add the .light classes to the titles
 */
function my_title( $title ) {
	if ( ! is_admin() ) {
		return lighted_title( $title );
	} else {
		return $title;
	}

}
add_filter( "the_title", "my_title" );




/**
 * Add the subtitle to the widget titles
 */
function widget_subtitle( $title, $instance = '', $id = '' ) {
	if ( 'opening_time' === $id ) {
		return $title;
	} else if ( strstr( $title, "//" ) ) {
		$parts = explode( "//", $title);
		foreach( $parts as $part ) {
			$trimmed[] = trim( $part );
		}
		$h2 =  '<h2>';
		$h2 .= lighted_title( $trimmed[0] );
		$h2 .=  '</h2>';

		$h5 =  '<h5>';
		$h5 .= $trimmed[1];
		$h5 .=  '</h5>';

		return $h2 . $h5;
	} else {
		return '<h2>' . lighted_title( $title ) . '</h2>';
	}
}
add_filter( "widget_title", "widget_subtitle", 11, 3 );



/**
 * Change excerpt length
 */
function my_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );



/**
 * Add custom menu walker to all the menus
 */
function bootstrap_menu_walker( $args ) {
	return array_merge( $args, array(
		'walker' => new twitter_bootstrap_nav_walker(),
	) );
}
add_filter( 'wp_nav_menu_args', 'bootstrap_menu_walker' );



/**
 * Add shortcodes in widgets
 */
add_filter( 'widget_text', 'do_shortcode' );



/**
 * Remove the gallery inline styling
 */
add_filter( 'use_default_gallery_style', '__return_false' );


/**
 * Flush the rewrite rules after the OT settings are saved
 */
add_action( 'ot_after_theme_options_save', 'flush_rewrite_rules' );