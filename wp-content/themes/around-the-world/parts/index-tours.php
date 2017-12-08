<h2 class="title"><span>Próximos Tours</span></h2>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <?php
    $args = array(
      'order'          => 'ASC',		# Orden Ascendente
      'orderby'        => 'date',	  # Ordenar por fecha
      'post_type'      => 'tours',	# Nombre del Post Type: Tours (Creado en el functions.php)
      'posts_per_page' => 3,				# Número de publicaciones por página
    );

    $tours = new WP_Query( $args );

    while( $tours -> have_posts() ) :
      $tours -> the_post();
  ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class( 'grid_1-3 tour-home' ); ?>>

      <div class="outstanding_image">
        <?php the_post_thumbnail( 'featured-tour-image' ); ?>
        <a class="more-info" href="<?php the_permalink(); ?>">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/masinfo.png" alt="Más info" />
        </a>
      </div><!-- .outstanding_image -->

      <?php
        $departure_date = change_date_format( strtotime( get_field( 'fecha_de_salida' ) ) );	# Implementamos la funcionalidad cambio de fecha (functions.php)
        $arrival_date = change_date_format( strtotime( get_field( 'fecha_de_regreso' ) ) );		# Implementamos la funcionalidad cambio de fecha (functions.php)
      ?>

      <div class="title-date clear">
        <a href="<?php the_permalink(); ?>">
          <h2><?php the_title(); ?></h2>
        </a>
        <p class="date">
          <?php echo $departure_date; ?> - <?php echo $arrival_date; ?>
        </p><!-- .date -->
      </div><!-- .date-price -->

      <div class="clear"></div>

    </article>
    <!-- /article -->

  <?php endwhile; wp_reset_postdata(); ?>

<?php endwhile; ?>

<?php else: ?>

  <!-- article -->
  <article>

    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

  </article>
  <!-- /article -->

<?php endif; ?>
