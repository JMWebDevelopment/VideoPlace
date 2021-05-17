<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );
wp_rig()->load_light_styles();

?>
	<main id="primary" class="site-main">
		<div class="page-header">
			<h1 class="archive-title"><?php the_archive_title();?></h1>
		</div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<!-- To see additional archive styles, visit the /parts directory -->
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-video-post' ); ?>>
				<h5 class="post-category"><?php $cats = get_the_category(); echo $cats[ 0 ]->name; ?></h5>
				<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="photo-video">
					<?php if ( has_post_format( 'image' ) ) { ?>
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('videoplace-featured-image');
						} else {
							$media = get_attached_media( 'image' );
							foreach ( $media as $image ) {
								echo '<img width="800" height="440" src="' . esc_url( $image->guid ) . '" />';
								break;
							}
						} ?>
					<?php } elseif ( has_post_format( 'video' ) ) { ?>
						<?php echo hybrid_media_grabber( array( 'split_media' => true ) ); ?>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="videoplace-featured-image">
								<?php the_post_thumbnail('videoplace-featured-image'); ?>
							</div>
						<? } ?>
					<?php } else { ?>
						<?php echo hybrid_media_grabber( array( 'split_media' => true ) ); ?>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="videoplace-featured-image">
								<?php the_post_thumbnail('videoplace-featured-image'); ?>
							</div>
						<? } ?>
					<?php } ?>
				</div>
				<div class="post-details clearfix">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
					<h4 class="post-detail"><?php echo __( 'Posted by ', 'videoplace' ); the_author_posts_link(); echo __( ' on ', 'videoplace' ); the_date( get_option( 'date_format' ) ); if ( get_theme_mod( 'videoplace-show-comments-number' ) == 1 ) { comments_popup_link( __( ', 0 Comments', 'videoplace' ), __( ', 1 Comment', 'videoplace' ), __( '. % Comments', 'videoplace' ), '', __( ', Comments Closed', 'videoplace' ) ); } ?></h4>
				</div>
				<a href="<?php the_permalink(); ?>" class="button white"><?php _e( 'View Video Info', 'videoplace' ); ?></a>
			</article>

		<?php endwhile; ?>

			<?php videoplace_page_navi(); ?>

		<?php endif; ?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();
