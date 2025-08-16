<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Theme builder
 *
 * 
 *
 * @since 1.0.0
 */
class ThemeBuilder {

    public $dynamicManager;

    public $templateType;

    public function __construct() {
        require_once PIXFORT_PLUGIN_DIR . 'includes/theme-builder/dynamic-manager.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/post-types/template.php';
        add_action('init',  [$this, 'init']);
	}
    public function init() {
        $this->dynamicManager = new DynamicManager();
        $this->templateType = new TemplateType();
    }
}