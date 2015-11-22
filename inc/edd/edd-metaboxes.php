<?php

/*
 *  Adds a metabox to the EDD edit screen
 *  for adding a FooGallery to your Single Download page
 */

function matt2016_add_foogallery_edd_meta_box( $post ) {

  add_meta_box(
   'matt2016_foogallery_edd',      // Unique ID
   __( 'Product Gallery (Matt2016)', 'example' ),    // Title
   'matt2016_foogallery_edd',   // Callback function
   'download',
   'side',         // Context
   'high'         // Priority
  );

}

add_action( 'add_meta_boxes_download', 'matt2016_add_foogallery_edd_meta_box', 10, 2 );

/* Display the post meta box. */
function matt2016_foogallery_edd( $object, $box )
  { ?>

    <?php 
		wp_nonce_field( basename( __FILE__ ), 'matt2016_foogallery_edd_nonce' ); 
		
	?>

    <p>
     <label for="matt2016_foogallery_edd"><?php _e( "Add the ID of your FooGallery to display.", 'example' ); ?></label>
     <br />
     <?php
     $args = array(
        'post_type' => 'foogallery',
        'post_status' => 'publish',
      );

     $query = new WP_Query( $args );

     $galleries = $query->get_posts();
	
     if ($galleries):
     echo '<select id="matt2016_foogallery_edd" name="matt2016_foogallery_edd"><option value="">Select your option</option>';

     foreach ($galleries as $gallery):
       setup_postdata($gallery);
	   $prodgallery = get_post_meta( get_the_ID(), 'matt2016_foogallery_edd', true );
	   
	   if ( $prodgallery == $gallery->ID ) {
		   $selected = 'selected';
		} else {
			$selected = '';
		}
	   
       echo '<option value="' . $gallery->ID . '" ' . $selected . '>';
       echo $gallery->post_title;
       echo '</option>';

     endforeach;

     echo '</select>';
   else:
     echo '<p class="alert alert-red">Sorry, you don\'t have any FooGalleries. Go here to create one now.</p>';
   endif;
     ?>
    </p>

  <?php }

  /**
   * Save post metadata when a post is saved.
   *
   * @param int $post_id The post ID.
   * @param post $post The post object.
   * @param bool $update Whether this is an existing post being updated or not.
   */
  function save_matt2016_foogallery_edd_meta( $post_id, $post, $update ) {

    // - Update the post's metadata.

    if ( isset( $_REQUEST['matt2016_foogallery_edd'] ) ) {
        update_post_meta( $post_id, 'matt2016_foogallery_edd', sanitize_text_field( $_REQUEST['matt2016_foogallery_edd'] ) );
    }

  }
  add_action( 'save_post_download', 'save_matt2016_foogallery_edd_meta', 10, 3 );
