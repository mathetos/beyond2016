<?php
/**
 * Enqueue script for custom customize control.
 */

function beyond2016_customizer_enqueue() {
	wp_enqueue_script( 'beyond2016-customizer', get_template_directory_uri() . '/assets/js/source/beyond2016-customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'beyond2016_customizer_enqueue' );

add_filter( 'body_class', 'matt2016_header_body_classess' );
function matt2016_header_body_classess($classes) {
   $headeralignment = get_theme_mod( 'header_alignment' );
   $headerlayout = get_theme_mod( 'header_layout' );
   $headerimgpos = get_theme_mod( 'header_image_position' );
   switch ($headeralignment) {
     case '0' :
      $classes[] = 'header-left';
      break;
     case '1' :
      $classes[] = 'header-center';
      break;
     case '2' :
      $classes[] = 'header-right';
      break;
     default :
      $classes[] = 'header-left';
   }
   switch ($headerimgpos) {
     case '0' :
      $classes[] = 'header-image-above';
      break;
     case '1' :
      $classes[] = 'header-image-below';
      break;
     case '2' :
      $classes[] = 'header-image-behind';
      break;
     default :
      $classes[] = 'header-image-below';
   }
   return $classes;
 }
