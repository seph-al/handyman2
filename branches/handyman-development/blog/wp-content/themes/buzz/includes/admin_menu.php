<?php
function AdminLiveInit() {
// Live Settings Script for admin

wp_register_script( 'admin-live-script', get_template_directory_uri() . '/includes/js/admin-js.js');
wp_enqueue_script(  'admin-live-script' );

wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_enqueue_script('buzz-tabs', get_template_directory_uri().'/includes/js/tabs.js');

wp_enqueue_style( 'st-admin-style', get_template_directory_uri() . '/includes/css/style.css' );
wp_enqueue_style( 'st-admin-tabs', get_template_directory_uri() . '/includes/css/jquery-tabs.css' );
}
if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'theme_settings'){
    add_action('admin_footer', 'AdminLiveInit');
}

add_action('admin_menu', 'buzz_create_menu');

function buzz_create_menu() {
    add_theme_page(__('Buzz settings', 'buzz'), __('Buzz settings', 'buzz'), 'administrator', 'theme_settings', 'buzz_settings_page');

    add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
    
    register_setting( 'buzz-settings-group', 'buzz_featured_posts' );
    register_setting( 'buzz-settings-group', 'buzz_featured_posts_count' );
    
    register_setting( 'buzz-settings-group', 'buzz_portfolio_posts' );
    register_setting( 'buzz-settings-group', 'buzz_portfolio_posts_count' );
    
    register_setting( 'buzz-settings-group', 'buzz_welcome_title' );
    register_setting( 'buzz-settings-group', 'buzz_welcome_message' );
    register_setting( 'buzz-settings-group', 'buzz_welcome' );
    register_setting( 'buzz-settings-group', 'buzz_welcome_button' );
    register_setting( 'buzz-settings-group', 'buzz_welcome_button_link' );
    
    register_setting( 'buzz-settings-group', 'buzz_slider' );
    register_setting( 'buzz-settings-group', 'buzz_slider_speed' );
    register_setting( 'buzz-settings-group', 'buzz_slider_cat' );
    
    // Footer options
    register_setting( 'buzz-settings-group', 'buzz_copyright' );
    
    // Social options
    register_setting( 'buzz-settings-group', 'buzz_twitter' );
    register_setting( 'buzz-settings-group', 'buzz_facebook' );
    register_setting( 'buzz-settings-group', 'buzz_pinterest' );
    register_setting( 'buzz-settings-group', 'buzz_gplus' );
    register_setting( 'buzz-settings-group', 'buzz_flickr' );
    
    
    register_setting( 'buzz-settings-group', 'buzz_contact1_name' );
    register_setting( 'buzz-settings-group', 'buzz_contact1_value' );
    register_setting( 'buzz-settings-group', 'buzz_contact2_name' );
    register_setting( 'buzz-settings-group', 'buzz_contact2_value' );
}

