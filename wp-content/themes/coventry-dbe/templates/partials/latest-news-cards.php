<hr class="hr" />

<div class="container">
  <h1 class="title -hasIcons">
    Latest news and stories
    <?php include get_theme_file_path("templates/partials/social-icons.php"); ?>
  </h1> 
</div>

<div class="cardsWrap">
  <?php
    $args = array( 'posts_per_page' => 3, 'post_type' => 'post' );
    $post_query = new WP_Query($args);          
    if($post_query->have_posts() ) { while($post_query->have_posts() ) { $post_query->the_post();
      include get_theme_file_path("templates/partials/news-post-card.php");
    } }
  ?>
</div>

<div class="container">
  <a href="/news" alt="See more articles" class="btn -moreArticles" title="See more articles">See more articles<span class="btn__icon -plus"></span></a>
</div>