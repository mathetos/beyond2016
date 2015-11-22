<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php beyond2016_post_thumbnail(); ?>

	<?php beyond2016_excerpt(); ?>

	<?php if ( 'post' === get_post_type() ) : ?>

		<footer class="entry-footer">
			<?php beyond2016_entry_meta(); ?>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( 'Edit %s', 'twentysixteen' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->

	<?php else : ?>

		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit %s', 'twentysixteen' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				),
				'<footer class="entry-footer"><span class="edit-link">',
				'</span></footer><!-- .entry-footer -->'
			);
		?>

	<?php endif; ?>
</article><!-- #post-## -->

