<?php

/*
This is for separate inclustion of the jquery plugin and the init script that acually use the plugin

wp_enqueue_script(
	'jquery.emaillink',
	plugins_url( 'samwise-emaillink/jquery.emaillink.js',  __FILE__ ),
	array('jquery'),
	'1.4',
	true
);
wp_enqueue_script(
	'jquery.emaillink-init',
	plugins_url( 'samwise-emaillink/jquery.emaillink-init.js',  __FILE__ ),
	array('jquery', 'jquery.emaillink'),
	'1.4',
	true
);

*/

/* Both of the above, combined to one request */
wp_enqueue_script(
	'jquery.emaillink',
	plugins_url( 'samwise-emaillink/jquery.emaillink-combined.min.js',  __FILE__ ),
	array('jquery'),
	'1.4',
	true
);