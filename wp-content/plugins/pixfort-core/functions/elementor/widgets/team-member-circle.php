<?php
namespace Elementor;

class Pix_Eor_Team_Member_Circle extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		// wp_register_script( 'pix-team-member-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/team-member.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
	}

	public function get_name() {
		return 'pix-team-member-circle';
	}

	public function get_title() {
		return 'Team member circle';
	}

	public function get_icon() {
		return 'eicon-user-circle-o pixfort-elementor-element pixfort-elementor-team-member-circle';
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
			'name',
			[
				'label' => __( 'Name', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the name', 'elementor' ),
				'dynamic'     => array(
					'active'  => true
				),
				'default' => '',
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter the title', 'elementor' ),
				'dynamic'     => array(
					'active'  => true
				),
				'default' => '',
			]
		);
		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXTAREA,
				'dynamic'     => array(
					'active'  => true
				),
				'placeholder' => __( 'Enter the description', 'elementor' ),
				'default' => '',
			]
		);


		

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
					'has_color' => true,
				],
			]
		);
		$repeater->add_control(
			'item_custom_color', [
				'label' => __( 'Custom Icon Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_color' => 'custom',
				],
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
			'outer_border',
			[
				'label' => __( 'Enable color border', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'pixfort-core' ),
				'label_off' => __( 'Disable', 'pixfort-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'color',
			[
				'label' => __( 'Color', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'gradient-primary',
				'options' => array_flip($bg_colors),
				'condition' => [
					'outer_border!' => '',
				],
			]
		);
		$this->add_control(
			'inner_border',
			[
				'label' => __( 'Remove inner white border', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'pixfort-core' ),
				'label_off' => __( 'Disable', 'pixfort-core' ),
				'return_value' => 'no-border',
				'default' => '',
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
			'position',
			[
				'label' => __( 'Content align', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'text-left'			=> 'Start',
					'text-center'		=> 'Center',
					'text-right' 		=> 'End',
				],
				'default' => 'text-center',
			]
		);
		$this->end_controls_section();





		$this->start_controls_section(
			'pix_section_name',
			[
				'label' => __( 'Name format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'name_bold',
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
			'name_italic',
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
			'name_secondary_font',
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
			'name_color',
			[
				'label' => __( 'Name color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => '',
			]
		);
		$this->add_control(
			'name_custom_color',
			[
				'label' => __( 'Custom Name color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'name_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'name_size',
			[
				'label' => __( 'Name size', 'pixfort-core' ),
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
			'name_custom_size',
			[
				'label' => __( 'Custom Name size', 'elementor' ),
				'label_block' => false,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter custom Name size', 'elementor' ),
				'default' => '',
				'condition' => [
					'name_size' => 'custom',
				],
			]
		);

		$this->end_controls_section();






		$this->start_controls_section(
			'pix_section_title',
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
				'default' => '',
			]
		);
		$this->add_control(
			'title_custom_color',
			[
				'label' => __( 'Custom Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'title_color' => 'custom',
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
				'default' => 'h6',
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
					'title_size' => 'custom',
				],
			]
		);

		$this->end_controls_section();





		$this->start_controls_section(
			'pix_section_description',
			[
				'label' => __( 'Description format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'description!' => '',
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __( 'Description color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'light-opacity-5',

			]
		);
		$this->add_control(
			'description_custom_color',
			[
				'label' => __( 'Description Title color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'description_color' => 'custom',
				],
			]
		);
		$this->add_control(
			'description_size',
			[
				'label' => __( 'Description font size', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''			=> 'Default (16px)',
					'text-xs'		=> '12px',
					'text-sm'		=> '14px',
					'text-sm'		=> '14px',
					'text-18' 		=> '18px',
					'text-20' 		=> '20px',
					'text-24' 		=> '24px',
				],
				'default' => '',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'pix_section_icons',
			[
				'label' => __( 'Icons format', 'pixfort-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
				'label' => __( 'Description icons color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333',
				'condition' => [
					'items_color' => 'custom',
				],
			]
		);

		$this->end_controls_section();





		$this->start_controls_section(
			'section_element_style',
			[
				'label' => __( 'Advanced Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
	

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => __( 'Name Typography', 'pixfort-core' ),
				'selector' => '{{WRAPPER}} .pix-member-name',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_shadow',
				'label' => __( 'Name Shadow', 'pixfort-core' ),
				'selector' => '{{WRAPPER}} .pix-member-name',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'pixfort-core' ),
				'selector' => '{{WRAPPER}} .pix-member-title, {{WRAPPER}} .pix-member-title.font-weight-bold',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'label' => __( 'Title Shadow', 'pixfort-core' ),
				'selector' => '{{WRAPPER}} .pix-member-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .pix-member-desc',
				'label' => __( 'Description Typography', 'pixfort-core' ),
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_shadow',
				'label' => __( 'Description Shadow', 'pixfort-core' ),
				'selector' => '{{WRAPPER}} .pix-member-desc',
			]
		);
		
		$this->end_controls_section();





	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo \PixfortCore::instance()->elementsManager->renderElement('TeamMemberCircle', $settings );
	}

	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
		return [];
	}


}
