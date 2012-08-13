<?php

// remove CSS from gallery
function samwise_gallery_style( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'samwise_gallery_style' );
