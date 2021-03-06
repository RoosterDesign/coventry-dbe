<article class="featureNewsPost">

  <div class="featureNewsPost__content">

    <span class="featureNewsPost__date">
      <?php echo get_the_date('jS F Y'); ?>  
    </span>

    <h1 class="title -white">
      <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h1>

    <p>
      <?php if ( has_excerpt() ) { echo get_excerpt(200); } else { echo ''; } ?>
    </p>

    <a href="<?php the_permalink() ?>" class="btn -ghostAlt" title="Read more">Read more<span class="btn__icon -plus"></span></a>
  </div>

  <?php if ( has_post_thumbnail() ) {
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'featured-post-thumb');
  } else {
    $thumbnail = get_option('featBlog_fallback_img');
  } ?>
  <a class="featureNewsPost__thumbnail" style="background-image: url('<?php echo $thumbnail ?>')" a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>"></a>

</article>