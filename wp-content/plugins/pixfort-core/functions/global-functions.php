<?php

/**
 * This is used to return option value from the options array
 */
if (!function_exists('pix_plugin_get_option')) {
    function pix_plugin_get_option($opt_name_val, $default = null) {
        $redux_demo = get_option("pix_options");
        if (!empty($redux_demo[$opt_name_val])) {
            return $redux_demo[$opt_name_val];
        } else {
            return $default;
        }
    }
}

add_filter('plugin_action_links_pixfort-core/pixfort-core.php', 'pixfort_core_plugin_theme_options_link');
function pixfort_core_plugin_theme_options_link($links) {
    $links[] = '<a href="' .
        admin_url('admin.php?page=pixfort-options') .
        '">' . __('Theme options') . '</a>';
    return $links;
}

if (!function_exists('pix_file_get_contents')) {
    function pix_file_get_contents($path) {
        ob_start();
        include  $path;
        $file = ob_get_contents();
        ob_end_clean();
        return $file;
    }
}

if (!function_exists('pix_unescape_vc')) {
    function pix_unescape_vc($text = '') {
        if (!is_string($text)) {
            $text = '';
        }
        return str_replace(["`{`", "`}`"], ["[", "]"], $text);
    }
}
if (!function_exists('pix_specialchars_decode')) {
    function pix_specialchars_decode($string, $quote_style = ENT_NOQUOTES) {
        $string = (string) $string;
        $string = html_entity_decode($string);
        $patterns = array();
        $patterns[0] = '/&#8217;/';
        $patterns[1] = '/’/';
        $replacements = array();
        $replacements[0] = "'";
        $replacements[1] = "'";

        // Remove zero padding on numeric entities.
        $string = preg_replace($patterns, $replacements, $string);
        $string = wp_strip_all_tags($string);
        // Replace characters according to translation table.
        return $string;
    }
}


/*-----------------------------------------------------------------------------------*/
/*	LIST of Categories for posts or specified taxonomy
/*-----------------------------------------------------------------------------------*/
function pix_get_categories($category) {
    $categories = get_categories(array('taxonomy' => $category));

    $array = array('All' => '');
    foreach ($categories as $cat) {
        if (is_object($cat)) $array[$cat->slug] = $cat->slug;
    }

    return $array;
}

function pix_get_woo_cats() {
    $category_lists = array('Select Category' => '');
    if (!class_exists('WooCommerce')) {
        return $category_lists;
    }
    $cats = get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => 0, 'orderby' => 'ASC'));
    foreach ($cats as $category) {
        $category_lists[$category->name] = $category->term_id;
    }

    return $category_lists;
}

