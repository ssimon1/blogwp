<?php
/**
 * Doyel Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Doyel Blog
 */

if ( ! defined( 'DOYEL_BLOG_VERSION' ) ) {
	$doyel_blog_theme = wp_get_theme();
	define( 'DOYEL_BLOG_VERSION', $doyel_blog_theme->get( 'Version' ) );
}


/**
 * Enqueue scripts and styles.
 */
function doyel_blog_scripts() {
    wp_enqueue_style( 'doyel-wp-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','doyel-default-block','doyel-style'), '', 'all');
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style( 'doyel-wp-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), DOYEL_BLOG_VERSION, 'all');
}
add_action( 'wp_enqueue_scripts', 'doyel_blog_scripts' );

/**
 * Custom excerpt length.
 */
function doyel_blog_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 36;
}
add_filter( 'excerpt_length', 'doyel_blog_excerpt_length', 999 );

/** Welcome Page * */
require get_stylesheet_directory() . '/welcome/welcome.php';