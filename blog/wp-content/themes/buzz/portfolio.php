<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

?>

<div class="cat-decription">
    <?php echo category_description(); ?> 
</div>

<ul id="filter">
    <li class="all"><a class="active" href="#"><?php _e('All', 'buzz'); ?></a></li>
    <?php  
        $portfolio = get_option('buzz_portfolio_posts'); 
        $cats = get_term_children( $portfolio, 'category' );
        
        foreach($cats as $cat){
            $term = get_term_by( 'id', $cat, 'category' );
            echo '<li class="'.$term->slug.'"><a href="#">'.$term->name.'</a></li>';
        }
    ?>
</ul>

<hr class="space30" />

    <div id="portfolio">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <?php
                $class = '';
                $cats = get_the_category();
                
                foreach($cats as $single_cat){
                    if ($single_cat->cat_ID != $portfolio) $class.= $single_cat->slug.' ';
                }
            ?>
            <div class="large-3 small-6 columns portfolio-wrapper text-center <?php echo $class; ?>">
                <div class="portfolio-item">
                    <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(), 'portfolio', array('alt' => get_the_title())); ?></a>
                    <h2><?php the_title(); ?></h2>
                    <?php 
                        foreach($cats as $single_cat){
                            if ($single_cat->cat_ID != $portfolio) echo '<a href="#" class="noclick">'.$single_cat->cat_name.'</a>';
                        }
                    ?>
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
</div>