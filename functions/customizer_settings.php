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
        'choices' => array("Align Left", "Align Center", "Align Right"),
        'priority' => 35
    ) );

    // Section -- Header Image: Layout
    $wp_customize->add_setting( 'header_layout', array(
        'default'        => '1',
    ) );

    $wp_customize->add_control( 'header_layout', array(
        'label'   => 'Header Layout',
        'section' => 'header_image',
        'type'    => 'radio',
        'choices' => array("Logo/title above, nav below", "Logo/title left, nav right", "Logo/title right, nav left", "Logo/title right, nav below"),
        'priority' => 36
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







//add_filter ( 'twentysixteen_color_schemes', 'matt2016_color_schemes' );

function matt2016_color_schemes() {
  $newcolors = array(
		'default' => array(
			'label'  => __( 'Default', 'matt2016' ),
			'colors' => array(
				'#1a1a1a',
				'#ffffff',
				'#007acc',
				'#1a1a1a',
				'#686868',
			),
		),
		'dark' => array(
			'label'  => __( 'Dark', 'matt2016' ),
			'colors' => array(
				'#262626',
				'#1a1a1a',
				'#9adffd',
				'#e5e5e5',
				'#c1c1c1',
			),
		),
		'gray' => array(
			'label'  => __( 'Gray', 'matt2016' ),
			'colors' => array(
				'#616a73',
				'#4d545c',
				'#aaaaaa',
				'#ededed',
				'#ededed',
			),
		),
    'gray-aaa' => array(
			'label'  => __( 'Gray (AAA)', 'matt2016' ),
			'colors' => array(
				'#616a73',
				'#4d545c',
				'#ffffff',
				'#ffecdb',
				'#ffecdb',
			),
		),
		'green' => array(
			'label'  => __( 'Green', 'matt2016' ),
			'colors' => array(
        '#ffffff',
				'#acc1a2',
				'#6d8c87',
				'#ffffff',
				'#efeef4',
			),
		),
    'green-aaa' => array(
			'label'  => __( 'Green (AAA)', 'matt2016' ),
			'colors' => array(
				'#ffffff',
				'#acc1a2',
				'#113321',
				'#ffffff',
				'#113321',
			),
		),
		'yellow' => array(
			'label'  => __( 'Yellow', 'matt2016' ),
			'colors' => array(
				'#3b3721',
				'#ffef8e',
				'#7f7d6f',
				'#3b3721',
				'#774e24',
			),
		),
	);

  return $newcolors;
}
