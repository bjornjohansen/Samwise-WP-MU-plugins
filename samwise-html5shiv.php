<?php

class Samwise_Html5shiv {

	function print_script_include () {

		echo sprintf( '<!--[if lt IE 9]><script src="%s" type="text/javascript"></script><![endif]-->', plugins_url( 'samwise-html5shiv/html5shiv.js',  __FILE__ ) );
	
	}
}

add_action( 'print_head_scripts', array( 'Samwise_Html5shiv', 'print_script_include' ) );
