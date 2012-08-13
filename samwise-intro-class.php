<?php

/* Wraps the content before the <!--more--> separator in a div with the css class "intro" */
function samwise_intro_class( $content ) {

	if ( strpos( $content, '<!--more-->' ) ) {
		$content = '<div class="intro">' . str_replace( '<!--more-->', '</div><!--more-->', $content );
	} elseif ( strpos( $content, '<p><span id="more-' ) ) {
		$content = '<div class="intro">' . str_replace( '<p><span id="more-', '</div><p><span id="more-', $content );
	} elseif ( strpos( $content, '<span id="more-' ) ) {
		$content = '<div class="intro">' . str_replace( '<span id="more-', '</div><span id="more-', $content );
	}
	
    return $content;
	
}
add_filter ( 'the_content', 'samwise_intro_class' );

