<?php
namespace Elementor;

class Pix_Eor_Accordion extends Widget_Base {

	public function __construct($data = [], $args = null) {
		$data = \PixfortCore::instance()->icons->verifyElementorData($data, true, 'items');
      	parent::__construct($data, $args);

      // wp_register_script( 'pix-accordion-handle', PIX_CORE_PLUGIN_URI.'functions/elementor/js/accordion.js', [ 'elementor-frontend' ], PIXFORT_PLUGIN_VERSION, true );
   	}

	public function get_name() {
		return 'pix-accordion';
	}

	public function get_title() {
		return 'Accordion';
	}

	public function get_icon() {
		return 'eicon-accordion pixfort-elementor-element pixfort-elementor-accordion';
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

		




		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);



		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'pixfort-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( '' , 'pixfort-core' ),
				'label_block' => true,
			]
		);
		
		if(\PixfortCore::instance()->icons::$isEnabled) {
			$repeater->add_control(
				'media_type', [
					'label' => __( 'Enable Icon', 'pixfort-core' ),
					'type' => Controls_Manager::SELECT,
					'default' => '',
					'options' => [
						"" => "No",
						"icon" => "Yes"
					],
				]
			);
			$repeater->add_control(
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
			$repeater->add_control(
				'media_type', [
					'label' => __( 'Icon type', 'pixfort-core' ),
					'type' => Controls_Manager::SELECT,
					'default' => '',
					'options' => array_flip(array(
						"None" => "none",
						"Icon" => "icon",
						"Duo tone icon" => "duo_icon",
					)),
				]
			);
			require PIX_CORE_PLUGIN_DIR.'/functions/images/icons_list.php';
			$due_opts = array();
			foreach ($pix_icons_list as $key) {
				$due_opts[$key] = array(
					'title'	=> $key,
					'url'	=> PIX_CORE_PLUGIN_URI.'functions/images/icons/'.$key.'.svg'
				);
			}

			$fontiocns_opts = array();
			$fontiocns_opts[''] = array('title' => 'None', 'url' => '' );
			if (function_exists('vc_iconpicker_type_pixicons')) {
			$pixicons = vc_iconpicker_type_pixicons( array() );
				foreach ($pixicons as $key) {
					// echo '<br />';
					$fontiocns_opts[array_keys($key)[0]] = array(
						'title'	=> array_keys($key)[0],
						'url'	=> array_keys($key)[0]
					);
				}
				}
			$repeater->add_control(
				'pix_duo_icon', [
					'label' => esc_html__('Icon', 'pixfort-core'),
					'type' => \Elementor\CustomControl\IconSelector_Control::IconSelector,
					'options'	=> $due_opts,
					'default' => '',
					'condition' => [
						'media_type' => 'duo_icon',
					],
				]
			);
			$repeater->add_control(
				'icon', [
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
		
		$repeater->add_control(
			'content_type', [
				'label' => __( 'Content type', 'pixfort-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''			=> 'Default (Text editor)',
					'template'			=> 'Elementor Template'
				),
			]
		);
		$results = [];
	
		$results[] = esc_html__( 'Choose Template', 'pixfort-core' );

		$posts = get_posts( array(
			'posts_per_page'	=> -1,
			'post_type'	=> 'elementor_library'
		) );

		foreach ( $posts as $post ) {
			$document = \Elementor\plugin::instance()->documents->get( $post->ID );
			if ( $document ) {
				$text = esc_html( $post->post_title ) . ' (' . $document->get_post_type_title() . ')';
				$results[$post->ID] = $text;
				$resultsURLs[$post->ID] = $document->get_edit_url();
			}
		}

		$repeater->add_control(
			'pix_template_id',
			[
				'label' => esc_html__('Choose Template', 'pixfort-core'),
				'type' => \Elementor\CustomControl\Pix_Template_Control::PixTemplateSelector,
				'default' => '',
				'options' => $results,
				'condition' => [
					'content_type' => 'template',
				],
				'separator' => 'after',
			]
		);
		$repeater->add_control(
			'content', [
				'label' => __( 'Content', 'pixfort-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( '' , 'pixfort-core' ),
				'condition' => [
					'content_type!' => 'template',
				],
			]
		);
		$repeater->add_control(
			'is_open', [
				'label' => __( 'Open by default', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'pixfort-core' ),
				'label_off' => __( 'No', 'pixfort-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'items',
			[
				'label' => __( 'Items', 'pixfort-core' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls()
			]
		);



		$this->add_control(
			'transition',
			[
				'label' => __( 'Transition', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array(
	                ''			=> 'None',
	                'fade'			=> 'Fade',
	                'fade-left'			=> 'Fade Left',
	                'fade-right'		=> 'Fade Right',
	                'fade-up' 		=> 'Fade Up',
	                'fade-down' 		=> 'Fade Down',
	            ),
				'default' => '',
			]
		);



		// Title format
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
				'default' => 'primary',
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
			'icon_color',
			[
				'label' => __( 'Icon color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => 'primary',
			]
		);
		$this->add_control(
			'custom_icon_color',
			[
				'label' => __( 'Icon Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'icon_color' => 'custom',
				],
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
				'label' => __( 'Custom Background Color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'bg_color' => 'custom',
				],
			]
		);



		$this->end_controls_section();



		$this->start_controls_section(
			'section_element_text_style',
			[
				'label' => __( 'Text Style', 'elementor' ),
			]
		);

		$this->add_responsive_control(
			'text_color',
			[
				'label' => __( 'Text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($colors),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .card-body *' => 'color: var(--text-{{VALUE}});',
				],
				'dynamic'     => array(
                    'active'  => true
                ),
			]
		);
		$this->add_control(
			'text_custom_color',
			[
				'label' => __( 'Custom Text color', 'pixfort-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .card-body *' => 'color: {{VALUE}};',
				],
				'dynamic'     => array(
                    'active'  => true
                ),
				'condition' => [
					'text_color' => 'custom',
				],
			]
		);


		$this->end_controls_section();



		$this->start_controls_section(
			'section_element_title_style',
			[
				'label' => __( 'Title Style', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Title Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .card-header button' => 'text-align: {{VALUE}} !important;justify-content: {{VALUE}} !important;',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_inner_typography',
				'selector' => '{{WRAPPER}} .card-header button, {{WRAPPER}} .card-header button svg',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .card-header button',
			]
		);
		
		$this->end_controls_section();




	}

	protected function render() {
        $settings = $this->get_settings_for_display();
		$settings['element_id'] = $this->get_id();
		echo \PixfortCore::instance()->elementsManager->renderElement('AccordionText', $settings );
	}



	public function get_script_depends() {
		if(is_user_logged_in()) return [ 'pix-global' ];
		return [];
	  }
}
