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

// Use grid layout if blog index is displayed.
if ( is_home() ) {
	wp_rig()->print_styles( 'wp-rig-content', 'wp-rig-front-page' );
} else {
	wp_rig()->print_styles( 'wp-rig-content', 'wp-rig-front-page' );
}
wp_rig()->print_styles( 'wp-rig-sidebar' );

?>
	<main id="primary" class="site-main">
		<div class="row" id="top-post">
			<?php
				if (esc_attr(get_theme_mod('videoplace-show-sticky-post')) == 1) {
					$top_post_args = array(
						'posts_per_page'      => 1,
						'post__in'            => get_option( 'sticky_posts' )
					);
				} else {
					$top_post_args = array(
						'posts_per_page'      => 1,
						'ignore_sticky_posts' => 1
					);
				}
				$top_post = new WP_Query($top_post_args);
				if ( $top_post->have_posts() ) : while ( $top_post->have_posts() ) : $top_post->the_post(); $do_not_duplicate[] = $post->ID;
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php if ( has_post_format( 'image' ) ) { ?>
							<div class="photo large-8 medium-12 small-12 columns">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('wprig-featured-image');
								} else {
									$media = get_attached_media( 'image' );
									foreach ( $media as $image ) {
										echo '<img width="800" height="440" src="' . esc_url( $image->guid ) . '" />';
										break;
									}
								} ?>
							</div>
						<?php } elseif ( has_post_format( 'video' ) ) { ?>
							<div class="video large-8 medium-12 small-12 columns">
								<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="videoplace-featured-image">
										<?php the_post_thumbnail('wprig-featured-image'); ?>
									</div>
								<? } ?>
							</div>
						<?php } else { ?>
							<div class="video large-8 medium-12 small-12 columns">
								<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
								<?php if ( has_post_thumbnail() ) { ?>
									<div class="videoplace-featured-image">
										<?php the_post_thumbnail('wprig-featured-image'); ?>
									</div>
								<? } ?>
							</div>
						<?php } ?>
						<div class="details large-4 medium-12 small-12 columns">
							<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-details clearfix">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
								<p class="post-detail"><?php echo __( 'Posted by ', 'videoplace' ); the_author_posts_link(); echo __( ' on ', 'videoplace' ); the_date( get_option( 'date_format' ) ); if ( get_theme_mod( 'videoplace-show-comments-number' ) == 1 ) { comments_popup_link( __( ', 0 Comments', 'videoplace' ), __( ', 1 Comment', 'videoplace' ), __( '. % Comments', 'videoplace' ), '', __( ', Comments Closed', 'videoplace' ) ); } ?></p>
							</div>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="button white"><?php _e( 'View Video Info', 'videoplace' ); ?></a>
						</div>
					</article>
				<?php endwhile; endif; wp_reset_query(); ?>
		</div>

		<div id="inner-content" class="row home-posts-section">

			<div class="home-posts large-8 medium-12 small-12 columns">
				<?php
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$home_args = array(
						'posts_per_page' 	=> get_option( 'post_per_page' ),
						'paged' 			=> $paged,
						'post__not_in' 		=> $do_not_duplicate
					);
					$home_posts = new WP_Query($home_args);
					if ($home_posts->have_posts()) : while ($home_posts->have_posts()) : $home_posts->the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'video-post' ); ?>>
							<h5 class="post-category"><?php $cats = get_the_category(); echo $cats[ 0 ]->name; ?></h5>
							<div class="photo-video">
								<?php if ( has_post_format( 'image' ) ) { ?>
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('wprig-featured-image');
									} else {
										$media = get_attached_media( 'image' );
										foreach ( $media as $image ) {
											echo '<img width="800" height="440" src="' . esc_url( $image->guid ) . '" />';
											break;
										}
									} ?>
								<?php } elseif ( has_post_format( 'video' ) ) { ?>
									<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="videoplace-featured-image">
											<?php the_post_thumbnail('wprig-featured-image'); ?>
										</div>
									<? } ?>
								<?php } else { ?>
									<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="videoplace-featured-image">
											<?php the_post_thumbnail('wprig-featured-image'); ?>
										</div>
									<? } ?>
								<?php } ?>
							</div>
							<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-details clearfix">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
								<p class="post-detail"><?php echo __( 'Posted by ', 'videoplace' ); the_author_posts_link(); echo __( ' on ', 'videoplace' ); echo get_the_time( get_option( 'date_format' ) ); if ( get_theme_mod( 'videoplace-show-comments-number' ) == 1 ) { comments_popup_link( __( ', 0 Comments', 'videoplace' ), __( ', 1 Comment', 'videoplace' ), __( '. % Comments', 'videoplace' ), '', __( ', Comments Closed', 'videoplace' ) ); } ?></p>
							</div>
							<a href="<?php the_permalink(); ?>" class="button white"><?php _e( 'View Video Info', 'videoplace' ); ?></a>
						</article>
					<?php endwhile; /* wp_rig()->page_navi(); */ endif; wp_reset_query(); ?>
			</div>

			<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->
	</main><!-- #primary -->
<?php
get_footer();
