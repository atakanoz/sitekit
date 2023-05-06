<?php

add_action(
	'after_setup_theme',
	function() {
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 *
		 * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
		 */
		load_theme_textdomain( wp_get_theme()->get( 'TextDomain' ), get_template_directory() . '/languages' );

		/**
			 * Register the editor color palette.
			 *
			 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
			 */
		add_theme_support( 'editor-color-palette', array() );

		/**
		 * Register the editor color gradient presets.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-gradient-presets
		 */
		add_theme_support( 'editor-gradient-presets', array() );

		/**
		 * Register the editor font sizes.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-font-sizes
		 */
		add_theme_support( 'editor-font-sizes', array() );

		/**
		 * Register relative length units in the editor.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#support-custom-units
		 */
		add_theme_support( 'custom-units' );

		/**
		 * Enable support for custom line heights in the editor.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#supporting-custom-line-heights
		 */
		add_theme_support( 'custom-line-height' );

		/**
		 * Enable support for custom block spacing control in the editor.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#spacing-control
		 */
		add_theme_support( 'custom-spacing' );

		/**
		 * Disable custom colors in the editor.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
		 */
		add_theme_support( 'disable-custom-colors' );

		/**
		 * Disable custom color gradients in the editor.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-gradients
		 */
		add_theme_support( 'disable-custom-gradients' );

		/**
		 * Disable custom font sizes in the editor.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
		 */
		add_theme_support( 'disable-custom-font-sizes' );

		/**
		 * Disable the default block patterns.
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
		 */
		remove_theme_support( 'core-block-patterns' );

		/**
		 * Enable plugins to manage the document title.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable post thumbnail support.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Enable wide alignment support.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Enable responsive embed support.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
		 */
		add_theme_support( 'responsive-embeds' );

		/**
		 * Enable HTML5 markup support.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
		 */
		add_theme_support(
			'html5',
			array(
				'caption',
				'comment-form',
				'comment-list',
				'gallery',
				'search-form',
				'script',
				'style',
			)
		);

		/**
		 * Enable selective refresh for widgets in customizer.
		 *
		 * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Custom logo support.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/custom-logo/
		 */
		add_theme_support( 'custom-logo' );

		/**
		 * Automatic feed links support.
		 *
		 * @link https://codex.wordpress.org/Automatic_Feed_Links#:~:text=Automatic%20Feed%20Links%20is%20a,the%20deprecated%20automatic_feed_links()%20function
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Custom headers support.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
		 */
		add_theme_support( 'custom-header' );

		/**
		 * Custom background support.
		 *
		 * @link https://codex.wordpress.org/Custom_Backgrounds
		 */
		add_theme_support( 'custom-background' );

		/**
		 * Default block styles
		 *
		 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#default-block-styles
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * Responsive embeds support.
		 *
		 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
		 */
		add_theme_support( 'responsive-embeds' );

		/**
		 * Wide alignment support.
		 *
		 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#wide-alignment
		 */
		add_theme_support( 'align-wide' );
	}
);



/**
 * Various filters to help development.
 *
 * @package themekit
 * @author themekit
 * @since 1.0.0
 */

	/**
	 * Reset Image Compression
	 *
	 * @since 1.0.0
	 * -----------------------------------------------------------------------------
	 * -----------------------------------------------------------------------------
	 */
function fx_image_quality() {
	return 100;
}

	add_filter( 'jpeg_quality', 'fx_image_quality' );
	add_filter( 'wp_editor_set_quality', 'fx_image_quality' );


	/**
	 * Add `loading="lazy"` attribute to images output by the_post_thumbnail().
	 *
	 * @param  string       $html The post thumbnail HTML.
	 * @param  int          $post_id The post ID.
	 * @param  string       $post_thumbnail_id    The post thumbnail ID.
	 * @param  string|array $size   The post thumbnail size. Image size or array of width and height values (in that order). Default 'post-thumbnail'.
	 * @param  string       $attr Query string of attributes.
	 *
	 * @return string   The modified post thumbnail HTML.
	 * -----------------------------------------------------------------------------
	 * -----------------------------------------------------------------------------
	 */
function fx_modify_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

	$html = str_replace( 'src', 'data-src', $html );

	return $html;

}

	add_filter( 'post_thumbnail_html', 'fx_modify_post_thumbnail_html', 10, 5 );


	/**
	 * Add `lazyload` class to images output.
	 *
	 * @param  array $attr Attributes registered.
	 * @return array The modified attributes array.
	 * -----------------------------------------------------------------------------
	 * -----------------------------------------------------------------------------
	 */
function fx_lazyload_class( $attr ) {
	$attr['class'] .= ' lazyload';
	return $attr;
}

	add_filter( 'wp_get_attachment_image_attributes', 'fx_lazyload_class' );

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 * -----------------------------------------------------------------------------
	 * -----------------------------------------------------------------------------
	 */
function fx_body_classes( $classes ) {

	unset( $classes[ array_search( 'wp-embed-responsive', $classes ) ] );

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'primary' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
	add_filter( 'body_class', 'fx_body_classes' );