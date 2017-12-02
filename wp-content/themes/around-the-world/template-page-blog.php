<?php
/*
 * Template Name: Blog
 */
?>

<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="clear">

			<h1><span><?php the_title(); ?></span></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php edit_post_link(); ?>

			<br class="clear">

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php # get_sidebar(); ?>

<?php get_footer(); ?>
