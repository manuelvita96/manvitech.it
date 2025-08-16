<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * WooCommerce Manager.
 *
 * 
 *
 * @since 1.0.0
 */
class WooCommerceManager {

    public $sidebarState = false;

    public function __construct() {
        add_action( 'woocommerce_blocks_checkout_enqueue_data', [ $this, 'checkoutEnqueue' ] );
        add_action( 'woocommerce_blocks_cart_enqueue_data', [ $this, 'cartEnqueue' ] );
        add_action( 'wp_footer', [ $this, 'wooEnqueue' ] );
        
        // Add action to enqueue block-specific styles
        add_action( 'wp_footer', [ $this, 'blockSpecificAssets' ] );
        // Add hook to detect sidebar
        add_action( 'get_sidebar', [ $this, 'sidebarDetected' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'adminEnqueue' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_yith_styles' ] );
    }

    public function wooEnqueue() {
        wp_enqueue_style( 'pix-woo-blocks', PIX_CORE_PLUGIN_URI . 'includes/woocommerce/css/woo.min.css' , [], PIXFORT_PLUGIN_VERSION, 'all'  );
        wp_enqueue_style( 'pix-woo-2', PIX_CORE_PLUGIN_URI.'includes/assets/css/elements/woocommerce.min.css', false, PLUGIN_VERSION, 'all' );
    }
    
    public function enqueue_yith_styles() {
        if ( function_exists( 'yith_wcwl_is_wishlist_page' ) && ( yith_wcwl_is_wishlist_page() || is_product() ) ) {
            wp_enqueue_style( 'pix-yith-style', PIX_CORE_PLUGIN_URI.'includes/assets/css/elements/yith.min.css' , [], PIXFORT_PLUGIN_VERSION, 'all'  );
        }
    }

    public function enableSidebar(){
        $this->sidebarState = true;
    }

    public function checkoutEnqueue(){

    }
    
    public function cartEnqueue(){

    }

    /**
     * Enqueue admin-specific assets.
     */
    public function adminEnqueue() {
        wp_enqueue_style( 
            'pix-admin-woo-blocks', 
            PIX_CORE_PLUGIN_URI . 'includes/woocommerce/css/admin-woo-blocks.min.css', 
            [], 
            PIXFORT_PLUGIN_VERSION, 
            'all' 
        );
    }

    /**
     * Enqueue block-specific assets when blocks are being used
     */
    public function blockSpecificAssets() {
        // Don't load in admin
        if (is_admin()) {
            return;
        }

        $should_load_css = false;

        // Check if block exists anywhere (including widgets)
        if (has_block('woocommerce/product-categories')) {
            $should_load_css = true;
        } elseif ($this->sidebar_loaded) {
            $should_load_css = true;
        }
        
        // Load CSS if conditions are met
        if ($should_load_css) {
            wp_enqueue_style(
                'pixfort-woo-blocks',
                PIX_CORE_PLUGIN_URI . 'includes/woocommerce/css/woo-blocks.min.css',
                [],
                PIXFORT_PLUGIN_VERSION,
                'all'
            );
        }
    }

    // Flag to track if a sidebar was loaded
    private $sidebar_loaded = false;
    
    /**
     * Set flag when a sidebar is loaded
     */
    public function sidebarDetected() {
        $this->sidebar_loaded = true;
    }
}
