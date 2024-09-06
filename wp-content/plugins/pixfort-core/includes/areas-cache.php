<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Areas Cache Manager.
 *
 * 
 *
 * @since 1.0
 */
class AreasCache {

	const OPTION_NAME = 'pixfort_conditions';

	protected $conditions = [];

	public function __construct() {
		$this->load();
	}

	public function load() {
		$this->conditions = get_option(self::OPTION_NAME, []);
		return $this;
	}

	public function remove($post_id) {
		$post_id = absint($post_id);

		foreach ($this->conditions as $location => $templates) {
			foreach ($templates as $id => $template) {
				if ($post_id === $id) {
					unset($this->conditions[$location][$id]);
				}
			}
		}

		return $this;
	}

	public function clear() {
		$this->conditions = [];

		return $this;
	}

	public function getAreaByLocation($location) {
		if (isset($this->conditions[$location])) {
			return $this->conditions[$location];
		}

		return [];
	}

	public function regenerate() {
		$this->clear();
		$popup_posts = get_posts([
			'post_type' => 'pixpopup',
			'post_status' => 'publish',
			'fields' => 'ids',
			'meta_key' => 'popup-condition',
			'numberposts' => -1
		]);

		foreach ($popup_posts as $post_id) {
			// if (function_exists('icl_get_languages')) {
			//     $post_id = get_post(apply_filters('wpml_object_id', $post_id, 'page', true));
			// } 
			$conditions = get_post_meta($post_id, 'popup-condition', true);
			$conditions = json_decode($conditions);
			if ($conditions) {
				foreach ($conditions as $key => $condition) {
					$this->conditions['popup'][$post_id][$key] = [
						'include'   => $condition->include === 'include' ? true : false,
						'general'   => $condition->general
					];
					if (!empty($condition->nestedValue)) {
						$this->conditions['popup'][$post_id][$key]['nestedValue'] = $condition->nestedValue;
					}
					if (!empty($condition->subIDValue)) {
						$this->conditions['popup'][$post_id][$key]['subIDValue'] = $condition->subIDValue;
					}
				}
			}
		}
		update_option(self::OPTION_NAME, $this->conditions);
		return $this;
	}
}
