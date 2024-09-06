<?php

/**
 * Visual Composer functions
 *
 * @package pixfort-core
 * @author PixFort
 * @link http://pixfort.com
 */


function pix_set_vc_as_theme() {
	// Setup VC to be part of a theme
	if (function_exists('vc_set_as_theme')) {
		vc_set_as_theme(true);
	}
	$child_dir = plugin_dir_path(dirname(__FILE__)) . 'functions/vc_templates';
	// vc_set_shortcodes_templates_dir($parent_dir);
	// Link your VC elements's folder
	if (function_exists('vc_set_shortcodes_templates_dir')) {
		vc_set_shortcodes_templates_dir($child_dir);
	}
	// Disable Instructional/Help Pointers
	if (function_exists('vc_pointer_load')) {
		remove_action('admin_enqueue_scripts', 'vc_pointer_load');
	}
}
add_action('vc_before_init', 'pix_set_vc_as_theme');

// Prevent WP from adding <p> tags on all post types
function disable_wp_auto_p($content) {
	$removeAutop = true;
	$postTypes = array('product');

	if (!empty(pix_plugin_get_option('pix-enable-blog-line-breaks')) && pix_plugin_get_option('pix-enable-blog-line-breaks')) {
		array_push($postTypes, 'post');
	}
	if (!empty(pix_plugin_get_option('pix-enable-page-line-breaks')) && pix_plugin_get_option('pix-enable-page-line-breaks')) {
		array_push($postTypes, 'page');
	}
	if (in_array(get_post_type(), $postTypes)) {
		$removeAutop = false;
	}
	if ($removeAutop) {
		remove_filter('the_content', 'wpautop');
		remove_filter('the_excerpt', 'wpautop');
	}
	return $content;
}
add_filter('the_content', 'disable_wp_auto_p', 0);

// After VC Init
add_action('vc_after_init', 'vc_after_init_actions');

function vc_after_init_actions() {
	// Enable VC by default on a list of Post Types
	if (function_exists('vc_set_default_editor_post_types')) {
		$list = array(
			'page',
			'post',
			'pixfooter',
			'portfolio',
			'pixpopup', // add here your custom post types slug
		);
		vc_set_default_editor_post_types($list);
	}
}

function pix_add_params_to_group($params, $group) {
	if (!empty($group)) {
		$res = array();
		foreach ($params as $key => $value) {
			$value['group'] = $group;
			array_push($res, $value);
		}
		return $res;
	}
	return $params;
}

/* ---------------------------------------------------------------------------
* Shortcodes | Image compatibility
* --------------------------------------------------------------------------- */
// if( ! function_exists( 'pix_vc_image' ) ){
// 	function pix_vc_image( $image = false ){
// 		if( $image && is_numeric( $image ) ){
// 			$image = wp_get_attachment_image_src( $image, 'full' );
// 			$image = $image[0];
// 		}
// 		return $image;
// 	}
// }

/* ---------------------------------------------------------------------------
* Shortcodes | Visual Composer Map:
* --------------------------------------------------------------------------- */
if (is_user_logged_in()) {
	require_once('vc_templates/custom/main.php');
}

if (class_exists('PixfortHub')) {
	$status = PixfortHub::checkValidation();
	if ($status) {
		add_action('vc_before_init_vc', 'pix_vc_integration');
	}
}

