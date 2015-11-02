<?php
/**
 * Matt2016 Theme Functions
 */

//Globals
define( 'MATT2016_PATH', get_stylesheet_directory( __FILE__ ) );

define( 'MATT2016_URL', get_stylesheet_directory_uri( __FILE__ ) );

include_once('functions/cleanup_customizer.php');

if (class_exists('Easy_Digital_Downloads')) {

  //include_once('functions/edd/edd-functions.php');

}

/*
 * Enqueue the parent style.css
 *
 * twentyfifteen parent theme for twentfifteen-child
 *
 */
add_action( 'wp_enqueue_scripts', 'matt2016_theme_enqueue_styles' );
function matt2016_theme_enqueue_styles() {

    // Parent style variable
    $parent_style = 'twentysixteen-style';
    // Enqueue Parent theme's style
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    // Enqueue Child theme's style and ensure it is
    // Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
    wp_enqueue_style( 'matt2016-main', get_stylesheet_directory_uri() . '/main.css', array( $parent_style ) );
}
