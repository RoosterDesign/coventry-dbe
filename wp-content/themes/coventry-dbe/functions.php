<?php
/**
 * coventry-dbe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package coventry-dbe
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'coventry_dbe_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function coventry_dbe_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on coventry-dbe, use a find and replace
		 * to change 'coventry-dbe' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'coventry-dbe', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'coventry-dbe' ),
				'footer-menu' => esc_html__( 'Footer', 'coventry-dbe' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'coventry_dbe_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'coventry_dbe_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coventry_dbe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'coventry_dbe_content_width', 640 );
}
add_action( 'after_setup_theme', 'coventry_dbe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coventry_dbe_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'coventry-dbe' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'coventry-dbe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'coventry_dbe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coventry_dbe_scripts() {
	wp_enqueue_style( 'coventry-dbe-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'coventry-dbe-style', 'rtl', 'replace' );

	/* Google Fonts */	
	wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap', false );
	
	

	/* jQuery */
	wp_enqueue_script( 'coventry-dbe-jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), _S_VERSION, true );

	

	// wp_enqueue_script( 'coventry-dbe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Owl Carousel */
	wp_enqueue_script( 'coventry-dbe-owlcarousel', get_template_directory_uri() . '/js/vendor/owl.carousel.js', array('coventry-dbe-jquery'), null, true );

	/* Global Scripts */
	wp_enqueue_script( 'coventry-dbe-global', get_template_directory_uri() . '/js/global.js', array(), _S_VERSION, true );

	/* Homepage Carousel */
	if ( is_page_template( 'templates/homepage.php' ) ) {
		wp_enqueue_script( 'coventry-dbe-home', get_template_directory_uri() . '/js/home.js', array(), _S_VERSION, true );
	}

}
add_action( 'wp_enqueue_scripts', 'coventry_dbe_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* Limit number of words in post exceprt */

function get_excerpt($limit){
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace(" ([.*?])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $limit);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'...';
	/*$excerpt = $excerpt.'... <a href="'.get_the_permalink().'">more</a>';*/
	return $excerpt;
	}


	/* Blog post thumbnails */
	if ( function_exists( 'add_theme_support' ) ) {
		set_post_thumbnail_size( 360, 240, true ); // default Featured Image dimensions (cropped)

		// additional image sizes
		// delete the next line if you do not need additional image sizes
		// add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)
	}