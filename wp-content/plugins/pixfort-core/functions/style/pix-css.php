<?php

add_action('wp_enqueue_scripts', 'pix_essentials_enqueue_styles', 12);

function pix_essentials_enqueue_styles() {
	if (class_exists('woocommerce')) {
		$loadWooStyle = true;
		$loadWooStyle = apply_filters('pixfort_load_woo_style', $loadWooStyle);
		if ($loadWooStyle) {
			if (get_option('pix_woo_style_url')) {
				wp_enqueue_style('pix-woo-style', get_option('pix_woo_style_url'), array(), PLUGIN_VERSION, 'all');
			} else {
				require_once 'WP_SCSS_Compiler.php';
				$comp = WP_SCSS_Compiler::instance();
				$woo_url = $comp->parse_stylesheet(PIX_CORE_PLUGIN_URI . '/functions/woocommerce/css/woocommerce.scss', 'pix-woo-style');
				update_option('pix_woo_style_url', $woo_url, 'yes');
				wp_enqueue_style('pix-woo-style', $woo_url, array(), PLUGIN_VERSION, 'all');
			}
		}
		// wp_enqueue_style( 'pix-woo-2', PIX_CORE_PLUGIN_URI.'includes/assets/css/elements/woocommerce.min.css', false, PLUGIN_VERSION, 'all' );
	}

	if (get_option('pix_essentials_style_url')) {
		if (get_option('pixfort_style_url_id')) {
			$styleID = get_option('pixfort_style_url_id');
		} else {
			$styleID = rand(1, 200000000);
			update_option('pixfort_style_url_id', $styleID, 'yes');
		}
		wp_enqueue_style('pixfort-core-style', get_option('pix_essentials_style_url'), [], $styleID, 'all');
	} else {
		require_once 'WP_SCSS_Compiler.php';
		$comp = WP_SCSS_Compiler::instance();
		$script_url = $comp->parse_stylesheet(PIX_CORE_PLUGIN_URI . '/includes/assets/scss/pixfort.scss', 'pixfort-core-style');
		update_option('pix_essentials_style_url', $script_url, 'yes');
		$styleID = rand(1, 200000000);
		update_option('pixfort_style_url_id', $styleID, 'yes');
		wp_enqueue_style('pixfort-core-style', $script_url, [], $styleID, 'all');
	}
}


