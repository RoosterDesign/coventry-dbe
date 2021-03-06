<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="siteHeader">
	<div class="container">

		<a href="/" class="siteHeader__logo" title="Diocesan Board of Education">
			<img src="<?php echo get_option('site_logo'); ?>" alt="Diocesan Board of Education" />
		</a>

		<div class="hamburger"><div class="hamburger-box"><div class="hamburger-inner"></div></div></div>

		<nav class="mainNav" role="navigation" aria-label="Main Navigation">
			<?php wp_nav_menu( array( 'menu' => 'main-menu', 'container' => 'ul', )); ?>
		</nav>

	</div>
</header>
<div id="pageContent">	