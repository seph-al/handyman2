<?php get_header(); ?>

<div id="slider">
    <?php if(!get_option('buzz_slider')) buzz_responsive_slider(); ?>
</div>

<?php if(get_option('buzz_welcome')): ?>
<div class="welcome-block text-center">
    <h1><?php echo get_option('buzz_welcome_title'); ?></h1>
    <p><?php echo get_option('buzz_welcome_message'); ?></p>
    <a href="<?php echo get_option('buzz_welcome_button_link'); ?>" class="button_buzz"><?php echo get_option('buzz_welcome_button'); ?></a>
</div>
<?php endif; ?>

<div class="featured_posts">
    <hr />
    <?php 
    if (get_option('buzz_featured_posts_count')){
        $posts_count = get_option('buzz_featured_posts_count');
    } else {
        $posts_count = 3;
    }
    
    if (get_option('buzz_featured_posts')){
        $cat = get_option('buzz_featured_posts');
    } else {
        $cat = 1;
    }
    
    $query = new WP_Query('cat='.$cat.'&posts_per_page='.$posts_count);
    while($query->have_posts()){ $query->the_post(); ?>            
        <div class="large-4 small-12 columns featured-item text-center">
            <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(), 'thumb', array('alt' => get_the_title())); ?></a>
            <h2><?php the_title(); ?></h2>
            <?php the_excerpt(); ?>
        </div>
    <?php } ?>
    <hr />
</div>

<div class="portfolio">
    <h2><?php _e('Latest projects', 'buzz'); ?></h2>
    <?php 
    if (get_option('buzz_portfolio_posts_count')){
        $posts_count = get_option('buzz_portfolio_posts_count');
    } else {
        $posts_count = 4;
    }
    
    if (get_option('buzz_portfolio_posts')){
        $cat = get_option('buzz_portfolio_posts');
    } else {
        $cat = 1;
    }
    
    $query = new WP_Query('cat='.$cat.'&posts_per_page='.$posts_count);
    while($query->have_posts()){ $query->the_post(); ?>            
        <div class="large-3 small-6 columns portfolio-wrapper text-center">
            <div class="portfolio-item">
                <a href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail(get_the_ID(), 'portfolio', array('alt' => get_the_title())); ?></a>
                <h2><?php the_title(); ?></h2>
                <?php 
                    $cats = get_the_category(); 
                    $i = 0;
                    foreach($cats as $single_cat){
                        if ($single_cat->cat_ID != $cat) echo '<a href="'.get_category_link( $single_cat->cat_ID ).'">'.$single_cat->cat_name.'</a>';
                    }
                ?>
            </div>
        </div>
    <?php } ?>
    <div class="clear"></div>
</div>
<div class="clear"></div>

<div class="content">
    <h2><?php _e('Latest posts', 'buzz'); ?></h2>
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