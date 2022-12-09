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
		?>

<div class="flex flex-col text-center gap-2">

	<span class="text-gray-400 text-xl"><?php esc_html_e( 'Welcome to the', 'themekit' ); ?></span>

	<h1 class="text-5xl text-gray-900 font-semibold tracking-tight"><?php esc_html_e( 'Theme Kit', 'themekit' ); ?></h1>

	<div class="mt-3">

		<a class="text-sky-500 hover:text-sky-700 border-b-2 border-sky-500 hover:border-sky-700 inline-flex gap-1 items-center font-medium justify-center"
			href="<?php echo esc_url( 'https://github.com/atakanoz/themekit' ); ?>" target="_blank">

			<?php esc_html_e( 'Read the docs', 'themekit' ); ?>

			<span>
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
					class="ai ai-ChevronRight">
					<path d="M8 4l8 8-8 8" />
				</svg>
			</span>

		</a>

	</div>

</div>

<?php
	}
);