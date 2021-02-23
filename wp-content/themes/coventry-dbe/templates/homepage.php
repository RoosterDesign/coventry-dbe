<?php
/*
Template Name: Page - Homepage
*/
?>
<?php get_header(); ?>

<section class="fwSlider block">
  <div class="owl-carousel">

    <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ee928e;">
      <div class="fwSlide__inner">
        <span class="fwSlide__label">Resources</span>
        <h1 class="fwSlide__title">We are passionate about supporting our CofE schools.</h1>
        <p>Find out about the resources we provide.</p>
        <a href="" class="btn">Find out more<span class="btn__icon --plus"></span></a>
      </div>
    </div>

    <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ffd112;">
      <div class="fwSlide__inner">
        <span class="fwSlide__label">Search for a CofE School</span>
        <h1 class="fwSlide__title">Is there a CofE school near me?</h1>
        <a href="" class="btn">Find out more<span class="btn__icon --plus"></span></a>
      </div>
    </div>

    <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ee928e;">
      <div class="fwSlide__inner">
        <span class="fwSlide__label">Professional Development</span>
        <h1 class="fwSlide__title">Find out about what we offer.</h1>
        <a href="" class="btn">Find out more<span class="btn__icon --plus"></span></a>
      </div>
    </div>

    <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ee928e;">
      <div class="fwSlide__inner">
        <span class="fwSlide__label">Governance</span>
        <h1 class="fwSlide__title">Are you called to support?</h1>
        <p>Find out about school governance.</p>
        <a href="" class="btn">Find out more<span class="btn__icon --plus"></span></a>
      </div>
    </div>

  </div>
</section>

  <div class="container">

    <nav class="catNav block">
      <ul class="catNavList">
        <li class="catNavList__item" style="background-color: #ffd112">
          <a href="/school-search" class="catNavList__link">Training</a>
        </li>
        <li class="catNavList__item" style="background-color: #f09192">
          <a href="/" class="catNavList__link">Resources</a>
        </li>
        <li class="catNavList__item" style="background-color: #4bd7bd">
          <a href="/" class="catNavList__link">Governance</a>
        </li>
        <li class="catNavList__item" style="background-color: #707070">
          <a href="/resources" class="catNavList__link">School Search</a>
        </li>
      </ul>
    </nav>

    <section class="contentPanel block">      
      <div class="contentPanel__text">
        <h1 class="title">Enabling flourishing through Christ.  Educating for life in all its fullness</h1>
        <p>Welcome to the Coventry Diocesan Board of Education website. The DBE works in partnership with schools, communities, churches and other stakeholders to promote distinctively Christian education. On this website you will find information, resources, advice and guidance. If you can’t find what you are looking for please contact the team directly.</p>
        <figure class="contentPanel__signature">
          <img src="https://via.placeholder.com/170x65" />
          <figcaption>April Gold - Diocesan Director of Education</figcaption>
        </figure>
      </div>
      <div class="contentPanel__img">
        <img src="https://picsum.photos/650/425" alt="">
      </div>
    </section>

    <section class="blogPanel">
      <h1 class="title">Latest news and stories</h1>

      <div style="display: flex">
        <?php

          $args = array(
            'posts_per_page' => 3,
            'post_type' => 'post'
          );

          $post_query = new WP_Query($args);
          
          if($post_query->have_posts() ) { while($post_query->have_posts() ) { $post_query->the_post();
            include get_theme_file_path("templates/partials/blog-post-card.php");
          }

        }
        ?>
        </div>

    </section>


  </div>
<?php get_footer(); ?>