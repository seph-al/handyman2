<?php
/*
Template Name: Sections page
*/
?>
<?php global $more, $wp_query;
get_header();
the_post();

$rf_page_title = get_post_meta(get_the_ID(), "pagetitle", true);
$rf_top_margin = get_post_meta(get_the_ID(), "pagetop", true);
?>



<?php if ((!isset($rf_top_margin) || $rf_top_margin == false)) { ?>
<div id="page-title">
	
    <?php if (!isset($rf_page_title) || $rf_page_title == false) { ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <h1><?php the_title() ?></h1>
                
            </div>
        </div>
    </div>
    <?php } ?>
    
</div>
<?php } ?>



<div id="sections" <?php if ((isset($rf_top_margin) && $rf_top_margin == true) || is_front_page()) { ?> class="notopmargin" <?php } ?>>
        
	<?php $rf_sections = get_post_meta(get_the_ID(), "sections", true);
    $rf_sections = explode(',',$rf_sections);
    
    foreach($rf_sections as $rf_section) {
		
		/*if (function_exists( 'icl_object_id' )) {
			$rf_section = icl_object_id($rf_section, 'section', true, ICL_LANGUAGE_CODE);
		}*/
		
        $rf_section_post = get_post($rf_section);
        $rf_type = get_post_meta($rf_section_post->ID, "sectiontype", true);
        
		if (isset($rf_type)) {
		
			if ($rf_type == 'Portfolio') {
				
				get_template_part( 'section-portfolio' );
				
			} elseif ($rf_type == 'Widget area') {
				
				get_template_part( 'section-widgets' );
				
			} elseif ($rf_type == 'Blog tiles') {
				
				get_template_part( 'section-blogtile' );
				
			} else {
				
				get_template_part( 'section-text' );
				
			}
		
		}
    
    } ?>
    
</div>

<?php get_footer(); ?>