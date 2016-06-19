<?php

/* TGM Plugin Activation */
require_once BEYOND2016_PATH . '/lib//tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'beyond2016_register_required_plugins' );

function beyond2016_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Beyond 2016 Updater Plugin', // The plugin name.
			'slug'               => 'github-updater', // The plugin slug (typically the folder name).
			'source'             => 'https://github.com/afragen/github-updater/archive/5.4.1.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.4.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			//'external_url'       => 'https://github.com/afragen/github-updater/archive/5.4.1.zip', // If set, overrides default API URL and points to an external URL.
			//'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'beyond2016',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '<div class="subttitle"><h3><em>The Github Updater plugin allows you to get notified when there are updates available for Beyond 2016.</em></h3></div>',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => __( 'Install the Github Updater to Get Automatic Updates of Beyond 2016', 'beyond2016' ),
			'menu_title'                      => __( 'Get Theme Updates', 'beyond2016' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'beyond2016' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'beyond2016' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'beyond2016' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'beyond2016'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'beyond2016'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'beyond2016'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'beyond2016'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'beyond2016'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'beyond2016'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'beyond2016'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'beyond2016'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'beyond2016'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'beyond2016' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'beyond2016' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'beyond2016' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'beyond2016' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'beyond2016' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'beyond2016' ),
			'dismiss'                         => __( 'Dismiss this notice', 'beyond2016' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'beyond2016' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'beyond2016' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.*/
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

    if (is_404() == false) {
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

/*
 *  Excludes Password Protected posts from the
 *  Archive and Category loops.
 *
 */

function exclude_passworded_posts($post) {
	global $post;
	$b16ecom_exclude = post_password_required($post->ID);

	if ($b16ecom_exclude == true) {
		$excludepass = false;
	} else {
		$excludepass = true;
	}
	return apply_filters('exclude-passworded-posts', $excludepass);
}

function b16ecom_comment_count() {

	global $post;
	$commentsnum = wp_count_comments($post->ID);

	if ($commentsnum->total_comments > 14) {
		$popular = '<p style=quot;font-size: 80%; font-style: italics; quot;><span class=&quot;genericon genericon-digg&quot;></span>Popular Post :</p>';
	} else {
		$popular = '';
	}

	return $popular;

}
