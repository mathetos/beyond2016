<?php
/**
 * Matt2016 Theme Functions
 */
define( 'JETPACK_DEV_DEBUG', true);
add_theme_support( 'customize-partial-refresh-widgets' );
add_filter( 'customize_widget_partial_refreshable', '__return_true' );

//Globals
define( 'MATT2016_PATH', get_stylesheet_directory( __FILE__ ) );
define( 'MATT2016_URL', get_stylesheet_directory_uri( __FILE__ ) );
define( 'MATT2016_VERSION', 0.9 );


include_once('functions/customizer_settings.php');
include_once('functions/customizer_functions.php');

if (class_exists('Easy_Digital_Downloads')) {

  //include_once('functions/edd/edd-functions.php');

}

/*
 * Enqueue the parent style.css
 *
 * Enqueue the child styles depending on WP_DEBUG
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
    if (WP_DEBUG == true) :
      $random = mt_rand();
      wp_enqueue_style( 'matt2016-main', get_stylesheet_directory_uri() . '/assets/styles/build/main.css', array( $parent_style ), $random );
    else :
      wp_enqueue_style( 'matt2016-main', get_stylesheet_directory_uri() . '/main.css', array( $parent_style ), MATT2016_VERSION, all );
    endif;
}
