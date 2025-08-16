<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/* ---------------------------------------------------------------------------
* PortfolioSlider
* --------------------------------------------------------------------------- */
class PixPortfolioSlider {

	public function __construct() {
		include_once('extras/portfolio-functions.php');
	}

	function render($attr, $content = null) {
		extract(shortcode_atts(array(
			'title'					=> '',
			'count'					=> 6,
			'category'				=> '',
			'category_multi'		=> '',
			'more'					=> '',
			'portfolio_style'		=> '',
			'orderby'  				=> 'date',
			'order'  				=> 'DESC',
			'slider_num'  			=> '3',
			'dots_style' 			=> '',
			'slider_style' 			=> 'pix-style-standard',
			'slider_effect' 		=> 'pix-effect-standard',
			'autoplay' 				=> false,
			'autoplay_time' 		=> '1500',
			'freescroll' 			=> false,
			'prevnextbuttons' 		=> true,
			'adaptiveheight' 		=> false,
			'pagedots' 				=> true,
			'dots_align' 			=> '',
			'cellalign' 			=> 'center',
			'slider_scale' 			=> '',
			'cellpadding' 			=> 'pix-p-10',
			'slider_wrap' 			=> false,
			'righttoleft' 			=> false,
			'visible_y' 			=> '',
			'visible_overflow' 		=> '',
			'full_size_img' 		=> '',
			'css' 					=> '',
		), $attr));

		$css_class = '';
		if (function_exists('vc_shortcode_custom_css_class')) {
			$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));
		}
		wp_enqueue_style('pixfort-carousel-style', PIX_CORE_PLUGIN_URI.'includes/assets/css/elements/carousel-2.min.css', false, PIXFORT_PLUGIN_VERSION, 'all');
		wp_enqueue_script('pix-flickity-js');
		$args = array(
			'post_type' 			=> 'portfolio',
			'posts_per_page'		=> intval($count),
			'no_found_rows'			=> 1,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'orderby' => $orderby,
			'order' => $order
		);

		// Check if user is logged in and can edit private posts
		if (is_user_logged_in() && current_user_can('edit_private_posts')) {
			$args['post_status'] = array('publish', 'private');
		}

		// categories
		if ($category_multi) {
			$args['category_name'] = trim($category_multi);
		} elseif ($category) {
			$category = trim($category);
			$category = str_replace(' ', '', $category);
			$category_arr = explode(',', $category);
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio-types',
					'field' => 'slug',
					'terms' => $category_arr
				)
			);
		}
		$output = '';
		$query = new WP_Query($args);

		if ($query->have_posts()) {

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
			$pix_id = "pix-slider-" . rand(1, 200000000);
			$slider_opts = array(
				"autoPlay"			=> $autoplay_time,
				"freeScroll"		=> filter_var($freescroll, FILTER_VALIDATE_BOOLEAN),
				"prevNextButtons"	=> filter_var($prevnextbuttons, FILTER_VALIDATE_BOOLEAN),
				"wrapAround"		=> filter_var($slider_wrap, FILTER_VALIDATE_BOOLEAN),
				"pageDots"			=> filter_var($pagedots, FILTER_VALIDATE_BOOLEAN),
				"adaptiveHeight"	=> filter_var($adaptiveheight, FILTER_VALIDATE_BOOLEAN),
				"rightToLeft"		=> filter_var($righttoleft, FILTER_VALIDATE_BOOLEAN),
				"cellAlign" 		=> $cellalign,
				"contain"			=> true,
				"slider_effect"		=> $slider_effect,
				"pix_id"			=>  '#' . $pix_id,
			);
			$slider_data = json_encode($slider_opts);
			$slider_data = 'data-flickity=\'' . $slider_data . '\'';
			if ($visible_overflow == 'pix-overflow-all-visible') $visible_y = '';
			$output  .= '<div class="' . $css_class . '">';
			$output  .= '<div id="' . $pix_id . '" class="pix-main-slider ' . $visible_overflow . ' ' . $slider_style . ' ' . $slider_effect . ' ' . $slider_scale . ' ' . $visible_y . ' pix-slider-' . $slider_num . ' pix-slider-dots ' . $dots_style . ' ' . $dots_align . '" ' . $slider_data . '>';
			while ($query->have_posts()) {
				$output .= '<div class="carousel-cell">';
				$output .= '<div class="slide-inner ' . $cellpadding . '">';
				$output .= '<div class="pix-slider-effects">';
				switch ($portfolio_style) {
					case 'mini':
						$output .= pix_portfolio_style_mini($query, false, $attr);
						break;
					case 'transparent':
						$output .= pix_portfolio_style_transparent($query, false, $attr);
						break;
					case '3d':
						$output .= pix_portfolio_style_3d($query, false, $attr);
						break;
					default:
						$output .= pix_portfolio_style_default($query, false, $attr);
				}
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}
			wp_reset_postdata();
			$output .= '</div>';
			$output .= '</div>' . "\n";
		}

		wp_reset_postdata();

		return $output;
	}
}