if (!function_exists('pix_vc_integration')) {
	function pix_vc_integration() {
		$parent_tag = vc_post_param('parent_tag', '');
		$include_icon_params = (('vc_tta_pageable' !== $parent_tag) && 'tabs22' !== $parent_tag);

		if ($include_icon_params) {
			require_once vc_path_dir('CONFIG_DIR', 'content/vc-icon-element.php');
		}

		$colors = array(
			"Body default"			=> "body-default",
			"Heading default"		=> "heading-default",
			"Primary"				=> "primary",
			"Primary Gradient"		=> "gradient-primary",
			"Secondary"				=> "secondary",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Blue"					=> "blue",
			"Red"					=> "red",
			"Yellow"				=> "yellow",
			"Brown"					=> "brown",
			"Purple"				=> "purple",
			"Orange"				=> "orange",
			"Cyan"					=> "cyan",
			// "Transparent"					=> "transparent",
			"Gray 1"				=> "gray-1",
			"Gray 2"				=> "gray-2",
			"Gray 3"				=> "gray-3",
			"Gray 4"				=> "gray-4",
			"Gray 5"				=> "gray-5",
			"Gray 6"				=> "gray-6",
			"Gray 7"				=> "gray-7",
			"Gray 8"				=> "gray-8",
			"Gray 9"				=> "gray-9",
			"Dark opacity 1"		=> "dark-opacity-1",
			"Dark opacity 2"		=> "dark-opacity-2",
			"Dark opacity 3"		=> "dark-opacity-3",
			"Dark opacity 4"		=> "dark-opacity-4",
			"Dark opacity 5"		=> "dark-opacity-5",
			"Dark opacity 6"		=> "dark-opacity-6",
			"Dark opacity 7"		=> "dark-opacity-7",
			"Dark opacity 8"		=> "dark-opacity-8",
			"Dark opacity 9"		=> "dark-opacity-9",
			"Light opacity 1"		=> "light-opacity-1",
			"Light opacity 2"		=> "light-opacity-2",
			"Light opacity 3"		=> "light-opacity-3",
			"Light opacity 4"		=> "light-opacity-4",
			"Light opacity 5"		=> "light-opacity-5",
			"Light opacity 6"		=> "light-opacity-6",
			"Light opacity 7"		=> "light-opacity-7",
			"Light opacity 8"		=> "light-opacity-8",
			"Light opacity 9"		=> "light-opacity-9",
			"Custom"				=> "custom"
		);

		$colors_with_transparent = $colors = array(
			"Body default"			=> "body-default",
			"Heading default"		=> "heading-default",
			"Primary"				=> "primary",
			"Primary Gradient"		=> "gradient-primary",
			"Secondary"				=> "secondary",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Blue"					=> "blue",
			"Red"					=> "red",
			"Yellow"				=> "yellow",
			"Brown"					=> "brown",
			"Purple"				=> "purple",
			"Orange"				=> "orange",
			"Cyan"					=> "cyan",
			"Transparent"					=> "transparent",
			"Gray 1"				=> "gray-1",
			"Gray 2"				=> "gray-2",
			"Gray 3"				=> "gray-3",
			"Gray 4"				=> "gray-4",
			"Gray 5"				=> "gray-5",
			"Gray 6"				=> "gray-6",
			"Gray 7"				=> "gray-7",
			"Gray 8"				=> "gray-8",
			"Gray 9"				=> "gray-9",
			"Dark opacity 1"		=> "dark-opacity-1",
			"Dark opacity 2"		=> "dark-opacity-2",
			"Dark opacity 3"		=> "dark-opacity-3",
			"Dark opacity 4"		=> "dark-opacity-4",
			"Dark opacity 5"		=> "dark-opacity-5",
			"Dark opacity 6"		=> "dark-opacity-6",
			"Dark opacity 7"		=> "dark-opacity-7",
			"Dark opacity 8"		=> "dark-opacity-8",
			"Dark opacity 9"		=> "dark-opacity-9",
			"Light opacity 1"		=> "light-opacity-1",
			"Light opacity 2"		=> "light-opacity-2",
			"Light opacity 3"		=> "light-opacity-3",
			"Light opacity 4"		=> "light-opacity-4",
			"Light opacity 5"		=> "light-opacity-5",
			"Light opacity 6"		=> "light-opacity-6",
			"Light opacity 7"		=> "light-opacity-7",
			"Light opacity 8"		=> "light-opacity-8",
			"Light opacity 9"		=> "light-opacity-9",
			"Custom"				=> "custom"
		);

		$colors_no_custom = $colors;
		unset($colors_no_custom['Custom']);

		$bg_colors = array(
			"Primary"				=> "primary",
			"Primary Light"			=> "primary-light",
			"Primary Gradient"		=> "gradient-primary",
			"Primary Gradient Light"		=> "gradient-primary-light",
			"Secondary"				=> "secondary",
			"Secondary Light"		=> "secondary-light",
			"Heading default"		=> "heading-default",
			"Body default"		=> "body-default",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Green Light"			=> "green-light",
			"Blue"					=> "blue",
			"Blue Light"			=> "blue-light",
			"Red"					=> "red",
			"Red Light"				=> "red-light",
			"Yellow"				=> "yellow",
			"Yellow Light"			=> "yellow-light",
			"Brown"					=> "brown",
			"Brown Light"			=> "brown-light",
			"Purple"				=> "purple",
			"Purple Light"			=> "purple-light",
			"Orange"				=> "orange",
			"Orange Light"			=> "orange-light",
			"Cyan"					=> "cyan",
			"Cyan Light"			=> "cyan-light",
			"Transparent"			=> "transparent",
			"Gray 1"				=> "gray-1",
			"Gray 2"				=> "gray-2",
			"Gray 3"				=> "gray-3",
			"Gray 4"				=> "gray-4",
			"Gray 5"				=> "gray-5",
			"Gray 6"				=> "gray-6",
			"Gray 7"				=> "gray-7",
			"Gray 8"				=> "gray-8",
			"Gray 9"				=> "gray-9",
			"Dark opacity 1"		=> "dark-opacity-1",
			"Dark opacity 2"		=> "dark-opacity-2",
			"Dark opacity 3"		=> "dark-opacity-3",
			"Dark opacity 4"		=> "dark-opacity-4",
			"Dark opacity 5"		=> "dark-opacity-5",
			"Dark opacity 6"		=> "dark-opacity-6",
			"Dark opacity 7"		=> "dark-opacity-7",
			"Dark opacity 8"		=> "dark-opacity-8",
			"Dark opacity 9"		=> "dark-opacity-9",
			"Light opacity 1"		=> "light-opacity-1",
			"Light opacity 2"		=> "light-opacity-2",
			"Light opacity 3"		=> "light-opacity-3",
			"Light opacity 4"		=> "light-opacity-4",
			"Light opacity 5"		=> "light-opacity-5",
			"Light opacity 6"		=> "light-opacity-6",
			"Light opacity 7"		=> "light-opacity-7",
			"Light opacity 8"		=> "light-opacity-8",
			"Light opacity 9"		=> "light-opacity-9",
			"Custom"				=> "custom"
		);

		require_once('elements/global-params.php');
		if (is_user_logged_in()) {
			require_once('elements/shortcode-accordion.php');
			require_once('elements/shortcode-animated-heading.php');
			require_once('elements/shortcode-alert.php');
			require_once('elements/shortcode-auto-video.php');
			require_once('elements/shortcode-badge.php');
			require_once('elements/shortcode-button.php');
			require_once('elements/shortcode-blog.php');
			require_once('elements/shortcode-blog-slider.php');
			// if(defined('PIX_DEV')){
			// require_once( 'elements/shortcode-breadcrumbs.php' );
			// }
			require_once('elements/shortcode-card.php');
			// require_once( 'elements/shortcode-card-group.php' );
			require_once('elements/shortcode-card-wide.php');
			require_once('elements/shortcode-circles.php');
			require_once('elements/shortcode-comparison-table.php');
			require_once('elements/shortcode-content-box.php');
			require_once('elements/shortcode-content-stack.php');
			require_once('elements/shortcode-content-tabs.php');
			require_once('elements/shortcode-countdown.php');
			require_once('elements/shortcode-chart.php');
			require_once('elements/shortcode-clients.php');
			require_once('elements/shortcode-clients-slider.php');
			require_once('elements/shortcode-cta.php');
			require_once('elements/shortcode-event.php');
			require_once('elements/shortcode-3d-box.php');
			require_once('elements/shortcode-fancybox.php');
			require_once('elements/shortcode-fancy-mockup.php');
			require_once('elements/shortcode-faq.php');
			require_once('elements/shortcode-feature.php');
			require_once('elements/shortcode-feature-list.php');
			require_once('elements/shortcode-gallery.php');
			require_once('elements/shortcode-heading.php');
			require_once('elements/shortcode-highlight-box.php');
			require_once('elements/shortcode-highlighted-text.php');
			require_once('elements/shortcode-icon.php');
			require_once('elements/shortcode-img.php');
			require_once('elements/shortcode-img-carousel.php');
			require_once('elements/shortcode-img-box.php');
			require_once('elements/shortcode-img-slider.php');
			require_once('elements/shortcode-levels.php');
			require_once('elements/shortcode-map.php');
			require_once('elements/shortcode-marquee.php');
			require_once('elements/shortcode-dividers.php');
			require_once('elements/shortcode-numbers.php');
			require_once('elements/shortcode-testimonial.php');
			require_once('elements/shortcode-testimonial-masonry.php');
			require_once('elements/shortcode-testimonials-slider.php');
			require_once('elements/shortcode-promo-box.php');
			require_once('elements/shortcode-photo-box.php');
			require_once('elements/shortcode-photo-stack.php');
			require_once('elements/shortcode-pricing.php');
			require_once('elements/shortcode-pricing-group.php');
			require_once('elements/shortcode-products-carousel.php');
			require_once('elements/shortcode-progress-bars.php');
			require_once('elements/shortcode-portfolio.php');
			require_once('elements/shortcode-portfolio-slider.php');
			require_once('elements/shortcode-review.php');
			require_once('elements/shortcode-reviews-slider.php');
			require_once('elements/shortcode-search.php');
			require_once('elements/shortcode-shop-category.php');
			require_once('elements/shortcode-slider.php');
			require_once('elements/shortcode-sliding-text.php');
			require_once('elements/shortcode-social-icons.php');
			require_once('elements/shortcode-story.php');
			// require_once( 'elements/shortcode-tabs.php' ); OLD version
			require_once('elements/shortcode-team-member.php');
			require_once('elements/shortcode-team-member-circle.php');
			require_once('elements/shortcode-text.php');
			require_once('elements/shortcode-advanced-text.php');
			require_once('elements/shortcode-video.php');
			require_once('elements/shortcode-video-popup.php');
			require_once('elements/shortcode-video-slider.php');
			require_once('elements/shortcode-responsive-spacer.php');
			vc_add_params('vc_column_inner', array(
				array(
					'param_name' 	=> 'content_align',
					'type' 			=> 'dropdown',
					'heading' 		=> __('Content align', 'pixfort-core'),
					'admin_label'	=> false,
					'value'			=> array_flip(array(
						'text-left'			=> 'Left',
						'text-center'		=> 'Center',
						'text-right' 		=> 'Right',
					)),
				),
			));
		}

		require_once('elements/vc_row.php');
		require_once('elements/vc_section.php');
		require_once('elements/vc_column.php');

		vc_remove_param("vc_separator", "css_animation");
		vc_add_params(
			'vc_separator',
			array(
				array(
					'param_name' 	=> 'animation',
					'type' 			=> 'dropdown',
					'heading' 		=> __('Animation', 'pixfort-core'),
					'description' 	=> __('Select the animation style.', 'pixfort-core'),
					'admin_label'	=> false,
					'value'			=> pix_get_animations(),
				),
				array(
					'param_name' 	=> 'delay',
					'type' 			=> 'textfield',
					'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
					'admin_label'	=> true,
					"dependency" => array(
						"element" => "animation",
						"not_empty" => true
					),
				),
			)
		);
		vc_map_update('icon', 'pix-icons');
	}
}

