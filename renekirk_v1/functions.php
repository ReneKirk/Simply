<?php

/**
 * Defining the Google Analytics account
 * Please remember to change this.
 */
define('GA_ACCOUNT', 'UA-XXXXXXXX-1');

/**
 * Registering the menus
 */
register_nav_menus( array(
	'primary' => 'Primary header'
) );

/*
 * Defining the length of except
 */
function excerptLength( $length ) {
	return $length;
}
add_filter( 'excerpt_length', 'excerptLength', 999 );

/*
 * Adding theme support for post thumbnails
 * Will be added to this theme in the future.
 */
add_theme_support( 'post-thumbnails' );

/**
 * Disabling WP-shit
 */
function disable_wp_shit() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_shit' );

/**
 * Calculating the reading time for each posts.
 * Humans usually reads 150 words per minute.
 */
function read_time($text){
	$words = str_word_count(strip_tags($text));
	$min = floor($words / 150);
	if((int)$min === 0){
		return '1 min read';
	}
	return $min . ' min read';
}

/**
 * If you're as lazy as i am, then use this function to replace your birthday.
 * Change the $birthDate variable to your own birthday
 * In your posts you can write %%age%% which will be replaced with your age.
 */
function getMyAge($content)
{
	$birthDate = "02/07/1992";
	$birthDate = explode("/", $birthDate);
	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
		? ((date("Y") - $birthDate[2]) - 1)
		: (date("Y") - $birthDate[2]));
	return str_replace('%%age%%', $age, $content);
}

add_filter('the_content','getMyAge');

/**
 * Custom Bootstrap comment fields.
 */
function bootstrap_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<?php if ( $comment->comment_approved == '1' ): ?>
		<li class="media" id="comment-<?php comment_ID(); ?>">
		<div class="media-right">

		</div>
		<div class="media-body">
			<h4 class="media-heading"><?php comment_author_link() ?></h4>
			<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a> &middot; <?php comment_reply_link( array_merge( $args, array(
					'add_below' => '',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '',
					'after'     => ''
				) ) ); ?></time>
			<?php echo get_avatar( $comment, 60 ); ?>
			<?php comment_text() ?>
			<span class="reply"><?php echo comment_reply_link(); ?></span>
		</div>
	<?php endif;
}
