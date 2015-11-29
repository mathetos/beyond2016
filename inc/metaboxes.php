<?php

/*
 *   All theme metaboxes
 *
 */

 /*
  *  Adds a metabox to the EDD edit screen
  *  for adding a FooGallery to your Single Download page
  */

function beyond2016_page_layout_metaboxes( $post ) {

add_meta_box(
    'beyond2016_page_layout_options',      // Unique ID
    __( 'Page Layout Options', 'beyond2016' ),    // Title
    'beyond2016_page_layout_options',   // Callback function
    'page',
    'side',         // Context
    'core'         // Priority
  );
}

add_action( 'add_meta_boxes_page', 'beyond2016_page_layout_metaboxes', 10, 2 );


/* Display the post meta box. */
function beyond2016_page_layout_options( $post )
  { ?>

    <?php
		  wp_nonce_field( basename( __FILE__ ), 'beyond2016_disable_sidebar_nonce' );
      $beyond2016_page_meta = get_post_meta( $post->ID );
	  ?>

    <fieldset>
     <legend for="beyond2016_sidebar_layout" id="beyond2016_sidebar_layout"><strong><?php _e( "Sidebar", 'beyond2016' ); ?></strong></legend>

     <label for="beyond2016-sidebar-disable">
       <input type="radio" name="beyond2016-sidebar-layout" id="beyond2016-sidebar-disable" value="disable" <?php if ( isset ( $beyond2016_page_meta['beyond2016-sidebar-layout'] ) ) checked( $beyond2016_page_meta['beyond2016-sidebar-layout'][0], 'disable' ); ?>>
       <?php _e( "Disable the Sidebar", 'beyond2016' ); ?>
     </label><br />

     <label for="beyond2016-sidebar-right">
       <input type="radio" name="beyond2016-sidebar-layout" id="beyond2016-sidebar-right" value="right" <?php if ( isset ( $beyond2016_page_meta['beyond2016-sidebar-layout'] ) ) checked( $beyond2016_page_meta['beyond2016-sidebar-layout'][0], 'right' ); ?>>
       <?php _e( "Right-hand Sidebar", 'beyond2016' ); ?>
     </label><br />

     <label for="beyond2016-sidebar-left">
       <input type="radio" name="beyond2016-sidebar-layout" id="beyond2016-sidebar-left" value="left" <?php if ( isset ( $beyond2016_page_meta['beyond2016-sidebar-layout'] ) ) checked( $beyond2016_page_meta['beyond2016-sidebar-layout'][0], 'left' ); ?>>
       <?php _e( "Left-hand Sidebar", 'beyond2016' ); ?>
     </label>
    </fieldset>

    <fieldset>
     <legend for="beyond2016_hide_elements" id="beyond2016_hide_elements"><strong><?php _e( "Hide Elements", 'beyond2016' ); ?></strong></legend>
     <label for="disable-title">
            <input type="checkbox" name="disable-title" id="disable-title" value="yes" <?php if ( isset ( $beyond2016_page_meta['disable-title'] ) ) checked( $beyond2016_page_meta['disable-title'][0], 'yes' ); ?> />
            <?php _e( 'Disable the Title?', 'beyond2016' )?>
        </label><br />
        <label for="hide-bottom-sidebar">
            <input type="checkbox" name="hide-bottom-sidebar" id="hide-bottom-sidebar" value="yes" <?php if ( isset ( $beyond2016_page_meta['hide-bottom-sidebar'] ) ) checked( $beyond2016_page_meta['hide-bottom-sidebar'][0], 'yes' ); ?> />
            <?php _e( 'Hide the Bottom Sidebar?', 'beyond2016' )?>
        </label><br />
        <label for="hide-footer">
            <input type="checkbox" name="hide-footer" id="hide-footer" value="yes" <?php if ( isset ( $beyond2016_page_meta['hide-footer'] ) ) checked( $beyond2016_page_meta['hide-footer'][0], 'yes' ); ?> />
            <?php _e( 'Hide the Footer?', 'beyond2016' )?>
        </label>

  <?php }

  /**
   * Save post metadata when a post is saved.
   *
   * @param int $post_id The post ID.
   * @param post $post The post object.
   * @param bool $update Whether this is an existing post being updated or not.
   */
  function save_beyond2016_page_layout_options( $post_id, $post, $update ) {

    // Save Sidebar Layout Option
    if( isset( $_POST[ 'beyond2016-sidebar-layout' ] ) ) {
        update_post_meta( $post_id, 'beyond2016-sidebar-layout', $_POST[ 'beyond2016-sidebar-layout' ] );
    }

    // Save Disable Title Page Option
    if( isset( $_POST[ 'disable-title' ] ) ) {
      update_post_meta( $post_id, 'disable-title', 'yes' );
    } else {
        update_post_meta( $post_id, 'disable-title', '' );
    }

    // Save Hide Bottom Sidebar Page Option
    if( isset( $_POST[ 'hide-bottom-sidebar' ] ) ) {
      update_post_meta( $post_id, 'hide-bottom-sidebar', 'yes' );
    } else {
        update_post_meta( $post_id, 'hide-bottom-sidebar', '' );
    }

    // Save Hide Footer Page Option
    if( isset( $_POST[ 'hide-footer' ] ) ) {
      update_post_meta( $post_id, 'hide-footer', 'yes' );
    } else {
        update_post_meta( $post_id, 'hide-footer', '' );
    }

  }
  add_action( 'save_post_page', 'save_beyond2016_page_layout_options', 10, 3 );
