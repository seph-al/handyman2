<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

?>
<!DOCTYPE html>
<!--[if !IE]>      <html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="row container">
        <div class="header-connect">
            <div class="large-6 small-6 columns">
                <?php if(get_option('buzz_contact1_name')): ?>
                <span class="connect"><span><?php echo get_option('buzz_contact1_name'); ?>:</span><?php echo get_option('buzz_contact1_value'); ?></span>
                <?php endif; ?>
                <?php if(get_option('buzz_contact2_name')): ?>
                <span class="connect"><span><?php echo get_option('buzz_contact2_name'); ?>:</span><?php echo get_option('buzz_contact2_value'); ?></span>
                <?php endif; ?>
            </div>
            <div class="social large-6 small-6 columns text-right">
                <?php if(get_option('buzz_facebook')): ?>
                    <a href="<?php echo esc_url(get_option('buzz_facebook')); ?>" target="_blank"><span class="symbol">facebook</span></a>
                <?php endif; ?>
                <?php if(get_option('buzz_twitter')): ?>
                    <a href="<?php echo esc_url(get_option('buzz_twitter')); ?>" target="_blank"><span class="symbol">twitterbird</span></a>
                <?php endif; ?>
                <?php if(get_option('buzz_gplus')): ?>
                    <a href="<?php echo esc_url(get_option('buzz_gplus')); ?>" target="_blank"><span class="symbol">googleplus</span></a>
                <?php endif; ?>
                <?php if(get_option('buzz_flickr')): ?>
                    <a href="<?php echo esc_url(get_option('buzz_flickr')); ?>" target="_blank"><span class="symbol">flickr</span></a>
                <?php endif; ?>
                <?php if(get_option('buzz_pinterest')): ?>
                    <a href="<?php echo esc_url(get_option('buzz_pinterest')); ?>" target="_blank"><span class="symbol">pinterest</span></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="clear"></div>
        
        <div id="header">
            <div class="large-4 small-12 columns logo">
                <p class="logo-text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></p>
            </div>
            <nav class="large-8 small-12 columns navigation text-right">
                <?php wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'container' => '',
                'menu_class' => 'nav',
                'menu_id' => 'main-nav',
                'fallback_cb' => 'wp_page_menu'
                )); ?>
            </nav>           
            <div class="mobile-nav">
                <a href="#" data-dropdown="drop2" class="small expand secondary radius button dropdown"><?php _e('Navigation', 'buzz'); ?></a>
                
                <?php wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'f-dropdown',
                'menu_id' => 'drop2',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu'
                )); ?>
            </div>
            
            <div class="clear"></div> 
            <div class="lcorner"></div>
            <div class="rcorner"></div>
        </div>