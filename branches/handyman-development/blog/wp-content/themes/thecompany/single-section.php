<?php global $more, $wp_query;
get_header();
the_post();
?>



<div id="page-title">
	
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <h1><?php the_title() ?></h1>
                
            </div>
        </div>
    </div>
    
</div>



<div id="sections">
        
	<?php $rf_section_post = get_post(get_the_ID());
	
	$rf_type = get_post_meta($rf_section_post->ID, "sectiontype", true);
	
	if (isset($rf_type) && $rf_type != '') {
		
		if ($rf_type == 'Portfolio') {
			
			get_template_part( 'section-portfolio' );
			
		} elseif ($rf_type == 'Widget area') {
			
			get_template_part( 'section-widgets' );
			
		} else {
			
			get_template_part( 'section-text' );
			
		}
		
	}
	?>
    
</div>

<?php get_footer(); ?>