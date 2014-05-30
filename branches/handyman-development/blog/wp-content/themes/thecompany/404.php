<?php global $rf_theme_options;
get_header();
the_post();
?>



<div id="page-title">
	<div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <h1><?php if (isset($rf_theme_options['cp_error_title']) && $rf_theme_options['cp_error_title'] != '') { echo $rf_theme_options['cp_error_title']; } ?></h1>
                
            </div>
        </div>
    </div>
</div>



<div class="container">

    <div class="row">
    
        <div class="col-md-12">
    
            <div class="hentry">
    
                <div class="post-content">
    
                    <i class="glyphicon glyphicon-exclamation-sign"></i>
                    
                    <br /><br />
    
                    <?php if (isset($rf_theme_options['cp_error_content']) && $rf_theme_options['cp_error_content'] != '') { echo $rf_theme_options['cp_error_content']; } ?>
    
                </div>
    
            </div><!-- .post -->
            
        </div>
        
    </div>

</div>

<?php get_footer(); ?>