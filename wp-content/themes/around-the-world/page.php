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
		<section>

			<h1><span><?php the_title(); ?></span></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

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
