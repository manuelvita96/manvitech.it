<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/* ---------------------------------------------------------------------------
* Menu
* --------------------------------------------------------------------------- */
class PixMenu {

	function render($attr, $content = null) {

		extract(shortcode_atts(array(
			'css' 			=> '',
		), $attr));

		$css_class = '';
		if (function_exists('vc_shortcode_custom_css_class')) {
			$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));
		}

		$output = '';
		if (function_exists('pix_get_header_menu')) {
			$output .= pix_get_header_menu($attr);
		}

		return $output;
	}
}

// add_shortcode('pix_menu', 'sc_pix_menu');