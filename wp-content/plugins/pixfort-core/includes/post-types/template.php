<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Template Type
 *
 * 
 *
 * @since 1.0
 */
class TemplateType {

    public function __construct() {
        $this->load();
    }

    public function load() {
        add_action('init', [$this, 'pixfort_post_type']);
        add_filter('views_edit-pixfort_template', [$this, 'pix_views_for_pixfort_templates']);
        add_action('after_switch_theme', [$this, 'pix_add_templates_support']);
        add_action( 'admin_menu', [$this, 'pixfort_add_templates_submenu'] );
        add_action('admin_menu', [$this, 'pix_template_meta_add']);
        add_action('save_post_pixfort_template', [$this, 'pix_template_save_data']);

        add_action('admin_menu', [$this, 'keep_custom_post_menu_open']);
        add_action('admin_head', [$this, 'keep_custom_post_menu_open']);

        // add_action( 'admin_head', [$this, 'pixfort_add_type_tabs'] );
        // $this->pixfort_create_template_of_type( 'Home', 'Home content', 'page' );
    }

    public function pixfort_post_type() {
        $labels = array(
            'name'               => __('pixfort Templates', 'pixfort-core'),
            'singular_name'      => __('pixfort Template', 'pixfort-core'),
            'add_new'            => __('Add New Template', 'pixfort-core'),
            'add_new_item'       => __('Add New pixfort Template', 'pixfort-core'),
            'edit_item'          => __('Edit pixfort Template', 'pixfort-core'),
            'new_item'           => __('New pixfort Template', 'pixfort-core'),
            'all_items'          => __('All pixfort Templates', 'pixfort-core'),
            'view_item'          => __('View pixfort Template', 'pixfort-core'),
            'search_items'       => __('Search pixfort Templates', 'pixfort-core'),
            'not_found'          => __('No templates found', 'pixfort-core'),
            'not_found_in_trash' => __('No templates found in Trash', 'pixfort-core'),
            'menu_name'          => __('pixfort Templates', 'pixfort-core'),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,  // not publicly queryable
            'show_ui'            => true,   // show in WP admin
            'menu_position'      => 20,
            // 'menu_icon'          => 'dashicons-layout',
            'capability_type'    => 'post',
            'hierarchical'       => true,
            'exclude_from_search'     => true,
            'query_var'             => true,
            // 'show_in_menu' => 'pixfort-theme-dashboard',
            'show_in_menu' => false,
            'publicly_queryable'     => true,
            'supports'           => array('title', 'editor'), // adjust as needed
        );

        register_post_type('pixfort_template', $args);

        $labels = array(
            'name'          => __('Template Types', 'pixfort-core'),
            'singular_name' => __('Template Type', 'pixfort-core'),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => false,
            'hierarchical'      => false,
            'show_ui'           => true, // needed for admin filters
            'show_admin_column' => true, // don’t display a taxonomy column
            'meta_box_cb'       => false, // remove metabox in the post editor
        );

        register_taxonomy('pixfort_template_type', 'pixfort_template', $args);
    }

    function pixfort_add_templates_submenu() {
        add_submenu_page(
            'pixfort-theme-dashboard',                      // parent slug
            'Theme Builder',                    // page title
            'Theme Builder',                    // submenu label
            'manage_options',                       // required capability
            'edit.php?post_type=pixfort_template',  // menu slug (points to CPT listing)
            '',                                     // callback (not needed for CPT listing)
            1000                                       // position under parent
        );
    }

