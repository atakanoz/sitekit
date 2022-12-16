<?php

/**
 * Hide WordPress Version
 *
 * @since 1.0.0
 * @return void
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
function hide_wp_version() {
	return '';
}

remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '_hide_wp_version' );


/**
 * Remove Pingback
 *
 * @param  mixed $headers
 * @return void
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
function remove_x_pingback( $headers ) {
	unset( $headers['X-Pingback'], $headers['x-pingback'] );
	return $headers;
}

add_filter( 'wp_headers', 'remove_x_pingback' );
add_filter( 'pings_open', '__return_false', 9999 );


/**
 * Disable XMLRPC
 *
 * @since 1.0.0
 * @return void
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
add_filter( 'xmlrpc_enabled', '__return_false' );


/**
 * Intercept XMLRPC
 *
 * @since 1.0.0
 * @return void
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
function intercept_xmlrpc() {
	if ( ! isset( $_SERVER['SCRIPT_FILENAME'] ) ) {
		return;
	}

	if ( 'xmlrpc.php' !== basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		return;
	}

		$header = 'HTTP/1.1 403 Forbidden';
		header( $header );
		echo $header;
		die();
}

add_action( 'init', 'intercept_xmlrpc' );


/**
 * Disable Rest API Links
 *
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );


/**
 * Disable WLWManifest Link
 *
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
remove_action( 'wp_head', 'wlwmanifest_link' );


/**
 * Disable RSD Link
 *
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
remove_action( 'wp_head', 'rsd_link' );


/**
 * Disable Shortlink
 *
 * @since 1.0.0
 * -----------------------------------------------------------------------------
 * -----------------------------------------------------------------------------
 */
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );