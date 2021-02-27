<?php
/*
Template Name: Page - General
*/
?>
<?php get_header(); ?>

<div style="background-image: url('https://picsum.photos/1920')" class="hero"></div>

  <div class="container">
    <main class="main">
      <h1 class="title"><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </main>
  </div>

  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>