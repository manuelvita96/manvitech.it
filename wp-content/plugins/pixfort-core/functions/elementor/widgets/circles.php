<?php
namespace Elementor;

class Pix_Eor_Circles extends Widget_Base {

	public function __construct($data = [], $args = null) {

		// Link migration code
		if(!empty($data['settings'])){
			if(!empty($data['settings']['circles'])){
				foreach ($data['settings']['circles'] as $key => $value) {
					$is_external = true;
					if( array_key_exists('target', $data['settings']['circles'][$key]) ){
						$is_external = false;
					}
					if(!empty($data['settings']['circles'][$key]['link'])&&!is_array($data['settings']['circles'][$key]['link'])){
						$data['settings']['circles'][$key]['link'] = [
							'url' => $data['settings']['circles'][$key]['link'],
							'is_external' => $is_external,
							'nofollow' => false,
						];
					}
				}
			}
		}

      parent::__construct($data, $args);

    //   wp_register_script( 'pix-circles-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/circles.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	if (is_user_logged_in()) wp_enqueue_style('pixfort-circles-style', PIX_CORE_PLUGIN_URI.'functions/css/elements/css/circles.min.css');
   	}

	public function get_name() {
		return 'pix-circles';
	}

	public function get_title() {
		return 'Circles';
	}

	public function get_icon() {
		return 'eicon-circle pixfort-elementor-element pixfort-elementor-circles';
	}

	public function get_categories() {
		return [ 'pixfort' ];
	}

	public function get_help_url() {
		return 'https://essentials.pixfort.com/knowledge-base/';
	}

	protected function register_controls() {
		$colors = array(
		    "Default"			=> "",
		    "Transparent"			=> "transparent",
		    "Primary"				=> "primary",
		    "Primary Gradient"		=> "gradient-primary",
		    "Secondary"				=> "secondary",
		    "Primary Gradient"		=> "gradient-primary",
		    "White"					=> "white",
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

		$popup_posts = get_posts([
		  'post_type' => 'pixpopup',
		  'post_status' => 'publish',
		  'numberposts' => -1
		]);

		$popups = array();
		$popups[''] = "Disabled";
		foreach ($popup_posts as $key => $value) {
			$popups[$value->ID] = $value->post_title;
		}

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'General', 'pixfort-core' ),
			]
		);


		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'img', [
				'label' => __( 'Image', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic'     => array(
					'active'  => true
				),
			]
		);
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'pixfort-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'pixfort-core' ),
				'dynamic'     => array(
					'active'  => true
				),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'link', [
				'label' => __( 'Link', 'pixfort-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'Link', 'elementor' ),
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);
		// $repeater->add_control(
		// 	'target', [
		// 		'label' => __( 'Open in a new tab', 'pixfort-core' ),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'label_on' => __( 'Yes', 'pixfort-core' ),
		// 		'label_off' => __( 'No', 'pixfort-core' ),
		// 		'return_value' => 'yes',
		// 		'default' => '',
		// 	]
		// );
		$repeater->add_control(
			'color', [
				'label' => __( 'Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					''			=> 'Primary Gradient',
					'pix-bg-custom'		=> 'None',
			   ),
				'default' => '',
			]
		);
		$this->add_control(
			'circles',
			[
				'label' => __( 'Circles', 'pixfort-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls()
			]
		);


		// effects_params
		$this->add_control(
			'effect',
			[
				'label' => __( 'Circles Effect', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					"" => "Default",
					"1"       => "Small shadow",
					"2"       => "Medium shadow",
					"3"       => "Large shadow",
					"4"       => "Inverse Small shadow",
					"5"       => "Inverse Medium shadow",
					"6"       => "Inverse Large shadow",
				),
				'default' => '',
			]
		);
		$this->add_control(
			'hover_effect',
			[
				'label' => __( 'Circles Hover Style', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					""       => "None",
					"1"       => "Small hover shadow",
					"2"       => "Medium hover shadow",
					"3"       => "Large hover shadow",
					"4"       => "Inverse Small hover shadow",
					"5"       => "Inverse Medium hover shadow",
					"6"       => "Inverse Large hover shadow",
				),
				'default' => '',
			]
		);

		$this->add_control(
			'circles_size',
			[
				'label' => __( 'Circles Size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					"pix-sm-circles"       => "Small (Default)",
	                "pix-md-circles"       => "Medium",
	                "pix-lg-circles"       => "Large",
				),
				'default' => 'pix-sm-circles',
			]
		);
		$this->add_control(
			'circles_align',
			[
				'label' => __( 'Circles Align', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'justify-content-start' => __('Start (Default)','pixfort-core'),
					'justify-content-center' => __('Center','pixfort-core'),
					'justify-content-end' => __('End','pixfort-core'),
                ],
				'default' => 'justify-content-start',
			]
		);

		$this->add_control(
			'circles_align_mobile',
			[
				'label' => __( 'Mobile Circles Align', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => __('Default (Same as Desktop)','pixfort-core'),
					'left' => __('Start','pixfort-core'),
					'center' => __('Center','pixfort-core'),
					'right' => __('End','pixfort-core'),
                ],

				'default' => 'center',
			]
		);

		$this->add_control(
			'animation',
			[
				'label' => __( 'Animation', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fade-in-left',
				'options' => pix_get_animations(true),
			]
		);
		$this->add_control(
			'delay',
			[
				'label' => __( 'Animation delay (in miliseconds)', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '1000', 'pixfort-core' ),
				'placeholder' => __( '', 'pixfort-core' ),
				'condition' => [
					'animation!' => '',
				],
			]
		);



		$this->end_controls_section();

		pix_get_elementor_btn($this);



	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		if(!empty($settings)){
			if(!empty($settings['circles'])){
				foreach ($settings['circles'] as $key => $value) {
					if(!empty($settings['circles'][$key]['link']['is_external'])){
						$settings['circles'][$key]['target'] = $settings['circles'][$key]['link']['is_external'];
					}
					if(!empty($settings['circles'][$key]['link']['custom_attributes'])){
						$settings['circles'][$key]['link_atts'] = $settings['circles'][$key]['link']['custom_attributes'];
					}
					if(!empty($settings['circles'][$key]['link']['nofollow'])){
						$settings['circles'][$key]['nofollow'] = $settings['circles'][$key]['link']['nofollow'];
					}
					$settings['circles'][$key]['link'] = $settings['circles'][$key]['link']['url'];
					
				}
			}
		}
		echo \PixfortCore::instance()->elementsManager->renderElement('Circles', $settings );
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
  		return [];
	  }


}
