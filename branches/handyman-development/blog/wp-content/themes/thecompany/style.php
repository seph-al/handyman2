<?php
global $rf_theme_options, $wp_query;

if (isset($rf_theme_options['cp_color1'])) $rf_color1 = str_replace('#','',$rf_theme_options['cp_color1']);
if (isset($rf_theme_options['cp_color2'])) $rf_color2 = str_replace('#','',$rf_theme_options['cp_color2']);
if (isset($rf_theme_options['cp_color2_fg'])) $rf_color2_fg = str_replace('#','',$rf_theme_options['cp_color2_fg']);
if (isset($rf_theme_options['cp_color3'])) $rf_color3 = str_replace('#','',$rf_theme_options['cp_color3']);
if (isset($rf_theme_options['cp_color3_fg'])) $rf_color3_fg = str_replace('#','',$rf_theme_options['cp_color3_fg']);

if (isset($rf_theme_options['cp_font1_family'])) $rf_font1 = $rf_theme_options['cp_font1_family'];
if (isset($rf_theme_options['cp_font2_family'])) $rf_font2 = $rf_theme_options['cp_font2_family'];

if (isset($rf_theme_options['cp_slider_height'])) $rf_slider_height = str_replace('px','',$rf_theme_options['cp_slider_height']);

if (isset($rf_theme_options['cp_sitewidth'])) $rf_sitewidth = str_replace('px','',$rf_theme_options['cp_sitewidth']);

if (isset($rf_theme_options['cp_site_background_color'])) $rf_site_background_color = str_replace('#','',$rf_theme_options['cp_site_background_color']);
if (isset($rf_theme_options['cp_site_background'])) $rf_site_background = $rf_theme_options['cp_site_background'];
if (isset($rf_theme_options['cp_content_background_color'])) $rf_content_background_color = str_replace('#','',$rf_theme_options['cp_content_background_color']);

if (isset($rf_theme_options['cp_top_text_color'])) $rf_top_text_color = str_replace('#','',$rf_theme_options['cp_top_text_color']);

if (isset($rf_theme_options['cp_menu_bg_color'])) $rf_menu_bg_color = str_replace('#','',$rf_theme_options['cp_menu_bg_color']);
if (isset($rf_theme_options['cp_menu_bg_opacity'])) $rf_menu_bg_opacity = $rf_theme_options['cp_menu_bg_opacity'];
if (isset($rf_theme_options['cp_menu_text_color'])) $rf_menu_text_color = str_replace('#','',$rf_theme_options['cp_menu_text_color']);
if (isset($rf_theme_options['cp_menu2_bg_color'])) $rf_menu2_bg_color = str_replace('#','',$rf_theme_options['cp_menu2_bg_color']);

if (isset($rf_theme_options['cp_headerimage'])) $rf_headerimage = $rf_theme_options['cp_headerimage'];
if (isset($rf_theme_options['cp_headercolor'])) $rf_headercolor = str_replace('#','',$rf_theme_options['cp_headercolor']);
if (isset($rf_theme_options['cp_headertitlecolor'])) $rf_headertitlecolor = str_replace('#','',$rf_theme_options['cp_headertitlecolor']);

if (isset($rf_theme_options['cp_sidebar_title_color'])) $rf_sidebar_title_color = str_replace('#','',$rf_theme_options['cp_sidebar_title_color']);

if (isset($rf_theme_options['cp_footer_bg_color'])) $rf_footer_bg_color = str_replace('#','',$rf_theme_options['cp_footer_bg_color']);
if (isset($rf_theme_options['cp_footer_title_color'])) $rf_footer_title_color = str_replace('#','',$rf_theme_options['cp_footer_title_color']);
if (isset($rf_theme_options['cp_footer_text_color'])) $rf_footer_text_color = str_replace('#','',$rf_theme_options['cp_footer_text_color']);

if (isset($rf_theme_options['cp_subfooter_bg_color'])) $rf_subfooter_bg_color = str_replace('#','',$rf_theme_options['cp_subfooter_bg_color']);
if (isset($rf_theme_options['cp_subfooter_text_color'])) $rf_subfooter_text_color = str_replace('#','',$rf_theme_options['cp_subfooter_text_color']);

if (isset($rf_theme_options['cp_topmenu'])) $rf_topmenu = $rf_theme_options['cp_topmenu'];



