<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */
?>
<div class="author-info">
		<h4>About <?php the_title(); ?></h4>
		<?php
		/**
		 * Filter the Beyond 2016 author bio avatar size.
		 *
		 * @since Beyond 2016 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */

		?>
</div><!-- .author-avatar -->

<div class="author-description">
		<?php
			global $post;
			$downloadid = get_the_ID($post);

			the_modified_date('l, F j, Y', '<div class="the-modified-date">Last Updated:', '</div>');

			$taxonomy = 'download_category'; // EDD's taxonomy for categories
    	$terms = get_terms( $taxonomy ); // get the terms from EDD's download_category taxonomy

			echo '<ul>';
			foreach ( $terms as $term ) :
			echo '<li><a href="'. esc_attr( get_term_link( $term, $taxonomy ) ).'" title="'.$term->name.'">'.$term->name.'</a></li>';
			endforeach;
			echo '</ul>';

			echo '<p>Pay what you like:</p>';
			echo edd_get_purchase_link( array( 'download_id' => $downloadid ) );?>
</div><!-- .author-info -->
