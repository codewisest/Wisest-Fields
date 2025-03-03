<?php
// enqueue the block editor assets
function wisestfields_enqueue_block_editor_assets() {
	wp_enqueue_script(
		'wisestfields-block-editor',
		get_theme_file_uri( 'assets/js/block-editor.js' ),
		array( 
			'wp-blocks', 
			'wp-dom-ready', 
			'wp-edit-post' 
		)
	);
}

add_action( 'enqueue_block_editor_assets', 'wisestfields_enqueue_block_editor_assets' );

// function wisestfields_enqueue_block_assets() {
// 	wp_enqueue_style(
// 		'wisestfields-block-styles',
// 		get_theme_file_uri( 'assets/css/block-styles.css' )
// 	);
// }

// add_action( 'enqueue_block_assets', 'wisestfields_enqueue_block_assets' );
