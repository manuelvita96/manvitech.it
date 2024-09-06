<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/* ---------------------------------------------------------------------------
* Auto Video
* --------------------------------------------------------------------------- */
class PixAutoVideo {

	function render($attr, $content = null) {

		extract(shortcode_atts(array(
			'mp4_video'  				=> '',
			'poster'  					=> '',
			'loop'  					=> '',
			'rounded_img'  				=> 'rounded-0',
			'alt'  						=> '',
			'align'  					=> 'text-left',
			'width' 					=> '',
			'height' 					=> '',
			'pix_scroll_parallax' 		=> '',
			'pix_tilt' 					=> '',
			'pix_tilt_size' 			=> 'tilt',
			'xaxis' 					=> '',
			'yaxis' 					=> '',
			'link' 						=> '',
			'target' 					=> '',
			'animation' 				=> '',
			'delay' 					=> '0',
			'style' 					=> '',
			'hover_effect' 				=> '',
			'add_hover_effect' 			=> '',
			'pix_infinite_animation' 	=> '',
			'pix_infinite_speed' 		=> '',
			'img_div' 					=> '',
			'pix_scale_in' 				=> '',
			'el_class' 					=> '',
			'css' 						=> '',
		), $attr));

		$css_class = '';
		if (function_exists('vc_shortcode_custom_css_class')) {
			$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));
		}
		$css_class .= ' ' . $el_class;

		$style_arr = array(
			"" => "",
			"1"       => "shadow-sm",
			"2"       => "shadow",
			"3"       => "shadow-lg",
			"4"       => "shadow-inverse-sm",
			"5"       => "shadow-inverse",
			"6"       => "shadow-inverse-lg",
		);

		$hover_effect_arr = array(
			""       => "",
			"1"       => "shadow-hover-sm",
			"2"       => "shadow-hover",
			"3"       => "shadow-hover-lg",
			"4"       => "shadow-inverse-hover-sm",
			"5"       => "shadow-inverse-hover",
			"6"       => "shadow-inverse-hover-lg",
		);

		$add_hover_effect_arr = array(
			""       => "",
			"1"       => "fly-sm",
			"2"       => "fly",
			"3"       => "fly-lg",
			"4"       => "scale-sm",
			"5"       => "scale",
			"6"       => "scale-lg",
			"7"       => "scale-inverse-sm",
			"8"       => "scale-inverse",
			"9"       => "scale-inverse-lg",
		);

		$output = '';
		$width_attr = 'width="100%"';
		$height_attr = '';
		$inline_style = '';
		if (!empty($mp4_video)) $mp4_video = esc_url($mp4_video);
		if (!empty($width)) {
			// if (strpos($width, 'px') !== false) {
			// 	$width_attr = 'width="'.intval($width).'"';
			// }
			if (strpos($width, '%') === false) {
				$width_attr = 'width="' . intval($width) . '"';
			}
			if (strpos($width, 'px') === false && strpos($width, '%') === false) {
				$width = intval($width) . 'px';
			}
			$inline_style .= 'max-width:100%;width:' . esc_attr($width) . ';';
			if (empty($height)) {
				$height_attr = 'height="auto"';
			}
		}
		if (!empty($height)) {
			$height_attr = 'height="100%"';
			// if (strpos($height, 'px') !== false) {
			// 	$height_attr = 'height="'.intval($height).'"';
			// }
			if (strpos($height, 'px') !== false && strpos($height, '%') === false) {
				$height_attr = 'height="' . intval($height) . '"';
			}
			// if (strpos($height, 'px') === false && strpos($height, '%') === false) {
			// 	$height = intval($height) .'px';
			// }
			// $inline_style .= 'height:'.esc_attr( $height ).';';
			if (empty($width)) {
				$width_attr = 'width="auto"';
			}
		}

		if (!empty($mp4_video)) {
			$poster_tag = '';
			if (!empty($poster)) {
				if (!empty($poster['id'])) {
					$poster = $poster['id'];
				}
				$img = wp_get_attachment_image_src($poster, "full");
				if (!empty($img[0])) {
					$imgSrc = $img[0];
					$poster_tag = 'poster="' . $imgSrc . '"';
				}
			}

			$classes = array();
			$anim_type = '';
			$anim_delay = '';
			array_push($classes, esc_attr($css_class));

			if ($style) {
				array_push($classes, $style_arr[$style]);
			}
			if ($hover_effect) {
				array_push($classes, $hover_effect_arr[$hover_effect]);
			}
			if ($add_hover_effect) {
				array_push($classes, $add_hover_effect_arr[$add_hover_effect]);
			}

			if (!empty($align)) {
				array_push($classes, $align);
			}

			array_push($classes, 'd-inline-block');


			$inline_style = 'style="' . $inline_style . '"';
			$class_names = join(' ', $classes);
			$containerClasses = '';
			if ($rounded_img === 'rounded-inherit') {
				$containerClasses .= 'rounded-inherit';
			}

			$jarallax = '';
			if ($pix_scroll_parallax) {
				if (!empty($xaxis) || !empty($yaxis)) {
					$jarallax = 'data-jarallax-element="' . $xaxis . ' ' . $yaxis . '" data-xaxis="' . $xaxis . '" data-yaxis="' . $yaxis . '" ';
				}
			}

			if (!empty($img_div)) {
				$output .= '<div class="pix-img-div ' . $img_div . ' ' . $containerClasses . '">';
			} else {
				$output .= '<div class="d-flex w-100 pix-h-auto justify-content-center ' . $pix_scale_in . ' ' . $containerClasses . '">';
			}
			if ($link) {
				$ntab = '';
				if (!empty($target)) {
					$ntab = 'target="_blank"';
				}
				if (!empty($pix_infinite_animation)) {
					$output .= '<div  ' . $inline_style . ' class="' . $pix_infinite_animation . ' ' . $pix_infinite_speed . ' ' . $containerClasses . '">';
				}
				if (!empty($animation)) {
					$anim_type = 'data-anim-type="' . $animation . '"';
					$anim_delay = 'data-anim-delay="' . $delay . '"';
					$output .= '<div  ' . $inline_style . ' class="animate-in d-inline-flex ' . $containerClasses . '" ' . $anim_type . ' ' . $anim_delay . '>';
				}
				if (!empty($pix_tilt)) {
					$output .= '<div  ' . $inline_style . ' class="w-100 pix-h-auto ' . $pix_tilt_size . ' ' . $containerClasses . '">';
				}
				$output .= '<a  ' . $inline_style . ' href="' . $link . '" ' . $ntab . ' class="' . $class_names . ' ' . $rounded_img . '" ' . $anim_type . ' ' . $anim_delay . ' ' . $jarallax . ' aria-label="Auto video">';

				// $output .= '<img class="card-img '.$rounded_img.' h-100" src="'.$imgSrc.'" alt="'. $alt .'" '.$inline_style.'/>';
				$output .= '<video class="pix-video-bg-element d-block ' . $rounded_img . ' bg-video" ' . $width_attr . ' ' . $height_attr . ' preload="metadata" ' . $poster_tag . ' autoplay muted playsinline ' . $loop . '>
							<source src="' . $mp4_video . '" type="video/mp4" />
							</video>';

				$output .= '</a>';
				if (!empty($pix_tilt)) {
					$output .= '</div>';
				}
				if (!empty($animation)) {
					$output .= '</div>';
				}
				if (!empty($pix_infinite_animation)) {
					$output .= '</div>';
				}
			} else {
				if (!empty($pix_infinite_animation)) {
					$output .= '<div  ' . $inline_style . ' class="' . $pix_infinite_animation . ' ' . $pix_infinite_speed . ' ' . $containerClasses . '">';
				}
				if (!empty($animation)) {
					$anim_type = 'data-anim-type="' . $animation . '"';
					$anim_delay = 'data-anim-delay="' . $delay . '"';
					$output .= '<div  ' . $inline_style . ' class="animate-in w-100 pix-h-auto d-inline-flex ' . $containerClasses . '" ' . $anim_type . ' ' . $anim_delay . '>';
				}
				if (!empty($pix_tilt)) {
					$output .= '<div  ' . $inline_style . ' class="d-inline-block w-100 pix-h-auto ' . $pix_tilt_size . ' ' . $containerClasses . '">';
				}

				$output .= '<div  ' . $inline_style . ' class="' . $class_names . ' ' . $rounded_img . '"  ' . $jarallax . '>';

				$output .= '<video class="pix-video-bg-element d-block pix-bg-image2 ' . $rounded_img . ' bg-video" ' . $width_attr . ' ' . $height_attr . ' preload="metadata"  ' . $poster_tag . ' autoplay muted playsinline ' . $loop . '>
							<source src="' . $mp4_video . '" type="video/mp4" />
							Your browser does not support the video tag. 
							</video>';


				$output .= '</div>';


				if (!empty($pix_tilt)) {
					$output .= '</div>';
				}
				if (!empty($animation)) {
					$output .= '</div>';
				}
				if (!empty($pix_infinite_animation)) {
					$output .= '</div>';
				}
			}
			$output .= '</div>';
		} else {
			$output = '<div class="pix-p-20">No Selectd Video!</div>';
		}

		return $output;
	}
}
