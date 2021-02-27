<?php
/*
Template Name: Page - Homepage
*/
?>
<?php get_header(); ?>

<section class="fwSlider">
  <div class="owl-carousel">
    <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ee928e;">
      <div class="fwSlide__inner">
        <span class="fwSlide__label">Resources</span>
        <h1 class="fwSlide__title">We are passionate about seeing Children's Work.</h1>
        <p>Find out more about what we do and how we can help you.</p>
        <a href="" class="btn">Find out more<span class="btn__icon -plus"></span></a>
      </div>
    </div>
    <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ffd112;">
      <div class="fwSlide__inner">
        <span class="fwSlide__label">Search for a CofE School</span>
        <h1 class="fwSlide__title">Is there a CofE school near me?</h1>
        <a href="" class="btn">Find out more<span class="btn__icon -plus"></span></a>
      </div>
    </div>
    <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ee928e;">
      <div class="fwSlide__inner">
        <span class="fwSlide__label">Professional Development</span>
        <h1 class="fwSlide__title">Find out about what we offer.</h1>
        <a href="" class="btn">Find out more<span class="btn__icon -plus"></span></a>
      </div>
    </div>
    <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ee928e;">
      <div class="fwSlide__inner">
        <span class="fwSlide__label">Governance</span>
        <h1 class="fwSlide__title">Are you called to support?</h1>
        <p>Find out about school governance.</p>
        <a href="" class="btn">Find out more<span class="btn__icon -plus"></span></a>
      </div>
    </div>
  </div>
</section>

  <nav class="catNav container">
    <ul class="catNavList">
      <li class="catNavList__item" style="background-color: #FFD110">
        <a href="/school-search" class="catNavList__link">Schools</a>
      </li>
      <li class="catNavList__item" style="background-color: #F09191">
        <a href="/" class="catNavList__link">Children</a>
      </li>
      <li class="catNavList__item" style="background-color: #4CD8BD">
        <a href="/" class="catNavList__link">Youth</a>
      </li>
      <li class="catNavList__item" style="background-color: #707070">
        <a href="/resources" class="catNavList__link">Resource Area</a>
      </li>
    </ul>
  </nav>

  <div class="container">
    <section class="main col-2">
      <div class="main__left">
        <h1 class="title">Diocesan Board of Education</h1>
        <p>The DBE empowers others to be courageous, equipping them to deliver excellent Christian education so that all will flourish to achieve their full human potential.</p>
        <a href="#" class="btn">Watch now<span class="btn__icon -play"></span></a>        
        <?php /* 
        <figure class="contentPanel__signature">
          <img src="https://via.placeholder.com/170x65" />
          <figcaption>April Gold - Diocesan Director of Education</figcaption>
        </figure>
        */?>
      </div>
      <aside class="main__right">
        <img src="https://picsum.photos/650/425" alt="">
      </aside>
    </section>
  </div>

  <?php include get_theme_file_path("templates/partials/latest-news-cards-feature.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>
  
<?php get_footer(); ?>