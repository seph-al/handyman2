<?php
/**
 * The template for displaying Comments.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				_e( 'Comments', 'buzz' );
                echo '<span>(' . number_format_i18n(get_comments_number()) . ')</span>';
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'buzz_comment', 'style' => 'ul' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'buzz' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'buzz' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'buzz' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'buzz' ); ?></p>
		<?php endif; ?>

    <?php else: ?>
        <h2><?php _e('No comments yet, be first!', 'buzz' ); ?></h2>
	<?php endif; // have_comments() ?>

    <?php 
        $args = array(
          'id_form'           => 'commentform',
          'id_submit'         => 'submit',
          'title_reply'       => __( 'Leave a Reply', 'buzz' ),
          'title_reply_to'    => __( 'Leave a Reply to %s', 'buzz' ),
          'cancel_reply_link' => __( 'Cancel Reply', 'buzz' ),
          'label_submit'      => __( 'Post Comment', 'buzz' ),

          'comment_field' =>  '<div class="large-12 small-12 columns"><textarea id="comment" class="twelve columns" placeholder="'. __( 'Put your comment here', 'buzz' ) .'" required name="comment" rows="4" aria-required="true">' .'</textarea></div><div class="clear"></div>',

          'must_log_in' => '<p class="must-log-in">' .
            sprintf(
              __( 'You must be <a href="%s">logged in</a> to post a comment.', 'buzz' ),
              wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
            ) . '</p>',

          'logged_in_as' => '<p class="logged-in-as">' .
            sprintf(
            __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'buzz' ),
              admin_url( 'profile.php' ),
              $user_identity,
              wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
            ) . '</p>',

          'comment_notes_before' => '<p class="comment-notes">' .
            __( 'Your email address will not be published.', 'buzz' ) . ( $req ? '' : '' ) .
            '</p>',

          'comment_notes_after' => '',

          'fields' => apply_filters( 'comment_form_default_fields', array(

            'author' =>
              '<div class="large-9 small-12 columns"><input id="author" name="author" type="text" placeholder="'. __( 'Name', 'buzz' ) .'" required value="' . esc_attr( $commenter['comment_author'] ) .'" size="30" required />',

            'email' =>
              '<input id="email" name="email" type="text" placeholder="'. __( 'Email', 'buzz' ) .'" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30" required />',

            'url' =>
              '<input id="url" name="url" type="text" placeholder="'. __( 'Website', 'buzz' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" /></div>'
            )
          ),
        );
    ?>
    
	<?php if ( comments_open( $id ) ) : ?>
        <div class="custom large-9 small-12 columns">
            <?php comment_form($args); ?>
        </div>
    <?php endif; ?>

</div><!-- #comments .comments-area -->