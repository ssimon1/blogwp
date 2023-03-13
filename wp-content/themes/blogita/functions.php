<?php
/**
 * Blogita functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blogita
 */

if ( ! defined( 'BLOGITA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BLOGITA_VERSION', '1.0.3' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blogita_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Blogita, use a find and replace
		* to change 'blogita' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'blogita', get_template_directory() . '/languages' );

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
			'primary-menu' => esc_html__( 'Primary Menu', 'blogita' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'blogita' ),
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
			'blogita_custom_background_args',
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

	// add editor style
	add_editor_style( '/assets/css/editor-style.css' );

	// align wide
	add_theme_support( "align-wide" );

	// responsive embeds
	add_theme_support( "responsive-embeds" );

	add_theme_support( 'register_block_style' );

	add_theme_support( 'register_block_pattern' );

	// blog style
	add_theme_support( "wp-block-styles" );

	// Post Format
	add_theme_support( 'post-formats', array('gallery', 'video', 'audio', 'image', 'quote'));

	// Images
	add_image_size( 'blogita-square', 400, 400, true );
	add_image_size( 'blogita-portrait', 300, 400, true );
	add_image_size( 'blogita-landscape', 400, 300, true );

}
add_action( 'after_setup_theme', 'blogita_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blogita_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blogita_content_width', 640 );
}
add_action( 'after_setup_theme', 'blogita_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogita_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'blogita' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'blogita' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'blogita_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blogita_scripts() {
	wp_enqueue_style( 'poppins', '//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/all.min.css' , array(), '1.0' );
	wp_enqueue_style( 'bootsrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0' );
	wp_enqueue_style( 'swpper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '1.0' );
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.min.css', array(), '1.0' );
	wp_enqueue_style( 'blogita-master', get_template_directory_uri() . '/assets/css/master.css', array(), BLOGITA_VERSION );
	wp_enqueue_style( 'blogita-style', get_stylesheet_uri(), array(), BLOGITA_VERSION );
	wp_style_add_data( 'blogita-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
	wp_enqueue_script( 'bootsrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '1.0', true );
	wp_enqueue_script( 'swipper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '1.0', true );
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array(), '1.0', true );
	wp_enqueue_script( 'blogita-main', get_template_directory_uri() . '/assets/js/main.js', array(), BLOGITA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blogita_scripts' );

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


/**
 * Remove protected text from protected post title
 */
function blogita_remove_protected_text() {
	return "%s";
}
add_action( 'protected_title_format', 'blogita_remove_protected_text' );


/**
 * Attachments Plugin default reset
 */
if ( class_exists( 'Attachments' ) ) {
	require_once get_template_directory() . '/lib/attachments.php';
}


/**
 * Search Highlight
 */
 function blogita_search_highlight( $blogita_text ) {
	if(is_search()){
		$blogita_pattern = '/('. join('|', explode(' ', get_search_query())).')/i';
		$blogita_text = preg_replace($blogita_pattern, '<span class="search-highlight">\0</span>', $blogita_text);
	}
	return $blogita_text;
 }
 add_filter( 'the_title', 'blogita_search_highlight' );
 add_filter( 'the_excerpt', 'blogita_search_highlight' );
 add_filter( 'the_content', 'blogita_search_highlight' );


// TGM
include_once get_template_directory() . '/inc/active-plugin.php';


// Kirki Customizer
require_once get_template_directory() . '/inc/kirki-customizer.php';


// Modify Comments
function blogita_comment_fields( $fields ) {
	$comment_field = $fields['comment'];
	$cookies_field = $fields['cookies'];

	unset( $fields['comment'] );
	unset( $fields['cookies'] );

	$fields['comment'] = $comment_field;
	$fields['cookies'] = $cookies_field;

	return $fields;
}
add_filter( 'comment_form_fields', 'blogita_comment_fields' );


function blogita_change_comment_title( $defaults ){
  $defaults['title_reply'] = __('Add a Comment', 'blogita');
  return $defaults;
}
add_filter( 'comment_form_defaults', 'blogita_change_comment_title' );

// Add ACF
include_once get_template_directory() . '/inc/acf-fields.php';

add_filter( 'acf/settings/show_admin', '__return_false' );
