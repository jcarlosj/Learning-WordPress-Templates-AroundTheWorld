<?php
/*
 * Template Name: Nosotros
 */
?>

<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="clear">

			<h1><span><?php the_title(); ?></span></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid_2-3' ); ?>>

				<?php the_content(); ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

			<div class="gallery grid_1-3">

				<?php # WordPress debe desplegar los ID de las imagenes
				      # (ir al Admin y cambiar esta opcion para cada campo en el ACF)
						$image = get_field( 'imagen_superior' );
						if( $image ) {
							echo wp_get_attachment_image(
								$image,					# Id de la imagen
								'image-medium'	# Tamaño predefinido de la imagen
							);
						}

						# WordPress debe desplegar los ID de las imagenes
				    # (ir al Admin y cambiar esta opcion para cada campo en el ACF)
						$image = get_field( 'imagen_inferior' );
						if( $image ) {
							echo wp_get_attachment_image(
								$image,					# Id de la imagen
								'image-medium'	# Tamaño predefinido de la imagen
							);
						}
				?>

			</div>

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
