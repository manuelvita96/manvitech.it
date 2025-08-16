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

    public $headerManager;

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

    public $themeBuilder;

    public $popupType;

    public $footerType;

    public $optionsBack;

    public $coreFunctions;

    public $styleFunctions = false;

    public $dynamicColors = false;

    public $adminCore;

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
        require_once PIXFORT_PLUGIN_DIR . 'includes/core-functions.php';
        $this->coreFunctions = new coreFunctions();

        require_once PIXFORT_PLUGIN_DIR . 'includes/wp-functions.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/header/header-manager.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/elements-manager.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/icons/icons.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/post-types/popup.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/post-types/footer.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/areas-cache.php';
        require_once PIXFORT_PLUGIN_DIR . 'includes/areas-manager.php';
        // require_once PIXFORT_PLUGIN_DIR . 'includes/theme-builder/main.php';
        
        add_action('after_setup_theme',  [$this, 'afterPluginInit'], 13);
        add_action('wp_enqueue_scripts',  [$this, 'enqueueScripts'], 13);
        add_action('wp_head',  [$this, 'headerExtras'], 10);
        add_action('wp_footer',  [$this, 'footerExtras'], 10);
        add_action('init', [$this, 'initAdmin'], 0);
        require_once PIXFORT_PLUGIN_DIR . 'includes/blocks/blocks-index.php';
    }

    public function init() {
        $this->headerManager = new HeaderManager();
        $this->elementsManager = new ElementsManager();
        $this->icons = new PixfortIcons();
        $this->popupType = new PopupType();
        $this->footerType = new FooterType();
        $this->areasCache = new areasCache();
        $this->areasManager = new AreasManager();
        // if(defined('IS_PIXFORT_THEME')){
        // $this->themeBuilder = new ThemeBuilder();
        // }
    }

    public function afterPluginInit() {
        if($this->getThemeParam('dynamic_colors')) {
            $this->dynamicColors = true;
        }
        require_once PIXFORT_PLUGIN_DIR . 'includes/style-functions.php';
        $this->styleFunctions = new styleFunctions();
        if (class_exists('WooCommerce')) {
            require_once PIXFORT_PLUGIN_DIR . 'includes/woocommerce-manager.php';
            $this->wooManager = new WooCommerceManager();
        }
        // EditURI link
        remove_action('wp_head', 'rsd_link');
        // windows live writer
        remove_action('wp_head', 'wlwmanifest_link');
        // links for adjacent posts
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        // WP version
        remove_action('wp_head', 'wp_generator');
    }

    public function enqueueScripts() {
        wp_register_script('pix-flickity-js', PIX_CORE_PLUGIN_URI . 'functions/elementor/includes/js/flickity.pkgd.min.js', false, PIXFORT_PLUGIN_VERSION, true);
        wp_enqueue_style(
            'pixfort-main-styles',
            PIX_CORE_PLUGIN_URI . 'includes/assets/css/common/main.min.css',
            false,
            PIXFORT_PLUGIN_VERSION,
            'all'
        );
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

    public function headerExtras() {
        if (pix_plugin_get_option('website-preview')) {
            if (pix_plugin_get_option('website-preview')['url']) {
?>
                <meta property="og:image" content="<?php echo esc_url(pix_plugin_get_option('website-preview')['url']); ?>" />
                <meta name="twitter:image" content="<?php echo esc_url(pix_plugin_get_option('website-preview')['url']); ?>" />
<?php
            }
        }
        if (pix_plugin_get_option('pix-custom-header-includes')) {
            echo pix_plugin_get_option('pix-custom-header-includes');
        }
        // if (get_option('pix_google_font_1') || get_option('pix_google_font_2')) {
        //     echo '<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>';
        //     echo '<link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>';
        // }
    }
    
    public function footerExtras() {
        if (defined('DOING_AJAX') && DOING_AJAX) {
            return false;
        }
        require_once PIXFORT_PLUGIN_DIR . 'includes/elements/extras/back-to-top.php';
        if (!empty(pix_plugin_get_option('pix-custom-js-footer'))) {
            wp_register_script('pixfort-options-script-footer', false, false, PIXFORT_THEME_VERSION);
            wp_enqueue_script('pixfort-options-script-footer');
            wp_add_inline_script('pixfort-options-script-footer', pix_plugin_get_option('pix-custom-js-footer'));
        }
        if(function_exists('pixfort_footer_extras')) {
            pixfort_footer_extras();
        }
    }

    public function initAdmin() {
        if (function_exists('is_user_logged_in') && is_user_logged_in()) {
            require_once PIXFORT_PLUGIN_DIR . 'includes/admin-core.php';
            $this->adminCore = new PixfortAdminCore();
        }
    }

    public function getThemeParam($param) {
        if (function_exists('pix_theme_params')) {
            $params = pix_theme_params();
            if(isset($params[$param])){
                return $params[$param];
            }
        }
        return false;
    }
}

PixfortCore::instance();
