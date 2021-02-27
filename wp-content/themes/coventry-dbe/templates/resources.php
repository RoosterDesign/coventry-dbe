<?php
/*
Template Name: Page - Resources
*/
?>
<?php get_header(); ?>

  <div style="background-image: url('https://picsum.photos/1920')" class="hero"></div>

  <div class="container">
    <main class="main">
      <h1 class="title"><?php the_title(); ?></h1>
      <p>Our Diocesan Service Agreement (link to document) offers a generous package to ensure excellent value for money and with the aim that church schools are well placed to live out the values required in educating for ‘life in all its fullness’.</p>
      <p>If you would like to access resources please email <a href="mailto:joanne.evans@coventrydbe.org">joanne.evans@coventrydbe.org</a></p>
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