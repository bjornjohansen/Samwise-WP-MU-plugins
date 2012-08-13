<?php

//remove Wordpress auto-jump to #more- anchor
function samwise_remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter( 'the_content_more_link', 'samwise_remove_more_jump_link' );
