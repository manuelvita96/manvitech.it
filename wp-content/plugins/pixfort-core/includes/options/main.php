<?php

class PixfortOptions {

    public $options = array();
    public $type = 'meta';
    public $post = false;
    public $hasTabs = false;
    public $display = true;
    public $config = array();

    function __construct() {
    }

    function initOptions($type = 'meta', $post = false, $hasTabs = false, $config = array()) {
        $this->type = $type;
        $this->post = $post;
        $this->hasTabs = $hasTabs;
        $this->config = $config;
        $link = admin_url('admin-ajax.php');
        if (class_exists('PixfortHub')) {
            $pixfortHub = new PixfortHub();
            $pixfortHub->checkLicenseUpdate();
        }
        if($this->display){
            $icons = [];
            if (function_exists('vc_iconpicker_type_pixicons')) {
                $icons = vc_iconpicker_type_pixicons(array());
            }
            $distDir = 'dist';
            if (defined('PIXFORT_DEV')) {
                $distDir = 'temp';
            }
            wp_enqueue_script('pix-options-vendors', PIX_CORE_PLUGIN_URI . $distDir . '/options/vendors.bundle-5.js', false, PIXFORT_PLUGIN_VERSION, true);
            wp_enqueue_script('pix-options-runtime', PIX_CORE_PLUGIN_URI . $distDir . '/options/runtime.bundle-5.js', false, PIXFORT_PLUGIN_VERSION, true);
            wp_enqueue_script('pix-options-builder', PIX_CORE_PLUGIN_URI . $distDir . '/options/index.bundle-5.js', false, PIXFORT_PLUGIN_VERSION, true);
            wp_localize_script('pix-options-builder', 'pixfort_options_obj', array(
                'ADMIN_LINK' => $link,
                'PIX_ICONS' => $icons
            ));
            wp_enqueue_style('pix-options-vendors', PIX_CORE_PLUGIN_URI . $distDir . '/options/vendors.css', false, PIXFORT_PLUGIN_VERSION, 'all');
            wp_enqueue_style('pix-options-builder', PIX_CORE_PLUGIN_URI . $distDir . '/options/index.css', false, PIXFORT_PLUGIN_VERSION, 'all');
            $this->loadVariablesData();
        }
        
    }


    function setDisplay($display) {
        $this->display = $display;
    }

    function addOption($id, $data) {
        if ($data['type'] == 'select') {
            $options = $data['options'];
            $newOptions = array();
            foreach ($options as $key => $value) {
                array_push($newOptions, array(
                    'name'  => $value,
                    'value'  => $key,
                ));
            }
            $data['options'] = $newOptions;
        } elseif ($data['type'] == 'tinymce') {
            wp_enqueue_editor();
        }
        if ($this->type === 'meta' && $this->post) {
            if (!array_key_exists('value', $data)) {
                $meta = get_post_meta($this->post->ID, $id, true);
                $data['value'] = $meta;
            }
            if ($data['type'] == 'image') {
                if (!empty($data['local']) && $data['local'] === true) {
                    if (!empty($data['value'])) {
                        $preview = wp_get_attachment_image_src($data['value'], "full");
                        if (!empty($preview[0])) {
                            $data['preview'] = $preview[0];
                        }
                    }
                }
            }
        }
        $this->options[$id] = $data;
    }

    function getOptions() {
        return $this->options;
    }

