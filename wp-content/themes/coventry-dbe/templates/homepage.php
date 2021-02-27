<?php
/*
Template Name: Page - Homepage
*/
?>
<?php get_header(); ?>

<section class="fwSlider">
  <div class="owl-carousel">

  <?php $args = array( 'post_type' => 'home_carousel', 'posts_per_page' => 99 ); $the_query = new WP_Query( $args );  ?>
    <?php if ( $the_query->have_posts() ) :
      while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <!-- TODO - PULL IMAGE FROM CMS -->
        <div class="fwSlide" style="background-image: url('https://picsum.photos/640/360'); border-top-color: #ee928e;">
          <div class="fwSlide__inner">
            <span class="fwSlide__label"><?php the_field('homeCarousel_subTitle'); ?></span>
            <h1 class="fwSlide__title"><?php the_title(); ?></h1>
            <?php if (get_field('homeCarousel_body')) { ?>
              <p><?php the_field('homeCarousel_body'); ?></p>
            <?php } ?>
            <?php if (get_field('homeCarousel_link')) { ?>
              <a href="<?php the_field('homeCarousel_link'); ?>" class="btn">Find out more<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="btn__plus"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg></a>
            <?php } ?>
          </div>
        </div>

      <?php endwhile; wp_reset_postdata(); ?>
  <?php endif; ?>
  </div>
</section>

  <nav class="catNav container">
    <ul class="catNavList">
      <li class="catNavList__item" style="background-color: <?php the_field('link_1_colour'); ?>"><a href="<?php the_field('link_1_link'); ?>" class="catNavList__link"><?php the_field('link_1_text'); ?></a></li>
      <li class="catNavList__item" style="background-color: <?php the_field('link_2_colour'); ?>"><a href="<?php the_field('link_2_link'); ?>" class="catNavList__link"><?php the_field('link_2_text'); ?></a></li>
      <li class="catNavList__item" style="background-color: <?php the_field('link_3_colour'); ?>"><a href="<?php the_field('link_3_link'); ?>" class="catNavList__link"><?php the_field('link_3_text'); ?></a></li>
      <li class="catNavList__item" style="background-color: <?php the_field('link_4_colour'); ?>"><a href="<?php the_field('link_4_link'); ?>" class="catNavList__link"><?php the_field('link_4_text'); ?></a></li>
    </ul>
  </nav>

  <div class="container">
    <section class="main col-2">
      <div class="main__left">
        <h1 class="title"><?php the_field('homeIntro_title'); ?></h1>
        <p><?php the_field('homeIntro_body'); ?></p>
        <?php $btn = get_field('homeIntro_button'); if( $btn['label'] ): ?>
          <a href="<?php echo $btn['link']; ?>" class="btn"><?php echo $btn['label']; ?><?php echo $btn['icon']; ?></a>        
        <?php endif; ?>
        <?php /* 
        <figure class="contentPanel__signature">
          <img src="https://via.placeholder.com/170x65" />
          <figcaption>April Gold - Diocesan Director of Education</figcaption>
        </figure>
        */?>
      </div>
      <aside class="main__right">
        
        <!-- TODO - POPULATE WITH STOCK IMAGE -->
        <img src="https://picsum.photos/650/425" alt="">
        <?php $image = get_field('homeIntro_image');
          if( $image ): $url = $image['url']; $alt = $image['alt']; $size = 'home-intro'; ?>
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
        <?php endif; ?>

      </aside>
    </section>
  </div>

  <?php include get_theme_file_path("templates/partials/latest-news-cards-feature.php"); ?>
  <?php include get_theme_file_path("templates/partials/follow-us.php"); ?>
  
<?php get_footer(); ?>