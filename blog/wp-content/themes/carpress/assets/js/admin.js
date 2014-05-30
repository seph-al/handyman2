/**
 * Utilities for the administration for Carpress WP Theme
 */

jQuery(document).ready(function($) {
	'use strict';

	$( '.widgets-holder-wrap' ).on( 'click', '.js--selectable-icon', function (ev) {
		ev.preventDefault();
		var $this = $(this);
		// console.log($this.data('iconname'));
		$this.siblings('.js--icon-input').val( $this.data('iconname') );
	} );
});