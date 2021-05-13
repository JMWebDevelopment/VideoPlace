<?php
/**
 * Renders the top post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$cats = get_the_category();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-video-post' ); ?>>
	<p class="post-category"><?php echo esc_html( $cats[0]->name ); ?></p>
	<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="photo-video">
		<?php
		if ( has_post_format( 'image' ) ) {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'videoplace-featured-image' );
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
					<?php the_post_thumbnail( 'videoplace-featured-image' ); ?>
				</div>
				<?php
			}
		} else {
			echo wp_rig()->media_grabber( array( 'split_media' => true ) );
			if ( has_post_thumbnail() ) {
				?>
				<div class="videoplace-featured-image">
					<?php the_post_thumbnail( 'videoplace-featured-image' ); ?>
				</div>
				<?php
			}
			?>
			<?php
		}
		?>
	</div>
	<div class="post-details clearfix">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
		<h4 class="post-detail">
			<?php
			esc_html_e( 'Posted by ', 'wp-rig' );
			the_author_posts_link();
			esc_html_e( ' on ', 'wp-rig' );
			the_date( get_option( 'date_format' ) );
			if ( get_theme_mod( 'videoplace-show-comments-number' ) == 1 ) {
				comments_popup_link( __( ', 0 Comments', 'wp-rig' ), __( ', 1 Comment', 'wp-rig' ), __( '. % Comments', 'wp-rig' ), '', __( ', Comments Closed', 'wp-rig' ) );
			}
			?>
		</h4>
	</div>
	<a href="<?php the_permalink(); ?>" class="button white"><?php esc_html_e( 'View Video Info', 'wp-rig' ); ?></a>
</article>
