<?php global $more, $wp_query;
get_header();

$pageid = get_the_ID();
if (is_home()) { 
	$pageid = get_option( 'page_for_posts' );
} 
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
		$pageid = get_option('woocommerce_shop_page_id'); 
	} elseif (is_cart()) {
		$pageid = get_option('woocommerce_cart_page_id');
	} elseif (is_checkout()) {
		$pageid = get_option('woocommerce_checkout_page_id'); 
	} elseif (is_account_page()) {
		$pageid = get_option('woocommerce_myaccount_page_id');
	}
}

if (isset($rf_theme_options['cp_sidebar_position'])) $sidebar_pos = $rf_theme_options['cp_sidebar_position'];
if (isset($pageid)) $sidebar_pos_page = get_post_meta($pageid, "pagelayout", true);
if (isset($sidebar_pos_page) && $sidebar_pos_page != '' && $sidebar_pos_page != 'Global setting') $sidebar_pos = $sidebar_pos_page;
?>



<?php if (is_category()) {
		
	$rf_pagetitle = single_cat_title(__('Category: ','thecompany'), false);
	
} elseif (is_tag()) {
	
	$rf_pagetitle = single_tag_title(__('Tag: ','thecompany'), false);
	
} elseif (is_author()) {
		
	$rf_author = get_user_by('slug', get_query_var('author_name'));
	$rf_pagetitle = __('Author: ','thecompany') . $rf_author->nickname;
	
} elseif (is_search()) {

	$rf_pagetitle = __('Search: ','thecompany') . sanitize_text_field($_REQUEST['s']);

} else {
	
	$rf_pagetitle = get_the_title( get_option( 'page_for_posts' ) );
	
} ?>

<div id="page-title">

	<?php if (!is_home() || (is_home() && !is_front_page())) { ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				
				<h1><?php if (isset($rf_pagetitle)) echo $rf_pagetitle; ?></h1>
				
			</div>
		</div>
	</div>
	<?php } ?>
	
</div>



<?php if (is_single()) {
	$more = 1;
} else {
	$more = 0;
} ?>



