<article class="newsCard">
  <div class="newsCard__inner">

    <a href="<?php the_permalink(); ?>" class="newsCard__thumbnail">              
        <?php if ( has_post_thumbnail() ) { ?>
          <?php the_post_thumbnail(); ?>                    
        <?php } else { ?>
          <img src="https://via.placeholder.com/360x240" alt="<?php the_title(); ?>"/>
        <?php } ?>
    </a>

    <span class="newsCard__date"><?php echo get_the_date('jS F Y'); ?></span>
    
    <h1 class="newsCard__title">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h1>
    
    <p><?php if ( has_excerpt() ) { echo get_excerpt(100); } else { echo ''; } ?></p>
    
    <a href="<?php the_permalink() ?>" class="btn -ghost">Read more<span class="btn__icon -plus"></span></a>

  </div>
</article>