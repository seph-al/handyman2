jQuery(document).ready(function(){
    // navigation
    jQuery("#main-nav li, .nav li").hover(function() {
        jQuery(this).contents("ul.sub-menu, ul.children").stop(1,1).fadeIn('fast');
    
        jQuery(this).hover(function() {
        }, function(){
            jQuery(this).parent().find("ul.sub-menu, ul.children").fadeOut('fast');
        });
    });
    
    var menu = jQuery('.mobile-nav').find('div.f-dropdown').html();
    jQuery('.mobile-nav').find('div.f-dropdown').remove();
    jQuery('.mobile-nav').append(menu).find('ul').addClass('f-dropdown').attr('id', 'drop2');
    
    // tabs widget
    jQuery('#buzz-tabs').tabs();
    jQuery('#buzz-tabs li').removeClass('ui-tabs-selected').removeClass('ui-state-active');
    jQuery('#buzz-tabs li:first').addClass('ui-tabs-selected').addClass('ui-state-active');
    jQuery('#buzz-tabs .ui-tabs-panel').addClass('ui-tabs-hide');
    jQuery('#buzz-tabs .ui-tabs-panel:first').removeClass('ui-tabs-hide');
    
    // Portfolio filtering
    jQuery('#filter li').click(function(e){
        var clas = jQuery(this).attr('class');
        var obj = jQuery(this);
        e.preventDefault();
        jQuery('.portfolio-wrapper').each(function(){
            if(clas != 'all') {
                if (jQuery(this).hasClass(clas) == false) jQuery(this).hide('slow');
                else jQuery(this).show('slow');
            } else {
                jQuery(this).show('slow');
            }
        });
        jQuery('#filter li a').removeClass('active');
        jQuery(obj).find('a').addClass('active');
    });
    
    jQuery("a.noclick").click(function(e){
        e.preventDefault();
    });
});