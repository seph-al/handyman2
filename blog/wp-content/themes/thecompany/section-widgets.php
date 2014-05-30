<?php 
global $rf_section_post;
$rf_section_bgcolor = get_post_meta($rf_section_post->ID, "sectionbgcolor", true);
$rf_section_textcolor = get_post_meta($rf_section_post->ID, "sectiontextcolor", true);
$rf_section_margintop = get_post_meta($rf_section_post->ID, "sectionmargintop", true);
$rf_section_marginbottom = get_post_meta($rf_section_post->ID, "sectionmarginbottom", true);

$rf_section_backgroundimg = wp_get_attachment_url( get_post_thumbnail_id($rf_section_post->ID));

$rf_section_parallax = get_post_meta($rf_section_post->ID, "sectionparallax", true);

$rf_section_video = get_post_meta($rf_section_post->ID, "sectionvideo", true);

$rf_section_style = '';
if (isset($rf_section_bgcolor) && $rf_section_bgcolor != '') $rf_section_style .= "background-color:#" . str_replace('#','',$rf_section_bgcolor) . "; ";
if (isset($rf_section_backgroundimg) && $rf_section_backgroundimg != '') $rf_section_style .= "background-image: url('" . $rf_section_backgroundimg . "'); ";
?>

<div id="section-<?php echo $rf_section_post->ID; ?>" class="section widgets <?php if (isset($rf_section_parallax) && $rf_section_parallax != '') { echo 'parallax'; } ?>" style="<?php echo $rf_section_style; ?>">

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

    <div class="container">
    
        <div class="row">
        
            <div class="widget-area" style="color:#<?php if (isset($rf_section_textcolor)) echo str_replace('#','',$rf_section_textcolor); ?>;margin-top:<?php if (isset($rf_section_margintop)) echo str_replace('px','',$rf_section_margintop); ?>px;margin-bottom:<?php if (isset($rf_section_marginbottom)) echo str_replace('px','',$rf_section_marginbottom); ?>px;">

                <?php
				$rf_section_sidebar = get_post_meta($rf_section_post->ID, "sectionsidebar", true);
				ob_start();
				dynamic_sidebar( $rf_section_sidebar );
				$sidebar = ob_get_clean();
				preg_match_all( '/===columnnumber===/', $sidebar, $matches );
				$count = count( $matches[0] );
				if( $count > 0 ) {
					$replacements = array(
						1 => 'col-sm-12',
						2 => 'col-sm-6',
						3 => 'col-sm-4',
						4 => 'col-lg-3 col-sm-6',
						5 => 'col-lg-3 col-sm-6',
						6 => 'col-lg-2 col-sm-4'
	 				);
					$sidebar = preg_replace( '/===columnnumber===/', $replacements[$count], $sidebar );
					echo $sidebar;
				}
				?>

            </div>
        
        </div>
    
    </div>

</div>