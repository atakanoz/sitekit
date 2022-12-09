<?php

namespace Theme;

class Performance extends Kit {

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

	public function remove_emojis_tinymce() {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}

	public function disable_emojis_prefetch() {
		if ( 'dns-prefetch' == $relation_type ) {
			$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2.2.1/svg/' );
			$urls          = array_diff( $urls, array( $emoji_svg_url ) );
		}
		return $urls;
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

}

$performance = new Performance();

add_action( 'init', array( $performance, 'remove_svg_filters' ) );
add_action( 'init', array( $performance, 'remove_emojis' ) );
add_action( 'init', array( $performance, 'jquery_from_google' ) );