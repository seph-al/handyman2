<?php
/**
 * Different widgets for sidebars
 *
 * @package Carpress
 */


/**************************************
 * Opening Time Widget
 * -----------------------------------
 * Adds the opening time, suitable for the sidebar or used above the slider
 **************************************/

class Opening_Time extends WP_Widget {

	/**
	 * Days of the week, needed for display and $instance variable
	 */
	private $days;

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Opening Time" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Opening Time Widget for placing it into the sidebar or above the slider', 'carpress_wp'),
				'classname' => 'opening-time'
			)
		);

		// set the right order of the days
		$start_of_week = get_option( 'start_of_week ' ); // integer [0,6], 0 = Sunday, 1 = Monday ...
		$this->days = array(
			'Sun' => __( 'Sunday', 'carpress_wp'),
			'Mon' => __( 'Monday', 'carpress_wp'),
			'Tue' => __( 'Tuesday', 'carpress_wp'),
			'Wed' => __( 'Wednesday', 'carpress_wp'),
			'Thu' => __( 'Thursday', 'carpress_wp'),
			'Fri' => __( 'Friday', 'carpress_wp'),
			'Sat' => __( 'Saturday', 'carpress_wp'),
		);

		$this->rotate_days( $start_of_week );
	}

	/**
	 * Rotate the array for a given number of times
	 * @param  int $num shift the array for this number
	 * @return void
	 */
	private function rotate_days( $num ) {
		for ( $i=0; $i < $num; $i++ ) {
			$keys = array_keys( $this->days );
			$val  = $this->days[$keys[0]];
			unset( $this->days[$keys[0]] );
			$this->days[$keys[0]] = $val;
		}
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];

		$out = "";


		$out .= $before_widget;
		$out .= '<div class="time-table">' . "\n";

		if ( ! empty( $title ) ) {
			$out .= '<h2 class="opening-time--title">';
			$out .= apply_filters( 'widget_title', $title, $instance, $this->id_base );
			$out .= '</h2>';
		}
		$out .= '<div class="inner-bg">' . "\n";
		$current_time = intval( time() + ( (double)get_option('gmt_offset') * 3600 ) );

		$i = 0;
		foreach( $this->days as $day_label => $day ) {
			$class = $i%2==0 ? "" : " light-bg";

			if ( "1" != $instance[$day_label . '_opened'] ) {
				$class .= " closed";
			}

			if ( date( 'D', $current_time ) == $day_label ) {
				$class .= " today";
			}

			$out .= '<dl class="week-day' . $class . '">' . "\n";
			$out .= '<dt>' . $day . '</dt>' . "\n";
			if ( "1" == $instance[$day_label . '_opened'] ) {
				$out .= '<dd>' . $instance[$day_label . '_from'] . $instance['separator'] . $instance[$day_label . '_to'] . '</dd>' . "\n";
			} else {
				$out .= '<dd>' . $instance['closed_text'] . '</dd>' . "\n";
			}


			$out .= '</dl>' . "\n";
			$i++;
		}


		$out .= '</div>' . "\n"; // .inner-bg

		if ( ! empty( $instance['additional_info'] ) ) {
			$out .= '<div class="additional-info">' . $instance['additional_info'] . '</div>' . "\n"; // .inner-bg
		}

		$out .= '</div>' . "\n"; // .time-table
		$out .= $after_widget;


		echo $out;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		// title
		$instance['title'] = strip_tags( $new_instance['title'] );

		// days
		foreach( $this->days as $day_label => $day ) {
			$instance[$day_label . '_opened'] = strip_tags( $new_instance[$day_label . '_opened'] );
			$instance[$day_label . '_from'] = strip_tags( $new_instance[$day_label . '_from'] );
			$instance[$day_label . '_to'] = strip_tags( $new_instance[$day_label . '_to'] );
		}

		// separator
		$instance['separator'] = $new_instance['separator'];
		// closed text
		$instance['closed_text'] = $new_instance['closed_text'];
		// additional info
		$instance['additional_info'] = $new_instance['additional_info'];

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Opening Time', 'carpress_wp');
		}

		foreach ( $this->days as $day_label => $day ) {
			// opened/closed
			if ( isset( $instance[$day_label . '_opened'] ) ) {
				if ( "1" == $instance[$day_label . '_opened'] ) {
					$opened[$day_label] = 'checked="checked"';
				} else {
					$opened[$day_label] = '';
				}
			} else {
				$opened[$day_label] = 'checked="checked"';
			}
			// from time
			if ( isset( $instance[$day_label . '_from'] ) ) {
				$from[$day_label] = $instance[$day_label . '_from'];
			} else {
				$from[$day_label] = "8:00";
			}
			// to time
			if ( isset( $instance[$day_label . '_to'] ) ) {
				$to[$day_label] = $instance[$day_label . '_to'];
			} else {
				$to[$day_label] = "16:00";
			}
		}

		if ( isset( $instance[ 'separator' ] ) ) {
			$separator = $instance[ 'separator' ];
		}
		else {
			$separator = __( '-', 'carpress_wp');
		}

		if ( isset( $instance[ 'closed_text' ] ) ) {
			$closed_text = $instance[ 'closed_text' ];
		}
		else {
			$closed_text = __( 'CLOSED', 'carpress_wp');
		}

		if ( isset( $instance[ 'additional_info' ] ) ) {
			$additional_info = $instance[ 'additional_info' ];
		}
		else {
			$additional_info = '';
		}

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'carpress_wp'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php // days
		foreach ( $this->days as $day_label => $day ) : ?>
		<p>
			<label for="<?php echo $this->get_field_id( $day_label . '_from' ); ?>"><b><?php echo $day; ?></b></label> <br />
			<input type="checkbox" id="<?php echo $this->get_field_id( $day_label . '_opened' ) ?>" name="<?php echo $this->get_field_name( $day_label . '_opened' ); ?>" value="1" <?php echo $opened[$day_label]; ?> /> <?php _e( 'opened', 'carpress_wp'); ?>
			<br />
			<input type="text" id="<?php echo $this->get_field_id( $day_label . '_from' ) ?>" name="<?php echo $this->get_field_name( $day_label . '_from' ); ?>" value="<?php echo esc_attr( $from[$day_label] ); ?>" size="5" /> <?php _e( "to" , 'carpress_wp') ?>
			<input type="text" id="<?php echo $this->get_field_id( $day_label . '_to' ) ?>" name="<?php echo $this->get_field_name( $day_label . '_to' ); ?>" value="<?php echo esc_attr( $to[$day_label] ) ?>" size="5" />
		</p>
		<?php endforeach; // end days ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'separator' ); ?>"><?php _e( 'Separator between hours', 'carpress_wp'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'separator' ); ?>" name="<?php echo $this->get_field_name( 'separator' ); ?>" type="text" value="<?php echo $separator; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'closed_text' ); ?>"><?php _e( 'Text used for closed days', 'carpress_wp'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'closed_text' ); ?>" name="<?php echo $this->get_field_name( 'closed_text' ); ?>" type="text" value="<?php echo esc_attr( $closed_text ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'additional_info' ); ?>"><?php _e( 'Text below the timetable for additional info (for example lunch time)', 'carpress_wp'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'additional_info' ); ?>" name="<?php echo $this->get_field_name( 'additional_info' ); ?>" type="text" value="<?php echo esc_attr( $additional_info ); ?>" />
		</p>

		<?php
	}

} // class Opening_Time
add_action( 'widgets_init', create_function( '', 'register_widget( "Opening_Time" );' ) );






