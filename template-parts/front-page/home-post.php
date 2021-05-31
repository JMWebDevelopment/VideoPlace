<?php
/**
 * Renders a post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'video-post' ); ?>>
	<p class="post-category">
		<?php
		$the_category = get_the_category();
		echo wp_kses_post( $the_category[0]->name );
		?>
	</h5>
	<div class="photo-video">
		<?php
		if ( has_post_format( 'image' ) ) {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'wprig-featured-image' );
			} else {
				$media = get_attached_media( 'image' );
				foreach ( $media as $image ) {
					echo '<img width="800" height="440" src="' . esc_url( $image->guid ) . '" />';
					break;
				}
			}
		} elseif ( has_post_format( 'video' ) ) {
			echo wp_rig()->media_grabber( array( 'split_media' => true ) );

			if ( has_post_thumbnail() ) {
				?>
				<div class="videoplace-featured-image">
					<?php the_post_thumbnail( 'wprig-featured-image' ); ?>
				</div>
				<?php
			}
		} else {
			echo wp_rig()->media_grabber( array( 'split_media' => true ) );
			if ( has_post_thumbnail() ) {
				?>
				<div class="videoplace-featured-image">
					<?php the_post_thumbnail( 'wprig-featured-image' ); ?>
				</div>
				<?php
			}
		}
		?>
	</div>
	<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="post-details clearfix">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
		<p class="post-detail">
			<?php
			esc_html_e( 'Posted by ', 'wp-rig' );
			the_author_posts_link();
			esc_html_e( ' on ', 'wp-rig' );
			echo esc_html( get_the_time( get_option( 'date_format' ) ) );
			if ( 1 === get_theme_mod( 'videoplace-show-comments-number' ) ) {
				comments_popup_link( esc_html__( ', 0 Comments', 'wp-rig' ), esc_html__( ', 1 Comment', 'wp-rig' ), esc_html__( '. % Comments', 'wp-rig' ), '', esc_html__( ', Comments Closed', 'wp-rig' ) );
			}
			?>
		</p>
	</div>
	<a href="<?php the_permalink(); ?>" class="button white"><?php esc_html_e( 'View Video Info', 'wp-rig' ); ?></a>
</article>
