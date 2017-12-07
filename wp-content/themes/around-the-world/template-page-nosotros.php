<?php
/*
 * Template Name: Nosotros
 */
?>

<?php get_header(); ?>

<?php
	# Agrega clase que quita el margen de la imagen destacada cuando esta no ha sido asignada
	$outstanding_image = wp_get_attachment_image_src(
		get_post_thumbnail_id(),			# Obtenemos el ID de la imagen
		'full'												# Tamaño de la imagen (full: completa)
	);
	$url_image = $outstanding_image[ 0 ];	# Asignamos la URL de la imagen
?>

<?php if( $url_image != null ): # Existe la imagen destacada ?>
		<main role="main">
<?php else: ?>
		<?php # NO Existe la imagen destacada ?>
		<main role="main" class="header-no-image">
<?php endif; ?>

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

				<div class="edge-photography">

					<?php # WordPress debe desplegar los ID de las imagenes
								# (ir al Admin y cambiar esta opcion para cada campo en el ACF)
							$image = get_field( 'imagen_superior' );
							if( $image ) {
								echo wp_get_attachment_image(
									$image,					# Id de la imagen
									'image-medium', # Tamaño predefinido de la imagen
									false,					# Icono [true/false]
									array(					# Atributos adicionales
										'class' => 'photograph'		# Atributo y parámetro que agregará
									)
								);
							}
					?>

				</div>
				<div class="edge-photography">

					<?php
							# WordPress debe desplegar los ID de las imagenes
					    # (ir al Admin y cambiar esta opcion para cada campo en el ACF)
							$image = get_field( 'imagen_inferior' );
							if( $image ) {
								echo wp_get_attachment_image(
									$image,					# Id de la imagen
									'image-medium',	# Tamaño predefinido de la imagen
									false,					# Icono [true/false]
									array(					# Atributos adicionales
										'class' => 'photograph'		# Atributo y parámetro que agregará
									)
								);
							}
					?>

				</div>

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
