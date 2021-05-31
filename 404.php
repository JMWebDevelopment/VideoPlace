<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );
wp_rig()->print_styles( 'wp-rig-page' );
wp_rig()->print_styles( 'wp-rig-sidebar', 'wp-rig-widgets' );
wp_rig()->load_light_styles();

?>
	<div class="page-container">
		<main id="primary" class="site-main">
			<div id="post-<?php the_ID(); ?>" <?php post_class( 'page-post' ); ?> role="article">

				<header class="article-header">
					<h1><?php esc_html_e( '404', 'wp-rig' ); ?></h1>
				</header> <!-- end article header -->

				<section class="entry-content">
					<h3><?php esc_html_e( 'Whoops! Content not found!', 'wp-rig' ); ?></h3>
					<p><?php esc_html_e( 'We\'re terribly sorry, but we couldn\'t find what you were looking for. It might have been removed. We suggesting going to the home page or using the search form to look through our content. In the meantime, here\'s one of our amazing videos!', 'wp-rig' ); ?></p>
				</section> <!-- end article section -->

				<section class="search">
					<p><?php get_search_form(); ?></p>
				</section> <!-- end search section -->

			</div>

		</main><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
<?php
get_footer();