    function fillData() {
        $pix_options = get_option("pix_options");
        if (is_array($this->options)) {
            foreach ($this->options as $key => $value) {
                if(is_array($pix_options)){
                    if (!empty($pix_options[$key])) {
                        $this->options[$key]['value'] = $pix_options[$key];
                    } else {
                        if ($this->options[$key]['type'] !== 'checkbox') {
                            if (array_key_exists('default', $this->options[$key])) {
                                if (array_key_exists($key, $pix_options)) {
                                    if ($pix_options[$key] !== '') {
                                        $this->options[$key]['value'] = $this->options[$key]['default'];
                                    } 
                                } else {
                                    $this->options[$key]['value'] = $this->options[$key]['default'];
                                }
                            } 
                        } else {
                            if (array_key_exists($key, $pix_options) && ($pix_options[$key] === '' || $pix_options[$key] === '0')) {
                                $this->options[$key]['value'] = '0';
                            }
                        }
                    }
                } else {
                    if (array_key_exists('default', $this->options[$key])) {
                        $this->options[$key]['value'] = $this->options[$key]['default'];
                    }
                }
                
            }
        }
        // $wpFavicon = get_option("site_icon");
        // if(!empty($wpFavicon)){
        //     if(!empty($pix_options['favicon-img'])&&!empty($pix_options['favicon-img']['id'])){
        //         $wpFavicon = (int) $wpFavicon;
        //         if($pix_options['favicon-img']['id'] !== $wpFavicon){
        //             $imgURL = wp_get_attachment_image_src($wpFavicon, [500, 500]);
        //             if(!empty($imgURL[0])) {
        //                 $newImage = [
        //                     'id'   => $wpFavicon,
        //                     'url'   => $imgURL[0],
        //                     'width'   => 500,
        //                     'height'   => 500,
        //                     'thumbnail' => $imgURL[0],
        //                 ];
        //                 $this->options['favicon-img']['value'] = $newImage;
        //             }
        //         }
        //     }
        // }
    }

    function saveData() {
        $pix_options = get_option("pix_options");
        $data = array(
            'result' => true
        );
        if (!empty($_REQUEST['data'])) {
            $data = $_REQUEST['data'];
            $data = stripslashes($data);
            $obj = json_decode(wp_specialchars_decode($data));

            foreach ($obj->options as $key => $value) {
                // var_dump($key);
                if (!empty($value->value)) {
                    if (!empty($pix_options[$key])) {
                        // var_dump($value->value);
                        // var_dump($pix_options[$key]);
                        $pix_options[$key] = $value->value;
                    }
                }
            }
            update_option('pix_options', $pix_options);
        }

        // echo json_encode($data);
        wp_die();
    }


    function loadOptionsData() {
        $isPixfortIcons = true;
        if (!\PixfortCore::instance()->icons::$isEnabled) {
            $isPixfortIcons = false;
        }
        $key = get_option('envato_purchase_code_27889640');
        $slug = 'essentials';
        if (defined('PIXFORT_THEME_SLUG') && PIXFORT_THEME_SLUG) {
            switch (PIXFORT_THEME_SLUG) {
                case 'essentials':
                    $key = get_option('envato_purchase_code_27889640');
                    break;
                case 'pixfort':
                    $key = get_option('pixfort_purchase_code_1');
                    $slug = 'pixfort';
                    break;
                default:
                    break;
            }	
        }
        $data = array();
        $data['options'] = $this->options;
        $data['key'] = get_option('pixfort_key');
        $data['createdAt'] = get_option('pixfort_key_created_at');
        $data['licenseKey'] = get_option('pixfort_license_key');
        $data['licenseURL'] = get_option('pixfort_key_url');
        $data['pk'] = $key;
        $data['slug'] = $slug;
        $data['url'] = site_url();
        $data['type'] = $this->type;
        $data['hasTabs'] = $this->hasTabs;
        $data['config'] = $this->config;
        $data['ajaxurl'] = admin_url('admin-ajax.php');
        $data['isPixfortIcons'] = $isPixfortIcons;
        wp_localize_script('pix-options-builder', 'pixfort_options_data', $data);
    }