/**************************************
 * Home Page Services Widget
 * -----------------------------------
 * List of the services on the home page
 **************************************/

class Home_Services extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Our Services" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only on the home page of the Carpress theme', 'carpress_wp'),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$num = intval( $instance['num'] );

		$services = new WP_Query( array(
			'post_type'      => 'services',
			'posts_per_page' => $num,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_status'    => 'publish',
			'meta_key'       => 'show_front_page',
			'meta_value'     => 'yes',
		) );
		$count = 0;
		if ( $services->have_posts() ) :
			while( $services->have_posts() ) :
				$services->the_post();
				$count++;

				$link = trim( get_post_meta( get_the_ID(), 'link_for_widget', true ) );

				if ( empty( $link ) ) {
					$link = get_permalink();
				}
				?>
		<article class="span3 widget-single-service"><!-- service -->
			<div class="picture">
				<a href="<?php echo $link; ?>">
					<?php
						the_post_thumbnail( 'services-front' );
					?>
					<span class="img-overlay">
						<span class="vertically-centered">
							<span class="btn btn-inverse"><?php _e( 'Read more', 'carpress_wp'); ?></span>
						</span>
					</span>
				</a>
			</div>
			<div class="lined">
				<h2><?php the_title(); ?></h2>
				<span class="bolded-line"></span>
			</div>
			<?php the_excerpt(); ?>
			<a href="<?php echo $link; ?>" class="read-more"><?php _e( 'READ MORE', 'carpress_wp'); ?> -</a>
		</article><!-- /service -->
		<?php if( $count % 4 == 0 ) : ?>
		<div class="clearfix"></div>
		<?php endif; ?>
		<?php
			endwhile;
		endif;
		wp_reset_postdata();
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		// number
		$instance['num'] = strip_tags( $new_instance['num'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'num' ] ) ) {
			$num = $instance[ 'num' ];
		} else {
			$num = '3';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e( 'Number of services to display:', 'carpress_wp'); ?></label>
			<input size="5" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="text" value="<?php echo esc_attr( $num ); ?>" />
		</p>

		<?php
	}

} // class Home_Services
add_action( 'widgets_init', create_function( '', 'register_widget( "Home_Services" );' ) );






