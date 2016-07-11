<?php
header("Content-type: text/css; charset: UTF-8");
header('Cache-control: must-revalidate');
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);
  
$backgroundcolor = get_theme_mod( 'page_background_color' );
$secondarycolor = get_theme_mod( 'secondary_text_color' ); 
$contentcolor = get_theme_mod( 'content_title_color' ); 
//var_dump(get_theme_mods());
?>
body#tinymce {
  background-color: <?php echo $backgroundcolor; ?>
}

p.block-text {
  color: <?php echo $secondarycolor; ?>;
  border-color: <?php echo $contentcolor; ?>;
}

<?php 