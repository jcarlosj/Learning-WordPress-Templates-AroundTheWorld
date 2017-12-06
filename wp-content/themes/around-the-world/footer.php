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
				</div>
				<div class="grid_1-4">
					<h2>Últimos Consejos</h2>
				</div>
				<div class="grid_1-4">
					<h2>Cupones de descuento</h2>
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
