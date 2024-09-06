<?php
namespace Elementor;

class Pix_Eor_Fancy_Mockup extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);

      wp_register_script( 'pix-fancy-mockup-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/fancy-mockup.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	  if (is_user_logged_in()) wp_enqueue_style('pixfort-fancy-mockup-style', PIX_CORE_PLUGIN_URI.'functions/css/elements/css/fancy-mockup.min.css', false, PIXFORT_PLUGIN_VERSION, 'all');
   	}

	public function get_name() {
		return 'pix-fancy-mockup';
	}

	public function get_title() {
		return 'Fancy Mockup';
	}

	public function get_icon() {
		return 'eicon-device-tablet pixfort-elementor-element pixfort-elementor-fancy-mockup';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	public function get_help_url() {
		return 'https://essentials.pixfort.com/knowledge-base/';
	}

	protected function register_controls() {
		$infinite_animation = array(
		    "None"                  => "",
		    "Rotating"              => "pix-rotating",
		    "Rotating inversed"     => "pix-rotating-inverse",
		    "Fade"                  => "pix-fade",
		    "Bounce Small"          => "pix-bounce-sm",
		    "Bounce Medium" 		=> "pix-bounce-md",
		    "Bounce Large" 			=> "pix-bounce-lg",
		    "Scale Small"           => "pix-scale-sm",
		    "Scale Medium"           => "pix-scale-md",
		    "Scale Large"           => "pix-scale-lg",

		);
		$animation_speeds = array(
		    "Fast" 			=> "pix-duration-fast",
		    "Medium" 		=> "pix-duration-md",
		    "Slow" 			=> "pix-duration-slow",
		);



		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);


		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);
		$this->add_control(
			'rounded_img',
			[
				'label' => __( 'Rounded corners', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'rounded-0',
				'options' => [
					'rounded-0' => __( 'No', 'pixfort-core' ),
					'rounded' => __( 'Rounded', 'pixfort-core' ),
					'rounded-lg' => __( 'Rounded Large', 'pixfort-core' ),
					'rounded-xl' => __( 'Rounded 5px', 'pixfort-core' ),
					'rounded-10' => __( 'Rounded 10px', 'pixfort-core' ),
				],
			]
		);
		$this->add_control(
			'alt',
			[
				'label' => __( 'Image alternative text', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'dynamic'     => array(
                    'active'  => true
                ),
				'placeholder' => __( 'Image alternative text', 'elementor' ),
			]
		);
		$this->add_control(
			'align',
			[
				'label' => __( 'Image alignment', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'text-left',
				'options' => [
					'text-left'			=> 'Left',
					'text-center'		=> 'Center',
					'text-right' 		=> 'Right',
				],
			]
		);
		$this->add_control(
			'width',
			[
				'label' => __( 'Width (Optional)', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'input the value (with the unit: %, px,.. etc).', 'elementor' ),
			]
		);
		$this->add_control(
			'height',
			[
				'label' => __( 'Height (Optional)', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'input the value (with the unit: %, px,.. etc).', 'elementor' ),
			]
		);
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
			]
		);
		$this->add_control(
			'target',
			[
				'label' => __( 'Open in a new tab', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'Yes',
				'condition' => [
					'link!' => '',
				],
			]
		);
		$this->add_control(
			'pix_scroll_parallax',
			[
				'label' => __( 'Scroll Parallax', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'scroll_parallax',
			]
		);
		$this->add_control(
			'xaxis',
			[
				'label' => __( 'Vertical Parallax', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
				'description' => __('Input the Parallax value (without unit), for example: 120', 'pixfort-core'),
				'default'	=> '0'
			]
		);
		$this->add_control(
			'yaxis',
			[
				'label' => __( 'Horizontal Parallax', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'elementor' ),
				'description' => __('Input the Parallax value (without unit), for example: 120', 'pixfort-core'),
				'default'	=> '0'
			]
		);
		$this->add_control(
			'pix_tilt',
			[
				'label' => __( '3D Hover', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'tilt',
			]
		);
		$this->add_control(
			'pix_tilt_size',
			[
				'label' => __( '3d hover size', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'tilt',
				'options' => [
					'tilt'			=> 'Default',
					'tilt_big'		=> 'Big',
					'tilt_small' 		=> 'Small',
				],
				'condition' => [
					'pix_tilt!' => [],
				],
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
			'pix_infinite_animation',
			[
				'label' => __( 'Infinite Animation type', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => $infinite_animation,
			]
		);
		$this->add_control(
			'pix_infinite_speed',
			[
				'label' => __( 'Infinite Animation Speed', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => $animation_speeds,
			]
		);
	$this->end_controls_section();
		pix_get_elementor_effects($this);






	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo \PixfortCore::instance()->elementsManager->renderElement('FancyMockup', $settings );
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global', 'pix-fancy-mockup-handle' ];
		return [];
	  }


}