function buzz_settings_page() {
?>
<div class="rt_wrap">
    <h2 id="rt_title"><?php _e('Theme settings', 'buzz'); ?></h2>

    <form method="post" action="options.php" class="rt_opts" id="toeThemeEditOptionForm">

    <?php settings_fields('buzz-settings-group'); ?>
    <div id="rt_tabs">
        <ul>
            <li class="rt_pages"><a href="#rt_pages"><?php _e('General', 'buzz'); ?></a></li>
            <li class="rt_homepage"><a href="#rt_homepage"><?php _e('Homepage', 'buzz'); ?></a></li>
            <li class="rt_slider"><a href="#rt_slider"><?php _e('Slider', 'buzz'); ?></a></li>
            <li class="rt_footer"><a href="#rt_footer"><?php _e('Footer', 'buzz'); ?></a></li>
            <li class="rt_social"><a href="#rt_social"><?php _e('Social', 'buzz'); ?></a></li>
            <li class="rt_contact"><a href="#rt_contact"><?php _e('Contact info', 'buzz'); ?></a></li>
        </ul>
        
        <div id="rt_pages"> 
            
            <h3><?php _e('Featured posts', 'buzz'); ?></h3>
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_featured_posts_count"><?php _e('Count of posts on homepage', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_featured_posts_count" id="buzz_featured_posts_count" type="text" value="<?php echo esc_attr(get_option('buzz_featured_posts_count')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
                
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_featured_posts"><?php _e('Choose a featured posts category', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <select name="buzz_featured_posts" id="buzz_featured_posts">
                	<option value="none" default="default"><?php _e('Choose a category', 'buzz'); ?></option>
                    <?php    
                        $opt = get_option('buzz_featured_posts');
                        $categories = get_categories('hide_empty=0&orderby=name');
                        foreach ($categories as $category_list ) {
                            echo '<option value="'.$category_list->cat_ID.'" '.selected( $opt, $category_list->cat_ID ).' >'.$category_list->cat_name.'</option>';
                        }
                    ?>
                </select>
                <div class="rt_clearfix"></div>
            </div>
            
            <h3><?php _e('Portfolio', 'buzz'); ?></h3>
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_portfolio_posts_count"><?php _e('Count of portfolio items on homepage', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_portfolio_posts_count" id="buzz_portfolio_posts_count" type="text" value="<?php echo esc_attr(get_option('buzz_portfolio_posts_count')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
                
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_portfolio_posts"><?php _e('Choose a portfolio category', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <select name="buzz_portfolio_posts" id="buzz_portfolio_posts">
                	<option value="none" default="default"><?php _e('Choose a category', 'buzz'); ?></option>
                    <?php    
                        $opt = get_option('buzz_portfolio_posts');
                        $categories = get_categories('hide_empty=0&orderby=name');
                        foreach ($categories as $category_list ) {
                            echo '<option value="'.$category_list->cat_ID.'" '.selected( $opt, $category_list->cat_ID ).' >'.$category_list->cat_name.'</option>';
                        }
                    ?>
                </select>
                <div class="rt_clearfix"></div>
            </div>
            
        </div>
        <div id="rt_homepage"> 
            <h3><?php _e('Home page settings', 'buzz'); ?></h3>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_welcome"><?php _e('Show welcome message.', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_welcome" id="buzz_welcome" type="checkbox" value="1" <?php checked( get_option('buzz_welcome'), 1 ); ?> />
                <div class="rt_clearfix"></div>
            </div> 
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_welcome_title"><?php _e('Home welcome title', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_welcome_title" id="buzz_welcome_title" type="text" value="<?php echo esc_attr(get_option('buzz_welcome_title')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_welcome_message"><?php _e('Home welcome message', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_welcome_message" id="buzz_welcome_message" type="text" value="<?php echo esc_attr(get_option('buzz_welcome_message')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_welcome_button"><?php _e('Home welcome button text', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_welcome_button" id="buzz_welcome_button" type="text" value="<?php echo esc_attr(get_option('buzz_welcome_button')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_welcome_button_link"><?php _e('Home welcome button link', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_welcome_button_link" id="buzz_welcome_button_link" type="text" value="<?php echo esc_attr(get_option('buzz_welcome_button_link')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
        </div>
        <div id="rt_slider">
            <h3><?php _e('Slider', 'buzz'); ?></h3>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_slider"><?php _e('Hide slider on home page', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_slider" id="buzz_slider" type="checkbox" value="1" <?php checked( get_option('buzz_slider'), 1 ); ?> />
                <div class="rt_clearfix"></div>
            </div>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_slider_speed"><?php _e('Slides transitions speed', 'buzz'); ?></label>
                    <small><?php _e('Write speed in milliseconds', 'buzz'); ?></small>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_slider_speed" id="buzz_slider_speed" type="text" value="<?php echo esc_attr(get_option('buzz_slider_speed')); ?>" />
                <div class="rt_clearfix"></div>
            </div>

            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_slider_cat"><?php _e('Choose a slider category', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <select name="buzz_slider_cat" id="buzz_slider_cat">
                	<option value="none" default="default"><?php _e('Choose a category', 'buzz'); ?></option>
                    <?php    
                        $opt = get_option('buzz_slider_cat');
                        $categories = get_categories('hide_empty=0&orderby=name');
                        foreach ($categories as $category_list ) {
                            echo '<option value="'.$category_list->cat_ID.'" '.selected( $opt, $category_list->cat_ID ).' >'.$category_list->cat_name.'</option>';
                        }
                    ?>
                </select>
                <div class="rt_clearfix"></div>
            </div>            
        </div>        
        <div id="rt_footer">
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_copyright"><?php _e('Copyright text', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_copyright" id="buzz_copyright" type="text" value="<?php echo esc_attr(get_option('buzz_copyright')); ?>" />
                <div class="rt_clearfix"></div>
            </div>     
        </div>
        <div id="rt_social">
            <h3><?php _e('Social buttons', 'buzz'); ?></h3>
                        
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_twitter"><?php _e('Twitter', 'buzz'); ?></label>
                    <small><?php _e('Link for your Twitter account', 'buzz'); ?></small>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_twitter" id="buzz_twitter" type="text" value="<?php echo esc_attr(get_option('buzz_twitter')); ?>" />
                <div class="rt_clearfix"></div>
            </div>

            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_facebook"><?php _e('Facebook', 'buzz'); ?></label>
                    <small><?php _e('Link for Facebook page', 'buzz'); ?></small>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_facebook" id="buzz_facebook" type="text" value="<?php echo esc_attr(get_option('buzz_facebook')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_pinterest"><?php _e('Pinterest', 'buzz'); ?></label>
                    <small><?php _e('Link for Pinterest', 'buzz'); ?></small>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_pinterest" id="buzz_pinterest" type="text" value="<?php echo esc_attr(get_option('buzz_pinterest')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_gplus"><?php _e('Google plus', 'buzz'); ?></label>
                    <small><?php _e('Link for Google plus', 'buzz'); ?></small>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_gplus" id="buzz_gplus" type="text" value="<?php echo esc_attr(get_option('buzz_gplus')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_flickr"><?php _e('Flickr', 'buzz'); ?></label>
                    <small><?php _e('Link for Flickr', 'buzz'); ?></small>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_flickr" id="buzz_flickr" type="text" value="<?php echo esc_attr(get_option('buzz_flickr')); ?>" />
                <div class="rt_clearfix"></div>
            </div>
        </div>
        <div id="rt_contact">
            <h3><?php _e('Contact info in header', 'buzz'); ?></h3>
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_contact1_name"><?php _e('Contact 1 name', 'buzz'); ?></label>
                    <small><?php _e('Like: phone, email, skype etc.', 'buzz'); ?></small>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_contact1_name" id="buzz_copyright" type="text" value="<?php echo esc_attr(get_option('buzz_contact1_name')); ?>" />
                <div class="rt_clearfix"></div>
            </div>     
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_contact1_value"><?php _e('Contact 1 value', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_contact1_value" id="buzz_contact1_value" type="text" value="<?php echo esc_attr(get_option('buzz_contact1_value')); ?>" />
                <div class="rt_clearfix"></div>
            </div>  
            
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_contact2_name"><?php _e('Contact 2 name', 'buzz'); ?></label>
                    <small><?php _e('Like: phone, email, skype etc.', 'buzz'); ?></small>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_contact2_name" id="buzz_copyright" type="text" value="<?php echo esc_attr(get_option('buzz_contact2_name')); ?>" />
                <div class="rt_clearfix"></div>
            </div>     
            <div class="rt_input rt_text">
                <div class="rt_description">
                    <label for="buzz_contact2_value"><?php _e('Contact 2 value', 'buzz'); ?></label>
                    <div class="rt_clearfix"></div>
                </div>
                <input name="buzz_contact2_value" id="buzz_contact2_value" type="text" value="<?php echo esc_attr(get_option('buzz_contact2_value')); ?>" />
                <div class="rt_clearfix"></div>
            </div>  
        </div>
        <div class="clear"></div>
        <div id="toeThemeEditFormMsg"><?php if(isset($_GET['settings-updated']) && $_GET['settings-updated'] == true) _e('Done', 'buzz'); ?></div>
        <p class="submit">
            <input type="submit" style="margin-left:17px;" class="button-primary" value="<?php _e('Save settings', 'buzz') ?>"/>
        </p>
    </div>

    </form>
</div>

<?php 
} 
?>
