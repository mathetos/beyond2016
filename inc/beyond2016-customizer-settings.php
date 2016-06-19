<?php

/*
 *	Beyond 2016 Additions
 *
 */

 /*
  *  Customize the Customizer Section Titles
  */

 function beyond2016_customizer_init( $wp_customize ){
        $wp_customize->get_section('header_image')->title = __( 'Layouts', 'beyond2016' );
        $wp_customize->get_section('header_image')->priority = 11;
 }

//add_action( 'customize_register', 'beyond2016_customizer_init' );


function beyond2016_add_customizer_settings( $wp_customize ) {
     
	// Section -- Site Identity
	$wp_customize->add_setting( 'show_site_icon', array(
	'default'        => '0',
	) );

	$wp_customize->add_control( 'show_site_icon', array(
		'label'   => 'Show Site Icon in Header',
		'section' => 'title_tagline',
		'type'    => 'checkbox',
		'priority' => 95
	) );

	/*
	 *
	 *	Global Layouts with Sub-sections
	 * 
	 */

	// The Layouts Panel
	$wp_customize->add_panel( 'b16_layouts', array(
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Global Layouts', 'beyond2016'),
		'description'    => __('Several settings pertaining Beyond 2016', 'beyond2016'),
	) );

	// The Header Sub-section
	$wp_customize->add_section( 'header_layout', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Header Layout', 'beyond2016'),
		'description'    =>  __('Header elements configuration', 'beyond2016'),
		'panel'  => 'b16_layouts',
	) );

		// The Header Alignment Settings/Controls
	    $wp_customize->add_setting( 'header_alignment', array(
	        'default'        => '1',
	    ) );

	    $wp_customize->add_control( 'header_alignment', array(
	        'label'   => 'Header Alignment',
	        'section' => 'header_layout',
	        'type'    => 'radio',
	        'choices' => array("Align Left", "Align Center"),
	        'priority' => 35
	    ) );

		// The Header Image Position Settings/Controls
	    $wp_customize->add_setting( 'header_image_position', array(
	        'default'        => '1',
	    ) );

	    $wp_customize->add_control( 'header_image_position', array(
	        'label'   => 'Header Image Position',
	        'section' => 'header_layout',
	        'type'    => 'radio',
	        'choices' => array("Above", "Below", "Behind"),
	        'priority' => 34
	    ) );

	// The Pages Sub-section
	$wp_customize->add_section( 'pages_layout', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Pages Layout', 'beyond2016'),
		'description'    =>  __('Pages elements configuration', 'beyond2016'),
		'panel'  => 'b16_layouts',
	) );

		// The Pages Layout Settings/Controls
		$wp_customize->add_setting( 'pages_layout', array(
	       'default'        => 'layout-1',
	   	) );

		$wp_customize->add_control( 'pages_layout', array(
			'label'   => 'Global Page Layout',
			'section' => 'pages_layout',
			'type'    => 'radio',
			'description' => __('This sets the default layout for all your pages. Each page can override these settings individually.', 'beyond2016'),
			'priority' => 5,
			'choices' => array(
				'layout-1' => 'Layout 1',
				'layout-2' => 'Layout 2',
				'layout-3' => 'Layout 3',
		  	)
		) );

	// The Archives Layout Sub-section
	$wp_customize->add_section( 'archives', array(
		'title' => 'Archives',
		'description' => 'Customize Your Post Archive page',
		'priority' => 55,
		'panel'  => 'b16_layouts',
	) );

	$wp_customize->add_setting( 'archive_intro_title', array(
		'default'        => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( 'archive_intro_title', array(
		'label'   => 'Archive Intro Title',
		'section' => 'archives',
		'type'    => 'text',
		'description' => __('Give your Archive Intro a Title', 'beyond2016'),
		'priority' => 5,
	) );

	$wp_customize->add_setting( 'archive_intro_text', array(
		'default'        => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( 'archive_intro_text', array(
		'label'   => 'Archive Intro Text',
		'section' => 'archives',
		'type'    => 'textarea',
		'description' => __('Give your Archive an introduction', 'beyond2016'),
		'priority' => 10,
	) );

	$wp_customize->add_setting( 'archive_layout', array(
		'default'        => '0',
		'transport' => '',
	) );

	$wp_customize->add_control( 'archive_layout', array(
		'label'   => 'Archive Layout',
		'section' => 'archives',
		'type'    => 'radio',
		'description' => __('Choose your Layout Style', 'beyond2016'),
		'priority' => 35,
		'choices' => array("Full Content", "Excerpt", "Basic Grid", "Grid with Expander"),
	) );

	$wp_customize->add_setting( 'basic-col-width', array(
		'default'        => 'thirds',
		'transport' => '',
	) );

	$wp_customize->add_control( 'basic-col-width', array(
		'label'   => 'Basic Grid Columns',
		'section' => 'archives',
		'type'    => 'select',
		'description' => __('Choose the number of columns in your Grid', 'beyond2016'),
		'priority' => 35,
		'choices' => array(
		'halves' => '2',
		'thirds' => '3',
		'fourths' => '4'),
	) );

 	// Section -- Footer
    $wp_customize->add_section( 'footer', array(
		'title' => 'Footer',
        'description' => 'Customize the Footer text and layout',
        'priority' => 95,
    ) );

	$wp_customize->add_setting( 'footer_text', array(
		'default'        => '',
		'transport' => 'postMessage',
	) );

    $wp_customize->add_control( 'footer_text', array(
        'label'   => 'Footer Text',
        'section' => 'footer',
        'type'    => 'textarea',
		'description' => __('Basic HTML is allowed', 'beyond2016'),
        'priority' => 35
    ) );

	$wp_customize->add_setting( 'footer_copyright', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'footer_copyright', array(
		'label'   => 'Enable Copyright info?',
		'section' => 'footer',
		'type'    => 'radio',
		'default' => 'yes',
		'description' => __('See docs for how to customize the text', 'beyond2016'),
		'choices' => array(
			'yes' => __('Yes','beyond2016'),
			'no' => __('No','beyond2016'),
		),
		'priority' => 35
	) );

	$wp_customize->add_setting( 'footer_site_icon', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'footer_site_icon', array(
		'label'   => 'Enable Site Icon in Footer?',
		'section' => 'footer',
		'type'    => 'radio',
		'default' => 'yes',
		'description' => __('Update your Site Icon in the "Site Identity Section"', 'beyond2016'),
		'choices' => array(
			'yes' => __('Yes','beyond2016'),
			'no' => __('No','beyond2016'),
		),
		'priority' => 30
	) );

	//postMessage Settings
	$wp_customize->get_setting('footer_text')->transport='postMessage';

	if ( $wp_customize->is_preview() ) {
		add_action( 'wp_footer', 'beyond2016_postMessage_scripts', 21);
	}

}

add_action( 'customize_register', 'beyond2016_add_customizer_settings' );


function beyond2016_postMessage_scripts() {
    ?>
    <script type="text/javascript">
			( function( $ ) {
				wp.customize('footer_text',function( value ) {
					value.bind(function(to) {
						$('footer .site-info div.f-text').html(to);
					});
				});
			} )( jQuery )
    </script>
    <?php
}
