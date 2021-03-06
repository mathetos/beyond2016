<?php

/**
 *		Editor Styles
 *
 **/


/*
 *  Add "Formats" dropdown to TinyMCE Editor
 */
function beyond2016_mce_formats($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'beyond2016_mce_formats');


/*
 *  Callback function to filter the MCE settings
 */
function beyond2016_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		// available element types: inline, block, selector, classes, styles, attributes, exact, wrapper
		// see here: http://codex.wordpress.org/TinyMCE_Custom_Styles#Using_style_formats
		array(  
			'title' => 'Block Text',  
			'block' => 'p',  
			'classes' => array('block-text', 'main-as-color', 'title-as-border'),
			'wrapper' => false,
		),  
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'beyond2016_mce_before_init_insert_formats' ); 


/*  Enqueue the same style to the frontend
 *  This ensures that the changes you make 
 *  to this CSS file are reflected in both the
 *  backend and frontend
 */
function beyond2016_typography_scripts() {
	wp_enqueue_style( 'beyond2016-typography', get_template_directory_uri() . '/assets/styles/typography.css', array('beyond2016-main'), BEYOND2016_VERSION, 'all' );
}
add_action( 'wp_enqueue_scripts', 'beyond2016_typography_scripts' );


/*  Function to conditionally check whether
 *  we are on a new post or post edit page
 *  Hat tip to Bainternet:
 *  http://wordpress.stackexchange.com/questions/50043/how-to-determine-whether-we-are-in-add-new-page-post-cpt-or-in-edit-page-post-cp
 */
function beyond2016_is_edit_page( $new_edit = null ){
	global $pagenow;
	// make sure we are on the backend
	if (!is_admin()) return false;

	if( $new_edit == "edit" ) //check for edit existing page
        	return in_array( $pagenow, array( 'post.php',  ) );
    	elseif($new_edit == "new") //check for new post page
        	return in_array( $pagenow, array( 'post-new.php' ) );
    	else //check for either new or edit
        	return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}

add_editor_style( 'assets/styles/typography.css' );

include_once( BEYOND2016_PATH . '/inc/admin/tinymce-customizer-styles.php');

function beyond2016_define_theme_mods( $theme_mods ) {
	$theme_mods = array(
		'page_background_color' => array(
			array(
				'selectors'  => 'body',
				'properties' => array( 'background-color' )
			),
			array(
				'selectors'  => 'ins',
				'properties' => array( 'color' )
			)
		),
		'link_color' => array(
			array(
				'selectors'  => 'a',
				'properties' => array( 'color' )
			),
			array(
				'selectors'  => 'ins',
				'properties' => array( 'background-color' )
			)
		),
		'main_text_color' => array(
			array(
				'selectors'  => 'body, blockquote cite',
				'properties' => array( 'color' )
			),
			array(
				'selectors'  => 'blockquote',
				'properties' => array( 'border-color' )
			),
			array(
				'selectors'  => 'code',
				'properties' => array( 'background-color' ),
				'alpha'      => '0.2'
			),
			array(
				'selectors'  => 'table, th, td, pre',
				'properties' => array( 'border-color' ),
				'alpha'      => '0.2'
			)
		),
		'secondary_text_color' => array(
			array(
				'selectors'  => 'blockquote',
				'properties' => array( 'color' )
			)
		),
		'content_title_color' => array(
			array(
				'selectors'  => 'p.block-text',
				'properties' => array( 'border-color' )
			)
		),
	);

	return $theme_mods;
}
add_filter( 'kwh_theme_mods', 'beyond2016_define_theme_mods' );

