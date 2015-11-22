<?php
/**
 * Enqueue script for custom customize control.
 */

function beyond2016_customizer_enqueue() {
	wp_enqueue_script( 'beyond2016-customizer', get_template_directory_uri() . '/assets/js/source/beyond2016-customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'beyond2016_customizer_enqueue' );
