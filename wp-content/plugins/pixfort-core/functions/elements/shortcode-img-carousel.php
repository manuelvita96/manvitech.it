<?php

// Image carousel -----------------------------
vc_map( array (
    'base' 			=> 'pix_img_carousel',
    'name' 			=> __('Image Carousel', 'pixfort-core'),
    'category' 		=> __('pixfort', 'pixfort-core'),
    "weight"	=> "1000",
    'class'         => 'pixfort_element',
    'icon' 			=> PIX_CORE_PLUGIN_URI . 'functions/images/elements/image-carousel.png',
    'description' 	=> __('Create custom image carousel', 'pixfort-core'),
    'params' 		=> array_merge(
        array (


            array(
        		  'type' => 'param_group',
        		  'value' => '',
        		  'param_name' => 'items',
        		  'heading' 		=> __('Images', 'pixfort-core'),
        		  'params' => array(

                      array (
                          'param_name' 	=> 'image',
                          'type' 			=> 'attach_image',
                          'heading' 		=> __('Image', 'pixfort-core'),
                          'admin_label'	=> false,
                      ),
                      array (
                          'param_name' 	=> 'alt',
                          'type' 			=> 'textfield',
                          'heading' 		=> __('Image alternative text', 'pixfort-core'),
                          'admin_label'	=> true,
                      ),
                      array (
                          'param_name' 	=> 'link',
                          'type' 			=> 'textfield',
                          'heading' 		=> __('Link', 'pixfort-core'),
                          'admin_label'	=> true,
                      ),
                      array(
                            "type" => "checkbox",
                            "heading" => __( "Open in a new tab", "pixfort-core" ),
                            "param_name" => "target",
                            "value" => __( "Yes", "pixfort-core" ),
                            "dependency" => array(
                  		        "element" => "link",
                  		        "not_empty" => true
                  		    ),
                        ),


        		  )
        	),


            array (
                'param_name' 	=> 'rounded_img',
                'type' 			=> 'dropdown',
                'heading' 		=> __('Rounded corners', 'pixfort-core'),
                'admin_label'	=> false,
                'value' 		=> array(
                    __('No','pixfort-core') 	=> 'rounded-0',
                    __('Rounded','pixfort-core')	    => 'rounded',
                    __('Rounded Large','pixfort-core')	    => 'rounded-lg',
                    __('Rounded 5px','pixfort-core')	    => 'rounded-xl',
                    __('Rounded 10px','pixfort-core')	    => 'rounded-10',
                )
            ),


              array(
                    "type" => "checkbox",
                    "heading" => __( "Animation type", "pixfort-core" ),
                    "param_name" => "pix_scroll_parallax",
                    "value" => array_flip(array(
                      "scroll_parallax"       => "Scroll Parallax",
                  )),
                ),
                array(
                      "type" => "checkbox",
                      "param_name" => "pix_tilt",
                      "value" => array_flip(array(
                        "tilt"       => "3D Hover",
                    )),
                  ),
                array (
                    'param_name' 	=> 'xaxis',
                    'type' 			=> 'textfield',
                    'heading' 		=> __('Vertical Parallax', 'pixfort-core'),
                    'admin_label'	=> false,
                    'std'			=> '0',
                    "dependency" => array(
                          "element" => "pix_scroll_parallax",
                          "value" => "scroll_parallax"
                      ),
                ),
                array (
                    'param_name' 	=> 'yaxis',
                    'type' 			=> 'textfield',
                    'heading' 		=> __('Horizontal Parallax', 'pixfort-core'),
                    'admin_label'	=> false,
                    'std'			=> '0',
                    "dependency" => array(
                          "element" => "pix_scroll_parallax",
                          "value" => "scroll_parallax"
                      ),
                ),
                array (
                    'param_name' 	=> 'pix_tilt_size',
                    'type' 			=> 'dropdown',
                    'heading' 		=> __('3d hover size', 'pixfort-core'),
                    'admin_label'	=> false,
                    'value'			=> array_flip(array(
                        'tilt'			=> 'Default',
                        'tilt_big'		=> 'Big',
                        'tilt_small' 		=> 'Small',
                    )),
                    "dependency" => array(
                          "element" => "pix_tilt",
                          "not_empty" => true
                      ),
                ),

            array (
                'param_name' 	=> 'animation',
                'type' 			=> 'dropdown',
                'heading' 		=> __('Animation', 'pixfort-core'),
                'description' 	=> __('Select the animation of the heading.', 'pixfort-core'),
                'admin_label'	=> false,
                'value'			=> pix_get_animations(),
            ),
            array (
                'param_name' 	=> 'delay',
                'type' 			=> 'textfield',
                'heading' 		=> __('Animation delay (in miliseconds)', 'pixfort-core'),
                'admin_label'	=> true,
                "dependency" => array(
                      "element" => "animation",
                      "not_empty" => true
                  ),
            ),

            array(
               "type" => "dropdown",
               "heading" => __( "Infinite Animation type", "pixfort-core" ),
               "param_name" => "pix_infinite_animation",
               "value" => $infinite_animation,
               'admin_label'	=> false,
           ),
            array(
               "type" => "dropdown",
               "heading" => __( "Infinite Animation Speed", "pixfort-core" ),
               "param_name" => "pix_infinite_speed",
               "value" => $animation_speeds,
               'admin_label'	=> false,
               "dependency" => array(
                     "element" => "pix_infinite_animation",
                     "not_empty" => true
                 ),
           ),


           // Advanced
           array (
               'param_name' 	=> 'slider_num',
               'type' 			=> 'dropdown',
               'heading' 		=> __('Slides per page', 'pixfort-core'),
               'admin_label'	=> false,
               'value' 		=> array(
                   "1" 	=> 1,
                   "2" 	=> 2,
                   "3" 	=> 3,
                   "4" 	=> 4,
                   "5" 	=> 5,
                   "6" 	=> 6,
               ),
               "std"   => 3,
                "group" => __( "Advanced", "pixfort-core" ),
           ),
           array (
               'param_name' 	=> 'slider_style',
               'type' 			=> 'dropdown',
               'heading' 		=> __('Slides style', 'pixfort-core'),
               'admin_label'	=> false,
               'std'	=> 'pix-style-standard',
               'value' 		=> array(
                   __('Standard','pixfort-core')         	        => 'pix-style-standard',
                   __('One active item','pixfort-core')         	=> 'pix-one-active',
                   __('Faded items','pixfort-core') 	            => 'pix-opacity-slider',
               ),
               "group" => __( "Advanced", "pixfort-core" ),
           ),
           array (
               'param_name' 	=> 'slider_effect',
               'type' 			=> 'dropdown',
               'heading' 		=> __('Slides effect', 'pixfort-core'),
               'admin_label'	=> false,
               'std'	=> 'pix-effect-standard',
               'value' 		=> array(
                   __('Standard','pixfort-core') 	                => 'pix-effect-standard',
                   __('Circular effect','pixfort-core') 	        => 'pix-circular-slider',
                   __('Circular Left only','pixfort-core') 	        => 'pix-circular-left',
                   __('Circular Right only','pixfort-core') 	    => 'pix-circular-right',
                    __('Fade out','pixfort-core') 	                => 'pix-fade-out-effect',
               ),
                "group" => __( "Advanced", "pixfort-core" ),
           ),

           array(
                 "type" => "checkbox",
                 "heading" => __( "Show navigation buttons", "pixfort-core" ),
                 "param_name" => "prevnextbuttons",
                 "value" => array('Yes' => true),
                 'save_always' => true,
                 'std' => true,
                 "group" => __( "Advanced", "pixfort-core" ),
             ),
           array(
                 "type" => "checkbox",
                 "heading" => __( "Dots", "pixfort-core" ),
                 "param_name" => "pagedots",
                 "value" => array('Yes' => true),
                 'std' => true,
                 'save_always' => true,
                 "group" => __( "Advanced", "pixfort-core" ),
             ),
             array (
                 'param_name' 	=> 'dots_style',
                 'type' 			=> 'dropdown',
                 'heading' 		=> __('Dots style', 'pixfort-core'),
                 'admin_label'	=> false,
                 "group" => __( "Advanced", "pixfort-core" ),
                 'value' 		=> array_flip(array(
                     ''			=> 'Default',
                     'light-dots' 	=> 'Light',
                 )),
                 "dependency" => array(
                       "element" => "pagedots",
                       "not_empty" => true
                   ),
             ),
             array (
                 'param_name' 	=> 'dots_align',
                 'type' 			=> 'dropdown',
                 'heading' 		=> __('Dots align', 'pixfort-core'),
                 'admin_label'	=> false,
                 "group" => __( "Advanced", "pixfort-core" ),
                 'value' 		=> array_flip(array(
                     ''			=> 'Center',
                     'pix-dots-left' 	=> 'Left',
                     'pix-dots-right' 	=> 'Right',
                 )),
                 "dependency" => array(
                       "element" => "pagedots",
                       "not_empty" => true
                   ),
             ),
           array(
                 "type" => "checkbox",
                 "heading" => __( "Free Scroll", "pixfort-core" ),
                 "param_name" => "freescroll",
                 "value" => array('Yes' => true),
                 'save_always' => true,
                 "group" => __( "Advanced", "pixfort-core" ),
             ),
             array (
                 'param_name' 	=> 'cellalign',
                 'type' 			=> 'dropdown',
                 'heading' 		=> __('Main cell Align', 'pixfort-core'),
                 'admin_label'	=> false,
                 'group'	=> 'Advanced',
                 'value' 		=> array_flip(array(
                     'center'			=> 'Center',
                     'left' 	=> 'Left',
                     'right' 	=> 'Right',
                 )),
             ),
             array(
                   "type" => "checkbox",
                   "heading" => __( "Scale main item", "pixfort-core" ),
                   "param_name" => "slider_scale",
                   "value" => array('Yes' => 'pix-slider-scale'),
                   'save_always' => true,
                   "group" => __( "Advanced", "pixfort-core" ),
               ),
             array (
                 'param_name' 	=> 'cellpadding',
                 'type' 			=> 'dropdown',
                 'heading' 		=> __('Cells padding', 'pixfort-core'),
                 'admin_label'	=> false,
                 'group'	=> 'Advanced',
                 'std'	=> 'pix-p-10',
                 'value' 		=> array_flip(array(
                     'p-0'			        => '0px',
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
                 )),
             ),
             array(
                   "type" => "checkbox",
                   "heading" => __( "Autoplay", "pixfort-core" ),
                   "param_name" => "autoplay",
                   "value" => array('Yes' => true),
                   'save_always' => true,
                   "group" => __( "Advanced", "pixfort-core" ),
               ),
               array (
                   'param_name' 	=> 'autoplay_time',
                   'type' 			=> 'textfield',
                   'heading' 		=> __('Autoplay time', 'pixfort-core'),
                   'description' 		=> __('The time between auto slides in milliseconds.', 'pixfort-core'),
                   'admin_label'	=> false,
                   'std'			=> '1500',
                   'group'			=> 'Advanced',
                   "dependency" => array(
                         "element" => "autoplay",
                         "not_empty" => true
                     ),
               ),
           array(
                 "type" => "checkbox",
                 "heading" => __( "Adaptive height", "pixfort-core" ),
                 "param_name" => "adaptiveheight",
                 "value" => true,
                 'save_always' => true,
                 'std' => true,
                 "group" => __( "Advanced", "pixfort-core" ),
             ),
           array(
                 "type" => "checkbox",
                 "heading" => __( "Right to Left", "pixfort-core" ),
                 "param_name" => "righttoleft",
                 "value" => true,
                 'save_always' => true,
                 "group" => __( "Advanced", "pixfort-core" ),
             ),
           array(
                 "type" => "checkbox",
                 "heading" => __( "Wrap slides", "pixfort-core" ),
                 "param_name" => "slider_wrap",
                 "value" => true,
                 "std" => true,
                 'save_always' => true,
                 "group" => __( "Advanced", "pixfort-core" ),
             ),
           array(
                 "type" => "checkbox",
                 "heading" => __( "Increase vertical view", "pixfort-core" ),
                 "param_name" => "visible_y",
                 "value" => array("Yes" => 'pix-overflow-y-visible'),
                 'save_always' => true,
                 "group" => __( "Advanced", "pixfort-core" ),
             ),
           array(
                 "type" => "checkbox",
                 "heading" => __( "Visible overflow", "pixfort-core" ),
                 "description" => "slides outside the slider view box will be visible.",
                 "param_name" => "visible_overflow",
                 "value" => array("Yes" => 'pix-overflow-all-visible'),
                 'save_always' => true,
                 "group" => __( "Advanced", "pixfort-core" ),
             ),


            array(
              'type' => 'css_editor',
              'heading' => __( 'Css', 'pixfort-core' ),
              'param_name' => 'css',
              'group' => __( 'Design options', 'pixfort-core' ),
              ),
        ),
        $effects_params
    )
));

 ?>
