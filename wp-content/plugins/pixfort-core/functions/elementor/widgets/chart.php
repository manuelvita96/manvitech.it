<?php
namespace Elementor;

class Pix_Eor_Chart extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);


      wp_register_script( 'pix-chart-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/chart.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	  if (is_user_logged_in()) wp_enqueue_style( 'pixfort-chart-style', PIX_CORE_PLUGIN_URI.'functions/css/elements/css/chart.min.css', false, PIXFORT_PLUGIN_VERSION);
   	}

	public function get_name() {
		return 'pix-chart';
	}

	public function get_title() {
		return 'Chart';
	}

	public function get_icon() {
		return 'eicon-counter-circle pixfort-elementor-element pixfort-elementor-chart';
	}

	public function get_categories() {
		return [ 'pixfort' ];
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
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);


		$this->add_control(
			'percent',
			[
				'label' => __( 'Percent', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Number between 0-100', 'elementor' ),
				'default' => '50',
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Title', 'elementor' ),
				'default' => 'Title',
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);
		$this->add_control(
			'text',
			[
				'label' => __( 'Chart text', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Chart text', 'elementor' ),
				'default' => 'Chart text',
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);
		$this->add_control(
			'color1',
			[
				'label' => __( 'Chart color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'color2',
			[
				'label' => __( 'Second Chart color (Optional)', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'color3',
			[
				'label' => __( 'Third Chart color (Optional)', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
			]
		);
		$this->add_control(
			'track_color',
			[
				'label' => __( 'Track background color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
			]
		);





		$this->add_control(
			'content_align',
			[
				'label' => __( 'Content align', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip(array(
	                __('Center (Default)','pixfort-core') 	=> '',
	                __('Start','pixfort-core')	    => 'left',
	                __('End','pixfort-core')	    => 'right',
	            )),
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





		$this->end_controls_section();
		$this->start_controls_section(
			'percent_section',
			[
				'label' => __( 'Percent format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'p_bold',
			[
				'label' => __( 'Bold', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'font-weight-bold',
				'default' => 'font-weight-bold',
			]
		);
		$this->add_control(
			'p_italic',
			[
				'label' => __( 'Italic', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'font-italic',
				'default' => '',
			]
		);
		$this->add_control(
			'p_secondary_font',
			[
				'label' => __( 'Secondary font', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'secondary-font',
				'default' => '',
			]
		);
		$this->add_control(
			'p_color',
			[
				'label' => __( 'Percent color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'heading-default',
			]
		);
		$this->add_control(
			'p_custom_color',
			[
				'label' => __( 'Custom Percent color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'p_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'p_size',
			[
				'label' => __( 'Percent size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
					__('H1','pixfort-core') 	=> 'h1',
 				   __('H2','pixfort-core')	    => 'h2',
 				   __('H3','pixfort-core')	    => 'h3',
 				   __('H4','pixfort-core')	    => 'h4',
 				   __('H5','pixfort-core')	    => 'h5',
 				   __('H6','pixfort-core')	    => 'h6',
 				   __('Custom','pixfort-core')	    => 'custom',
		       )),
				'default' => 'h4',
			]
		);
		$this->add_control(
			'p_custom_size',
			[
				'label' => __( 'Custom Percent size', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter custom Percent size', 'elementor' ),
				'default' => '',
				'condition' => [
					'p_size' => 'custom',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'bold',
			[
				'label' => __( 'Bold', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'font-weight-bold',
				'default' => 'font-weight-bold',
			]
		);
		$this->add_control(
			'italic',
			[
				'label' => __( 'Italic', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'font-italic',
				'default' => '',
			]
		);
		$this->add_control(
			'secondary_font',
			[
				'label' => __( 'Secondary font', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'secondary-font',
				'default' => '',
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'heading-default',
			]
		);
		$this->add_control(
			'title_custom_color',
			[
				'label' => __( 'Custom Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'text_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'title_size',
			[
				'label' => __( 'Title size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip(array(
					__('H1','pixfort-core') 	=> 'h1',
 				   __('H2','pixfort-core')	    => 'h2',
 				   __('H3','pixfort-core')	    => 'h3',
 				   __('H4','pixfort-core')	    => 'h4',
 				   __('H5','pixfort-core')	    => 'h5',
 				   __('H6','pixfort-core')	    => 'h6',
 				   __('Custom','pixfort-core')	    => 'custom',
		       )),
				'default' => 'h5',
			]
		);
		$this->add_control(
			'title_custom_size',
			[
				'label' => __( 'Custom Title size', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter custom title size', 'elementor' ),
				'default' => '',
				'condition' => [
					'text_size' => 'custom',
				],
			]
		);

		$this->end_controls_section();








		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'body-default',
			]
		);
		$this->add_control(
			'content_custom_color',
			[
				'label' => __( 'Content Text color', 'pixfort-core' ),
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
				'label' => __( 'Content size', 'pixfort-core' ),
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
		$this->end_controls_section();
	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo \PixfortCore::instance()->elementsManager->renderElement('Chart', $settings );
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-chart-handle' ];
		return [];
	  }


}
