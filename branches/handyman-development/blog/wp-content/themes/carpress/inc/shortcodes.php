<?php
/**
 * Shortcodes for Carpress WP theme defined
 *
 * @package Carpress
 */


/**
 * Columns container
 */
function sc_columns_container( $atts, $content ) {
	return '<div class="row with-margin">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( "colcontainer", "sc_columns_container" );



/**
 * Columns - spans
 */
function sc_colspan( $atts, $content ) {
	extract( shortcode_atts( array(
		'n' => 3
	), $atts ) );
	return '<div class="span' . $n . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( "span", "sc_colspan" );



/**
 * Buttons
 */
function sc_button( $atts, $content ) {
	extract( shortcode_atts( array(
		'rounded' => '',
		'link' => '',
		'type' => '',
		'target' => ''
	), $atts ) );

	$class = array( 'btn' );

	// roundness
	if( "rounded" == $rounded ) {
		$class[] = "rounded ";
	} else if( ! empty( $rounded ) ) {
		$class[] = "rounded-" . (int)$rounded;
	}

	// type
	if ( ! empty( $type ) ) {
		$class[] = "btn-" . strtolower( $type );
	}

	$classes = implode( " ", $class );

	if ( ! empty( $link ) ) {
		// target
		if ( ! empty( $target ) ) {
			$add_target = ' target="_' . $target . '"';
		}

		return '<a href="' . $link . '" class="' . $classes . '"' . $add_target . '>' . $content . '</a>';
	} else {
		return '<span class="' . $classes . '">' . $content . '</span>';
	}

}
add_shortcode( "button", "sc_button" );



/**
 * Content Dividers
 */
function sc_divider( $atts ) {
	extract( shortcode_atts( array(
		'type' => 'mechanic'
	), $atts ) );

	if ( 'theme' == $type ) {
		$type = ot_get_option( 'content_divider', 'mechanic' );
	}

	return '<div class="divide-line"><div class="icon icons-' . $type . '"></div></div>';
}
add_shortcode( "divider", "sc_divider" );



/**
 * Accordion
 */
function sc_accordion( $atts, $content ) {
	extract( shortcode_atts( array(
		'title' => 'Title of the accordion',
		'opened' => false
	), $atts ) );

	if( empty( $opened ) ) {
		$opened = false;
	} else {
		$opened = true;
	}

	$out = ob_start();
	?>
	<div class="accordion-group">
		<div class="accordion-heading<?php echo $opened ? " open" : ""; ?>">
			<a class="accordion-toggle" href="#"><span class="bolded-line"></span><span class="icon"></span> <?php echo $title; ?></a>
		</div>
		<div class="accordion-body<?php echo $opened ? " in" : ""; ?>" style="<?php echo $opened ? "" : "display: none;"; ?>">
			<div class="accordion-inner">
				<?php echo do_shortcode( $content ); ?>
			</div>
		</div>
	</div>
	<?php
	$out = ob_get_contents();
	ob_end_clean();
	return $out;
}
add_shortcode( "accordion", "sc_accordion" );