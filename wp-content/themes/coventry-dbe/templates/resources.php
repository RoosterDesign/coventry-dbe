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
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
  </section>
  
  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>