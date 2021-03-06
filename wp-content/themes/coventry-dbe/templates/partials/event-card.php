<div class="card">
  <div class="card__inner">
  <span class="card__date"><?php the_field('prodev_date'); ?></span>
  <h3 class="card__title"><a href="<?php the_field('prodev_link'); ?>" target="_blank"><?php the_title(); ?></a></h3>
  <?php if( get_field('prodev_subTitle')) { ?>
    <p><?php the_field('prodev_subTitle'); ?></p>
  <?php } ?>
  </div>
  <div class="card__footer">
  <a href="<?php the_field('prodev_link'); ?>" target="_blank">
    <?php echo get_option('prodev_linkIcon'); ?>
    <?php echo get_option('prodev_linkText'); ?>
  </a>
  </div>  
</div>