/**************************************
 * Home Page Latest News Widget
 * -----------------------------------
 * List of the latest news on the home page
 **************************************/

class Home_Last_News extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Latest News" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only on the home page of the Carpress theme', 'carpress_wp'),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$num = intval( $instance['num'] );
		$link = $instance['link'];

		?>
		<div class="span<?php echo $num * 3; ?>"><!-- latest news -->
			  <div class="lined">
				<?php if( ! empty( $link ) ) { ?>
				  <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-theme pull-right no-bevel"><?php echo $link; ?></a>
				  <?php }
					  $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
					  echo $instance['title'];
				  ?>
				  <span class="bolded-line"></span>
			  </div>

			  <div class="row">
				<?php
				$news = new WP_Query( array(
					'posts_per_page'      => $num,
					'ignore_sticky_posts' => true,
				) );
				if ( $news->have_posts() ) :
					while( $news->have_posts() ) :
						$news->the_post(); ?>
				  <article class="span3">
					  <h3 class="no-margin"><?php the_title(); ?></h3>
					  <div class="meta-info">
						  <span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					  </div>
					  <?php the_excerpt(); ?>
					  <a href="<?php the_permalink(); ?>" class="read-more"><?php _e( 'READ MORE', 'carpress_wp'); ?> -</a>
				  </article>
						  <?php
						endwhile;
					endif;
					wp_reset_postdata();
				  ?>
			  </div>
		</div><!-- /latest news -->
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num'] = strip_tags( $new_instance['num'] );
		$instance['link'] = strip_tags( $new_instance['link'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Latest News // What is going on', 'carpress_wp');
		}

		if ( isset( $instance[ 'num' ] ) ) {
			$num = $instance[ 'num' ];
		} else {
			$num = '2';
		}

		if ( isset( $instance[ 'link' ] ) ) {
			$link = $instance[ 'link' ];
		} else {
			$link = '';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'carpress_wp'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e( 'Number of news to display', 'carpress_wp'); ?>:</label>
			<input size="5" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="text" value="<?php echo esc_attr( $num ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Text for the all posts\'s link', 'carpress_wp'); ?>:</label> <br />
			<input id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
		</p>

		<?php
	}

} // class Home_Last_News
add_action( 'widgets_init', create_function( '', 'register_widget( "Home_Last_News" );' ) );






/**************************************
 * Home Page Latest Galleries Widget
 * -----------------------------------
 * List of the latest news on the home page
 **************************************/

