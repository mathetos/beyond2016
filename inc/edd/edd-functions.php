<?php
/*
 *  Functions specific to Easy Digital Downloads
 *  Will only be called IF EDD is Activated
 *
 */

// Conditionally load EDD Specific Styles
add_action( 'wp_enqueue_scripts', 'matt2016_enqueue_edd_styles', 99 );

function matt2016_enqueue_edd_styles() {

  if(is_singular('download')) {
    wp_enqueue_style( 'matt2016-edd-styles', get_stylesheet_directory_uri() . '/edd-styles.css', array( 'matt2016-main' ) );
  }

}

// Add specific CSS class by filter
add_filter( 'body_class', 'edd_body_class' );

function edd_body_class( $classes ) {
  if (is_singular('download')) {
   // add 'class-name' to the $classes array
  	$classes[] = 'no-sidebar';
  	// return the $classes array
  	return $classes;
  }
}

/*
*  Remove buy button from bottom of Single Download page
*/

// remove the standard button that shows after the download's content
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );

// our own function to output the button
function matt2016_remove_purchase_link( $download_id ) {
  if ( ! get_post_meta( $download_id, '_edd_hide_purchase_link', true ) ) {
  	echo '';
  }
}
// rehook/add our function back to the same location as before
add_action( 'edd_after_download_content', 'matt2016_remove_purchase_link' );

/*
*  Add FooGallery Settings to EDD if FooGallery is Active
*/

if ( class_exists('FooGallery_Plugin') ) {
  include_once( 'edd-metaboxes.php');
}

/*
 *  Minimum image size requirements for EDD featured images
 */
