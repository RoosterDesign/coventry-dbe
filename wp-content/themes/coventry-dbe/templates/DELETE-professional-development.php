<?php
/*
Template Name: Page - Professional Development
*/
?>
<?php get_header(); ?>

  <?php include get_theme_file_path("templates/partials/masthead.php"); ?>

  <div class="container">
    <main class="main">
      <?php include get_theme_file_path("templates/partials/body-masthead.php"); ?>  
      <?php the_field('pageBody'); ?>
    </main>
  </div>

  <section class="cardsWrap">
    <?php
    $today = date('Ymd');        
    $args = array(
      'post_type' => 'pro_dev_event',
      'posts_per_page' => 999,
      'meta_key'  => 'prodev_date',
      'orderby' => 'meta_value',
      'meta_query' => array(
        array(
            'key' => 'prodev_date',
            'value' => $today,
            'compare' => '>=',
        ),
    ),
      'order' => 'ASC'
    ); $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
        include get_theme_file_path("templates/partials/event-card.php");
      endwhile; wp_reset_postdata(); 
    endif; ?>
  </section>

  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>