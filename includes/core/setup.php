<?php
namespace Theme;

/**
 * Setup Extender.
 * -------------------------------------------------------------
 * This class is mainly crafted for to create required setup
 * methods to be used with the Kit class.
 *
 * These methods are linked at class-kit.php and called with
 * Kit namespace (e.g Kit::method()).
 *
 * @category   Extender
 * @package    SiteKit
 * @version    1.0.0
 * @author     KitStudio <hello@kitstudio.com>
 * @copyright  2022 KitStudio
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @see        Kit, Kit::icon(), Kit::layout() etc...
 */
class Setup extends Kit {

	/**
	 * Theme Styles.
	 *
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	 */
	public function styles() {

		if ( is_array( Kit::$styles ) ) {
			foreach ( Kit::$styles as $style => $path ) {
				wp_enqueue_style( $style, get_stylesheet_directory_uri() . $path, array(), Kit::$version );
			}
		}
	}

	/**
	 * Theme Scripts.
	 *
	 * @since 1.0.0
	 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	 */
	public function scripts() {
		if ( is_array( Kit::$scripts ) ) {
			foreach ( Kit::$scripts as $script => $path ) {
				wp_enqueue_script( $script, get_stylesheet_directory_uri() . $path, Kit::$jquery, Kit::$version, true );
			}
		}
	}

	public static function init_carbon_fields() {

		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * Sidebars.
	 *
	 * @param array $sidebars Sidebars array.
	 * @since 1.0.0
	 * @return void
	 */
	public static function make_sidebars( $sidebars = array() ) {

		if ( is_array( $sidebars ) || is_object( $sidebars ) ) {

			foreach ( $sidebars as $sidebar => $value ) {

				/**
				 * Register the sidebars.
				 *
				 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
				 */
				register_sidebar(
					array(
						'id'            => $sidebar,
						'name'          => $value['name'],
						'description'   => isset( $value['description'] ) ? $value['description'] : '',
						'before_widget' => isset( $value['before_widget'] ) ? $value['before_widget'] : '',
						'after_widget'  => isset( $value['after_widget'] ) ? $value['after_widget'] : '',
						'before_title'  => isset( $value['before_title'] ) ? $value['before_title'] : '',
						'after_title'   => isset( $value['after_title'] ) ? $value['after_title'] : '',
					)
				);
			}
		}
	}

	public static function make_nav_menus( $menus = array() ) {
		/**
		 * Register the navigation menus.
		 *
		 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
		 */
		register_nav_menus( $menus );
	}

}

$the_setup = new Setup();

add_action( 'widgets_init', array( $the_setup, 'make_sidebars' ) );

add_action( 'wp_enqueue_scripts', array( $the_setup, 'styles' ) );

add_action( 'wp_enqueue_scripts', array( $the_setup, 'scripts' ) );