<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<article class="post-article">
			<h1 class="post-title"><?php the_title(); ?></h1>

            <time class="post-date"><?php the_date(); ?> &middot; <?php echo read_time(get_the_content()); ?> &middot; <?php comments_number('0 comments', '1 comment'); ?></time>

            <?php if (has_post_thumbnail()): ?>
                <div class="post-thumbnail">
					<?php the_post_thumbnail(); ?>
                </div>
			<?php endif; ?>

            <div class="post-excerpt">
			    <?php the_content(); ?>
            </div>

            <div class="post-category text-center">
                <?php the_category(' '); ?>
            </div>

            <?php if (has_tag()): ?>
                <div class="post-tags">
                    Tags: <?php the_tags('', ','); ?>
                </div>
            <?php endif; ?>
		</article>

        <?php if ( comments_open() || get_comments_number() ) : ?>
			<div class="post-comments">
                <h3>Have some thoughts or comments on this? </h3>
                <?php comments_template(); ?>
            </div>
		<?php endif; ?>

	<?php endwhile; ?>
<?php else: ?>

    <?php
	include( get_query_template( '404' ) );
	header('HTTP/1.0 404 Not Found');
	exit;
    ?>

<?php endif; ?>

<?php get_footer(); ?>
