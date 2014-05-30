<div class="social-icons  align-right">
	<?php
		$icons = array(
			'rss'         => ot_get_option( 'rss_icon' ),
			'envelope'    => ot_get_option( 'mail_icon' ),
			'twitter'     => ot_get_option( 'twitter_icon' ),
			'facebook'    => ot_get_option( 'facebook_icon' ),
			'youtube'     => ot_get_option( 'youtube_icon' ),
			'google-plus' => ot_get_option( 'google_icon' ),
			'pinterest'   => ot_get_option( 'pinterest_icon' ),
			'skype'       => ot_get_option( 'skype_icon' ),
			'tumblr'      => ot_get_option( 'thumblr_icon' ),
			'linkedin'    => ot_get_option( 'linkedin_icon' ),
			'flickr'      => ot_get_option( 'flickr_icon' ),
			'instagram'   => ot_get_option( 'instagram_icon' ),
			'foursquare'  => ot_get_option( 'foursquare_icon' ),
		);
	?>
	<?php foreach( $icons as $service => $url ) :
		$url = trim($url);
	?>
		<?php if( !empty( $url ) ) { ?>
			<?php if ( 'skype' == $service ) {
				$url = 'skype:' . $url . '?call';
			}; ?>
			<a href="<?php echo $url; ?>" class="social-icon"><i class="fa  fa-lg  fa-<?php echo $service; ?>"></i></a>
		<?php } ?>
	<?php endforeach; ?>
</div>