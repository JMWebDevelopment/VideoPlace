<?php
/**
 * Renders the top post for the front page.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>
<div class="large-4 medium-12 small-12 columns article-details">
	<header class="article-header">
		<h1 class="entry-title single-title"><?php the_title(); ?></h1>
		<div class="post-details clearfix">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
			<h4 class="post-detail">
				<?php
				esc_html_e( 'Posted by ', 'wp-rig' );
				the_author_posts_link();
				esc_html_e( ' on ', 'wp-rig' );
				the_date( get_option( 'date_format' ) );
				?>
			</h4>
		</div>
		<?php the_excerpt(); ?>
		<p class="tags"><?php the_tags( '<span class="the-tag">', '</span><span class="the-tag">', '</span>' ); ?></p>
	</header> <!-- end article header -->
</div>
