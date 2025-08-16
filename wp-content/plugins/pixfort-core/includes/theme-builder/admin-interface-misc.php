<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Add tab navigation between Footers, Popups, and Headers in admin area
 */
function pix_add_admin_tabs() {
    global $pagenow;
    if ( ! function_exists( 'get_current_screen' ) ) {
        return false;
    }
    $screen = get_current_screen();
    
    // Check if we're on the edit page or post management page for our custom post types
    if (!$screen || $pagenow != 'edit.php') {
        return;
    }
    
    $post_types = array(
        'pixheader' => array(
            'label' => __('Headers', 'pixfort-core'),
            'url' => admin_url('edit.php?post_type=pixheader')
        ),
        'pixfooter' => array(
            'label' => __('Footers', 'pixfort-core'), 
            'url' => admin_url('edit.php?post_type=pixfooter')
        ),
        'pixpopup' => array(
            'label' => __('Popups', 'pixfort-core'),
            'url' => admin_url('edit.php?post_type=pixpopup')
        )
    );
    
    // Only show the tabs if we're on one of our custom post types pages
    if (!array_key_exists($screen->post_type, $post_types)) {
        return;
    }
    
    echo '<div class="pix-admin-tabs" style="margin: 20px 0 0 0; padding: 0 20px 0 0;">';
    
    // Add descriptive text
    echo '<div class="pix-admin-tabs-description" style="margin-bottom: 20px; margin-top: 30px;">';
    echo '<p style="margin: 0; color: #1d2327; font-size: 14px; line-height: 1.5;">';
    echo __('Welcome to the Theme Builder! Here you can manage your website\'s headers, footers, and popups.', 'pixfort-core');
    echo '</p>';
    echo '</div>';
    
    echo '<h2 class="nav-tab-wrapper">';
    
    foreach ($post_types as $post_type => $data) {
        $active = ($screen->post_type == $post_type) ? 'nav-tab-active' : '';
        echo '<a href="' . esc_url($data['url']) . '" class="nav-tab ' . esc_attr($active) . '">' . esc_html($data['label']) . '</a>';
    }
    
    echo '</h2>';
    
    // Add tab-specific descriptions
    echo '<div class="pix-admin-tabs-specific" style="margin: 20px 0;">';

    foreach ($post_types as $post_type => $data) {
        $active = ($screen->post_type == $post_type) ? 'display: flex;' : 'display: none;';
        $description = '';
        $doc_link = '';
        
        switch($post_type) {
            case 'pixheader':
                $description = __('Create and manage your website headers. Headers are the top section of your website that typically contains your logo, menu, and other elements.', 'pixfort-core');
                $doc_link = \PixfortCore::instance()->adminCore->getParam('docs_create_header');
                break;
            case 'pixfooter':
                $description = __('Design and customize your website footers. Footers appear at the bottom of your website and can include logo, links, and copyright information.', 'pixfort-core');
                $doc_link = \PixfortCore::instance()->adminCore->getParam('docs_create_footer');
                break;
            case 'pixpopup':
                $description = __('Create engaging popups to capture leads, display announcements, or show important information to your visitors.', 'pixfort-core');
                $doc_link = \PixfortCore::instance()->adminCore->getParam('docs_create_popup');
                break;
        }
        
        echo '<div class="" style="' . esc_attr($active) . ' padding: 15px; background: #fff; border: 1px solid #ccc; border-left: 4px solid #ccc; border-radius: 2px; justify-content: space-between; align-items: center;">';
        echo '<div style="display: flex; align-items: flex-start; flex: 1; margin-right: 20px;">';
        echo '<span class="dashicons dashicons-info" style="font-size: 20px; width: 20px; height: 20px; margin-right: 6px; color: #bbb; flex-shrink: 0;"></span>';
        echo '<p style="margin: 0; color: #1d2327; font-size: 14px; line-height: 1.5;">' . esc_html($description) . '</p>';
        echo '</div>';
        echo '<a href="' . esc_url($doc_link) . '" target="_blank" class="button button-secondary button-small" style="text-decoration: none; font-size: 11px; display: inline-flex; align-items: center; padding: 1px 6px; height: auto; white-space: nowrap;">';
        echo '<span class="dashicons dashicons-book" style="font-size: 12px; width: 12px; height: 12px; margin-right: 4px;"></span>';
        echo __('Learn more about ' . $data['label'], 'pixfort-core');
        echo '</a>';
        echo '</div>';
    }
    echo '</div>';
    
    echo '</div>';
}
add_action('admin_notices', 'pix_add_admin_tabs');


/**
 * Customize admin menu - Remove individual items and create Theme Builder section
 */
