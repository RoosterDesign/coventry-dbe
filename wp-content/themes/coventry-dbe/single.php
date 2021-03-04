<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coventry-dbe
 */

get_header();
?>

	<?php include get_theme_file_path("templates/partials/masthead.php"); ?>

	<div class="container">
		<main class="main post cf">
			<p class="postDate"><?php echo get_the_date('jS F Y'); ?></p>
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('post-img'); } ?>	
			<?php the_content() ?>		
			<br />
			<p><a href="/news">Back to news page</a></p>
		</main>		
  </div>

<?php get_footer(); ?>
