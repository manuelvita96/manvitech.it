<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/* ---------------------------------------------------------------------------
* VideoSlider
* --------------------------------------------------------------------------- */
class PixVideoSlider {

	function render($attr, $content = null) {
		extract(shortcode_atts(array(
			'items'  => '',
			'rounded_img'  => 'rounded-0',
			'aspect' 	=> 'embed-responsive-21by9',
			'is_elementor'  => false,
			'pix_scroll_parallax' 	=> '',
			'pix_tilt' 	=> '',
			'pix_tilt_size' 	=> 'tilt',
			'xaxis' 	=> '',
			'yaxis' 	=> '',
			'animation' 	=> '',
			'delay' 	=> '0',
			'style' 		=> '',
			'hover_effect' 		=> '',
			'add_hover_effect' 		=> '',
			'pix_infinite_animation' 		=> '',
			'pix_infinite_speed' 		=> '',
			'slider_num'  => '3',
			'dots_style' 	=> '',
			'slider_style' 	=> 'pix-style-standard',
			'slider_effect' 	=> 'pix-effect-standard',
			'autoplay' 	=> false,
			'autoplay_time' 	=> '1500',
			'freescroll' 	=> false,
			'prevnextbuttons' 	=> true,
			'adaptiveheight' 	=> false,
			'pagedots' 	=> true,
			'dots_align' 	=> '',
			'cellalign' 	=> 'center',
			'slider_scale' 	=> '',
			'cellpadding' 	=> 'pix-p-10',
			'slider_wrap' 	=> false,
			'righttoleft' 	=> false,
			'visible_y' 	=> '',
			'visible_overflow' 	=> '',
			'extra_classes' 		=> '',
			'css' 		=> '',
		), $attr));

		wp_enqueue_style('pixfort-carousel-style', PIX_CORE_PLUGIN_URI . 'includes/assets/css/elements/carousel-2.min.css', false, PIXFORT_PLUGIN_VERSION, 'all');
		wp_enqueue_script('pix-flickity-js');
		$slides_arr = [];
		if (is_array($items)) {
			$slides_arr = $items;
		} else {
			if (function_exists('vc_param_group_parse_atts')) {
				$slides_arr = vc_param_group_parse_atts($items);
			}
		}
		$output = '';
		if (!empty($slides_arr)) {

			if (!filter_var($autoplay, FILTER_VALIDATE_BOOLEAN)) {
				$autoplay_time = false;
			} else {
				$autoplay_time = (int)$autoplay_time;
			}
			if(is_rtl()){
				if($slider_effect == 'pix-circular-left'){
					$slider_effect = 'pix-circular-right';
				}else if($slider_effect == 'pix-circular-right'){
					$slider_effect = 'pix-circular-left';
				}
			}
			$slider_data = '';
			$pix_id = 'pix-slider-' . rand(1, 200000000);
			$slider_opts = array(
				'autoPlay'			=> $autoplay_time,
				'freeScroll'		=> filter_var($freescroll, FILTER_VALIDATE_BOOLEAN),
				'prevNextButtons'	=> filter_var($prevnextbuttons, FILTER_VALIDATE_BOOLEAN),
				'wrapAround'		=> filter_var($slider_wrap, FILTER_VALIDATE_BOOLEAN),
				'pageDots'			=> filter_var($pagedots, FILTER_VALIDATE_BOOLEAN),
				'adaptiveHeight'	=> filter_var($adaptiveheight, FILTER_VALIDATE_BOOLEAN),
				'rightToLeft'		=> filter_var($righttoleft, FILTER_VALIDATE_BOOLEAN),
				'cellAlign' 		=> $cellalign,
				'contain'			=> true,
				'slider_effect'			=> $slider_effect,
				'pix_id'			=>  '#' . $pix_id,
			);
			$slider_data = json_encode($slider_opts);
			$slider_data = 'data-flickity=\'' . $slider_data . '\'';
			if ($visible_overflow == 'pix-overflow-all-visible') $visible_y = '';
			$output  .= '<div id="' . $pix_id . '" class="pix-main-slider ' . $visible_overflow . ' ' . $slider_style . ' ' . $slider_effect . ' ' . $slider_scale . ' ' . $visible_y . ' pix-slider-' . $slider_num . ' pix-slider-dots ' . $dots_style . ' ' . $dots_align . '" ' . $slider_data . '>';
			foreach ($slides_arr as $key => $value) {
				$output .= '<div class="carousel-cell">';
				$output .= '<div class="slide-inner ' . $cellpadding . '">';
				$output .= '<div class="pix-slider-effects">';
				$output .= \PixfortCore::instance()->elementsManager->renderElement('Video', array_merge(
					$value,
					$attr,
					array(
						'in_popup'	=> true,
						'decode'	=> '0',
					)
				));
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}
			$output .= '</div>';
		}
		return $output;
	}
}
