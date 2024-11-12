<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */



function pixfort_core_pix_small_search_block_init() {
    register_block_type(__DIR__ . '/search', [
        // 'attributes'      => array(
        //     'title' => array(
        //         'type'    => 'string',
        //         'default' => 'Search', // Default title
        //     ),
        // ),
        // 'render_callback' => 'pixfort_core_render_search_block',
    ]);
}
add_action('init', 'pixfort_core_pix_small_search_block_init');
