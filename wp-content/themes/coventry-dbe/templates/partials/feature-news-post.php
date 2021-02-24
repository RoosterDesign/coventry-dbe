<article class="featureNewsPost">

  <div class="featureNewsPost__content">

    <span class="featureNewsPost__date">
      <?php echo get_the_date('jS F Y'); ?>  
    </span>

    <h1 class="title -white">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h1>

    <p>
      <?php if ( has_excerpt() ) { echo get_excerpt(200); } else { echo ''; } ?>
    </p>

    <a href="<?php the_permalink() ?>" class="btn -ghostAlt">Read more<span class="btn__icon -plus"></span></a>
  </div>

  <?php if ( has_post_thumbnail() ) {
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'full');
  } else {
    $thumbnail = 'https://via.placeholder.com/735x490';
  } ?>

  <div class="featureNewsPost__thumbnail" style="background-image: url('<?php echo $thumbnail ?>')"></div>

</article>