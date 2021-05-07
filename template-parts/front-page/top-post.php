<?php
/**
 * Renders the top post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

if ( 1 === esc_attr( get_theme_mod( 'videoplace-show-sticky-post' ) ) ) {
	$top_post_args = [
		'posts_per_page' => 1,
		'post__in'       => get_option( 'sticky_posts' ),
	];
} else {
	$top_post_args = [
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => 1,
	];
}
$top_post = new WP_Query( $top_post_args );

if ( $top_post->have_posts() ) :
	while ( $top_post->have_posts() ) :
		$top_post->the_post();
		$do_not_duplicate[] = $post->ID;
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			if ( has_post_format( 'image' ) ) {
				?>
				<div class="photo large-8 medium-12 small-12 columns">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'wprig-featured-image' );
					} else {
						$media = get_attached_media( 'image' );
						foreach ( $media as $image ) {
							echo '<img width="800" height="440" src="' . esc_url( $image->guid ) . '" />';
							break;
						}
					}
					?>
				</div>
				<?php
			} elseif ( has_post_format( 'video' ) ) {
				?>
				<div class="video large-8 medium-12 small-12 columns">
					<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
					<?php
					if ( has_post_thumbnail() ) {
						?>
						<div class="videoplace-featured-image">
							<?php the_post_thumbnail( 'wprig-featured-image' ); ?>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			} else {
				?>
				<div class="video large-8 medium-12 small-12 columns">
					<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
					<?php
					if ( has_post_thumbnail() ) {
						?>
						<div class="videoplace-featured-image">
							<?php the_post_thumbnail( 'wprig-featured-image' ); ?>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
			<div class="details large-4 medium-12 small-12 columns">
				<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-details clearfix">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
					<p class="post-detail">
						<?php
						esc_html_e( 'Posted by ', 'wp-rig' );
						the_author_posts_link();
						esc_html_e( ' on ', 'wp-rig' );
						the_date( get_option( 'date_format' ) );
						if ( 1 === get_theme_mod( 'videoplace-show-comments-number' ) ) {
							comments_popup_link( esc_html__( ', 0 Comments', 'wp-rig' ), esc_html__( ', 1 Comment', 'wp-rig' ), esc_html__( '. % Comments', 'wp-rig' ), '', esc_html__( ', Comments Closed', 'wp-rig' ) );
						}
						?>
					</p>
				</div>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="button white"><?php esc_html_e( 'View Video Info', 'wp-rig' ); ?></a>
			</div>
		</article>
		<?php
	endwhile;
endif;
wp_reset_postdata();