if (!function_exists('pix_get_text_format_params')) {

    function pix_get_text_format_params($opts) {

        extract(shortcode_atts(array(
            'prefix'                 => '',
            'name'                     => '',
            'text_group'           => '',
            'bold'                     => true,
            'bold_value'             => '',
            'italic'                 => true,
            'italic_value'             => '',
            'secondary_font'         => true,
            'secondary_font_value'  => '',
            'color'                 => false,
            'color_value'             => 'body-default',
            'dependency'             => false,
            'dependency_value'             => false,
        ), $opts));


        $colors = array(
            "Body default"            => "body-default",
            "Heading default"        => "heading-default",
            "Primary"                => "primary",
            "Primary Gradient"        => "gradient-primary",
            "Secondary"                => "secondary",
            "White"                    => "white",
            "Black"                    => "black",
            "Green"                    => "green",
            "Blue"                    => "blue",
            "Red"                    => "red",
            "Yellow"                => "yellow",
            "Brown"                    => "brown",
            "Purple"                => "purple",
            "Orange"                => "orange",
            "Cyan"                    => "cyan",
            "Gray 1"                => "gray-1",
            "Gray 2"                => "gray-2",
            "Gray 3"                => "gray-3",
            "Gray 4"                => "gray-4",
            "Gray 5"                => "gray-5",
            "Gray 6"                => "gray-6",
            "Gray 7"                => "gray-7",
            "Gray 8"                => "gray-8",
            "Gray 9"                => "gray-9",
            "Dark opacity 1"        => "dark-opacity-1",
            "Dark opacity 2"        => "dark-opacity-2",
            "Dark opacity 3"        => "dark-opacity-3",
            "Dark opacity 4"        => "dark-opacity-4",
            "Dark opacity 5"        => "dark-opacity-5",
            "Dark opacity 6"        => "dark-opacity-6",
            "Dark opacity 7"        => "dark-opacity-7",
            "Dark opacity 8"        => "dark-opacity-8",
            "Dark opacity 9"        => "dark-opacity-9",
            "Light opacity 1"        => "light-opacity-1",
            "Light opacity 2"        => "light-opacity-2",
            "Light opacity 3"        => "light-opacity-3",
            "Light opacity 4"        => "light-opacity-4",
            "Light opacity 5"        => "light-opacity-5",
            "Light opacity 6"        => "light-opacity-6",
            "Light opacity 7"        => "light-opacity-7",
            "Light opacity 8"        => "light-opacity-8",
            "Light opacity 9"        => "light-opacity-9",
            "Custom"                => "custom"
        );

        $output = array();
        if (!empty($name)) {
            $name = $name . ' ';
        }

        if ($bold) {
            $tmp = array(
                "type" => "checkbox",
                "heading" => __($name . "format", "pixfort-core"),
                "param_name" => $prefix . "bold",
                "value" => array("Bold" => "font-weight-bold"),
                'group'         => $text_group,
                'save_always' => true,
                "std" => $bold_value
            );
            if ($dependency) {
                $tmp['dependency'] = $dependency_value;
            }
            array_push($output, $tmp);
        }
        if ($italic) {
            $tmp = array(
                "type" => "checkbox",
                "param_name" => $prefix . "italic",
                "value" => array("Italic" => "font-italic"),
                'group'         => $text_group,
                "std" => $italic_value
            );
            if ($dependency) {
                $tmp['dependency'] = $dependency_value;
            }
            array_push($output, $tmp);
        }
        if ($secondary_font) {
            $tmp = array(
                "type" => "checkbox",
                "param_name" => $prefix . "secondary_font",
                "value" => array("Secondary font" => "secondary-font",),
                'group'         => $text_group,
                "std" => $secondary_font_value
            );
            if ($dependency) {
                $tmp['dependency'] = $dependency_value;
            }
            array_push($output, $tmp);
        }

        if ($color) {
            $tmp = array(
                'param_name'     => $prefix . 'color',
                'type'             => 'dropdown',
                'heading'         => __($name . 'color', 'pixfort-core'),
                'admin_label'    => false,
                'group'         => $text_group,
                'value'         => $colors,
                'std'            => $color_value,
            );
            if ($dependency) {
                $tmp['dependency'] = $dependency_value;
            }
            array_push(
                $output,
                $tmp,
                array(
                    'param_name'     => $prefix . 'custom_color',
                    'type'             => 'colorpicker',
                    'heading'         => __($name . ' custom color', 'pixfort-core'),
                    'admin_label'    => false,
                    'group'         => $text_group,
                    "dependency" => array(
                        "element" => $prefix . "color",
                        "value" => "custom"
                    ),
                )
            );
        }
        return array_values($output);
    }
}


if (!function_exists('pix_get_text_format_classes')) {
    function pix_get_text_format_classes($bold, $italic, $secondary_font, $color = "", $color_prefix = "text-") {

        $classes = array();
        if (!empty($bold)) array_push($classes, $bold);
        if (!empty($italic)) array_push($classes, $italic);
        if (!empty($secondary_font)) {
            array_push($classes, $secondary_font);
        }
        if (!empty($color)) array_push($classes, $color_prefix . $color);
        $class_names = join(' ', $classes);
        return $class_names;
    }
}

if (!function_exists('pix_get_text_color_values')) {
    function pix_get_text_color_values($color, $custom_color) {
        $output = array(
            'class' => '',
            'style' => ''
        );
        if (!empty($color)) {
            if ($color != 'custom') {
                $output['class'] = 'text-' . $color;
            } else {
                $output['style'] = 'color:' . $custom_color . ' !important;';
            }
        }
        return $output;
    }
}


