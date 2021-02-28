<?php if( get_field('masthead_bg_image')) { ?>
  <h1 class="title"><?php the_title(); ?></h1>
  <?php if (get_field('masthead_subTitle')) { ?>
    <h2 class="subTitle"><?php the_field('masthead_subTitle'); ?></h2>
  <?php } ?>
<?php } ?>