<?php ?>
<div class="by16-col">
  <?php
  $cats = get_the_category($recent["ID"]);
  $cat_name = $cats[0]->name;

    echo '<a href="' . get_permalink($recent["ID"]) . '">';
      echo get_the_post_thumbnail($recent["ID"], 'recentposts');
      echo '<h4>' . $recent["post_title"] . '</h4>';
      echo '<p><span class="genericon genericon-month"></span> ';
      echo get_the_date("F d, Y",$recent["ID"] );
      echo '<br /><span class="genericon genericon-tag"></span> ' . $cat_name;
    echo '</p></a></div>';
