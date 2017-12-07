(function ($, root, undefined) {

	$(function () {

		'use strict';

		// Tours: Gallery (Plugin jQuery LightBox 2)
		jQuery( '.gallery a' ) .each( function() {
			jQuery( this ) .attr(
				{'data-lightbox':'galeria'}
			);
		});
		// Agregamos algunas opciones (Plugin jQuery LightBox 2)
		lightbox .option({
				'wrapAround' : true, 	// Desplazamiento ciclico de las imagenes a través de las flechas de navegación del Plugin
				'showImageNumberLabel' : false, // Quita el label de numeración de las imágenes de la galería

		});

		// Implementamos bxslider
		jQuery( 'ul.slider' ) .bxSlider({
			mode: 'fade',			// Cambia la forma como se muestra
			pager: false,			// Elimina el paginador del Slider

		});

		// Detección de página actual agregando la clase para aplicar al item del menú de la página actual
		jQuery( '.single-tours header nav ul li:contains("Tours")' ) .addClass( 'current_page_item' );
		jQuery( '.single-post header nav ul li:contains("Consejos")' ) .addClass( 'current_page_item' );

	});

})(jQuery, this);
