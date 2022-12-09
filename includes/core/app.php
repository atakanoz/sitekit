<?php

namespace Theme;

class Kit {

	/**
	 * Theme name.
	 *
	 * @var string $name.
	 */
	private static $name;

	/**
	 * Theme version.
	 *
	 * @var string $version.
	 */
	public static $version = '1.0.0';

	/**
	 * Icon directory.
	 *
	 * @var string $icon_dir.
	 */
	public static $icon_dir;

	/**
	 * Image directory.
	 *
	 * @var string $image_dir;
	 */
	public static $image_dir;

	/**
	 * Styles.
	 *
	 * @var array $styles.
	 */
	public static $styles = array();

	/**
	 * Scripts
	 *
	 * @var array $scripts.
	 */
	public static $scripts = array();

	/**
	 * JQuery allowance.
	 *
	 * @var string $jquery.
	 */
	public static $jquery;

	/**
	 * Custom fields.
	 *
	 * @var string $jquery.
	 */
	public static $custom_fields = 'none';

	/**
	 * Debug.
	 *
	 * @param  mixed $code
	 * @return void
	 */
	public static function debug( $code ) {

		Helpers::get_debugger( $code );

	}

	/**
	 * Layout.
	 *
	 * @var  mixed $layout_name
	 * @param  mixed $layout_content
	 * @param  mixed $layout_args
	 * @return void
	 */
	public static function layout( $layout_name, $layout_content, $layout_args = array() ) {

		Helpers::get_layout( $layout_name, $layout_content, $layout_args );

	}

	/**
	 * Icon.
	 *
	 * @param  mixed $icon
	 * @return void
	 */
	public static function icon( $icon = '' ) {

		Helpers::get_icon( $icon );

	}

	/**
	 * Image.
	 *
	 * @param  mixed $image
	 * @param  mixed $alt
	 * @param  mixed $class
	 * @return void
	 */
	public static function image( $image, $alt = '', $class = 'x-image' ) {

		Helpers::get_image( $image, $alt, $class );

	}

	/**
	 * Template.
	 *
	 * @param  mixed $template
	 * @param  mixed $args
	 * @return void
	 */
	public static function template( $template, $args = array() ) {

		Helpers::get_template( $template, $args );

	}

	/**
	 * Button.
	 *
	 * @param  mixed $content
	 * @param  mixed $link
	 * @param  mixed $class
	 * @param  mixed $style
	 * @return void
	 */
	public static function button( $content, $link = '#', $class = '', $style = '' ) {

		Helpers::get_button( $content, $link, $class, $style );

	}

	/**
	 * Init.
	 *
	 * @return void
	 */
	public static function init( $init = array() ) {

		// Fill class constants.
		self::$name          = $init['theme_name'];
		self::$version       = $init['theme_version'];
		self::$icon_dir      = get_stylesheet_directory() . $init['icon_directory'];
		self::$image_dir     = get_stylesheet_directory_uri() . $init['image_directory'];
		self::$styles        = $init['styles'];
		self::$scripts       = $init['scripts'];
		self::$custom_fields = $init['custom_fields'];

		// Manage 3rd party integrations.
		if ( $init['load_composer'] && file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
			require_once get_template_directory() . '/vendor/autoload.php';
		}

		// Enqueue jQuery.
		if ( $init['jquery_support'] ) {
			self::$jquery = array( 'jquery' );
		}

		// Carbon Fields option.
		if ( 'carbon_fields' === $init['custom_fields'] ) {
			Setup::init_carbon_fields();
		}

		// Make the setup.
		Setup::make_sidebars( $init['sidebars'] );
		Setup::make_nav_menus( $init['menus'] );
	}

}


require_once get_template_directory() . '/includes/core/setup.php';
require_once get_template_directory() . '/includes/core/helpers.php';
require_once get_template_directory() . '/includes/core/performance.php';