<?php
/**
 * Weingart theme setup.
 *
 * @package Weingart
 */

add_action( 'init', 'weingart_register_pattern_category' );
add_action( 'init', 'weingart_register_block_styles' );
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
 * Registers the block styles that are pure CSS and have no theme.json settings.
 */
function weingart_register_block_styles() {
	register_block_style(
		'core/group',
		array(
			'name'  => 'overprint',
			'label' => __( 'Overprint', 'weingart' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'registration',
			'label' => __( 'Registration marks', 'weingart' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'wedge',
			'label' => __( 'Wedge', 'weingart' ),
		)
	);
	register_block_style(
		'core/separator',
		array(
			'name'  => 'rule-heavy',
			'label' => __( 'Heavy rule', 'weingart' ),
		)
	);
	register_block_style(
		'core/separator',
		array(
			'name'  => 'rule-short',
			'label' => __( 'Short bar', 'weingart' ),
		)
	);
	register_block_style(
		'core/post-template',
		array(
			'name'  => 'indexed',
			'label' => __( 'Indexed', 'weingart' ),
		)
	);
}

/**
 * Loads each block's extra CSS only when that block is on the page.
 */
function weingart_enqueue_block_styles() {
	foreach ( array( 'core/group', 'core/paragraph', 'core/separator', 'core/post-template' ) as $block_name ) {
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
