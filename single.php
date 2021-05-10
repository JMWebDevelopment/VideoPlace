<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );
wp_rig()->print_styles( 'wp-rig-single' );

?>
	<main id="primary" class="site-main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>

				<div id="post-<?php the_ID(); ?>" <?php post_class( 'row video-top' ); ?> role="article">

					<div class="row video-top">

						<?php get_template_part( 'template-parts/post/top' ); ?>

					</div>

				</div> <!-- end article -->

				<div class="row">

					<?php get_template_part( 'template-parts/post/bottom' ); ?>

				<?php
				get_sidebar();

			endwhile;
		endif;
		?>

		</div>
	</main><!-- #primary -->
<?php
get_footer();
