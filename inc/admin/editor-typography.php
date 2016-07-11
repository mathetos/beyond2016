<?php
header("Content-type: text/css; charset: UTF-8");
header('Cache-control: must-revalidate');
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);
  
$backgroundcolor = get_theme_mod( 'page_background_color' );
$maincolor = get_theme_mod( 'main_text_color' ); 
$contentcolor = get_theme_mod( 'content_title_color' ); 
?>
body#tinymce {
  background-color: <?php echo $backgroundcolor; ?>
}

p.block-text {
  color: <?php echo $maincolor; ?>;
  border-color: <?php echo $contentcolor; ?> !important;
}

<?php 