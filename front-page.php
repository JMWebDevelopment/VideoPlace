<?php
/**
 * Render your site front page, whether the front page displays the blog posts index or a static page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

get_header();

wp_rig()->print_styles( 'wp-rig-content', 'wp-rig-front-page' );
wp_rig()->print_styles( 'wp-rig-sidebar' );

?>
	<main id="primary" class="site-main">
		<div class="row" id="top-post">
			<?php get_template_part( 'template-parts/front-page/top', 'post' ); ?>
		</div>

		<div id="inner-content" class="row home-posts-section">

			<div class="home-posts large-8 medium-12 small-12 columns">
				<?php get_template_part( 'template-parts/front-page/home', 'posts' ); ?>
			</div>

			<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->
	</main><!-- #primary -->
<?php
get_footer();
