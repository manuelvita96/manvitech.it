<?php

/**
 * pixfooter custom meta fields.
 */

/* ---------------------------------------------------------------------------
 * Create new post type
 * --------------------------------------------------------------------------- */
function pix_pixfooter_post_type() {
	$pixfooter_item_slug = "pixfooter-item";

	$labels = array(
		'name' 					=> __('Footers', 'pixfort-core'),
		'singular_name' 		=> __('Footer item', 'pixfort-core'),
		'add_new' 				=> __('Add New Footer', 'pixfort-core'),
		'add_new_item' 			=> __('Add New Footer item', 'pixfort-core'),
		'edit_item' 			=> __('Edit Footer item', 'pixfort-core'),
		'new_item' 				=> __('New Footer item', 'pixfort-core'),
		'view_item' 			=> __('View Footer item', 'pixfort-core'),
		'search_items' 			=> __('Search Footer items', 'pixfort-core'),
		'not_found' 			=> __('No Footer items found', 'pixfort-core'),
		'not_found_in_trash' 	=> __('No Footer items found in Trash', 'pixfort-core'),
		'parent_item_colon' 	=> ''
	);

	$args = array(
		'labels' 				=> $labels,
		'menu_icon' 			=> PIX_CORE_PLUGIN_URI . 'functions/images/admin/footer-icon.svg',
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'has_archive' 			=> true,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'exclude_from_search' 	=> true,
		'rewrite' 				=> array('slug' => $pixfooter_item_slug, 'with_front' => true),
		'supports' 				=> array('title', 'editor', 'author', 'revisions', 'custom-fields', 'excerpt', 'thumbnail', 'page-attributes'),
	);

	register_post_type('pixfooter', $args);

	register_taxonomy('pixfooter-types', 'pixfooter', array(
		'hierarchical' 			=> true,
		'label' 				=> __('pixfooter categories', 'pixfort-core'),
		'singular_label' 		=> __('pixfooter category', 'pixfort-core'),
		'rewrite'				=> true,
		'query_var' 			=> true
	));
}
add_action('init', 'pix_pixfooter_post_type');