// Function to override the default parameters
// function override_custom_shortcode_defaults($data) {
// 	echo '<pre>';
// 	var_dump($data);
// 	echo '</pre>';
// 	if(\PixfortCore::instance()->icons::$isEnabled ) {
// 		// Check if the data contains your custom shortcode
// 		foreach ($data as &$element) {
// 			if ($element['shortcode'] == 'pix_icon') {
// 				// Override the default parameters here
// 				$element['params']['icon_size'] = (int)$element['params']['icon_size']*2;
// 			}
// 		}
//     }
//     return $data;
// }

// // Hook the function into vc_load_default_templates
// add_filter('vc_load_default_templates', 'override_custom_shortcode_defaults');


function pix_vc_scripts_front() {
	$isPixfortIcons = true;
	if (!\PixfortCore::instance()->icons::$isEnabled) {
		$isPixfortIcons = false;
	}
	$customIcons = [];
	$customIcons = apply_filters( 'pixfort_custom_font_icons', $customIcons );
	wp_enqueue_script('pixfort-admin-vc-icons', PIX_CORE_PLUGIN_URI . 'dist/main/wpbakery/wpbakery-icons-selector.js', ['jquery'], time(), true);
	wp_localize_script('pixfort-admin-vc-icons', 'pixfort_icons_obj', array(
		'ADMIN_LINK' => admin_url('admin-ajax.php?action=pix_icons_data'),
		'isPixfortIcons' => $isPixfortIcons,
		'CUSTOM_ICONS' => $customIcons
	));
	wp_enqueue_script('pixfort-admin-custom2', PIX_CORE_PLUGIN_URI . 'functions/js/pixfort_vc.min.js', array('jquery'), PLUGIN_VERSION, true);
	wp_enqueue_script('spectrum-picker', PIX_CORE_PLUGIN_URI . 'functions/js/params/spectrum.min.js', array('jquery'), PLUGIN_VERSION, true);
	wp_enqueue_script('pixfort-gradien-picker', PIX_CORE_PLUGIN_URI . 'functions/js/params/grapick.min.js', array('jquery'), PLUGIN_VERSION, true);
	wp_enqueue_style('spectrum-picker', PIX_CORE_PLUGIN_URI . '/functions/js/params/spectrum.min.css', false, PLUGIN_VERSION, 'all');
	wp_enqueue_style('pix-gradient-picker', PIX_CORE_PLUGIN_URI . '/functions/js/params/grapick.min.css', false, PLUGIN_VERSION, 'all');
	$icons_admin = pix_admin_icons();
	$templates = pix_get_templates_thumbs();
	$translation_array = array(
		'PIX_CORE_PLUGIN_URI' => PIX_CORE_PLUGIN_URI,
		'PIX_ICONS_ADMIN' => $icons_admin,
		'TEMPLATES_ARR'	=> $templates
	);
	//after wp_enqueue_script
	wp_localize_script('pixfort-admin-custom2', 'plugin_object', $translation_array);
	wp_deregister_script('pix-meta');
	wp_deregister_script('pix-meta2');
	wp_deregister_script('pix-options-builder');
}
add_action('vc_frontend_editor_render', 'pix_vc_scripts_front');

