<?php
/**
 * Theme Functions
 *
 * The area where you can write the functions for your theme.
 *
 * @package flex
 * @author pressx
 * @since 1.0.0
 */


// Require includes.
require get_template_directory() . '/includes/core/app.php';


if ( class_exists( 'Kit' ) ) {


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
			 * @link https://kitstudio.com/sitekit/docs/general-settings
			 */
			'theme_name'      => 'SiteKit',
			'theme_version'   => '1.0.0',
			'text_domain'     => 'sitekit',
			'icon_directory'  => '/dist/icons/',
			'image_directory' => '/dist/images/',
			'load_composer'   => true,
			'jquery_support'  => false,
			'custom_fields'   => 'carbon_fields',
			/**
			 * Styles and scripts.
			 * ------------------------------------------------------------------------
			 */
			'styles'          => array(
				'main' => '/dist/styles.bundle.css',
			),
			'scripts'         => array(
				'main' => '/dist/scripts.bundle.js',
			),
			/**
			 * Sidebars
			 * ------------------------------------------------------------------------
			 */
			'sidebars'        => array(
				'primary' => array(
					'name'        => __( 'Primary Sidebar', 'flex' ),
					'description' => __( 'Primary Sidebar for the blog area.', 'flex' ),
				),
			),
			/**
			 * Menus.
			 * ------------------------------------------------------------------------
			 */
			'menus'           => array(
				'primary' => __( 'Primary Menu', 'flex' ),
				'test'    => __( 'Test Menu', 'flex' ),
			),
		)
	);

}

require get_template_directory() . '/includes/actions.php';
require get_template_directory() . '/includes/filters.php';