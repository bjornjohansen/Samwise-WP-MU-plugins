<?php

// remove CSS from recent comments widget
function samwise_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
}
add_action( 'wp_head', 'samwise_recent_comments_style', 1 );
	
	