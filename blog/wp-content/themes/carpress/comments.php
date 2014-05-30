<?php
/**
 * The template for displaying Comments.
 */

// get the layout
$sidebar = ot_get_option( 'blog_layout', 'left' );

if ( "no" == $sidebar ) {
	$main_class_span = 12;
} else {
	$main_class_span = 9;
}

if ( post_password_required() )
	return;
?>

<?php if( comments_open( get_the_ID() ) ) : ?>

<div class="span<?php echo $main_class_span; ?>">
	<div class="lined">
		<h2><span class="light"><?php comments_number('0', '1', '%'); ?></span> <?php comments_number( __( 'comments' , 'carpress_wp'), __( 'comment' , 'carpress_wp'), __( 'comments' , 'carpress_wp') ); ?></h2>
		<span class="bolded-line"></span>
	</div>
</div>

<?php if ( have_comments() ) : ?>

<?php wp_list_comments( array( 'callback' => 'carpress_comment', 'avatar_size' => '53', 'style' => 'div' ) ); ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
	<nav id="comment-nav-below" class="navigation clearfix span<?php echo $main_class_span; ?>" role="navigation">
		<h3 class="assistive-text section-heading"><?php _e( 'Comment navigation' , 'carpress_wp'); ?></h3>
		<div class="nav-previous pull-left"><?php previous_comments_link( __( '&larr; Older Comments' , 'carpress_wp') ); ?></div>
		<div class="nav-next pull-right"><?php next_comments_link( __( 'Newer Comments &rarr;' , 'carpress_wp') ); ?></div>
	</nav>
	<?php endif; // check for comment navigation ?>


	<?php
	/* If there are no comments and comments are closed, let's leave a note.
	 * But we only want the note on posts and pages that had comments in the first place.
	 */
	if ( ! comments_open() && get_comments_number() ) : ?>
	<p class="nocomments"><?php _e( 'Comments for this post are closed.'  , 'carpress_wp'); ?></p>
	<?php endif; ?>

<?php endif; // have_comments() ?>

<div class="span<?php echo $main_class_span; ?>">
	<div class="divide-line">
		<div class="icon icons-<?php echo ot_get_option( 'content_divider', 'carpress' ); ?>"></div>
	</div>
</div>

<?php /*
http://themeshaper.com/2012/11/04/the-wordpress-theme-comments-template/
http://chipcullen.com/altering-the-comment-form-in-wordpress/
*/ ?>


<div class="span<?php echo $main_class_span; ?>">
	<div class="lined">
		<h2><?php echo lighted_title( __('Write a Comment', 'carpress_wp') ); ?></h2>
		<h5><?php _e( 'Fields with * are requierd' , 'carpress_wp'); ?></h5>
		<span class="bolded-line"></span>
	</div>
</div>

<div class="span<?php echo $main_class_span; ?>">
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$fields =  array(
	'author' => '<div class="row"><div class="span5"><label for="author">' . __( 'First and Last name' , 'carpress_wp') . ( $req ? '<span class="required theme-clr">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="span5"' . $aria_req . ' /></div></div>',
	'email' => '<div class="row"><div class="span5"><label for="email">' . __( 'E-mail Address' , 'carpress_wp') . '' . ( $req ? '<span class="required theme-clr">*</span>' : '' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" class="span5"' . $aria_req . ' /></div></div>',
	'url' => '<div class="row"><div class="span5"><label for="url">' . __( 'Website' , 'carpress_wp') . '</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" class="span5" /></div></div>'
);

$comments_args = array(
	'fields' =>  $fields,
	'id_form' => 'form',
	'id_submit' => 'comments-submit-button',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'comment_field' => '<div class="row"><div class="span9"><label for="comment">' . _x( 'Your comment', 'noun' , 'carpress_wp') . '<span class="theme-clr">*</span></label><textarea id="comment" name="comment" class="span9" rows="8" aria-required="true"></textarea></div></div>',
	'title_reply' => '',
	'label_submit' => __( 'Post A Comment' , 'carpress_wp')
);

echo comment_form( $comments_args );?>
</div>

<?php else : // the comments are disabled ?>

<div class="span<?php echo $main_class_span; ?>">
	<?php _e( 'Comments for this post are closed.' , 'carpress_wp'); ?>
</div>

<?php endif;