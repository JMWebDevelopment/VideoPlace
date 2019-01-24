<?php
/**
 * The template for displaying all single posts and pages
 *
 * If posts and pages use the same template, singular.php can be used.
 * This template is ignored if single.php and/or page.php is present.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/#singular-php
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

/*
 * Include the component stylesheet for the content.
 * This call runs only once on index and archive pages.
 * At some point, override functionality should be built in similar to the template part below.
 *
 * Note: If this was already done it will be skipped.
 */
wp_print_styles( array( 'wp-rig-content' ) );

?>
	<main id="primary" class="site-main">
		<?php

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content/entry', get_post_type() );
		}
		?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();