<?php
/**
 * Adds styles from customizer to head of TinyMCE iframe.
 * These styles are added before all other TinyMCE stylesheets.
 * h/t Otto.
 */
function kwh_add_editor_style( $mceInit ) {
	$styles = '';

	/**
	 * Each array within $theme_mods is used to construct a single CSS rule.
	 * 'selectors' is a string that defines CSS selectors affected by theme_mod.
	 * 'properties' is an array that defines properties affected by theme_mod.
	 * 'alpha' is float that defines the alpha channel of rgba colors.
	 * A single theme_mod can include multiple subarrays if it affects multiple CSS rules.
	 * Note: Settings below are specific to Twenty Sixteen.
	 */
	$theme_mods = array();
	$theme_mods = apply_filters( 'kwh_theme_mods', $theme_mods );

	// Construct CSS rules for each theme_mod.
	foreach ( $theme_mods as $theme_mod => $rules ) {
		// Retrieve value of theme_mod as set by Customizer.
		$theme_mod_value = get_theme_mod( $theme_mod );

		// Loop through each subarray to construct CSS rules.
		foreach ( $rules as $rule ) {
			$declarations = '';
			foreach ( $rule['properties'] as $property ) {
				if ( isset( $rule['alpha'] ) ) {
					// If alpha is set, convert hex value to rgba.
					$rgb = hex2rgb( $theme_mod_value );
					$rgba = 'rgba( ' . $rgb['red'] . ', ' . $rgb['green'] . ', ' . $rgb['blue'] . ', ' . $rule['alpha'] . ' )';
					$declarations .= $property . ': ' . $rgba . ' !important; ';
				} else {
					// There's no need to convert hex to rgba. Use $theme_mod_value as is.
					$declarations .= $property . ': ' . $theme_mod_value . ' !important; ';
				}
			}

			// Combine selectors and declarations to form a complete CSS rule.
			$styles .= $rule['selectors'] . ' { ' . $declarations . '} ';
		}
	}

	// Enqueue styles.
	if ( ! isset( $mceInit['content_style'] ) ) {
		$mceInit['content_style'] = $styles . ' ';
	} else {
		$mceInit['content_style'] .= ' ' . $styles . ' ';
	}

	return $mceInit;
}

add_filter( 'tiny_mce_before_init', 'kwh_add_editor_style' );

/**
 * Converts hex value to rgb. Since the Customizer's color picker stores all
 * colors as hex values, this function is used to convert hex to rgb in case
 * an alpha channel is required for transparency.
 * https://css-tricks.com/snippets/php/convert-hex-to-rgb/
 */
function hex2rgb( $colour ) {
	if ( $colour[0] == '#' ) {
		$colour = substr( $colour, 1 );
	}
	if ( strlen( $colour ) == 6 ) {
		list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
	} elseif ( strlen( $colour ) == 3 ) {
		list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
	} else {
		return false;
	}
	$r = hexdec( $r );
	$g = hexdec( $g );
	$b = hexdec( $b );
	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}