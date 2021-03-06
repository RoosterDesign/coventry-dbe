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
		<main class="main download cf">			
			<?php if (! post_password_required() ) { ?>
				<p>Click below to download this resource.</p>
				<div class="download-wrap">
    			<a href="<?php the_field('download_file'); ?>" target="_blank" class="btn">Download File</a>
				</div>
			<?php
					} else {
						echo get_option('download_body');
						echo get_the_password_form($post->ID);
					}
			?>

			<p><a href="/resources/">Back to resources</a></p>
		</main>		
	</div>

<?php get_footer(); ?>