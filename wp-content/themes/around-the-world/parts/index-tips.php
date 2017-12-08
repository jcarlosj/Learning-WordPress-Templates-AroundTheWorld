<div class="grid_2-3">
  <h2 class="title"><span>Consejos para viajar</span></h2>

  <?php
    $args = array(
      'post_type'      => 'post',					  # Nombre del Post Type: testimonios (Creado en el functions.php o Slug sifue creado con 'CPT UI Plugin')
      'posts_per_page' => 2,					      # Número de publicaciones por página (-1 = Todas)
      'order'          => 'DESC',						# Ordenamiento descendente
      'order_by'       => 'date'						# Ordenados por: campo fecha
    );

    $entradas = new WP_Query( $args );

    while( $entradas -> have_posts() ) :
      $entradas -> the_post();
  ?>

    <div class="entry clear">
      <div class="grid_1-3">
        <?php the_post_thumbnail( 'entry-image' ); ?>
      </div>
      <div class="grid_2-3">
        <h3><?php the_title(); ?></h3>
        <?php html5wp_excerpt( 'html5wp_custom_post' ); ?>
        <a href="<?php the_permalink(); ?>" class="btn-orange">Continuar leyendo</a>
      </div>
    </div>

  <?php endwhile; wp_reset_postdata(); ?>

</div>
<!-- .grid_2-3 -->
