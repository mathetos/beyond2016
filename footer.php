<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */
?>

		</div><!-- .site-content -->
<?php
if ( is_page() ) {
	$hidefooter = get_post_meta( $post->ID, 'hide-footer', true );
} else {
	$hidefooter = array('');
}

if ( $hidefooter !== 'yes' ) {
?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php _e( 'Footer Primary Menu', 'beyond2016' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'beyond2016' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info">
				<p class="credits">
				<?php
					/**
					 * Fires before the beyond2016 footer text for footer customization.
					 *
					 * @since Beyond 2016 1.0
					 */
					//do_action( 'beyond2016_credits' );

					$footertext = get_theme_mod('footer_text');
					$copyright = get_theme_mod('footer_copyright');
					$footersiteicon = get_theme_mod('footer_site_icon');

					if ( $footersiteicon == 'yes') { ?>
						<img src="<?php site_icon_url(); ?>" width="50" height="50" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<?php }

					if ( !empty($footertext) ) {
						echo '<div class="f-text">' . $footertext . '</div>';
					}	else {
				?>

				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'beyond2016' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'beyond2016' ), 'WordPress' ); ?></a>
				<?php }

 				  if ( $copyright == 'yes') {
						$defaultcpyrt = '<span class="copyright">Copyright &copy; ' . date("Y") . '&nbsp;' . get_bloginfo('name') . '</span>';

						echo apply_filters('beyond2016_copyright', $defaultcpyrt);
					}
				?>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
<?php } // end hide footer condition ?>
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