function pix_vc_scripts_back() {
	$isPixfortIcons = true;
	if (!\PixfortCore::instance()->icons::$isEnabled) {
		$isPixfortIcons = false;
	}
	$customIcons = [];
	$customIcons = apply_filters( 'pixfort_custom_font_icons', $customIcons );
	wp_enqueue_script('pixfort-admin-vc-icons', PIX_CORE_PLUGIN_URI . 'dist/main/wpbakery/wpbakery-icons-selector.js', ['jquery'], time(), true);
	wp_localize_script('pixfort-admin-vc-icons', 'pixfort_icons_obj', array(
		'ADMIN_LINK' => admin_url('admin-ajax.php?action=pix_icons_data'),
		'isPixfortIcons' => $isPixfortIcons,
		'CUSTOM_ICONS' => $customIcons
	));

	wp_enqueue_script('pixfort-admin-custom2', PIX_CORE_PLUGIN_URI . 'functions/js/pixfort_vc.min.js', ['jquery'], PLUGIN_VERSION, true);
	wp_enqueue_script('spectrum-picker', PIX_CORE_PLUGIN_URI . 'functions/js/params/spectrum.min.js', ['jquery'], PLUGIN_VERSION, true);
	wp_enqueue_script('pixfort-gradien-picker', PIX_CORE_PLUGIN_URI . 'functions/js/params/grapick.min.js', ['jquery'], PLUGIN_VERSION, true);
	wp_enqueue_style('spectrum-picker', PIX_CORE_PLUGIN_URI . '/functions/js/params/spectrum.min.css', false, PLUGIN_VERSION, 'all');
	wp_enqueue_style('pix-gradient-picker', PIX_CORE_PLUGIN_URI . '/functions/js/params/grapick.min.css', false, PLUGIN_VERSION, 'all');
	$icons_admin = pix_admin_icons();
	$templates = pix_get_templates_thumbs();
	$translation_array = array(
		'PIX_CORE_PLUGIN_URI' => PIX_CORE_PLUGIN_URI,
		'PIX_ICONS_ADMIN' => $icons_admin,
		'TEMPLATES_ARR'	=> $templates
	);
	//after wp_enqueue_script
	wp_localize_script('pixfort-admin-custom2', 'plugin_object', $translation_array);
}
add_action('vc_backend_editor_render', 'pix_vc_scripts_back');
