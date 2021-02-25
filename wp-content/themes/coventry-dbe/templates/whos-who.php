<?php
/*
Template Name: Page - Who's Who
*/
?>
<?php get_header(); ?>

<?php include get_theme_file_path("templates/partials/masthead.php"); ?>


<div class="container">
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
</div>

<?php get_footer(); ?>