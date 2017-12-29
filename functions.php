<?php
/**
 * Warby functions and definitions
 *
 * @package Warby
 */

/**
 * The current version of the theme.
 */
define( 'WARBY_VERSION', '1.0.0' );

if ( ! function_exists( 'warby_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function warby_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Warby, use a find and replace
	 * to change 'warby' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'warby', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Registers navigation menus
	register_nav_menus( array(
		'top'		=> __( 'Top Menu', 'warby' ),
		'primary'	=> __( 'Primary Menu', 'warby' ),
		'footer'	=> __( 'Footer Menu', 'warby' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Post editor styles
	add_editor_style( 'editor-style.css' );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'gallery', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'warby_custom_background_args', array(
		'default-color' => 'f2f2f2',
		'default-image' => '',
	) ) );

	// Theme layouts
	add_theme_support(
		'theme-layouts',
		array(
			'single-column' => __( 'Single Column', 'warby' ),
			'narrow-column' => __( 'Narrow Column', 'warby' ),
			'sidebar-right' => __( 'Sidebar Right', 'warby' ),
			'sidebar-left' => __( 'Sidebar Left', 'warby' )
		),
		array( 'default' => 'sidebar-right' )
	);

	// Excerpt support needed for page showcase template
	add_post_type_support( 'page', 'excerpt' );

	// Support custom logo feature
	add_theme_support( 'custom-logo', array( 'size' => 'warby-showcase' ) );

}
add_action( 'after_setup_theme', 'warby_setup' );
endif; // warby_setup

if ( ! function_exists( 'warby_content_width' ) ) :
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function warby_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'warby_content_width', 720 );
}
add_action( 'after_setup_theme', 'warby_content_width', 0 );
endif;

if ( ! function_exists( 'warby_register_image_sizes' ) ) :
/*
 * Enables support for Post Thumbnails on posts and pages.
 *
 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
function warby_register_image_sizes() {

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 720, 1200 );

}
add_action( 'after_setup_theme', 'warby_register_image_sizes' );
endif;

if ( ! function_exists( 'warby_widgets_init' ) ) :
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function warby_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'warby' ),
		'id'            => 'primary',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'warby' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


}
endif;
add_action( 'widgets_init', 'warby_widgets_init' );

if ( ! function_exists( 'warby_body_fonts' ) ) :
/**
 * Enqueue web fonts.
 */
function warby_body_fonts() {

	// Google font URL to load
	$font_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Rubik, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$primary = _x( 'active', 'Roboto font: active or inactive', 'warby' );

	if ( 'inactive' !== $primary || 'inactive' !== $secondary ) :

		$font_families = array();

		if ( 'inactive' !== $primary ) {
			$font_families[] = 'Rubik:400italic,700italic,700,400';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$font_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	endif;

	// Load Google Fonts
	wp_enqueue_style( 'warby-body-fonts', $font_url, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'warby_body_fonts' );
endif;

if ( ! function_exists( 'warby_icon_fonts' ) ) :
/**
 * Enqueue icon fonts.
 */
function warby_icon_fonts() {

	// Icon Font
	wp_enqueue_style(
		'warby-icons',
		get_template_directory_uri() . '/assets/fonts/warby-icons.css',
		array(),
		'1.0.0'
	);

}
add_action( 'wp_enqueue_scripts', 'warby_icon_fonts' );
endif;

if ( ! function_exists( 'warby_styles' ) ) :
/**
 * Enqueue theme styles
 */
function warby_styles() {

	wp_enqueue_style(
		'warby-style',
		get_template_directory_uri() . '/css/style.min.css',
		array(),
		WARBY_VERSION
	);

	// Use style-rtl.css for RTL layouts
	wp_style_add_data(
		'warby-style',
		'rtl',
		'replace'
	);

}
endif;
add_action( 'wp_enqueue_scripts', 'warby_styles' );

if ( ! function_exists( 'warby_scripts' ) ) :
/**
 * Enqueue theme scripts
 */
function warby_scripts() {

	// FitVids Script conditionally enqueued from inc/extras.php
	wp_register_script(
		'warby-fitvids',
		get_template_directory_uri() . '/js/jquery.fitvids.min.js',
		array( 'jquery' ),
		WARBY_VERSION,
		true
	);

	wp_enqueue_script(
		'warby-scripts',
		get_template_directory_uri() . '/js/warby.min.js',
		array( 'jquery' ),
		WARBY_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
endif;
add_action( 'wp_enqueue_scripts', 'warby_scripts' );

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Add customizer options.
require get_template_directory() . '/inc/customizer.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/inc/mods.php';

// JetPack.
require get_template_directory() . '/inc/jetpack.php';
