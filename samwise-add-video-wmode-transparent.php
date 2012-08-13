<?php

// Found here: http://mehigh.biz/wordpress/adding-wmode-transparent-to-wordpress-3-media-embeds.html
function samwise_add_video_wmode_transparent($html, $url, $attr) {

	if ( strpos( $html, "<embed src=" ) !== false ) {
		return str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $html);
	} elseif ( strpos ( $html, 'feature=oembed' ) !== false ) {
		return str_replace( 'feature=oembed', 'feature=oembed&wmode=opaque', $html );
	} else {
		return $html;
	}
}
add_filter( 'embed_oembed_html', 'samwise_add_video_wmode_transparent', 10, 3);
