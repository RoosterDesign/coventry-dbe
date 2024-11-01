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


		<?php
		/* Staff */
		if (get_field('select_card_type') === 'staff') {
			echo '<section class="cardsWrap">';
				$args = array( 'post_type' => 'team_members', 'posts_per_page' => 999 );
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						include get_theme_file_path("templates/partials/team-card.php");
					endwhile; wp_reset_postdata();
				endif;
			echo '</section>';
		} ?>

<?php
		/* Board */
		if (get_field('select_card_type') === 'board') {
			echo '<section class="cardsWrap">';
				$args = array( 'post_type' => 'board_members', 'posts_per_page' => 999 );
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						include get_theme_file_path("templates/partials/team-card.php");
					endwhile; wp_reset_postdata();
				endif;
			echo '</section>';
			if ( get_the_content() ) {
				echo '<div class="container"><div class="body-content">';
					the_content();
				echo '</div></div>';
			}
		} ?>


		<?php
		/* Events */
		if (get_field('select_card_type') === 'events') {
			echo '<section class="cardsWrap">';
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
			echo '</section>';
		} ?>
			

		<?php
		/* Governance Resources */
		if (get_field('select_card_type') === 'govResources') {
			echo '<section class="cardsWrap">';
				$args = array( 'post_type' => 'governance_resources', 'posts_per_page' => 999 ); $the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						include get_theme_file_path("templates/partials/governance-resource-card.php");
				endwhile; wp_reset_postdata();
				endif;
			echo '</section>';
		} ?>  


		<?php
		/* Resources */
		if (get_field('select_card_type') === 'resources') { ?>

		<!-- START OF NEW RESOURCES -->
			<?php /* 
			<section class="cardsWrap">
				<?php
					$args = array(
						'hide_empty' => false
					);
					$categories = get_terms( 'resource_category', $args );				
					foreach( $categories as $category ): ?>					
					
					<h2 class="resource-category" id="<?php echo $category->slug; ?>"><?php echo $category->name; ?></h2>				
						<?php $posts = get_posts(array(
							'post_type' => 'resources',
							'taxonomy' => $category->taxonomy,
							'term' => $category->slug,
							'nopaging' => true
						));
						if ($posts) {						
							foreach($posts as $post): setup_postdata($post);
								include get_theme_file_path("templates/partials/resource-card.php");		
							endforeach;						
						} else { ?>
							<p class="no-resources">We currently have no resources for this category, please check back again soon.</p>
						<?php };						
						?>			
				<?php endforeach; ?>
			</section>

			*/?>
			<!-- END OF NEW RESOURCES -->

			<!-- START OF OLD RESOURCES -->
			<?php
			echo '<section class="wpdm-list">';
				$args = array(
					'post_type' => 'wpdmpro',
					'hide_empty' => 1,
					'tax_query' => array(
								'taxonomy' => 'wpdmcategory',
								
								'field'    => 'term_id',
								'terms'    => $category,                         
					),
					'posts_per_page'=> -1
				);
				$childCategories = get_terms("wpdmcategory", array('parent' => $category));
				foreach ($childCategories as $cat) :
								echo do_shortcode('[wpdm_category id="' . $cat->slug . '" operator="IN" title="1" toolbar="1" paging="0" orderby="field name" order="asc or desc" items_per_page="99" template=""]');
						wp_reset_postdata();
				endforeach;
			echo '</section>';
			 ?>
			 <!-- END OF OLD RESOURCES -->
			

		<?php } ?>


	<?php include get_theme_file_path("templates/partials/latest-news-cards.php"); ?>
	<?php include get_theme_file_path("templates/partials/follow-us.php"); ?>

<?php get_footer(); ?>