<?php 
global $rf_section_post, $paged;

$rf_section_bgcolor = get_post_meta($rf_section_post->ID, "sectionbgcolor", true);
$rf_section_textcolor = get_post_meta($rf_section_post->ID, "sectiontextcolor", true);
$rf_section_margintop = get_post_meta($rf_section_post->ID, "sectionmargintop", true);
$rf_section_marginbottom = get_post_meta($rf_section_post->ID, "sectionmarginbottom", true);

$rf_blog_tilecolor = get_post_meta($rf_section_post->ID, "blogtilecolor", true);
$rf_blog_titlecolor = get_post_meta($rf_section_post->ID, "blogtitlecolor", true);

$rf_blog_categories = get_post_meta($rf_section_post->ID, "blogcats", true);
$rf_blog_maxposts = get_post_meta($rf_section_post->ID, "blogmaxposts", true);
$rf_blog_excerptlength = get_post_meta($rf_section_post->ID, "blogexcerptlength", true);

$rf_portfolio_columns = get_post_meta($rf_section_post->ID, "blogcolumns", true);

$rf_section_backgroundimg = wp_get_attachment_url( get_post_thumbnail_id($rf_section_post->ID));

$rf_section_parallax = get_post_meta($rf_section_post->ID, "sectionparallax", true);

$rf_section_video = get_post_meta($rf_section_post->ID, "sectionvideo", true);

$rf_section_style = '';
if (isset($rf_section_bgcolor) && $rf_section_bgcolor != '') $rf_section_style .= "background-color:#" . str_replace('#','',$rf_section_bgcolor) . "; ";
if (isset($rf_section_backgroundimg) && $rf_section_backgroundimg != '') $rf_section_style .= "background-image: url('" . $rf_section_backgroundimg . "'); ";
?>

<div id="section-<?php echo $rf_section_post->ID; ?>" class="section blogtiles <?php if (isset($rf_section_parallax) && $rf_section_parallax != '') { echo 'parallax'; } ?>" style="<?php echo $rf_section_style; ?>">
    
    <?php if ($rf_section_parallax) { ?>
    <div class="section-background-container">
    	<div class="section-background" style="<?php echo $rf_section_style; ?>"></div>
    </div>
    <?php } elseif (isset($rf_section_video) && $rf_section_video != '') { ?>
    <div class="section-background-container">
        <video autoplay muted loop poster="<?php if (isset($rf_section_backgroundimg) && $rf_section_backgroundimg != '') echo $rf_section_backgroundimg; ?>">
            <source src="<?php echo $rf_section_video; ?>" type="video/<?php echo current(array_slice(explode('.',$rf_section_video), -1)); ?>">
        </video>
    </div>
    <?php } ?>
    
    <div class="container" style="margin-top:<?php if (isset($rf_section_margintop)) echo str_replace('px','',$rf_section_margintop); ?>px;margin-bottom:<?php if (isset($rf_section_marginbottom)) echo str_replace('px','',$rf_section_marginbottom); ?>px;">
    
        <div class="row">
        
			<?php if ($rf_portfolio_columns == '2') {
				$num_columns = 'col-md-6';
			} elseif ($rf_portfolio_columns == '3') {
				$num_columns = 'col-lg-4 col-md-4 col-sm-6';
			} else {
				$num_columns = 'col-lg-3 col-md-6 col-sm-6';
			}
            
            $rf_posts = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $rf_blog_maxposts, 'order' => 'ASC', 'cat' => $rf_blog_categories, 'paged' => $paged ) );
			$rf_total_num_posts = $rf_posts->found_posts;
			
			if ($rf_posts->have_posts()) {
				while ( $rf_posts->have_posts() ) : $rf_posts->the_post(); ?>
                
                <div class="<?php if (isset($num_columns)) echo $num_columns; ?>">
                    
                    <div class="portfolio-item" data-path-hover="M 0,320 0,180 90,220 180,180 180,320 z">
                        
                        <figure>
                        
                        	<?php $rf_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'portfolio-2' ); ?>
                            
                            <div class="portfolio-img" style="background-image: url('<?php echo $rf_featured_image[0]; ?>');"></div>
                            
                            <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                            	<path d="M 0,320 0,200 90,150 180,200 180,320 z" style="fill:#<?php if (isset($rf_blog_tilecolor) && $rf_blog_tilecolor != '') echo str_replace('#','',$rf_blog_tilecolor); ?>;" />
                            </svg>
                            
                            <figcaption>
                            
                            	<div class="button-container">
                                	<a class="button" href="<?php the_permalink() ?>"><?php _e('View', 'thecompany'); ?></a>
                                </div>
                                
                                <div class="blog-content">
                                
                                	<div class="blog-date" style="color:#<?php if (isset($rf_section_textcolor) && $rf_section_textcolor != '') echo str_replace('#','',$rf_section_textcolor); ?>;"><?php the_time('F j, Y'); ?></div>
                                
                                    <div class="seperator"></div>
                        
                                    <h3 style="color:#<?php if (isset($rf_blog_titlecolor) && $rf_blog_titlecolor != '') echo str_replace('#','',$rf_blog_titlecolor); ?>;"><?php the_title() ?></h3>
                                    
                                    <p style="color:#<?php if (isset($rf_section_textcolor) && $rf_section_textcolor != '') echo str_replace('#','',$rf_section_textcolor); ?>;">
										<?php $rf_post_excerpt = get_the_excerpt();
										if (!isset($rf_blog_excerptlength) || $rf_blog_excerptlength == '') $rf_blog_excerptlength = 50;
										if (strlen($rf_post_excerpt) > $rf_blog_excerptlength) {
											echo substr($rf_post_excerpt,0,$rf_blog_excerptlength) . '...';
										} else {
											echo $rf_post_excerpt;
										} ?>
                                    </p>
                                
                                </div>
                                
                                <div class="blog-content-hover">
                                
									<div class="blog-socials">
                                        <?php $pageurl = get_permalink();
										$pagetitle = get_the_title();
										
										$twitterurl = "http://twitter.com/?status=".$pagetitle.' - '.urlencode($pageurl); ?>
										
										<a href="<?php echo $twitterurl; ?>" target="_BLANK"><i class="fa fa-twitter"></i></a>
										<a href="http://www.facebook.com/sharer.php?u=<?php echo $pageurl; ?>" target="_BLANK"><i class="fa fa-facebook"></i></a>
                                    </div>
                                
                                	<div class="blog-author" style="color:#<?php if (isset($rf_section_textcolor) && $rf_section_textcolor != '') echo str_replace('#','',$rf_section_textcolor); ?>;">
										<?php echo get_avatar( get_the_author_meta('user_email'), $size = '33'); ?>
                                        <?php _e('By ', 'thecompany'); the_author(); ?>
                                    </div>
                                
                                </div>
                            </figcaption>
                            
                        </figure>
                        
                    </div>
                
                </div>
            
            	<?php endwhile;
			} ?>
        
        </div>
    
    </div>

</div>