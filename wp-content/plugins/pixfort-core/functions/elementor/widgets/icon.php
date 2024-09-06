<?php

namespace Elementor;

class Pix_Eor_Icon extends Widget_Base {

	public function __construct($data = [], $args = null) {
		$data = \PixfortCore::instance()->icons->verifyElementorData($data);
		parent::__construct($data, $args);
	}

	public function get_name() {
		return 'pix-icon';
	}

	public function get_title() {
		return 'Icon';
	}

	public function get_icon() {
		return 'eicon-star-o pixfort-elementor-element pixfort-elementor-icon';
	}

	public function get_categories() {
		return ['pixfort'];
	}

	public function get_help_url() {
		return 'https://essentials.pixfort.com/knowledge-base/';
	}

	protected function register_controls() {

		$colors = array(
			"Body default"			=> "body-default",
			"Heading default"		=> "heading-default",
			"Primary"				=> "primary",
			"Primary Gradient"		=> "gradient-primary",
			"Secondary"				=> "secondary",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Blue"					=> "blue",
			"Red"					=> "red",
			"Yellow"				=> "yellow",
			"Brown"					=> "brown",
			"Purple"				=> "purple",
			"Orange"				=> "orange",
			"Cyan"					=> "cyan",
			// "Transparent"					=> "transparent",
			"Gray 1"				=> "gray-1",
			"Gray 2"				=> "gray-2",
			"Gray 3"				=> "gray-3",
			"Gray 4"				=> "gray-4",
			"Gray 5"				=> "gray-5",
			"Gray 6"				=> "gray-6",
			"Gray 7"				=> "gray-7",
			"Gray 8"				=> "gray-8",
			"Gray 9"				=> "gray-9",
			"Dark opacity 1"		=> "dark-opacity-1",
			"Dark opacity 2"		=> "dark-opacity-2",
			"Dark opacity 3"		=> "dark-opacity-3",
			"Dark opacity 4"		=> "dark-opacity-4",
			"Dark opacity 5"		=> "dark-opacity-5",
			"Dark opacity 6"		=> "dark-opacity-6",
			"Dark opacity 7"		=> "dark-opacity-7",
			"Dark opacity 8"		=> "dark-opacity-8",
			"Dark opacity 9"		=> "dark-opacity-9",
			"Light opacity 1"		=> "light-opacity-1",
			"Light opacity 2"		=> "light-opacity-2",
			"Light opacity 3"		=> "light-opacity-3",
			"Light opacity 4"		=> "light-opacity-4",
			"Light opacity 5"		=> "light-opacity-5",
			"Light opacity 6"		=> "light-opacity-6",
			"Light opacity 7"		=> "light-opacity-7",
			"Light opacity 8"		=> "light-opacity-8",
			"Light opacity 9"		=> "light-opacity-9",
			"Custom"				=> "custom"
		);

		$bg_colors = array(
			"Primary"				=> "primary",
			"Primary Light"			=> "primary-light",
			"Primary Gradient"		=> "gradient-primary",
			"Primary Gradient Light"		=> "gradient-primary-light",
			"Secondary"				=> "secondary",
			"Secondary Light"		=> "secondary-light",
			"White"					=> "white",
			"Black"					=> "black",
			"Green"					=> "green",
			"Green Light"			=> "green-light",
			"Blue"					=> "blue",
			"Blue Light"			=> "blue-light",
			"Red"					=> "red",
			"Red Light"				=> "red-light",
			"Yellow"				=> "yellow",
			"Yellow Light"			=> "yellow-light",
			"Brown"					=> "brown",
			"Brown Light"			=> "brown-light",
			"Purple"				=> "purple",
			"Purple Light"			=> "purple-light",
			"Orange"				=> "orange",
			"Orange Light"			=> "orange-light",
			"Cyan"					=> "cyan",
			"Cyan Light"			=> "cyan-light",
			"Transparent"			=> "transparent",
			"Gray 1"				=> "gray-1",
			"Gray 2"				=> "gray-2",
			"Gray 3"				=> "gray-3",
			"Gray 4"				=> "gray-4",
			"Gray 5"				=> "gray-5",
			"Gray 6"				=> "gray-6",
			"Gray 7"				=> "gray-7",
			"Gray 8"				=> "gray-8",
			"Gray 9"				=> "gray-9",
			"Dark opacity 1"		=> "dark-opacity-1",
			"Dark opacity 2"		=> "dark-opacity-2",
			"Dark opacity 3"		=> "dark-opacity-3",
			"Dark opacity 4"		=> "dark-opacity-4",
			"Dark opacity 5"		=> "dark-opacity-5",
			"Dark opacity 6"		=> "dark-opacity-6",
			"Dark opacity 7"		=> "dark-opacity-7",
			"Dark opacity 8"		=> "dark-opacity-8",
			"Dark opacity 9"		=> "dark-opacity-9",
			"Light opacity 1"		=> "light-opacity-1",
			"Light opacity 2"		=> "light-opacity-2",
			"Light opacity 3"		=> "light-opacity-3",
			"Light opacity 4"		=> "light-opacity-4",
			"Light opacity 5"		=> "light-opacity-5",
			"Light opacity 6"		=> "light-opacity-6",
			"Light opacity 7"		=> "light-opacity-7",
			"Light opacity 8"		=> "light-opacity-8",
			"Light opacity 9"		=> "light-opacity-9",
			"Custom"				=> "custom"
		);

		$popup_posts = get_posts([
			'post_type' => 'pixpopup',
			'post_status' => 'publish',
			'numberposts' => -1
			// 'order'    => 'ASC'
		]);

		$popups = array();
		$popups[''] = "Disabled";
		foreach ($popup_posts as $key => $value) {
			$popups[$value->ID] = $value->post_title;
		}


		$this->start_controls_section(
			'section_title',
			[
				'label' => __('Content', 'elementor'),
			]
		);
		

		if (\PixfortCore::instance()->icons::$isEnabled) {
			$this->add_control(
				'media_type',
				[
					'label' => __('Icon type', 'pixfort-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => array_flip(array(
						"None" => "none",
						"Image" => "image",
						"Icon" => "icon",
						// "Duo tone icon" => "duo_icon",
						"Character" => "char"
					)),
					'default' => 'none',
				]
			);
			$this->add_control(
				'icon',
				[
					'label' => esc_html__('pixfort Icon', 'pixfort-core'),
					'type' => \Elementor\CustomControl\PixfortIconSelector_Control::PixfortIconSelector,
					'default' => '',
					'condition' => [
						'media_type' => 'icon',
					],
				]
			);
		} else {
			$this->add_control(
				'media_type',
				[
					'label' => __('Icon type', 'pixfort-core'),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => array_flip(array(
						"None" => "none",
						"Image" => "image",
						"Icon" => "icon",
						"Duo tone icon" => "duo_icon",
						"Character" => "char"
					)),
					'default' => 'none',
				]
			);
			$fontiocns_opts = array();
			$fontiocns_opts[''] = array('title' => 'None', 'url' => '');
			if (function_exists('vc_iconpicker_type_pixicons')) {
				$pixicons = vc_iconpicker_type_pixicons(array());
				foreach ($pixicons as $key) {
					// echo '<br />';
					$fontiocns_opts[array_keys($key)[0]] = array(
						'title'	=> array_keys($key)[0],
						'url'	=> array_keys($key)[0]
					);
				}
			}
			$this->add_control(
				'icon',
				[
					'label' => esc_html__('Icon', 'pixfort-core'),
					'type' => \Elementor\CustomControl\FonticonSelector_Control::FonticonSelector,
					'options'	=> $fontiocns_opts,
					'default' => '',
					'condition' => [
						'media_type' => 'icon',
					],
				]
			);
			require PIX_CORE_PLUGIN_DIR . '/functions/images/icons_list.php';
			$due_opts = array();
			foreach ($pix_icons_list as $key) {
				$due_opts[$key] = array(
					'title'	=> $key,
					'url'	=> PIX_CORE_PLUGIN_URI . 'functions/images/icons/' . $key . '.svg'
				);
			}
			$this->add_control(
				'pix_duo_icon',
				[
					'label' => esc_html__('Icon', 'pixfort-core'),
					'type' => \Elementor\CustomControl\IconSelector_Control::IconSelector,
					'options'	=> $due_opts,
					'default' => '',
					'condition' => [
						'media_type' => 'duo_icon',
					],
				]
			);
		}

	
		$this->add_control(
			'char',
			[
				'label' => __('Character', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('1', 'pixfort-core'),
				'placeholder' => __('', 'pixfort-core'),
				'condition' => [
					'media_type' => 'char',
				],
			]
		);


		


		$this->add_control(
			'image',
			[
				'label' => __('Image', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'media_type' => 'image',
				],
			]
		);
		$this->add_control(
			'link_type',
			[
				'label' => __('Link type', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'link'	=> 'Link',
					'popup'	=> 'Popup',
					'video'	=> 'Video',
					'embed'	=> 'Embed code',
				),
				'default' => 'link',
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __('Link', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('', 'pixfort-core'),
				'placeholder' => __('', 'pixfort-core'),
				'condition' => [
					'link_type' => 'link',
				],
			]
		);
		$this->add_control(
			'target',
			[
				'label' => __('Open in a new tab', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'link!' => ''
				],
			]
		);
		$this->add_control(
			'icon_popup_id',
			[
				'label' => __('Open Popup instead of link', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $popups,
				'default' => '',
				'condition' => [
					'link_type' => 'popup'
				],
			]
		);

		$this->add_control(
			'embed_code',
			[
				'label' => __('Embed Code', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::CODE,
				'condition' => [
					'link_type' => array('video', 'embed')
				],
			]
		);
		// $this->add_control(
		// 	'embed_code',
		// 	[
		// 		'label' => __( 'Embed Code', 'pixfort-core' ),
		// 		'type' => \Elementor\Controls_Manager::RAW_HTML,
		// 		'raw' => __( 'A very important message to show in the panel.', 'pixfort-core' ),
		// 		'content_classes' => 'your-class',
		// 		'condition' => [
		// 			'link_type' => array('video', 'embed')
		// 		],
		// 	]
		// );
		$this->add_control(
			'aspect',
			[
				'label' => __('Aspect ratio', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
					__('21:9 aspect ratio', 'pixfort-core') 	    => 'embed-responsive-21by9',
					__('16:9 aspect ratio', 'pixfort-core')	    => 'embed-responsive-16by9',
					__('4:3 aspect ratio', 'pixfort-core')	    => 'embed-responsive-4by3',
					__('1:1 aspect ratio', 'pixfort-core')	    => 'embed-responsive-1by1'
				)),
				'default' => 'embed-responsive-21by9',
				'condition' => [
					'link_type' => array('video', 'embed')
				],
			]
		);

		$this->add_control(
			'animation',
			[
				'label' => __('Animation', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => pix_get_animations(true),
			]
		);
		$this->add_control(
			'delay',
			[
				'label' => __('Animation delay (in miliseconds)', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('0', 'pixfort-core'),
				'placeholder' => __('', 'pixfort-core'),
				'condition' => [
					'animation!' => '',
				],
			]
		);

		$this->add_control(
			'content_align',
			[
				'label' => __('Content align', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'left'	=> 'Left',
					'center'	=> 'Center',
					'right'	=> 'Right',
					'inline'	=> 'inline',
				),
				'default' => 'left',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __('Icon format', 'pixfort-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);



		$this->add_control(
			'icon_color',
			[
				'label' => __('Icon color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'heading-default',
			]
		);

		$this->add_responsive_control(
			'custom_icon_color',
			[
				'label' => __('Custom Icon Color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_color' => 'custom',
				],
				'selectors' => [
					'{{WRAPPER}} svg path, {{WRAPPER}} svg rect, {{WRAPPER}} svg circle, {{WRAPPER}} svg polygon' => 'fill: {{VALUE}} !important;',
					'{{WRAPPER}}, {{WRAPPER}} i, {{WRAPPER}} span' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'has_icon_bg',
			[
				'label' => __('Background circle', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'media_type' => array("icon", "char", "duo_icon")
				],
			]
		);
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __('Icon Background color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($bg_colors),
				'default' => 'heading-default',
				'condition' => [
					'has_icon_bg!' => []
				],
			]
		);

		$this->add_control(
			'icon_custom_bg_color',
			[
				'label' => __('Custom Icon Background Color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_bg_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label' => __('Icon Size (without unit)', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('30', 'pixfort-core'),
				'placeholder' => __('', 'pixfort-core'),
				'condition' => [
					'media_type' => array("icon", "char", "duo_icon")
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'image_section',
			[
				'label' => __('Image format', 'pixfort-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'media_type' => array("image")
				],
			]
		);
		$this->add_control(
			'image_size',
			[
				'label' => __('Image Size (with unit)', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('', 'pixfort-core'),
				'placeholder' => __('Leave empty for full size.', 'pixfort-core'),

			]
		);
		$this->add_control(
			'circle',
			[
				'label' => __('Circle image', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->end_controls_section();
		pix_get_elementor_effects($this);
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo \PixfortCore::instance()->elementsManager->renderElement('Icon', $settings);
	}

	public function get_script_depends() {
		if (is_user_logged_in()) return ['pix-global'];
		return [];
	}
}