class Home_Last_Gallery extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Latest Galleries" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only on the home page of the Carpress theme', 'carpress_wp'),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$num = intval( $instance['num'] );
		$gallery = new WP_Query( array(
			'post_type' => 'gallery',
			'posts_per_page' => $num
		) );
		?>
		<div class="span6 gallery-widget"><!-- gallery -->
			<div class="lined">
				<?php if ( $gallery->found_posts > 1 ): ?>
				<nav class="arrows pull-right">
				<!-- Carousel nav -->
					<a href="#<?php echo $args['widget_id'] ?>" class="nav-left" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
					<a href="#<?php echo $args['widget_id'] ?>" class="nav-right" data-slide="next"><i class="fa fa-chevron-right"></i></a>
				</nav>
				<?php endif ?>
				<?php
					$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
					echo $instance['title'];
				?>
				<span class="bolded-line"></span>
			</div>
			<div class="js--widget-carousel  carousel  slide" id="<?php echo $args['widget_id'] ?>">
				<div class="carousel-inner">
				<?php
					if ( $gallery->have_posts() ) :
						$i = -1;
						while( $gallery->have_posts() ) :
							$gallery->the_post();
							$i++;

							$gallery_items = $this->parse_images_from_content( apply_filters( 'the_content', get_the_content() ), $instance );
				?>
					<div class="item<?php echo 0 === $i ? '  active' : ''; ?>">
						<ul class="thumbnails">
							<?php
							foreach ( $gallery_items as $gallery_item ) { ?>
							<li class="span2 picture">
								<?php echo $gallery_item; ?>
							</li>
							<?php } // foreach
							?>
						</ul>
					</div><!-- /slide -->

				<?php
						endwhile;
					endif;
					wp_reset_postdata();
				?>
				</div>
			</div>
		</div><!-- /gallery -->

		<?php
	}

	/**
	 * With regular expressions retrieve the images and return the array of results
	 * @param  string $content The HTML content
	 * @return array of images
	 */
	private function parse_images_from_content( $content, $instance ) {

		preg_match_all('/href=[\"\'](.*?)[\"\'].*?(<img.+?>)/s', $content, $matches);

		$gallery_items = array();
		$limit_num = 0;

		foreach ( $matches[2] as $key => $value ) {
			$limit_num++;
			if ( $limit_num > $instance['max_images'] ) {
				break;
			}

			switch ( $instance['link_to'] ) {
				case 'image':
					$gallery_items[] = '<a href="' . $matches[1][$key] . '">' . $value . '<span class="img-overlay"><span class="icon icons-zoom"></span></span></a>';
					break;

				case 'gallery_page':
					$gallery_items[] = '<a href="' . get_permalink() . '">' . $value . '<span class="img-overlay"><span class="icon icons-zoom"></span></span></a>';
					break;

				default:
					$gallery_items[] = $value;
					break;
			}
		}

		return $gallery_items;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['num']        = max( 1, intval( $new_instance['num'] ) );
		$instance['max_images'] = max( 1, intval( $new_instance['max_images'] ) );
		$instance['link_to']    = sanitize_key( $new_instance['link_to'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? $instance['title'] : __( 'Gallery // From the studio', 'carpress_wp');
		$num        = isset( $instance['num'] ) ? $instance['num'] : 2;
		$max_images = isset( $instance['max_images'] ) ? $instance['max_images'] : 9;
		$link_to    = isset( $instance['link_to'] ) ? $instance['link_to'] : 'none';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'carpress_wp'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e( 'Number of galleries to display', 'carpress_wp'); ?>:</label>
			<input size="5" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="number" min="1" value="<?php echo esc_attr( $num ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'max_images' ); ?>"><?php _e( 'Max number of image per gallery', 'carpress_wp'); ?>:</label>
			<input size="5" id="<?php echo $this->get_field_id( 'max_images' ); ?>" name="<?php echo $this->get_field_name( 'max_images' ); ?>" type="number" min="1" value="<?php echo esc_attr( $max_images ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_to' ); ?>"><?php _e( 'Link images to:', 'carpress_wp' ); ?></label> <br>
			<select name="<?php echo $this->get_field_name( 'link_to' ); ?>" id="<?php echo $this->get_field_id( 'link_to' ); ?>">
				<option value="none"<?php selected( 'none', $link_to ); ?>><?php _e( 'None', 'carpress_wp'); ?></option>
				<option value="gallery_page"<?php selected( 'gallery_page', $link_to ); ?>><?php _e( 'Gallery page', 'carpress_wp'); ?></option>
				<option value="image"<?php selected( 'image', $link_to ); ?>><?php _e( 'Image', 'carpress_wp' ); ?></option>
			</select>
		</p>

		<?php
	}

} // class Home_Last_Gallery
add_action( 'widgets_init', create_function( '', 'register_widget( "Home_Last_Gallery" );' ) );






/**************************************
 * Home Page Meet The Team Widget
 * -----------------------------------
 * List the selected team members
 **************************************/

class Home_Meet_Team extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( 'Carpress: Meet The Team', 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only on the home page of the Carpress theme', 'carpress_wp'),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$query_members = new WP_Query( array(
			'post_type'  => 'team',
			'nopaging'   => true,
			'meta_key'   => 'team_in_widget',
			'meta_value' => 'yes',
		) );
		$num_of_members = absint( $query_members->found_posts );

		?>
		<div class="span6 services-widget"><!-- gallery -->
			<div class="lined">
				<?php
					if( ! empty( $instance['text_for_link'] ) ) {
				?>
				<a href="<?php echo get_post_type_archive_link( 'team' ); ?>" class="btn btn-warning pull-right"><?php echo $instance['text_for_link']; ?></a>
				<?php
					}

					$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
					echo $instance['title'];
				?>
				<span class="bolded-line"></span>
			</div>
			<ul class="team-members-list  clearfix">
			<?php
				if ( $query_members->have_posts() ) :
					$i = -1;
					while( $query_members->have_posts() ) :
						$query_members->the_post();
			?>
				<li>
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<h4 class="team-name"><a href="<?php echo get_post_type_archive_link( 'team' ); ?>#member-id-<?php the_ID(); ?>"><?php echo strip_tags( get_the_title() ); ?></a></h4>
					<p class="titles"><?php echo get_post_meta( get_the_ID(), 'subtitle', true ); ?></p>
				</li>
			<?php
					endwhile;
				endif;
				wp_reset_postdata();
			?>
			</ul><!-- /team-members-list -->
		</div><!-- /services-widget -->

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['text_for_link'] = esc_html( $new_instance['text_for_link'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title         = isset( $instance['title'] ) ? $instance['title'] : 'Meet The Team // Who is behind the best mechanic service in town?';
		$text_for_link = isset( $instance['text_for_link'] ) ? $instance['text_for_link'] : 'MEET ENTIRE TEAM';

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'carpress_wp'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'text_for_link' ); ?>"><?php _e( 'Text for the link to all members (leave empty if don\'t want to show):', 'carpress_wp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'text_for_link' ); ?>" name="<?php echo $this->get_field_name( 'text_for_link' ); ?>" type="text" value="<?php echo esc_attr( $text_for_link ); ?>" />
		</p>

		<?php
	}

} // class Home_Meet_Team
add_action( 'widgets_init', create_function( '', 'register_widget( "Home_Meet_Team" );' ) );






