<?php
/*
Template Name: Page - Governance
*/
?>
<?php get_header(); ?>

  <div style="background-image: url('https://picsum.photos/1920')" class="hero"></div>


  <div class="container">
  <main class="main col-2">
      <div class="main__left">
        <h1 class="title"><?php the_title(); ?></h1>
        <h2 class="subTitle">Statutory Inspection of Anglican and Methodist Schools</h2>
        <p><strong>All SIAMS inspections are currently cancelled until further notice. Please contact <a href="mailto:Natalie.Yu@coventrydbe.org">Natalie.Yu@coventrydbe.org</a> for any SIAMS related queries.</strong></p>
        <p>SIAMS are inspections carried out in all Anglican and Methodist schools. The principal objective is to evaluate the distinctiveness and effectiveness of the school as a church school, assuming a school is ‘Good’ and focusing the inspection on finding and celebrating evidence of this.</p>
        <p>Inspectors are looking to see how the school’s Christian vision shapes the school and how effective this is in enabling pupils and adults to flourish. You can view a school’s most recent SIAMS inspection report on the school’s website.</p>
        <p>For information about the inspection procedure, SIAMS handbook and other documents please see the Church of England Education Office website using this <a href="https://www.churchofengland.org/about/education-and-schools/church-schools-and-academies/siams-school-inspections">link</a>.</p>
        <p>For more information about SIAMS related courses and any other SIAMS queries please contact Natalie.Yu@coventrydbe.org.</p>
        <p>We are able to support you through several documents we have developed ourselves and also through the following:</p>
        <ul>
          <li>SIAMS Preparation Supportive Meeting</li>
          <li>SIAMS SEF Desktop Exercise</li>
        </ul>
        <p>Please contact Jen Jenkins with regards to these: <a href="mailto:Jennifer.Jenkins@coventrydbe.org">Jennifer.Jenkins@coventrydbe.org</a></p>
      </div>
      <aside class="main__right">
        <img src="https://picsum.photos/650/425" alt="">
      </aside>
    </main>
  </div>

  <?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>
  
<?php get_footer(); ?>