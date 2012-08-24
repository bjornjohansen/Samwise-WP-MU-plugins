<?php

class Samwise_Externallinks {

	function enqueue_scripts () {

		wp_enqueue_script(
			'jquery.external-links',
			plugins_url( 'samwise-external-links/jquery.external-links.min.js',  __FILE__ ),
			array('jquery'),
			'1',
			true
		);
	}
}

add_action( 'wp_enqueue_scripts', array( 'Samwise_Externallinks', 'enqueue_scripts' ) );
