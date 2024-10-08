<?php
/**
 * Configuration file for [vc_btn] shortcode of 'Button' element.
 *
 * @see https://kb.wpbakery.com/docs/inner-api/vc_map/ for more detailed information about element attributes.
 * @since 4.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

require_once vc_path_dir( 'CONFIG_DIR', 'content/vc-btn-element.php' );

return vc_btn_element_params();
