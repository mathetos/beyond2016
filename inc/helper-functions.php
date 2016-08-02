<?php

/**
 *  Maybe Hide the Title
 *  Hides the title based on Page post_meta setting
 */

function b16_maybe_hide_title($post) {

    $hidetitle = get_post_meta( $post->ID, 'disable-title', true );
    $hide = ( !empty($hidetitle) ) ? $hide = 'style="display:none;visibility:hidden" aria-hidden="true"' : '';

    return $hide;
}

function b16_maybe_show_bottom_sidebar($post) {

    $bottomsidebar = get_post_meta( $post->ID, 'hide-bottom-sidebar', true );

    $hidebottom = ( !empty($bottomsidebar) ) ? '' : get_sidebar( 'content-bottom' );

    return $hidebottom;
}

function b16_display_sidebar_alignment($post) {

    $sidebar = get_post_meta( $post->ID, 'beyond2016-sidebar-layout', true );

    if ($sidebar != 'disable') {
        $alignment = ($sidebar == 'left') ? 'sidebar-left' : 'sidebar-right';
    } else {
        $alignment = '';
    }

    return $alignment;
}

function b16_maybe_show_footer($post) {

    $footermeta = get_post_meta( $post->ID, 'hide-footer', true );
    $showfooter = ( !empty($footermeta) ) ? '</div><!-- .site-content --></div><!-- .site-inner --></div><!-- .site -->' . wp_footer() . '</body></html>' : get_footer();

    return $showfooter;
}