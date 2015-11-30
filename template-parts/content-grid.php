<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium_large' );
	$url = $thumb['0'];
	$content = get_the_content();
	$trimmed_content = wp_trim_words( $content, '50');

	$cats = array();
	foreach(wp_get_post_categories($post->ID) as $c)
	{
		$cat = get_category($c);
		array_push($cats,$cat->name);
	}

	if(sizeOf($cats)>0)
	{
		$post_categories = implode(',',$cats);
	} else {
		$post_categories = "Uncategorized";
	}

?>

<li>
	<a href="<?php echo get_the_permalink($post->ID); ?>" data-largesrc="<?php echo $url; ?>" data-title="<?php the_title( '', '' ); ?>" data-description="<?php echo strip_shortcodes($trimmed_content); ?>">
		<?php //echo the_title('<h3>','', true) . ' ' . the_date('F j, Y', '<br /><em>', '</em></h3>', true); ?>
		<?php echo the_post_thumbnail( 'recentposts', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>
</li>
