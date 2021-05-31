<?php
/**
 * Renders the top post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( wp_rig()->media_grabber( array( 'split_media' => true ) ) ) {
	?>
	<header class="article-header">
		<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
	</header> <!-- end article header -->
	<?php
} else {
	if ( has_post_thumbnail() ) {
		?>
		<header class="article-header">
			<div class="videoplace-featured-image">
				<?php the_post_thumbnail( 'videoplace-featured-image' ); ?>
			</div>
		</header> <!-- end article header -->
		<?php
	}
}
