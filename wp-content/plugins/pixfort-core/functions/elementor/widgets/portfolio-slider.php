<?php

namespace Elementor;

class Pix_Eor_Portfolio_Slider extends Widget_Base {

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		wp_register_script('pix-portfolio-slider-handle', PIX_CORE_PLUGIN_URI . 'functions/elementor/js/portfolio-slider.js', ['elementor-frontend'], PIXFORT_PLUGIN_VERSION, true);
	}

	public function get_name() {
		return 'pix-portfolio-slider';
	}

	public function get_title() {
		return 'Portfolio Carousel';
	}

	public function get_icon() {
		return 'eicon-slider-3d pixfort-elementor-element pixfort-elementor-portfolio-carousel';
	}

	public function get_categories() {
		return ['pixfort'];
	}

	public function get_help_url() {
		return \PixfortCore::instance()->adminCore->getParam('docs_link');
	}

	protected function register_controls() {
		
		$this->start_controls_section(
			'section_title',
			[
				'label' => __('General', 'pixfort-core'),
			]
		);


		$this->add_control(
			'count',
			[
				'label' => __('Count', 'pixfort-core'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Number of posts to show', 'pixfort-core'),
				'default' => '6',
			]
		);
		$this->add_control(
			'category',
			[
				'label' => __('Category', 'pixfort-core'),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Portfolio Category slug', 'pixfort-core'),
				'default' => '',
			]
		);

		$this->add_control(
			'portfolio_style',
			[
				'label' => __('Style', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => array_flip(array(
					"Default" 	    => '',
					"Mini" 	        => 'mini',
					"Transparent" 	=> 'transparent',
					"3D"        	=> '3d',
				)),
			]
		);
		$this->add_control(
			'orderby',
			[
				'label' => __('Order by', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'			=> 'Date',
					'menu_order' 	=> 'Menu order',
					'title'			=> 'Title',
					'rand'			=> 'Random',
				],
			]
		);
		$this->add_control(
			'order',
			[
				'label' => __('Order', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' 	=> 'Descending',
					'ASC' 	=> 'Ascending',
				],
			]
		);


		// Styling
		$this->add_control(
			'title_color',
			[
				'label' => __('Title color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'groups' => \PixfortCore::instance()->coreFunctions->getColorsArray(),
				'default' => 'heading-default',
				'condition' => [
					'portfolio_style' => array('transparent', "3d")
				],
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
			'full_size_img',
			[
				'label' => __('Display full size images', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'portfolio_style' => ['mini', 'transparent', ''],
				],

			]
		);
		$this->add_control(
			'rounded_img',
			[
				'label' => __('Rounded corners', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'rounded-0',
				'options' => [
					'rounded-0' => __('No', 'pixfort-core'),
					'rounded' => __('Rounded', 'pixfort-core'),
					'rounded-lg' => __('Rounded Large', 'pixfort-core'),
					'rounded-xl' => __('Rounded 5px', 'pixfort-core'),
					'rounded-10' => __('Rounded 10px', 'pixfort-core'),
				],
			]
		);
		$this->add_control(
			'overlay_color',
			[
				'label' => __('Overlay color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'groups' => \PixfortCore::instance()->coreFunctions->getColorsArray(),
				'default' => 'black',
				'condition' => [
					'portfolio_style' => '3d',
				],
			]
		);
		$this->add_control(
			'custom_overlay_color',
			[
				'label' => __('content_custom_color', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'overlay_color' => 'custom',
				],
			]
		);



		$this->end_controls_section();





		$this->start_controls_section(
			'section_pix_advanced',
			[
				'label' => __('Advanced', 'pixfort-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'slider_num',
			[
				'label' => __('Slides per page', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					1 	=> "1",
					2 	=> "2",
					3 	=> "3",
					4 	=> "4",
					5 	=> "5",
					6 	=> "6",
				],
			]
		);
		$this->add_control(
			'slider_style',
			[
				'label' => __('Slides style', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'pix-style-standard',
				'options' => [
					'pix-style-standard'        => __('Standard', 'pixfort-core'),
					'pix-one-active'         	=> __('One active item', 'pixfort-core'),
					'pix-opacity-slider'        => __('Faded items', 'pixfort-core'),
				],
			]
		);
		$this->add_control(
			'slider_effect',
			[
				'label' => __('Slides effect', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'pix-effect-standard',
				'options' => array_flip(
					array(
						__('Standard', 'pixfort-core') 	                => 'pix-effect-standard',
						__('Circular effect', 'pixfort-core') 	        => 'pix-circular-slider',
						__('Circular Start Only', 'pixfort-core') 	        => 'pix-circular-left',
						__('Circular End Only', 'pixfort-core') 	    => 'pix-circular-right',
						__('Fade out', 'pixfort-core') 	                => 'pix-fade-out-effect',
					)
				),
			]
		);

		$this->add_control(
			'prevnextbuttons',
			[
				'label' => __('Show navigation buttons', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'true',
				'default' => 'true',

			]
		);
		$this->add_control(
			'pagedots',
			[
				'label' => __('Dots', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'true',
				'default' => 'true',

			]
		);
		$this->add_control(
			'dots_style',
			[
				'label' => __('Dots style', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''			=> 'Default',
					'light-dots' 	=> 'Light',
				],
				'condition' => [
					'pagedots' => 'true',
				],
			]
		);
		$this->add_control(
			'dots_align',
			[
				'label' => __('Dots style', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''			=> 'Center',
					'pix-dots-left' 	=> 'Left',
					'pix-dots-right' 	=> 'Right',
				],
				'condition' => [
					'pagedots' => 'true',
				],
			]
		);
		$this->add_control(
			'freescroll',
			[
				'label' => __('Free Scroll', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'true',
				'default' => '',

			]
		);
		$this->add_control(
			'cellalign',
			[
				'label' => __('Main cell Align', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'center'			=> 'Center',
					'left' 	=> 'Left',
					'right' 	=> 'Right',
				],
			]
		);
		$this->add_control(
			'slider_scale',
			[
				'label' => __('Scale main item', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'pix-slider-scale',
				'default' => '',
			]
		);
		$this->add_control(
			'cellpadding',
			[
				'label' => __('Cells padding', 'pixfort-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'pix-p-10',
				'options' => [
					'p-0'				=> '0px',
					'pix-p-5'			=> '5px',
					'pix-p-10'			=> '10px',
					'pix-p-15'			=> '15px',
					'pix-p-20'			=> '20px',
					'pix-p-25'			=> '25px',
					'pix-p-30'			=> '30px',
					'pix-p-35'			=> '35px',
					'pix-p-40'			=> '40px',
					'pix-p-45'			=> '45px',
					'pix-p-50'			=> '50px',
				],
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label' => __('Autoplay', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'true',
				'default' => '',
			]
		);
		$this->add_control(
			'autoplay_time',
			[
				'label' => __('Autoplay time', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('1500', 'pixfort-core'),
				'placeholder' => __('Type your title here', 'pixfort-core'),
				// 'condition' => [
				// 	'autoplay' => true,
				// ],
			]
		);
		$this->add_control(
			'adaptiveheight',
			[
				'label' => __('Adaptive height', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'righttoleft',
			[
				'label' => __('Right to Left', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'true',
				'default' => '',
			]
		);
		$this->add_control(
			'slider_wrap',
			[
				'label' => __('Wrap slides', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		$this->add_control(
			'visible_y',
			[
				'label' => __('Increase vertical view', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'pix-overflow-y-visible',
				'default' => '',
			]
		);
		$this->add_control(
			'visible_overflow',
			[
				'label' => __('Visible overflow', 'pixfort-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'pixfort-core'),
				'label_off' => __('No', 'pixfort-core'),
				'return_value' => 'pix-overflow-all-visible',
				'default' => '',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo \PixfortCore::instance()->elementsManager->renderElement('PortfolioSlider', $settings);
	}


	public function get_script_depends() {
		if (is_user_logged_in()) return ['pix-global', 'pix-portfolio-slider-handle'];
		return [];
	}
}
