<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

/**
 * Initialize theme setup
 */
require get_template_directory() . '/inc/init-setup.php';

/**
 * Initialize theme functions
 */
require get_template_directory() . '/inc/init-functions.php';

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
  if ( WP_ENV !== 'development' ) {
    wp_enqueue_style( '_s-style', get_template_directory_uri() . '/assets/css/style.min.css' );
  } else {
    wp_enqueue_style( '_s-style', get_template_directory_uri() . '/assets/css/style.css' );
  }

  /* Modernizr */
  wp_enqueue_script( '_s-modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array(), '', false );
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );
