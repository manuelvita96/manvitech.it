<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class PixAccordionTab {

    function render($attr, $content = null) {
        /* ---------------------------------------------------------------------------
        * Accordion tab [pix_accordion_tab][/pix_accordion_tab]
        * --------------------------------------------------------------------------- */
        extract(shortcode_atts(array(
            'title'             => 'Accordion Title',
            'bold'                 => '',
            'italic'             => '',
            'secondary_font'     => '',
            'title_color'         => 'heading-default',
            'title_custom_color' => '',
            'media_type'         => '',
            'icon'                 => '',
            'icon_color'         => 'primary',
            'custom_icon_color' => '',
            'pix_duo_icon'         => '',
            'bg_color'             => 'white',
            'custom_bg_color'     => '',
            'transition'         => '',
            'el_class'             => '',
            'tab_id'             => '',
            'is_open'             => '',
            'css'               => '',
        ), $attr));

        $css_class = '';
        if (function_exists('vc_shortcode_custom_css_class')) {
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));
        }
        $output = '';
        $icon_out = '';
        if (!empty($media_type)) {
            if(\PixfortCore::instance()->icons::$isEnabled) {
                if (!empty($media_type)&&$media_type === "duo_icon") {
                    $icon = $pix_duo_icon;
                }
                $icon_style = '';
                if (!empty($custom_icon_color)) {
                    $icon_style = 'style="color:' . $custom_icon_color . ';"';
                }
                $icon_out = '<span class="d-inline-block text-' . $icon_color . ' svg-20 pix-mr-10" ' . $icon_style . '>';
                $icon_out .= \PixfortCore::instance()->icons->getIcon($icon);
                $icon_out .= '</span>';
                
            } else {
                /*
                * Deprecated Icons 
                */
                $icon = \PixfortCore::instance()->icons->verifyIconName($icon);
                if ($media_type == 'icon') {
                    if (!empty($icon)) {
                        if(!str_contains($icon, 'pixicon') && !str_contains($icon, 'Line/') && !str_contains($icon, 'Solid/')) {
                            $pix_duo_icon = $icon;
                            $media_type = "duo_icon";
                        } else {
                            $icon_style = '';
                            if (!empty($custom_icon_color)) {
                                $icon_style = 'style="color:' . $custom_icon_color . ';"';
                            }
                            $icon_out = '<i class="' . $icon . ' text-' . $icon_color . ' text-20 pix-mr-10" ' . $icon_style . '></i> ';
                        }
                    }
                }
                if ($media_type == 'duo_icon') {
                    if (!empty($pix_duo_icon)) {
                        $icon_out = '<span class="d-inline-block text-' . $icon_color . ' svg-20 pix-mr-10">';
                        $icon_out .= pix_load_inline_svg(PIX_CORE_PLUGIN_DIR . '/functions/images/icons/' . $pix_duo_icon . '.svg');
                        $icon_out .= '</span>';
                    }
                }
                /*
                * End of Deprecated Icons
                */
            }
            
        }
        $title_classes = pix_get_text_format_classes($bold, $italic, $secondary_font);
        $title_classes .= ' text-' . $title_color;
        $title_style = '';
        if (!empty($title_custom_color)) {
            $title_style = 'style="color:' . $title_custom_color . '"';
        }
        $tab_title_style = '';
        if ($bg_color == 'custom' && !empty($custom_bg_color)) {
            $tab_title_style = 'style="background:' . $custom_bg_color . '"';
        }
        $show = '';
        if (!empty($is_open)) {
            $show = 'show';
        }
        $output .= '<div class="card ' . $el_class . '">
   <div class="card-header bg-' . $bg_color . ' pix-mb-10 shadow-sm rounded-lg" id="heading' . $tab_id . '">
       <button class="btn btn-link text-left rounded-lg bg-' . $bg_color . '" type="button" data-toggle="collapse" data-target="#collapse' . $tab_id . '" aria-expanded="true" aria-controls="collapse' . $tab_id . '" ' . $tab_title_style . '>' . $icon_out . '<span class="' . $title_classes . '" ' . $title_style . '>' . $title . '</span></button>
   </div>
   <div id="collapse' . $tab_id . '" class="collapse ' . $show . ' ' . $css_class . '" aria-labelledby="heading' . $tab_id . '">
     <div class="card-body">
         ' . do_shortcode($content) . '
     </div>
   </div>
 </div>';

        return $output;
    }
}
