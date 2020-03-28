<?php
/**
 * iconwp functions and definitions
 *
 * @package iconwp
 */
require get_template_directory() . '/inc/excerpts.php';
require get_template_directory() . '/inc/widget.php';

if ( ! function_exists( 'iconwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function iconwp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on iconwp, use a find and replace
	 * to change 'iconwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'iconwp', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'iconwp-widget-post-thumb',  400);
	add_image_size( 'iconwp-home-post-thumb',  700, 513 , true );
	add_image_size( 'iconwp-home-page-thumb',  500, 500 , true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'iconwp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'iconwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // iconwp_setup
add_action( 'after_setup_theme', 'iconwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!function_exists( 'iconwp_content_width' ) ) :
	function iconwp_content_width() {
		global $content_width;
		if (!isset($content_width))
			$content_width = 640; /* pixels */
	}
endif;
add_action( 'after_setup_theme', 'iconwp_content_width' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function iconwp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'iconwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer One', 'iconwp' ),
		'id' => 'footer-one-widget',
		'before_widget' => '<div id="footer-one" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Two', 'iconwp' ),
		'id' => 'footer-two-widget',
		'before_widget' => '<div id="footer-two" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Three', 'iconwp' ),
		'id' => 'footer-three-widget',
		'before_widget' => '<div id="footer-three" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'iconwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function iconwp_scripts() {
	global $wp_scripts;
	
	wp_enqueue_script( 'iconwp-responsive-js', get_template_directory_uri() . '/js/responsive.js', array( 'jquery' ) );
	wp_enqueue_script( 'iconwp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'iconwp-ie', get_template_directory_uri() . "/js/html5shiv.js");
	$wp_scripts->add_data( 'iconwp-ie', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'iconwp-ie-responsive', get_template_directory_uri() . "/js/ie-responsive.js");
	$wp_scripts->add_data( 'iconwp-ie-responsive', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'iconwp-responsive', get_template_directory_uri() .'/css/responsive.css', array(), false ,'screen' );
	wp_enqueue_style( 'iconwp-font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css' );
	wp_enqueue_style('wp_macchiato_googleFonts', '//fonts.googleapis.com/css?family=Lato|open+sans:300,400,800');
	
	wp_enqueue_style( 'iconwp-style', get_stylesheet_uri() );
		
	wp_enqueue_script( 'iconwp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'iconwp_scripts' );


//====================================Breadcrumbs=============================================================================================
function iconwp_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $fanzone_act = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $fanzone_act as $fanzone_inherit ) {
                    $output = '<li><a href="'.get_permalink($fanzone_inherit).'" title="'.get_the_title($fanzone_inherit).'">'.get_the_title($fanzone_inherit).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    echo '</ul>';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
