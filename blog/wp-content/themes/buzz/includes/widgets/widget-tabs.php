<?php
/*---------------------------------------------------------------------------------*/
/* Recent Posts */
/*---------------------------------------------------------------------------------*/
class Buzz_RecentPosts extends WP_Widget {
	var $settings = array( 'title', 'post_count' );

	function Buzz_RecentPosts() {
		$widget_ops = array( 'description' => 'Displaying recent posts.' );
		parent::WP_Widget( false, __( 'Buzz - Tabs', 'buzz' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		$settings = $this->buzz_get_settings();
		extract( $args, EXTR_SKIP );
		$instance = wp_parse_args( $instance, $settings );
		extract( $instance, EXTR_SKIP );

		?>
			<?php echo $before_widget; ?>
			<?php if ( $title ) { echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title; } ?>
			
            <div id="buzz-tabs">
                <ul>
                	<li><a href="#popular"><?php _e('Popular', 'buzz'); ?></a></li>
                	<li><a href="#new"><?php _e('New', 'buzz'); ?></a></li>
                	<li><a href="#comments"><img src="<?php echo get_template_directory_uri().'/images/comments.png'; ?>" alt="<?php _e('Comments', 'buzz'); ?>" /></a></li>
                </ul>
                <div class="clear"></div>
                <?php 
                if ($post_count == ''){
                    $post_count = 1;
                } else {
                    $post_count = $post_count;
                }?>
                <div id="popular">
                    <?php $query = new WP_Query('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page='.$post_count);
                    while($query->have_posts()){ $query->the_post(); ?>            
                        <div class="tabs_post popular_post_item<?php the_id(); ?>">
                            <div class="large-3 small-3 columns nopadding">
                                <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(), 'small', array('alt' => get_the_title())); ?></a>
                            </div>
                            <div class="large-9 small-8 columns">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="post-date">
                                    <?php the_time('j F Y'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    <?php } ?>  
                    <?php wp_reset_postdata(); ?>
                    <div class="clear"></div>
                </div>
                <div id="new">
                    <?php $query = new WP_Query('post_type=post&posts_per_page='.$post_count);
                    while($query->have_posts()){ $query->the_post(); ?>            
                        <div class="tabs_post popular_post_item<?php the_id(); ?>">
                            <div class="large-3 small-3 columns nopadding">
                                <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(), 'small', array('alt' => get_the_title())); ?></a>
                            </div>
                            <div class="large-9 small-8 columns">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="post-date">
                                    <?php the_time('j F Y'); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    <?php } ?>  
                    <?php wp_reset_postdata(); ?>
                    <div class="clear"></div>
                </div>
                <div id="comments">
                    <?php
                    $args = array(
                        'number' => $post_count,
                        'post_id' => get_the_ID(), // use post_id, not post_ID
                    );
                    $comments = get_comments($args);
                    foreach($comments as $comment) :
                        echo('<div class="widget-comment-item"><strong><a href="'.get_permalink($comment->comment_post_ID).'">' . $comment->comment_author . '</a></strong><p>' . $comment->comment_content . '</p></div>');
                    endforeach;
                    ?>
                    <div class="clear"></div>
                </div>
			</div>
            <?php echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		foreach ( array( 'read_more_text', 'read_more_url' ) as $setting )
			$new_instance[$setting] = strip_tags( $new_instance[$setting] );
		return $new_instance;
	}

	/**
	 * Provides an array of the settings with the setting name as the key and the default value as the value
	 * This cannot be called get_settings() or it will override WP_Widget::get_settings()
	 */
	function buzz_get_settings() {
		// Set the default to a blank string
		$settings = array_fill_keys( $this->settings, '' );
		return $settings;
	}

	function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->buzz_get_settings() );
		extract( $instance, EXTR_SKIP );
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','buzz'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Posts count:','buzz'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('post_count'); ?>"  value="<?php echo esc_attr( $post_count ); ?>" class="widefat" id="<?php echo $this->get_field_id('post_count'); ?>" />
		</p>
		<?php
	}
} 

register_widget( 'Buzz_RecentPosts' );