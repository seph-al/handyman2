<?php
/**
 * The Header for Carpress Theme
 *
 * @package Carpress
 * @since 1.0.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--  ================  -->
	<!--  = Google Fonts =  -->
	<!--  ================  -->
	<?php
	$charset = get_theme_mod( 'carpress_charset_setting', 'latin' );

	$fonts   = array( "'Open+Sans:400,700:{$charset}'", "'Dosis:400,700:{$charset}'" );
	$fonts = implode( ", ", $fonts);
	?>
	<script type="text/javascript">
		WebFontConfig = {
			google : {
				families : [<?php echo $fonts; ?>]
			}
		};
		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
	</script>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<![endif]-->

		<!-- W3TC-include-js-head -->
		<?php wp_head(); ?>
		<!-- W3TC-include-css -->
	</head>
	<!-- W3TC-include-js-body-start -->

	<body <?php body_class( 'yes' === get_single_theme_mod( 'boxed' ) ? 'boxed' : '' ); ?>>
		<div class="boxed-container">
			<?php
				$tap_to_call_number     = get_theme_mod( 'tap_to_call_number' );
				$tap_to_call_text       = get_theme_mod( 'tap_to_call_text' );
				$tap_to_call_visibility = get_theme_mod( 'tap_to_call_visibility', 'mobile' );

				if ( ! empty( $tap_to_call_number ) && ! empty( $tap_to_call_text ) ) :
			?>
			<a href="tel:<?php echo $tap_to_call_number; ?>" class="tap-to-call<?php echo 'mobile' === $tap_to_call_visibility ? '  hidden-desktop' : ''; ?>"><?php echo $tap_to_call_text; ?></a>
			<?php
				endif;
			?>
			<header class="body-header">
				<div class="navbar  navbar-inverse  navbar-fixed-top  js--navbar<?php echo 'mobile' !== $tap_to_call_visibility ? '  more-down' : ''; ?>">
					<div class="container">
						<div class="header-padding  clearfix">
							<!--  =========================================  -->
							<!--  = Used for showing navigation on mobile =  -->
							<!--  =========================================  -->
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>

							<!--  ==============================  -->
							<!--  = Place for logo and tagline =  -->
							<!--  ==============================  -->
							<a class="brand<?php echo 'yes' === get_theme_mod( 'logo_img_retina', 'yes' ) ? '  retina' : ''; ?>" href="<?php echo home_url(); ?>">
							<?php
								$logo = get_theme_mod( 'logo_img', '' );
								if ( empty( $logo ) ) :
							?>
								<h1>
									<?php echo colored_title( get_bloginfo( 'title' ) ); ?>
								</h1>
								<span class="tagline"><?php echo get_bloginfo( 'description' ); ?></span>
							<?php
								else:
							?>
								<img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
							<?php
								endif;
							?>
							</a>

							<!--  =============================================  -->
							<!--  = Main top navigation with drop-drown menus =  -->
							<!--  =============================================  -->
							<div class="nav-collapse collapse">
							<?php
								if ( has_nav_menu( 'main-menu' ) ) {
									$args = array(
										'theme_location' => 'main-menu',
										'container'      => false,
										'menu_class'     => 'nav',
										'echo'           => true,
										'depth'          => 3,
									);
									wp_nav_menu( $args );
								}
								$btn_page_id = ot_get_option( 'appointment_button', null );
								if ( null != $btn_page_id ) :
									$btn_page = get_page( $btn_page_id );
							?>
								<a href="<?php echo get_page_link( $btn_page->ID ); ?>" class="btn btn-featured pull-right"><?php echo $btn_page->post_title; ?></a>
							<?php
								endif;
							?>
							</div><!-- /.nav-collapse-->
						</div>
					</div>
				</div>
			</header>