<?php
 /**
  *  Template part for when the Grid Archive Layout is chosen
  */
$colwidth = get_theme_mod('basic-col-width');
?>
<ul id="basic-grid" class="basic-grid <?php echo $colwidth; ?>">
<?php
// Start the loop.
while ( have_posts() ) : the_post();

  /*
   * Include the Post-Format-specific template for the content.
   * If you want to override this in a child theme, then include a file
   * called content-___.php (where ___ is the Post Format name) and that will be used instead.
   */
  get_template_part( 'template-parts/content', 'grid-basic' );

// End the loop.
endwhile; ?>

</ul>
