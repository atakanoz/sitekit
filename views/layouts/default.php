<?php
/**
 *
 * Default layout.
 *
 * @package themekit
 * @author themekit
 * @since 1.0.0
 */

get_header();
?>

<div id="layout-<?php esc_attr_e( $layout_name ); ?>"
	class=" h-full flex justify-center items-center  max-w-6xl mx-auto h-screen">

	<?php $layout_content(); ?>

</div>

<?php
get_footer();
