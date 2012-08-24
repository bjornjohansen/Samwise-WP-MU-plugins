<?php


class Samwise_Fancybox {

	function enqueue_scripts () {

		/*
		Uncomment if you want the mousewheel feature

		wp_enqueue_script(
			'jquery.fancybox',
			plugins_url( 'samwise-fancybox/jquery.mousewheel-3.0.4.pack.js',  __FILE__ ),
			array('jquery'),
			'3.0.4',
			true
		);
		*/

		wp_enqueue_script(
			'jquery.fancybox',
			plugins_url( 'samwise-fancybox/jquery.fancybox-1.3.4.pack.js',  __FILE__ ),
			array('jquery'),
			'1.3.4',
			true
		);
		
		
		wp_enqueue_script(
			'samwise_fancybox_init',
			plugins_url( 'samwise-fancybox/samwise-fancybox-init.js',  __FILE__ ),
			array( 'jquery', 'jquery.fancybox' ),
			'1',
			true
		);
		
		
		
	}
	
	function enqueue_styles() {
		wp_register_style( 'samwise_fancybox', plugins_url( 'samwise-fancybox/jquery.fancybox-1.3.4.css', __FILE__ ) );
		wp_enqueue_style( 'samwise_fancybox' );
	}
}

add_action( 'wp_enqueue_scripts', array( 'Samwise_Fancybox', 'enqueue_scripts' ) );


// somehow I believe this is the wrong action hook, even though this is the way the Codex tells you to: 
// http://codex.wordpress.org/Function_Reference/wp_enqueue_style#Loading_stylesheets_in_WordPress_themes
add_action( 'wp_enqueue_scripts', array( 'Samwise_Fancybox', 'enqueue_styles' ) ); 