    function loadVariablesData() {
        $text_colors = array(
            array("name" => "Body default", "value" => "body-default"),
            array("name" => "Heading default", "value" => "heading-default"),
            array("name" => "Transparent", "value" => "transparent"),
            array("name" => "Primary", "value" => "primary"),
            array("name" => "Primary Gradient", "value" => "gradient-primary"),
            array("name" => "Primary Light", "value" => "gradient-primary-light"),
            array("name" => "Secondary", "value" => "secondary"),
            array("name" => "White", "value" => "white"),
            array("name" => "Black", "value" => "black"),
            array("name" => "Green", "value" => "green"),
            array("name" => "Blue", "value" => "blue"),
            array("name" => "Red", "value" => "red"),
            array("name" => "Yellow", "value" => "yellow"),
            array("name" => "Brown", "value" => "brown"),
            array("name" => "Purple", "value" => "purple"),
            array("name" => "Orange", "value" => "orange"),
            array("name" => "Cyan", "value" => "cyan"),
            array("name" => "Gray 1", "value" => "gray-1"),
            array("name" => "Gray 2", "value" => "gray-2"),
            array("name" => "Gray 3", "value" => "gray-3"),
            array("name" => "Gray 4", "value" => "gray-4"),
            array("name" => "Gray 5", "value" => "gray-5"),
            array("name" => "Gray 6", "value" => "gray-6"),
            array("name" => "Gray 7", "value" => "gray-7"),
            array("name" => "Gray 8", "value" => "gray-8"),
            array("name" => "Gray 9", "value" => "gray-9"),
            array("name" => "Dark opacity 1", "value" => "dark-opacity-1"),
            array("name" => "Dark opacity 2", "value" => "dark-opacity-2"),
            array("name" => "Dark opacity 3", "value" => "dark-opacity-3"),
            array("name" => "Dark opacity 4", "value" => "dark-opacity-4"),
            array("name" => "Dark opacity 5", "value" => "dark-opacity-5"),
            array("name" => "Dark opacity 6", "value" => "dark-opacity-6"),
            array("name" => "Dark opacity 7", "value" => "dark-opacity-7"),
            array("name" => "Dark opacity 8", "value" => "dark-opacity-8"),
            array("name" => "Dark opacity 9", "value" => "dark-opacity-9"),
            array("name" => "Light opacity 1", "value" => "light-opacity-1"),
            array("name" => "Light opacity 2", "value" => "light-opacity-2"),
            array("name" => "Light opacity 3", "value" => "light-opacity-3"),
            array("name" => "Light opacity 4", "value" => "light-opacity-4"),
            array("name" => "Light opacity 5", "value" => "light-opacity-5"),
            array("name" => "Light opacity 6", "value" => "light-opacity-6"),
            array("name" => "Light opacity 7", "value" => "light-opacity-7"),
            array("name" => "Light opacity 8", "value" => "light-opacity-8"),
            array("name" => "Light opacity 9", "value" => "light-opacity-9")
        );
        $bg_colors = array(
            array("name" => "Body default", "value" => "body-default"),
            array("name" => "Heading default", "value" => "heading-default"),
            array("name" => "Transparent", "value" => "transparent"),
            array("name" => "Primary", "value" => "primary"),
            array("name" => "Primary Light", "value" => "primary-light"),
            array("name" => "Primary Gradient", "value" => "gradient-primary"),
            array("name" => "Primary Gradient Light", "value" => "gradient-primary-light"),
            array("name" => "Secondary", "value" => "secondary"),
            array("name" => "Secondary Light", "value" => "secondary-light"),
            array("name" => "White", "value" => "white"),
            array("name" => "Black", "value" => "black"),
            array("name" => "Green", "value" => "green"),
            array("name" => "Green Light", "value" => "green-light"),
            array("name" => "Blue", "value" => "blue"),
            array("name" => "Blue Light", "value" => "blue-light"),
            array("name" => "Red", "value" => "red"),
            array("name" => "Red Light", "value" => "red-light"),
            array("name" => "Yellow", "value" => "yellow"),
            array("name" => "Yellow Light", "value" => "yellow-light"),
            array("name" => "Brown", "value" => "brown"),
            array("name" => "Brown Light", "value" => "brown-light"),
            array("name" => "Purple", "value" => "purple"),
            array("name" => "Purple Light", "value" => "purple-light"),
            array("name" => "Orange", "value" => "orange"),
            array("name" => "Orange Light", "value" => "orange-light"),
            array("name" => "Cyan", "value" => "cyan"),
            array("name" => "Cyan Light", "value" => "cyan-light"),
            array("name" => "Gray 1", "value" => "gray-1"),
            array("name" => "Gray 2", "value" => "gray-2"),
            array("name" => "Gray 3", "value" => "gray-3"),
            array("name" => "Gray 4", "value" => "gray-4"),
            array("name" => "Gray 5", "value" => "gray-5"),
            array("name" => "Gray 6", "value" => "gray-6"),
            array("name" => "Gray 7", "value" => "gray-7"),
            array("name" => "Gray 8", "value" => "gray-8"),
            array("name" => "Gray 9", "value" => "gray-9"),
            array("name" => "Dark opacity 1", "value" => "dark-opacity-1"),
            array("name" => "Dark opacity 2", "value" => "dark-opacity-2"),
            array("name" => "Dark opacity 3", "value" => "dark-opacity-3"),
            array("name" => "Dark opacity 4", "value" => "dark-opacity-4"),
            array("name" => "Dark opacity 5", "value" => "dark-opacity-5"),
            array("name" => "Dark opacity 6", "value" => "dark-opacity-6"),
            array("name" => "Dark opacity 7", "value" => "dark-opacity-7"),
            array("name" => "Dark opacity 8", "value" => "dark-opacity-8"),
            array("name" => "Dark opacity 9", "value" => "dark-opacity-9"),
            array("name" => "Light opacity 1", "value" => "light-opacity-1"),
            array("name" => "Light opacity 2", "value" => "light-opacity-2"),
            array("name" => "Light opacity 3", "value" => "light-opacity-3"),
            array("name" => "Light opacity 4", "value" => "light-opacity-4"),
            array("name" => "Light opacity 5", "value" => "light-opacity-5"),
            array("name" => "Light opacity 6", "value" => "light-opacity-6"),
            array("name" => "Light opacity 7", "value" => "light-opacity-7"),
            array("name" => "Light opacity 8", "value" => "light-opacity-8"),
            array("name" => "Light opacity 9", "value" => "light-opacity-9"),
            array("name" => "Dark blur", "value" => "dark-blur"),
            array("name" => "Light blur", "value" => "light-blur")
        );
        $btn_colors = array(
            array("name" => "Primary", "value" => "primary"),
            array("name" => "Primary Light", "value" => "primary-light"),
            array("name" => "Success", "value" => "success"),
            array("name" => "Secondary", "value" => "secondary"),
            array("name" => "Secondary Light", "value" => "secondary-light"),
            array("name" => "Gray 1", "value" => "gray-1"),
            array("name" => "Gray 5", "value" => "gray-5"),
            array("name" => "Black", "value" => "black"),
            array("name" => "White", "value" => "white"),
            array("name" => "Blue", "value" => "blue"),
            array("name" => "Red", "value" => "red"),
            array("name" => "Cyan", "value" => "cyan"),
            array("name" => "Orange", "value" => "orange"),
            array("name" => "Green", "value" => "green"),
            array("name" => "Purple", "value" => "purple"),
            array("name" => "Brown", "value" => "brown"),
            array("name" => "Yellow", "value" => "yellow"),
            array("name" => "Primary gradient", "value" => "gradient-primary"),
            array("name" => "Gray 2", "value" => "gray-2"),
            array("name" => "Gray 3", "value" => "gray-3"),
            array("name" => "Gray 4", "value" => "gray-4"),
            array("name" => "Gray 6", "value" => "gray-6"),
            array("name" => "Gray 7", "value" => "gray-7"),
            array("name" => "Gray 8", "value" => "gray-8"),
            array("name" => "Gray 9", "value" => "gray-9"),
            array("name" => "Dark opacity 1", "value" => "dark-opacity-1"),
            array("name" => "Dark opacity 2", "value" => "dark-opacity-2"),
            array("name" => "Dark opacity 3", "value" => "dark-opacity-3"),
            array("name" => "Dark opacity 4", "value" => "dark-opacity-4"),
            array("name" => "Dark opacity 5", "value" => "dark-opacity-5"),
            array("name" => "Dark opacity 6", "value" => "dark-opacity-6"),
            array("name" => "Dark opacity 7", "value" => "dark-opacity-7"),
            array("name" => "Dark opacity 8", "value" => "dark-opacity-8"),
            array("name" => "Dark opacity 9", "value" => "dark-opacity-9"),
            array("name" => "Light opacity 1", "value" => "light-opacity-1"),
            array("name" => "Light opacity 2", "value" => "light-opacity-2"),
            array("name" => "Light opacity 3", "value" => "light-opacity-3"),
            array("name" => "Light opacity 4", "value" => "light-opacity-4"),
            array("name" => "Light opacity 5", "value" => "light-opacity-5"),
            array("name" => "Light opacity 6", "value" => "light-opacity-6"),
            array("name" => "Light opacity 7", "value" => "light-opacity-7"),
            array("name" => "Light opacity 8", "value" => "light-opacity-8"),
            array("name" => "Light opacity 9", "value" => "light-opacity-9"),
            array("name" => "Custom", "value" => "custom"),
        );
        // foreach ($btn_colors as $key => $value) {
        //     echo 'array("name" => "'.$value.'", "value" => "'.$key.'"),<br>';
        // }
        // die();
        /*
        * Colors Data
        */
        $text_colors_with_custom = $text_colors;
        array_push($text_colors_with_custom, array(
            "name" => "Custom",
            "value" => "custom"
        ));
        $bg_colors_with_custom = $bg_colors;
        array_push($bg_colors_with_custom, array(
            "name" => "Custom",
            "value" => "custom"
        ));
        $bg_colors_with_default = array(
            array(
                "name" => "Default",
                "value" => "default"
            )
        );
        $bg_colors_with_default = array_merge($bg_colors_with_default, $bg_colors);
        /*
        * Popups Data
        */
        $popup_posts = get_posts([
            'post_type' => 'pixpopup',
            'post_status' => 'publish',
            'numberposts' => -1
        ]);
        $popups = array();
        array_push($popups, array(
            "name" => "Disabled",
            "value" => ""
        ));
        foreach ($popup_posts as $key => $value) {
            array_push($popups, array(
                "name" => $value->post_title,
                "value" => $value->ID
            ));
        }
        /*
        * Button Data
        */
        $btn_style = array(
            array("name" => "Default", "value" => ""),
            array("name" => "Flat", "value" => "flat"),
            array("name" => "Line", "value" => "line"),
            array("name" => "Outline", "value" => "outline"),
            array("name" => "Underline", "value" => "underline"),
            array("name" => "Link", "value" => "link"),
            array("name" => "Blink", "value" => "blink"),
        );
        $btn_text_colors = array_merge(
            array(array(
                "name" => "Default",
                "value" => ""
            )),
            $text_colors
        );
        /*
        * Menu Data
        */
        $menus = wp_get_nav_menus();
        $pix_menus = array();
        foreach ($menus as $key => $value) {
            array_push($pix_menus, array(
                "name" => $value->name,
                "value" => $value->slug
            ));
            // echo 'array("name" => "'.$value->name.'", "value" => "'.$value->slug.'"),<br>';
        }
        // $pix_menus = array(
        //     array("name" => "ddd", "value" => "ddd"),
        //     array("name" => "Inner Pages Menu", "value" => "inner-pages-menu"),
        //     array("name" => "Inner Pages Menu Mobile", "value" => "inner-pages-menu-mobile"),
        //     array("name" => "Levels test", "value" => "levels-test"),
        //     array("name" => "Menu SEO", "value" => "menu-seo"),
        //     array("name" => "Onepage Menu", "value" => "onepage-menu"),
        //     array("name" => "Preview Menu", "value" => "preview-menu"),
        //     array("name" => "Sub mega", "value" => "sub-mega")
        // );

        // var_dump($menus);
        // foreach ($menus as $key => $value) {
        //     echo 'array("name" => "'.$value->name.'", "value" => "'.$value->slug.'"),<br>';
        // }
        // die();

        $colors = array(
            'text_colors' => $bg_colors,
            'text_colors_with_custom' => $bg_colors_with_custom,
            'bg_colors' => $bg_colors,
            'bg_colors_with_custom' => $bg_colors_with_custom,
            'bg_colors_with_default' => $bg_colors_with_default,
            'pix_popups'            => $popups,
            'pix_btn_style'            => $btn_style,
            'pix_btn_colors'            => $btn_colors,
            'pix_btn_text_colors'            => $btn_text_colors,
            'pix_menus'            => $pix_menus
        );


        wp_localize_script('pix-options-builder', 'PIX_HEADER_DATA', $colors);
    }
}
