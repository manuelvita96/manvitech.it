<?php

namespace Elementor;

class Pix_Eor_Feature extends Widget_Base {

	public function __construct($data = [], $args = null) {
		$data = \PixfortCore::instance()->icons->verifyElementorData($data);
		parent::__construct($data, $args);
	}

	public function get_name() {
		return 'pix-feature';
	}

	public function get_title() {
		return 'Feature';
	}

	public function get_icon() {
		return 'eicon-icon-box pixfort-elementor-element pixfort-elementor-feature';
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
		$this->start_controls_section(
			'section_title',
			[
				'label' => __('Content', 'elementor'),
			]
		);


		$this->add_control(
			'title',
			[
				'label' => __('Title', 'elementor'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('', 'elementor'),
				'default' => '',
				'dynamic'     => array(
					'active'  => true
				),
			]
		);
		$this->add_control(
			'content',
			[
				'label' => __('Content', 'elementor'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Content text', 'elementor'),
				'default' => 'Insert your content here',
				'dynamic'     => array(
					'active'  => true
				),
			]
		);

		
		$this->add_control(
			'image',
			[
				'label' => __('Image', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic'     => array(
					'active'  => true
				),
				'condition' => [
					'media_type' => 'image',
				],
			]
		);

		if(\PixfortCore::instance()->icons::$isEnabled) {
			$this->add_control(
				'media_type',
				[
					'label' => __('Use image or icon', 'pixfort-core'),
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
					'label' => __('Use image or icon', 'pixfort-core'),
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
			'icon_position',
			[
				'label' => __('Icon Position', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'top'	=> 'Top',
					'left'	=> 'Side',
				),
				'default' => 'heading-default',
				'condition' => [
					'media_type' => array("icon", "image", "char", "duo_icon")
				],
			]
		);


		$this->add_control(
			'link',
			[
				'label' => __('Link', 'elementor'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('', 'elementor'),
			]
		);
		$this->add_control(
			'target',
			[
				'label' => __('Open in a new tab', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'Yes',
				'condition' => [
					'link!' => '',
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



		$this->end_controls_section();


		$this->start_controls_section(
			'title_section',
			[
				'label' => __('Title format', 'pixfort-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_size',
			[
				'label' => __('Title size', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
					__('H1', 'pixfort-core') 	=> 'h1',
					__('H2', 'pixfort-core')	    => 'h2',
					__('H3', 'pixfort-core')	    => 'h3',
					__('H4', 'pixfort-core')	    => 'h4',
					__('H5', 'pixfort-core')	    => 'h5',
					__('H6', 'pixfort-core')	    => 'h6',
					__('Custom', 'pixfort-core')	    => 'custom',
				)),
				'default' => 'h5',
			]
		);
		$this->add_control(
			'title_custom_size',
			[
				'label' => __('Custom Title size', 'elementor'),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter custom title size', 'elementor'),
				'default' => '',
				'condition' => [
					'title_size' => 'custom',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __('Title color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'heading-default',
			]
		);
		$this->add_control(
			'title_custom_color',
			[
				'label' => __('Custom Title color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'title_color' => 'custom',
				],
			]
		);


		$this->add_control(
			'title_bold',
			[
				'label' => __('Bold', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'font-weight-bold',
				'default' => 'font-weight-bold',
			]
		);
		$this->add_control(
			'title_italic',
			[
				'label' => __('Italic', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'font-italic',
				'default' => '',
			]
		);
		$this->add_control(
			'title_secondary',
			[
				'label' => __('Secondary font', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'secondary-font',
				'default' => '',
			]
		);
		$this->add_control(
			'padding_title',
			[
				'label' => __('Padding before title', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('20px', 'pixfort-core'),
				'placeholder' => __('', 'pixfort-core'),
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'content_section',
			[
				'label' => __('Content format', 'pixfort-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __('Content color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'text-gray',
			]
		);
		$this->add_control(
			'content_custom_color',
			[
				'label' => __('content_custom_color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'content_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'content_size',
			[
				'label' => __('Text size', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					''			=> 'Default (16px)',
					'text-xs'		=> '12px',
					'text-sm'		=> '14px',
					'text-sm'		=> '14px',
					'text-18' 		=> '18px',
					'text-20' 		=> '20px',
					'text-24' 		=> '24px',
				),
				'default' => '',
			]
		);

		$this->add_control(
			'content_bold',
			[
				'label' => __('Bold', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'font-weight-bold',
				'default' => 'font-weight-bold',
			]
		);
		$this->add_control(
			'content_italic',
			[
				'label' => __('Italic', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'font-italic',
				'default' => '',
			]
		);
		$this->add_control(
			'content_secondary_font',
			[
				'label' => __('Secondary font', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'secondary-font',
				'default' => '',
			]
		);
		$this->add_control(
			'justify',
			[
				'label' => __('Justify Content', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => '1',
				'default' => '',
			]
		);
		$this->add_control(
			'padding_content',
			[
				'label' => __('Padding before content', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('20px', 'pixfort-core'),
				'placeholder' => __('', 'pixfort-core'),
			]
		);
		$this->add_responsive_control(
			'content_align',
			[
				'label' => __('Content align', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'left'	=> 'Start',
					'center'	=> 'Center',
					'right'	=> 'End',
				),
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .pix-feature-el' => 'text-align: {{value}} !important;',
				],
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

		$this->add_control(
			'custom_icon_color',
			[
				'label' => __('Custom Icon Color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_color' => 'custom',
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
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$settings['content_align'] = 'custom';
		echo \PixfortCore::instance()->elementsManager->renderElement('Feature', $settings, $settings['content'] );
	}

	public function get_script_depends() {
		if (is_user_logged_in()) return ['pix-global'];
		return [];
	}
}
