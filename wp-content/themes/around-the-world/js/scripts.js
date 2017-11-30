(function ($, root, undefined) {

	$(function () {

		'use strict';

		// Tours: Gallery (Plugin jQuery LightBox 2)
		jQuery( '.gallery a' ) .each( function() {
			jQuery( this ) .attr(
				{'data-lightbox':'galeria'}
			);
		});

	});

})(jQuery, this);
