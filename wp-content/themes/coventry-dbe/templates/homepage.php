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
          <span class="fwSlide__label">Children</span>
          <h1 class="fwSlide__title">We are passionate about seeing Children's Work</h1>
          <p>Find out more about what we do and how we can help you.</p>
          <a href="" class="btn">Find out more<span class="icon plus"></span></a>
        </div>
      </div>

      <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ffd112;">
        <div class="fwSlide__inner">
          <span class="fwSlide__label">Children</span>
          <h1 class="fwSlide__title">This is another title</h1>
          <p>Find out more about what we do and how we can help you.</p>
          <a href="" class="btn">Find out more<span class="icon plus"></span></a>
        </div>
      </div>

      <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ee928e;">
        <div class="fwSlide__inner">
          <span class="fwSlide__label">Children</span>
          <h1 class="fwSlide__title">We are passionate about seeing Children's Work</h1>
          <p>Find out more about what we do and how we can help you.</p>
          <a href="" class="btn">Find out more<span class="btn__icon --plus"></span></a>
        </div>
      </div>

    </div>
  </section>




  <div class="container">

    <nav class="catNav">
      <ul class="catNavList">
        <li class="catNavList__item" style="background-color: #ffd112">
          <a href="/school-search" class="catNavList__link">Schools</a>
        </li>
        <li class="catNavList__item" style="background-color: #f09192">
          <a href="/" class="catNavList__link">Children</a>
        </li>
        <li class="catNavList__item" style="background-color: #4bd7bd">
          <a href="/" class="catNavList__link">Youth</a>
        </li>
        <li class="catNavList__item" style="background-color: #707070">
          <a href="/resources" class="catNavList__link">Resource Area</a>
        </li>
      </ul>
    </nav>

    <section class="contentPanel">
      
    <div class="contentPanel__text">
      <h1>Diocesan Board of Education</h1>
      <p>The DBE empowers others to be courageous, equipping them to deliver excellent Christian education so that all will flourish to achieve their full human potential.</p>
 
      <a href="" class="btn">Watch Now<span class="btn__icon --play"></span></a>
    </div>

    <img src="https://picsum.photos/650/425" class="contentPanel__img" alt="">

    </section>
  </div>

<?php get_footer(); ?>