<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>

					<div id="post-<?php the_ID(); ?>" <?php post_class( 'page-post' ); ?> role="article">

						<?php get_template_part( 'template-parts/page/top' ); ?>

						<?php get_template_part( 'template-parts/page/bottom' ); ?>

					</div> <!-- end article -->

					<?php
				endwhile;
			endif;
			?>

		</main><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>
<?php
get_footer();