/**************************************
 * Home Page Text with Link Widget
 * -----------------------------------
 * List of the latest news on the home page
 **************************************/

class Text_With_Link extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Text with Link" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only on the home page of the Carpress theme', 'carpress_wp'),
			),
			array( 'width' => 500 )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		?>
		<div class="span6">
			<div class="lined">
				<?php if( ! empty( $instance['link'] ) ) { ?>
				<a href="<?php echo $instance['link']; ?>" class="btn btn-warning pull-right"><?php echo $instance['link_text']; ?></a>
				<?php } ?>
				<?php
				  $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
				  echo $instance['title'];
				?>
				<span class="bolded-line"></span>
			</div>
			<div class="textwidget"><?php echo apply_filters( 'widget_text', wpautop( $instance["textblock"] ) ); ?></div>
		</div>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['link'] = $new_instance['link'];
		$instance['link_text'] = strip_tags( $new_instance['link_text'] );

		$instance["textblock"] = $new_instance["textblock"];

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'About Us // Our interesting story', 'carpress_wp');
		}

		if ( isset( $instance['link'] ) ) {
			$link = $instance['link'];
		} else {
			$link = '';
		}

		if ( isset( $instance[ 'link_text' ] ) ) {
			$link_text = $instance['link_text'];
		} else {
			$link_text = '';
		}

		if ( isset( $instance["textblock"] ) ) {
			$textblock = $instance["textblock"];
		} else {
			$textblock = '';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'carpress_wp'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e( 'Link text', 'carpress_wp'); ?>:</label> <br />
			<input id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" value="<?php echo esc_attr( $link_text ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link', 'carpress_wp'); ?>:</label> <br />
			<input id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
		</p>
		<?php ?>
		<p>
			<label for="<?php echo $this->get_field_id( "textblock" ); ?>"><?php _e( "Text block" , 'carpress_wp'); ?>:</label> <br />
			<textarea id="<?php echo $this->get_field_id( "textblock" ); ?>" name="<?php echo $this->get_field_name( "textblock" ); ?>" rows="5" style="width: 100%;"><?php echo $textblock; ?></textarea>
		</p>
		<?php
	}

} // class Text_With_Link
add_action( 'widgets_init', create_function( '', 'register_widget( "Text_With_Link" );' ) );




/**************************************
 * Home Page any width column
 * -----------------------------------
 **************************************/

