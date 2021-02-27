<?php
/*
Template Name: Page - Professional Development
*/
?>
<?php get_header(); ?>

<div style="background-image: url('https://picsum.photos/1920')" class="hero"></div>

  <div class="container">
    <main class="main">
      <h1 class="title"><?php the_title(); ?></h1>
      <h2 class="subTitle">Statutory Inspection of Anglican and Methodist Schools</h2>
      <p><strong>All SIAMS inspections are currently cancelled until further notice. Please contact <a href="mailto:Natalie.Yu@coventrydbe.org">Natalie.Yu@coventrydbe.org</a> for any SIAMS related queries.</strong></p>
    </main>
  </div>

  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>