function pix_customize_admin_menu() {
    global $submenu;
    
    // Remove individual menu items
    remove_menu_page('edit.php?post_type=pixheader');
    remove_menu_page('edit.php?post_type=pixfooter');
    remove_menu_page('edit.php?post_type=pixpopup');
    
    // Add new Theme Builder menu
    add_menu_page(
        'Theme Builder', 
        'Theme Builder', 
        'edit_posts', 
        'edit.php?post_type=pixheader', 
        null, 
        'dashicons-admin-appearance', 
        1
    );
    
    // Add submenu items
    // add_submenu_page(
    //     'edit.php?post_type=pixheader', 
    //     'Headers', 
    //     'Headers', 
    //     'edit_posts', 
    //     'edit.php?post_type=pixheader'
    // );
    
    add_submenu_page(
        'edit.php?post_type=pixheader', 
        __('Footers', 'pixfort-core'), 
        __('Footers', 'pixfort-core'), 
        'edit_posts', 
        'edit.php?post_type=pixfooter'
    );
    
    add_submenu_page(
        'edit.php?post_type=pixheader', 
        __('Popups', 'pixfort-core'), 
        __('Popups', 'pixfort-core'), 
        'edit_posts', 
        'edit.php?post_type=pixpopup'
    );
    
    // Remove "Add New" submenu items
    if (isset($submenu['edit.php?post_type=pixheader'])) {
        foreach ($submenu['edit.php?post_type=pixheader'] as $key => $item) {
            // Check if this is an "Add New" item
            if (isset($item[2]) && ($item[2] === 'post-new.php?post_type=pixheader' || 
                                    $item[2] === 'post-new.php?post_type=pixfooter' || 
                                    $item[2] === 'post-new.php?post_type=pixpopup')) {
                unset($submenu['edit.php?post_type=pixheader'][$key]);
            }
        }
    }
    
    // Fix the highlight for current admin page and ensure Theme Builder stays open
    // if ( ! function_exists( 'get_current_screen' ) ) {
    //     return false;
    // }
    // $screen = get_current_screen();
    
    // if (isset($_GET['post_type'])) {
    //     $current_post_type = $_GET['post_type'];
    //     if (in_array($current_post_type, ['pixheader', 'pixfooter', 'pixpopup'])) {
    //         // This ensures the parent menu is highlighted correctly and stays open
    //         $GLOBALS['parent_file'] = 'edit.php?post_type=pixheader';
            
    //         // This ensures the submenu item is highlighted correctly
    //         $GLOBALS['submenu_file'] = 'edit.php?post_type=' . $current_post_type;
    //     }
    // }
    
    // // Also handle post editing and creation screens
    // if ($screen && $screen->base == 'post' && isset($screen->post_type) && 
    //     in_array($screen->post_type, ['pixheader', 'pixfooter', 'pixpopup'])) {
    //     $GLOBALS['parent_file'] = 'edit.php?post_type=pixheader';
    //     $GLOBALS['submenu_file'] = 'edit.php?post_type=' . $screen->post_type;
    // }
}
add_action('admin_menu', 'pix_customize_admin_menu', 999); // Use high priority to ensure it runs after the post types are registered

/**
 * Additional function to handle screen-based menu highlighting and ensure menu stays open
 */
function pix_theme_builder_admin_scripts() {
    if ( ! function_exists( 'get_current_screen' ) ) {
        return false;
    }
    $screen = get_current_screen();
    
    // Only run on our custom post type screens
    if ($screen && in_array($screen->post_type, ['pixheader', 'pixfooter', 'pixpopup'])) {
        // Define "Add New" button link based on current post type
        $add_new_url = admin_url('post-new.php?post_type=' . $screen->post_type);
        
        // Modify the "Add New" button behavior and force menu to open
        echo '<script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                // Modify the "Add New" button if it exists
                var addNewBtn = document.querySelector(".page-title-action");
                if (addNewBtn) {
                    addNewBtn.href = "' . esc_url($add_new_url) . '";
                    // Add plus icon
                    var plusIcon = document.createElement("span");
                    plusIcon.className = "dashicons dashicons-plus-alt2";
                    plusIcon.style.cssText = "font-size: 16px; width: 16px; height: 16px; margin-right: 4px;";
                    addNewBtn.insertBefore(plusIcon, addNewBtn.firstChild);
                    
                    // Add flexbox styling to the button
                    addNewBtn.style.cssText += "display: inline-flex; align-items: center; justify-content: center;";
                }
                
                // Force the Theme Builder menu to be open
                // First, find the Theme Builder menu item
                var menuItems = document.querySelectorAll("#adminmenu > li");
                var themeBuilderItem = null;
                
                for (var i = 0; i < menuItems.length; i++) {
                    var link = menuItems[i].querySelector("a");
                    if (link && link.href && link.href.includes("edit.php?post_type=pixheader")) {
                        themeBuilderItem = menuItems[i];
                        break;
                    }
                }
                
                // If we found the menu item, make sure it\'s open
                if (themeBuilderItem) {
                    // Add the "wp-has-current-submenu" class to open the menu
                    themeBuilderItem.classList.remove("wp-not-current-submenu");
                    themeBuilderItem.classList.add("wp-has-current-submenu");
                    themeBuilderItem.classList.add("wp-menu-open");
                    
                    // Find the link and update its class as well
                    var themeBuilderLink = themeBuilderItem.querySelector("a");
                    if (themeBuilderLink) {
                        themeBuilderLink.classList.remove("wp-not-current-submenu");
                        themeBuilderLink.classList.add("wp-has-current-submenu");
                        themeBuilderLink.classList.add("wp-menu-open");
                    }
                    
                    // Find the submenu item for the current post type and highlight it
                    var subMenuItems = themeBuilderItem.querySelectorAll(".wp-submenu li");
                    var currentPostType = "' . esc_js($screen->post_type) . '";
                    
                    for (var j = 0; j < subMenuItems.length; j++) {
                        var subLink = subMenuItems[j].querySelector("a");
                        if (subLink && subLink.href && subLink.href.includes("post_type=" + currentPostType)) {
                            subMenuItems[j].classList.add("current");
                            subLink.classList.add("current");
                            subLink.setAttribute("aria-current", "page");
                        } else {
                            subMenuItems[j].classList.remove("current");
                            if (subLink) {
                                subLink.classList.remove("current");
                                subLink.removeAttribute("aria-current");
                            }
                        }
                    }
                }
            });
        </script>';
    }
}
add_action('admin_head', 'pix_theme_builder_admin_scripts', 100);

