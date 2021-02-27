<?php
/*
Template Name: Page - Who's Who
*/
?>
<?php get_header(); ?>

  <div style="background-image: url('https://picsum.photos/1920')" class="hero"></div>

  <div class="container">
    <main class="main">
    <h1 class="title"><?php the_title(); ?></h1>
    <h2 class="subTitle">Meet Coventry DBE Staff Team</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla, nisi non finibus fermentum, metus lacus laoreet nibh, et molestie nibh est consectetur erat. Morbi rhoncus mattis est vel ullamcorper.</p>
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