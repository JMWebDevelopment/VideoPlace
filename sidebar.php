<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_primary_sidebar_active() ) {
	return;
}

?>
<aside id="secondary" class="primary-sidebar widget-area">
	<?php
	if ( is_author() ) {
		?>
		<aside id="author-bio1" class="widget author-bio">
			<?php the_post(); ?>
			<div class="mugshot"><?php echo get_avatar( get_the_author_meta( 'ID' ), $size = 100 ); ?></div>
			<h4 class="author-name"><?php echo esc_html__( 'About ', 'wp-rig' ) . get_the_author_meta( 'display_name' ); ?></h4>
			<p class="bio"><?php echo get_the_author_meta( 'description' ); ?></p>
			<a href="mailto:<?php echo esc_attr( get_the_author_meta( 'email' ) ); ?>" target="_blank" class="button white"><?php esc_html_e( 'Message Me', 'wp-rig' ); ?></a>
			<?php rewind_posts(); ?>
		</aside>
		<?php
	}
	?>

	<?php wp_rig()->display_primary_sidebar(); ?>
</aside><!-- #secondary -->
