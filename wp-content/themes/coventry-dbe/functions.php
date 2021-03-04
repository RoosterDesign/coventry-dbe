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
	wp_enqueue_style( 'add_google_fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300;1,400;0,500;0,600;1,400&display=swap', false );
	
	

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
		add_image_size( 'post-img', 650, 9999 );
		add_image_size( 'featured-post-thumb', 785, 530 );
		add_image_size( 'home-carousel', 1200, 500, true );
		add_image_size( 'home-intro', 650, 9999 );
		add_image_size( 'team-photo', 545, 545 );
		add_image_size( 'masthead-bg', 1920, 500, true );
	}


/* Custom Post Types */

function wporg_custom_post_type() {
	register_post_type('wporg_product',
			array(
					'labels'      => array(
							'name'          => __('Products', 'textdomain'),
							'singular_name' => __('Product', 'textdomain'),
					),
							'public'      => true,
							'has_archive' => true,
			)
	);
}
add_action('init', 'wporg_custom_post_type');


/* Sitewide Options Page */

add_action('admin_menu', 'awesome_page_create');
function awesome_page_create() {
    $page_title = 'Sitewide Settings';
    $menu_title = 'Sitewide Settings';
    $capability = 'edit_posts';
    $menu_slug = 'sitewide_settings';
    $function = 'sitewide_settings_display';
    $icon_url = '';
    $position = 30;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

		function sitewide_settings_display() {
			
			/* Site Logo */
			if (isset($_POST['site_logo'])) {
				$site_logo = $_POST['site_logo'];
				update_option('site_logo', $site_logo);
			}
			$site_logo = get_option('site_logo', '');

			/* Site Logo (White) */
			if (isset($_POST['site_logo_white'])) {
				$site_logo_white = $_POST['site_logo_white'];
				update_option('site_logo_white', $site_logo_white);
			}
			$site_logo_white = get_option('site_logo_white', '');

			/* Facebook Social Link */
			if (isset($_POST['facebook_link'])) {
					$facebook_link = $_POST['facebook_link'];
					update_option('facebook_link', $facebook_link);
			}
			$facebook_link = get_option('facebook_link', '');

			/* Twitter Social Link */
			if (isset($_POST['twitter_link'])) {
					$twitter_link = $_POST['twitter_link'];
					update_option('twitter_link', $twitter_link);
			}
			$twitter_link = get_option('twitter_link', '');

			/* Instagram Social Link */
			if (isset($_POST['instagram_link'])) {
					$instagram_link = $_POST['instagram_link'];
					update_option('instagram_link', $instagram_link);
			}
			$instagram_link = get_option('instagram_link', '');

			/* Address Label */
			if (isset($_POST['address_label'])) {
					$address_label = $_POST['address_label'];
					update_option('address_label', $address_label);
			}
			$address_label = get_option('address_label', '');

			/* Address */
			if (isset($_POST['address'])) {
					$address = $_POST['address'];
					update_option('address', $address);
			}
			$address = get_option('address', '');

			/* Message after address (footer) */
			if (isset($_POST['address_post_msg'])) {
					$address_post_msg = $_POST['address_post_msg'];
					update_option('address_post_msg', $address_post_msg);
			}
			$address_post_msg = get_option('address_post_msg', '');

			/* Message after address (footer) - 1st Line */
			if (isset($_POST['footer_strapline'])) {
				$footer_strapline = $_POST['footer_strapline'];
				update_option('footer_strapline', $footer_strapline);
			}
			$footer_strapline = get_option('footer_strapline', '');

			/* Professional Development Card Link Icon */
			if (isset($_POST['prodev_linkIcon'])) {
				$prodev_linkIcon = stripslashes($_POST['prodev_linkIcon']);
				update_option('prodev_linkIcon', $prodev_linkIcon);
			}
			$prodev_linkIcon = get_option('prodev_linkIcon', '');
			
			/* Professional Development Card Link Label */
			if (isset($_POST['prodev_linkText'])) {
				$prodev_linkText = $_POST['prodev_linkText'];
				update_option('prodev_linkText', $prodev_linkText);
			}
			$prodev_linkText = get_option('prodev_linkText', '');

			/* Resource Card Link Icon */
			if (isset($_POST['resource_linkIcon'])) {
				$resource_linkIcon = stripslashes($_POST['resource_linkIcon']);
				update_option('resource_linkIcon', $resource_linkIcon);
			}
			$resource_linkIcon = get_option('resource_linkIcon', '');
			
			/* Resource Card Link Label */
			if (isset($_POST['resource_linkText'])) {
				$resource_linkText = $_POST['resource_linkText'];
				update_option('resource_linkText', $resource_linkText);
			}
			$resource_linkText = get_option('resource_linkText', '');

			/* Fallback Images */

			if (isset($_POST['staff_fallback_img'])) {
				$staff_fallback_img = $_POST['staff_fallback_img'];
				update_option('staff_fallback_img', $staff_fallback_img);
			}
			$staff_fallback_img = get_option('staff_fallback_img', '');

			if (isset($_POST['blog_fallback_img'])) {
				$blog_fallback_img = $_POST['blog_fallback_img'];
				update_option('blog_fallback_img', $blog_fallback_img);
			}
			$blog_fallback_img = get_option('blog_fallback_img', '');

			if (isset($_POST['featBlog_fallback_img'])) {
				$featBlog_fallback_img = $_POST['featBlog_fallback_img'];
				update_option('featBlog_fallback_img', $featBlog_fallback_img);
			}
			$featBlog_fallback_img = get_option('featBlog_fallback_img', '');
				
		?>

		<style>
		.settingsGroup {
			align-items: center;
			display: flex;
			margin-bottom: 30px;
		}

		.settingsGroup label {
			margin: 0;
			width: 150px;
		}

		.settingsGroup input,
		.settingsGroup textarea {
			width: 400px;
		}
		.settingsGroup textarea { height: 100px }
		</style>

			<h1>Sitewide Settings Page</h1>
			<br>
			<form method="POST">

					<h2>Branding</h2>
					<p>Upload to media library first and add link below.</p>
					<div class="settingsGroup">
						<label for="site_logo">Logo</label><br>
						<input type="text" name="site_logo" id="site_logo" value="<?php echo $site_logo; ?>">
					</div>	

					<div class="settingsGroup">
						<label for="site_logo_white">Logo White</label><br>
						<input type="text" name="site_logo_white" id="site_logo_white" value="<?php echo $site_logo_white; ?>">
					</div>

					<hr />

					<h2>Social</h2>
					<div class="settingsGroup">
						<label for="facebook_link">Facebook Link</label><br>
						<input type="text" name="facebook_link" id="facebook_link" value="<?php echo $facebook_link; ?>">
					</div>					
					<div class="settingsGroup">
						<label for="twitter_link">Twitter Link</label><br>
						<input type="text" name="twitter_link" id="twitter_link" value="<?php echo $twitter_link; ?>">
					</div>					
					<div class="settingsGroup">
						<label for="instagram_link">Instagram Link</label><br>
						<input type="text" name="instagram_link" id="instagram_link" value="<?php echo $instagram_link; ?>">
					</div>
					
					<hr />

					<h2>Footer</h2>
					<div class="settingsGroup">
						<label for="address_label">Address Label</label><br>
						<input type="text" name="address_label" id="address_label" value="<?php echo $address_label; ?>">
					</div>
					<div class="settingsGroup">
						<label for="address">Address</label><br>
						<input type="text" name="address" id="address" value="<?php echo $address; ?>">
					</div>
					<div class="settingsGroup">
						<label for="address_post_msg">Text after address</label><br>
						<input type="text" name="address_post_msg" id="address_post_msg" value="<?php echo $address_post_msg; ?>">
					</div>
					<div class="settingsGroup">
						<label for="footer_strapline">Footer Strapline</label><br>						
						<textarea name="footer_strapline" id="footer_strapline" cols="30" rows="10"><?php echo $footer_strapline; ?></textarea>
					</div>

					<hr />

					<h2>Professional Development</h2>
					<div class="settingsGroup">
						<label for="prodev_linkIcon">Link Icon</label><br>
						<textarea name="prodev_linkIcon" id="prodev_linkIcon" cols="30" rows="10"><?php echo $prodev_linkIcon; ?></textarea>
					</div>
					<div class="settingsGroup">
						<label for="prodev_linkText">Link text</label><br>
						<input type="text" name="prodev_linkText" id="prodev_linkText" value="<?php echo $prodev_linkText; ?>">
					</div>

					<hr />

					<h2>Resources</h2>
					<div class="settingsGroup">
						<label for="resource_linkIcon">Link Icon</label><br>
						<textarea name="resource_linkIcon" id="resource_linkIcon" cols="30" rows="10"><?php echo $resource_linkIcon; ?></textarea>
					</div>
					<div class="settingsGroup">
						<label for="resource_linkText">Link text</label><br>
						<input type="text" name="resource_linkText" id="resource_linkText" value="<?php echo $resource_linkText; ?>">
					</div>

					<hr />

					<h2>Fallback Images</h2>
					<div class="settingsGroup">
						<label for="staff_fallback_img">Staff Fallback Image</label><br>
						<input type="text" name="staff_fallback_img" id="staff_fallback_img" value="<?php echo $staff_fallback_img; ?>">
					</div>	

					<div class="settingsGroup">
						<label for="blog_fallback_img">Bloc Fallback Image</label><br>
						<input type="text" name="blog_fallback_img" id="blog_fallback_img" value="<?php echo $blog_fallback_img; ?>">
					</div>	

					<div class="settingsGroup">
						<label for="featBlog_fallback_img">Featured Blog Fallback Image</label><br>
						<input type="text" name="featBlog_fallback_img" id="featBlog_fallback_img" value="<?php echo $featBlog_fallback_img; ?>">
					</div>	

					<hr />

    			<input type="submit" value="Save" class="button button-primary button-large">
			</form>

		<?php }

}


/* Remove P tags from media images */
/*
Plugin Name: Image P tag remover
Description: Plugin to remove p tags from around images in content outputting, after WP autop filter has added them. (oh the irony)
Version: 1.0
Author: Fublo Ltd
Author URI: http://fublo.net/
*/

function filter_ptags_on_images($content)
{
    // do a regular expression replace...
    // find all p tags that have just
    // <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
    // replace it with just the image tag...
    return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}

// we want it to be run after the autop stuff... 10 is default.
add_filter('the_content', 'filter_ptags_on_images');