<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<?php apply_filters('beyond2016_before_blog_intro', '');
				$archtitle = get_theme_mod('archive_intro_title');
				$archintrotext = get_theme_mod('archive_intro_text');
				$archlayout = get_theme_mod('archive_layout');
				?>

			<div class="blog-intro">
				<h1><?php echo $archtitle; ?></h1>
				<p><?php echo esc_html($archintrotext); ?></p>
			</div>

			<?php apply_filters('beyond2016_after_blog_intro', '');
			switch($archlayout) {
				case '0' :
					get_template_part( 'template-parts/layout', 'archive-full-text' );
					break;
				case '1' :
					get_template_part( 'template-parts/layout', 'archive-excerpt' );
					break;
				case '2' :
					get_template_part( 'template-parts/layout', 'archive-grid' );
					break;
				case '3' :
					get_template_part( 'template-parts/layout', 'archive-grid-expander' );
					break;
				default :
					get_template_part( 'template-parts/layout', 'archive-full-text' );
			}
			?>

		<?php
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
