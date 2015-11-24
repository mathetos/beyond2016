<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Beyond 2016 1.0
 */

get_header('404'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php echo apply_filters( 'beyond2016_404_title', _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ) ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php echo apply_filters('beyond2016_404_text', _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ) ); ?></p>

					<?php
					echo do_shortcode('[ezas name="Test Search" /]');
					//get_search_form(); ?>
				</div><!-- .page-content -->
				<div class="error404-recent-posts">
					<?php
						$newargs = array(
							'numberposts' => 3,
							'post_type' => 'post',
							'post_status' => 'publish',
							'suppress_filters' => false
						);
						do_action('beyond2016_recent_posts', $newargs);
						?>
				</div>
			</section><!-- .error-404 -->

		</main><!-- .site-main -->

	</div><!-- .content-area -->

<?php get_footer(); ?>
