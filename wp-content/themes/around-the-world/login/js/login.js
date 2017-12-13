jQuery( function( $ ) {
  /* Implementa 'Vegas jQuery Plugin' en el Login */
  $( 'body' ) .vegas({
    slides: [   /* Paths de las imagenes */
      { src: login_images . template_route + '/login/img/1.jpg' },
      { src: login_images . template_route + '/login/img/2.jpg' },
      { src: login_images . template_route + '/login/img/3.jpg' }
    ]
  });
});
