<?php
/**
 * Renders the top post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

?>

<div class="post-more large-8 medium-12 small-12 columns">
	<section class="entry-content clearfix" itemprop="articleBody">
		<?php
		if ( has_post_format( 'image' ) ) {
			$content = get_the_content();
			$content = preg_replace( '/<img[^>]+\>/i', '', $content, 1 );
			echo $content;
		} else {
			the_content();
		}
		?>
	</section> <!-- end article section -->

	<?php comments_template(); ?>

	<?php wp_rig()->related_posts(); ?>

</div>
