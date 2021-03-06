<article class="card">

  <a href="<?php the_permalink(); ?>" class="card__thumbnail" title="<?php the_title(); ?>">              
      <?php if ( has_post_thumbnail() ) { ?>
        <?php the_post_thumbnail(); ?>                    
      <?php } else { ?>
        <img src="<?php echo get_option('blog_fallback_img'); ?>" alt="<?php the_title(); ?>"/>
      <?php } ?>
  </a>

  <div class="card__inner">   
    <span class="card__date"><?php echo get_the_date('jS F Y'); ?></span>    
    <h1 class="card__title">
      <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h1>    
    <p><?php if ( has_excerpt() ) { echo get_excerpt(100); } else { echo ''; } ?></p>    
    <a href="<?php the_permalink() ?>" class="btn -ghost" title="Read more">Read more<span class="btn__icon -plus"></span></a>
  </div>
</article>