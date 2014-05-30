jQuery(document).ready(function($){
	
	jQuery(window).load(function(){
		var pageTemplate = jQuery('#page_template').val();
		pageTemplateOption(pageTemplate);
	});	
	
	jQuery("#page_template").change(function() {
		pageTemplate = jQuery(this).val();
		pageTemplateOption(pageTemplate);
	});
	
	function pageTemplateOption(pageTemplate) {
		if (pageTemplate) {
			pageTemplate = pageTemplate.replace(".php", "");
			jQuery('#my-custom-fields').find('.form-field:not(.general)').fadeOut(500);
			jQuery('#my-custom-fields').find('.form-field.'+pageTemplate).fadeIn(500);
			
			if (pageTemplate == 'template-sections') {
				jQuery('#postdivrich, .composer-switch').fadeOut(0);
			} else {
				jQuery('#postdivrich, .composer-switch').fadeIn(0);
			}
		}
	}
	
	
	
	var sectionTemplate = jQuery('#sectiontype').val();
	sectionTemplateOption(sectionTemplate);
	
	jQuery("#sectiontype").change(function() {
		sectionTemplate = jQuery(this).val();
		sectionTemplateOption(sectionTemplate);
	});
	
	function sectionTemplateOption(sectionTemplate) {
		if (sectionTemplate) {
			sectionTemplate = sectionTemplate.replace(" ", "-").toLowerCase();
			jQuery('#my-custom-fields').find('.form-field:not(.general)').fadeOut(500);
			jQuery('#my-custom-fields').find('.form-field.'+sectionTemplate).fadeIn(500);
			
			if (sectionTemplate == 'portfolio' || sectionTemplate == 'widget-area' || sectionTemplate == 'blog-tiles') {
				jQuery('#postdivrich, .composer-switch').fadeOut(0);
			} else {
				jQuery('#postdivrich, .composer-switch').fadeIn(0);
			}
		}
	}
	
});