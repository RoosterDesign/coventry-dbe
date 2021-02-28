<div class="card">

  <?php if ( has_post_thumbnail() ) {
    $photo = get_the_post_thumbnail_url(get_the_ID(),'team-photo');
  } else {
    $photo = '/wp-content/uploads/2021/02/no-team-photo.jpg';
  } ?>

  <div class="card__thumbnail">
    <img src="<?php echo $photo ?>" alt="<?php the_title(); ?>" />
  </div>  

  <div class="card__inner">
    <h3 class="card__title">
      <?php the_title(); ?>     
      <?php if (get_field('team_jobTitle')) { ?>
        <small><?php the_field('team_jobTitle'); ?></small>
      <?php } ?>
    </h3>
    <div class="cardReveal">
      <a class="btn -sml js-open-reveal">View <?php the_field('team_firstName'); ?>'s Role</a>
      <div class="cardReveal__content">
        <p><strong>In <?php the_field('team_gender'); ?> role, <?php the_field('team_firstName'); ?></strong><span class="cardReveal__close js-close-reveal"></span></p>
        <?php the_field('team_role'); ?>        
      </div>
    </div>
  </div> 

  <?php if (get_field('team_email')) { ?>
    <div class="card__footer">
      <a href="mailto:<?php the_field('team_email'); ?>" title="Email <?php the_title(); ?>" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
        <span class="card__email--short">Email <?php the_title(); ?></span>
        <span class="card__email--full"><?php the_field('team_email'); ?></span>
      </a>
    </div>
  <?php } ?>      
    
</div>