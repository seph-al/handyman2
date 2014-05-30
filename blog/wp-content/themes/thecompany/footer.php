<?php global $rf_theme_options; ?>
	
	</div>
	
	<footer>
		
		<div class="container">
		
			<?php if (is_active_sidebar('footer-widgets')) { ?>
			<div class="row">
				
				<?php
				ob_start();
				dynamic_sidebar( 'footer-widgets' );
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
			<div id="footer-line"></div>
			<?php } ?>
		
			<?php if (!isset($rf_theme_options['cp_footer_menu']) || $rf_theme_options['cp_footer_menu'] == false) { ?>
			<div class="row">
				<div class="col-xs-12 mainnav">
					<?php wp_nav_menu(array(
						'theme_location' => 'footer-menu',
						'fallback_cb' => 'rf_emptymenu'
					)); ?>
				</div>
			</div> 
			<?php } ?>
				   
		</div>
		
	</footer>
	
	<?php if (!isset($rf_theme_options['cp_footer_textbar']) || $rf_theme_options['cp_footer_textbar'] == false) { ?>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php if (isset($rf_theme_options['cp_footer_text']) && $rf_theme_options['cp_footer_text'] != '') echo stripslashes($rf_theme_options['cp_footer_text']); ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

</div>

<?php wp_footer(); ?>
</body>

</html>