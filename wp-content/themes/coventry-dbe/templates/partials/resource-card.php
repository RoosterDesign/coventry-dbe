<div class="card">
  <div class="card__inner">
    <h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  </div>
  <div class="card__footer">    
  <a href="<?php the_permalink(); ?>"><?php echo get_option('resource_linkIcon'); ?><?php echo get_option('resource_linkText'); ?></a>
  </div>  
</div>