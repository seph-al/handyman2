<?php
/**
 * Tempalte for custom comments
 *
 * @package Carpress
 */


/**
 * Custom template
 */
function carpress_comment( $comment, $args, $depth ) {
		// get the layout
	$sidebar = ot_get_option( 'blog_layout', 'left' );

	if ( "no" == $sidebar ) {
		$main_class_span = 12;
	} else {
		$main_class_span = 9;
	}



	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> class="<?php if ($depth > 1) { echo 'nested-comment'; } else { echo 'span' . $main_class_span;}?>" id="comment-<?php comment_ID() ?>">
	<?php if ($depth > 1) {
		/* It's a nested comment */?>
		<div class="row">
			<div class="span1">
				<div class="align-center">
					<span class="icon icons-nested"></span>
				</div>
			</div>
			<div class="span<?php echo ( $main_class_span - 1 ); ?>">
				<?php }?>
				<div class="row">
					<div class="comment-head">
						<div class="<?php if ($depth > 1) { echo 'span' . ( $main_class_span - 5 ); } else { echo 'span' . ( $main_class_span - 4 ); }?>">
							<a href="#" class="avatar-img"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
							<div class="avatar-name">
								<?php printf(__( '<p class="name"><span>%s</span> said:</p>' , 'carpress_wp'), get_comment_author_link()) ?>
								<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
							</div>
						</div>
						<div class="span4">
							<div class="date">
								<?php /* translators: 1: date, 2: time */ printf( __('%1$s at %2$s', 'carpress_wp'), get_comment_date(),  get_comment_time()); ?><?php edit_comment_link(__('(Edit)', 'carpress_wp'),'  ','' ); ?>
							</div>
						</div>
					</div>

					<?php if ($comment->comment_approved == '0') : ?>
					<div class="comment-awaiting-moderation">
						<div class="<?php if ($depth > 1) { echo 'span' . ( $main_class_span - 1 ); } else { echo 'span' . $main_class_span;;}?>">
							<?php _e( 'Your comment is awaiting moderation.' , 'carpress_wp') ?>

						</div>
					</div>
				<?php endif; ?>

				<div class="comment-body<?php if ($depth > 1) { echo ' clearfix'; }?>">
					<div class="<?php if ($depth > 1) { echo 'span' . ( $main_class_span - 1 ); } else { echo 'span' . $main_class_span;}?>">
						<div class="comment-text">
							<?php comment_text(); ?>
						</div>
					</div>
				</div>
			</div>
			<?php if ($depth > 1) {
				/* It's a nested comment */?>
			</div>
		</div>
		<?php } ?>
		<?php if ( 1 == $depth ) { ?>
		<div class="lined">
			<div class="bolded-line"></div>
		</div>
		<?php } ?>
	<?php
}