if (isset($wp_query->post->ID)) {
	$pageid = $wp_query->post->ID;
} else {
	$pageid = '';
}
if (is_home()) { 
	$pageid = get_option( 'page_for_posts' );
} 
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
		$pageid = get_option('woocommerce_shop_page_id'); 
	} elseif (is_cart()) {
		$pageid = get_option('woocommerce_cart_page_id');
	} elseif (is_checkout()) {
		$pageid = get_option('woocommerce_checkout_page_id'); 
	} elseif (is_account_page()) {
		$pageid = get_option('woocommerce_myaccount_page_id');
	}
}

if (isset($rf_theme_options['cp_boxed_site'])) $rf_boxed_site = $rf_theme_options['cp_boxed_site'];
$rf_boxed_page = get_post_meta($pageid, "boxedpage", true);
if (isset($rf_boxed_page) && $rf_boxed_page != '') {
	if ($rf_boxed_page == 'Boxed page') {
		$rf_boxed_site = true;
	} elseif ($rf_boxed_page == 'Fullwidth page') {
		$rf_boxed_site = false;
	}
}
?>

<style type="text/css">



/* First color */
<?php if (isset($rf_color1)) { ?>
body,
#page-title h1,
.mainnav ul.menu > li > a,
.mainnav ul.menu > li > ul li a,
#comments .comment-reply-link,
.portfolio-item p,
.woocommerce #content .quantity input.qty,
.woocommerce .quantity input.qty,
.woocommerce-page #content .quantity input.qty,
.woocommerce-page .quantity input.qty,
input,
textarea,
select,
.label {
	color: #<?php echo $rf_color1; ?>;
}

.post .post-title a,
#nicepagination .page-numbers.current,
#nicepagination .page-numbers:hover {
	color: #<?php echo $rf_color1; ?> !important;
}
<?php } ?>



<?php if (isset($rf_menu_text_color) && $rf_menu_text_color != '') { ?>
#top,
.mainnav ul.menu > li > a,
.mainnav ul.menu > li > ul li a {
	color: #<?php echo $rf_menu_text_color; ?>;
}
<?php } ?>



/* Second color */
<?php if (isset($rf_color2)) { ?>
a,
.woocommerce #content div.product p.price, 
.woocommerce #content div.product span.price, 
.woocommerce div.product p.price, 
.woocommerce div.product span.price, 
.woocommerce-page #content div.product p.price, 
.woocommerce-page #content div.product span.price, 
.woocommerce-page div.product p.price, 
.woocommerce-page div.product span.price,
.woocommerce ul.products li.product .price, 
.woocommerce-page ul.products li.product .price,
ul.menu > li.current-menu-item > a,
ul.menu > li.current-menu-parent > a,
ul.menu > li:hover > a,
ul.menu > li > ul > li.current-menu-item > a,
ul.menu > li > ul > li.current-menu-parent > a,
ul.menu > li > ul > li:hover > a,
.slidercontent span,
h1 span,
h2 span,
h3 span,
h4 span,
h5 span,
h6 span,
.portfolio-item button {
	color: #<?php echo $rf_color2; ?>;
}



.mainnav ul.menu > li > ul {
	border-top-color: #<?php echo $rf_color2; ?>;
}



.widget-area .sigline,
#sidebar .sigline,
.post .sigline,
.portfolio-item .seperator,
#top .wp_nav_dropdown select,
.portfolio-filter li.active,
.button,
input[type=submit],
#respond input[type=submit],
.woocommerce #content input.button, 
.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button, 
.woocommerce-page #content input.button, 
.woocommerce-page #respond input#submit, 
.woocommerce-page a.button, 
.woocommerce-page button.button, 
.woocommerce-page input.button,
.woocommerce #content input.button.alt, 
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt, 
.woocommerce-page #content input.button.alt, 
.woocommerce-page #respond input#submit.alt, 
.woocommerce-page a.button.alt, 
.woocommerce-page button.button.alt, 
.woocommerce-page input.button.alt,
.woocommerce #review_form #respond .form-submit input,
.woocommerce-page #review_form #respond .form-submit input,
input[type=checkbox]:checked,
input[type=radio]:checked {
	background-color: #<?php echo $rf_color2; ?>;
}
<?php } ?>



<?php if (isset($rf_color2_fg)) { ?>
#top .wp_nav_dropdown select,
.portfolio-filter li.active,
.button,
input[type=submit],
#respond input[type=submit],
.woocommerce #content input.button, 
.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button, 
.woocommerce-page #content input.button, 
.woocommerce-page #respond input#submit, 
.woocommerce-page a.button, 
.woocommerce-page button.button, 
.woocommerce-page input.button,
.woocommerce #content input.button.alt, 
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt, 
.woocommerce-page #content input.button.alt, 
.woocommerce-page #respond input#submit.alt, 
.woocommerce-page a.button.alt, 
.woocommerce-page button.button.alt, 
.woocommerce-page input.button.alt,
.woocommerce #review_form #respond .form-submit input,
.woocommerce-page #review_form #respond .form-submit input {
	color: #<?php echo $rf_color2_fg; ?> !important;
}
<?php } ?>



