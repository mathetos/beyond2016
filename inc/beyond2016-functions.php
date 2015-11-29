<?php
/* MEDIA */
add_image_size( 'recentposts', 390, 200, true );

/**
 * Enqueue script for custom customize control.
 */

function beyond2016_customizer_enqueue() {
	wp_enqueue_script( 'beyond2016-customizer', get_template_directory_uri() . '/assets/js/source/beyond2016-customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'beyond2016_customizer_enqueue' );

add_filter( 'body_class', 'beyond2016_body_classess' );

function beyond2016_body_classess($classes) {
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

	 global $post;
	 $sidebar = get_post_meta( $post->ID, 'beyond2016-sidebar-layout' );

	 if ( is_404() || ( is_page() && $sidebar[0] == 'disable' ) ) {
 		$classes[] = 'no-sidebar';
 		}

   return $classes;
 }

/*Recent Posts Action*/

add_action('beyond2016_recent_posts', 'beyond2016_recent_posts_function', 9, 1);

function  beyond2016_recent_posts_function($args) {
		$beyond2016_404_recent_posts = wp_get_recent_posts( $args );
		?>
		<h3>Maybe you're looking for a recent post?</h3>
		<div class="by16-section by16-group">

		<?php
		foreach( $beyond2016_404_recent_posts as $recent ){
				include(locate_template('template-parts/recent-posts.php') );
			}
		//endforeach;
		?>
	</div>
	<?php
}
