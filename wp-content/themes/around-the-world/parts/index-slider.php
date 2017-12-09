<?php
  $args = array(
    'post_type'      => 'slider',					# Nombre del Post Type: testimonios (Creado en el functions.php o Slug sifue creado con 'CPT UI Plugin')
    'posts_per_page' => -1,					      # Número de publicaciones por página (-1 = Todas)
    'order'          => 'ASC',						# Ordenamiento ascendente
    'orderby'        => 'menu_order'			# Opción sugerida para el funcionamiento del reordenamiento con el
                                          # 'Post Types Order Plugin'     : campo fecha
  );

  $slider = new WP_Query( $args );
?>
<ul class="slider">

  <?php
    while( $slider -> have_posts() ) :
      $slider -> the_post();
  ?>
    <li>
      <a href="<?php the_field( 'enlace' ); ?>">
        <?php the_post_thumbnail( 'slider-image' ); ?>
      </a>
    </li>
  <?php endwhile; wp_reset_postdata(); ?>

</ul>
