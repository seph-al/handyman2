<?php global $rf_theme_options; ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo('charset'); ?>">

<meta http-equiv="X-UA-Compatible" content="<?php bloginfo('html_type'); ?>;" />

<title><?php bloginfo('name'); ?></title>

<meta name="description" content="<?php bloginfo('description') ?>" />

<meta name="generator" content="WordPress <?php bloginfo('version') ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php if (isset($rf_theme_options['cp_favicon']) && $rf_theme_options['cp_favicon'] != '') { ?>
<link rel="icon" href="<?php echo $rf_theme_options['cp_favicon']; ?>" type="image/x-icon" />
<?php } ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Comments RSS Feed" href="<?php bloginfo('comments_rss2_url') ?>"  />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
    
</head>

<body <?php body_class('woocommerce'); ?>>

<div id="background-image"></div>

<div id="container">

    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                
                    <a class="logo" href="<?php echo home_url() ?>" title="<?php bloginfo('name'); ?>">
                        <?php if (isset($rf_theme_options['cp_bloglogo']) && $rf_theme_options['cp_bloglogo'] != '') { ?>
                            <img src="<?php echo $rf_theme_options['cp_bloglogo']; ?>" alt="<?php bloginfo('name'); ?>" />
                        <?php } else {
                            bloginfo('name');
                        } ?>
                    </a>
    
                    <nav class="mainnav <?php if (isset($rf_theme_options['cp_normal_dropdown']) && $rf_theme_options['cp_normal_dropdown'] != '') { echo 'normal-dropdown'; } ?>">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'fallback_cb'	=> 'rf_emptymenu'
                        )); ?>
                    </nav>
                    
                    <?php if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && !is_cart() && !is_checkout()) { ?>
                    <div id="shop-button">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <div id="shopbar">
                            <div class="container">
                                <div class="row">
                                    <?php global $woocommerce;
                                    the_widget( 'WC_Widget_Cart', 'title= ', 'before_title= &after_title= ' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if (isset($rf_theme_options['cp_search_button']) && $rf_theme_options['cp_search_button'] != true) { ?>
                    <div id="search-button">
                        <i class="glyphicon glyphicon-search"></i>
                        <div id="searchbar">
                            <div class="container">
                                <div class="row">
                                    <form method="get" class="searchform" action="<?php echo home_url() ?>"> 
                                    <div class="col-md-10 col-sm-9">
                                        <input type="text" name="s" class="s" placeholder="To search, click and type">
                                    </div>
                                    <div class="col-md-2 col-sm-3">
                                        <input class="button" type="submit" value="Search">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
            </div>        
        </div>
        
        <nav class="wp_nav_menu_mobile">
            <?php wp_nav_menu(array(
                'theme_location' => 'mobile-menu',
                'fallback_cb'	=> 'rf_emptymenu'
            )); ?>
        </nav>
        <div class="wp_nav_dropdown">
            <select> 
                <option value="" selected="selected"><?php _e('Menu', 'thecompany') ?></option>
            </select>
        </div>  
    </div>
    
    <div id="header">
    	
        <?php if (!isset($rf_theme_options['cp_topmenu']) || $rf_theme_options['cp_topmenu'] == false) { ?>
        <div id="socialicons">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div id="top-text">
                            <?php if (isset($rf_theme_options['cp_top_text'])) echo do_shortcode($rf_theme_options['cp_top_text']); ?>
                        </div>
                        <?php for ($x=1;$x<7;$x++) {
                            if (isset($rf_theme_options['cp_social_icon'.$x.'_source']) && $rf_theme_options['cp_social_icon'.$x.'_source'] != '' && isset($rf_theme_options['cp_social_icon'.$x.'_link'])) { ?>
                            <a class="socialicon" target="_BLANK" href="<?php echo $rf_theme_options['cp_social_icon'.$x.'_link']; ?>">
                                <img src="<?php echo $rf_theme_options['cp_social_icon'.$x.'_source']; ?>" />
                            </a>
                            <?php }
                        } ?>
                    </div>  
                </div>        
            </div>
        </div>
        <?php } ?>
        
    </div>
    
    <div id="content">