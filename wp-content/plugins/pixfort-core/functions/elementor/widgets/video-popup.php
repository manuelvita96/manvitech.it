<?php
namespace Elementor;

class Pix_Eor_Video_Popup extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		// wp_register_script( 'pix-video-popup-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/video-popup.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-video-popup';
	}

	public function get_title() {
		return 'Video Popup';
	}

	public function get_icon() {
		return 'eicon-video-playlist pixfort-elementor-element pixfort-elementor-video-popup';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	public function get_help_url() {
		return 'https://essentials.pixfort.com/knowledge-base/';
	}

	protected function register_controls() {

		$colors_no_custom = array(
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
				'label' => __( 'Content', 'elementor' ),
			]
		);
		$this->add_control(
			'embed_code',
			[
				'label' => __( 'Embed Code', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::CODE,
				'dynamic'     => array(
					'active'  => true
				),

			]
		);
		$this->add_control(
			'is_elementor',
			[
				'label' => __( 'View', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::HIDDEN,
				'default' => 'true',
			]
		);


		$this->add_control(
			'aspect',
			[
				'label' => __( 'Aspect ratio', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
					__('21:9 aspect ratio','pixfort-core') 	    => 'embed-responsive-21by9',
					__('16:9 aspect ratio','pixfort-core')	    => 'embed-responsive-16by9',
					__('4:3 aspect ratio','pixfort-core')	    => 'embed-responsive-4by3',
					__('1:1 aspect ratio','pixfort-core')	    => 'embed-responsive-1by1'
				)),
				'default' => 'embed-responsive-21by9',

			]
		);
		$this->add_control(
			'animation',
			[
				'label' => __( 'Animation', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => pix_get_animations(true),
			]
		);
		$this->add_control(
			'delay',
			[
				'label' => __( 'Animation delay (in miliseconds)', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '0', 'pixfort-core' ),
				'placeholder' => __( '', 'pixfort-core' ),
				'condition' => [
					'animation!' => '',
				],
			]
		);



		$this->add_control(
			'text_color',
			[
				'label' => __( 'Icon color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors_no_custom),
				'default' => 'primary',

			]
		);


		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Background color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($bg_colors),
				'default' => 'white',

			]
		);
		$this->add_control(
			'custom_bg_color',
			[
				'label' => __( 'Text Icon color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'bg_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'size',
			[
				'label' => __( 'Button size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '100', 'pixfort-core' ),
				'placeholder' => __( 'size in pixels (without writing the unit.)', 'pixfort-core' ),
			]
		);

		$this->add_control(
			'icon_style',
			[
				'label' => __( 'Icon style', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
					__('Filled','pixfort-core')	    => 'due',
					__('Outline','pixfort-core') 	    => 'line',
				)),
				'default' => 'due',

			]
		);
		$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo \PixfortCore::instance()->elementsManager->renderElement('VideoPopup', $settings );
	}


	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
		return [];
	}


}
