<?php
/*
Template Name: Page - School Search
*/
?>
<?php get_header(); ?>

<?php include get_theme_file_path("templates/partials/masthead.php"); ?>

<div class="container">
  <main class="main">
    <?php include get_theme_file_path("templates/partials/body-masthead.php"); ?>  
    <?php echo do_shortcode("[wpsl]"); ?>    
  </main>
</div>

<?php get_footer(); ?>