class Home_Text_Custom_Width extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Custom Width Text For Home Page" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only on the home page of the Carpress theme. With this widget you can specify custom width of the text.', 'carpress_wp'),
			),
			array( 'width' => 400 )
		);
	}

	public function widget( $args, $instance ) {
		$text = apply_filters( 'widget_text', empty( $instance['content'] ) ? '' : $instance['content'], $instance );

		?>
		<div class="span<?php echo $instance['num_columns'] ?>">
			<?php if ( ! empty( $instance['title'] ) ): ?>
			<div class="lined">
				<?php
				  $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
				  echo $instance['title'];
				?>
				<span class="bolded-line"></span>
			</div>
			<?php endif ?>
			<div class="textwidget">
				<?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( current_user_can('unfiltered_html') )
			$instance['content'] =  $new_instance['content'];
		else
			$instance['content'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['content']) ) ); // wp_filter_post_kses() expects slashed
		$instance['num_columns'] = (int)$new_instance['num_columns'];
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Title // Subtitle', 'content' => '' ) );
		$title = strip_tags($instance['title']);
		$content = esc_textarea($instance['content']);
		$num_columns = (int)$instance['num_columns'];

		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'carpress_wp'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('num_columns'); ?>"><?php _e('Number of columns:', 'carpress_wp'); ?></label>
			<select id="<?php echo $this->get_field_id('num_columns'); ?>" name="<?php echo $this->get_field_name('num_columns'); ?>">
				<?php for ($i=1; $i < 13; $i++) : ?>
					<option value="<?php echo $i; ?>" <?php selected( $num_columns, $i ); ?>><?php echo $i; ?></option>
				<?php endfor; ?>
			</select>
		</p>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs', 'carpress_wp'); ?></label></p>
		<?php
	}

} // class Home_Three_Columns
add_action( 'widgets_init', create_function( '', 'register_widget( "Home_Text_Custom_Width" );' ) );






/**************************************
 * Home Page Testimonials Widget
 * -----------------------------------
 * List of the latest news on the home page
 **************************************/

class Home_Testimonials extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Testimonials" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only on the home page of the Carpress theme', 'carpress_wp'),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$testimonials = new WP_Query( array(
			'post_type' => 'testimonials',
			'nopaging' => true,
			'orderby' => 'menu_order',
			'order' => 'ASC'
		) );
		?>

		<?php if ( strstr( $args['id'], 'home' ) ): ?>
			<div class="span6"><!-- testimonials -->
		<?php else: ?>
			<?php echo $args['before_widget']; ?>
		<?php endif ?>

			<div class="lined">
				<?php if ( $testimonials->found_posts > 1 ): ?>
				<nav class="arrows pull-right">
					<a href="#<?php echo $args['widget_id'] ?>" class="nav-left" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
					<a href="#<?php echo $args['widget_id'] ?>" class="nav-right" data-slide="next"><i class="fa fa-chevron-right"></i></a>
				</nav>
				<?php endif ?>
				<?php
					$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
					echo $instance['title'];
				?>
				<span class="bolded-line"></span>
			</div>
			<div class="js--widget-carousel  carousel  slide" id="<?php echo $args['widget_id'] ?>">
				<div class="carousel-inner">
				<?php

				if ( $testimonials->have_posts() ) :
					$i = -1;
					while( $testimonials->have_posts() ) :
						$i++;
						$testimonials->the_post(); ?>
				<div class="item<?php echo 0 === $i ? '  active' : ''; ?>">
					<div class="quote">
						<blockquote>
							<?php the_content(); ?>
						</blockquote>
						<div class="author">
							<div class="person theme-clr"><?php echo strip_tags ( get_the_title() ); ?></div>
							<div class="title"><?php echo get_post_meta( get_the_ID(), 'author_title', true ); ?></div>
						</div>
					</div>
				</div>
				<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
				</div>
			</div>
		<?php if ( strstr( $args['id'], 'home' ) ): ?>
			</div><!-- testimonials -->
		<?php else: ?>
			<?php echo $args['after_widget']; ?>
		<?php endif ?>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Testimonials // What other said about us', 'carpress_wp');
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'carpress_wp'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php
	}

} // class Home_Testimonials
add_action( 'widgets_init', create_function( '', 'register_widget( "Home_Testimonials" );' ) );






/**************************************
 * Home Page Divier Widget
 * -----------------------------------
 * Divided the content blocks vertically
 **************************************/

class Home_Divider extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Divider" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only on the home page of the Carpress theme', 'carpress_wp'),
				'classname' => 'our-services'
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		global $content_divider;
		?>
		<div class="span12">
			<div class="divide-line">
			<div class="icon icons-<?php echo $content_divider; ?>"></div>
			</div>
		</div>
		<?php
	}



} // class Home_Divider
add_action( 'widgets_init', create_function( '', 'register_widget( "Home_Divider" );' ) );