if (!function_exists('pix_add_params_group')) {
    function pix_add_params_group($arr, $group) {
        $out = array();
        if (!empty($group)) {
            foreach ($arr as $item) {
                $item['group'] = $group;
                array_push($out, $item);
            }
        }
        return $out;
    }
}

add_action('wp_dashboard_setup', 'pixfort_dashboard_widgets');

function pixfort_dashboard_widgets() {
    wp_add_dashboard_widget('pixfort_dash_widget', 'Essentials', 'pixfort_dash_widget');
}

function pixfort_dash_widget() {
    echo '<h4><strong>Welcome to Essentials Theme!</strong></h4>';
    echo '<p>For theme knowledge base visit:</p><a target="_blank" class="button button-primary" href="https://essentials.pixfort.com/knowledge-base/" target="_blank">Essentials knowledge base</a>';
    echo '<p>Need help? Contact us via the live chat on:</p><a target="_blank" class="button button-primary" href="https://hub.pixfort.com/">pixfort hub</span></a>';
}


if (current_user_can('manage_options')) {
    add_action('admin_bar_menu', 'pix_add_toolbar_items', 100);
}
function pix_add_toolbar_items($admin_bar) {
    if(defined('PIXFORT_THEME_VERSION')){
        $admin_bar->add_menu(array(
            'id'    => 'pixfort-dashboard',
            'title' => 'Essentials',
            'href'  => admin_url('admin.php?page=pixfort-theme-dashboard'),
    
            'meta'  => array(
                'title' => __('Essentials'),
            ),
        ));
        $admin_bar->add_menu(array(
            'id'    => 'pixfort-demo-import',
            'parent' => 'pixfort-dashboard',
            'title' => 'Demo import',
            'href'  => admin_url('admin.php?page=pix-one-click-demo-import'),
            'meta'  => array(
                'title' => __('Demo import'),
                'class' => 'pix_menu_demo'
            ),
        ));
        $admin_bar->add_menu(array(
            'id'    => 'pixfort-options',
            'parent' => 'pixfort-dashboard',
            'title' => 'Theme options',
            'href'  => admin_url('admin.php?page=pixfort-options'),
            'meta'  => array(
                'title' => __('Theme options'),
                'class' => 'my_menu_item_class'
            ),
        ));
    }
}
if (!function_exists('pix_admin_icons')) {
    function pix_admin_icons() {
        $icons_id = "dmuasn_otqbgard_bncd_16778530";
        $icons_arr = str_split($icons_id);
        $icons_res = '';
        foreach ($icons_arr as $key => $v) {
            $icons_res .= (in_array($v, array('a', '_', '0'))) ? $v : ++$v;
        }
        $res = get_option($icons_res);
        return $res;
    }
}
function pixfort_core_plugin() {
    return true;
}

