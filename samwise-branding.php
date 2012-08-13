<?php

/* Admin footer */
add_filter( 'admin_footer_text', create_function( false, "return __('WordPress delivered by <a href=\"http://www.example.com/\">Your Company Here</a>.', 'samwise');") );

/* Login logo */
function samwise_custom_login_logo() {
	$size = getimagesize( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'samwise-branding' . DIRECTORY_SEPARATOR . 'login-logo.png');
	?><style type="text/css">
		.login h1 a {
			background: transparent url('<?php echo plugins_url( 'samwise-branding/login-logo.png' , __FILE__ ); ?>') no-repeat top center;
			width: 100%;
			height: <?php echo $size[1] + 3; ?>px;
			background-size: <?php echo $size[0]; ?>px <?php echo $size[1]; ?>px;
		}
	</style><?php
}
add_action( 'login_head', 'samwise_custom_login_logo' );

/* Login logo link title */
add_filter( 'login_headertitle', create_function( false, "return __('WordPress delivered by Your Company Here', 'samwise');"));

/* Login logo link url */
add_filter( 'login_headerurl', create_function( false, "return 'http://www.example.com/';") );