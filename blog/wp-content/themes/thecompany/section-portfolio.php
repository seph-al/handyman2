<?php 
global $rf_section_post;
$rf_section_bgcolor = get_post_meta($rf_section_post->ID, "sectionbgcolor", true);
$rf_section_titlecolor = get_post_meta($rf_section_post->ID, "sectiontitlecolor", true);
$rf_section_textcolor = get_post_meta($rf_section_post->ID, "sectiontextcolor", true);
$rf_section_margintop = get_post_meta($rf_section_post->ID, "sectionmargintop", true);
$rf_section_marginbottom = get_post_meta($rf_section_post->ID, "sectionmarginbottom", true);
$rf_portfolio_bgcolor = get_post_meta($rf_section_post->ID, "sectionportfoliobg", true);
$rf_portfolio_upsidedown = get_post_meta($rf_section_post->ID, "sectionportfolioupsidedown", true);

$rf_portfolio_filterbgcolor = get_post_meta($rf_section_post->ID, "portfoliofilterbgcolor", true);
$rf_portfolio_filtertextcolor = get_post_meta($rf_section_post->ID, "portfoliofiltertextcolor", true);
$rf_portfolio_filter = get_post_meta($rf_section_post->ID, "portfoliofilter", true);

$rf_section_backgroundimg = wp_get_attachment_url( get_post_thumbnail_id($rf_section_post->ID));

$rf_section_parallax = get_post_meta($rf_section_post->ID, "sectionparallax", true);

$rf_section_video = get_post_meta($rf_section_post->ID, "sectionvideo", true);

$rf_section_style = '';
if (isset($rf_section_bgcolor) && $rf_section_bgcolor != '') $rf_section_style .= "background-color:#" . str_replace('#','',$rf_section_bgcolor) . "; ";
if (isset($rf_section_backgroundimg) && $rf_section_backgroundimg != '') $rf_section_style .= "background-image: url('" . $rf_section_backgroundimg . "'); ";
?>

<div id="section-<?php echo $rf_section_post->ID; ?>" class="section portfolio <?php if (isset($rf_portfolio_filter) && $rf_portfolio_filter != '') { echo 'hasfilter '; } if (isset($rf_portfolio_upsidedown) && $rf_portfolio_upsidedown == true) { echo 'upsidedown '; } if (isset($rf_section_parallax) && $rf_section_parallax != '') { echo 'parallax'; } ?>" style="<?php echo $rf_section_style; ?>">

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

    <?php if (isset($rf_portfolio_filter) && $rf_portfolio_filter != '') { ?>
    <div class="portfolio-filter" style="background-color:#<?php if (isset($rf_portfolio_filterbgcolor) && $rf_portfolio_filterbgcolor != '') echo str_replace('#','',$rf_portfolio_filterbgcolor); ?>; color:#<?php if (isset($rf_portfolio_filtertextcolor) && $rf_portfolio_filtertextcolor != '') echo str_replace('#','',$rf_portfolio_filtertextcolor); ?>;">
    
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
        
                    <ul>
                        <li class="active"><?php _e('All','thecompany') ?></li>
                    
                        <?php $rf_portfoliocats = get_post_meta($rf_section_post->ID, "portfoliocats", true);
                        
						if (isset($rf_portfoliocats) && $rf_portfoliocats != '') {
							$rf_portfoliocats = explode(',',$rf_portfoliocats);
							
							foreach($rf_portfoliocats as $rf_portfoliocat) {
								$rf_cat = get_term( $rf_portfoliocat, 'portfoliocat' ); ?>
							
								<li data="portfoliocat-<?php echo $rf_cat->term_id; ?>"><?php echo $rf_cat->name; ?></li>
							
							<?php }
						} ?>
                    </ul>
        
                </div>
            </div>
        </div>
        
    </div>    
    <?php } ?>
    
    
    
    <div class="container" style="margin-top:<?php if (isset($rf_section_margintop)) echo str_replace('px','',$rf_section_margintop); ?>px;margin-bottom:<?php if (isset($rf_section_marginbottom)) echo str_replace('px','',$rf_section_marginbottom); ?>px;">
    
        <div class="row">
        
			<?php $rf_portfolio_items = get_post_meta($rf_section_post->ID, "portfolioitems", true);
            $rf_portfolio_items = explode(',',$rf_portfolio_items);
			$rf_portfolio_columns = get_post_meta($rf_section_post->ID, "sectioncolumns", true);
			if ($rf_portfolio_columns == '2') {
				$num_columns = 'col-md-6';
			} elseif ($rf_portfolio_columns == '3') {
				$num_columns = 'col-lg-4 col-md-4 col-sm-6';
			} else {
				$num_columns = 'col-lg-3 col-md-6 col-sm-6';
			}
            
            foreach($rf_portfolio_items as $rf_portfolio_item) {
                $rf_portfolio_post = get_post($rf_portfolio_item);
				
				$rf_categories = get_the_terms($rf_portfolio_post->ID, 'portfoliocat');
				$rf_catArray = '';
				if ($rf_categories){
					foreach($rf_categories as $rf_category) {
						$rf_catArray .= 'portfoliocat-' . $rf_category->term_id . ' ';
					}
				} 
				
				$rf_portfolio_link = get_post_meta($rf_portfolio_post->ID, "portfoliolink", true);
				if (!isset($rf_portfolio_link) || $rf_portfolio_link == '') {
					$rf_portfolio_link = get_permalink($rf_portfolio_item);
				}
				?>
                
                <div class="<?php if (isset($num_columns)) echo $num_columns; ?>">
                    
                    <a class="portfolio-item <?php echo $rf_catArray; ?>" href="<?php echo $rf_portfolio_link; ?>" data-path-hover="<?php if (isset($rf_portfolio_upsidedown) && $rf_portfolio_upsidedown == true) { echo 'M 0,320 0,260 90,240 180,260 180,320 z'; } else { echo 'M 0,0 0,50 90,70 180,50 180,0 z'; } ?>">
						
                        <figure>
                        
                        	<?php $rf_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($rf_portfolio_item), 'portfolio-2' ); ?>
                            
                            <div class="portfolio-img" style="background-image: url('<?php echo $rf_featured_image[0]; ?>');"></div>
                            
                            <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                            	<path d="<?php if (isset($rf_portfolio_upsidedown) && $rf_portfolio_upsidedown == true) { echo 'M 0,320 0,150 90,190 180,150 180,320 z'; } else { echo 'M 0,0 0,180 90,130 180,180 180,0 z'; } ?>" style="<?php if (isset($rf_portfolio_bgcolor) && $rf_portfolio_bgcolor != '') echo 'fill:#' . str_replace('#','',$rf_portfolio_bgcolor); ?>" />
                            </svg>
                            
                            <figcaption>
                            	
                                <div class="portfolio-content">
                            
                                    <div class="seperator"></div>
                        
                                    <h3 style="color:#<?php if (isset($rf_section_titlecolor)) echo str_replace('#','',$rf_section_titlecolor); ?>;"><?php echo $rf_portfolio_post->post_title; ?></h3>
                                    
                                    <p style="color:#<?php if (isset($rf_section_textcolor)) echo str_replace('#','',$rf_section_textcolor); ?>;"><?php echo $rf_portfolio_post->post_excerpt; ?></p>
                                
                                </div>
                                
                                <div class="button-container">
                                	<button><?php _e('View', 'thecompany'); ?></button>
                                </div>
                                
                            </figcaption>
                            
                        </figure>
                        
                    </a>
                
                </div>
            
            <?php } ?>
        
        </div>
    
    </div>

</div>