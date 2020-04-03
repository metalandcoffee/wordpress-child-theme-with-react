<?php
/**
 * Functions
 *
 * Description.
 *
 * @package twentytwentychild
 */

add_action( 'wp_enqueue_scripts', 'enqueue_react_js' );

/**
 * Enqueue theme styles and scripts.
 */
function enqueue_react_js() {

	$parent_style = 'parent-style';
	wp_enqueue_style(
		$parent_style,
		get_template_directory_uri() . '/style.css',
		[],
		filemtime( get_template_directory() . '/style.css' )
	);
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[ $parent_style ],
		filemtime( get_stylesheet_directory() . '/style.css' )
	);

	// Enqueue Theme JS w React Dependency.
	wp_enqueue_script(
		'theme-react-js',
		get_stylesheet_directory_uri() . '/build/index.js',
		[ 'wp-element' ],
		filemtime( get_stylesheet_directory() . '/build/index.js' ),
		true
	);
}
