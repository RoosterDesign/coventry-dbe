<div class="card">
  <div class="card__inner">
  <h3 class="card__title"><a href="<?php the_field('prodev_link'); ?>" target="_blank"><?php the_title(); ?></a></h3>
  <span class="card__date card__date--large"><?php the_field('prodev_date'); ?></span>
  <?php if( get_field('prodev_subTitle')) { ?>
    <p><?php the_field('prodev_subTitle'); ?></p>
  <?php } ?>
  </div>
  <div class="card__footer">
  <a href="<?php the_field('prodev_link'); ?>" target="_blank" title="<?php echo get_option('prodev_linkText'); ?>">
    <?php echo get_option('prodev_linkIcon'); ?>
    <?php echo get_option('prodev_linkText'); ?>
  </a>
  </div>  
</div>