/**
 * Set the correct parent file for Theme Builder menu items
 * This ensures the menu stays open on all Theme Builder pages
 */
function pix_set_theme_builder_parent_file($parent_file) {
    global $current_screen, $submenu_file;
    
    // Check if we're on one of our custom post types
    if ($current_screen && in_array($current_screen->post_type, ['pixheader', 'pixfooter', 'pixpopup'])) {
        // Set the submenu file to highlight the correct submenu item
        $submenu_file = 'edit.php?post_type=' . $current_screen->post_type;
        
        // Return the parent file to keep the Theme Builder menu open
        return 'edit.php?post_type=pixheader';
    }
    
    return $parent_file;
}
add_filter('parent_file', 'pix_set_theme_builder_parent_file');

/**
 * Ensure proper submenu highlighting for Theme Builder items
 */
function pix_set_theme_builder_submenu_file($submenu_file, $parent_file) {
    global $current_screen;
    
    // If we're on one of our custom post types and the parent is our Theme Builder
    if ($current_screen && 
        in_array($current_screen->post_type, ['pixheader', 'pixfooter', 'pixpopup']) && 
        $parent_file === 'edit.php?post_type=pixheader') {
        
        // Set the correct submenu file for highlighting
        return 'edit.php?post_type=' . $current_screen->post_type;
    }
    
    return $submenu_file;
}
add_filter('submenu_file', 'pix_set_theme_builder_submenu_file', 10, 2);

/**
 * Add admin pointer to highlight Theme Builder menu item
 * Inform users that Theme Builder now includes Headers, Footers, and Popups
 */
function pix_theme_builder_admin_pointer() {
    // Get current user ID
    $user_id = get_current_user_id();
    
    // Check if the user has already dismissed this pointer
    $dismissed = explode(',', (string) get_user_meta($user_id, 'dismissed_wp_pointers', true));
    
    // Define our pointer ID - use a unique name
    $pointer_id = 'pix_theme_builder_pointer';
    
    // Check if our pointer has been dismissed
    if (in_array($pointer_id, $dismissed)) {
        return;
    }
    
    // Enqueue WordPress pointer scripts and styles
    wp_enqueue_style('wp-pointer');
    wp_enqueue_script('wp-pointer');
    
    // Create our pointer content
    $pointer_content = '<h3>' . __('Theme Builder (New)', 'pixfort-core') . '</h3>';
    $pointer_content .= '<p>' . __('The pixfort Theme Builder includes all your Headers, Footers, and Popups in one convenient location!', 'pixfort-core') . '</p>';
    
    // Create the pointer script
    $script = "
        jQuery(document).ready(function($) {
            // Find the Theme Builder menu item
            var themeBuilderMenuItem = $('#adminmenu a.menu-top').filter(function() {
                return this.href.indexOf('edit.php?post_type=pixheader') > -1;
            });
            
            // If we found the menu item, attach the pointer
            if (themeBuilderMenuItem.length) {
                themeBuilderMenuItem.pointer({
                    content: '" . wp_slash($pointer_content) . "',
                    position: {
                        edge: 'left',
                        align: 'center'
                    },
                    close: function() {
                        // Send AJAX request to mark pointer as dismissed
                        $.post(ajaxurl, {
                            action: 'dismiss-wp-pointer',
                            pointer: '{$pointer_id}'
                        });
                    }
                }).pointer('open');
            }
        });
    ";
    
    // Add the script to WordPress
    wp_add_inline_script('wp-pointer', $script);
}
add_action('admin_enqueue_scripts', 'pix_theme_builder_admin_pointer');