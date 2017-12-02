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

			<?php
			  # Ultima entrada (por fecha) del Blog: Página Consejos
				$args = array(
					'order'          => 'DESC',		# Orden Ascendente
					'orderby'        => 'date',	  # Ordenar por fecha
					'post_type'      => 'post',	  # Nombre del Post Type: 'post' hace referencia a las entradas del Blog
					'posts_per_page' => 1,				# Número de publicaciones por página
				);

				$ultima_entrada = new WP_Query( $args );

				while( $ultima_entrada -> have_posts() ) :
					$ultima_entrada -> the_post();
			?>

				<article class="last-entry clear">

					<div class="edge-photography">
						<?php the_post_thumbnail( 'main-image-blog' ); ?>
					</div>

					<div class="grid_1-3">

					</div>
					<div class="grid_2-3">
						<h2><?php the_title(); ?></h2>
						<?php html5wp_excerpt('html5wp_custom_post'); ?>
					</div>

				</article>

			<?php endwhile; wp_reset_postdata(); ?>

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
