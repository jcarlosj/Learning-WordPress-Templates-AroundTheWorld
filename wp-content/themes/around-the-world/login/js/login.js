jQuery( function( $ ) {
  /* Agrupamos los tags <h1> (Logo) y <form> (Formulario de Login) en un tag <div> */
  $( '#login h1, #login form' ) .wrapAll( '<div class="group-logo-formlogin"></div>' );

  /* Implementa 'Vegas jQuery Plugin' en el Login */
  $( 'body' ) .vegas({
    slides: [   /* Paths de las imagenes */
      { src: login_images . template_route + '/login/img/1.jpg' },
      { src: login_images . template_route + '/login/img/2.jpg' },
      { src: login_images . template_route + '/login/img/3.jpg' }
    ],
    /* Paths del patrón de transparencia (textura) */
    overlay: login_images . template_route + '/login/img/overlays/05.png',
    /* Transiciones o efectos para el cambio entre imagenes */
    transition: [
      'fade',
      'zoomOut',
      'swirlLeft'
    ]
  });
});
