<?php if( get_field('masthead_bg_image')) : ?>
	<?php $image = get_field('masthead_bg_image'); $size = 'masthead-bg'; $thumb = $image['sizes'][ $size ]; ?>         
	<div style="background-image: url(<?php echo esc_url($thumb); ?>)" class="hero"></div>
<?php else:  ?>
<div class="masthead">
	<div class="container">
		<h1 class="title"><?php the_title(); ?></h1> 
		<?php if (get_field('masthead_subTitle')) { ?>
			<h2 class="subTitle"><?php the_field('masthead_subTitle'); ?></h2>
		<?php } ?>
	</div>
</div>
<?php endif; ?>