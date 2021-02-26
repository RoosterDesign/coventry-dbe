<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventry-dbe
 */

get_header();
?>


<div class="masthead">
	<div class="container">
		<h1 class="title -hasIcons">
			Latest news and stories
			<?php include get_theme_file_path("templates/partials/social-icons.php"); ?>
		</h1> 
	</div>
</div>



<?php
	$args = array( 'posts_per_page' => 1, 'post_type' => 'post' );
	$post_query = new WP_Query($args);            
	if($post_query->have_posts() ) { while($post_query->have_posts() ) { $post_query->the_post();
		include get_theme_file_path("templates/partials/feature-news-post.php");
	} }
?>

<hr class="hr -no-m-top" />

<div class="latestNewsCards container">
	<?php
		$current_page = get_query_var('paged');
		$current_page = max( 1, $current_page );
		$per_page = 3;
		$offset_start = 1;
		$offset = ( $current_page - 1 ) * $per_page + $offset_start;
		$post_list = new WP_Query(array(
				'cat'            => -15,
				'posts_per_page' => $per_page,
				'paged'          => $current_page,
				'offset'         => $offset,
				'orderby'        => 'date',
				'order'          => 'DESC',
		));
		$total_rows = max( 0, $post_list->found_posts - $offset_start );
		$total_pages = ceil( $total_rows / $per_page );
		if ( $post_list->have_posts() ):
			while ( $post_list->have_posts() ):
				$post_list->the_post();
				include get_theme_file_path("templates/partials/news-post-card.php");
			endwhile; ?>

			<div class="pagination">

				<?php echo paginate_links( array(
						'total'   => $total_pages,
						'current' => $current_page,
				) ); ?>

			</div>

		<?php endif; wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>
