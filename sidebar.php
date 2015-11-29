<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */
?>

<?php
	$sidebar = get_post_meta( $post->ID, 'beyond2016-sidebar-layout' );

	if ( is_page() ) {
		if ($sidebar[0] == 'right') {
			$alignment = 'right';
		} elseif ($sidebar[0] == 'left') {
			$alignment = 'left';
		} else {}
	} else {
		$alignment = '';
	}

	if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id="secondary" class="sidebar <?php echo $alignment; ?> widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
