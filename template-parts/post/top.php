<?php
/**
 * Renders the top post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

get_template_part( 'template-parts/post/video' );

get_template_part( 'template-parts/post/details' );
