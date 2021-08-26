<?php
/**
 * Myphotography functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package myphotography
 */

if ( ! defined( 'MYPHOTOGRAPHY_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MYPHOTOGRAPHY_VERSION', '1.5' );
}

if ( ! function_exists( 'myphotography_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function myphotography_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on myphotography, use a find and replace
		 * to change 'myphotography' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'myphotography', get_template_directory() . '/languages' );

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
				'main-menu' => esc_html__( 'Primary', 'myphotography' ),
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
				'myphotography_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for gallery, image, and video.
		add_theme_support( 
			'post-formats', 
			array(
				'image',
				'gallery',
				'video', 
			) 
		);

		// Add theme support for dark editor style.
		add_theme_support( 'editor-styles' );
		add_theme_support( 'dark-editor-style' );

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
				'height'      => 100,
				'width'       => 200,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}

endif;
add_action( 'after_setup_theme', 'myphotography_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function myphotography_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'myphotography_content_width', 1200 );
}
add_action( 'after_setup_theme', 'myphotography_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function myphotography_scripts() {
	wp_enqueue_style( 'myphotography-bootstrap', get_template_directory_uri() . '/css/style.css', array(), MYPHOTOGRAPHY_VERSION );
	wp_enqueue_style( 'myphotography-fontawesome', get_template_directory_uri() . '/css/fontawesome.css', array(), MYPHOTOGRAPHY_VERSION );
	wp_enqueue_style( 'myphotography-style', get_stylesheet_uri(), array(), MYPHOTOGRAPHY_VERSION );
	
	wp_style_add_data( 'myphotography-style', 'rtl', 'replace' );

	wp_enqueue_script( 'myphotography-header-js', get_template_directory_uri() . '/js/single.js', array( 'jquery' ), MYPHOTOGRAPHY_VERSION, false );
	wp_enqueue_script( 'myphotography-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), MYPHOTOGRAPHY_VERSION, true );
	wp_enqueue_script( 'myphotography-imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'jquery' ), MYPHOTOGRAPHY_VERSION, true );
	wp_enqueue_script( 'myphotography-masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), MYPHOTOGRAPHY_VERSION, true );
	wp_enqueue_script( 'myphotography-masonry-grid', get_template_directory_uri() . '/js/masonry-grid.js', array( 'jquery', 'myphotography-masonry-js' ), MYPHOTOGRAPHY_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'myphotography_scripts' );

/**
 * Custom header image and color
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
 * Theme Settings page
 */
require get_template_directory() . '/inc/myphotography-settings.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 *  Bootstrap 5 Nav Walker class
 * */
require_once get_template_directory() . '/inc/class-myphotography-wp-nav-menu-walker.php';


/**
 * 
 * Add social links to main menu navigation.
 * 
 * @param string $items to get exsiting items and append to them the social media links.
 * @param array  $args to get menu details such as location.
 * 
 * @return string $items
 */
function myphotography_add_social_links( $items, $args ) {
		
		$fb = get_option( 'mp_facebook_url' );
		$ig = get_option( 'mp_instagram_url' );
		$tw = get_option( 'mp_twitter_url' );
		$li = get_option( 'mp_linkedin_url' );

	if ( 'main-menu' === $args->theme_location ) {
		if ( '' !== $fb ) {
			$items .= '<li class="nav-item" ><a class="nav-link" href="' . $fb . '" target="_blank"><i class="fab fa-facebook"></i></a></li>';
		}
		if ( '' !== $ig ) {
			$items .= '<li class="nav-item" ><a class="nav-link" href="' . $ig . '" target="_blank"><i class="fab fa-instagram"></i></a></li>';
		}
		if ( '' !== $tw ) {
			$items .= '<li class="nav-item" ><a class="nav-link" href="' . $tw . '" target="_blank"><i class="fab fa-twitter"></i></a></li>';
		} 
		if ( '' !== $li ) {
			$items .= '<li class="nav-item" ><a class="nav-link" href="' . $li . '" target="_blank"><i class="fab fa-linkedin"></i></a></li>';
		}                  
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'myphotography_add_social_links', 10, 2 );