/* Third color */
<?php if (isset($rf_color3)) { ?>
a:hover,
.post .post-title a:hover,
#top #shop-button:hover .glyphicon,
#top #search-button:hover .glyphicon {
	color: #<?php echo $rf_color3; ?> !important;
}



.button:hover,
input[type="submit"]:hover,
.post-content input[type=submit]:hover,
#respond input[type=submit]:hover,
.portfolio-filter li:hover,
.woocommerce #content input.button:hover, 
.woocommerce #respond input#submit:hover, 
.woocommerce a.button:hover, 
.woocommerce button.button:hover, 
.woocommerce input.button:hover, 
.woocommerce-page #content input.button:hover, 
.woocommerce-page #respond input#submit:hover, 
.woocommerce-page a.button:hover, 
.woocommerce-page button.button:hover, 
.woocommerce-page input.button:hover,
.woocommerce #content input.button.alt:hover, 
.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover, 
.woocommerce-page #content input.button.alt:hover, 
.woocommerce-page #respond input#submit.alt:hover, 
.woocommerce-page a.button.alt:hover, 
.woocommerce-page button.button.alt:hover, 
.woocommerce-page input.button.alt:hover,
.woocommerce ul.products li.product .onsale,
.woocommerce-page ul.products li.product .onsale,
.woocommerce span.onsale,
.woocommerce-page span.onsale,
.woocommerce #review_form #respond .form-submit input:hover,
.woocommerce-page #review_form #respond .form-submit input:hover,
#top #searchbar .searchform input[type=submit]:hover,
#comments .comment-reply-link:hover {
	background-color: #<?php echo $rf_color3; ?>;
}



#comments .comment-reply-link:hover {
	border-color: #<?php echo $rf_color3; ?>;
}
<?php } ?>



<?php if (isset($rf_color3_fg)) { ?>
.button:hover,
.post-content input[type=submit]:hover,
#respond input[type=submit]:hover,
.portfolio-filter li:hover,
.woocommerce #content input.button:hover, 
.woocommerce #respond input#submit:hover, 
.woocommerce a.button:hover, 
.woocommerce button.button:hover, 
.woocommerce input.button:hover, 
.woocommerce-page #content input.button:hover, 
.woocommerce-page #respond input#submit:hover, 
.woocommerce-page a.button:hover, 
.woocommerce-page button.button:hover, 
.woocommerce-page input.button:hover,
.woocommerce #content input.button.alt:hover, 
.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover, 
.woocommerce-page #content input.button.alt:hover, 
.woocommerce-page #respond input#submit.alt:hover, 
.woocommerce-page a.button.alt:hover, 
.woocommerce-page button.button.alt:hover, 
.woocommerce-page input.button.alt:hover,
.woocommerce ul.products li.product .onsale,
.woocommerce-page ul.products li.product .onsale,
.woocommerce span.onsale,
.woocommerce-page span.onsale,
.woocommerce #review_form #respond .form-submit input:hover,
.woocommerce-page #review_form #respond .form-submit input:hover,
#top #searchbar .searchform input[type=submit]:hover,
#comments .comment-reply-link:hover {
	color: #<?php echo $rf_color3_fg; ?> !important;
}
<?php } ?>



/* Primary font */
<?php if (isset($rf_font1)) { ?>
h1,
h2,
h3,
h4,
h5,
h6 {
	<?php echo stripslashes($rf_font1); ?>
}
<?php } ?>



/* Secondary font */
<?php if (isset($rf_font2)) { ?>
body {
	<?php echo stripslashes($rf_font2); ?>
}
<?php } ?>



/* Misc styles */
<?php if (isset($rf_slider_height) && $rf_slider_height != '') { ?>
#defaultslider {
	height: <?php echo $rf_slider_height; ?>px;
}
<?php } ?>

<?php if (isset($rf_sitewidth) && $rf_sitewidth != '') { ?>
.container {
	width: <?php echo $rf_sitewidth; ?>px !important;
}
<?php } ?>

