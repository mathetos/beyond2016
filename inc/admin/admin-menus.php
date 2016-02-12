<?php
/**
 *  Adding Appearance Submenu for Welcome Page and Global Settings Page
 */

 add_action('admin_menu', 'beyond2016_register_admin_pages');

 function beyond2016_register_admin_pages() {
     add_submenu_page(
         'themes.php',
         'Beyond 2016 Welcome',
         'Beyond 2016 Welcome',
         'manage_options',
         'beydon2016-welcome',
         'beyond2016_welcome_content' );
 }

 function beyond2016_welcome_content() {
     include_once(BEYOND2016_PATH . '/inc/admin/welcome-page.php');
 }
