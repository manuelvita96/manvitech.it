<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/* ---------------------------------------------------------------------------
 * CardWide
* --------------------------------------------------------------------------- */
class PixCardWide {

	function render($attr, $content = null) {
		extract(shortcode_atts(array(
			'title'                 => '',
			'text'                  => '',
			'image'                 => '',
			'link_text'             => '',
			'layout'                => 'wide_card_rightt',
			'feature_image'         => '',
			'feature_image_width'   => '',
			'style'                 => '',
			'hover_effect'          => '',
			'add_hover_effect'      => '',
			'rounded_img'           => 'rounded-lg',
			'link'                  => '',
			'target'                => '',
			'bold'                  => 'font-weight-bold',
			'italic'                => '',
			'secondary_font'        => '',
			'color'                 => 'heading-default',
			'custom_color'          => '',
			'title_size'            => 'h5',
			'title_custom_size'     => '',
			'text_bold'             => 'font-weight-bold',
			'text_italic'           => '',
			'text_secondary_font'   => '',
			'text_color'            => 'body-default',
			'text_custom_color'     => '',
			'text_size'             => '',
			'animation'             => '',
			'delay'                 => '0',
			'extra_classes'         => '',
			'css'                   => '',
		), $attr));

		$custom_link_atts = '';
		if (!empty($link) && is_array($link)) {
			if (!empty($link['is_external'])) {
				$target = $link['is_external'];
			}
			if (!empty($link['custom_attributes'])) {
				$l_atts = explode(",", $link['custom_attributes']);
				foreach ($l_atts as $key => $value) {
					$l_att = explode("|", $value);
					$custom_link_atts .= $l_att[0] . '="' . $l_att[1] . '" ';
				}
			}
			if (!empty($link['nofollow']) && $link['nofollow']) {
				$custom_link_atts .= 'rel="nofollow"';
			}
			$link = $link['url'];
		}

		$linkTarget = '';
		if (!empty($target)) {
			$linkTarget = 'target="_blank"';
		}

		$css_class = '';
		if (function_exists('vc_shortcode_custom_css_class')) {
			$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));
		}
		$css_class .= ' ' . $extra_classes;
		$classes = ' ';
		$classes .= esc_attr($css_class) . ' ';

		
		$classes .= \PixfortCore::instance()->coreFunctions->getEffectsClasses($style, $hover_effect, $add_hover_effect) . ' ';

		$title_classes = pix_get_text_format_classes($bold, $italic, $secondary_font, $color);
		$text_classes = pix_get_text_format_classes($text_bold, $text_italic, $text_secondary_font, $text_color);

		$text_classes .= ' ' . $text_size;

		$title_style = '';
		$text_style = '';
		if ($color == 'custom') {
			$title_style = 'color:' . $custom_color . ';';
		}
		if ($text_color == 'custom') {
			$text_style = 'style="color:' . $text_custom_color . ';"';
		}

		$title_tag = 'h6';
		if (!empty($title_size)) {
			if ($title_size == 'custom') {
				$title_style .= 'font-size:' . $title_custom_size . ';';
			} else {
				$title_tag = $title_size;
			}
		}
		$title_style = 'style="' . $title_style . '"';

		$title = str_replace("``", "\"", $title);
		$text = str_replace("``", "\"", $text);

		$anim_attrs = '';
		if (!empty($animation)) {
			$classes .= ' animate-in ';
			$anim_attrs = 'data-anim-delay="' . $delay . '" data-anim-type="' . $animation . '"';
		}

		$output = '';


		$out_img = '';
		if (!empty($image)) {
			$imgSrc = '';
			if (is_string($image) && substr($image, 0, 4) === "http") {
				$imgSrc = $image;
			} else {
				if (!empty($image['id'])) {
					if ( is_int( $image['id'] ) ) {
						$image['id'] = apply_filters( 'wpml_object_id', $image['id'], 'attachment', true );
					}
					$img = wp_get_attachment_image_src($image['id'], "full");
				} else {
					if ( is_int( $image ) ) {
						$image = apply_filters( 'wpml_object_id', $image, 'attachment', true );
					}
					$img = wp_get_attachment_image_src($image, "full");
				}
				if (!empty($img[0])) {
					$imgSrc = $img[0];
				}
			}
			$out_img .= '<div class="flex-column col-md-6">';
			$out_img .= '<img class="card-img rounded-0 pix-fit-cover flex-grow-1 h-100" src="' . $imgSrc . '" alt="' . $title . '" />';
			$out_img .= '</div>';
		}

		$out_body = '';
		$out_body .= '<div class="card-body d-flex align-content-between flex-wrap col-md-6 p-lg-5 p-md-5 p-4">';
		$out_body .= '<div class="d-flex align-items-start">';
		$out_body .= '<div>';
		if (!empty($feature_image)) {
			$imgSrc = '';
			$imgWidth = '';
			$imgHeight = '';
			if (is_string($feature_image) && substr($feature_image, 0, 4) === "http") {
				$imgSrc = $feature_image;
			} else {
				if (!empty($feature_image['id'])) {
					if ( is_int( $feature_image['id'] ) ) {
						$feature_image['id'] = apply_filters( 'wpml_object_id', $feature_image['id'], 'attachment', true );
					}
					$img = wp_get_attachment_image_src($feature_image['id'], "full");
				} else {
					if ( is_int( $feature_image ) ) {
						$feature_image = apply_filters( 'wpml_object_id', $feature_image, 'attachment', true );
					}
					$img = wp_get_attachment_image_src($feature_image, "full");
					
				}
				if (!empty($img[0])) {
					$imgSrc = $img[0];
				}
				if (!empty($img[1]) && !empty($img[2])) {
					$imgWidth = 'width="' . $img[1] . '"';
					$imgHeight = 'height="' . $img[2] . '"';
				}
			}
			$fwidth = '';
			if (!empty($feature_image_width)) {
				$fwidth = 'max-width:' . $feature_image_width . ';';
			}
			if (!empty($imgSrc)) {
				$out_body .= '<img class="mb-3" src="' . $imgSrc . '" alt="" ' . $imgWidth . ' ' . $imgHeight . ' style="width:auto;' . $fwidth . '"  decoding="async" />';
			}
		}
		$out_body .= '<' . $title_tag . ' ' . $title_style . ' class="' . $title_classes . ' mb-3">' . do_shortcode($title) . '</' . $title_tag . '>';
		$out_body .= '</div>';
		$out_body .= '</div>';
		$out_body .= '<div class="d-flex align-items-end">';
		$out_body .= '<div>';
		$out_body .= '<p class="' . $text_classes . ' text-left mb-0" ' . $text_style . '>' . do_shortcode($text) . '</p>';
		$out_body .= '</div>';
		$out_body .= '</div>';
		$out_body .= '</div>';

		if (!empty($link)) {
			$output .= '<a ' . $linkTarget . ' ' . $custom_link_atts . ' href="' . $link . '">';
		}
		$output .= '<div class="card ' . $rounded_img . ' overflow-hidden row no-gutters flex-column flex-md-row flex-md-row-reverse ' . $classes . '" ' . $anim_attrs . '>';

		if ($layout == 'wide_card_left') {
			$output .= $out_body;
			$output .= $out_img;
		} else {
			$output .= $out_img;
			$output .= $out_body;
		}

		$output .= '</div>';
		if (!empty($link)) {
			$output .= '</a>';
		}
		return $output;
	}
}
