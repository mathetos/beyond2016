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
			'classes' => array('block-text', 'secondary-text-color', 'border-color'),
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
	wp_enqueue_style( 'beyond2016-typography', BEYOND2016_URL . '/assets/styles/typography.css' );
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

add_editor_style( 'inc/admin/editor-typography.php' );