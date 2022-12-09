<?php

namespace Theme;

class Performance {

	public function remove_svg_filters() {
		remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
		remove_action( 'in_admin_header', 'wp_global_styles_render_svg_filters' );
	}

	public function jquery_from_google() {
		if ( is_admin() ) {
			return;
		}

		global $wp_scripts;
		if ( isset( $wp_scripts->registered['jquery']->ver ) ) {
			$ver     = $wp_scripts->registered['jquery']->ver;
				$ver = str_replace( '-wp', '', $ver );
		} else {
			$ver = '1.12.4';
		}

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', "//ajax.googleapis.com/ajax/libs/jquery/$ver/jquery.min.js", false, $ver, true );
	}

	public function remove_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'emoji_svg_url', '__return_false' );
	}

	public function disable_embeds() {
		global $wp;

		$wp->public_query_vars = array_diff( $wp->public_query_vars, array( 'embed' ) );

		add_filter( 'embed_oembed_discover', '__return_false' );

		remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

		remove_action( 'wp_head', 'wp_oembed_add_host_js' );

		add_filter( 'tiny_mce_plugins', 'kit_disable_embeds_tiny_mce_plugin' );

		add_filter( 'rewrite_rules_array', 'kit_disable_embeds_rewrites' );

		remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
	}

	public function remove_block_styles() {
		wp_deregister_style( 'wp-block-library' );
		wp_deregister_style( 'wp-block-library-theme' );
		wp_deregister_style( 'wc-block-style' );
		wp_deregister_style( 'global-styles' );

		remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	}

}

$performance = new Performance();

$performance_methods = get_class_methods( $performance );

foreach ( $performance_methods as $functions ) {
	add_action( 'init', array( $performance, $functions ) );
}