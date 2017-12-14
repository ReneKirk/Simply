<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<article class="post-article">
			<h1 class="post-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
			<time class="post-date"><?php echo get_the_date(); ?> &middot; <?php echo read_time(get_the_content()); ?> &middot; <?php comments_number('0 comments', '1 comment'); ?></time>

			<?php if (has_post_thumbnail()): ?>
				<div class="post-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<div class="post-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</article>

	<?php endwhile; ?>
    <div class="inline-block ib-left"><?php next_posts_link( 'Older posts' ); ?></div>
    <div class="inline-block ib-right"><?php previous_posts_link( 'Newer posts' ); ?></div>
<?php else:

	include( get_query_template( '404' ) );
	header('HTTP/1.0 404 Not Found');
	exit;
    ?>
    <article class="post-article">
        <h1 class="post-title">Didn't find anything here..</h1>
        <div class="post-excerpt" style="text-align: center !important;">
            It seems like you were looking for something that isn't here. I'm sorry about that.
        </div>
    </article>
<?php endif; ?>

<?php get_footer(); ?>
