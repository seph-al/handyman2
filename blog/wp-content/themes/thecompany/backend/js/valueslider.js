jQuery(document).ready(function($){
	$(".valueslider").slider({
		max: 1,
		min: 0,
		step: 0.05
	}).on( "slidechange", function( event, ui ) {
		$(this).parents('.rm_text').find('input.cp_slider').attr('value', ui.value);
		$(this).parents('.rm_text').find('.slidervalue').html(Math.round(ui.value * 100) + '%');
	});
	
	$(".valueslider").each(function() {
		$(this).slider( "option", "value", $(this).parents('.rm_text').find('input.cp_slider').attr('value') );
	});
});