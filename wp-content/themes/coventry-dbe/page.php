<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventry-dbe
 */

get_header();
?>

	<?php include get_theme_file_path("templates/partials/masthead.php"); ?>

	<div class="container">
		<main class="main">
			<?php include get_theme_file_path("templates/partials/body-masthead.php"); ?>
			<?php the_field('pageBody'); ?>
		</main>
	</div>

	<?php if( get_field('select_card_type') !== 'none') { ?>
		<section class="cardsWrap">   

			<?php if (get_field('select_card_type') === 'staff') {

				$args = array( 'post_type' => 'team_members', 'posts_per_page' => 999 );
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						include get_theme_file_path("templates/partials/team-card.php");
					endwhile; wp_reset_postdata();
				endif;

			} elseif (get_field('select_card_type') === 'events') {

				$today = date('Ymd');        
				$args = array(
					'post_type' => 'pro_dev_event',
					'posts_per_page' => 999,
					'meta_key'  => 'prodev_date',
					'orderby' => 'meta_value',
					'meta_query' => array(
						array(
								'key' => 'prodev_date',
								'value' => $today,
								'compare' => '>=',
						),
				),
					'order' => 'ASC'
				); $the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post();
						include get_theme_file_path("templates/partials/event-card.php");
					endwhile; wp_reset_postdata(); 
				endif;

			} elseif (get_field('select_card_type') === 'govResources') {

				$args = array( 'post_type' => 'governance_resources', 'posts_per_page' => 999 ); $the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						include get_theme_file_path("templates/partials/resource-card.php");
				endwhile; wp_reset_postdata();
				endif;

			} elseif (get_field('select_card_type') === 'resources') {

				$args = array( 'post_type' => 'resources', 'posts_per_page' => 999 ); $the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						include get_theme_file_path("templates/partials/resource-card.php");
					endwhile; wp_reset_postdata();
				endif;

			} ?>  
		
		</section>
	<?php } ?>




	

	<?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
	<?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>