<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<article class="post-article">
			<h1 class="post-title"><?php the_title(); ?></h1>

			<div class="post-excerpt">
				<?php the_content() ?>
			</div>
		</article>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
