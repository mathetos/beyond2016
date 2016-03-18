<?php
/* Admin Menus */
require_once( BEYOND2016_PATH . '/inc/admin/admin-menus.php');

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

    if (is_404() == false) {
        $sidebar = get_post_meta($post->ID, 'beyond2016-sidebar-layout', true);
    }

	if ( is_page() && $sidebar == 'disable' ) {

		$classes[] = 'no-sidebar';
	} elseif ( is_404() || is_home() || is_front_page() ) {
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

/* Enqueue Blog Grid Stlyes & Scripts */

function beyond2016_archive_grid_scripts() {
	if ( is_home() || is_front_page() ) {

		wp_enqueue_style( 'b16-grid-style', get_template_directory_uri() . '/assets/styles/archive-grid.css' );

		wp_enqueue_script( 'b16-grid-modernizer', get_template_directory_uri() . '/assets/js/modernizr.custom.js', array(), '1.0.0', false );
		wp_enqueue_script( 'b16-grid', get_template_directory_uri() . '/assets/js/grid.js', array('jquery', 'b16-grid-modernizer'), '1.0.0', true );

	}
}

add_action( 'wp_enqueue_scripts', 'beyond2016_archive_grid_scripts' );

function beyond2016_print_archive_grid_init() {
  if ( is_home() || is_front_page() ) {
?>
<script type="text/javascript">
			jQuery(document).ready(function( $ ) {
				Grid.init();
			});
</script>
<?php
  }
}
add_action( 'wp_footer', 'beyond2016_print_archive_grid_init' );