/**************************************
 * Footer Facebook Widget
 * -----------------------------------
 * List of the latest news on the home page
 **************************************/

class Footer_Facebook extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Facebook" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Use this widget only in the footer of the Carpress theme', 'carpress_wp'),
			)
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
			<div class="lined">
				<?php
				  $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
				  echo $instance['title'];
				?>
				<span class="bolded-line"></span>
			</div>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=317322608312190";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<div class="fb-like-box" data-href="<?php echo $instance['like_link']; ?>" data-width="268" data-show-faces="true" data-colorscheme="dark" data-stream="false" data-border-color="#000000" data-header="false"></div>

		<?php
		echo $args['after_widget'];
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['like_link'] = strip_tags( $new_instance['like_link'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Facebook // Like us', 'carpress_wp');
		}

		if ( isset( $instance[ 'like_link' ] ) ) {
			$like = $instance[ 'like_link' ];
		} else {
			$like = '';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'carpress_wp'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'like_link' ); ?>"><?php _e( 'FB Page to like', 'carpress_wp'); ?>:</label> <br />
			<input style="width: 100%;" id="<?php echo $this->get_field_id( 'like_link' ); ?>" name="<?php echo $this->get_field_name( 'like_link' ); ?>" type="text" value="<?php echo $like; ?>" />
		</p>

		<?php
	}

} // class Footer_Facebook
add_action( 'widgets_init', create_function( '', 'register_widget( "Footer_Facebook" );' ) );




/**************************************
 * Title & Icon Widget
 * -----------------------------------
 * List of the latest news on the home page
 **************************************/

