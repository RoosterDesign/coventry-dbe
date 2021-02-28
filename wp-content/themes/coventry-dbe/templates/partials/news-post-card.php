<article class="card">

  <a href="<?php the_permalink(); ?>" class="card__thumbnail">              
      <?php if ( has_post_thumbnail() ) { ?>
        <?php the_post_thumbnail(); ?>                    
      <?php } else { ?>
        <img src="/wp-content/uploads/2021/02/no-img.jpg" alt="<?php the_title(); ?>"/>
      <?php } ?>
  </a>

  <div class="card__inner">   
    <span class="card__date"><?php echo get_the_date('jS F Y'); ?></span>    
    <h1 class="card__title">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h1>    
    <p><?php if ( has_excerpt() ) { echo get_excerpt(100); } else { echo ''; } ?></p>    
    <a href="<?php the_permalink() ?>" class="btn -ghost">Read more<span class="btn__icon -plus"></span></a>
  </div>
</article>