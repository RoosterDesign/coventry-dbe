<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package coventry-dbe
 */

get_header();
?>	
	<div style="background-image: url('/wp-content/uploads/2021/02/404.jpg)" class="hero"></div>
	<div class="container">
		<main class="main">			
			<h1 class="title">Error 404</h1>
			<h2 class="subTitle">Sorry, that page cannot be found.</h2>
			<p>To return to the homepage, <a href="/" alt="Diocesan Board of Education">click here</a>.</p>
		</main>
	</div>
<?php get_footer(); ?>