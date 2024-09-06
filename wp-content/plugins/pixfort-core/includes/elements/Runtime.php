<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/* ---------------------------------------------------------------------------
* Runtime
* --------------------------------------------------------------------------- */
class PixRuntime {

    function render($attr, $content = null) {
        extract(shortcode_atts(array(
            'runtime_file'     => '',
            'runtime_file_url'     => '',
            'runtime_state'     => '',
            'link'     => '',
            'aria_label'     => '',
            'width'     => '500',
            'height'     => '500'
        ), $attr));

        $output = '';
        if(!empty($link)&&!empty($link['url'])){
            $target = '';
            if(!empty($link['is_external'])) $target = 'target="_blank"';
            $output .= '<a href="'.$link['url'].'" '.$target.' aria-label="'.$aria_label.'">';
        }
        if (!empty($runtime_file) && !empty($runtime_file['url'])) {
            $output .= '<canvas class="pix-runtime-canvas" id="canvas" runtime-state="' . $runtime_state . '" width="' . $width . '" height="' . $height . '" runtime-url="' . $runtime_file['url'] . '"></canvas>';
        } else {
            if (!empty($runtime_file_url)) {
                $output .= '<canvas class="pix-runtime-canvas" id="canvas" runtime-state="' . $runtime_state . '" width="' . $width . '" height="' . $height . '" runtime-url="' . $runtime_file_url . '"></canvas>';
            }
        }
        if(!empty($link)&&!empty($link['url'])){
            $output .= '</a>';
        }
        return $output;
    }
}
