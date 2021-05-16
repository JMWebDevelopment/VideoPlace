<?php
/**
 * WP_Rig\WP_Rig\Customizer\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Customizer;

use WP_Rig\WP_Rig\Component_Interface;
use function WP_Rig\WP_Rig\wp_rig;
use WP_Customize_Manager;
use function add_action;
use function bloginfo;
use function wp_enqueue_script;
use function get_theme_file_uri;

/**
 * Class for managing Customizer integration.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'customizer';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'customize_register', [ $this, 'action_customize_register' ] );
		add_action( 'customize_preview_init', [ $this, 'action_enqueue_customize_preview_js' ] );
	}

	/**
	 * Adds postMessage support for site title and description, plus a custom Theme Options section.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
	 */
	public function action_customize_register( WP_Customize_Manager $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				[
					'selector'        => '.site-title a',
					'render_callback' => function() {
						bloginfo( 'name' );
					},
				]
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				[
					'selector'        => '.site-description',
					'render_callback' => function() {
						bloginfo( 'description' );
					},
				]
			);
		}

		/**
		 * Theme options.
		 */
		$wp_customize->add_section(
			'theme_options',
			[
				'title'    => __( 'VideoPlace Settings', 'wp-rig' ),
				'priority' => 130, // Before Additional CSS.
			]
		);

		// Display site title and description with header.
		$wp_customize->add_setting(
			'videoplace-header-text',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_checkbox' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-header-text',
			[
				'label'     => __( 'Display the site title and description when a custom header image is in use: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'checkbox',
			]
		);

		$schemes['light'] = __( 'Light', 'wp-rig' );
		$schemes['dark']  = __( 'Dark', 'wp-rig' );

		// Select color scheme.
		$wp_customize->add_setting(
			'videoplace-color-scheme',
			[
				'default'           => 'dark',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_select' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-color-scheme',
			[
				'label'     => __( 'Color Scheme', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'select',
				'choices'   => $schemes,
			]
		);

		// Show sticky post.
		$wp_customize->add_setting(
			'videoplace-show-sticky-post',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_checkbox' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-show-sticky-post',
			[
				'label'     => __( 'Show Latest Sticky Post at top of home page: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'checkbox',
			]
		);

		$wp_customize->add_setting(
			'videoplace-show-comments-number',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_checkbox' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-show-comments-number',
			[
				'label'     => __( 'Display the number of comments on the home, index and archive pages: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'checkbox',
			]
		);

		// Social links.
		// Facebook.
		$wp_customize->add_setting(
			'videoplace-facebook',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_link' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-facebook',
			[
				'label'     => __( 'Link to Facebook Page/Profile: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'text',
			]
		);

		// Twitter.
		$wp_customize->add_setting(
			'videoplace-twitter',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_link' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-twitter',
			[
				'label'     => __( 'Link to Twitter Profile: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'text',
			]
		);

		// YouTube.
		$wp_customize->add_setting(
			'videoplace-youtube',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_link' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-youtube',
			[
				'label'     => __( 'Link to YouTube Channel: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'text',
			]
		);

		// Tumblr.
		$wp_customize->add_setting(
			'videoplace-tumblr',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_link' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-tumblr',
			[
				'label'     => __( 'Link to Tumblr Blog: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'text',
			]
		);

		// Instagram.
		$wp_customize->add_setting(
			'videoplace-instagram',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_link' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-instagram',
			[
				'label'     => __( 'Link to Instagram Profile: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'text',
			]
		);

		// RSS Feed.
		$wp_customize->add_setting(
			'videoplace-rss-feed',
			[
				'default'           => '',
				'sanitize_callback' => [ $this, 'videoplace_sanitize_link' ],
			]
		);

		$wp_customize->add_control(
			'videoplace-rss-feed',
			[
				'label'     => __( 'Link to Custom RSS Feed: ', 'wp-rig' ),
				'section'   => 'theme_options',
				'type'      => 'text',
			]
		);

	}

	/**
	 * Enqueues JavaScript to make Customizer preview reload changes asynchronously.
	 */
	public function action_enqueue_customize_preview_js() {
		wp_enqueue_script(
			'wp-rig-customizer',
			get_theme_file_uri( '/assets/js/customizer.min.js' ),
			[ 'customize-preview' ],
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/customizer.min.js' ) ),
			true
		);
	}

	public function videoplace_sanitize_link( $input ) {
		return esc_url_raw( $input );
	}


	public function videoplace_sanitize_checkbox( $input ) {
		return ( ( isset( $input ) && true === $input ) ? 1 : 0 );
	}

	public function videoplace_sanitize_num( $input, $setting ) {
		$input = absint( $input );
		return ( $input ? $input : $setting->default );
	}

	public function videoplace_sanitize_select( $input, $setting ) {
		$input   = sanitize_key( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}
