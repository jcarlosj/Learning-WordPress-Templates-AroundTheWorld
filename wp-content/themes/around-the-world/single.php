<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section class="clear">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post title -->
			<h1><span><?php the_title(); ?></span></h1>
			<!-- /post title -->

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<div class="edge-photography">
					<?php the_post_thumbnail( 'main-image-blog' ); // Fullsize image for the single post ?>
				</div>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<div class="grid_1-3">
				<div class="post-details">
					<!-- post details -->
					<span class="date">Escrito el: <?php the_time('F j, Y'); ?> </span>
					<span class="author"><?php _e( 'Publicado por: ', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
					<span class="category"><?php _e( 'Categoría: ', 'html5blank' ); the_category(', '); // Separated by commas ?></span>
					<!-- post details -->

					<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
					<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
				</div>
			</div>
			<div class="grid_2-3">
				<?php the_content(); // Dynamic Content ?>
				<?php comments_template(); ?>
			</div>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
