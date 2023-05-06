<?php

/**
 * Initiliaze the Kit.
 *
 * @see Kit
 * @see Kit::init();
 */

Theme\Kit::init(
	array(
		/**
		 * General settings.
		 *
		 * @link https://kitstudio.com/themekit/docs/general-settings
		 */
		'theme_name'      => 'ThemeKit',
		'theme_version'   => '1.0.0',
		'text_domain'     => 'themekit',
		'icon_directory'  => '/dist/icons/',
		'image_directory' => '/dist/images/',
		'load_composer'   => false,
		'jquery_support'  => false,
		'custom_fields'   => 'carbon_fields',
		/**
		 * Styles and scripts.
		 * ------------------------------------------------------------------------
		 */
		'styles'          => array(
			'main' => '/public/styles.bundle.css',
		),
		'scripts'         => array(
			'main' => '/public/scripts.bundle.js',
		),
		/**
		 * Sidebars
		 * ------------------------------------------------------------------------
		 */
		'sidebars'        => array(
			'primary' => array(
				'name'        => __( 'Primary Sidebar', 'kit' ),
				'description' => __( 'Primary Sidebar for the blog area.', 'kit' ),
			),
		),
		/**
		 * Menus.
		 * ------------------------------------------------------------------------
		 */
		'menus'           => array(
			'primary' => __( 'Primary Menu', 'kit' ),
			'test'    => __( 'Testss Menu', 'kit' ),
		),
		'include_files'   => array(
			'performance.php',
			'filters.php',
		),
	)
);