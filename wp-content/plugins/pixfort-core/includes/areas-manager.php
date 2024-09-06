<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Areas Manager.
 *
 * 
 *
 * @since 1.0.0
 */
class AreasManager {

	protected $conditions = [];

	private $cache;

	public function __construct() {
		$this->cache = new AreasCache();
		add_action('get_footer', [$this, 'print_popups']);
	}

	public function getLocationTemplates($location) {
		$validItems = [];
		$itemsList = $this->cache->getAreaByLocation($location);
		/* 
        *   1- verify each item conditions
        *   2- return only valid items
        */
		foreach ($itemsList as $id => $itemConditions) {
			$addItem = false;
			foreach ($itemConditions as $cid => $condition) {
				$isMatch = false;
				if (empty($condition['general'])) continue;
				switch ($condition['general']) {
					case 'all':
						/*
                        * All site pages
                        */
						$isMatch = true;
						break;
					case 'singular':
						/*
                        * Singular
                        */
						if (is_singular()) {
							if (!empty($condition['nestedValue']) && $condition['nestedValue'] !== 'all') {
								if ($condition['nestedValue'] === 'page' && is_page()) {
									/*
                                    * Page
                                    */
									if (!empty($condition['subIDValue'] && $condition['subIDValue'] !== 'all')) {
										if ($condition['subIDValue'] == get_the_ID()) {
											$isMatch = true;
										}
									} else {
										$isMatch = true;
									}
								} elseif ($condition['nestedValue'] === 'frontpage' && is_front_page()) {
									$isMatch = true;
								} elseif ($condition['nestedValue'] === 'post' && get_post_type() === 'post') {
									/*
                                    * Post
                                    */
									if (!empty($condition['subIDValue'] && $condition['subIDValue'] !== 'all')) {
										if ($condition['subIDValue'] == get_the_ID()) {
											$isMatch = true;
										}
									} else {
										$isMatch = true;
									}
								} elseif ($condition['nestedValue'] === 'portfolio' && get_post_type() === 'portfolio') {
									/*
                                    * Portfolio
                                    */
									if (!empty($condition['subIDValue'] && $condition['subIDValue'] !== 'all')) {
										if ($condition['subIDValue'] == get_the_ID()) {
											$isMatch = true;
										}
									} else {
										$isMatch = true;
									}
								} elseif ($condition['nestedValue'] === 'cat' ) {
									/*
                                    * In Category
                                    */
									if (!empty($condition['subIDValue'] && $condition['subIDValue'] !== 'all')) {
										if (has_category($condition['subIDValue'])) {
											$isMatch = true;
										} elseif (has_term($condition['subIDValue'], 'portfolio-types', get_the_ID())) {
											$isMatch = true;
										}
									} else {
										$isMatch = true;
									}
								} elseif ($condition['nestedValue'] === 'child_of') {
									/*
                                    * Child of
                                    */
									if (is_singular()) {
										$condID = (int) $condition['subIDValue'];
										$parent_id = wp_get_post_parent_id(get_the_ID());
										if ((0 === $condID && 0 < $parent_id) || ($parent_id === $condID && $condID !== 0)) {
											$isMatch = true;
										}
									}
								}
							} else {
								$isMatch = true;
							}
						}
						break;
					case 'archives':
						/*
                        * Archives
                        */
						if (is_archive() || is_search()) {
							if (!empty($condition['nestedValue']) && $condition['nestedValue'] !== 'all') {
								if ($condition['nestedValue'] === 'author' && is_author()) {
									/*
                                    * Author
                                    */
									if (!empty($condition['subIDValue'] && $condition['subIDValue'] !== 'all')) {
										if ($condition['subIDValue'] == get_the_ID()) {
											$isMatch = true;
										}
									} else {
										$isMatch = true;
									}
								} elseif ($condition['nestedValue'] === 'date' && is_date()) {
									/*
                                    * Date
                                    */
									$isMatch = true;
								} elseif ($condition['nestedValue'] === 'search' && is_search()) {
									/*
                                    * Search
                                    */
									$isMatch = true;
								}
							} else {
								$isMatch = true;
							}
						}
						break;
					case 'woocommerce':
						/*
                        * WooCommerce
                        */
						if (function_exists('is_woocommerce') && is_woocommerce()) {
							if (!empty($condition['nestedValue']) && $condition['nestedValue'] !== 'all') {
								if ($condition['nestedValue'] === 'product_archives' && (is_product_category() || is_product_tag() || is_shop())) {
									$isMatch = true;
								} elseif ($condition['nestedValue'] === 'shop' && is_shop()) {
									/*
                                    * Date
                                    */
									$isMatch = true;
								} elseif ($condition['nestedValue'] === 'search' && is_search()) {
									/*
                                    * Search
                                    */
									$isMatch = true;
								} elseif ($condition['nestedValue'] === 'product_cat' && is_product_category()) {
									/*
                                    * Product Category
                                    */
									if (!empty($condition['subIDValue'] && $condition['subIDValue'] !== 'all')) {
										if ($condition['subIDValue'] == get_the_ID()) {
											$isMatch = true;
										}
									} else {
										$isMatch = true;
									}
								} elseif ($condition['nestedValue'] === 'product_tag' && is_product_tag()) {
									/*
                                    * Product Tag
                                    */
									if (!empty($condition['subIDValue'] && $condition['subIDValue'] !== 'all')) {
										if ($condition['subIDValue'] == get_the_ID()) {
											$isMatch = true;
										}
									} else {
										$isMatch = true;
									}
								} elseif ($condition['nestedValue'] === 'product' && is_product()) {
									/*
                                    * Product
                                    */
									if (!empty($condition['subIDValue'] && $condition['subIDValue'] !== 'all')) {
										if ($condition['subIDValue'] == get_the_ID()) {
											$isMatch = true;
										}
									} else {
										$isMatch = true;
									}
								}
							} else {
								$isMatch = true;
							}
						}
						break;
				}
				if ($isMatch) {
					if ($condition['include']) {
						$addItem = true;
					} else {
						$addItem = false;
						break;
					}
				}
			}
			if ($addItem) {
				if (function_exists('icl_get_languages')) {
					$id = apply_filters('wpml_object_id', $id, 'post', true);
				}
				if (!in_array($id, $validItems)) {	
					array_push($validItems, $id);
				}
			}
		}
		return $validItems;
	}

