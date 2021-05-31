<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );
wp_rig()->print_styles( 'wp-rig-archive' );
wp_rig()->print_styles( 'wp-rig-sidebar', 'wp-rig-widgets' );
wp_rig()->load_light_styles();

global $wp_query;

?>
	<div class="archive-container">
		<main id="primary" class="site-main">
			<div class="page-header">
				<h1 class="archive-title"><?php the_archive_title(); ?></h1>
			</div>

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/archive/post' );

				endwhile;

				wp_rig()->page_navi( $wp_query );
			endif;
			?>
		</main><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
<?php
get_footer();
