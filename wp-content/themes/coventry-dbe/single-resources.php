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


	<div class="container resource">

		<?php if (! post_password_required() ) { ?>

			<main class="main">
					<?php include get_theme_file_path("templates/partials/body-masthead.php"); ?>
					<?php the_field('pageBody'); ?>
					
			</main>
			
			<div class="resources-downloads">
				<h2>Downloads</h2>
				<?php the_field('downloads'); ?>
			</div>

		<?php
				} else { ?>
				<main class="main">
					<h1 class="title"><?php the_title(); ?></h1>

					<div class="resource-password-form">
						<?php echo get_option('download_body');
						echo get_the_password_form($post->ID); ?>
					</div>
				</main>
			<?php } ?>

		<p class="back-link"><a href="/resources/" title="Back to resources">Back to resources</a></p>		
	
	</div>

<?php get_footer(); ?>