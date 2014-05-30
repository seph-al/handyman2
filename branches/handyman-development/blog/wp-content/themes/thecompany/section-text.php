<?php 
global $rf_section_post;
$rf_section_bgcolor = get_post_meta($rf_section_post->ID, "sectionbgcolor", true);
$rf_section_textcolor = get_post_meta($rf_section_post->ID, "sectiontextcolor", true);
$rf_section_margintop = get_post_meta($rf_section_post->ID, "sectionmargintop", true);
$rf_section_marginbottom = get_post_meta($rf_section_post->ID, "sectionmarginbottom", true);
$rf_section_fullwidth = get_post_meta($rf_section_post->ID, "sectionfullwidth", true);
$rf_section_backgroundimg = wp_get_attachment_url( get_post_thumbnail_id($rf_section_post->ID));

$rf_section_parallax = get_post_meta($rf_section_post->ID, "sectionparallax", true);

$rf_section_video = get_post_meta($rf_section_post->ID, "sectionvideo", true);

$rf_section_style = '';
if (isset($rf_section_bgcolor) && $rf_section_bgcolor != '') $rf_section_style .= "background-color:#" . str_replace('#','',$rf_section_bgcolor) . "; ";
if (isset($rf_section_backgroundimg) && $rf_section_backgroundimg != '') $rf_section_style .= "background-image: url('" . $rf_section_backgroundimg . "'); ";
?>

<div id="section-<?php echo $rf_section_post->ID; ?>" class="section <?php if (isset($rf_section_fullwidth) && $rf_section_fullwidth == true) { echo 'fullwidth '; } if (isset($rf_section_parallax) && $rf_section_parallax != '') { echo 'parallax'; } ?>" style="<?php echo $rf_section_style; ?>">

	<?php if (isset($rf_section_parallax) && $rf_section_parallax != '') { ?>
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

	<?php if (!isset($rf_section_fullwidth) || $rf_section_fullwidth == false) { ?>
    <div class="container">
    
        <div class="row">
        
            <div class="col-xs-12">
        
                <div class="post">
                <?php } ?>
        
                    <div class="post-content" style="<?php if (isset($rf_section_textcolor) && $rf_section_textcolor != '') echo 'color:#' . str_replace('#','',$rf_section_textcolor) . ';'; ?><?php if (isset($rf_section_margintop) && $rf_section_margintop != '') echo 'margin-top:' . str_replace('px','',$rf_section_margintop) . 'px;'; ?><?php if (isset($rf_section_marginbottom) && $rf_section_marginbottom != '') echo 'margin-bottom:' . str_replace('px','',$rf_section_marginbottom) . 'px;'; ?>">
        
                        <?php $content = apply_filters('the_content', $rf_section_post->post_content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo $content; ?>
        
                    </div>
        		
                <?php if (!isset($rf_section_fullwidth) || $rf_section_fullwidth == false) { ?>
                </div>
                
            </div>
        
        </div>
    
    </div>
    <?php } ?>

</div>