<?php if (isset($rf_boxed_site) && $rf_boxed_site == true) { ?>
#container {
	width: <?php if (isset($rf_sitewidth)) { echo ($rf_sitewidth + 44); } else { echo '1244'; } ?>px !important;
	-moz-box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
	-webkit-box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
	-o-box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
	box-shadow: 0px 0px 5px rgba(0,0,0,0.1);
}
<?php } ?>

<?php if (isset($rf_content_background_color) && $rf_content_background_color != '') { ?>
#container {
	background-color: #<?php echo $rf_content_background_color; ?>;
}
<?php } ?>

<?php if (isset($rf_site_background_color) && $rf_site_background_color != '') { ?>
#background-image {
	background-color: #<?php echo $rf_site_background_color; ?>;
}
<?php } ?>

<?php if (isset($rf_site_background) && $rf_site_background != '') { ?>
#background-image {
	background-image: url('<?php echo $rf_site_background; ?>');
}
<?php } ?>

<?php if (isset($rf_top_text_color) && $rf_top_text_color != '') { ?>
#socialicons #top-text {
	color: #<?php echo $rf_top_text_color; ?>;
}
<?php } ?>

<?php if (isset($rf_menu_bg_color) || $rf_menu_bg_color != '') {
if (!isset($rf_menu_bg_opacity) || $rf_menu_bg_opacity == '') $rf_menu_bg_opacity = 0; ?>
#top,
.mainnav ul.menu > li ul {
	background: rgba(<?php echo rf_hex2rgb($rf_menu_bg_color); ?>,<?php echo $rf_menu_bg_opacity; ?>);
}
#top.fixedpos,
#top.fixedpos .mainnav ul.menu > li ul {
	background: rgba(<?php echo rf_hex2rgb($rf_menu_bg_color); ?>,1);
}
<?php } ?>

<?php if (isset($rf_menu2_bg_color) && $rf_menu2_bg_color != '') { ?>
#top #shopbar,
#top #searchbar {
	background: #<?php echo $rf_menu2_bg_color; ?>;
}
<?php } ?>

<?php if (isset($rf_headerimage) && $rf_headerimage != '') { ?>
#page-title {
	background-image: url('<?php echo $rf_headerimage; ?>');
}
<?php } ?>

<?php if (isset($rf_headercolor) && $rf_headercolor != '') { ?>
#page-title {
	background-color: #<?php echo $rf_headercolor; ?>;
}
<?php } ?>

<?php if (isset($rf_headertitlecolor) && $rf_headertitlecolor != '') { ?>
#page-title h1 {
	color: #<?php echo $rf_headertitlecolor; ?>;
}
<?php } ?>

<?php if (isset($rf_footer_bg_color) && $rf_footer_bg_color != '' ) { ?>
footer {
	background: #<?php echo $rf_footer_bg_color; ?>;
}
<?php } ?>

<?php if (isset($rf_footer_text_color) && $rf_footer_text_color != '') { ?>
footer,
footer .mainnav ul.menu > li > a {
	color: #<?php echo $rf_footer_text_color; ?>;
}
<?php } ?>

<?php if (isset($rf_footer_title_color) && $rf_footer_title_color != '') { ?>
footer .sidepanel h3,
footer .sidepanel h3 a {
	color: #<?php echo $rf_footer_title_color; ?>;
}
<?php } ?>

<?php if (isset($rf_subfooter_bg_color) && $rf_subfooter_bg_color != '') { ?>
#sub-footer {
	background: #<?php echo $rf_subfooter_bg_color; ?>;
}
<?php } ?>

<?php if (isset($rf_subfooter_text_color) && $rf_subfooter_text_color != '') { ?>
#sub-footer {
	color: #<?php echo $rf_subfooter_text_color; ?>;
}
<?php } ?>

<?php if (isset($rf_sidebar_title_color) && $rf_sidebar_title_color != '') { ?>
.sidepanel h3,
.sidepanel h3 a {
	color: #<?php echo $rf_sidebar_title_color; ?>;
}
<?php } ?>

<?php if (isset($rf_topmenu) && $rf_topmenu == true) { ?>
#top {
	top: 0;
}
#page-title {
	padding-top: 112px;
}
@media (max-width: 1200px) {
	#page-title {
		padding-top: 208px;
	}
}
@media (max-width: 768px) {
	#page-title {
		padding-top: 172px;
	}
}
<?php } ?>



/* Custom CSS from theme settings */
<?php if (isset($rf_theme_options['cp_custom_css']) && $rf_theme_options['cp_custom_css'] != '') echo stripslashes( $rf_theme_options['cp_custom_css'] ); ?>

</style>