add_filter('woocommerce_enqueue_styles', 'pix_dequeue_woo_styles');
function pix_dequeue_woo_styles($enqueue_styles) {
	$loadWooStyle = true;
	$loadWooStyle = apply_filters('pixfort_load_woo_style', $loadWooStyle);
	if ($loadWooStyle) {
		unset($enqueue_styles['woocommerce-general']);	// Remove the gloss
		// unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
		// unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	}
	return $enqueue_styles;
}

add_action('wp_footer', 'pix_gradient_primary_defs');
function pix_gradient_primary_defs() {
	if (defined('DOING_AJAX') && DOING_AJAX) {
		return false;
	}

	$g_middle = false;
	if (pix_plugin_get_option('opt-primary-gradient-switch')) {
		$g_middle = true;
	}
	$gradient_1 = '#F27121';
	if (!empty(pix_plugin_get_option('opt-color-gradient-primary-1'))) {
		$gradient_1 = pix_plugin_get_option('opt-color-gradient-primary-1');
	}
	$gradient_middle = '#E94057';
	if (!empty(pix_plugin_get_option('opt-color-gradient-primary-middle'))) {
		$gradient_middle = pix_plugin_get_option('opt-color-gradient-primary-middle');
	}

	$gradient_2 = '#8A2387';
	if (!empty(pix_plugin_get_option('opt-color-gradient-primary-2'))) {
		$gradient_2 = pix_plugin_get_option('opt-color-gradient-primary-2');
	}
	echo '<svg width="0" height="0" style="height: 0; width: 0; position: absolute;" aria-hidden="true" focusable="false">
      <defs>
        <linearGradient id="svg-gradient-primary">
          <stop offset="0%" stop-color="' . $gradient_1 . '" />';
	if ($g_middle && !empty($gradient_middle)) {
		echo '<stop offset="50%" stop-color="' . $gradient_middle . '" />';
	}
	echo '<stop offset="100%" stop-color="' . $gradient_2 . '" />
        </linearGradient>
        <linearGradient id="svg-gradient-primary-light">
          <stop offset="0%" class="svg-gradient-stop-1" />';
	if ($g_middle && !empty($gradient_middle)) {
		echo '<stop offset="50%" class="svg-gradient-stop-2" />';
	}
	echo '<stop offset="100%" class="svg-gradient-stop-3" />
        </linearGradient>
      </defs>
    </svg>';
}


function pix_update_style_url() {
	require_once 'WP_SCSS_Compiler.php';
	$comp = WP_SCSS_Compiler::instance();
	$script_url = $comp->parse_stylesheet(PIX_CORE_PLUGIN_URI . '/includes/assets/scss/pixfort.scss', 'pixfort-core-style');
	// if(substr( $script_url, 0, 6 ) === "https:"){
	// 	$script_url = substr($script_url, 6);
	// }elseif(substr( $script_url, 0, 5 ) === "http:"){
	// 	$script_url = substr($script_url, 5);
	// }
	update_option('pix_essentials_style_url', $script_url, 'yes');
	$styleID = rand(1, 200000000);
	update_option('pixfort_style_url_id', $styleID, 'yes');
	$woo_url = $comp->parse_stylesheet(PIX_CORE_PLUGIN_URI . '/functions/woocommerce/css/woocommerce.scss', 'pix-woo-style');
	update_option('pix_woo_style_url', $woo_url, 'yes');
}

add_filter('pix_wp_scss_variables', 'pix_scss_vars', 10, 2);
function pix_scss_vars($vars, $handle) {

	if (! is_array($vars)) {
		$vars = array();
	}
	$vars['primary'] = '#7d8dff';
	$vars['secondary'] = '#ff4f81';
	$vars['body-color'] = '#212529';

	$defaults = [];
	if(function_exists('pix_theme_params')) {
		$themeParams = pix_theme_params();
		if(!empty($themeParams['btn-border-radius-sm'])) {
			$defaults['btn-border-radius-sm'] = $themeParams['btn-border-radius-sm'];
		}
		if(!empty($themeParams['btn-border-radius'])) {
			$defaults['btn-border-radius'] = $themeParams['btn-border-radius'];
		}
		if(!empty($themeParams['btn-border-radius-md'])) {
			$defaults['btn-border-radius-md'] = $themeParams['btn-border-radius-md'];
		}
		if(!empty($themeParams['btn-border-radius-lg'])) {
			$defaults['btn-border-radius-lg'] = $themeParams['btn-border-radius-lg'];
		}
		if(!empty($themeParams['btn-border-radius-xl'])) {
			$defaults['btn-border-radius-xl'] = $themeParams['btn-border-radius-xl'];
		}
		if(!empty($themeParams['color_gray_1'])) {
			$vars['color-gray-1'] = $themeParams['color_gray_1'];
		}
		if(!empty($themeParams['color_gray_2'])) {
			$vars['color-gray-2'] = $themeParams['color_gray_2'];
		}
		if(!empty($themeParams['color_gray_3'])) {
			$vars['color-gray-3'] = $themeParams['color_gray_3'];
		}
		if(!empty($themeParams['color_gray_4'])) {
			$vars['color-gray-4'] = $themeParams['color_gray_4'];
		}
		if(!empty($themeParams['color_gray_5'])) {
			$vars['color-gray-5'] = $themeParams['color_gray_5'];
		}
		if(!empty($themeParams['color_gray_6'])) {
			$vars['color-gray-6'] = $themeParams['color_gray_6'];
		}
		if(!empty($themeParams['color_gray_7'])) {
			$vars['color-gray-7'] = $themeParams['color_gray_7'];
		}
		if(!empty($themeParams['color_gray_8'])) {
			$vars['color-gray-8'] = $themeParams['color_gray_8'];
		}
		if(!empty($themeParams['color_gray_9'])) {
			$vars['color-gray-9'] = $themeParams['color_gray_9'];
		}
	}
	if ($handle == 'pix-woo-style') {
		if (!empty(pix_plugin_get_option('opt-primary-color'))) {
			$vars['primary'] = pix_plugin_get_option('opt-primary-color');
		}
		if (!empty(pix_plugin_get_option('opt-secondary-color'))) {
			$vars['secondary'] = pix_plugin_get_option('opt-secondary-color');
		}
		if (is_multisite()) {
			$vars['plugin-uri'] = '../../../../plugins/pixfort-core/functions/woocommerce/';
		} else {
			$vars['plugin-uri'] = '../../plugins/pixfort-core/functions/woocommerce/';
		}
	} else {
		// colors
		if (!empty(pix_plugin_get_option('opt-primary-color'))) {
			$vars['primary'] = pix_plugin_get_option('opt-primary-color');
		}
		if (!empty(pix_plugin_get_option('opt-secondary-color'))) {
			$vars['secondary'] = pix_plugin_get_option('opt-secondary-color');
		}
		if (!empty(pix_plugin_get_option('opt-body-color'))) {
			if (pix_plugin_get_option('opt-body-color') != 'custom') {
				// $vars['body-color'] = 'final-color("' . pix_plugin_get_option('opt-body-color') . '")';
				$vars['body-color-var'] = 'var(--pix-' . pix_plugin_get_option('opt-body-color') . ', final-color("' . pix_plugin_get_option('opt-body-color') . '"))';
			} else {
				$vars['body-color'] = pix_plugin_get_option('opt-custom-body-color');
			}
		}
		if (!empty(pix_plugin_get_option('opt-dark-body-color'))) {
			if (pix_plugin_get_option('opt-dark-body-color') != 'custom') {
				$vars['dark-body-color'] = 'final-color("' . pix_plugin_get_option('opt-dark-body-color') . '")';
			} else {
				$vars['dark-body-color'] = pix_plugin_get_option('opt-custom-dark-body-color');
			}
		}

		if (!empty(pix_plugin_get_option('opt-heading-color'))) {
			if (pix_plugin_get_option('opt-heading-color') != 'custom') {
				$vars['heading-color'] = 'final-color("' . pix_plugin_get_option('opt-heading-color') . '")';
				$vars['heading-color-var'] = 'var(--pix-' . pix_plugin_get_option('opt-heading-color') . ', final-color("' . pix_plugin_get_option('opt-heading-color') . '"))';
			} else {
				if (!empty(pix_plugin_get_option('opt-custom-heading-color'))) {
					$vars['heading-color'] = pix_plugin_get_option('opt-custom-heading-color');
				} else {
					$vars['heading-color'] = '#495057';
				}
			}
		} else {
			$vars['heading-color'] = 'final-color(gray-7)';
		}
		if (!empty(pix_plugin_get_option('opt-dark-heading-color'))) {
			if (pix_plugin_get_option('opt-dark-heading-color') != 'custom') {
				$vars['dark-heading-color'] = 'final-color("' . pix_plugin_get_option('opt-dark-heading-color') . '")';
			} else {
				if (!empty(pix_plugin_get_option('opt-custom-dark-heading-color'))) {
					$vars['dark-heading-color'] = pix_plugin_get_option('opt-custom-dark-heading-color');
				} else {
					$vars['dark-heading-color'] = '#ffffff';
				}
			}
		} else {
			$vars['dark-heading-color'] = 'white';
		}


		if (!empty(pix_plugin_get_option('opt-link-color'))) {
			if(is_array(pix_plugin_get_option('opt-link-color')) ) {
				$vars['link-color'] = pix_plugin_get_option('opt-link-color')['light'];
			} elseif(is_object(pix_plugin_get_option('opt-link-color'))){
				$vars['link-color'] = pix_plugin_get_option('opt-link-color')->light;
			} else {
				$vars['link-color'] = pix_plugin_get_option('opt-link-color');
			}
		}
		if (!empty(pix_plugin_get_option('opt-font-size-base'))) {
			$fontSizeBase = pix_plugin_get_option('opt-font-size-base');
			if (!pix_endsWith($fontSizeBase, 'rem')) {
				$fontSizeBase = '1rem';
			}
			$vars['font-size-base'] = $fontSizeBase;
		} else {
			$vars['font-size-base'] = '1rem';
		}

		if (!empty(pix_plugin_get_option('opt-primary-font-spacing'))) {
			$vars['letter-spacing-base'] = pix_plugin_get_option('opt-primary-font-spacing');
		} else {
			$vars['letter-spacing-base'] = '-0.1px';
		}
		if (!empty(pix_plugin_get_option('opt-secondary-font-spacing'))) {
			$vars['letter-spacing-secondary'] = pix_plugin_get_option('opt-secondary-font-spacing');
		} else {
			$vars['letter-spacing-secondary'] = '-0.1px';
		}

		if (pix_plugin_get_option('opt-primary-gradient-switch')) {
			$vars['middle-gradient'] = 'yes';
		} else {
			$vars['middle-gradient'] = 'no';
		}
		if (!empty(pix_plugin_get_option('opt-color-gradient-primary-1'))) {
			$vars['gradient-primary-1'] = pix_plugin_get_option('opt-color-gradient-primary-1');
		}
		if (!empty(pix_plugin_get_option('opt-color-gradient-primary-middle'))) {
			$vars['gradient-primary-middle'] = pix_plugin_get_option('opt-color-gradient-primary-middle');
		}

		if (!empty(pix_plugin_get_option('opt-color-gradient-primary-2'))) {
			$vars['gradient-primary-2'] = pix_plugin_get_option('opt-color-gradient-primary-2');
		}
		if (!empty(pix_plugin_get_option('opt-primary-gradient-dir'))) {
			$vars['gradient-direction'] = pix_plugin_get_option('opt-primary-gradient-dir');
		}


		if (!empty(pix_plugin_get_option('opt-primary-font'))) {
			if (strpos(pix_plugin_get_option('opt-primary-font')['font-family'], ',') !== false) {
				$fontFamilyBase = pix_plugin_get_option('opt-primary-font')['font-family'];
			} else {
				$fontFamilyBase = ' "' . pix_plugin_get_option('opt-primary-font')['font-family'] . '" ';
			}
			if (!empty(pix_plugin_get_option('opt-primary-font')['font-backup'])) {
				$fontFamilyBase .= ', ' . pix_plugin_get_option('opt-primary-font')['font-backup'];
			}
			$vars['font-family-base'] = $fontFamilyBase;
		}
		if (!empty(pix_plugin_get_option('opt-secondary-font'))) {
			if (strpos(pix_plugin_get_option('opt-secondary-font')['font-family'], ',') !== false) {
				$fontFamilySecondary = pix_plugin_get_option('opt-secondary-font')['font-family'];
			} else {
				$fontFamilySecondary = ' "' . pix_plugin_get_option('opt-secondary-font')['font-family'] . '" ';
			}

			if (!empty(pix_plugin_get_option('opt-secondary-font')['font-backup'])) {
				$fontFamilySecondary .= ', ' . pix_plugin_get_option('opt-secondary-font')['font-backup'];
			}
			$vars['font-family-secondary'] = $fontFamilySecondary;
		}
		if (!empty(pix_plugin_get_option('opt-regular-font-weight'))) {
			$vars['font-weight-normal'] = pix_plugin_get_option('opt-regular-font-weight');
		}
		if (!empty(pix_plugin_get_option('opt-bold-font-weight'))) {
			$vars['font-weight-bold'] = pix_plugin_get_option('opt-bold-font-weight');
		}
		if (!empty(pix_plugin_get_option('opt-heading-font-weight'))) {
			$vars['heading-font-weight'] = pix_plugin_get_option('opt-heading-font-weight');
		}
		if (!empty(pix_plugin_get_option('opt-heading-bold-font-weight'))) {
			$vars['heading-bold-font-weight'] = pix_plugin_get_option('opt-heading-bold-font-weight');
		} 
		// else {
		// 	$vars['heading-bold-font-weight'] = '700';
		// }
		if (!empty(pix_plugin_get_option('pix-custom-container-width'))) {
			$vars['custom-container'] = pix_plugin_get_option('pix-custom-container-width');
		}
		if (!empty(pix_plugin_get_option('google-api-key'))) {
			$vars['enable_google_maps'] = pix_plugin_get_option('google-api-key');
		}

		/*
		* Design System
		*/
		// Main colors
		$colorOptions = [
			'blue' => 'opt-color-blue',
			'green' => 'opt-color-green',
			'cyan' => 'opt-color-cyan',
			'yellow' => 'opt-color-yellow',
			'orange' => 'opt-color-orange',
			'red' => 'opt-color-red',
			'brown' => 'opt-color-brown',
			'purple' => 'opt-color-purple'
		];
		// if (!empty(pix_plugin_get_option('opt-color-blue'))) {
		// 	$vars['blue'] = pix_plugin_get_option('opt-color-blue');
		// }
		// if (!empty(pix_plugin_get_option('opt-color-green'))) {
		// 	$vars['green'] = pix_plugin_get_option('opt-color-green');
		// }
		// if (!empty(pix_plugin_get_option('opt-color-cyan'))) {
		// 	$vars['cyan'] = pix_plugin_get_option('opt-color-cyan');
		// }
		// if (!empty(pix_plugin_get_option('opt-color-yellow'))) {
		// 	$vars['yellow'] = pix_plugin_get_option('opt-color-yellow');
		// }
		// if (!empty(pix_plugin_get_option('opt-color-orange'))) {
		// 	$vars['orange'] = pix_plugin_get_option('opt-color-orange');
		// }
		// if (!empty(pix_plugin_get_option('opt-color-red'))) {
		// 	$vars['red'] = pix_plugin_get_option('opt-color-red');
		// }
		// if (!empty(pix_plugin_get_option('opt-color-brown'))) {
		// 	$vars['brown'] = pix_plugin_get_option('opt-color-brown');
		// }
		// if (!empty(pix_plugin_get_option('opt-color-purple'))) {
		// 	$vars['purple'] = pix_plugin_get_option('opt-color-purple');
		// }
		foreach ($colorOptions as $color => $option) {
			if (!empty(pix_plugin_get_option($option))) {
				$vars[$color] = pix_plugin_get_option($option);
			}
		}

		$dynamicColorOptions = [
			'pix-dynamic-gray-950' => 'pix-dynamic-gray-950',
			'pix-dynamic-gray-900' => 'pix-dynamic-gray-900',
			'pix-dynamic-gray-800' => 'pix-dynamic-gray-800',
			'pix-dynamic-gray-700' => 'pix-dynamic-gray-700',
			'pix-dynamic-gray-600' => 'pix-dynamic-gray-600',
			'pix-dynamic-gray-500' => 'pix-dynamic-gray-500',
			'pix-dynamic-gray-400' => 'pix-dynamic-gray-400',
			'pix-dynamic-gray-300' => 'pix-dynamic-gray-300',
			'pix-dynamic-gray-200' => 'pix-dynamic-gray-200',
			'pix-dynamic-gray-100' => 'pix-dynamic-gray-100',
			'pix-dynamic-gray-50' => 'pix-dynamic-gray-50',
			'pix-dynamic-background' => 'pix-dynamic-background',
			'pix-dynamic-heading' => 'pix-dynamic-heading',
		];
		foreach ($dynamicColorOptions as $color => $option) {
			if (!empty(pix_plugin_get_option($option))) {
				$varValue = pix_plugin_get_option($option);
				if (!empty($varValue->light)) {
					$vars[$color] = $varValue->light;
				}
			}
		}

		// Buttons
		if (!empty(pix_plugin_get_option('btn-sm-border-radius'))) {
			$borderRadiusValue = pixGetDimensionsValue(pix_plugin_get_option('btn-sm-border-radius'));
			if (!empty($borderRadiusValue)) {
				$vars['btn-border-radius-sm'] = $borderRadiusValue;
			} else if (!empty($defaults['btn-border-radius-sm'])) {
				$vars['btn-border-radius-sm'] = $defaults['btn-border-radius-sm'];
			}
		} else if (!empty($defaults['btn-border-radius-sm'])) {
			$vars['btn-border-radius-sm'] = $defaults['btn-border-radius-sm'];
		}
		if (!empty(pix_plugin_get_option('btn-default-border-radius'))) {
			$borderRadiusValue = pixGetDimensionsValue(pix_plugin_get_option('btn-default-border-radius'));
			if (!empty($borderRadiusValue)) {
				$vars['btn-border-radius'] = $borderRadiusValue;
			} else if (!empty($defaults['btn-border-radius'])) {
				$vars['btn-border-radius'] = $defaults['btn-border-radius'];
			}
		} else if (!empty($defaults['btn-border-radius'])) {
			$vars['btn-border-radius'] = $defaults['btn-border-radius'];
		}
		if (!empty(pix_plugin_get_option('btn-md-border-radius'))) {
			$borderRadiusValue = pixGetDimensionsValue(pix_plugin_get_option('btn-md-border-radius'));
			if (!empty($borderRadiusValue)) {
				$vars['btn-border-radius-md'] = $borderRadiusValue;
			} else if (!empty($defaults['btn-border-radius-md'])) {
				$vars['btn-border-radius-md'] = $defaults['btn-border-radius-md'];
			}
		} else if (!empty($defaults['btn-border-radius-md'])) {
			$vars['btn-border-radius-md'] = $defaults['btn-border-radius-md'];
		}
		if (!empty(pix_plugin_get_option('btn-lg-border-radius'))) {
			$borderRadiusValue = pixGetDimensionsValue(pix_plugin_get_option('btn-lg-border-radius'));
			if (!empty($borderRadiusValue)) {
				$vars['btn-border-radius-lg'] = $borderRadiusValue;
			} else if (!empty($defaults['btn-border-radius-lg'])) {
				$vars['btn-border-radius-lg'] = $defaults['btn-border-radius-lg'];
			}
		} else if (!empty($defaults['btn-border-radius-lg'])) {
			$vars['btn-border-radius-lg'] = $defaults['btn-border-radius-lg'];
		}
		if (!empty(pix_plugin_get_option('btn-xl-border-radius'))) {
			$borderRadiusValue = pixGetDimensionsValue(pix_plugin_get_option('btn-xl-border-radius'));
			if (!empty($borderRadiusValue)) {
				$vars['btn-border-radius-xl'] = $borderRadiusValue;
			} else if (!empty($defaults['btn-border-radius-xl'])) {
				$vars['btn-border-radius-xl'] = $defaults['btn-border-radius-xl'];
			}
		} else if (!empty($defaults['btn-border-radius-xl'])) {
			$vars['btn-border-radius-xl'] = $defaults['btn-border-radius-xl'];
		}

		$buttonSizes = ['sm', 'default', 'md', 'lg', 'xl'];
		$directions = ['top', 'right', 'bottom', 'left'];

		foreach ($buttonSizes as $size) {
			$optionKey = 'btn-' . $size . '-padding';
			$suffix = $size === 'default' ? '' : '-' . $size;

			if (!empty(pix_plugin_get_option($optionKey))) {
				foreach ($directions as $direction) {
					$paddingValue = pixGetPaddingDimensionsValue(pix_plugin_get_option($optionKey), $direction);
					if (!empty($paddingValue)) {
						$vars['$btn-padding-' . substr($direction, 0, 1) . $suffix] = $paddingValue;
					}
				}
			}
		}



		// Headings font size
		if (!empty(pix_plugin_get_option('opt-font-size-h1'))) {
			// $vars['h1-font-size'] = pix_plugin_get_option('opt-font-size-h1');
			$vars = pixfortFontVars($vars, 'opt-font-size-h1', 'h1-font-size', 'px');
		}
		if (!empty(pix_plugin_get_option('opt-font-size-h2'))) {
			// $vars['h2-font-size'] = pix_plugin_get_option('opt-font-size-h2');
			$vars = pixfortFontVars($vars, 'opt-font-size-h2', 'h2-font-size', 'px');
		}
		if (!empty(pix_plugin_get_option('opt-font-size-h3'))) {
			// $vars['h3-font-size'] = pix_plugin_get_option('opt-font-size-h3');
			$vars = pixfortFontVars($vars, 'opt-font-size-h3', 'h3-font-size', 'px');
		}
		if (!empty(pix_plugin_get_option('opt-font-size-h4'))) {
			// $vars['h4-font-size'] = pix_plugin_get_option('opt-font-size-h4');
			$vars = pixfortFontVars($vars, 'opt-font-size-h4', 'h4-font-size', 'px');
		}
		if (!empty(pix_plugin_get_option('opt-font-size-h5'))) {
			// $vars['h5-font-size'] = pix_plugin_get_option('opt-font-size-h5');
			$vars = pixfortFontVars($vars, 'opt-font-size-h5', 'h5-font-size', 'px');
		}
		if (!empty(pix_plugin_get_option('opt-font-size-h6'))) {
			// $vars['h6-font-size'] = pix_plugin_get_option('opt-font-size-h6');
			$vars = pixfortFontVars($vars, 'opt-font-size-h6', 'h6-font-size', 'px');
		}
		if (!defined('IS_PIXFORT_THEME')) {
			if (!empty(pix_plugin_get_option('disable-fixed-gradient'))) {
				$vars['disable-fixed-gradient'] = pix_plugin_get_option('disable-fixed-gradient');
			}
		} else {
			$vars['disable-fixed-gradient'] = '1';
		}

		// line heights
		// if(!empty(pix_plugin_get_option('opt-line-height-base'))){
		// 	$vars['base-line-height'] = pix_plugin_get_option('opt-line-height-base');
		// }
		if (!empty(pix_plugin_get_option('opt-line-height-h1'))) {
			// $vars['h1-line-height'] = pix_plugin_get_option('opt-line-height-h1');
			$vars = pixfortFontVars($vars, 'opt-line-height-h1', 'h1-line-height', '');
		}
		if (!empty(pix_plugin_get_option('opt-line-height-h2'))) {
			// $vars['h2-line-height'] = pix_plugin_get_option('opt-line-height-h2');
			$vars = pixfortFontVars($vars, 'opt-line-height-h2', 'h2-line-height', '');
		}
		if (!empty(pix_plugin_get_option('opt-line-height-h3'))) {
			// $vars['h3-line-height'] = pix_plugin_get_option('opt-line-height-h3');
			$vars = pixfortFontVars($vars, 'opt-line-height-h3', 'h3-line-height', '');
		}
		if (!empty(pix_plugin_get_option('opt-line-height-h4'))) {
			// $vars['h4-line-height'] = pix_plugin_get_option('opt-line-height-h4');
			$vars = pixfortFontVars($vars, 'opt-line-height-h4', 'h4-line-height', '');
		}
		if (!empty(pix_plugin_get_option('opt-line-height-h5'))) {
			// $vars['h5-line-height'] = pix_plugin_get_option('opt-line-height-h5');
			$vars = pixfortFontVars($vars, 'opt-line-height-h5', 'h5-line-height', '');
		}
		if (!empty(pix_plugin_get_option('opt-line-height-h6'))) {
			// $vars['h6-line-height'] = pix_plugin_get_option('opt-line-height-h6');
			$vars = pixfortFontVars($vars, 'opt-line-height-h6', 'h6-line-height', '');
		}

		$strokeWidth = pix_plugin_get_option('pixfort-icons-stroke-width');
		if (isset($strokeWidth) && !empty($strokeWidth) && is_numeric($strokeWidth) && $strokeWidth >= 0 && $strokeWidth <= 2) {
			$vars['pixfort-stroke-width'] = pix_plugin_get_option('pixfort-icons-stroke-width');
		} else {
			$vars['pixfort-stroke-width'] = '1.5';
		}


		if (class_exists('WooCommerce')) {
			$vars['enable_woocommerce'] = 'true';
		}

		if (!empty(pix_plugin_get_option('pix-mobile-breakpoint'))) {
			$customBreakpoint = (int)pix_plugin_get_option('pix-mobile-breakpoint');
			$vars['customBreakpoint'] = $customBreakpoint . 'px';
		}
		if (!empty(pix_plugin_get_option('site-loading-style'))) {
			$vars['siteLoadingStyle'] = pix_plugin_get_option('site-loading-style');
			if (!empty(pix_plugin_get_option('site-loading-img-width'))) {
				$vars['siteLoadingImgWidth'] = pix_plugin_get_option('site-loading-img-width');
			}
		}
	}
	if(PixfortCore::instance()->getThemeParam('invert_colors_css')) {
		$vars['invert_colors_css'] = 'true';
	}


	return $vars;
}


function pixfortIsJson($string) {
	$obj = json_decode($string, true);
	if (json_last_error() == JSON_ERROR_NONE && !is_numeric($string)) {
		return $obj;
	}
	return false;
}

function pixfortCheckResponsiveString($variable) {
	if ($res = pixfortIsJson($variable)) {
		return $res;
	} else {
		return [
			"desktop" => $variable,
			"tablet" => '',
			"mobile" => ''
		];
	}
}

function pixfortAddPxIfNumber($variable, $unit) {
	// Check if the variable is a string and is numeric
	if (is_string($variable) && is_numeric($variable)) {
		// Append $unit and return the new value
		return $variable . $unit;
	}
	// Return the original variable if it's not a numeric string
	return $variable;
}

function pixfortFontVars($vars, $optionName, $varName, $defaultUnit = '') {
	$responsiveValue = pixfortCheckResponsiveString(pix_plugin_get_option($optionName));
	// var_dump($responsiveValue);
	if (!empty($responsiveValue['desktop'])) {
		$vars[$varName] = pixfortAddPxIfNumber($responsiveValue['desktop'], $defaultUnit);
	}
	if (!empty($responsiveValue['tablet'])) {
		$varNameTablet = $varName . '-tablet';
		$vars[$varNameTablet] = pixfortAddPxIfNumber($responsiveValue['tablet'], $defaultUnit);
	}
	if (!empty($responsiveValue['mobile'])) {
		$varNameMobile = $varName . '-mobile';
		$vars[$varNameMobile] = pixfortAddPxIfNumber($responsiveValue['mobile'], $defaultUnit);
	}
	return $vars;
}


function wpb_add_google_fonts() {
	// if (!is_user_logged_in() && (!defined('DOING_AJAX') || !DOING_AJAX)) {
	// 	return false;
	// }

	$default_fonts = array(
		"Arial, Helvetica, sans-serif",
		"'Arial Black', Gadget, sans-serif",
		"'Bookman Old Style', serif",
		"'Comic Sans MS', cursive",
		"Courier, monospace",
		"Garamond, serif",
		"Georgia, serif",
		"Impact, Charcoal, sans-serif",
		"'Lucida Console', Monaco, monospace",
		"'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
		"'MS Sans Serif', Geneva, sans-serif",
		"'MS Serif', 'New York', sans-serif",
		"'Palatino Linotype', 'Book Antiqua', Palatino, serif",
		"Tahoma, Geneva, sans-serif",
		"'Times New Roman', Times, serif",
		"'Trebuchet MS', Helvetica, sans-serif",
		"Verdana, Geneva, sans-serif",
	);


	/*
	* Body font
	*/
	$googleFontURL_1 = get_option('pix_google_font_1');
	if (!empty($googleFontURL_1) && $googleFontURL_1) {
		wp_enqueue_style('pix-google-font-primary', $googleFontURL_1, false, PIXFORT_PLUGIN_VERSION, 'all');
	} else {
		/*
		* Code below will be deprecated in future updates (Google font URL is set from theme options)
		*/
		// $bodyWeightsList = [];
		// if (!empty(pix_plugin_get_option('opt-regular-font-weight'))) {
		// 	array_push($bodyWeightsList, pix_plugin_get_option('opt-regular-font-weight'));
		// } else {
		// 	array_push($bodyWeightsList, "400");
		// }
		// if (!empty(pix_plugin_get_option('opt-bold-font-weight'))) {
		// 	array_push($bodyWeightsList, pix_plugin_get_option('opt-bold-font-weight'));
		// } else {
		// 	array_push($bodyWeightsList, "700");
		// }
		// $bodyWeights = implode(',', $bodyWeightsList);
		// if (!empty(pix_plugin_get_option('opt-primary-font'))) {
		// 	$notGoogle = false;
		// 	if (!empty(pix_plugin_get_option('opt-primary-font')['notGoogleFont'])) {
		// 		if (pix_plugin_get_option('opt-primary-font')['notGoogleFont']) {
		// 			$notGoogle = true;
		// 		}
		// 	}
		// 	if (!$notGoogle && pix_plugin_get_option('opt-primary-font')['google'] && strcmp(pix_plugin_get_option('opt-primary-font')['google'], 'false') != 0) {
		// 		if (
		// 			pix_plugin_get_option('opt-primary-font')['font-family'] != pix_plugin_get_option('opt-external-font-1-name')
		// 			&& pix_plugin_get_option('opt-primary-font')['font-family'] != pix_plugin_get_option('opt-external-font-2-name')
		// 		) {
		// 			if (!in_array(pix_plugin_get_option('opt-primary-font')['font-family'], $default_fonts)) {
		// 				$primaryGoogleFont = pix_plugin_get_option('opt-primary-font')['font-family'];
		// 				array_push($default_fonts, $primaryGoogleFont);
		// 				$url = esc_url_raw('https://fonts.googleapis.com/css?display=swap&family=' . $primaryGoogleFont . ':' . $bodyWeights);
		// 				update_option('pix_google_font_1', $url);
		// 				wp_enqueue_style('wpb-google-font-primary', $url, false, PIXFORT_PLUGIN_VERSION, 'all');
		// 			}
		// 		}
		// 	}
		// }
	}



	/*
	* Heading font
	*/
	$googleFontURL_2 = get_option('pix_google_font_2');
	if (!empty($googleFontURL_2) && $googleFontURL_2) {
		if ($googleFontURL_2 !== 'none') {
			wp_enqueue_style('pix-google-font-secondary', $googleFontURL_2, false, PIXFORT_PLUGIN_VERSION, 'all');
		}
	} else {
		/*
		* Code below will be deprecated in future updates (Google font URL is set from theme options)
		*/
		// $headingWeightsList = [];
		// if (!empty(pix_plugin_get_option('opt-heading-font-weight'))) {
		// 	array_push($headingWeightsList, pix_plugin_get_option('opt-heading-font-weight'));
		// } else {
		// 	if (!empty(pix_plugin_get_option('opt-regular-font-weight'))) {
		// 		array_push($headingWeightsList, pix_plugin_get_option('opt-regular-font-weight'));
		// 	} else {
		// 		array_push($headingWeightsList, "400");
		// 	}
		// }
		// if (!empty(pix_plugin_get_option('opt-heading-bold-font-weight'))) {
		// 	array_push($headingWeightsList, pix_plugin_get_option('opt-heading-bold-font-weight'));
		// } else {
		// 	if (!empty(pix_plugin_get_option('opt-bold-font-weight'))) {
		// 		array_push($headingWeightsList, pix_plugin_get_option('opt-bold-font-weight'));
		// 	} else {
		// 		array_push($headingWeightsList, "700");
		// 	}
		// }
		// $headingWeights = implode(',', $headingWeightsList);
		// if (!empty(pix_plugin_get_option('opt-secondary-font'))) {
		// 	$notGoogle = false;
		// 	if (!empty(pix_plugin_get_option('opt-secondary-font')['notGoogleFont'])) {
		// 		if (pix_plugin_get_option('opt-secondary-font')['notGoogleFont']) {
		// 			$notGoogle = true;
		// 		}
		// 	}
		// 	if (
		// 		!$notGoogle && pix_plugin_get_option('opt-secondary-font')['google']
		// 		&& strcmp(pix_plugin_get_option('opt-secondary-font')['google'], 'false') != 0
		// 		&& pix_plugin_get_option('opt-secondary-font')['google'] != false
		// 	) {
		// 		if (
		// 			pix_plugin_get_option('opt-secondary-font')['font-family'] != pix_plugin_get_option('opt-external-font-1-name')
		// 			&& pix_plugin_get_option('opt-secondary-font')['font-family'] != pix_plugin_get_option('opt-external-font-2-name')
		// 		) {
		// 			if (!in_array(pix_plugin_get_option('opt-secondary-font')['font-family'], $default_fonts)) {
		// 				$url2 = esc_url_raw('https://fonts.googleapis.com/css?display=swap&family=' . pix_plugin_get_option('opt-secondary-font')['font-family'] . ':' . $headingWeights);
		// 				update_option('pix_google_font_2', $url2);
		// 				wp_enqueue_style('wpb-google-font-secondary', $url2, false, PIXFORT_PLUGIN_VERSION, 'all');
		// 			}
		// 		}
		// 	}
		// }
	}
}

// add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );
add_action('wp_footer', 'wpb_add_google_fonts');

function pix_add_custom_fonts() {
	if (defined('DOING_AJAX') && DOING_AJAX) {
		return false;
	}
	if (!empty(pix_plugin_get_option('opt-primary-font'))) {
		if (!empty(pix_plugin_get_option('opt-external-font-1-url'))) {
			wp_enqueue_style('pix-external-font-1', pix_plugin_get_option('opt-external-font-1-url'), false, PIXFORT_PLUGIN_VERSION, 'all');
		}
	}

	if (!empty(pix_plugin_get_option('opt-secondary-font'))) {
		if (!empty(pix_plugin_get_option('opt-external-font-2-url'))) {
			wp_enqueue_style('pix-external-font-2', pix_plugin_get_option('opt-external-font-2-url'), false, PIXFORT_PLUGIN_VERSION, 'all');
		}
	}
}
add_action('wp_footer', 'pix_add_custom_fonts');

function pixfort_core_styles() {
	if (function_exists('wpcf7_plugin_path')) {
		wp_enqueue_style('pix-cf7', PIX_CORE_PLUGIN_URI . 'includes/assets/css/elements/cf7.min.css', false, PIXFORT_PLUGIN_VERSION, 'all');
	}
}
add_action('wp_footer', 'pixfort_core_styles');

function pixGetDimensionsValue($dataString) {
	$result = '';
	if (!empty($dataString)) {
		$data = false;
		if (is_string($dataString)) {
			$data = json_decode(wp_specialchars_decode($dataString));
		} elseif ($dataString instanceof stdClass) {
			$data = $dataString;
		}
		if ($data) {
			if ($data->isAdvanced) {
				$top = !empty($data->top) ? $data->top : 0;
				$right = !empty($data->right) ? $data->right : 0;
				$bottom = !empty($data->bottom) ? $data->bottom : 0;
				$left = !empty($data->left) ? $data->left : 0;
				$result = $top . 'px ' . $right . 'px ' . $bottom . 'px ' . $left . 'px';
			} else {
				if (!empty($data->value)) {
					$result = $data->value . 'px';
				} else if ($data->value === 0) {
					$result = '0px';
				}
			}
		}
	}
	return $result;
}

function pixGetPaddingDimensionsValue($dataString, $direction) {
	$result = '';
	if (!empty($dataString)) {
		$data = false;
		if (is_string($dataString)) {
			$data = json_decode(wp_specialchars_decode($dataString));
		} elseif ($dataString instanceof stdClass) {
			$data = $dataString;
		}
		if ($data) {
			if ($data->isAdvanced) {
				if(!empty($data->top) && !empty($data->right) && !empty($data->bottom) && !empty($data->left)){
					$top = !empty($data->top) ? $data->top : 0;
					$right = !empty($data->right) ? $data->right : 0;
					$bottom = !empty($data->bottom) ? $data->bottom : 0;
					$left = !empty($data->left) ? $data->left : 0;
					if ($direction == 'top') {
						$result = $top . 'px';
					} else if ($direction == 'right') {
						$result = $right . 'px';
					} else if ($direction == 'bottom') {
						$result = $bottom . 'px';
					} else if ($direction == 'left') {
						$result = $left . 'px';
					}
				}
			} else {
				if (!empty($data->value)) {
					$result = $data->value . 'px';
				} else if ($data->value === 0) {
					$result = '0px';
				}
			}
		}
	}
	return $result;
}
