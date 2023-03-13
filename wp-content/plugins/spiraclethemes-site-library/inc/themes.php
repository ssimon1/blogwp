<?php
/**
 *
 * @package spiraclethemes-site-library
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) :
    die;
endif;


if ('own-shop' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/own-shop-functions.php';
    // helper functions
    require_once SPIR_SITE_LIBRARY_PATH . '/elements/own-shop/helper-functions.php';
    // Widget Category
    require_once SPIR_SITE_LIBRARY_PATH . '/elements/own-shop/widget-category.php';
endif;
if ('purea-magazine' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/purea-magazine-functions.php';
endif;
if ('colon' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/colon-functions.php';
endif;
if ('somalite' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/somalite-functions.php';
endif;
if ('purea-fashion' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/purea-fashion-functions.php';
endif;
if ('own-store' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/own-store-functions.php';
    // helper functions
    require_once SPIR_SITE_LIBRARY_PATH . '/elements/own-shop/helper-functions.php';
    // Widget Category
    require_once SPIR_SITE_LIBRARY_PATH . '/elements/own-shop/widget-category.php';
endif;
if ('colon-plus' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/colon-plus-functions.php';
endif;
if ('own-shop-lite' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/own-shop-lite-functions.php';
    // helper functions
    require_once SPIR_SITE_LIBRARY_PATH . '/elements/own-shop/helper-functions.php';
    // Widget Category
    require_once SPIR_SITE_LIBRARY_PATH . '/elements/own-shop/widget-category.php';
endif;
if ('mestore' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/mestore-functions.php';
endif;

if ('blogson' == $this->theme_slug || 'blogson-child' == $this->theme_slug ) :
    require_once SPIR_SITE_LIBRARY_PATH . '/inc/blogson-functions.php';
    // helper functions
    require_once SPIR_SITE_LIBRARY_PATH . '/elements/blogson/helper-functions.php';
    // Widget Category
    require_once SPIR_SITE_LIBRARY_PATH . '/elements/blogson/widget-category.php';
endif;