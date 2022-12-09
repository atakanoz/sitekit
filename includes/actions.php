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