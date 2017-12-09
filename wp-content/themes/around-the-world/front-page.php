<?php get_header(); ?>
	</div>
	<!-- .wrapper -->

	<section class="slider">
		<?php get_template_part( 'parts/index', 'slider' ); ?>
	</section>
	<!-- .slider -->

	<div class="wrapper">

		<?php get_template_part('searchform'); # Agrega buscador de WordPress ?>

		<section class="tours clear">
			<?php get_template_part( 'parts/index', 'tours' ); ?>
		</section>
		<!-- section .tours -->

		<section class="testimonials-tips clear">
			<?php get_template_part( 'parts/index', 'tips' ); ?>
			<?php get_template_part( 'parts/index', 'testimonies' ); ?>
		</section>
		<!-- section .testimonials-tips -->

<?php get_footer(); ?>
