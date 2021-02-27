<?php
/*
Template Name: Page - Governance
*/
?>
<?php get_header(); ?>

  <div style="background-image: url('https://picsum.photos/1920')" class="hero"></div>

  <div class="container">
    <main class="main">
      <h1 class="title"><?php the_title(); ?></h1>
      <img src="https://picsum.photos/1020/600" class="fwImg">
    </main>
  </div>

  <section class="cardsWrap">     
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/resource-card.php"); ?>
  </section>

  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>
  
<?php get_footer(); ?>