<?php
/*
Template Name: Page - Resources
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
    <?php $args = array( 'post_type' => 'resources', 'posts_per_page' => 999 ); $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
          include get_theme_file_path("templates/partials/resource-card.php");
      endwhile; wp_reset_postdata();
    endif; ?>  
  </section>
  
  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>