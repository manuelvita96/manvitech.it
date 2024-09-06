<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Core Options.
 *
 * 
 *
 * @since 1.0.0
 */
class CoreOptions {
	/**
	 * Instance.
	 *
	 * Holds the options instance.
	 *
	 *
	 */
	public static $instance = null;

	public function __construct() {
		$this->load();
	}

	public function load() {
		add_action('admin_menu', array($this, 'pixfort_options_init'), 99);
		add_action('wp_ajax_pix_options_save', array($this, 'saveData'));
		add_action('wp_ajax_nopriv_pix_options_save', array($this, 'saveData'));
		add_action('wp_ajax_pix_options_getFonts', array($this, 'getFonts'));
		add_action('wp_ajax_nopriv_pix_options_getFonts', array($this, 'getFonts'));
		add_action('wp_ajax_pix_options_exportOptions', array($this, 'exportOptions'));
		add_action('wp_ajax_nopriv_pix_options_exportOptions', array($this, 'exportOptions'));
		add_action('wp_ajax_pix_options_importOptions', array($this, 'importOptions'));
		add_action('wp_ajax_nopriv_pix_options_importOptions', array($this, 'importOptions'));
		add_action('after_setup_theme', array($this, 'checkOptions'), 100);
	}

	function pixfort_options_init() {
		add_submenu_page('pixfort-theme-dashboard', 'Theme Options', 'Theme Options', 'manage_options', 'pixfort-options', array($this, 'pixfort_options_page'), 3);
	}

