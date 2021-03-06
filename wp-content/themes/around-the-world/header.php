<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a2853dfe49a8b9c"></script>


		<!-- header -->
		<header class="header clear" role="banner">

			<div class="navigation">

				<!-- wrapper -->
				<div class="wrapper">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->

				</div>
				<!-- /wrapper -->

			</div>
			<!-- .navigation -->

			<?php
				# Despliega imagen destacada como background en el encabezado del Theme
				if( is_page() ) :	# Si estamos en una página cualquiera haga
			  	$outstanding_image = wp_get_attachment_image_src(
						get_post_thumbnail_id(),			# Obtenemos el ID de la imagen
						'full'												# Tamaño de la imagen (full: completa)
					);
					$url_image = $outstanding_image[ 0 ];	# Asignamos la URL de la imagen

					# Si no es el archivo 'front-page.php' no carga la imagen destacada
					if( !is_front_page() ):
						if( $url_image != null ):
			?>
				<div class="alpha-background-image"></div>
				<div class="page-background-image" style="background-image: url( '<?php echo $url_image; ?>' );"></div>
			<?php
						endif;		# $url_image
					endif;		# is_front_page()
				endif;		# is_page()
			?>

		</header>
		<!-- /header -->


		<!-- wrapper -->
		<div class="wrapper">
