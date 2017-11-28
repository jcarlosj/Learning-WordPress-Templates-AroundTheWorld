<?php
/*
 * Template Name: Tours
 */
?>

<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="clear">

			<h1><span><?php the_title(); ?></span></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php
				$args = array(
					'order'          => 'ASC',		# Orden Ascendente
					'orderby'        => 'title',	# Ordenar por título
					'post_type'      => 'tours',	# Nombre del Post Type: Tours (Creado en el functions.php)
					'posts_per_page' => 4,				# Número de publicaciones por página
				);

				$tours = new WP_Query( $args );

				while( $tours -> have_posts() ) :
					$tours -> the_post();
			?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid_2-3' ); ?>>
					<?php the_title(); ?>
				</article>
				<!-- /article -->

			<?php endwhile; wp_reset_postdata(); ?>

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
