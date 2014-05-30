<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

get_header(); ?>

<div class="content">
    <div class="large-9 small-12 columns single nopadding">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="article-item">
                <h2><?php the_title(); ?></h2>
                
                <div class="post-meta">
                    <?php _e('Posted', 'buzz'); ?> <?php the_time('j F Y'); ?> <?php _e('in', 'buzz'); ?> <?php the_category(', '); ?>, <span><?php _e('by', 'buzz'); ?> <?php the_author_link(); ?> | <?php _e('Comments', 'buzz'); ?>  (<?php echo get_comments_number(); ?>)</span>
                </div>
                
                <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array('alt' => get_the_title())); ?></a>
               
                <?php the_content(); ?>
                
                <div class="post-meta">
                    <?php the_tags(); ?>
                </div>
                
                <div class="clear"></div>
                
                <?php if ( comments_open() ) : ?>
                    <?php comments_template( '', true ); ?>
                <?php endif; // comments_open() ?>
                
            </div> 
            <div class="clear"></div>
        <?php endwhile; ?>
        <?php else : ?>
             <p><?php _e('Sorry, but nothing found.', 'buzz'); ?></p>
        <?php endif; ?>
        
        <div class="pagination">
            <?php   
                $args = array(  
                 'before'           => '<p>' . __('Pages:', 'buzz')  
                ,'after'            => '</p>'  
                ,'link_before'      => ''  
                ,'link_after'       => ''  
                ,'next_or_number'   => 'number'  
                ,'nextpagelink'     => __('Next page', 'buzz')  
                ,'previouspagelink' => __('Previous page', 'buzz')  
                ,'pagelink'         => '%'  
                ,'echo'             => 1 );   
                  
                wp_link_pages( $args );  
            ?>  
        </div>
    </div>

    <?php get_sidebar(); ?>
    <div class="clear"></div>
    
    <?php buzz_observePostViews(get_the_ID()); ?>

<?php get_footer(); ?>