<?php
/*
 * Template Name: Tours
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

			<?php
				$args = array(
					'order'          => 'ASC',		# Orden Ascendente
					'orderby'        => 'date',	  # Ordenar por fecha
					'post_type'      => 'tours',	# Nombre del Post Type: Tours (Creado en el functions.php)
					'posts_per_page' => 4,				# Número de publicaciones por página
				);

				$tours = new WP_Query( $args );

				while( $tours -> have_posts() ) :
					$tours -> the_post();
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid_2-4' ); ?>>

					<div class="outstanding_image">
					  <?php the_post_thumbnail( 'featured-tour-image' ); ?>
					  <a class="more-info" href="<?php the_permalink(); ?>">
					    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/masinfo.png" alt="Más info" />
					  </a>
					</div><!-- .outstanding_image -->

					<a href="<?php the_permalink(); ?>">
					  <h2><?php the_title(); ?></h2>
					</a>

					<?php
					  $departure_date = change_date_format( strtotime( get_field( 'fecha_de_salida' ) ) );	# Implementamos la funcionalidad cambio de fecha (functions.php)
					  $arrival_date = change_date_format( strtotime( get_field( 'fecha_de_regreso' ) ) );		# Implementamos la funcionalidad cambio de fecha (functions.php)
					?>

					<div class="date-price clear">
					  <p class="date">
					    <?php echo $departure_date; ?> - <?php echo $arrival_date; ?>
					  </p><!-- .date -->
					  <p class="price">
					    <?php the_field( 'precio' ); ?>
					  </p><!-- .price -->
					</div><!-- .date-price -->

					<div class="clear"></div>

					<p class="description">
					  <?php the_field('descripcion_corta'); ?>
					</p>

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
