<?php
/**
 * Tortuga functions and definitions
 *
 * @package Tortuga
 */

/**
 * Tortuga only works in WordPress 4.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) :
	require get_template_directory() . '/inc/back-compat.php';
endif;


if ( ! function_exists( 'tortuga_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tortuga_setup() {

	// Make theme available for translation. Translations can be filed in the /languages/ directory.
	load_theme_textdomain( 'tortuga', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	
	// Set detfault Post Thumbnail size
	set_post_thumbnail_size( 900, 400, true );

	// Register Navigation Menu
	register_nav_menu( 'primary', esc_html__( 'Main Navigation', 'tortuga' ) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tortuga_custom_background_args', array( 'default-color' => 'dddddd' ) ) );
	
	// Set up the WordPress core custom logo feature
	add_theme_support( 'custom-logo', apply_filters( 'tortuga_custom_logo_args', array(
		'height' => 50,
		'width' => 250,
		'flex-height' => true,
		'flex-width' => true,
	) ) );
	
	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'tortuga_custom_header_args', array(
		'header-text' => false,
		'width'	=> 1920,
		'height' => 480,
		'flex-height' => true
	) ) );
	
	// Add Theme Support for wooCommerce
	add_theme_support( 'woocommerce' );
	
	// Add extra theme styling to the visual editor
	add_editor_style( array( 'css/editor-style.css', tortuga_google_fonts_url() ) );
	
}
endif; // tortuga_setup
add_action( 'after_setup_theme', 'tortuga_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tortuga_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tortuga_content_width', 840 );
}
add_action( 'after_setup_theme', 'tortuga_content_width', 0 );


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tortuga_widgets_init() {
	
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'tortuga' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Appears on posts and pages except full width template.', 'tortuga' ),
		'before_widget' => '<div class="widget-wrap"><aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside></div>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	
	register_sidebar( array(
		'name' => esc_html__( 'Header', 'tortuga' ),
		'id' => 'header',
		'description' => esc_html__( 'Appears on header area. You can use a search or ad widget here.', 'tortuga' ),
		'before_widget' => '<aside id="%1$s" class="header-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="header-widget-title">',
		'after_title' => '</h4>',
	));
	
	register_sidebar( array(
		'name' => esc_html__( 'Magazine Homepage', 'tortuga' ),
		'id' => 'magazine-homepage',
		'description' => esc_html__( 'Appears on Magazine Homepage template only. You can use the Magazine Posts widgets here.', 'tortuga' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));
	
} // tortuga_widgets_init
add_action( 'widgets_init', 'tortuga_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function tortuga_scripts() {

	// Get Theme Version
	$theme_version = wp_get_theme()->get( 'Version' );
	
	// Register and Enqueue Stylesheet
	wp_enqueue_style( 'tortuga-stylesheet', get_stylesheet_uri(), array(), $theme_version );
	
	// Register Genericons
	wp_enqueue_style( 'tortuga-genericons', get_template_directory_uri() . '/css/genericons/genericons.css', array(), '3.4.1' );
	
	// Register and Enqueue HTML5shiv to support HTML5 elements in older IE versions
	wp_enqueue_script( 'tortuga-html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'tortuga-html5shiv', 'conditional', 'lt IE 9' );

	// Register and enqueue navigation.js
	wp_enqueue_script( 'tortuga-jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20160421' );
	
	// Register and Enqueue Google Fonts
	wp_enqueue_style( 'tortuga-default-fonts', tortuga_google_fonts_url(), array(), null );

	// Register Comment Reply Script for Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
} // tortuga_scripts
add_action( 'wp_enqueue_scripts', 'tortuga_scripts' );


/**
 * Retrieve Font URL to register default Google Fonts
 */
function tortuga_google_fonts_url() {
    
	// Set default Fonts
	$font_families = array( 'Open Sans:400,400italic,700,700italic', 'Titillium Web:400,400italic,700,700italic' );

	// Build Fonts URL
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return apply_filters( 'tortuga_google_fonts_url', $fonts_url );
}


/**
 * Add custom sizes for featured images
 */
function tortuga_add_image_sizes() {
	
	// Add Slider Image Size
	add_image_size( 'tortuga-slider-image', 780, 420, true );
	
	// Add different thumbnail sizes for Magazine Posts widgets
	add_image_size( 'tortuga-thumbnail-small', 120, 80, true );
	add_image_size( 'tortuga-thumbnail-medium', 360, 200, true );
	add_image_size( 'tortuga-thumbnail-large', 600, 330, true );
	
}
add_action( 'after_setup_theme', 'tortuga_add_image_sizes' );


/**
 * Include Files
 */
 
// include Theme Info page
require get_template_directory() . '/inc/theme-info.php';

// include Theme Customizer Options
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include Extra Functions
require get_template_directory() . '/inc/extras.php';

// include Template Functions
require get_template_directory() . '/inc/template-tags.php';

// Include support functions for Theme Addons
require get_template_directory() . '/inc/addons.php';

// Include Post Slider Setup
require get_template_directory() . '/inc/slider.php';

// include Widget Files
require get_template_directory() . '/inc/widgets/widget-magazine-posts-boxed.php';
require get_template_directory() . '/inc/widgets/widget-magazine-posts-columns.php';
require get_template_directory() . '/inc/widgets/widget-magazine-posts-grid.php';