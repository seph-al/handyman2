<?php
/**
 * Meta Boxes for various data
 *
 * @package Carpress
 */

add_action( 'admin_init', 'custom_meta_boxes' );

function custom_meta_boxes() {
	// general
	$my_meta_box = array(
		'id'        => 'carpress_options',
		'title'     => __( 'Carpress Options', 'carpress_wp'),
		'desc'      => __( 'Options specific to Carpress theme', 'carpress_wp'),
		'pages'     => array( 'page', 'gallery' ),
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
			array(
				'id'          => 'subtitle',
				'label'       => __( 'Subtitle', 'carpress_wp'),
				'desc'        => __( 'Subtitle of this page (shown right below the main title). Leave blank if you don\'t want to show.', 'carpress_wp'),
				'std'         => '',
				'type'        => 'text',
				'class'       => '',
				'choices'     => array()
			),
			array(
				'id'          => 'title_bg',
				'label'       => __( 'Background Image for Title Area', 'carpress_wp'),
				'desc'        => __( 'You can upload a custom image for the background of the title area for individual page.', 'carpress_wp'),
				'std'         => '',
				'type'        => 'background',
				'class'       => '',
				'choices'     => array()
			),
		)
	);
	if ( function_exists( 'ot_get_option' ) )
		ot_register_meta_box( $my_meta_box );



	// services
	$my_meta_box = array(
		'id'       => 'carpress_options',
		'title'    => __( 'Carpress Options', 'carpress_wp'),
		'desc'     => __( 'Options specific to Carpress theme', 'carpress_wp'),
		'pages'    => array( 'services' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'      => 'subtitle',
				'label'   => __( 'Subtitle', 'carpress_wp'),
				'desc'    => __( 'Subtitle of this page (shown right below the main title). Leave blank if you don\'t want to show.', 'carpress_wp'),
				'std'     => '',
				'type'    => 'text',
				'class'   => '',
				'choices' => array()
			),
			array(
				'id'      => 'show_front_page',
				'label'   => __( 'Show on front page', 'carpress_wp'),
				'desc'    => __( 'Show this service on the front page?', 'carpress_wp'),
				'std'     => '',
				'type'    => 'select',
				'class'   => '',
				'choices' => array(
					array(
						'value' => 'yes',
						'label' => __( 'Yes', 'carpress_wp'),
						'src'   => ''
					),
					array(
						'value' => 'no',
						'label' => __( 'No', 'carpress_wp'),
						'src'   => ''
					),
				)
			),
			array(
				'id'      => 'title_bg',
				'label'   => __( 'Background Image for Title Area', 'carpress_wp'),
				'desc'    => __( 'You can upload a custom image for the background of the title area for individual page.', 'carpress_wp'),
				'std'     => '',
				'type'    => 'background',
				'class'   => '',
				'choices' => array()
			),
			array(
				'id'      => 'link_for_widget',
				'label'   => __( 'Optional link for the front page services widget', 'carpress_wp'),
				'desc'    => __( 'By default (if you leave this blank) each &quot;READ MORE&quot; link will link to the service. You can override this default behaviour by specifing your custom link in this field.', 'carpress_wp'),
				'std'     => '',
				'type'    => 'text',
				'class'   => '',
			),
		)
	);
	if ( function_exists( 'ot_get_option' ) )
		ot_register_meta_box( $my_meta_box );



	// testimonials
	$my_meta_box = array(
		'id'       => 'testimonial_options',
		'title'    => __( 'Testimonial Options', 'carpress_wp'),
		'desc'     => '',
		'pages'    => array( 'testimonials' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'      => 'author_title',
				'label'   => __( 'Title of the author for this testimonial', 'carpress_wp'),
				'desc'    => '',
				'std'     => '',
				'type'    => 'text',
				'class'   => '',
				'choices' => array()
			),
		)
	);
	if ( function_exists( 'ot_get_option' ) )
		ot_register_meta_box( $my_meta_box );


	// team
	$my_meta_box = array(
		'id'       => 'team_options',
		'title'    => __( 'Carpress Options', 'carpress_wp'),
		'desc'     => __( 'Options specific to Carpress theme', 'carpress_wp'),
		'pages'    => array( 'team' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'    => 'subtitle',
				'label' => __( 'Subtitle', 'carpress_wp'),
				'desc'  => __( 'Subtitle of this page (shown right below the main title). Leave blank if you don\'t want to show.', 'carpress_wp'),
				'std'   => '',
				'type'  => 'text',
			),
			array(
				'id'      => 'team_in_widget',
				'label'   => __( 'Disply in the widget?', 'carpress_wp'),
				'desc'    => __( 'If you select here yes, this team member will be shown in the widget The Team', 'carpress_wp'),
				'type'    => 'select',
				'std'     => 'yes',
				'choices' => array(
					array(
						'value' => 'yes',
						'label' => __( 'Yes', 'carpress_wp' ),
						'src'   => ''
					),
					array(
						'value' => 'no',
						'label' => __( 'No', 'carpress_wp' ),
						'src'   => ''
					),
				)
			),
			array(
				'id'    => 'team_custom_fields',
				'label' => __( 'Team Member Custom Fields', 'carpress_wp'),
				'desc'  => __( 'You can here define properties of the team member such as Age, Style, Education etc.', 'carpress_wp'),
				'type'  => 'list-item',
			),
		)
	);
	if ( function_exists( 'ot_get_option' ) )
		ot_register_meta_box( $my_meta_box );
}