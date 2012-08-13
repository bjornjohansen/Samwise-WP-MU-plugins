<?php


function samwise_attachment_image_add_orientation_class( $attr, $attachment ) {

	$protocol = ( ! strlen($_SERVER['HTTPS']) || 'off' == $_SERVER['HTTPS'] ) ? 'http' : 'https'; 
	
	//$size = getimagesize( ABSPATH . substr( $attr['src'], strlen( get_option( 'siteurl', $protocol . '://' . $_SERVER['HTTP_HOST'] . '/' ) ) + 1 ) );
	
	$size = getimagesize(
		str_replace(
			get_option( 'siteurl', $protocol . '://' . $_SERVER['HTTP_HOST'] ),
			rtrim( ABSPATH, '/' ),
			$attr['src']
		)
	);
	
	if ( $size[0] == $size[1] ) {
		$orientation = 'square';
	} else {
		$orientation = ( $size[0] > $size[1] ? 'landscape' : 'portrait' );
	}

	$attr['class'] .= ' image-orientation-' . $orientation;
	
	return $attr;
}

add_filter( 'wp_get_attachment_image_attributes', 'samwise_attachment_image_add_orientation_class', 10, 2 );

