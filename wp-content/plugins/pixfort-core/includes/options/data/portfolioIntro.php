<?php

$pixfortBuilder->addOption(
	'pix-heading-portfolio-intro',
	[
		'type'             => 'heading',
		'label'         => 'Portfolio Intro',
		'tab'             => 'portfolioIntro',
		'icon'            => 'intro',
		// 'linkText'            => __('Learn more about blog', 'pixfort-core'),
		// 'linkHref'            => 'https://essentials.pixfort.com/knowledge-base/how-to-create-the-blog-page/',
		// 'linkIcon'            => 'bookmark'
	]
);
$pixfortBuilder->addOption(
    'portfolio-with-intro',
    [
        'type' => 'checkbox',
        'label' => __('Enable Portfolio Pages Intro', 'pixfort-core'),
        'description' => __('Add intro section at the beginning of the portfolio.', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '1',
        'tab'             => 'portfolioIntro'
    ]
);
$pixfortBuilder->addOption(
    'portfolio-divider-style',
    [
        'type' => 'radio',
        'label' => 'Portfolio Intro Divider Style',
        'description' => __('Choose the shape of the intro divider.', 'pixfort-core'),
        'default' => '0',
        'tab'             => 'portfolioIntro',
        'imageSize'       => '130',
        'width'				=> 130,
		'height'			=> 86,
        'options'        => $opts_dividers,
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
        'hideBorderBottom'      => true,
    ]
);
$pixfortBuilder->addOption(
    'pix-portfolio-intro-style-alert',
    [
        'type'             => 'alert',
        'tab'             => 'portfolioIntro',
        'description'     => __('The intro divider color is the same as the portfolio background color set in Portfolio → General → Portfolio Background Color', 'pixfort-core'),
        'hidePaddingBottom' => false,
        'hidePaddingTop' => true,
        'style' => 'clean',
        'icon'  =>  'info',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-divider-height',
    [
        'type' => 'text',
        'label' => __('Custom Divider Height (Optional)', 'pixfort-core'),
        'tab'             => 'portfolioIntro',
        'description' => __('Leave empty to use the default height for each divider.', 'pixfort-core'),
        'placeholder' => __('For example: 400px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
        'showBorderTop'   => true,
    ]
);
$pixfortBuilder->addOption(
    'portfolio-intro-img',
    [
        'type'             => 'media',
        'label'         => __('Portfolio Intro background image', 'pixfort-core'),
        'default'         => '',
        'tab'             => 'portfolioIntro',
        'showBorderTop'   => false,
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
        'removePadding'       => true,
    ]
);
$pixfortBuilder->addOption(
    'portfolio-intro-light',
    [
        'type' => 'checkbox',
        'label' => __('Enable Light Portfolio Intro Text', 'pixfort-core'),
        'description' => __('Disable to display dark text in the intro.', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '1',
        'tab'             => 'portfolioIntro',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-intro-align',
    [
        'type' => 'select',
        'label' => __('Portfolio Intro Text Align', 'pixfort-core'),
        'default'             => 'text-center',
        'options' => [
            'text-left'   => __('Left', 'pixfort-core'),
            'text-center'   => __('Center', 'pixfort-core'),
            'text-right'   => __('Right', 'pixfort-core')
        ],
        'tab'             => 'portfolioIntro',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-intr-bg-color',
    [
        'type' => 'select',
        'label' => __('Portfolio Intro Overlay Color', 'pixfort-core'),
        'options' => array_flip($bg_colors_no_custom),
        'default'             => 'primary',
        'tab'             => 'portfolioIntro',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-intro-opacity',
    [
        'type' => 'select',
        'label' => __('Portfolio Intro Overlay Opacity', 'pixfort-core'),
        'default'             => 'pix-opacity-2',
        'tab'             => 'portfolioIntro',
        'options' => [
            'pix-opacity-10'   => "0%",
                'pix-opacity-9'   => "10%",
                'pix-opacity-8'   => "20%",
                'pix-opacity-7'   => "30%",
                'pix-opacity-6'   => "40%",
                'pix-opacity-5'   => "50%",
                'pix-opacity-4'   => "60%",
                'pix-opacity-3'   => "70%",
                'pix-opacity-2'   => "80%",
                'pix-opacity-1'   => "90%",
                'pix-opacity-0'   => "100%",
        ],
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-disable-title-animation',
    [
        'type' => 'checkbox',
        'label' => __('Disable Portfolio Intro Title Animation', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'portfolioIntro'
    ]
);
$pixfortBuilder->addOption(
    'portfolio-disable-intro-title',
    [
        'type' => 'checkbox',
        'label' => __('Disable Portfolio Intro Title', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'portfolioIntro',
        'hideBorderBottom'  => true,
    ]
);
$pixfortBuilder->addOption(
    'portfolio-disable-intro-breadcrumbs',
    [
        'type' => 'checkbox',
        'label' => __('Disable Portfolio Intro Breadcrumbs', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'portfolioIntro',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
        'showBorderTop'  => true,
    ]
);
$pixfortBuilder->addOption(
    'portfolio-disable-intro-parallax',
    [
        'type' => 'checkbox',
        'label' => __('Disable Intro Parallax Effect', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'portfolioIntro',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-intro-top-height',
    [
        'type' => 'text',
        'label' => __('Custom Top padding (Optional)', 'pixfort-core'),
        'tab'             => 'portfolioIntro',
        'description' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-intro-bottom-height',
    [
        'type' => 'text',
        'label' => __('Custom Bottom Padding (Optional)', 'pixfort-core'),
        'tab'             => 'portfolioIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-mobile-intro-top-height',
    [
        'type' => 'text',
        'label' => __('Custom Mobile Top Padding (Optional)', 'pixfort-core'),
        'tab'             => 'portfolioIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'portfolio-mobile-intro-bottom-height',
    [
        'type' => 'text',
        'label' => __('Custom Mobile Bottom Padding (Optional)', 'pixfort-core'),
        'tab'             => 'portfolioIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'portfolio-with-intro',
            'val' => ['1', true]
        ],
        'hideBorderBottom'  => true,
    ]
);