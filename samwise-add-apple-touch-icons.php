<?php

// iOS/Android/Other? images
function samwise_add_apple_touch_icons() {

	/* For iPhone 4 with high-resolution Retina display: */
	if ( file_exists( get_template_directory() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'apple-touch-icon-114x114-precomposed.png' ) ) {
		echo sprintf('<link rel="apple-touch-icon-precomposed" sizes="114x114" href="%s/images/apple-touch-icon-114x114-precomposed.png">', esc_url( get_template_directory_uri() ) );
	}
	/* For first-generation iPad: */
	if ( file_exists( get_template_directory() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'apple-touch-icon-72x72-precomposed.png' ) ) {
		echo sprintf('<link rel="apple-touch-icon-precomposed" sizes="72x72" href="%s/images/apple-touch-icon-72x72-precomposed.png">', esc_url( get_template_directory_uri() ) );
	}
	/* For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: 57x57 */
	if ( file_exists( get_template_directory() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'apple-touch-icon-precomposed.png' ) ) {
		echo sprintf('<link rel="apple-touch-icon-precomposed" href="%s/images/apple-touch-icon-precomposed.png">', esc_url( get_template_directory_uri() ) );
	}
	
}
add_action( 'wp_head', 'samwise_add_apple_touch_icons' );

