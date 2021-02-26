<?php
/*
Template Name: Page - Who's Who
*/
?>
<?php get_header(); ?>



<div style="background-image: url('https://picsum.photos/1920')" class="hero"></div>

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




<?php get_footer(); ?>