<?php if( 'no' !== get_theme_mod( 'show_breadcrumbs', 'yes' ) ) : ?>
	<div class="breadcrumbs-container">
		<div class="container">
			<div class="row">
				<div class="span12">
					<?php echo dimox_breadcrumbs() ?>
				</div>
			</div>
		</div>
	</div><!-- /breadcrumbs -->
<?php endif; ?>