	public function print_popups() {
		if (defined('DOING_AJAX') && DOING_AJAX) {
			return false;
		}
		$options = get_option('pix_options');
		if (!empty($options['pix-old-popups'])) {
			return false;
		}
		/*
        *   1- Get cache Popup location items after validation
        *   2- Print popup data into footer
        */
		if (get_post_type() && get_post_type() !== 'pixpopup') {
			$popups = $this->getLocationTemplates('popup');
			$core = PixfortCore::instance();
			$itemsOptions = [];
			if (pix_plugin_get_option('pix-exit-popup')) {
				if (!in_array(pix_plugin_get_option('pix-exit-popup'), $popups)) {
					array_push($popups, pix_plugin_get_option('pix-exit-popup'));
				}
			}
			if (pix_plugin_get_option('pix-automatic-popup')) {
				if (!in_array(pix_plugin_get_option('pix-automatic-popup'), $popups)) {
					array_push($popups, pix_plugin_get_option('pix-automatic-popup'));
				}
			}

			foreach ($popups as $popup) {
				$itemOptions = [];
				$popupData = get_post_meta($popup, 'pix-popup-data', true);
				if (is_array($popupData)) {
					if (array_key_exists('popupOptions', $popupData)) $itemOptions = array_merge($itemOptions, $popupData['popupOptions']);
					if (array_key_exists('launcherOptions', $popupData)) $itemOptions = array_merge($itemOptions, $popupData['launcherOptions']);
				}

				if (!empty($itemOptions)) {
					$core->popupType->print_popup($popup);
					$itemsOptions[$popup] = $itemOptions;
				}
			}
			wp_localize_script('pix-main-pixfort', 'PIX_POPUPS_OPTIONS', $itemsOptions);
		}
	}
}
