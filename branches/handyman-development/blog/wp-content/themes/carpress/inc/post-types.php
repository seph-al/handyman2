<?php
/**
 * Register custom post types
 *
 * @package Carpress
 */


function carpress_custom_post_types() {
	// services
	$labels = array(
		'name'               => __( 'Services' , 'carpress_wp'),
		'singular_name'      => __( 'Service' , 'carpress_wp'),
		'add_new'            => __( 'Add New' , 'carpress_wp'),
		'add_new_item'       => __( 'Add New Service' , 'carpress_wp'),
		'edit_item'          => __( 'Edit Service' , 'carpress_wp'),
		'new_item'           => __( 'New Service' , 'carpress_wp'),
		'all_items'          => __( 'All Services' , 'carpress_wp'),
		'view_item'          => __( 'View Service' , 'carpress_wp'),
		'search_items'       => __( 'Search Services' , 'carpress_wp'),
		'not_found'          => __( 'No services found' , 'carpress_wp'),
		'not_found_in_trash' => __( 'No services found in Trash' , 'carpress_wp'),
		'menu_name'          => __( 'Services' , 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'rewrite'         => array( 'slug' => ot_get_option( 'services_url_slug', 'services' ) ),
		'capability_type' => 'post',
		'has_archive'     => true,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' )
	);
	register_post_type( 'services', $args );

	// gallery
	$labels = array(
		'name'               => __( 'Galleries' , 'carpress_wp'),
		'singular_name'      => __( 'Gallery' , 'carpress_wp'),
		'add_new'            => __( 'Add New' , 'carpress_wp'),
		'add_new_item'       => __( 'Add New Gallery' , 'carpress_wp'),
		'edit_item'          => __( 'Edit Gallery' , 'carpress_wp'),
		'new_item'           => __( 'New Gallery' , 'carpress_wp'),
		'all_items'          => __( 'All Galleries' , 'carpress_wp'),
		'view_item'          => __( 'View Gallery' , 'carpress_wp'),
		'search_items'       => __( 'Search Galleries' , 'carpress_wp'),
		'not_found'          => __( 'No galleries found' , 'carpress_wp'),
		'not_found_in_trash' => __( 'No galleries found in Trash' , 'carpress_wp'),
		'menu_name'          => __( 'Gallery' , 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'rewrite'         => array( 'slug' => ot_get_option( 'gallery_url_slug', 'gallery' ) ),
		'capability_type' => 'post',
		'has_archive'     => true,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor' )
	);
	register_post_type( 'gallery', $args );

	// slider
	$labels = array(
		'name'               => __( 'Slider' , 'carpress_wp'),
		'singular_name'      => __( 'Slide' , 'carpress_wp'),
		'add_new'            => __( 'Add New' , 'carpress_wp'),
		'add_new_item'       => __( 'Add New Slide' , 'carpress_wp'),
		'edit_item'          => __( 'Edit Slide' , 'carpress_wp'),
		'new_item'           => __( 'New Slide' , 'carpress_wp'),
		'all_items'          => __( 'All Slides' , 'carpress_wp'),
		'view_item'          => __( 'View Slide' , 'carpress_wp'),
		'search_items'       => __( 'Search Slides' , 'carpress_wp'),
		'not_found'          => __( 'No slides found' , 'carpress_wp'),
		'not_found_in_trash' => __( 'No slides found in Trash' , 'carpress_wp'),
		'menu_name'          => __( 'Slider' , 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'capability_type' => 'post',
		'has_archive'     => false,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	);
	register_post_type( 'slider', $args );

	// testimonials
	$labels = array(
		'name'               => __( 'Testimonials' , 'carpress_wp'),
		'singular_name'      => __( 'Testimonial' , 'carpress_wp'),
		'add_new'            => __( 'Add New' , 'carpress_wp'),
		'add_new_item'       => __( 'Add New Testimonial' , 'carpress_wp'),
		'edit_item'          => __( 'Edit Testimonial' , 'carpress_wp'),
		'new_item'           => __( 'New Testimonial' , 'carpress_wp'),
		'all_items'          => __( 'All Testimonials' , 'carpress_wp'),
		'view_item'          => __( 'View Testimonial' , 'carpress_wp'),
		'search_items'       => __( 'Search Testimonials' , 'carpress_wp'),
		'not_found'          => __( 'No testimonial found' , 'carpress_wp'),
		'not_found_in_trash' => __( 'No testimonial found in Trash' , 'carpress_wp'),
		'menu_name'          => __( 'Testimonials' , 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'capability_type' => 'post',
		'has_archive'     => false,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor', 'page-attributes' )
	);
	register_post_type( 'testimonials', $args );

	// meet the team
	$labels = array(
		'name'               => __( 'Team' , 'carpress_wp'),
		'singular_name'      => __( 'Team Member' , 'carpress_wp'),
		'add_new'            => __( 'Add New' , 'carpress_wp'),
		'add_new_item'       => __( 'Add New Team Member' , 'carpress_wp'),
		'edit_item'          => __( 'Edit Team Member' , 'carpress_wp'),
		'new_item'           => __( 'New Team Member' , 'carpress_wp'),
		'all_items'          => __( 'All Team Members' , 'carpress_wp'),
		'view_item'          => __( 'View Team Member' , 'carpress_wp'),
		'search_items'       => __( 'Search Team Members' , 'carpress_wp'),
		'not_found'          => __( 'No team members found' , 'carpress_wp'),
		'not_found_in_trash' => __( 'No team members found in Trash' , 'carpress_wp'),
		'menu_name'          => __( 'Team' , 'carpress_wp'),
	);
	$args = array(
		'labels'          => $labels,
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'query_var'       => true,
		'rewrite'         => array( 'slug' => ot_get_option( 'the_team_url_slug', 'the-team' ) ),
		'capability_type' => 'post',
		'has_archive'     => true,
		'hierarchical'    => false,
		'supports'        => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'carpress_custom_post_types' );
