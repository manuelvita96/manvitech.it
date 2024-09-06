<?php

if (!defined('ABSPATH')) {
    exit;
}

class PixfortCore {

    /**
     * Instance.
     *
     * Holds the plugin instance.
     *
     * @since 1.0.0
     * @access public
     * @static
     *
     */
    public static $instance = null;

    public static $isEnabled = true;

    public static $popups = array();

    public $elementsManager;

    public $icons;

    /**
     * Areas Manager.
     *
     * The main dynamic areas manager in the plugin
     *
     * @since 1.0.0
     * @access public
     *
     * @var areasManager
     */
    public $areasManager;

    public $areasCache;

    public $wooManager;

    public $coreOptions = null;

    public $popupType;

    public $optionsBack;

    function __construct() {
        $this->loader();
    }

    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
            self::$instance->init();
        }
        return self::$instance;
    }

    private function loader() {
        require_once PIXFORT_PLUGIN_DIR . 'includes/wp-functions.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/elements-manager.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/icons/icons.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/post-types/popup.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/areas-cache.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/areas-manager.php';
        add_action('after_setup_theme', [$this, 'afterPluginInit']);
        add_action('admin_init',  [$this, 'adminFunctionInit']);
        add_action('wp_enqueue_scripts',  [$this, 'enqueueScripts'], 13);
        add_action('wp_footer',  [$this, 'footerExtras'], 10);
        if (is_admin()) {
            require_once PIXFORT_PLUGIN_DIR . 'includes/options/core-options.php';
            $this->coreOptions = new CoreOptions();
            require_once PIXFORT_PLUGIN_DIR . 'includes/import/one-click-demo-import.php';
            require_once PIXFORT_PLUGIN_DIR . 'includes/options/menus.php';
            new PixfortMenusOptions();
        }
    }

    public function init() {
        $this->elementsManager = new ElementsManager();
        $this->icons = new PixfortIcons();
        $this->popupType = new PopupType();
        $this->areasCache = new areasCache();
        $this->areasManager = new AreasManager();
    }
    public function afterPluginInit() {
        if (class_exists('WooCommerce')) {
            require_once PIXFORT_PLUGIN_DIR . 'includes/woocommerce-manager.php';
            $this->wooManager = new WooCommerceManager();
        }
    }
    public function enqueueScripts() {
        wp_register_script('pix-flickity-js', PIX_CORE_PLUGIN_URI . 'functions/elementor/includes/js/flickity.pkgd.min.js', false, PIXFORT_PLUGIN_VERSION, true);
        if (is_rtl()) {
            // Enqueue the RTL CSS file
            wp_enqueue_style(
                'pixfort-rtl-styles',
                PIX_CORE_PLUGIN_URI . 'includes/assets/css/rtl.min.css',
                false,
                PIXFORT_PLUGIN_VERSION,
                'all'
            );
        }
    }

    public function footerExtras() {
        if (defined('DOING_AJAX') && DOING_AJAX) {
            return false;
        }
        require_once PIXFORT_PLUGIN_DIR . 'includes/elements/extras/back-to-top.php';
    }

    public function adminFunctionInit() {
        if (is_user_logged_in()) {
            require_once PIXFORT_PLUGIN_DIR . 'includes/options-back.php';
            $this->optionsBack = new OptionsBack();
            if (defined('PIXFORT_THEME_VERSION')) {
                require_once PIXFORT_PLUGIN_DIR . 'includes/updates/theme-updater.php';
                new PixfortThemeUpdater(
                    PIXFORT_THEME_SLUG,
                    PIXFORT_THEME_SLUG,
                    PIXFORT_THEME_VERSION,
                    'https://hub.pixfort.com'
                );
            }
        }
    }

    public static function addPopup($p) {
        array_push(self::$popups, $p);
    }

    public static function getPopups() {
        return self::$popups;
    }
}

PixfortCore::instance();
