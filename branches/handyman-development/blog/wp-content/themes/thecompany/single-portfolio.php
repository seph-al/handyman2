<?php global $wp_query;
get_header();
the_post(); ?>



<div id="page-title">
	<div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <h1><?php the_title() ?></h1>
                
            </div>
        </div>
    </div>
</div>



<?php $rf_post_content = get_the_content('');
if (isset($rf_post_content) && $rf_post_content != '') { ?>
<div class="container">

    <div class="row">
    
        <div class="col-xs-12">
    
            <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    
                <div class="post-content">
    
                    <?php the_content() ?>
    
                </div>
    
            </div><!-- .post -->
            
        </div>
        
    </div>

</div>
<?php } ?>



<?php $rf_sections = get_post_meta(get_the_ID(), "sections", true);
if (isset($rf_sections) && $rf_sections != '') { ?>
<div id="sections">
        
	<?php $rf_sections = explode(',',$rf_sections);
    
    foreach($rf_sections as $rf_section) {
        $rf_section_post = get_post($rf_section);
        $rf_type = get_post_meta($rf_section_post->ID, "sectiontype", true);
        
        if ($rf_type == 'Portfolio') {
            
            get_template_part( 'section-portfolio' );
            
        } elseif ($rf_type == 'Widget area') {
			
			get_template_part( 'section-widgets' );
			
		} elseif ($rf_type == 'Blog tiles') {
			
			get_template_part( 'section-blogtile' );
			
		} else {
            
            get_template_part( 'section-text' );
            
        }    
    } ?>
    
</div>
<?php } ?>



<?php get_footer(); ?>