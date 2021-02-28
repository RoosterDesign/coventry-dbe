<?php
/*
Template Name: Page - General
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

<?php get_footer(); ?>