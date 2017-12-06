		</div>
		<!-- /wrapper -->

		<!-- footer -->
		<footer class="footer" role="contentinfo">

			<div class="widgets wrapper clear">
				<div class="grid_1-4">
					<h2>Sobre Nosotros</h2>
					<?php
					  # WP_Query al contenido de la página Nosotros a través
						# de su 'page_id' de publicación en WordPress
						$nosotros = new WP_Query( 'page_id=23' );

						while( $nosotros -> have_posts() ):
							$nosotros -> the_post();
							html5wp_excerpt( 'html5wp_index' );
						endwhile; wp_reset_postdata(); ?>
				</div>
				<div class="grid_1-4">
					<h2>Próximos Viajes</h2>
					<?php # WP_Query al contenido de la página Tours ?>
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<?php
						$args = array(
							'order'          => 'ASC',		# Orden Ascendente
							'orderby'        => 'date',	  # Ordenar por fecha
							'post_type'      => 'tours',	# Nombre del Post Type: Tours (Creado en el functions.php)
							'posts_per_page' => 2,				# Número de publicaciones por página
						);

						$tours = new WP_Query( $args );

						while( $tours -> have_posts() ) :
							$tours -> the_post();
					?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<div class="outstanding_image grid_2-4">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'thumbnail-footer-image' ); ?>
								</a>
							</div><!-- .outstanding_image -->

							<?php
								$departure_date = change_date_format( strtotime( get_field( 'fecha_de_salida' ) ) );	# Implementamos la funcionalidad cambio de fecha (functions.php)
								$arrival_date = change_date_format( strtotime( get_field( 'fecha_de_regreso' ) ) );		# Implementamos la funcionalidad cambio de fecha (functions.php)
							?>

							<div class="title-date clear grid_2-4">

								<a href="<?php the_permalink(); ?>">
									<h2><?php the_title(); ?></h2>
								</a>
								<p class="date">
									<?php echo $departure_date; ?> - <?php echo $arrival_date; ?>
								</p><!-- .date -->

							</div><!-- .title-date -->

							<div class="clear"></div>

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
				</div>
				<div class="grid_1-4">
					<h2>Últimos Consejos</h2>
				</div>
				<div class="grid_1-4">

				</div>
			</div>

			<div class="clear"></div>
			<!-- .clear -->

			<!-- copyright -->
			<p class="copyright">
				&copy; <?php echo date('Y'); ?> Derechos reservados <?php bloginfo('name'); ?>
			</p>
			<!-- /copyright -->

		</footer>
		<!-- /footer -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
