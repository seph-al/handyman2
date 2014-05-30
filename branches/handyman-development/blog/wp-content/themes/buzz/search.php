<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

get_header(); ?>

<div class="content">
    <h1><?php _e('Search results for query:', 'buzz'); ?> <?php echo $_GET['s']; ?></h1>
    <hr />

    <div class="large-9 small-12 columns articles nopadding">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="article-item">
                    <div class="large-5 small-12 columns nopadding">
                        <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array('alt' => get_the_title())); ?></a>
                    </div>
                    <div class="large-7 small-12 columns">
                        <h2><?php the_title(); ?></h2>
                        <div class="post-meta">
                            <?php _e('Posted', 'buzz'); ?> <?php the_time('j F Y'); ?>, <span><?php _e('by', 'buzz'); ?> <?php the_author_link(); ?> | <?php _e('Comments', 'buzz'); ?>  (<?php echo get_comments_number(); ?>)</span>
                        </div>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read more', 'buzz'); ?> &rarr;</a>
                    </div> 
                    <div class="clear"></div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php else : ?>
             <p><?php _e('Sorry, but nothing found.', 'buzz'); ?></p>
        <?php endif; ?>
        
        <div class="pagination">
            <?php previous_posts_link(__('&larr; Previous page &nbsp;&nbsp;', 'buzz')); ?>
            <?php next_posts_link(__('Next page &rarr;', 'buzz')); ?>
        </div>
    </div>

    <?php get_sidebar(); ?>
    <div class="clear"></div>

<?php get_footer(); ?>