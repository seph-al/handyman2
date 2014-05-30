<?php global $rf_theme_options; ?>

<script type="text/javascript">

// include google analytics
<?php if (isset($rf_theme_options['cp_trackingcode']) && $rf_theme_options['cp_trackingcode'] != '') { ?>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php echo $rf_theme_options['cp_trackingcode']; ?>']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
<?php } ?>

/* <![CDATA[ */
jQuery(document).ready(function($){
	
	// Adjust pagetitle padding for responsive screens
	jQuery(window).resize(function() {
		pagetitlePadding();
	}).load(function(){
		pagetitlePadding();
	});	
	function pagetitlePadding() {
		setTimeout(function(){
			pagetitlepadding = jQuery('#socialicons').outerHeight() + jQuery('#top').outerHeight();
			//jQuery('#page-title').css('padding-top', pagetitlepadding);
			jQuery('#page-title').animate({
				paddingTop: pagetitlepadding
			}, 100);
		}, 250);		
	}
	
	
	
	// Populate dropdown with menu items
	jQuery('#top').find('.wp_nav_menu_mobile ul.menu li a').each(function() {
		var el = jQuery(this);
		jQuery('<option />', {
			"value"   : el.attr('href'),
			"text"    : el.text()
		}).appendTo('#top .wp_nav_dropdown select');
	});
	if (jQuery('#top .wp_nav_menu_mobile ul.menu li a').length < 1) jQuery('.wp_nav_dropdown').hide();
	
	jQuery('#top').find('.wp_nav_dropdown select').change(function() {
		window.location = jQuery(this).find('option:selected').val();
	});
	
	
	
	// Sticky menu
	jQuery(window).scroll(function() {
		var scrollspace = jQuery(window).scrollTop();
		if (scrollspace > 44) {
			jQuery('#top:not(.fixedpos)').addClass('fixedpos');
			//pagetitlePadding();
		} else {
			jQuery('#top.fixedpos').removeClass('fixedpos');
			pagetitlePadding();
		}
	});
	
	
	
	// Add glyphicon to submenus
	jQuery('#top').find('.mainnav > div > ul > li.menu-item-has-children > a, .mainnav.normal-dropdown > div > ul li.menu-item-has-children > a').append('<i class="glyphicon glyphicon-chevron-down"></i>');
	
	
	
	// Handle sub sub menu positions
	$('.mainnav.normal-dropdown ul.menu > li > ul li.menu-item-has-children').hover(function() {
		var submenu = $(this).find('ul');
		var submenupos = submenu.offset().left;
		
		if (submenupos + submenu.outerWidth() > $(window).width()) {
			submenu.addClass('pos-left');
		}
	});
	
	
	
	// Portfolio animation
	if (jQuery('.portfolio')) {
	
	(function() {
	
		function init() {
			var speed = 300,
				easing = mina.backout;

			[].slice.call ( document.querySelectorAll( '.portfolio-item' ) ).forEach( function( el ) {
				var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
					pathConfig = {
						from : path.attr( 'd' ),
						to : el.getAttribute( 'data-path-hover' )
					};

				el.addEventListener( 'mouseenter', function() {
					path.animate( { 'path' : pathConfig.to }, speed, easing );
				} );

				el.addEventListener( 'mouseleave', function() {
					path.animate( { 'path' : pathConfig.from }, speed, easing );
				} );
			} );
		}

		init();

	})();
	
	}
	
	
	
	// Portfolio filter
	jQuery('.portfolio-filter').find('li').click(function(){
		
		jQuery(this).parents('ul').find('li').removeClass('active');
		jQuery(this).addClass('active');
		
		var data = jQuery(this).attr('data');
		if (data) {
			jQuery('.portfolio').find('.portfolio-item').addClass('fade').parents('.portfolio').find('.'+data).removeClass('fade');
		} else {
			jQuery('.portfolio').find('.portfolio-item').removeClass('fade');
		}
		
		return false;
	});
	
	
	
	// Section scroll effect
	<?php if (isset($rf_theme_options['cp_sectionfade']) && $rf_theme_options['cp_sectionfade'] != '') { ?>
	jQuery(window).load(function(){
		jQuery('body:not(.ismobile, .vc-editor)').find('#sections').find('.section').each(function(){
			if ( jQuery(this).offset().top > (jQuery(window).scrollTop() + jQuery(window).height()) ) {
				jQuery(this).addClass('outofview');
			}
		});
	}).scroll(function() {
		jQuery('body:not(.ismobile, .vc-editor)').find('#sections').find('.section').each(function(){
			if ( jQuery(this).offset().top < (jQuery(window).scrollTop() + jQuery(window).height()) ) {
				jQuery(this).removeClass('outofview');
			}
		});
	});
	<?php } ?>
	
	
	
	if (jQuery.browser.mobile) jQuery('body').addClass('ismobile');
});
/* ]]> */

/**
 * jQuery.browser.mobile (http://detectmobilebrowser.com/)
 * jQuery.browser.mobile will be true if the browser is a mobile device
 **/
(function(a){jQuery.browser.mobile=/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);
</script>