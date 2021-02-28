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

  <!-- TODO - WHEN COURSE HAS PASSED, REMOVE - ONLY SHOW FUTURE COURSES -->
  <section class="cardsWrap">
    <?php include get_theme_file_path("templates/partials/event-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/event-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/event-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/event-card.php"); ?>  
  </section>

  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>