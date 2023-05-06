<?php

/**
 * Remove SVG Filters
 *
 * @since 1.0.0
 * @return void
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
add_action(
	'init',
	function() {
		remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
		remove_action( 'in_admin_header', 'wp_global_styles_render_svg_filters' );
	}
);


/**
 * Remove Emojis
 *
 * @since 1.0.0
 * @return void
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
add_action(
	'init',
	function() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'emoji_svg_url', '__return_false' );
	}
);

/**
 * Disable Embeds
 *
 * @since 1.0.0
 * @return void
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
add_action(
	'init',
	function() {
		global $wp;

		$wp->public_query_vars = array_diff( $wp->public_query_vars, array( 'embed' ) );

		add_filter( 'embed_oembed_discover', '__return_false' );
		remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
	}
);

/**
 * Remove Gutenberg Styles
 *
 * @since 1.0.0
 * @return void
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
add_action(
	'init',
	function() {
		/**
		 * Disables Gutenberg Styles.
		 */
		wp_deregister_style( 'wp-block-library' );
		wp_deregister_style( 'wp-block-library-theme' );
		wp_deregister_style( 'wc-block-style' );
		wp_deregister_style( 'global-styles' );
		remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );

		/**
		 * Fix Gutenberg Usage.
		 */
		add_filter( 'use_block_editor_for_post', '__return_false' );
		add_filter( 'use_block_editor_for_post_type', '__return_false' );
		add_filter( 'use_widgets_block_editor', '__return_false' );
	}
);

/**
 * Disable Classic Theme Styles
 */
add_filter(
	'wp_enqueue_scripts',
	function() {
		wp_deregister_style( 'classic-theme-styles' );
		wp_dequeue_style( 'classic-theme-styles' );
	},
	100
);

/**
 * Clear Admin Widgets
 *
 * @since 1.0.0
 * @return void
 */
add_action(
	'admin_init',
	function() {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	}
);