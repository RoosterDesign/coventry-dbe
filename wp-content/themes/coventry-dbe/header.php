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

		<a href="/" class="siteHeader__logo">
			<img src="<?php echo get_option('site_logo'); ?>" alt="Diocesan Board of Education" />
		</a>

		<div class="hamburger"><div class="hamburger-box"><div class="hamburger-inner"></div></div></div>

		<nav class="mainNav" role="navigation" aria-label="Main Navigation">
			<?php wp_nav_menu( array( 'menu' => 'main-menu', 'container' => 'ul', )); ?>
		</nav>

	</div>
</header>
<div id="pageContent">	
<? /*

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'coventry-dbe' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$coventry_dbe_description = get_bloginfo( 'description', 'display' );
			if ( $coventry_dbe_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $coventry_dbe_description; ?></p>
			<?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'coventry-dbe' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
			
		</nav>
	</header>

*/ ?>