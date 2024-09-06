<?php

add_action('vc_before_init', 'pix_vc_params');
if (!function_exists('pix_vc_params')) {
	function pix_vc_params() {

		function pixfort_param_icons_picker( $settings, $value ) {
			require PIX_CORE_PLUGIN_DIR . '/includes/icons/pixfort-icons-list.php';
			$opts_out = '';
			
			$value = \PixfortCore::instance()->icons->verifyIconName($value);
			// if(!empty($value)&&strpos($value, '/') === false){
				//     require PIXFORT_PLUGIN_DIR . '/functions/icons/mapping.php';
				//     if(!empty($pixfort_icons[$value])){
					//         $value = $pixfort_icons[$value];
					//     }
					// }
					
					// foreach ($pixfortIconsList as $key) {
						//     $opts_out .= '<div class="pix_param_icon pixfort_param_icon" title="Line/'.$key.'" data-val="Line/'.$key.'">'.PixfortIcons::instance()->getIcon('Line/'.$key).'</div>';
						// }
						
						
						$isPixfortIcons = true;                    
						if(!\PixfortCore::instance()->icons::$isEnabled) {
							$isPixfortIcons = false;
							require PIX_CORE_PLUGIN_DIR . '/functions/images/icons_list.php';
							$due_opts = array();
							foreach ($pix_icons_list as $key) {
								$due_opts[$key] = array(
									'id'	=> $key,
									'url'	=> PIX_CORE_PLUGIN_URI . 'functions/images/icons/' . $key . '.svg'
								);
							}
							$pixicons = vc_iconpicker_type_pixicons(array());
						} 
						

			
			$opts_out .= '<div class="pixfort-icons-selector-wrapper is-light-version">';
			$opts_out .= '<div class="pixfort-icons-filter">';
			$opts_out .= '<a href="#" data-type="line" class="pixfort-icons-filter-tab is-selected">';
					if (!$isPixfortIcons) {
						$opts_out .= '<i class="pixicon-lightning-2"></i>';
						$opts_out .= 'Fonticon';
					} else { 
						$opts_out .= '<svg class="pixfort-tab-icon" width="24" height="24" viewBox="2 2 20 20"><path fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="var(--pf-icon-stroke-width)" d="M16.7777778,5 L11.3333333,13.5555556 L15.2222222,13.5555556 L15.2222222,19 L20.6666667,10.4444444 L16.7777778,10.4444444 L16.7777778,5 Z M11,7 L5,7 M8,12 L3,12 M11,17 L5,17"></path></svg>';
						$opts_out .= 'Line';
					}
					$opts_out .= '</a>';
					$opts_out .= '<a href="#" data-type="duotone" class="pixfort-icons-filter-tab">';
					$opts_out .= '<svg class="pixfort-tab-icon" width="24" height="24" viewBox="2 2 20 20"><g fill="none" fill-rule="evenodd"><path fill="currentcolor" fill-opacity=".25" d="M11,6 C11.5522847,6 12,6.44771525 12,7 C12,7.55228475 11.5522847,8 11,8 L5,8 C4.44771525,8 4,7.55228475 4,7 C4,6.44771525 4.44771525,6 5,6 L11,6 Z M8,11 C8.55228475,11 9,11.4477153 9,12 C9,12.5522847 8.55228475,13 8,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 L8,11 Z M11,16 C11.5522847,16 12,16.4477153 12,17 C12,17.5522847 11.5522847,18 11,18 L5,18 C4.44771525,18 4,17.5522847 4,17 C4,16.4477153 4.44771525,16 5,16 L11,16 Z"></path><path fill="currentcolor" d="M16.1759581,4.43347118 L10.6759581,12.4334712 L10.6170624,12.5297632 C10.2657894,13.1809277 10.7331624,14 11.5,14 L13.999,14 L14,19 C14,19.9713329 15.2451104,20.3723733 15.8120154,19.583636 L21.5620154,11.583636 L21.6235586,11.487482 C21.9917133,10.8363437 21.5259261,10 20.75,10 L17.999,10 L18,5 C18,4.01795609 16.7323143,3.62422582 16.1759581,4.43347118 Z"></path></g></svg>';
					$opts_out .= 'Duotone';
					$opts_out .= '</a>';
					if ($isPixfortIcons) {
						$opts_out .= '<a href="#" data-type="solid" class="pixfort-icons-filter-tab">';
						$opts_out .= '<svg class="pixfort-tab-icon" width="24" height="24" viewBox="2 2 20 20"><g stroke="none" stroke-width="2" fill="none" fill-rule="evenodd"><path d="M4.33633384,13.6197227 C6.03197049,13.5008459 7.78320544,13.4748351 9.86924861,13.5216787 L11.0419727,13.5543348 C11.2738378,13.5609275 11.5008327,13.5902402 11.811451,13.646005 C12.9149249,13.8417411 13.3031851,14.591513 13.4225948,15.9182242 L13.4600497,16.3979404 C13.5367334,17.408537 13.5031377,18.4180682 13.358615,19.4077478 C13.1861732,20.6264663 12.7489153,21.2871601 11.6630627,21.3641014 C10.1948682,21.4726798 9.23333435,21.5149794 8.22186314,21.4958602 L8.162,21.489 L6.15997446,21.4527604 L5.53962935,21.4455315 C4.86593372,21.4360474 4.51791738,21.4092558 4.08727925,21.31861 C3.1088227,21.1163351 2.72940552,20.4229631 2.59860275,19.2686264 L2.55685059,18.8299088 C2.45017372,17.5817031 2.49409779,16.3354809 2.68969654,15.1326559 C2.83495927,14.2447929 3.44961397,13.6775416 4.33633384,13.6197227 Z M6.50769698,17.015173 L6.50769698,17.984827 C6.50769698,18.7223379 7.27879989,19.2061085 7.94282982,18.8851933 L8.92743587,18.4093487 C9.67446416,18.0483216 9.68225661,16.9870607 8.94061035,16.6151029 L7.9560043,16.1212935 C7.29103252,15.7877902 6.50769698,16.2712564 6.50769698,17.015173 Z M20.9875533,4.5 C21.2636956,4.5 21.4875533,4.72385763 21.4875533,5 L21.4875533,7.25209056 C21.4875533,7.52823293 21.2636956,7.75209056 20.9875533,7.75209056 L19.6144842,7.75185002 C19.5140873,7.75930473 19.4946183,7.79358756 19.4919721,7.92576691 L19.49,8.781 L21,8.78100688 C21.2670272,8.78100688 21.4811871,8.98907103 21.4988718,9.24580481 L21.4972929,9.33296666 L21.2620221,11.5846785 C21.235416,11.8393188 21.0207557,12.0327188 20.7647293,12.0327188 L19.489,12.032 L19.489814,17.9304726 C19.489814,18.1759325 19.3129389,18.380081 19.0796897,18.422417 L18.989814,18.4304726 L16.4509484,18.4304726 C16.174806,18.4304726 15.9509484,18.206615 15.9509484,17.9304726 L15.95,12.033 L15.1216314,12.0330974 C14.8761716,12.0330974 14.6720231,11.8562223 14.6296871,11.6229731 L14.6216314,11.5330974 L14.6216314,9.28118361 C14.6216314,9.00504123 14.8454891,8.78118361 15.1216314,8.78118361 L15.95,8.781 L15.9509484,7.92938901 C15.9509484,5.73573421 16.8647573,4.57857185 18.9882424,4.50386509 L19.2122405,4.5 Z M9.92359756,2.5 C10.5064592,2.5 11.0595705,2.69456706 11.50384,3.04046001 L11.582,3.106 L11.7653415,3.08625771 C11.98819,3.05936363 12.1555225,3.00866087 12.5194206,2.83384166 C12.9159799,2.64333182 13.3475369,3.02090941 13.2113918,3.43926067 C13.0708351,3.87116779 12.8298444,4.43002971 12.5558247,4.96550458 L12.48,5.108 L12.4823984,5.25376 C12.4823984,8.49971181 9.97702263,11.3697384 6.39105398,11.4956922 L6.131,11.499 L5.83997235,11.492698 C4.82713235,11.4450503 3.85562354,11.1606478 2.98973116,10.6691715 L2.73319623,10.5155461 C2.28333054,10.2317072 2.52900246,9.53491213 3.0574091,9.59598674 C3.20064246,9.61254202 3.34474723,9.62078095 3.48939024,9.62066 C4.06747795,9.62066 4.62403435,9.48815909 5.1237544,9.24060852 L5.17,9.215 L5.04045534,9.10887178 C2.96953429,7.37663323 2.62782682,5.95724752 3.10147803,3.73046459 L3.20839941,3.25859518 C3.30056246,2.85428392 3.81650581,2.73142971 4.08099283,3.05081699 C4.86248882,3.99453012 5.94671397,4.64133396 7.15650169,4.8824025 L7.375,4.92 L7.37724599,4.85348976 C7.4601815,3.5929267 8.48195104,2.58699131 9.75603784,2.50535183 L9.92359756,2.5 Z" fill="currentcolor"></path></g></svg>';
						$opts_out .= 'Social';
						$opts_out .= '</a>';
					}
					$opts_out .= '</div>';
					$opts_out .= '<input type="text" class="pixfort-selector-search" placeholder="Search..." />';
					$opts_out .= '<div class="pixfort-icons-selector-icons">';
				
				if (!$isPixfortIcons) {
					foreach ($pixicons as $key) {
						$opts_out .= '<i class="icon-item type-hidden type-line '. array_keys($key)[0] .'" data-id="'. array_keys($key)[0] .'" data-name="'.  array_keys($key)[0] .'"></i>';
					}
					foreach ($due_opts as $icon) { 
						$opts_out .= '<img class="icon-item type-hidden type-duotone" data-id="'. $icon['id'] .'" data-name="'. $icon['id'] .'" loading="lazy" height="34" width="34" src="'. $icon['url'] .'" alt="'. $icon['id'] .'">';
					}
					if(!empty($settings['has_empty'])&&$settings['has_empty']){
						$opts_out .= '<i class="icon-item type-hidden type-line" data-id="" data-name=""></i>';
						$opts_out .= '<i class="icon-item type-hidden type-duotone" data-id="" data-name=""></i>';
					}
				} else {
					if(!empty($settings['has_empty'])&&$settings['has_empty']){
						$opts_out .= '<span data-id="" data-name="" class="icon-item pixfort-icon type-hidden type-line" width="24" height="24"></span>';
						$opts_out .= '<span data-id="" data-name="" class="icon-item pixfort-icon type-hidden type-duotone" width="24" height="24"></span>';
					}
				}
				
				
				$opts_out .= '</div>';
				$opts_out .= '</div>';
			
	//         $options = ' <div class="inputs">
	//     <select class="form-control switch-type">
	//       <option value="">Line</option>
	//       <option value="duotone">Duotone</option>
	//       <option value="Duocolor">Duocolor</option>
	//     </select>
	//   </div>';

		 return '<div class="pix_param_block pixfort_icon_picker_container pix_param_icon_out '.$settings['class'].'">'.
		 
		 '<div class="pixfort_icon_picker_container_options">'.
			$opts_out.
			'</div>'.
			 '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
			 esc_attr( $settings['param_name'] ) . ' ' .
			 esc_attr( $settings['type'] ) . '_field" type="text" value="' . esc_attr( $value ) . '" />'
			 .'</div>';
		}

		vc_add_shortcode_param('pixfort_icons_picker', 'pixfort_param_icons_picker', PIX_CORE_PLUGIN_URI .'/functions/js/params/pixfortIcons.js');



		function pix_param_icons_select($settings, $value) {
			// var_dump($value);
			require dirname(__FILE__) . '/images/icons_list.php';
			$opts_out = '';
			foreach ($pix_icons_list as $key) {
				$opts_out .= '<div class="pix_param_icon" title="' . $key . '" data-val="' . $key . '"><img src="' . PIX_CORE_PLUGIN_URI . 'functions/images/icons/' . $key . '.svg" /></div>';
			}
			return '<div class="pix_param_block pix_param_icon_out ' . $settings['class'] . '">' .
				'<div style="pading-bottom:5px;"><input type="text" class="pix_param_icons_search" placeholder="Search..." /></div>' .
				'<div class="pix_param_icon_container">' .
				$opts_out .
				'</div>' .
				'<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
				esc_attr($settings['param_name']) . ' ' .
				esc_attr($settings['type']) . '_field" type="hidden" value="' . esc_attr($value) . '" />'
				. '</div>';
		}

		vc_add_shortcode_param('pix_icons_select', 'pix_param_icons_select', PIX_CORE_PLUGIN_URI . '/functions/js/params/icons.js');


		function pix_param_img_select($settings, $value) {

			$opts_out = '';
			$dividersCount = 26;
			for ($x = 1; $x <= $dividersCount; $x++) {
				$opts_out .= '<div class="pix_param_img" data-val="' . $x . '"><img src="' . PIX_CORE_PLUGIN_URI . 'functions/images/shapes/divider-' . $x . '.png" /></div>';
			}
			return '<div class="pix_param_block ' . $settings['class'] . '">' .
				'<div class="pix_param_img selected" data-val="0"><img src="' . PIX_CORE_PLUGIN_URI . 'functions/images/shapes/none.png" /></div>' .
				'<div class="pix_param_img" data-val="dynamic"><img src="' . PIX_CORE_PLUGIN_URI . 'functions/images/shapes/divider-dynamic.gif" /></div>' .
				$opts_out .

				'<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
				esc_attr($settings['param_name']) . ' ' .
				esc_attr($settings['type']) . '_field" type="hidden" value="' . esc_attr($value) . '" />'
				. '</div>';
		}

		vc_add_shortcode_param('pix_img_select', 'pix_param_img_select', PIX_CORE_PLUGIN_URI . '/functions/js/params/shapes.js');



		function pix_param_title($settings, $value) {

			return '<div class="pix_param_block">' .

				esc_attr($settings['param_name']) .

				'<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
				esc_attr($settings['param_name']) . ' ' .
				esc_attr($settings['type']) . '_field" type="hidden" value="' . esc_attr($value) . '" />'
				. '</div>';
		}

		vc_add_shortcode_param('pix_title', 'pix_param_title');


		function pix_param_globals($settings, $value) {

			return '<div class="pix_param_block">' .
				'<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
				esc_attr($settings['param_name']) . ' ' .
				esc_attr($settings['type']) . '_field" type="hidden" value="' . esc_attr($value) . '" />'
				. '</div>';
		}

		vc_add_shortcode_param('pix_param_globals', 'pix_param_globals', PIX_CORE_PLUGIN_URI . '/functions/js/params/global.js');


		function pix_param_section($settings, $value) {

			return '<div class="pix_param_block">' .
				'<div class="pix_param_section"><hr /><h3><strong>' . $settings['pix_title'] . '</strong></h3></div>' .

				'<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
				esc_attr($settings['param_name']) . ' ' .
				esc_attr($settings['type']) . '_field" type="hidden" value="' . esc_attr($value) . '" />'
				. '</div>';
		}

		vc_add_shortcode_param('pix_param_section', 'pix_param_section');

		function pix_param_section_notice($settings, $value) {

			return '<div class="pix_param_block">' .
				'<div class="pix_param_section"><h4>' . $settings['pix_title'] . '</h4></div>' .

				'<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
				esc_attr($settings['param_name']) . ' ' .
				esc_attr($settings['type']) . '_field" type="hidden" value="' . esc_attr($value) . '" />'
				. '</div>';
		}

		vc_add_shortcode_param('pix_param_section_notice', 'pix_param_section_notice');



		function pix_responsive_css($settings, $value) {
			$props = array('pt', 'pr', 'pb', 'pl', 'mt', 'mr', 'mb', 'ml');

			$opts_out = '<div class="pix_responsive_css_param">';

				$opts_out .= '<div class="pix_responsive_nav">';
					$opts_out .= '<a href="#" class="pix_responsive_nav_item is-active" data-link="#tablet-' . esc_attr($settings['param_name']) . '">' . esc_attr__('Tablet', 'pixfort-core') . '</a>';
					$opts_out .= '<a href="#" class="pix_responsive_nav_item" data-link="#mobile-' . esc_attr($settings['param_name']) . '">' . esc_attr__('Mobile', 'pixfort-core') . '</a>';

				$opts_out .= '</div>';

				$opts_out .= '<div id="mobile-' . esc_attr($settings['param_name']) . '" class="pix_responsive_tab ">';
					$opts_out .= '<div class="pix-responsive-layout-opts">';
						$opts_out .= '<div class="pix_margin_square"><span>' . esc_attr__('Margin', 'pixfort-core') . '</span></div>';
						$opts_out .= '<div class="pix_padding_square"><span>' . esc_attr__('Padding', 'pixfort-core') . '</span></div>';
						foreach ($props as $prop) {
							$opts_out .= '<div class="grid_item pix_res_' . $prop . '"><input type="text" placeholder="-" class="pix_responsive_css_field" name="pix_res_sm_' . $prop . '" /></div>';
						}
					$opts_out .= '</div>';
				$opts_out .= '</div>';

				$opts_out .= '<div id="tablet-' . esc_attr($settings['param_name']) . '" class="pix_responsive_tab show">';
					$opts_out .= '<div class="pix-responsive-layout-opts">';
						$opts_out .= '<div class="pix_margin_square"><span>' . esc_attr__('Margin', 'pixfort-core') . '</span></div>';
						$opts_out .= '<div class="pix_padding_square"><span>' . esc_attr__('Padding', 'pixfort-core') . '</span></div>';
						foreach ($props as $prop) {
							$opts_out .= '<div class="grid_item pix_res_' . $prop . '"><input type="text" placeholder="-" class="pix_responsive_css_field" name="pix_res_md_' . $prop . '" /></div>';
						}
					$opts_out .= '</div>';
				$opts_out .= '</div>';

			$opts_out .= '</div>';

			if (empty($settings['class'])) $settings['class'] = '';
			return '<div class="pix_param_block ' . $settings['class'] . '">' .

				$opts_out .

				'<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value pix_res_css_val ' .
				esc_attr($settings['param_name']) . ' ' .
				esc_attr($settings['type']) . '_field" type="hidden" value="' . esc_attr($value) . '" />'
				. '</div>';
		}

		vc_add_shortcode_param('pix_responsive_css', 'pix_responsive_css', PIX_CORE_PLUGIN_URI . '/functions/js/params/responsive.js');
	}



	function pix_gradient_picker($settings, $value) {
		$out = '';
		$out .= '<div class="pix-gradient-picker-container">';
		$out .= '<div class="pix-gradient-picker-el"></div>';
		$out .= ' <div class="inputs">
            <select class="form-control switch-type">
              <option value="">- Select Type -</option>
              <option value="radial">Radial</option>
              <option value="linear">Linear</option>
              <option value="repeating-radial">Repeating Radial</option>
              <option value="repeating-linear">Repeating Linear</option>
            </select>

            <select class="form-control switch-angle">
              <option value="">- Select Direction -</option>
              <option value="top">Top</option>
              <option value="right">Right</option>
              <option value="center">Center</option>
              <option value="bottom">Bottom</option>
              <option value="left">Left</option>
              <option value="45deg">Top Right</option>
              <option value="135deg">Bottom Right</option>
            </select>
          </div>';
		$out .= '<div class="pix-gradient-picker-label">' . esc_attr__('Preview', 'pixfort-core') . ':</div>';
		$out .= '<div class="pix-gradient-picker-preview-container"><div class="pix-gradient-picker-preview"></div></div>';
		$out .= '</div>';
		return '<div class="pix_param_block pix-gradient-picker-block">' . $out .
			'<div class="pix-gradient-picker-label">' . esc_attr__('Gradient CSS output', 'pixfort-core') . ':</div>' .
			'<input name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value pix_param_val wpb-textinput ' .
			esc_attr($settings['param_name']) . ' ' .
			esc_attr($settings['type']) . '_field" type="text" value="' . esc_attr($value) . '" />'
			. '</div>';
	}
	vc_add_shortcode_param('pix_gradient_picker', 'pix_gradient_picker', PIX_CORE_PLUGIN_URI . '/functions/js/params/picker.js');
}
