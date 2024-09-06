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
        add_action( 'yith_wcwl_before_wishlist_form', [ $this, 'yithEnqueue' ] );
    }

    public function wooEnqueue() {
        wp_enqueue_style( 'pix-woo-blocks', PIX_CORE_PLUGIN_URI . 'includes/woocommerce/css/woo.min.css' , [], PIXFORT_PLUGIN_VERSION, 'all'  );
        wp_enqueue_style( 'pix-woo-2', PIX_CORE_PLUGIN_URI.'functions/css/elements/css/woocommerce.min.css', false, PLUGIN_VERSION, 'all' );
    }
    
    public function yithEnqueue() {
        wp_enqueue_style( 'pix-yith-style', PIX_CORE_PLUGIN_URI.'functions/css/elements/css/yith.min.css' , [], PIXFORT_PLUGIN_VERSION, 'all'  );
    }

    public function enableSidebar(){
        $this->sidebarState = true;
    }

    public function checkoutEnqueue(){

    }
    
    public function cartEnqueue(){

    }
}