    function keep_custom_post_menu_open() {
        global $parent_file, $submenu_file, $pagenow;
    
        // Replace 'your_custom_post_type' with the actual custom post type slug
        $custom_post_type = 'pixfort_template';
        // Replace 'your_parent_menu_slug' with the slug of the parent menu
        $parent_menu_slug = 'pixfort-theme-dashboard';
        // Replace 'your_submenu_slug' with the slug of the submenu (optional)
        $submenu_slug = 'edit.php?post_type=' . $custom_post_type;
    
        // Check if we're on the edit or add new screen of the custom post type
        if (isset($_GET['post_type']) && $_GET['post_type'] === $custom_post_type) {
            $parent_file = $parent_menu_slug;
            $submenu_file = $submenu_slug;
        }
    
        // Check if we're on the post edit screen of this custom post type
        if ($pagenow === 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) === $custom_post_type) {
            $parent_file = $parent_menu_slug;
            $submenu_file = $submenu_slug;
        }
    }

    function pix_views_for_pixfort_templates($views) {
?>
        <div>
            Tabs here
        </div>
<?php
        return $views;
    }


    function pixfort_create_template_of_type($title, $content, $type_slug) {
        // 1. Insert post
        $post_id = wp_insert_post(array(
            'post_type'   => 'pixfort_template',
            'post_title'  => $title,
            'post_content' => $content,
            'post_status' => 'publish',
        ));

        // 2. Assign the taxonomy term
        if ($post_id && ! is_wp_error($post_id)) {
            // Make sure the $type_slug is one of the three valid types
            $valid_types = array('post', 'page', 'product');
            if (in_array($type_slug, $valid_types, true)) {
                // This replaces any previous term with the new one
                wp_set_object_terms($post_id, $type_slug, 'pixfort_template_type', false);
            }
        }

        return $post_id;
    }

    function pix_add_templates_support() {
        if (class_exists('\Elementor\Plugin')) {
            $cpt_support = get_option('elementor_cpt_support');
            if (!$cpt_support) {
                $cpt_support = ['page', 'post', 'pixfooter', 'pixpopup', 'portfolio', 'pixfort_template'];
                update_option('elementor_cpt_support', $cpt_support);
            } else {
                if (!in_array('pixfort_template', $cpt_support)) {
                    $cpt_support[] = 'pixfort_template';
                    update_option('elementor_cpt_support', $cpt_support);
                }
            }
        }
    }


    /*-----------------------------------------------------------------------------------*/
    /*	Save data when page is edited
    /*-----------------------------------------------------------------------------------*/
    public function pix_template_save_data($post_id) {
        $pix_template_meta_box = [
         [
                'id'         => 'template-condition',
        ]
        ];
        // verify nonce
        if (key_exists('pix_page_meta_nonce', $_POST)) {
            if (!wp_verify_nonce($_POST['pix_page_meta_nonce'], basename(__FILE__))) {
                return $post_id;
            }
        }
        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        // check permissions
        if ((key_exists('post_type', $_POST)) && ('page' == $_POST['post_type'])) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        if (!empty($pix_template_meta_box)) {
            foreach ((array)$pix_template_meta_box as $field) {
                $old = get_post_meta($post_id, $field['id'], true);
                if (key_exists($field['id'], $_POST)) {
                    $new = $_POST[$field['id']];
                } else {
                    // $new = ""; // problem with "quick edit"
                    if (!empty($field['type']) && $field['type'] == 'switch') {
                        $new = '0';
                    } else {
                        continue;
                    }
                }

                if (isset($new) && $new != $old) {
                    update_post_meta($post_id, $field['id'], $new);
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, $field['id'], $old);
                }
            }
            PixfortCore::instance()->areasCache->regenerate();
        }
    }

    public function pix_template_meta_add() {

        // Custom menu ------------------------------
        $aMenus = array(0 => '-- Default --');
        $oMenus = get_terms('nav_menu', array('hide_empty' => false));

        if (is_array($oMenus)) {
            foreach ($oMenus as $menu) {
                $aMenus[$menu->term_id] = $menu->name;
            }
        }
        $pix_meta_box = array(
            'id'         => 'pix-meta-page',
            'title'     => __('pixfort Options', 'pixfort-core'),
            'page'         => 'pixfort_template',
            'post_types'    => array('pixfort_template'),
            'context'     => 'normal',
            'priority'     => 'high',
            'fields'    => [    
                array(
                    'id'         => 'template-condition',
                )
            ],
        );

        add_meta_box($pix_meta_box['id'], $pix_meta_box['title'], [$this, 'pix_template_show_box'], $pix_meta_box['page'], $pix_meta_box['context'], $pix_meta_box['priority']);
    }

    public function pix_template_show_box() {
        global $post;


        // Use nonce for verification
        echo '<div id="pix-wrapper"  class="pix-header-options-area">';
        echo '<input type="hidden" name="pix_page_meta_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
        echo '<table class="form-table">';
        echo '<tbody>';

        $pixfortBuilder = new PixfortOptions();
        $pixfortBuilder->initOptions(
            'meta',
            $post,
            false,
            [
                'tabs'  => [
                    'general'    => ['title'    => __('General', 'pixfort-core'), 'icon' => 'general'],
                    'triggers'    => ['title'    => __('Triggers', 'pixfort-core'), 'icon' => 'triggers'],
                    'design'    => ['title'    => 'Design', 'icon' => 'design'],
                    'launcher'    => ['title'    => 'Launcher', 'icon' => 'launcher'],
                    'advanced'    => ['title'    => 'Advanced', 'icon' => 'advanced'],
                ],
                'helpLink' => \PixfortCore::instance()->adminCore->getParam('docs_create_popup'),
            ]
        );


        $pixfortBuilder->addOption(
            'template-condition',
            [
                'type' => 'conditions',
                'label' => 'Display Conditions',
                'default' => '',
                'tab'             => 'general',
                'tooltipText'   => '<strong>Note:</strong> After setting the display conditions, in order to show the template in the selected pages don\'t forget to choose the popup triggers from the <strong>"Triggers"</strong> tab.',
                // 'tooltipImage'   => PIX_CORE_PLUGIN_URI . '/includes/assets/popups/tooltips/popup-tooltip-example.svg',
                'description' => __('Add conditions to define where the template will be displayed on your website.', 'pixfort-core'),
            ]
        );


        
        $pixfortBuilder->loadOptionsData();
        echo '<div id="fu3obnz"></div>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
}