class Mehanic_Title_Icon_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			false, // ID, auto generate when false
			__( "Carpress: Title with Icon" , 'carpress_wp'), // Name
			array(
				'description' => __( 'Widget for the front page in the head - select title, subtitle and icon', 'carpress_wp'),
			)
		);

		if( is_admin() ) {
			wp_enqueue_style( 'fontawesome-icons', get_template_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css' );
			wp_enqueue_script( 'mechnic-admin-utils', get_template_directory_uri() . '/assets/js/admin.js', array( 'jquery' ) );

			// color picker needed
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
		}
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$color = ( ! empty( $instance['color'] ) && '#ffffff' != $instance['color'] ) ? ' style="color: ' . $instance['color'] . '"' : '';;
		?>
			<a class="widget-inner" href="<?php echo $instance['btn_link']; ?>">
				<i class="fa  <?php echo $instance['icon']; ?>  fa-3x  pull-right"<?php echo $color; ?>></i>
				<h3 class="widget-title"<?php echo $color; ?>><?php echo $instance['title']; ?></h3>
				<div class="widget-text"<?php echo $color; ?>><?php echo $instance['subtitle']; ?></div>
			</a>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['subtitle'] = strip_tags( $new_instance['subtitle'] );
		$instance['btn_link'] = esc_url( $new_instance['btn_link'] );
		$instance['color']    = esc_html( $new_instance['color'] );
		$instance['icon']     = sanitize_key( $new_instance['icon'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title    = empty( $instance['title'] ) ? '' : $instance['title'];
		$subtitle = empty( $instance['subtitle'] ) ? '' : $instance['subtitle'];
		$btn_link = empty( $instance['btn_link'] ) ? '' : $instance['btn_link'];
		$color    = empty( $instance['color'] ) ? '' : $instance['color'];
		$icon     = empty( $instance['icon'] ) ? '' : $instance['icon'];

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'carpress_wp'); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle', 'carpress_wp'); ?>:</label> <br />
			<input style="width: 100%;" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo $subtitle; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'btn_link' ); ?>"><?php _e( 'Link', 'carpress_wp'); ?>:</label> <br />
			<input style="width: 100%;" id="<?php echo $this->get_field_id( 'btn_link' ); ?>" name="<?php echo $this->get_field_name( 'btn_link' ); ?>" type="text" value="<?php echo $btn_link; ?>" />
		</p>

		<script type="text/javascript">
			jQuery('document').ready(function ($) {
				$('.js--attach-color-picker').wpColorPicker();
			});
		</script>
		<p>
			<label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _ex( 'Text Color:', 'backend', 'organique_wp' ); ?></label> <br>
			<input class="js--attach-color-picker" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" type="text" value="<?php echo esc_attr( $color ); ?>" data-default-color="#ffffff" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon', 'carpress_wp'); ?>:</label> <br />
			<small><?php printf( __( 'Click on the icon below or manually select from the %s website', 'carpress_wp'), '<a href="http://fontawesome.io/icons/" target="_blank">FontAwesome</a>' ); ?>.</small>
			<input style="width: 100%;" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo $icon; ?>" class="js--icon-input" /> <br><br>
			<a class="js--selectable-icon" href="#" data-iconname="fa-anchor"><i class="fa fa-lg fa-anchor"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-beer"><i class="fa fa-lg fa-beer"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-bell-o"><i class="fa fa-lg fa-bell-o"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-camera-retro"><i class="fa fa-lg fa-camera-retro"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-check-circle-o"><i class="fa fa-lg fa-check-circle-o"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-cog"><i class="fa fa-lg fa-cog"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-cogs"><i class="fa fa-lg fa-cogs"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-comments-o"><i class="fa fa-lg fa-comments-o"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-compass"><i class="fa fa-lg fa-compass"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-dashboard"><i class="fa fa-lg fa-dashboard"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-download"><i class="fa fa-lg fa-download"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-exclamation-circle"><i class="fa fa-lg fa-exclamation-circle"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-male"><i class="fa fa-lg fa-male"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-female"><i class="fa fa-lg fa-female"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-fire"><i class="fa fa-lg fa-fire"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-flag"><i class="fa fa-lg fa-flag"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-folder-open-o"><i class="fa fa-lg fa-folder-open-o"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-heart"><i class="fa fa-lg fa-heart"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-inbox"><i class="fa fa-lg fa-inbox"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-info-circle"><i class="fa fa-lg fa-info-circle"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-key"><i class="fa fa-lg fa-key"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-laptop"><i class="fa fa-lg fa-laptop"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-leaf"><i class="fa fa-lg fa-leaf"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-map-marker"><i class="fa fa-lg fa-map-marker"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-money"><i class="fa fa-lg fa-money"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-phone"><i class="fa fa-lg fa-phone"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-plus-circle"><i class="fa fa-lg fa-plus-circle"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-print"><i class="fa fa-lg fa-print"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-quote-right"><i class="fa fa-lg fa-quote-right"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-quote-left"><i class="fa fa-lg fa-quote-left"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-shopping-cart"><i class="fa fa-lg fa-shopping-cart"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-sitemap"><i class="fa fa-lg fa-sitemap"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-star-o"><i class="fa fa-lg fa-star-o"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-suitcase"><i class="fa fa-lg fa-suitcase"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-thumbs-up"><i class="fa fa-lg fa-thumbs-up"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-tint"><i class="fa fa-lg fa-tint"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-truck"><i class="fa fa-lg fa-truck"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-users"><i class="fa fa-lg fa-users"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-warning"><i class="fa fa-lg fa-warning"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-wrench"><i class="fa fa-lg fa-wrench"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-chevron-right"><i class="fa fa-lg fa-chevron-right"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-chevron-circle-right"><i class="fa fa-lg fa-chevron-circle-right"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-chevron-down"><i class="fa fa-lg fa-chevron-down"></i></a>
			<a class="js--selectable-icon" href="#" data-iconname="fa-chevron-circle-down"><i class="fa fa-lg fa-chevron-circle-down"></i></a>
		</p>

		<?php
	}

} // class Mehanic_Title_Icon_Widget
add_action( 'widgets_init', create_function( '', 'register_widget( "Mehanic_Title_Icon_Widget" );' ) );










/**************************************
 * Boostrap menu
 * -----------------------------------
 * Extends the original WP Menu Widget
 **************************************/

class Bootstrap_Menu extends WP_Nav_Menu_Widget {
	function widget($args, $instance) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( !$nav_menu )
			return;

		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];

		if ( !empty($instance['title']) )
			echo $args['before_title'] . $instance['title'] . $args['after_title'];

		wp_nav_menu( array(
			'fallback_cb' => '',
			'menu' => $nav_menu,
			'menu_class' => 'nav nav-pills nav-stacked',
			'depth' => 3,
		) );

		echo $args['after_widget'];
	}
} // class Bootstrap_Menu
unregister_widget( 'WP_Nav_Menu_Widget' ); // unregister default widget and only register the new one
add_action( 'widgets_init', create_function( '', 'register_widget( "Bootstrap_Menu" );' ) );