<?php

// Remove custom header theme support in order to customize it on our own

add_action( 'after_setup_theme', 'remove_custom_header', 11 );

function remove_custom_header() {

    // This will remove support for post thumbnails on ALL Post Types
    remove_theme_support( 'custom-header' );

}


/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function matt2016_add_header_customizer_section( $wp_customize ) {
    $wp_customize->add_section(
        'header_section',
        array(
            'title' => 'Site Header',
            'description' => 'Customize the header layout and header image options.',
            'priority' => 9,
        )
    );

    // WP_Customize_Image_Control
        $wp_customize->add_setting( 'image_setting', array(
            'default'        => '',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_setting', array(
            'label'   => 'Image Setting',
            'section' => 'header_section',
            'settings'   => 'image_setting',
            'priority' => 8
        ) ) );
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
