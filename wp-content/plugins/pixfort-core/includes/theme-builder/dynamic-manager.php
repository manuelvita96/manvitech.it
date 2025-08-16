<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Dynamic Manager.
 *
 * 
 *
 * @since 1.0.0
 */
class DynamicManager{

    public function __construct() {
		
        add_action( 'elementor/dynamic_tags/register', [$this, 'register_new_dynamic_tags'] );
        
	}

    function register_new_dynamic_tags( $dynamic_tags_manager ) {

        /*
        * Register pixfort dynamic groups
        */
        $dynamic_tags_manager->register_group( 'pixfort-actions', array( 'title' => esc_html__( 'pixfort Actions', 'pixfort-core' ) ) );
        $dynamic_tags_manager->register_group( 'pixfort-post', array( 'title' => esc_html__( 'Post', 'pixfort-core' ) ) );

        /*
        * Custom tags
        */
        // require_once PIXFORT_PLUGIN_DIR . 'includes/dynamic/tags/class-my-custom-dynamic-tag.php';
        // $dynamic_tags_manager->register( new Elementor_Test_Tag() );
        
        /*
        * Global tags
        */
        if ( ! defined( 'ELEMENTOR_PRO_VERSION' ) ) {
            require_once PIXFORT_PLUGIN_DIR . 'includes/theme-builder/tags/post-title.php';
            require_once PIXFORT_PLUGIN_DIR . 'includes/theme-builder/tags/post-url.php';
            require_once PIXFORT_PLUGIN_DIR . 'includes/theme-builder/tags/post-featured-image.php';
            $dynamic_tags_manager->register( new Post_Title() );
            $dynamic_tags_manager->register( new Post_URL() );
            $dynamic_tags_manager->register( new Post_Featured_Image() );
        }
    
    }

    function displayTemplate($templateId, $postId){ 
        // $post = get_post(35695);
        // setup_postdata($post);
        // echo \Elementor\plugin::instance()->frontend->get_builder_content(35695, true);
    }
}