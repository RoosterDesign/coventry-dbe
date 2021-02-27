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
      <p>Our Continual Professional Development is designed to be consistent with the values of the Church of England’s Vision for Education. We aim for high quality and excellent value for money.  Courses and events are open to all those involved in our diocesan family of church schools and academies.  Some courses may also be appropriate for community schools and academies and representatives are welcome to attend. The Covid situation means that we will continue to review some of the courses and how best to deliver them for optimum efficiency and safety for delegates.</p>
      <p>Booking a place is essential. This is to ensure that you receive joining instructions and that events are catered for correctly. Online booking will be available or you can email <a href="mailto:alison.watson@coventrydbe.org">alison.watson@coventrydbe.org</a> or call 01788 422800.</p>
      <p>The following are the courses coming up this term – click on the link for more information and to book a place.</p>
    </main>
  </div>

  <!-- TODO - WHEN COURSE HAS PASSED, REMOVE - ONLY SHOW FUTURE COURSES -->
  <section class="cardsWrap">
    <?php include get_theme_file_path("templates/partials/event-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/event-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/event-card.php"); ?>
    <?php include get_theme_file_path("templates/partials/event-card.php"); ?>  
  </section>

  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>