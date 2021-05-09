<?php
/**
 * Renders the home posts for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

$home_args  = [
	'posts_per_page' => get_option( 'post_per_page' ),
	'paged'          => $args['paged'],
	'post__not_in'   => $do_not_duplicate,
];
$home_posts = new WP_Query( $home_args );

if ( $home_posts->have_posts() ) :
	while ( $home_posts->have_posts() ) :
		$home_posts->the_post();
		get_template_part( 'template-parts/front-page/home', 'post' );
	endwhile;
	wp_rig()->page_navi( $home_posts );
endif;
wp_reset_postdata();
