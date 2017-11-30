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

		//
		jQuery( '.single-tours header nav ul li:contains("Tours")' ) .addClass( 'current_page_item' );

	});

})(jQuery, this);
