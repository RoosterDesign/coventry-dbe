<?php
/*
Template Name: Page - Who's Who
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
    <?php include get_theme_file_path("templates/partials/team-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/team-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/team-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/team-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/team-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/team-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/team-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/team-card.php"); ?>    
  </section>

  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>