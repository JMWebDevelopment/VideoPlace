<?php
/**
 * Renders the top post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

?>

<section class="entry-content" itemprop="articleBody">
	<h1 class="page-title"><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<?php wp_link_pages(); ?>
</section> <!-- end article section -->

<?php comments_template(); ?>
