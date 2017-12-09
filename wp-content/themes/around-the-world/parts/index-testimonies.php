<div class="grid_1-3">

  <section class="testimonies clear">

    <h2 class="title"><span>Testimonios</span></h2>

    <?php
      $args = array(
        'post_type'      => 'testimonios',		# Nombre del Post Type: testimonios (Creado en el functions.php o Slug sifue creado con 'CPT UI Plugin')
        'posts_per_page' => 2,					      # Número de publicaciones por página (-1 = Todas)
        'order'          => 'DESC',						# Ordenamiento descendente
        'orderby'       => 'date'						# Ordenados por       : campo fecha
      );

      $testimonios = new WP_Query( $args );

      while( $testimonios -> have_posts() ):
        $testimonios -> the_post();
    ?>

      <article class="testimonio">
        <blockquote><p><?php html5wp_excerpt( 'html5wp_index' ); # Para que no agregue el tag <p> ?></p></blockquote>
        <p class="name"><?php the_field( 'nombre' ) ?></p>
        <p class="city"><?php the_field( 'ciudad' ) ?></p>
      </article>
      <!-- /article -->

    <?php endwhile; wp_reset_postdata(); ?>

    <a href="<?php echo get_permalink( 12 ); ?>" class="btn-orange btn-ver-todos">Ver todos</a>

  </section>
  <!-- .testimonies -->

</div>
<!-- .grid_1-3 -->
