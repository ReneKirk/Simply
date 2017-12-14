<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

        <ul class="media-list">
			<?php wp_list_comments( array( 'callback' => 'bootstrap_comment' ) ); ?>
        </ul>

	<?php endif; // have_comments() ?>

	<?php
	ob_start();
	$commenter = wp_get_current_commenter();
	$req = true;
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$comments_arg = array(
		'form'	=> array(
			'class' => 'form-horizontal'
		),
		'comment_field'			=>  '<textarea id="comment" class="form-control" name="comment" rows="3" aria-required="true" placeholder="Write down your thoughts and comments."></textarea>',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'autor' 				=>  '<input id="author" placeholder="What\'s your name?" name="author" class="form-control" type="text" value="" size="30"' . $aria_req . ' />',
            'email'					=>  '<input id="email" name="email" placeholder="Your email address (not public and i promise - no spam!)" class="form-control" type="text" value="" size="30"' . $aria_req . ' />',
            'url'					=> '')),
		'comment_notes_after' 	=> '',
		'class_submit'			=> 'btn btn-default',
        'title_reply'           => ''
	); ?>
	<?php comment_form($comments_arg);
	echo str_replace('class="comment-form"','class="comment-form" name="commentForm" onsubmit="return validateForm();"',ob_get_clean()); ?>

</div><!-- .comments-area -->
