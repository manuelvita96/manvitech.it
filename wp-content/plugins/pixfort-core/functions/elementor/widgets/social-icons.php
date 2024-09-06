<?php
namespace Elementor;

class Pix_Eor_Social_Icons extends Widget_Base {

	public function __construct($data = [], $args = null) {
      parent::__construct($data, $args);
   	}

	public function get_name() {
		return 'pix-social-icons';
	}

	public function get_title() {
		return 'Social icons';
	}

	public function get_icon() {
		return 'eicon-social-icons pixfort-elementor-element pixfort-elementor-social-icons';
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

		$fontiocns_opts = array();
	    $fontiocns_opts[''] = array('title' => 'None', 'url' => '' );
		if (function_exists('vc_iconpicker_type_pixicons')) {
	    $pixicons = vc_iconpicker_type_pixicons( array() );
	        foreach ($pixicons as $key) {
	            $fontiocns_opts[array_keys($key)[0]] = array(
	                'title'	=> array_keys($key)[0],
	                'url'	=> array_keys($key)[0]
	            );
	        }
	        }

		$repeater = new \Elementor\Repeater();
		
		if(\PixfortCore::instance()->icons::$isEnabled) {
			$repeater->add_control(
				'icon', [
					'label' => esc_html__('pixfort Icon', 'pixfort-core'),
					'type' => \Elementor\CustomControl\PixfortIconSelector_Control::PixfortIconSelector,
					'default' => '',
				]
			);
		} else {
			$repeater->add_control(
				'icon', [
					'label' => esc_html__('Icon', 'pixfort-core'),
					'type' => \Elementor\CustomControl\FonticonSelector_Control::FonticonSelector,
					'options'	=> $fontiocns_opts,
					'default' => '',
				]
			);
		}
		$repeater->add_control(
			'item_link', [
				'label' => __( 'Icon Link', 'pixfort-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'pixfort-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'target',
			[
				'label' => __( 'Open in a new tab', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'Yes',
				'condition' => [
					'item_link!' => '',
				],
			]
		);
		$repeater->add_control(
			'has_color', [
				'label' => __( 'Different color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$repeater->add_control(
			'item_color', [
				'label' => __( 'Icon color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => '',
				'condition' => [
					'has_color' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'item_custom_color', [
				'label' => __( 'Custom Icon Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'item_color' => 'custom',
				],
			]
		);
		$repeater->add_control(
			'aria_label', [
				'label' => __( 'Area label', 'pixfort-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'pixfort-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'items',
			[
				'label' => __( 'Icons', 'pixfort-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ icon }}}',
				'fields' => $repeater->get_controls()
			]
		);


		$this->add_control(
			'item_size',
			[
				'label' => __( 'Size', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''			=> 'Default (16px)',
	                'text-xs'		=> '12px',
	                'text-sm'		=> '14px',
	                'text-sm'		=> '14px',
	                'text-18' 		=> '18px',
	                'text-20' 		=> '20px',
	                'text-24' 		=> '24px',
	                'custom' 		=> 'Custom',
				],
			]
		);
		$this->add_control(
			'item_custom_size',
			[
				'label' => __( 'Custom Icon Size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'pixfort-core' ),
				'placeholder' => __( 'Please input the value (with the unit: px,.. etc).', 'pixfort-core' ),
				'condition' => [
					'item_size' => 'custom',
				],
			]
		);


		$this->add_control(
			'items_color',
			[
				'label' => __( 'Icons color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'body-default',
			]
		);
		$this->add_control(
			'items_custom_color',
			[
				'label' => __( 'Custom Icons Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'items_style',
			[
				'label' => __( 'Hover Animation', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					""       => "None",
		            "fly-sm"       => "Fly Small",
		            "fly"       => "Fly Medium",
		            "fly-lg"       => "Fly Large",
		            "scale-sm"       => "Scale Small",
		            "scale"       => "Scale Medium",
		            "scale-lg"       => "Scale Large",
				),
				'default' => '',
			]
		);
		$this->add_control(
			'position',
			[
				'label' => __( 'Position', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'text-left'			=> 'Left',
	                'text-center'		=> 'Center',
	                'text-right' 		=> 'Right',
	            ),
				'default' => 'text-left',
			]
		);
		$this->add_control(
			'item_padding',
			[
				'label' => __( 'Padding', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'px-2'			=> 'Default (small)',
	                'px-1'		=> 'Extra small',
	                'px-3'		=> 'Medium',
	                'px-4'		=> 'Large',
	                'px-5'		=> 'Extra Large',
	                'none'		=> 'None',
	                'custom'		=> 'Custom',
	            ),
				'default' => 'px-2',
			]
		);
		$this->add_control(
			'item_custom_padding',
			[
				'label' => __( 'Custom Icons padding', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'pixfort-core' ),
				'placeholder' => __( 'Please input the value (with the unit: px,.. etc).', 'pixfort-core' ),
				'condition' => [
					'item_padding' => 'custom',
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

		$this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		echo \PixfortCore::instance()->elementsManager->renderElement('SocialIcons', $settings );
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
	    return [];
	  }


}
