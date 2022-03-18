<div class="container">
  <section class="main text-img-block <?php if( get_field('textImage_orientation') == 'image_text' ): ?> <?php echo '-reverse'; ?><?php endif; ?>">
    <div class="main__left">
      <?php if (get_field('textImage_title')) { ?>
        <h1 class="title"><?php the_field('textImage_title'); ?></h1>
      <?php } ?>
      <p><?php the_field('textImage_body'); ?></p>        
    </div>
    <?php if (get_field('textImage_image')) { ?>
      <aside class="main__right">
        <?php $image = get_field('textImage_image'); $size = 'home-intro'; echo wp_get_attachment_image( $image, $size ); ?>
      </aside>
    <?php } ?>
  </section>
</div>

<hr class="hr" />