<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */
?>
<?php
	if ( has_post_thumbnail() ) {
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
		$background = 'style="background-image: url(\'' . $thumb[0] . '\');"';
	} else {
		$background = 'style="background-color: black;"';
	}
?>

<div class="entry-header" <?php echo $background?> role="header">
	<?php
		the_title( '<h1 class="entry-title">', '</h1>' );

	?>
</div><!-- .entry-header -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(has_excerpt()) : ?>

		<div class="edd-intro">
			<?php
				echo '<p>' . get_the_excerpt() . '</p>';
			?>
		</div>

	<?php endif; ?>


		<?php

    // Retrieves the stored value from the database
    //$prodgallery = get_post_meta( get_the_ID(), 'matt2016_foogallery_edd', true );

		//if( $prodgallery != '' ) {
			//echo '<div classs="product-gallery">';
			//echo '<h4><em>Product Gallery:</em></h4>';
			//echo do_shortcode('[foogallery id="' . $prodgallery . '"]');
			//echo '</div>';
		//}
	?>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php get_template_part( 'template-parts/download-meta' );?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
