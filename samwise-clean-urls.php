<?php
// Rewrites DO NOT happen for child themes
// rewrite /wp-content/themes/samwise/css/ to /css/
// rewrite /wp-content/themes/samwise/js/  to /js/
// rewrite /wp-content/themes/samwise/images/ to /images/
// rewrite /wp-content/themes/samwise/min/ to /min/
// rewrite /wp-content/plugins/ to /plugins/

function samwise_flush_rewrites() {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

function samwise_add_rewrites( $content ) {
	$theme_name = next(explode('/themes/', get_stylesheet_directory()));
	global $wp_rewrite;
	$samwise_new_non_wp_rules = array(
		'favicon(.*)'   => 'wp-content/themes/'. $theme_name . '/images/favicon$1',
		'apple-touch-icon(.*)'   => 'wp-content/themes/'. $theme_name . '/images/apple-touch-icon$1',
		'css/(.*)'      => 'wp-content/themes/'. $theme_name . '/css/$1',
		'js/(.*)'       => 'wp-content/themes/'. $theme_name . '/js/$1',
		'images/(.*)'   => 'wp-content/themes/'. $theme_name . '/images/$1',
		'min/(.*)'      => 'wp-content/themes/'. $theme_name . '/min/$1',
		'plugins/(.*)'  => 'wp-content/plugins/$1'
	);
	$wp_rewrite->non_wp_rules += $samwise_new_non_wp_rules;
}

add_action('admin_init', 'samwise_flush_rewrites');

function samwise_clean_assets( $content ) {
    $theme_name = next(explode('/themes/', $content));
    $current_path = '/wp-content/themes/' . $theme_name;
    $new_path = '';
    $content = str_replace($current_path, $new_path, $content);
    return $content;
}

function samwise_clean_plugins( $content ) {
    $current_path = '/wp-content/plugins';
    $new_path = '/plugins';
    $content = str_replace( $current_path, $new_path, $content );
    return $content;
}

// only use clean urls if the theme isn't a child or an MU (Network) install
$theme_data = get_theme_data( trailingslashit( get_stylesheet_directory() ) . 'style.css');

if ((!defined('WP_ALLOW_MULTISITE') || (defined('WP_ALLOW_MULTISITE') && WP_ALLOW_MULTISITE !== true)) && $theme_data['Template'] === '') {
  add_action('generate_rewrite_rules', 'samwise_add_rewrites');
  add_filter('plugins_url', 'samwise_clean_plugins');
  add_filter('bloginfo', 'samwise_clean_assets');
  add_filter('stylesheet_directory_uri', 'samwise_clean_assets');
  add_filter('template_directory_uri', 'samwise_clean_assets');
}