	public static function instance() {
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	function checkOptions() {
		$pix_options = get_option("pix_options");
		if(!$pix_options){
			require_once PIXFORT_PLUGIN_DIR . 'includes/options/options.php';
			$options = pixDisplayOptions(false)->getOptions();
			$pix_options = [];
			foreach ($options as $key => $value) {
				if(!empty($value['default'])){
					$pix_options[$key] = $value['default'];
				}
			}
			update_option('pix_options', $pix_options, true);
			$this->pixfort_save_compiler_action($pix_options);
		}
	}

	function getFonts() {
		$result = [];
		if (!empty($_REQUEST['data'])) {
			$data = $_REQUEST['data'];
			$data = stripslashes($data);
			$obj = json_decode(wp_specialchars_decode($data, TRUE));

			$defaultFonts = [
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
			];

			$pixFonts = [];
			if (!empty(pix_plugin_get_option('opt-external-font-1-name'))) {
				$pixFonts[pix_plugin_get_option('opt-external-font-1-name')] = 'pix-' . pix_plugin_get_option('opt-external-font-1-name');
			}
			if (!empty(pix_plugin_get_option('opt-external-font-2-name'))) {
				$pixFonts[pix_plugin_get_option('opt-external-font-2-name')] = 'pix-' . pix_plugin_get_option('opt-external-font-2-name');
			}

			$googleFonts = [];
			$googleFile = PIX_CORE_PLUGIN_DIR . '/includes/options/data/googlefonts.php';
			if (file_exists($googleFile)) {
				$googleFontsData = include $googleFile;
				foreach ($googleFontsData as $key => $value) {
					array_push($googleFonts, $key);
				}
			}
			$result = [
				'defaultFonts'  => $defaultFonts,
				'pixFonts'  => $pixFonts,
				'googleFonts'  => $googleFonts,
				'extras'  => get_option($obj->option)
			];
		}
		wp_send_json($result);
	}

	function saveData() {
		$pix_options = get_option("pix_options");
		$data = array(
			'result' => true
		);
		try {
			if (!empty($_REQUEST['data'])) {
				if(!is_array($pix_options)){
					$pix_options = [];
				}
				$data = $_REQUEST['data'];
				$data = stripslashes($data);
				$obj = json_decode(wp_specialchars_decode($data, TRUE));
				foreach ($obj as $key => $fields) {
					if (!empty($fields->value)) {
						if ($fields->type === 'media' || $fields->type === 'typography') {
							if (gettype($fields->value) === 'string') {
								$pix_options[$key] = json_decode($fields->value, true);
							}
							if (gettype($fields->value) === 'object') {
								$mediaValue = (array) $fields->value;
								$pix_options[$key] = $mediaValue;
								if ($key === 'favicon-img' && !empty($fields->value) && !empty($fields->value->id)) {
									update_option('site_icon', $fields->value->id);
								}
							}
						} elseif ($fields->type === 'gradient') {
							if (gettype($fields->value) === 'object') {
								$objValue = (array) $fields->value;
								$pix_options[$key] = $objValue;
							}
						} elseif ($fields->type === 'checkbox') {
							$pix_options[$key] = '1';
						} else {
							if(property_exists($fields, 'value')){
								$pix_options[$key] = $fields->value;
							}
						}
					} else {
						if(property_exists($fields, 'value')){
							if ($fields->type === 'checkbox' && $fields->value === false) {
								$pix_options[$key] = '0';
							} else {
								$pix_options[$key] = $fields->value;
							}
						}
					}
				}
				update_option('pix_options', $pix_options);
				$this->pixfort_save_compiler_action($pix_options);
			}
		} catch (\Throwable $th) {
			wp_die('Error: ' . $th->getMessage(), 'The title', [
				'response'  => 401
			]);
		}
		wp_die();
	}

	function exportOptions() {
		$result = [];
		$result = [
			'data'  => get_option('pix_options')
		];
		wp_send_json($result);
	}

	function importOptions() {
		$result = [];
		$success = false;
		if (!empty($_REQUEST['data'])) {
			$pix_options = get_option("pix_options");
			$data = $_REQUEST['data'];
			$data = stripslashes($data);
			$obj = json_decode(wp_specialchars_decode($data, true));
			if (!empty($obj->options)) {
				$options = json_decode(wp_specialchars_decode($obj->options, true));
				foreach ($options as $key => $value) {
					if (gettype($value) === 'object') {
						$formatValue = (array) $value;
						$pix_options[$key] = $formatValue;
					} else {
						$pix_options[$key] = $value;
					}
				}
				update_option('pix_options', $pix_options);
				$this->pixfort_save_compiler_action($pix_options);
				$success = true;
			}
		}
		if ($success) {
			require_once PIXFORT_PLUGIN_DIR . 'includes/options/options.php';
			$newOption = pixDisplayOptions(false);
			if( $newOption ) $newOption = $newOption->getOptions();
			$result = [
				'success'  => $success,
				'options'  => $newOption,
			];
			wp_send_json($result);
		} else {
			wp_die('Error: unable to proccess the request', 'Unable to proccess the request!', [
				'response'  => 401
			]);
		}
	}

	function pixfort_options_page() {
		require_once PIXFORT_PLUGIN_DIR . 'includes/options/options.php';
		pixDisplayOptions();
	}

	function pixfort_save_compiler_action($options) {
		update_option('pixfort_theme_options_notice', '');
		if (function_exists('pix_update_style_url')) {
			pix_update_style_url();
		}
		$this->pix_set_element_width($options);

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
		$primaryGoogleFont = false;
		$secondaryGoogleFont = false;
		$bodyWeightsList = [];
		$headingWeightsList = [];
		if (!empty($options['opt-primary-font'])) {
			$gFile = PIX_CORE_PLUGIN_DIR . '/includes/options/data/googlefonts.php';
			if (file_exists($gFile)) {
				$fonts = include $gFile;
				if (!empty($options['opt-primary-font']['font-family'])) {
					$primaryFontFamily = $options['opt-primary-font']['font-family'];
					if (array_key_exists($primaryFontFamily, $fonts)) {
						$options['opt-primary-font']['notGoogleFont'] = false;
						if ($options['opt-primary-font']['google'] && strcmp($options['opt-primary-font']['google'], 'false') != 0) {
							if(empty($options['opt-external-font-1-name'])) $options['opt-external-font-1-name'] = '';
							if(empty($options['opt-external-font-2-name'])) $options['opt-external-font-2-name'] = '';
							if (
								$options['opt-primary-font']['font-family'] != $options['opt-external-font-1-name']
								&& $options['opt-primary-font']['font-family'] != $options['opt-external-font-2-name']
							) {
								if (!in_array($options['opt-primary-font']['font-family'], $default_fonts)) {

									if (!empty($options['opt-regular-font-weight'])) {
										array_push($bodyWeightsList, $options['opt-regular-font-weight']);
									} else {
										array_push($bodyWeightsList, "400");
									}
									if (!empty($options['opt-bold-font-weight'])) {
										array_push($bodyWeightsList, $options['opt-bold-font-weight']);
									} else {
										array_push($bodyWeightsList, "700");
									}
									$primaryGoogleFont = $options['opt-primary-font']['font-family'];
									array_push($default_fonts, $primaryGoogleFont);
								}
							}
						}
					} else {
						$options['opt-primary-font']['notGoogleFont'] = true;
					}
					update_option('pix_options', $options);
				}
			}
		}
		/*
        * Heading font
        */
		if (!empty($options['opt-secondary-font'])) {
			$gFile = PIX_CORE_PLUGIN_DIR . '/includes/options/data/googlefonts.php';
			if (file_exists($gFile)) {
				$fonts = include $gFile;
				if (!empty($options['opt-secondary-font']['font-family'])) {
					$secondaryFontFamily = $options['opt-secondary-font']['font-family'];
					if (array_key_exists($secondaryFontFamily, $fonts)) {
						$options['opt-secondary-font']['notGoogleFont'] = false;

						if (!empty($options['opt-heading-font-weight'])) {
							array_push($headingWeightsList, $options['opt-heading-font-weight']);
						} else {
							if (!empty($options['opt-regular-font-weight'])) {
								array_push($headingWeightsList, $options['opt-regular-font-weight']);
							} else {
								array_push($headingWeightsList, "400");
							}
						}
						if (!empty($options['opt-heading-bold-font-weight'])) {
							array_push($headingWeightsList, $options['opt-heading-bold-font-weight']);
						} else {
							if (!empty($options['opt-bold-font-weight'])) {
								array_push($headingWeightsList, $options['opt-bold-font-weight']);
							} else {
								array_push($headingWeightsList, "700");
							}
						}

						if (
							$options['opt-secondary-font']['google']
							&& strcmp($options['opt-secondary-font']['google'], 'false') != 0
							&& $options['opt-secondary-font']['google'] != false
						) {
							if (
								$options['opt-secondary-font']['font-family'] != $options['opt-external-font-1-name']
								&& $options['opt-secondary-font']['font-family'] != $options['opt-external-font-2-name']
							) {
								if (!in_array($options['opt-secondary-font']['font-family'], $default_fonts)) {
									$secondaryGoogleFont = $options['opt-secondary-font']['font-family'];
								} else {
									$bodyWeightsList = array_unique(array_merge($bodyWeightsList, $headingWeightsList));
								}
							}
						}
					} else {
						$options['opt-secondary-font']['notGoogleFont'] = true;
					}
					update_option('pix_options', $options, true);
				}
			}
		}
		if (!empty($primaryGoogleFont) && $primaryGoogleFont) {
			$bodyWeights = implode(',', $bodyWeightsList);
			$googleFontURL_1 = esc_url_raw('https://fonts.googleapis.com/css?display=swap&family=' . $primaryGoogleFont . ':' . $bodyWeights);
			update_option('pix_google_font_1', $googleFontURL_1);
		} else {
			update_option('pix_google_font_1', '');
		}
		if (!empty($secondaryGoogleFont) && $secondaryGoogleFont) {
			$headingWeights = implode(',', $headingWeightsList);
			$googleFontURL_2 = esc_url_raw('https://fonts.googleapis.com/css?display=swap&family=' . $secondaryGoogleFont . ':' . $headingWeights);
			update_option('pix_google_font_2', $googleFontURL_2);
		} else {
			update_option('pix_google_font_2', '');
		}
	}

	function pix_set_element_width($options) {
		if (!empty($options['pix-custom-container-width'])) {
			$site_custom_width = get_option('pixfort_custom_width');
			$new_width = (int)$options['pix-custom-container-width'];
			if (!$site_custom_width) {
				update_option('pixfort_custom_width', $options['pix-custom-container-width']);
				if (class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->kits_manager) {
					$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend();
					$kit->update_settings([
						'container_width' => array(
							'size' => $new_width,
						),
					]);
					\Elementor\Plugin::$instance->files_manager->clear_cache();
				}
			} else {
				if ($site_custom_width != $options['pix-custom-container-width']) {
					update_option('pixfort_custom_width', $options['pix-custom-container-width']);
					if (class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->kits_manager) {
						$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend();
						$kit->update_settings([
							'container_width' => array(
								'size' => $new_width,
							),
						]);
						\Elementor\Plugin::$instance->files_manager->clear_cache();
					}
				}
			}
		} else {
			$site_custom_width = get_option('pixfort_custom_width');
			if ($site_custom_width && $site_custom_width != 1140) {
				if (class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->kits_manager) {
					$kit = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend();
					$kit->update_settings([
						'container_width' => array(
							'size' => 1140,
						),
					]);
					\Elementor\Plugin::$instance->files_manager->clear_cache();
				}
			}
		}
	}
}
