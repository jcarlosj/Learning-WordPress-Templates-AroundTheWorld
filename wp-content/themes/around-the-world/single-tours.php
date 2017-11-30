<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section class="clear">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- post title -->
		<h1><span><?php the_title(); ?></span></h1>
		<!-- /post title -->

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid_2-3' ); ?>>

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<?php the_post_thumbnail( 'main image tours' ); // Fullsize image for the single post ?>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<div class="travel-information">

				<?php
					$departure_date = change_date_format( strtotime( get_field( 'fecha_de_salida' ) ) );	# Implementamos la funcionalidad cambio de fecha (functions.php)
					$arrival_date = change_date_format( strtotime( get_field( 'fecha_de_regreso' ) ) );		# Implementamos la funcionalidad cambio de fecha (functions.php)
				?>
				<p class="date">
				<span>Duración:</span>
					<?php echo $departure_date; ?> - <?php echo $arrival_date; ?>
				</p>
				<p class="place-of-departure">
					<span>Lugar de salida:</span>
					<?php the_field( 'lugar_de_salida' ); ?>
				</p>
				<p class="places-available">
					<span>Lugares disponibles:</span>
					<?php the_field( 'lugares_disponibles' ); ?>
				</p>
				<p class="price">
					<span>Precio:</span>
					<?php the_field( 'precio' ); ?>
				</p>

			</div>

			<h2 class="title-intinerary">Itinerario de Viaje</h2>

			<p class="intinerary">
				<?php the_field( 'intinerario' ); ?>
			</p>

		</article>
		<!-- /article -->

		<div class="grid_1-3">
			<?php the_content(); // Dynamic Content (Gallery) ?>
			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
		</div>

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

	<?php # SideBar dentro del Post ?>

<?php get_footer(); ?>
