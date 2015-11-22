<?php
/**
 * Beyond 2016 back compat functionality
 *
 * Prevents Beyond 2016 from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */

/**
 * Prevent switching to Beyond 2016 on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Beyond 2016 1.0
 */
function beyond2016_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'beyond2016_upgrade_notice' );
}
add_action( 'after_switch_theme', 'beyond2016_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Beyond 2016 on WordPress versions prior to 4.4.
 *
 * @since Beyond 2016 1.0
 *
 * @global string $wp_version WordPress version.
 */
function beyond2016_upgrade_notice() {
	$message = sprintf( __( 'Beyond 2016 requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'beyond2016' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Beyond 2016 1.0
 *
 * @global string $wp_version WordPress version.
 */
function beyond2016_customize() {
	wp_die( sprintf( __( 'Beyond 2016 requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'beyond2016' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'beyond2016_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Beyond 2016 1.0
 *
 * @global string $wp_version WordPress version.
 */
function beyond2016_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Beyond 2016 requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'beyond2016' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'beyond2016_preview' );
