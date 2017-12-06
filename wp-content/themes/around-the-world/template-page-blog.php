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
				# Paginación
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				# Imprime todos las entradas menos la última (por fecha) del Blog: Página Consejos
				$args = array(
					'order'          => 'DESC',		# Orden Ascendente
					'orderby'        => 'date',	  # Ordenar por fecha
					'post_type'      => 'post',	  # Nombre del Post Type: 'post' hace referencia a las entradas del Blog
					'posts_per_page' => 5,				# Número de publicaciones por página
					'paged'          => $paged 		# Controla la paginación
				);

				$consejos = new WP_Query( $args );
				$i = 0;				# Flag

				while( $consejos -> have_posts() ) :
					$consejos -> the_post();

					if( $i == 0 ):
			?>

					<article class="last-entry clear">

						<a href="<?php the_permalink(); ?>">
							<div class="edge-photography">
								<?php the_post_thumbnail( 'main-image-blog' ); ?>
							</div>
						</a>

						<div class="grid_1-3">
							<!-- post details -->
							<span class="date">Escrito el: <?php the_time('F j, Y'); ?> </span>
							<span class="author"><?php _e( 'Publicado por: ', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
							<span class="category"><?php _e( 'Categoría: ', 'html5blank' ); the_category(', '); // Separated by commas ?></span>
							<!-- post details -->
						</div>
						<div class="grid_2-3">
							<h2>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<?php html5wp_excerpt('html5wp_custom_post'); ?>
						</div>

					</article>
					<!-- .last-entry -->

				<?php else: ?>
					<article class="entry-tip clear">

						<div class="grid_1-3">
							<a href="<?php the_permalink(); ?>">
								<div class="edge-photography">
									<?php the_post_thumbnail( 'image-medium' ); ?>
								</div>
							</a>
						</div>
						<div class="grid_2-3">
							<h2>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							</h2>
							<?php html5wp_excerpt('html5wp_custom_post'); ?>
						</div>

					</article>
					<!-- .entry-tip -->

			<?php
				endif;
				$i++;
				endwhile;
			?>

			<nav>
				<ul class="pagination clear">
					<li><?php previous_posts_link( '&laquo; Anterior', $consejos -> max_num_pages ) ?></li>
					<li><?php next_posts_link( 'Siguiente &raquo; ', $consejos -> max_num_pages ) ?></li>
				</ul>
			</nav>

			<?php wp_reset_postdata(); ?>

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
