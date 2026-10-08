<?php
/**
 * Weingart theme setup.
 *
 * @package Weingart
 */

add_action( 'init', 'weingart_register_pattern_category' );
add_action( 'init', 'weingart_enqueue_block_styles' );

/**
 * Adds the pattern category used by the theme's patterns.
 */
function weingart_register_pattern_category() {
	register_block_pattern_category(
		'weingart',
		array( 'label' => __( 'Weingart', 'weingart' ) )
	);
}

/**
 * Loads each block's extra CSS only when that block is on the page.
 */
function weingart_enqueue_block_styles() {
	foreach ( array( 'core/group', 'core/separator', 'core/post-template' ) as $block_name ) {
		$file = str_replace( 'core/', '', $block_name );
		wp_enqueue_block_style(
			$block_name,
			array(
				'handle' => 'weingart-' . $file,
				'src'    => get_theme_file_uri( "assets/css/blocks/{$file}.css" ),
				'path'   => get_theme_file_path( "assets/css/blocks/{$file}.css" ),
				'ver'    => wp_get_theme()->get( 'Version' ),
			)
		);
	}
}
