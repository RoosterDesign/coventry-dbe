<div style="background: #fff; margin: 10px; padding: 20px;">

              <a href="<?php the_permalink(); ?>">              
                  <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail(); ?>                    
                  <?php } else { ?>
                    <img src="https://via.placeholder.com/360x240" alt="<?php the_title(); ?>"/>
                  <?php } ?>
              </a>
              <br>
<?php the_date('jS F Y'); ?>  
<br>
<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
<br>
<?php if ( has_excerpt() ) { echo get_excerpt(100); } else { echo ''; } ?>
<br>
<a href="<?php the_permalink() ?>" class="btn">Read more<span class="btn__icon --plus"></span></a>
</div>