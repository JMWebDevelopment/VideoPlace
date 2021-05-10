<?php
/**
 * Renders the top post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

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
				<?php the_post_thumbnail( 'videoplace-featured-image' ); ?>
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
				<?php the_post_thumbnail( 'videoplace-featured-image' ); ?>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}
?>
