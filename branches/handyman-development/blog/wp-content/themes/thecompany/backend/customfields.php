<?php

if ( !class_exists('rf_myCustomFields') ) {
	class rf_myCustomFields {
		/**
		* @var  string  $prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $prefix = '';
		/**
		* @var  array  $customFields  Defines the custom fields available
		*/
		var $customFields =	array(
			array(
				"title"			=> "General section options",
				"type"			=>	"header",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "sectiontype",
				"title"			=> "Section type",
				"description"	=> "The type of content for this section",
				"options"		=> "Plain content,Portfolio,Widget area,Blog tiles",
				"type"			=>	"dropdown",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "sectionparallax",
				"title"			=> "Parallax effect",
				"description"	=> "Give the background image (featured image) a parallax effect",
				"type"			=>	"checkbox",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "sectionvideo",
				"title"			=> "Section background video",
				"description"	=> "The background video for this section (can not be combined with parallax)",
				"type"			=>	"text",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "sectionbgcolor",
				"title"			=> "Section background color",
				"description"	=> "The background color for this section",
				"type"			=>	"color",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "sectiontextcolor",
				"title"			=> "Section text color",
				"description"	=> "The text color for this section",
				"type"			=>	"color",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "sectionfullwidth",
				"title"			=> "Make this section fullwidth",
				"description"	=> "This option will remove the left and right padding, making it fullwidth. Take note that the default top and bottom padding will also be removed.",
				"type"			=>	"checkbox",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "sectionmargintop",
				"title"			=> "Section top margin",
				"description"	=> "The top margin for this section (can also be negative)",
				"type"			=>	"text",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "sectionmarginbottom",
				"title"			=> "Section bottom margin",
				"description"	=> "The bottom margin for this section (can also be negative)",
				"type"			=>	"text",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "general"
			),
			array(
				"title"			=> "Portfolio section options",
				"type"			=>	"header",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "sectioncolumns",
				"title"			=> "Number of items per row",
				"description"	=> "The number of portfolio items to display per row",
				"options"		=> "2,3,4",
				"type"			=>	"dropdown",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "sectionportfolioupsidedown",
				"title"			=> "Display image at the top",
				"description"	=> "This option will put the image above the title and excerpt",
				"type"			=>	"checkbox",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "sectionportfoliobg",
				"title"			=> "Section portfolio tile background",
				"description"	=> "The background color for the portfolio tiles",
				"type"			=>	"color",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "sectiontitlecolor",
				"title"			=> "Section portfolio title color",
				"description"	=> "The title color for this portfolio section",
				"type"			=>	"color",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "portfoliofilterbgcolor",
				"title"			=> "Portfolio filter background color",
				"description"	=> "The background color for the filter",
				"type"			=> "color",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "portfoliofiltertextcolor",
				"title"			=> "Portfolio filter text color",
				"description"	=> "The text color for the filter",
				"type"			=> "color",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "portfoliofilter",
				"title"			=> "Display the filter for this portfolio section",
				"description"	=> "This option will enable the filter on this portfolio section",
				"type"			=>	"checkbox",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "portfoliocats",
				"title"			=> "Portfolio categories to display in the filter",
				"description"	=> "The portfolio categories to display in the filter. TIP: You can reorder them by dragging and dropping.",
				"type"			=>	"portfolio-cats",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"name"			=> "portfolioitems",
				"title"			=> "Portfolio items to display",
				"description"	=> "The portfolio items to display in this section. TIP: You can reorder them by dragging and dropping.",
				"type"			=>	"portfolio",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "portfolio"
			),
			array(
				"title"			=> "Widget section options",
				"type"			=>	"header",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "widget-area"
			),
			array(
				"name"			=> "sectionsidebar",
				"title"			=> "Widget area to use",
				"description"	=> "Select which widget area should be used for this section.",
				"type"			=>	"sidebar",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "widget-area"
			),
			array(
				"title"			=> "Portfolio options",
				"type"			=>	"header",
				"scope"			=>	array( "portfolio" ),
				"capability"	=> "edit_post"
			),
			array(
				"name"			=> "portfoliolink",
				"title"			=> "Alternative portfolio link",
				"description"	=> "This is an optional alternative link for the 'view' button in the portfolio overview.",
				"type"			=>	"text",
				"scope"			=>	array( "portfolio" ),
				"capability"	=> "edit_post"
			),
			array(
				"title"			=> "General page options",
				"type"			=>	"header",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "general"
			),
			array(
				"name"			=> "boxedpage",
				"title"			=> "Boxed page",
				"description"	=> "Choose to make this page boxed or fullwidth. Theme Settings apply for the background color and/or image.",
				"options"		=> "Global setting,Boxed page,Fullwidth page",
				"type"			=>	"dropdown",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "general"
			),
			array(
				"title"			=> "Default page options",
				"type"			=>	"header",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "default"
			),
			array(
				"name"			=> "pagelayout",
				"title"			=> "Page layout",
				"description"	=> "The layout for this page. Align the sidebar to the left, right or hide it entirely.",
				"options"		=> "Global setting,Sidebar right,Sidebar left,Fullwidth page",
				"type"			=>	"dropdown",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "default"
			),
			array(
				"name"			=> "sidebar",
				"title"			=> "Widget area to use",
				"description"	=> "Select which widget area should be used for this page.",
				"type"			=>	"sidebar",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "default"
			),
			array(
				"title"			=> "Section page options",
				"type"			=>	"header",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "template-sections"
			),
			array(
				"name"			=> "pagetop",
				"title"			=> "Remove the page heading",
				"description"	=> "This option will remove the entire heading of the page (the page title and the top margin of the page). This will cause content to fall behind the navigation bar.",
				"type"			=>	"checkbox",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "template-sections"
			),
			array(
				"name"			=> "pagetitle",
				"title"			=> "Hide the page title",
				"description"	=> "This option hides the title on this page, but will leave the top margin. Content will not fall behind the navigation bar.",
				"type"			=>	"checkbox",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "template-sections"
			),
			array(
				"name"			=> "sections",
				"title"			=> "Sections to display",
				"description"	=> "The sections to display on this page. TIP: You can reorder them by dragging and dropping.",
				"type"			=>	"sections",
				"scope"			=>	array( "page", "portfolio" ),
				"capability"	=> "edit_page",
				"pagetemplate"	=> "template-sections"
			),
			array(
				"title"			=> "Tiled blog page options",
				"type"			=>	"header",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "blog-tiles"
			),
			array(
				"name"			=> "blogcolumns",
				"title"			=> "Number of posts per row",
				"description"	=> "The number of blog posts to display per row",
				"options"		=> "2,3,4",
				"type"			=>	"dropdown",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "blog-tiles"
			),
			array(
				"name"			=> "blogmaxposts",
				"title"			=> "Blog posts per page",
				"description"	=> "The number of posts to display per page",
				"type"			=>	"text",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "blog-tiles"
			),
			array(
				"name"			=> "blogexcerptlength",
				"title"			=> "Excerpt length",
				"description"	=> "The number of characters to display in the post item. Anything longer will be cut off. Default is 50 characters.",
				"type"			=>	"text",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "blog-tiles"
			),
			array(
				"name"			=> "blogtilecolor",
				"title"			=> "Blog tile color",
				"description"	=> "The tile color for the blog items",
				"type"			=> "color",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "blog-tiles"
			),
			array(
				"name"			=> "blogtitlecolor",
				"title"			=> "Blog title color",
				"description"	=> "The title color for the blog items",
				"type"			=> "color",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "blog-tiles"
			),
			array(
				"name"			=> "blogcats",
				"title"			=> "Blog categories to display",
				"description"	=> "The blog categories to display on this page.",
				"type"			=>	"categories",
				"scope"			=>	array( "section" ),
				"capability"	=> "edit_post",
				"pagetemplate"	=> "blog-tiles"
			)
		);
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultCustomFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				remove_meta_box( 'postcustom', 'post', $context );
				remove_meta_box( 'postcustom', 'page', $context );
				remove_meta_box( 'postcustom', 'section', $context );
				remove_meta_box( 'postcustom', 'portfolio', $context );
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function createCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-custom-fields', 'Additional settings', array( &$this, 'displayCustomFields' ), 'page', 'normal', 'high' );
				add_meta_box( 'my-custom-fields', 'Additional settings', array( &$this, 'displayCustomFields' ), 'section', 'normal', 'high' );
				add_meta_box( 'my-custom-fields', 'Additional settings', array( &$this, 'displayCustomFields' ), 'portfolio', 'normal', 'high' );
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displayCustomFields() {
			global $post, $theme_options;
			?>
			<div class="form-wrap">
				<?php
				wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
				foreach ( $this->customFields as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						switch ( $scopeItem ) {
							case "post": {
								// Output on any post screen
								if ($post->post_type=="post" )
									$output = true;
								break;
							}
							case "page": {
								// Output on any page screen
								if ($post->post_type=="page" )
									$output = true;
								break;
							}
							case "slide": {
								// Output on any slide screen
								if ($post->post_type=="slide" )
									$output = true;
								break;
							}
							case "section": {
								// Output on any section screen
								if ($post->post_type=="section" )
									$output = true;
								break;
							}
							case "portfolio": {
								// Output on any section screen
								if ($post->post_type=="portfolio" )
									$output = true;
								break;
							}
						}
						if ( $output ) break;
					}
					// Check capability
					if ( !current_user_can( $customField['capability'], $post->ID ) )
						$output = false;
					// Output if allowed
					if ( $output ) { ?>
						<div class="form-field form-required <?php if ($customField[ 'pagetemplate' ]) echo $customField[ 'pagetemplate' ]; ?>">
							<?php
							switch ( $customField[ 'type' ] ) {
								case "header": {
									// Header
									echo '<div class="customfield_header">' . $customField[ 'title' ] . '</div>';
									break;
								}
								case "checkbox": {
									// Checkbox
									echo '<label><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<div class="checkbox-container"><input type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'">'. $customField[ 'title' ] .'</label></div>';
									break;
								}
								case "textarea": {
									// Text area
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									break;
								}
								case "upload": {
									// Upload field
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" class="upload_field" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '<div><input class="upload_button" style="width:auto;" type="button" value="Browse" /></div>';
									break;
								}
								case "dropdown": {
									// Dropdown field
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<select name="' . $this->prefix . $customField[ 'name' ] .'" id="' . $this->prefix . $customField[ 'name' ] .'">';
									$options = explode(',',$customField['options']);
									foreach ($options as $option) {
										$selected = '';
										if (get_post_meta($post->ID, $this->prefix.$customField['name'], true) == $option) {
											$selected = 'selected="selected"';
										}
										echo '<option '.$selected.' value="'.$option.'">'.$option.'</option>';
									}
									echo '</select>';
									break;
								}
								case "categories": {
									// Category list
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<div class="sortable-list">';
									$category_array = get_post_meta( $post->ID, $this->prefix . $customField['name'], true );
									$temp_array = array();
									if ($category_array) {
										$temp_array = explode(',',$category_array);
										foreach ($temp_array as $catid) {
											echo '<div class="sortable">';
											echo '<input type="checkbox" checked name="' . $this->prefix . $customField['name'] . '[]" id="' . $this->prefix . $customField['name'] . '" value="' . $catid .'" />' . get_cat_name($catid);
											echo '</div>';
										}
									}
									$categories = get_categories('order_by=name&order=asc&hide_empty=0');
									foreach ($categories as $cat) {
										if ($cat->category_parent == 0 && !in_array($cat->term_id, $temp_array)) {
											echo '<div class="sortable">';
											echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '[]" id="' . $this->prefix . $customField['name'] . '" value="' . $cat->term_id .'" />' . $cat->name;
											echo '</div>';
										}
									}
									echo '</div>';
									break;
								}
								case "sections": {
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<div class="sortable-list">';
									$category_array = get_post_meta( $post->ID, $this->prefix . $customField['name'], true );
									$temp_array = array();
									if ($category_array) {
										$temp_array = explode(',',$category_array);
										foreach ($temp_array as $catid) {
											echo '<div class="sortable">';
											echo '<input type="checkbox" checked name="' . $this->prefix . $customField['name'] . '[]" id="' . $this->prefix . $customField['name'] . '" value="' . $catid .'" />' . get_the_title($catid);
											echo '</div>';
										}
									}
									
									$args = array( 'posts_per_page' => -1, 'post_type' => 'section', 'order' => 'DESC');
									$sections = get_posts( $args );
								
									foreach ( $sections as $section ) : 
										if (!in_array($section->ID, $temp_array)) {
											echo '<div class="sortable">';
											echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '[]" id="' . $this->prefix . $customField['name'] . '" value="' . $section->ID .'" />' . $section->post_title;
											echo '</div>';
										}
									endforeach;
									wp_reset_postdata();
									echo '</div>';
									break;
								}
								case "portfolio": {
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<div class="sortable-list">';
									$category_array = get_post_meta( $post->ID, $this->prefix . $customField['name'], true );
									$temp_array = array();
									if ($category_array) {
										$temp_array = explode(',',$category_array);
										foreach ($temp_array as $catid) {
											echo '<div class="sortable">';
											echo '<input type="checkbox" checked name="' . $this->prefix . $customField['name'] . '[]" id="' . $this->prefix . $customField['name'] . '" value="' . $catid .'" />' . get_the_title($catid);
											echo '</div>';
										}
									}
									
									$args = array( 'posts_per_page' => -1, 'post_type' => 'portfolio', 'order' => 'DESC');
									$sections = get_posts( $args );
								
									foreach ( $sections as $section ) : 
										if (!in_array($section->ID, $temp_array)) {
											echo '<div class="sortable">';
											echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '[]" id="' . $this->prefix . $customField['name'] . '" value="' . $section->ID .'" />' . $section->post_title;
											echo '</div>';
										}
									endforeach;
									wp_reset_postdata();
									echo '</div>';
									break;
								}
								case "portfolio-cats": {
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<div class="sortable-list">';
									$category_array = get_post_meta( $post->ID, $this->prefix . $customField['name'], true );
									$temp_array = array();
									if ($category_array) {
										$temp_array = explode(',',$category_array);
										foreach ($temp_array as $catid) {
											$cat = get_term( $catid, 'portfoliocat' );
											echo '<div class="sortable">';
											echo '<input type="checkbox" checked name="' . $this->prefix . $customField['name'] . '[]" id="' . $this->prefix . $customField['name'] . '" value="' . $catid .'" />' . $cat->name;
											echo '</div>';
										}
									}
									
									$args = array(
										'orderby' => 'name',
										'order' => 'ASC',
										'taxonomy' => 'portfoliocat'
									);
									$categories = get_categories($args);
								
									foreach ( $categories as $cat ) : 
										if (!in_array($cat->term_id, $temp_array)) {
											echo '<div class="sortable">';
											echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '[]" id="' . $this->prefix . $customField['name'] . '" value="' . $cat->term_id .'" />' . $cat->name;
											echo '</div>';
										}
									endforeach;
									wp_reset_postdata();
									echo '</div>';
									break;
								}
								case "sidebar": {
									// Dropdown field
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<select name="' . $this->prefix . $customField[ 'name' ] .'" id="' . $this->prefix . $customField[ 'name' ] .'">';

									foreach ($GLOBALS['wp_registered_sidebars'] as $sidebar) {
										if ($sidebar['id']) {
											$selected = '';
											if (get_post_meta($post->ID, $this->prefix.$customField['name'], true) == $sidebar['id']) {
												$selected = 'selected="selected"';
											}
											echo '<option '.$selected.' value="'.$sidebar['id'].'">'.$sidebar['name'].'</option>';
										}
									}
										
									echo '</select>';
									
									break;
								}
								case "color": {
									// color field
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<div class="colorexample" style="background:#' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . ';"></div>';
									echo '<input type="text" class="cp_colorpicker" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;
								}
								default: {
									// Plain text field
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;
								}
							}
							?>
							<?php if ( isset($customField[ 'description' ]) ) echo '<p class="description">' . $customField[ 'description' ] . '</p>'; ?>
						</div>
					<?php
					}
				} ?>
			</div>
			<?php
		}
		/**
		* Save the new Custom Fields values
		*/
		function saveCustomFields( $post_id, $post ) {
			if ( isset($_POST[ 'my-custom-fields_wpnonce' ]) && !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			if ( $post->post_type != 'page' && $post->post_type != 'post' && $post->post_type != 'slide' && $post->post_type != 'section' && $post->post_type != 'portfolio' )
				return;
			foreach ( $this->customFields as $customField ) {
				if ( current_user_can( $customField['capability'], $post_id ) && isset($customField[ 'name' ]) ) {
					if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim((is_array($_POST[$this->prefix.$customField['name']]) ? implode(",",$_POST[$this->prefix.$customField['name']]) : $_POST[$this->prefix.$customField['name']]))) {
						update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], (is_array($_POST[$this->prefix.$customField['name']]) ? implode(",",$_POST[$this->prefix.$customField['name']]) : $_POST[$this->prefix.$customField['name']]) );
					} else {
						delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
					}
				}
			}
		}
	} // End Class
} // End if class exists statement
// Instantiate the class
if ( class_exists('rf_myCustomFields') ) {
	$rf_myCustomFields_var = new rf_myCustomFields();
}
?>