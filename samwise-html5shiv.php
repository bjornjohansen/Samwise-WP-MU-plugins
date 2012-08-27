<?php

class Samwise_Html5shiv {

	function print_script_include () {

		echo sprintf( '<!--[if lt IE 9]><script src="%s" type="text/javascript"></script><![endif]-->', plugins_url( 'samwise-html5shiv/html5shiv.js',  __FILE__ ) );
	
		// wp_print_scripts seems to run in the footer even when ran in the head (tested WP 3.4.1). So remove this action when run as we really don't need it twice.
		remove_action( 'wp_print_scripts', array( __CLASS__, 'print_script_include' ) );
		
	}
}

add_action( 'wp_print_scripts', array( 'Samwise_Html5shiv', 'print_script_include' ) );
