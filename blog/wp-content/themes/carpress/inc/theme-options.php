<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'contact_page_section',
        'title'       => 'Contact page'
      ),
      array(
        'id'          => 'layout_section',
        'title'       => 'Layout'
      ),
      array(
        'id'          => 'social_icons',
        'title'       => 'Social icons'
      ),
      array(
        'id'          => 'section_auto_updates',
        'title'       => 'Automatic Updates'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'appointment_button',
        'label'       => 'Featured page in the main menu',
        'desc'        => 'The selected page will be displayed next to the main menu at the top of the page in the button',
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'h2_blog',
        'label'       => 'H2: Blog',
        'desc'        => '<h2>Blog</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'blog_page_title',
        'label'       => 'Title of the blog page',
        'desc'        => 'Select the name of the title for page where the blog posts will be displayed. If left empty, the blog title will be used',
        'std'         => 'Latest News',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'h2_services',
        'label'       => 'H2: Services',
        'desc'        => '<h2>Services</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'services_page_title',
        'label'       => 'Title of the services page',
        'desc'        => 'The title for the page where services are displayed',
        'std'         => 'Our Services',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'services_url_slug',
        'label'       => 'URL of The Services page',
        'desc'        => 'Only lowercase letters, numbers and dash (-) allowed! This will be the URL of the page where all the services will appear, for example <code>http://www.yoursite.com/<b>our-services</b></code>. Add only what comes after your WP installation URL, for example <b>\'our-services\'</b>.',
        'std'         => 'services',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'h2_gallery',
        'label'       => 'H2: Gallery',
        'desc'        => '<h2>Gallery</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'gallery_page_title',
        'label'       => 'Title of the gallery page',
        'desc'        => 'The title for the page where galleries are displayed',
        'std'         => 'Gallery',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'gallery_url_slug',
        'label'       => 'URL of the Gallery page',
        'desc'        => 'Only lowercase letters, numbers and dash (-) allowed! This will be the URL of the page where all the galleries will appear, for example <code>http://www.yoursite.com/<b>our-fine-galleries</b></code>. Add only what comes after your WP installation URL, for example <b>\'our-fine-galleries\'</b>.',
        'std'         => 'gallery',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'h2_team',
        'label'       => 'H2: The Team',
        'desc'        => '<h2>The Team</h2>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'team_page_title',
        'label'       => 'Title of the team page',
        'desc'        => 'The title for the page where team members are displayed',
        'std'         => 'Meet the team',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'the_team_url_slug',
        'label'       => 'URL of the Meet the Team page',
        'desc'        => 'Only lowercase letters, numbers and dash (-) allowed! This will be the URL of the page where all the team members will appear, for example <code>http://www.yoursite.com/<b>our-team-and-more</b></code>. Add only what comes after your WP installation URL, for example <b>\'our-team-and-more\'</b>.',
        'std'         => 'the-team',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'user_custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'Custom CSS styles to change the layout and appearance of your website',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_scripts',
        'label'       => 'Footer Scripts',
        'desc'        => 'Custom scripts for the footer, like Google Analytics tracking script',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'js_date_format',
        'label'       => 'Date Format for Date&amp;Time picker',
        'desc'        => 'This is used for the jQuery UI datetime picker, for the appointment page.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'mm/dd/yy',
            'label'       => '01/31/2013',
            'src'         => ''
          ),
          array(
            'value'       => 'dd/mm/yy',
            'label'       => '31/01/2013',
            'src'         => ''
          ),
          array(
            'value'       => 'yy-mm-dd',
            'label'       => '2013-01-31',
            'src'         => ''
          ),
          array(
            'value'       => 'dd. mm. yy',
            'label'       => '31. 01. 2013',
            'src'         => ''
          ),
          array(
            'value'       => 'd MM, yy',
            'label'       => '31 January, 2013',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'gm_lat_lng',
        'label'       => 'Longitude and latitude of the map center',
        'desc'        => 'Get this from <a href="https://maps.google.com/">Google Maps</a>, longitude and latitude separated by comma, like <code>40.724885,-74.00264</code> for the New York.',
        'std'         => '46.051322,14.506189',
        'type'        => 'text',
        'section'     => 'contact_page_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'gmap_locations',
        'label'       => 'Google Map Locations',
        'desc'        => 'Title and description are used for the popup window, the <b>Link</b> field is used for the latitude and longitude (as above for the map center) and optionally you can attach the image to the popup window as well.',
        'std'         => 'My business name',
        'type'        => 'list-item',
        'section'     => 'contact_page_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_divider',
        'label'       => 'Default content divider',
        'desc'        => '',
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'layout_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'mechanic',
            'label'       => 'mechanic',
            'src'         => 'http://i159.photobucket.com/albums/t159/Prelc/mechanic_zps8aabea3f.png'
          ),
          array(
            'value'       => 'divider-1',
            'label'       => 'Divider 1',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_02.jpg'
          ),
          array(
            'value'       => 'divider-2',
            'label'       => 'Divider 2',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_03.jpg'
          ),
          array(
            'value'       => 'divider-3',
            'label'       => 'Divider 3',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_04.jpg'
          ),
          array(
            'value'       => 'divider-4',
            'label'       => 'Divider 4',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_05.jpg'
          ),
          array(
            'value'       => 'divider-5',
            'label'       => 'Divider 5',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_06.jpg'
          ),
          array(
            'value'       => 'divider-6',
            'label'       => 'Divider 6',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_07.jpg'
          ),
          array(
            'value'       => 'divider-7',
            'label'       => 'Divider 7',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_08.jpg'
          ),
          array(
            'value'       => 'divider-8',
            'label'       => 'Divider 8',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_09.jpg'
          ),
          array(
            'value'       => 'divider-9',
            'label'       => 'Divider 9',
            'src'         => 'http://i1198.photobucket.com/albums/aa449/rob153dave/dividers_10.jpg'
          )
        )
      ),
      array(
        'id'          => 'services_layout',
        'label'       => 'Services Layout',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'layout_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'no',
            'label'       => 'No sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'right',
            'label'       => 'Right sidebar',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'services_bg',
        'label'       => 'Services Title Background',
        'desc'        => 'The background setting for the list of the services.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'layout_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'blog_layout',
        'label'       => 'Blog Layout',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'layout_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'no',
            'label'       => 'No sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'right',
            'label'       => 'Right sidebar',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'gallery_layout',
        'label'       => 'Gallery Layout',
        'desc'        => '',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'layout_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'no',
            'label'       => 'No sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'left',
            'label'       => 'Left sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'right',
            'label'       => 'Right sidebar',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'gallery_bg',
        'label'       => 'Gallery Title Background',
        'desc'        => 'The background setting for the list of the galleries.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'layout_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_left',
        'label'       => 'Footer left',
        'desc'        => 'Text for the footer on the left',
        'std'         => '© Copyright 2013',
        'type'        => 'text',
        'section'     => 'layout_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_right',
        'label'       => 'Footer right',
        'desc'        => 'Text for the footer on the right',
        'std'         => 'Carpress Theme by <a href="http://www.proteusthemes.com">ProteusThemes</a>',
        'type'        => 'text',
        'section'     => 'layout_section',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'soc_icons_infotext',
        'label'       => 'Social Icons',
        'desc'        => 'Delete the contents and save if you don\'t want the icons to show up.',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'rss_icon',
        'label'       => 'RSS feed link',
        'desc'        => 'Usually you get the RSS feed of your site by adding the /feed to the end of your URL, for example: http://www.your-domain.com/feed/',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mail_icon',
        'label'       => 'Contact page icon',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'twitter_icon',
        'label'       => 'Twitter',
        'desc'        => 'Link to your Twitter profile. This is used for social icons in the header of the template',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'facebook_icon',
        'label'       => 'Facebook',
        'desc'        => 'Link to your Facebook page/profile. This is used for social icons in the header of the template',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'youtube_icon',
        'label'       => 'Youtube',
        'desc'        => 'Link to your YouTube profile. This is used for social icons in the header of the template',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'google_icon',
        'label'       => 'Google+',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pinterest_icon',
        'label'       => 'Pinterest',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'skype_icon',
        'label'       => 'Skype call',
        'desc'        => 'Type here in just your Skype username and the users will be able to call you if they click the Skype icon.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'thumblr_icon',
        'label'       => 'Tumblr',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'linkedin_icon',
        'label'       => 'LinkedIn',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'flickr_icon',
        'label'       => 'Flickr',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'instagram_icon',
        'label'       => 'Instagram',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'foursquare_icon',
        'label'       => 'Foursquare',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_icons',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'auto_update_instructions',
        'label'       => 'Auto-update instructions',
        'desc'        => 'If you fill out the two fields below, you will be notified when the theme update is available and you will be able to update with just one click.

Please note, that all the changes you will make in the code directly will be overwritten with the updates. Use the <a href="http://codex.wordpress.org/Child_Themes">Child Themes</a> to alter the code, <a href="https://github.com/primozcigler/Hairpress-Child-Theme">here is the scaffold for the Hairpress</a>.',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'section_auto_updates',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'tf_username',
        'label'       => 'Your username',
        'desc'        => 'Your Envato marketplace (ThemeForest) username.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'section_auto_updates',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'tf_api_key',
        'label'       => 'API key',
        'desc'        => 'Your API key (NOT a password). See <a href="https://www.diigo.com/item/p/pdbsqoszbspabboqezbcoserod" target="_blank">here</a> where you can generate your new API key on ThemeForest site.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'section_auto_updates',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}