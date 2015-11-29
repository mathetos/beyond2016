<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', 'beyond2016' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php beyond2016_excerpt(); ?>

	<?php beyond2016_post_thumbnail(); ?>

	<div class="entry-content" id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>
		<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'summary entry-summary' ); ?>">

		<?php
		/**
		 *  give_get_donation_form()
		 *  Get's the form goal, content and actual form element
		 *
		 *  The give_single_form_summary hook outputs all of that
		 *  plus the form title as the first element
		 */

			give_get_donation_form( $args = array() );
		?>

		</div>
	<!-- .summary -->

	<?php
	/**
	 * give_after_single_form_summary hook
	 */
	do_action( 'give_after_single_form_summary' );
	?>


<?php do_action( 'give_after_single_form' ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php beyond2016_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'beyond2016' ),
					the_title( '', '', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
