<?php

/* TGM Plugin Activation */
require_once BEYOND2016_PATH . '/lib/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'beyond2016_register_required_plugins' );

function beyond2016_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'Beyond 2016 Updater Plugin', 
			'slug'               => 'github-updater', 
			'source'             => 'https://github.com/afragen/github-updater/archive/5.4.1.zip', 
			'required'           => true, 
			'version'            => '5.4.1', 
			'force_activation'   => false, 
			'force_deactivation' => false, 
		),

		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'beyond2016',                 
		'default_path' => '',                      
		'menu'         => 'tgmpa-install-plugins', 
		'parent_slug'  => 'themes.php',            
		'capability'   => 'edit_theme_options',    
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                      
		'is_automatic' => true,                   
		'message'      => '<div class="subttitle"><p><strong>Github Updater</strong> -- <em>The Github Updater plugin allows you to get notified when there are updates available for Beyond 2016.</em></p><hr /><p><strong>Yoast SEO</strong> -- <em>This is a <u>Suggested</u> plugin requirement because Beyond 2016 has intentional integrations with Yoast SEO. Like using meta-descriptions for archive excerpts and breadcrumbs</em>.</p></div>',                      
		'strings'      => array(
			'page_title'   => __( 'Install the Github Updater to Get Automatic Updates of Beyond 2016', 'beyond2016' ),
			'menu_title'   => __( 'Get Theme Updates', 'beyond2016' ),
			
		),
		
	);

	tgmpa( $plugins, $config );
}

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

    if ( is_404() == false ) {
        $sidebar = get_post_meta($post->ID, 'beyond2016-sidebar-layout', true);
    }

	if ( is_page() && $sidebar == 'disable' ) {

		$classes[] = 'no-sidebar';
	} elseif ( is_404() || is_home() || is_front_page() || is_archive() || is_tax() ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

/*Recent Posts Action*/

function  beyond2016_recent_posts_function( $args, $postsheading = 'Maybe you\'re looking for a recent post?' ) {

		$beyond2016_404_recent_posts = wp_get_recent_posts( $args );
		?>

		<h3><?php echo $postsheading; ?></h3>
		<div class="by16-section by16-group">

			<?php
			foreach( $beyond2016_404_recent_posts as $recent ){
				include(locate_template('template-parts/recent-posts.php') );
			}

			?>

		</div>
	<?php
}

add_action('beyond2016_recent_posts', 'beyond2016_recent_posts_function', 10, 2);

/* Enqueue Blog Grid Stlyes & Scripts */

function beyond2016_archive_grid_scripts() {
	if ( is_home() || is_front_page() || is_category() || is_archive() ) {

		wp_enqueue_style( 'b16-grid-style', get_template_directory_uri() . '/assets/styles/archive-grid.css' );

		wp_enqueue_script( 'b16-grid-modernizer', get_template_directory_uri() . '/assets/js/modernizr.custom.js', array(), '1.0.0', false );
		wp_enqueue_script( 'b16-grid', get_template_directory_uri() . '/assets/js/grid.js', array('jquery', 'b16-grid-modernizer'), '1.0.0', true );

	}
}

add_action( 'wp_enqueue_scripts', 'beyond2016_archive_grid_scripts' );

function beyond2016_print_archive_grid_init() {
  if ( is_home() || is_front_page() || is_category() || is_archive() ) {
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