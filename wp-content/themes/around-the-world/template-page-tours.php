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

					<?php the_post_thumbnail( 'featured-tour-image' ); ?>
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/masinfo.png" alt="más info">
					</a>
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
					</a>
					<?php
						$format = 'd F, Y';

						$date = strtotime( get_field( 'fecha_de_salida' ) );
						$departure_date = date_i18n( $format, $date );					# Aplica el formato a la fecha

						$date = strtotime( get_field( 'fecha_de_entrada' ) );
						$arrival_date = date_i18n( $format, $date );					# Aplica el formato a la fecha
					?>
					<p class="date">
						<?php echo $departure_date; ?> - <?php echo $arrival_date; ?>
					</p>
					<p class="price">
						<?php the_field( 'precio' ); ?>
					</p>
					<p class="description">
						<?php the_field( 'descripcion_corta' ); ?>
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