<div class="container">

    <div class="row">
    
        <div class="<?php if (isset($sidebar_pos) && $sidebar_pos == 'Fullwidth page') { echo 'col-md-12'; } elseif ($sidebar_pos == 'Sidebar left') { echo 'col-md-8 col-md-offset-1 sidebar-left'; } else { echo 'col-md-8'; } ?>">
    
            <?php if ( have_posts() ) {
				
				while ( have_posts() ) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		
					<?php if (has_post_thumbnail()) { ?>
					<div class="post-leadimage">
						<?php the_post_thumbnail('fullwidth'); ?>
					</div>
					<?php } ?>
					
					<div class="sigline"></div>
					
					<?php if (get_the_title()) { ?>
					<h3 class="post-title">
						<?php if (!is_single()) { ?>
						<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark">
						<?php }
						if (is_sticky()) { ?>
							<i class="glyphicon glyphicon-pushpin"></i>
						<?php } elseif (has_post_format( 'aside' )) { ?>
							<i class="glyphicon glyphicon-align-left"></i>
						<?php } elseif (has_post_format( 'gallery' )) { ?>
							<i class="glyphicon glyphicon-th"></i>
						<?php } elseif (has_post_format( 'link' )) { ?>
							<i class="glyphicon glyphicon-link"></i>
						<?php } elseif (has_post_format( 'image' )) { ?>
							<i class="glyphicon glyphicon-picture"></i>
						<?php } elseif (has_post_format( 'quote' )) { ?>
							<i class="glyphicon glyphicon-font"></i>
						<?php } elseif (has_post_format( 'status' )) { ?>
							<i class="glyphicon glyphicon-bullhorn"></i>
						<?php } elseif (has_post_format( 'video' )) { ?>
							<i class="glyphicon glyphicon-film"></i>
						<?php } elseif (has_post_format( 'audio' )) { ?>
							<i class="glyphicon glyphicon-volume-down"></i>
						<?php } elseif (has_post_format( 'chat' )) { ?>
							<i class="glyphicon glyphicon-comment"></i>
						<?php }
							the_title();
						if (!is_single()) { ?>
						</a>
						<?php } ?>
					</h3>
					<?php } ?>
					
					<div class="post-content">
						<?php if (is_single()) {
							the_content();
						} else {
							the_excerpt();
						} ?>
					</div>
                    
                    <?php if (is_single()) { ?>
                    <div class="postpagination">
                        <?php wp_link_pages(array(
                            'before'           => __( 'Pages:', 'thecompany' ),
                            'after'            => '',
                            'link_before'      => '',
                            'link_after'       => '',
                            'next_or_number'   => 'number',
                            'separator'        => '<span class="seperator"></span>',
                            'nextpagelink'     => __( 'Next page', 'thecompany' ),
                            'previouspagelink' => __( 'Previous page', 'thecompany' ),
                            'pagelink'         => '%',
                            'echo'             => 1
                        )); ?>
                    </div>
                    <?php } ?>
					
					<div class="meta">
						<?php if (!is_single()) { ?>
						<span class="meta-part">
							<?php echo get_avatar( get_the_author_meta('user_email'), $size = '33'); ?>
							<?php the_author_posts_link(); ?>
						</span>
						<?php } ?>
						<span class="meta-part meta-date"><?php the_time('F j, Y'); ?></span>
						<?php if (comments_open()) { ?><span class="meta-part meta-comments"><?php comments_popup_link( __( 'Post Comment', 'thecompany' ), '1 ' . __( 'comment', 'thecompany' ), '% '. __( 'comments', 'thecompany' ) ); ?></span><?php } ?>
						<span class="meta-part meta-categories"><?php the_category(', '); ?></span>
                        <span class="meta-part meta-tags"><?php the_tags(); ?></span>
						<span class="meta-part meta-socials">						
							<?php $pageurl = get_permalink();
							$pagetitle = get_the_title();
							$twitterurl = "http://twitter.com/?status=".$pagetitle.' - '.urlencode($pageurl); ?>
							<a href="<?php echo $twitterurl; ?>" target="_BLANK"><i class="fa fa-twitter"></i></a>
							<a href="http://www.facebook.com/sharer.php?u=<?php echo $pageurl; ?>" target="_BLANK"><i class="fa fa-facebook"></i></a>
						</span>
					</div>

					<?php if (is_single()) { ?>
					<div id="author-container">
						
						<?php echo get_avatar( get_the_author_meta('user_email'), $size = '66'); ?>
						
						<h4>About <?php echo get_the_author_meta( 'display_name' ); ?></h4>
						
						<p><?php echo get_the_author_meta( 'description' ); ?></p>
						
						<a class="author-link" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo __('Read all posts by ', 'thecompany') . get_the_author_meta( 'display_name' ); ?></a>
						
					</div>
					<?php } ?>
					
					<?php if (is_single()) comments_template(); ?>
		
				</div><!-- .post -->
				
				<?php endwhile;
				
			} else {
				
				the_post(); ?>
            
            	<div class="hentry">
                
                	<p><?php _e('No posts are found.', 'thecompany') ?></p>
                
                </div>
            
            <?php } ?>
            
        </div>
        
        <?php get_sidebar(); ?>
        
    </div>

</div>



<div id="nicepagination">

	<div class="container">
    
        <div class="row">
        
            <div class="<?php if (isset($sidebar_pos) && $sidebar_pos == 'Fullwidth page') { echo 'col-md-12'; } elseif ($sidebar_pos == 'Sidebar left') { echo 'col-md-8 col-md-offset-1 sidebar-left'; } else { echo 'col-md-8'; } ?> centering">

				<?php $big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages,
					'prev_text' => '<i class="glyphicon glyphicon-step-backward"></i>',
					'next_text' => '<i class="glyphicon glyphicon-step-forward"></i>'
				) ); ?>
                
            </div>
            
        </div>
    
    </div>
    
</div>

<?php get_footer(); ?>