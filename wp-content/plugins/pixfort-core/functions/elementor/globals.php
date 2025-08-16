<?php

namespace Elementor;

use Elementor\Controls_Manager;

function pix_get_elementor_btn($that, $dynamicBtn=false){


    $colors = array(
        "Body default"			=> "body-default",
        "Heading default"		=> "heading-default",
        "Primary"				=> "primary",
        "Primary Gradient"		=> "gradient-primary",
        "Secondary"				=> "secondary",
        "Secondary Light"	    => "secondary-light",
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




    $that->start_controls_section(
        'section_button',
        [
            'label' => __( 'Button Settings', 'pixfort-core' ),
        ]
    );

    $that->add_control(
        'is_elementor',
        [
            'label' => __( 'elementor button', 'plugin-domain' ),
            'type' => \Elementor\Controls_Manager::HIDDEN,
            'default' => 'true',
        ]
    );

    $that->add_control(
        'btn_text',
        [
            'label' => __( 'Button Text', 'pixfort-core' ),
            'label_block' => true,
            'type' => Controls_Manager::TEXT,
            'placeholder' => __( 'Button Text', 'pixfort-core' ),
            'default' => 'Click here',
            'dynamic'     => array(
                'active'  => true
            ),
        ]
    );
    if($dynamicBtn){
        $that->add_control(
			'btn_link',
			[
				'label' => __( 'Button Link', 'pixfort-core' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'Button Link', 'pixfort-core' ),
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
    }else{
        $that->add_control(
            'btn_link',
            [
                'label' => __( 'Button Link', 'pixfort-core' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Button Link', 'pixfort-core' ),
                'default' => '',
            ]
        );
        $that->add_control(
            'btn_target',
            [
                'label' => __( 'Open in a new tab', 'pixfort-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'pixfort-core' ),
                'label_off' => __( 'No', 'pixfort-core' ),
                'return_value' => 'true',
                'default' => '',
                'condition' => [
                    'btn_link!' => ''
                ],
            ]
        );
    }
    
    $that->add_control(
        'btn_popup_id',
        [
            'label' => __( 'Open Popup instead of link', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => $popups,
            'default' => '',
        ]
    );

    $that->add_control(
        'btn_title_bold',
        [
            'label' => __( 'Bold', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'pixfort-core' ),
            'label_off' => __( 'No', 'pixfort-core' ),
            'return_value' => 'font-weight-bold',
            'default' => 'font-weight-bold',
        ]
    );
    $that->add_control(
        'btn_italic',
        [
            'label' => __( 'Italic', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'pixfort-core' ),
            'label_off' => __( 'No', 'pixfort-core' ),
            'return_value' => 'font-italic',
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_secondary_font',
        [
            'label' => __( 'Secondary font', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'pixfort-core' ),
            'label_off' => __( 'No', 'pixfort-core' ),
            'return_value' => 'secondary-font',
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_style',
        [
            'label' => __( 'Button Style', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
               ""            => "Default",
               "flat"        => "Flat",
               "line"        => "Line",
               "outline"     => "Outline",
               "underline"     => "Underline",
               "link"        => "Link",
               "blink"     => "Blink"
           ),
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_color',
        [
            'label' => __( 'Button Color', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'groups' => \PixfortCore::instance()->coreFunctions->getColorsArray(['defaultColors' => false, 'mainLight' => true, 'custom' => false]),
            // 'options' => array(
            //     'primary' 		=> 'Primary',
            //     'primary-light' 		=> 'Primary Light',
            //     // 'success'		=> 'Success',
            //     'secondary'		=> 'Secondary',
            //     'secondary-light'		=> 'Secondary Light',
            //     'gray-1' 		=> 'Light',
            //     'gray-5' 		    => 'Dark',
            //     'black' 		=> 'Black',
            //     // 'link' 		    => 'Link',
            //     'white' 		=> 'White',
            //     'blue' 		    => 'Blue',
            //     'red' 		    => 'Red',
            //     'cyan' 		    => 'Cyan',
            //     'orange' 		    => 'Orange',
            //     'green' 		    => 'Green',
            //     'purple' 		    => 'Purple',
            //     'brown' 		    => 'Brown',
            //     'yellow' 		    => 'Yellow',
            //     'gradient-primary' 		    => 'Primary gradient',
            //     "gray-1" => 'Gray 1',
            //     "gray-2" => 'Gray 2',
            //     "gray-3" => 'Gray 3',
            //     "gray-4" => 'Gray 4',
            //     "gray-5" => 'Gray 5',
            //     "gray-6" => 'Gray 6',
            //     "gray-7" => 'Gray 7',
            //     "gray-8" => 'Gray 8',
            //     "gray-9" => 'Gray 9',
            //     "dark-opacity-1" => 'Dark opacity 1',
            //     "dark-opacity-2" => 'Dark opacity 2',
            //     "dark-opacity-3" => 'Dark opacity 3',
            //     "dark-opacity-4" => 'Dark opacity 4',
            //     "dark-opacity-5" => 'Dark opacity 5',
            //     "dark-opacity-6" => 'Dark opacity 6',
            //     "dark-opacity-7" => 'Dark opacity 7',
            //     "dark-opacity-8" => 'Dark opacity 8',
            //     "dark-opacity-9" => 'Dark opacity 9',
            //     "light-opacity-1" => 'Light opacity 1',
            //     "light-opacity-2" => 'Light opacity 2',
            //     "light-opacity-3" => 'Light opacity 3',
            //     "light-opacity-4" => 'Light opacity 4',
            //     "light-opacity-5" => 'Light opacity 5',
            //     "light-opacity-6" => 'Light opacity 6',
            //     "light-opacity-7" => 'Light opacity 7',
            //     "light-opacity-8" => 'Light opacity 8',
            //     "light-opacity-9" => 'Light opacity 9'

            // ),
            'default' => 'primary',
        ]
    );

    $that->add_control(
        'btn_remove_padding',
        [
            'label' => __( 'Remove padding', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'pixfort-core' ),
            'label_off' => __( 'No', 'pixfort-core' ),
            'return_value' => 'no-padding',
            'default' => '',
            'condition' => [
                'btn_style' => array("link", "underline")
            ],
        ]
    );
    $that->add_control(
        'btn_text_color',
        [
            'label' => __( 'Text color', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            // 'options' => array_flip(array_merge(array("Default" => "",), $colors)),
            'groups' => \PixfortCore::instance()->coreFunctions->getColorsArray([ 'defaultValue' => ['' => __('Default', 'pixfort-core')], 'mainLight' => true ]),
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_text_custom_color',
        [
            'label' => __( 'Text custom color', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'btn_text_color' => 'custom',
            ],
        ]
    );
    $that->add_control(
        'btn_size',
        [
            'label' => __( 'Button Size', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
               "sm"       => "Small",
               "normal"       => "Normal",
               "md"       => "Medium",
               "lg"       => "Large",
               "xl"       => "XLarge "
           ),
            'default' => 'md',
        ]
    );
    $that->add_control(
        'btn_rounded',
        [
            'label' => __( 'Rounded corners button', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'pixfort-core' ),
            'label_off' => __( 'No', 'pixfort-core' ),
            'return_value' => 'btn-rounded',
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_effect',
        [
            'label' => __( 'Button shadow', 'pixfort-core' ),
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
    $that->add_control(
        'btn_hover_effect',
        [
            'label' => __( 'Button Shadow Hover Style', 'pixfort-core' ),
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
    $that->add_control(
        'btn_add_hover_effect',
        [
            'label' => __( 'Button Hover Animation', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ""       => "None",
              "1"       => "Fly Small",
              "2"       => "Fly Medium",
              "3"       => "Fly Large",
              "4"       => "Scale Small",
              "5"       => "Scale Medium",
              "6"       => "Scale Large",
              "7"       => "Scale Inverse Small",
              "8"       => "Scale Inverse Medium",
              "9"       => "Scale Inverse Large",
            ),
            'default' => '',
        ]
    );


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

        $that->add_control(
            'btn_icon', [
                'label' => esc_html__('Button Icon', 'pixfort-core'),
                'type' => \Elementor\CustomControl\PixfortIconSelector_Control::PixfortIconSelector,
                'default' => '',
            ]
        );


    $that->add_control(
        'btn_icon_position',
        [
            'label' => __( 'Icon position', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ""            => "Before text",
                "after"        => "After text"
            ),
            'default' => '',
            'conditions' => [
                'terms' => [
                       [
                           'name' => 'btn_icon',
                           'operator' => '!=',
                           'value' => ''
                       ]
                   ]
            ],
        ]
    );
    $that->add_control(
        'btn_icon_animation',
        [
            'label' => __( 'Icon animation', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'pixfort-core' ),
            'label_off' => __( 'No', 'pixfort-core' ),
            'return_value' => 'yes',
            'default' => '',
            'conditions' => [
                'terms' => [
                       [
                           'name' => 'btn_icon',
                           'operator' => '!=',
                           'value' => ''
                       ]
                   ]
            ],
        ]
    );
    $that->add_control(
        'btn_full',
        [
            'label' => __( 'Full width Button', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Yes', 'pixfort-core' ),
            'label_off' => __( 'No', 'pixfort-core' ),
            'return_value' => 'yes',
            'default' => '',
        ]
    );
    $that->add_control(
        'btn_text_align',
        [
            'label' => __( 'Button Text Align', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                'text-center' 		=> 'Center',
                'text-left' 		=> 'Left',
                'text-right' 		=> 'Right',
            ),
            'default' => '',
            'conditions' => [
                'terms' => [
                       [
                           'name' => 'btn_full',
                           'operator' => '!=',
                           'value' => ''
                       ]
                   ]
            ],
        ]
    );
    $that->add_control(
        'btn_div',
        [
            'label' => __( 'Button inside a container', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                '' 		=> 'Disabled',
                'text-center' 		=> 'Center align',
                'text-left' 		=> 'Left align',
                'text-right' 		=> 'Right align',
            ),
            'default' => '',
        ]
    );




    $that->add_control(
        'btn_animation',
        [
            'label' => __( 'Animation', 'pixfort-core' ),
            'type' => Controls_Manager::SELECT,
            'default' => '',
            'options' => pix_get_animations(true),
        ]
    );
    $that->add_control(
        'btn_anim_delay',
        [
            'label' => __( 'Animation delay (in miliseconds)', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( '0', 'pixfort-core' ),
            'placeholder' => __( '', 'pixfort-core' ),
            'condition' => [
                'btn_animation!' => '',
            ],
        ]
    );

    $that->add_control(
        'btn_extra_classes',
        [
            'label' => __( 'Extra Classes', 'pixfort-core' ),
            'label_block' => true,
            'type' => Controls_Manager::TEXT,
            'placeholder' => __( '', 'pixfort-core' ),
            'default' => '',
        ]
    );


    $that->end_controls_section();


}


function pix_get_elementor_effects( $that ){


        $that->start_controls_section(
            'section_pix_effects',
            [
                'label' => __( 'Effects Settings', 'pixfort-core' ),
            ]
        );

    $that->add_control(
        'style',
        [
            'label' => __( 'Shadow Style', 'pixfort-core' ),
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
    $that->add_control(
        'hover_effect',
        [
            'label' => __( 'Shadow Hover Style', 'pixfort-core' ),
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
    $that->add_control(
        'add_hover_effect',
        [
            'label' => __( 'Hover Animation', 'pixfort-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => array(
                ""       => "None",
              "1"       => "Fly Small",
              "2"       => "Fly Medium",
              "3"       => "Fly Large",
              "4"       => "Scale Small",
              "5"       => "Scale Medium",
              "6"       => "Scale Large",
              "7"       => "Scale Inverse Small",
              "8"       => "Scale Inverse Medium",
              "9"       => "Scale Inverse Large",
            ),
            'default' => '',
        ]
    );





        $that->end_controls_section();
}


function getElementorDynamicImageControls($that, $imageID = 'image', $darkImageID = 'image_dark', $conditions = []) {
    if(\PixfortCore::instance()->styleFunctions->darkModeEnabled) {
        $that->start_controls_tabs(
            'pix_img_tabs',
            [
                'condition' => $conditions,
            ]
        );
        $that->start_controls_tab(
            'pix_img_light',
            [
                'label' => esc_html__('Light Image', 'pixfort-core'),
            ]
        );
        $that->add_control(
            $imageID,
            [
                'label' => __('Choose Image', 'pixfort-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'dynamic'     => array(
                    'active'  => true
                ),
            ]
        );
        $that->end_controls_tab();
        $that->start_controls_tab(
            'pix_img_dark',
            [
                'label' => esc_html__('Dark Image', 'pixfort-core'),
            ]
        );
        $that->add_control(
            $darkImageID,
            [
                'label' => __('Choose Image', 'pixfort-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'dynamic'     => array(
                    'active'  => true
                ),
                'description' => __('The dark image is optional, leave empty to use the light image', 'pixfort-core'),

            ]
        );
        $that->end_controls_tab();
        $that->end_controls_tabs();
        $that->add_control(
            'separator_img_dark_mode_tab',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
    } else {
        if(empty($conditions)){
            $that->add_control(
                $imageID,
                [
                    'label' => __('Choose Image', 'pixfort-core'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'dynamic'     => array(
                        'active'  => true
                    )
                ]
            );
        } else {
            $that->add_control(
                $imageID,
                [
                    'label' => __('Choose Image', 'pixfort-core'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'dynamic'     => array(
                        'active'  => true
                    ),
                    'condition' => $conditions,
                ]
            );
        }
        
    }
}