<?php

/*
 *  Customize the Customizer Section Titles
 */

function matt2016_customizer_init( $wp_customize ){
       $wp_customize->get_section('header_image')->title = __( 'Header Layout' );
}

add_action( 'customize_register', 'matt2016_customizer_init' );

/*
 *  Adds the individual sections, settings, and controls to the theme customizer
 */

function matt2016_add_header_customizer_section( $wp_customize ) {
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

    // Section -- Header Image: Alignment
    $wp_customize->add_setting( 'header_alignment', array(
        'default'        => '1',
    ) );

    $wp_customize->add_control( 'header_alignment', array(
        'label'   => 'Header Alignment',
        'section' => 'header_image',
        'type'    => 'radio',
        'choices' => array("Align Left", "Align Center"),
        'priority' => 35
    ) );

    // Section -- Header Image: Header Image Position
    $wp_customize->add_setting( 'header_image_position', array(
        'default'        => '1',
    ) );

    $wp_customize->add_control( 'header_image_position', array(
        'label'   => 'Header Image Position',
        'section' => 'header_image',
        'type'    => 'radio',
        'choices' => array("Above", "Below", "Behind"),
        'priority' => 34
    ) );
}
add_action( 'customize_register', 'matt2016_add_header_customizer_section' );


//add_filter( 'twentysixteen_color_schemes', 'matt2016_color_schemes' );

function matt2016_color_schemes() {

  $newcolors = array(
		'matt2014' => array(
			'label'  => __( 'Matt2014', 'matt2016' ),
			'colors' => array(
				'#1a1a1a',
				'#ffffff',
				'#007acc',
				'#1a1a1a',
				'#686868',
			),
		),
	);

  return $newcolors;
}
