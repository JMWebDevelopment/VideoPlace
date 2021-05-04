<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

?>
	<main id="primary" class="site-main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'row video-top' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<?php if ( has_post_format( 'image' ) ) { ?>
				<div class="photo large-8 medium-12 small-12 columns">
					<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail('wprig-featured-image');
					} else {
						$media = get_attached_media( 'image' );
						foreach ( $media as $image ) {
							echo '<img width="800" height="440" src="' . esc_url( $image->guid ) . '" />';
							break;
						}
					} ?>
				</div>
			<?php } elseif ( has_post_format( 'video' ) ) { ?>
				<div class="video large-8 medium-12 small-12 columns">
					<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="videoplace-featured-image">
							<?php the_post_thumbnail('videoplace-featured-image'); ?>
						</div>
					<? } ?>
				</div>
			<?php } else { ?>
				<div class="video large-8 medium-12 small-12 columns">
					<?php echo wp_rig()->media_grabber( array( 'split_media' => true ) ); ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="videoplace-featured-image">
							<?php the_post_thumbnail('videoplace-featured-image'); ?>
						</div>
					<? } ?>
				</div>
			<?php } ?>


			<div class="large-4 medium-12 small-12 columns article-details">
				<header class="article-header">
					<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
					<div class="post-details clearfix">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
						<h4 class="post-detail"><?php echo __( 'Posted by ', 'videoplace' ); the_author_posts_link(); echo __( ' on ', 'videoplace' ); the_date( get_option( 'date_format' ) ); ?></h4>
					</div>
					<?php the_excerpt(); ?>
					<p class="tags"><?php the_tags('<span class="the-tag">', '</span><span class="the-tag">', '</span>'); ?></p>	</footer> <!-- end article footer -->
				</header> <!-- end article header -->
			</div>


		</article> <!-- end article -->

		<div class="row">
			<div class="post-more large-8 medium-12 small-12 columns">
				<section class="entry-content clearfix" itemprop="articleBody">
					<?php
						if ( has_post_format( 'image' ) ) {
							$content = get_the_content();
							$content = preg_replace( "/<img[^>]+\>/i", "", $content, 1 );
							echo $content;
						} else {
							the_content();
						}
					?>
				</section> <!-- end article section -->

				<?php comments_template(); ?>

				<?php wp_rig()->related_posts(); ?>

			</div>

			<?php endwhile;?>

			<?php endif; ?>

		</div>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();
