<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<?php
				$headerimgpos = get_theme_mod( 'header_image_position' );
				switch ($headerimgpos) {
		      case '0' :
		       get_template_part('template-parts/header', 'image-above');
		       break;
		      case '1' :
		       get_template_part('template-parts/header', 'image-below');
		       break;
		      case '2' :
		       get_template_part('template-parts/header', 'image-behind');
		       break;
		      default :
		       get_template_part('template-parts/header', 'image-below');
		    }
			?>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