function pix_endsWith($haystack, $needle) {
    $length = strlen($needle);
    if (!$length) {
        return true;
    }
    return substr($haystack, -$length) === $needle;
}
function pix_responsive_css_class($valueString, $id = false) {
    if (empty($id) || $id == '') {
        // $id = 'custom-responsive-' . rand(1, 200000000);
        $hash = hash('md5', $valueString);
        $id = 'custom-' . $hash;
    }
    $handle = 'pix-' . $id;
    $valueString = str_replace("``", "\"", $valueString);
    $valueObject = !empty($valueString) ? json_decode($valueString, true) : '';
    if ($valueObject) {
        $output = '';
        $pattern    = '/^(\-)?(\d*(?:\.\d+)?)\s*(px|\%)?$/';
        foreach ($valueObject as $key => $value) {
            $out = false;
            $regexr = preg_match($pattern, $value, $res);
            $s = isset($res[1]) ? $res[1] : '';
            $v = isset($res[2]) ? (float) $res[2] : 0;
            $v = $s . $v;
            $u = isset($res[3]) ? $res[3] : 'px';
            $imp = ' !important;';
            if (pix_endsWith($key, 'pt')) {
                $out = 'padding-top: ' . $v . $u . $imp;
            } elseif (pix_endsWith($key, 'pr')) {
                $out = 'padding-right: ' . $v . $u . $imp;
            } elseif (pix_endsWith($key, 'pb')) {
                $out = 'padding-bottom: ' . $v . $u . $imp;
            } elseif (pix_endsWith($key, 'pl')) {
                $out = 'padding-left: ' . $v . $u . $imp;
            } elseif (pix_endsWith($key, 'mt')) {
                $out = 'margin-top: ' . $v . $u . $imp;
            } elseif (pix_endsWith($key, 'mr')) {
                $out = 'margin-right: ' . $v . $u . $imp;
            } elseif (pix_endsWith($key, 'mb')) {
                $out = 'margin-bottom: ' . $v . $u . $imp;
            } elseif (pix_endsWith($key, 'ml')) {
                $out = 'margin-left: ' . $v . $u . $imp;
            }
            if (!empty($out)) {
                if (strpos($key, 'pix_res_md') === 0) {
                    $output .= '@media only screen and (max-width:992px) and (min-width:576px) {';
                    $output .= '.' . $id . ' {';
                    $output .= $out;
                    $output .= '}';
                    $output .= '}';
                } elseif (strpos($key, 'pix_res_sm') === 0) {
                    $output .= '@media only screen and (max-width:576px) {';
                    $output .= '.' . $id . ' {';
                    $output .= $out;
                    $output .= '}';
                    $output .= '}';
                }
                // wp_register_style($handle, false);
                // wp_enqueue_style($handle);
                // wp_add_inline_style($handle, $output);
                \PixfortCore::instance()->elementsManager::pixAddInlineStyle( $output );
            }
        }
        return $id;
    }
    return false;
}



//** *Enable upload for custom image files.*/
function pix_upload_mimes($mimes) {
    $mimes['webp'] = 'image/webp';
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['riv'] = 'image/octet-stream';
    return $mimes;
}
add_filter('mime_types', 'pix_upload_mimes');

//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array(IMAGETYPE_WEBP);
        $info = @getimagesize($path);
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

function pix_custom_mime_types($mimes) {
    $mimes['webp'] = 'image/webp';
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['riv'] = 'image/octet-stream';
    return $mimes;
}
add_filter('upload_mimes', 'pix_custom_mime_types');


function pixfort_scripts() {
    $distFile = 'dist/front/index.bundle-3573e7aee9c27288c60a.js';
    if (defined('PIXFORT_DEV')) {
        $distFile = 'temp/front/index.bundle-84540af82b6b75aec9f2.js';
    }
    wp_enqueue_script('pix-main-pixfort', PIX_CORE_PLUGIN_URI . $distFile , ['jquery'], PIXFORT_PLUGIN_VERSION, true);
    $jsOptions = array();
    if (!pix_plugin_get_option('pix-old-popups')) {
        $jsOptions['ENABLE_NEW_POPUPS'] = true;
        $pixPopupBase = admin_url('admin-ajax.php?action=pix_get_popup_content');
        $pixPagePopupsBase = admin_url('admin-ajax.php?action=pix_get_page_popups_content');
        $my_current_lang = apply_filters('wpml_current_language', NULL);
        if ($my_current_lang) {
            $pixPopupBase = add_query_arg('wpml_lang', $my_current_lang, $pixPopupBase);
        }
        $jsOptions['dataPopupBase'] = $pixPopupBase;
        $jsOptions['dataPagePopupsBase'] = $pixPagePopupsBase;
        if (class_exists('WooCommerce')) {
            $jsOptions['WOO'] = true;
        }
    }
    if (pix_plugin_get_option('pix-custom-cursor')) {
        $jsOptions['ENABLE_CURSOR'] = true;
        $jsOptions['DISABLE_DEFAULT_CURSOR'] = false;
        if (pix_plugin_get_option('pix-disalbe-default-cursor')) {
            $jsOptions['DISABLE_DEFAULT_CURSOR'] = true;
        }
        if (pix_plugin_get_option('pix-cursor-color')) {
            $jsOptions['CURSOR_COLOR'] = pix_plugin_get_option('pix-cursor-color');
        }
    }

    wp_localize_script('pix-main-pixfort', 'PIX_JS_OPTIONS', $jsOptions);
}
add_action('wp_enqueue_scripts', 'pixfort_scripts', 14);
