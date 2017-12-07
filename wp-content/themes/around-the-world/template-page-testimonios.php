<?php
/*
 * Template Name: Testimonios
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

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid_2-3' ); ?>>

				<?php edit_post_link(); ?>
				<?php the_content(); ?>

				<br class="clear">

				<?php
					$args = array(
						'post_type'      => 'testimonios',		# Nombre del Post Type: testimonios (Creado en el functions.php o Slug sifue creado con 'CPT UI Plugin')
						'posts_per_page' => -1,					      # Número de publicaciones por página (-1 = Todas)
						'order'          => 'DESC',						# Ordenamiento descendente
						'order_by'       => 'date'						# Ordenados por       : campo fecha
					);

					$testimonios = new WP_Query( $args );

					while( $testimonios -> have_posts() ):
						$testimonios -> the_post();
				?>

					<article class="testimonio">
						<h2><?php the_title(); ?></h2>
						<blockquote><p><?php echo get_the_content(); # Para que no agregue el tag <p> ?></p></blockquote>
						<p class="name"><?php the_field( 'nombre' ) ?></p>
						<p class="city"><?php the_field( 'ciudad' ) ?></p>
					</article>
					<!-- /article -->

				<?php endwhile; wp_reset_postdata(); ?>

			</article>
			<!-- /article -->

			<div class="form-testimonios grid_1-3">
				<h3>Envíanos tu testimonio</h3>
				<?php
				 	# Imprime formulario Testimonios (Contact Form 7) usando su 'Shortcode'
					echo do_shortcode( '[contact-form-7 id="132" title="Testimonios"]' );
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
