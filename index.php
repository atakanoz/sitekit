<?php
/**
 *
 * The structure of the page that contains the front page and it's content.
 *
 * @package themekit
 * @author themekit
 * @since 1.0.0
 */

use Theme\Kit as Kit;

?>

<?php

Kit::layout(
	'default',
	function() {
		echo 'Kit';
	}
);
