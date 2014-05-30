<?php
class rf_ControlPanel {
	
	//Theme options
	var $optionlist = Array(
		array(
			'id' => 'general',
			'name' => 'General',
			'first' => true,
			'options' => array(
				array(
					'name' => 'General',
					'type' => 'title'
				),
				array(
					'id' => 'cp_bloglogo',
					'name' => 'Website logo',
					'type' => 'upload'
				),
				array(
					'id' => 'cp_search_button',
					'name' => 'Hide search button',
					'type' => 'checkbox',
					'desc' => 'Hide the search button in the navigation bar.'
				),
				array(
					'id' => 'cp_topmenu',
					'name' => 'Hide the social bar',
					'type' => 'checkbox',
					'desc' => 'This will disable the social bar and stick the navigation bar to the top of the page.'
				),
				array(
					'id' => 'cp_normal_dropdown',
					'name' => 'Normal navigation menu dropdown',
					'type' => 'checkbox',
					'desc' => 'Select this option to enable the normal small width dropdown menus (enabling nested menus).'
				),
				array(
					'id' => 'cp_sectionfade',
					'name' => 'Section fade effect',
					'type' => 'checkbox',
					'desc' => 'Select this option to enable the section fade effect when scrolling.'
				),
				array(
					'id' => 'cp_favicon',
					'name' => 'Favicon',
					'type' => 'upload'
				),
				array(
					'id' => 'cp_trackingcode',
					'name' => 'Google analytics',
					'type' => 'text',
					'desc' => 'Insert your google analytics tracking number'
				),
				array(
					'id' => 'cp_sidebar_position',
					'name' => 'Sidebar position',
					'type' => 'dropdown',
					'options' => array(
						'Sidebar right' => 'Sidebar on the right',
						'Sidebar left' => 'Sidebar on the left',
						'Fullwidth page' => 'Fullwidth page: hide the sidebar'
					),
					'default' => 'all',
					'desc' => 'Select which elements to display in the header'
				),
				array(
					'id' => 'cp_sidebars',
					'name' => 'Custom sidebars',
					'type' => 'text',
					'desc' => 'Your custom sidebars. Seperate the sidebar names with a comma. For example: home, contact, services'
				),
				array(
					'id' => 'cp_portfolio_slug',
					'name' => 'Portfolio slug',
					'type' => 'text',
					'default' => 'portfolio',
					'desc' => "This is the name of the portfolio items that can be found in the url. WARNING: WHEN YOU CHANGE THIS SETTING, GO TO SETTINGS -> PERMALINKS AND SAVE THE PAGE. OTHERWISE YOU'LL GET ERRORS!"
				),
				array(
					'id' => 'cp_footer_menu',
					'name' => 'Hide Footer menu',
					'type' => 'checkbox',
					'desc' => 'Hide the footer navigation menu.'
				),
				array(
					'id' => 'cp_footer_textbar',
					'name' => 'Hide Footer text',
					'type' => 'checkbox',
					'desc' => 'Hide the footer text.'
				),
				array(
					'id' => 'cp_footer_text',
					'name' => 'Footer text',
					'type' => 'text',
					'desc' => 'The text located in the bottom of the footer, mainly used for copyright text.'
				)
			)
		),
		array(
			'id' => 'design',
			'name' => 'Design',
			'options' => array(
				array(
					'name' => 'Design',
					'type' => 'title'
				),
				array(
					'id' => 'cp_boxed_site',
					'name' => 'Boxed website',
					'type' => 'checkbox',
					'desc' => 'Make the site boxed instead of fullwidth'
				),
				array(
					'id' => 'cp_site_background_color',
					'name' => 'Site background color (boxed version)',
					'type' => 'colorpicker',
					'default' => 'eeeeee',
					'desc' => 'The background color used for the site (boxed version)'
				),
				array(
					'id' => 'cp_site_background',
					'name' => 'Site background image (boxed version)',
					'type' => 'upload'
				),
				array(
					'id' => 'cp_content_background_color',
					'name' => 'Content background color',
					'type' => 'colorpicker',
					'default' => 'ffffff',
					'desc' => 'The background color used for the content'
				),
				array(
					'id' => 'cp_sitewidth',
					'name' => 'Container width',
					'type' => 'text',
					'default' => '1200',
					'desc' => 'The maximum width of your content (in pixels)'
				),
				array(
					'id' => 'cp_headercolor',
					'name' => 'Header background color',
					'type' => 'colorpicker',
					'default' => 'eeeeee',
					'desc' => 'The background color used for the header of the site'
				),
				array(
					'id' => 'cp_headerimage',
					'name' => 'Header background image (optional)',
					'type' => 'upload'
				),
				array(
					'id' => 'cp_headertitlecolor',
					'name' => 'Header title color',
					'type' => 'colorpicker',
					'default' => '626B75',
					'desc' => 'The title color used in the header of the site'
				),
				array(
					'id' => 'cp_top_text_color',
					'name' => 'Top text color',
					'type' => 'colorpicker',
					'default' => '626B75',
					'desc' => 'The text color of the top text, above the top navigation bar'
				),
				array(
					'id' => 'cp_menu_bg_color',
					'name' => 'Menu background color',
					'type' => 'colorpicker',
					'default' => 'ffffff',
					'desc' => 'The background color for the navigation menu'
				),
				array(
					'id' => 'cp_menu_bg_opacity',
					'name' => 'Menu background opacity',
					'type' => 'slider',
					'default' => '1',
					'desc' => 'The opacity of the navigation menu bar'
				),
				array(
					'id' => 'cp_menu_text_color',
					'name' => 'Menu text color',
					'type' => 'colorpicker',
					'default' => '626B75',
					'desc' => 'The text color for the navigation menu'
				),
				array(
					'id' => 'cp_menu2_bg_color',
					'name' => 'Shop and search dropdown background color',
					'type' => 'colorpicker',
					'default' => 'eeeeee',
					'desc' => 'The background color for the shop and search dropdown menu'
				),
				array(
					'id' => 'cp_color1',
					'name' => 'Theme text color',
					'type' => 'colorpicker',
					'default' => '626B75',
					'desc' => 'The text color used in the theme'
				),
				array(
					'id' => 'cp_color2',
					'name' => 'Primary theme color',
					'type' => 'colorpicker',
					'default' => '2eaeb9',
					'desc' => 'The Primary color used in the theme for buttons, links, lines etc'
				),
				array(
					'id' => 'cp_color2_fg',
					'name' => 'Primary theme text color',
					'type' => 'colorpicker',
					'default' => 'fff',
					'desc' => 'The Primary text color used for text in buttons'
				),
				array(
					'id' => 'cp_color3',
					'name' => 'Secondary theme color',
					'type' => 'colorpicker',
					'default' => 'e99d3a',
					'desc' => 'The Secondary color used in the theme mainly for hovers'
				),
				array(
					'id' => 'cp_color3_fg',
					'name' => 'Secondary theme text color',
					'type' => 'colorpicker',
					'default' => 'fff',
					'desc' => 'The secondary text color used for text in buttons upon hover'
				),
				array(
					'id' => 'cp_sidebar_title_color',
					'name' => 'Sidebar title color',
					'type' => 'colorpicker',
					'default' => '474f57',
					'desc' => 'The title color for the sidebar'
				),
				array(
					'id' => 'cp_footer_bg_color',
					'name' => 'Footer background color',
					'type' => 'colorpicker',
					'default' => '333333',
					'desc' => 'The background color for the footer'
				),
				array(
					'id' => 'cp_footer_title_color',
					'name' => 'Footer title color',
					'type' => 'colorpicker',
					'default' => 'ffffff',
					'desc' => 'The title color for the footer'
				),
				array(
					'id' => 'cp_footer_text_color',
					'name' => 'Footer text color',
					'type' => 'colorpicker',
					'default' => 'aaaaaa',
					'desc' => 'The text color for the footer'
				),
				array(
					'id' => 'cp_subfooter_bg_color',
					'name' => 'Subfooter background color',
					'type' => 'colorpicker',
					'default' => '232323',
					'desc' => 'The background color for the subfooter'
				),
				array(
					'id' => 'cp_subfooter_text_color',
					'name' => 'Subfooter text color',
					'type' => 'colorpicker',
					'default' => 'aaaaaa',
					'desc' => 'The text color for the subfooter'
				),
				array(
					'id' => 'cp_font1_source',
					'name' => 'Title font source',
					'type' => 'textarea',
					'default' => 'http://fonts.googleapis.com/css?family=Montserrat:400,700',
					'desc' => 'The title font used in the theme. Copy & paste the source link from the Google Font directory: <a href="http://www.google.com/fonts">http://www.google.com/fonts</a>. Copy the source link in this field. For the Montserrat font this would be "http://fonts.googleapis.com/css?family=Montserrat:400,700".'
				),
				array(
					'id' => 'cp_font1_family',
					'name' => 'Title font family',
					'type' => 'textarea',
					'default' => 'font-family: "Montserrat", sans-serif;',
					'desc' => 'The family declaration for the title font. You can copy & paste this from the google page. For the "Montserrat" font this would be: font-family: "Montserrat", sans-serif;'
				),
				array(
					'id' => 'cp_font2_source',
					'name' => 'Body font source',
					'type' => 'textarea',
					'default' => 'http://fonts.googleapis.com/css?family=Montserrat:400,700',
					'desc' => 'The body font used in the theme. Copy & paste the source link from the Google Font directory: <a href="http://www.google.com/fonts">http://www.google.com/fonts</a>. Copy the source link in this field. For the "PT Serif" font this would be "http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic".'
				),
				array(
					'id' => 'cp_font2_family',
					'name' => 'Body font family',
					'type' => 'textarea',
					'default' => 'font-family: "Montserrat", sans-serif;',
					'desc' => 'The family declaration for the body font. You can copy & paste this from the google page. For the "PT Serif" font this would be: font-family: "PT Serif", serif;'
				)
			)
		),
		array(
			'id' => 'socialicons',
			'name' => 'Social icons',
			'options' => array(
				array(
					'name' => 'Social icons',
					'type' => 'title'
				),
				array(
					'id' => 'cp_top_text',
					'name' => 'Top text',
					'type' => 'text',
					'desc' => 'The text placed at the top right next to the social icons'
				),
				array(
					'id' => 'cp_social_icon1_source',
					'name' => 'Icon #1 image',
					'type' => 'upload',
					'desc' => 'The image used for the first icon'
				),
				array(
					'id' => 'cp_social_icon1_link',
					'name' => 'Icon #1 link',
					'type' => 'text',
					'desc' => 'The link used for the first icon'
				),
				array(
					'id' => 'cp_social_icon2_source',
					'name' => 'Icon #2 image',
					'type' => 'upload',
					'desc' => 'The image used for the second icon'
				),
				array(
					'id' => 'cp_social_icon2_link',
					'name' => 'Icon #2 link',
					'type' => 'text',
					'desc' => 'The link used for the first icon'
				),
				array(
					'id' => 'cp_social_icon3_source',
					'name' => 'Icon #3 image',
					'type' => 'upload',
					'desc' => 'The image used for the third icon'
				),
				array(
					'id' => 'cp_social_icon3_link',
					'name' => 'Icon #3 link',
					'type' => 'text',
					'desc' => 'The link used for the third icon'
				),
				array(
					'id' => 'cp_social_icon4_source',
					'name' => 'Icon #4 image',
					'type' => 'upload',
					'desc' => 'The image used for the fourth icon'
				),
				array(
					'id' => 'cp_social_icon4_link',
					'name' => 'Icon #4 link',
					'type' => 'text',
					'desc' => 'The link used for the fourth icon'
				),
				array(
					'id' => 'cp_social_icon5_source',
					'name' => 'Icon #5 image',
					'type' => 'upload',
					'desc' => 'The image used for the fifth icon'
				),
				array(
					'id' => 'cp_social_icon5_link',
					'name' => 'Icon #5 link',
					'type' => 'text',
					'desc' => 'The link used for the fifth icon'
				),
				array(
					'id' => 'cp_social_icon6_source',
					'name' => 'Icon #6 image',
					'type' => 'upload',
					'desc' => 'The image used for the sixth icon'
				),
				array(
					'id' => 'cp_social_icon6_link',
					'name' => 'Icon #6 link',
					'type' => 'text',
					'desc' => 'The link used for the sixth icon'
				)
			)
		),
		array(
			'id' => 'error',
			'name' => 'Error page',
			'options' => array(
				array(
					'name' => 'Error page',
					'type' => 'title'
				),
				array(
					'id' => 'cp_error_title',
					'name' => 'Error page title',
					'type' => 'text',
					'default' => 'Woops, something went wrong!',
					'desc' => 'The title for the 404 error page'
				),
				array(
					'id' => 'cp_error_content',
					'name' => 'Error page content',
					'type' => 'textarea',
					'default' => 'Apologies, but we were unable to find what you were looking for.',
					'desc' => 'The content for the 404 error page'
				)
			)
		),
		array(
			'id' => 'customcss',
			'name' => 'Custom css',
			'options' => array(
				array(
					'name' => 'Custom CSS',
					'type' => 'title'
				),
				array(
					'id' => 'cp_custom_css',
					'name' => 'Custom CSS',
					'type' => 'textarea',
					'desc' => 'Use this text area to overwrite css styles from the theme or from plugins. This css will be loaded after everything else.'
				)
			)
		)
	);
	
	function rf_ControlPanel() {
		global $rf_theme_name;
		add_action('admin_menu', array(&$this, 'admin_menu'));
		if (!is_array(get_option($rf_theme_name))) {
			$default_settings = $this->setDefaults();
			add_option($rf_theme_name, $default_settings);
			$this->options = get_option($rf_theme_name);
		}
		$this->options = get_option($rf_theme_name);
	}
  
	function setDefaults() {
		$default_settings = array();
		foreach($this->optionlist as $menuitem) {
			foreach($menuitem['options'] as $theme_option) {
				if (isset($theme_option['default'])) $default_settings[$theme_option['id']] = $theme_option['default'];
			}
		}
		return $default_settings;
	}
	
	function admin_menu() {
	  	add_theme_page('theme settings', 'Theme Settings', 'edit_theme_options', "theme_settings", array(&$this, 'optionsmenu'));
	}
	
	function optionsmenu() {
		global $rf_theme_name;
		
		// Save the settings
		if (isset($_POST['ss_action']) && $_POST['ss_action'] == 'save') {
			foreach($this->optionlist as $menuitem) {
				foreach($menuitem['options'] as $theme_option) {
					if (isset($theme_option['id']) && empty($_POST[$theme_option['id']])) {
						$option_value = false;
					} elseif (isset($theme_option['id'])) {
						$option_value = $_POST[$theme_option['id']];
					}
				  	if (isset($theme_option['id']) && isset($option_value)) $this->options[$theme_option['id']] = $option_value;
				}
			}
			update_option($rf_theme_name, $this->options);
			echo '<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204); width: 300px; margin-left: 20px"><p>Settings <strong>saved</strong>.</p></div>';
		} ?>
		
		<div class="wrap rm_wrap">
			<h2>Theme Settings</h2>
			<p>To easily use the theme, use the options below.</p>
			<div id="theme-menu">
				<?php foreach($this->optionlist as $menuitem) { ?>
				<a href="#item-<?php echo $menuitem['id']; ?>" class="menu-item menu-item-<?php echo $menuitem['id']; ?>" item="item-<?php echo $menuitem['id']; ?>"><?php echo $menuitem['name']; ?></a>
				<?php } ?>
			</div>
			<div class="rm_opts">
				<form action="" method="post" class="themeform">
					<input type="hidden" id="ss_action" name="ss_action" value="save">
					<?php foreach($this->optionlist as $menuitem) { ?>
					<div class="rm_section item-<?php echo $menuitem['id']; ?>">
						<?php foreach($menuitem['options'] as $theme_option) {
							switch($theme_option['type']) {
								case 'title': ?>
									<div class="rm_title">
										<h3><?php echo $theme_option['name']; ?></h3>
										<span class="submit">
											<input type="submit" value="Save Changes" name="cp_save"/>
										</span>
										<div class="clearfix"></div>
									</div>
									<?php break;
								case 'upload': ?>
									<div class="rm_input rm_text">
										<label for="<?php echo $theme_option['id']; ?>"><?php echo $theme_option['name']; ?></label>
										<input type="text" name="<?php echo $theme_option['id']; ?>" id="<?php echo $theme_option['id']; ?>" class="upload_field" value="<?php if (isset($this->options[$theme_option['id']])) echo $this->options[$theme_option['id']]; ?>" />
										<small><input class="upload_button" type="button" value="Browse" /></small><div class="clearfix"></div>
									</div>
									<?php break;
								case 'dropdown': ?>
									<div class="rm_input rm_select">
										<label for="<?php echo $theme_option['id']; ?>"><?php echo $theme_option['name']; ?></label>
										<select name="<?php echo $theme_option['id']; ?>" id="<?php echo $theme_option['id']; ?>">
											<?php foreach($theme_option['options'] as $key => $value) { 
											if (is_numeric($key)) $key = $value; ?>
											<option <?php if (isset($this->options[$theme_option['id']]) && $this->options[$theme_option['id']] == $key) { ?>selected="selected"<?php } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
											<?php } ?>
										</select>
										<small><?php echo $theme_option['desc']; ?></small><div class="clearfix"></div>
									</div>
									<?php break;
								case 'checkbox': ?>
									<div class="rm_input rm_text">
										<label for="<?php echo $theme_option['id']; ?>"><?php echo $theme_option['name']; ?></label>
										<input type="checkbox" <?php if (isset($this->options[$theme_option['id']]) && $this->options[$theme_option['id']] == '1') { echo 'checked'; } ?>  name="<?php echo $theme_option['id']; ?>" id="<?php echo $theme_option['id']; ?>" value="1" />
										<small><?php echo $theme_option['desc']; ?></small><div class="clearfix"></div>
									</div>
									<?php break;
								case 'textarea': ?>
									<div class="rm_input rm_text">
										<label for="<?php echo $theme_option['id']; ?>"><?php echo $theme_option['name']; ?></label>
										<textarea rows="5" cols="50" name="<?php echo $theme_option['id']; ?>" id="<?php echo $theme_option['id']; ?>"><?php if (isset($this->options[$theme_option['id']])) echo stripslashes(htmlspecialchars($this->options[$theme_option['id']])); ?></textarea>
										<small><?php echo $theme_option['desc']; ?></small><div class="clearfix"></div>
									</div>
									<?php break;
								case 'colorpicker': ?>
									<div class="rm_input rm_text rm_color">
										<label for="<?php echo $theme_option['id']; ?>"><?php echo $theme_option['name']; ?></label>
                                        <div class="colorexample" style="background:#<?php if (isset($this->options[$theme_option['id']])) echo $this->options[$theme_option['id']]; ?>;"></div>
										<input type="text" name="<?php echo $theme_option['id']; ?>" id="<?php echo $theme_option['id']; ?>" class="cp_colorpicker" value="<?php if (isset($this->options[$theme_option['id']])) echo $this->options[$theme_option['id']]; ?>" />
										<small><?php echo $theme_option['desc']; ?></small><div class="clearfix"></div>
									</div>
									<?php break;
								case 'slider': ?>
									<div class="rm_input rm_text">
										<label for="<?php echo $theme_option['id']; ?>"><?php echo $theme_option['name']; ?></label>
                                        <input type="hidden" name="<?php echo $theme_option['id']; ?>" class="cp_slider" id="<?php echo $theme_option['id']; ?>" value="<?php if (isset($this->options[$theme_option['id']])) echo $this->options[$theme_option['id']]; ?>" />
                                        <div class="slidervalue"><?php if (isset($this->options[$theme_option['id']])) echo ($this->options[$theme_option['id']] * 100); ?>%</div>
                                        <div class="valueslider"></div>
                                        <small><?php echo $theme_option['desc']; ?></small><div class="clearfix"></div>
									</div>
									<?php break;
								default: ?>
									<div class="rm_input rm_text">
										<label for="<?php echo $theme_option['id']; ?>"><?php echo $theme_option['name']; ?></label>
										<input type="text" name="<?php echo $theme_option['id']; ?>" id="<?php echo $theme_option['id']; ?>" value="<?php if (isset($this->options[$theme_option['id']])) echo stripslashes(htmlspecialchars($this->options[$theme_option['id']])); ?>" />
										<small><?php echo $theme_option['desc']; ?></small><div class="clearfix"></div>
									</div>
									<?php break;
							}
						} ?>
					</div>
					<?php } ?>
				</form>
			</div>
		</div>
		<?php
	}
}
?>