<?php

$pixfortBuilder->addOption(
	'pix-heading-shop-intro',
	[
		'type'             => 'heading',
		'label'         => 'Shop Intro',
		'tab'             => 'shopIntro',
		'icon'            => 'intro',
		'linkText'            => __('Learn more about intro section', 'pixfort-core'),
		'linkHref'            => 'https://essentials.pixfort.com/knowledge-base/customize-page-intro-section/',
		'linkIcon'            => 'bookmark'
	]
);
$pixfortBuilder->addOption(
    'shop-with-intro',
    [
        'type' => 'checkbox',
        'label' => __('Enable Shop Intro', 'pixfort-core'),
        'description' => __('Add intro section at the beginning of the Shop.', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '1',
        'tab'             => 'shopIntro',
        'tooltipText'     => __('The Intro Section is the first section in the page after the header, which contains the page title and breadcrumbs.', 'pixfort-core') . '<br/><br/>' . __('For more information ', 'pixfort-core') . '<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/customize-page-intro-section/" target="_blank" class="text-primary font-semibold">check this article</a>',
        'tooltipImage'   => PIX_CORE_PLUGIN_URI . '/includes/assets/core-options/tooltips/core-options-tooltip-page-intro-section.webp',
    ]
);
$pixfortBuilder->addOption(
    'shop-divider-style',
    [
        'type' => 'radio',
        'label' => 'Shop Divider Style',
        'default' => '0',
        'tab'             => 'shopIntro',
        'imageSize'       => '130',
        'width'				=> 130,
		'height'			=> 86,
        'options'        => $opts_dividers,
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
        'hideBorderBottom'      => true,
    ]
);
$pixfortBuilder->addOption(
    'pix-shop-intro-style-alert',
    [
        'type'             => 'alert',
        'tab'             => 'shopIntro',
        'description'     => __('The intro divider color is the same as the shop background color set in Shop → General → Shop Background Color', 'pixfort-core'),
        'hidePaddingBottom' => false,
        'hidePaddingTop' => true,
        'style' => 'clean',
        'icon'  =>  'info',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-divider-height',
    [
        'type' => 'text',
        'label' => __('Custom Divider Height (Optional)', 'pixfort-core'),
        'tab'             => 'shopIntro',
        'description' => __('Leave empty to use the default height for each divider.', 'pixfort-core'),
        'placeholder' => __('For example: 400px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
        'showBorderTop'   => true,
    ]
);
$pixfortBuilder->addOption(
    'shop-intro-img',
    [
        'type'             => 'media',
        'label'         => __('Shop Intro Background Image', 'pixfort-core'),
        'default'         => '',
        'tab'             => 'shopIntro',
        'showBorderTop'   => false,
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
        'removePadding'       => true,
    ]
);
$pixfortBuilder->addOption(
    'shop-intro-light',
    [
        'type' => 'checkbox',
        'label' => __('Enable Light Shop Intro Text', 'pixfort-core'),
        'description' => __('Disable to display dark text in the intro.', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '1',
        'tab'             => 'shopIntro',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-intro-align',
    [
        'type' => 'select',
        'label' => __('Shop Intro Text Align', 'pixfort-core'),
        'default'             => 'text-center',
        'options' => [
            'text-left'   => __('Left', 'pixfort-core'),
            'text-center'   => __('Center', 'pixfort-core'),
            'text-right'   => __('Right', 'pixfort-core')
        ],
        'tab'             => 'shopIntro',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-intr-bg-color',
    [
        'type' => 'select',
        'label' => __('Shop Intro Overlay Color', 'pixfort-core'),
        'options' => array_flip($bg_colors_no_custom),
        'default'             => 'primary',
        'tab'             => 'shopIntro',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-intro-opacity',
    [
        'type' => 'select',
        'label' => __('Shop Intro Overlay Opacity', 'pixfort-core'),
        'default'             => 'pix-opacity-2',
        'tab'             => 'shopIntro',
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
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-disable-title-animation',
    [
        'type' => 'checkbox',
        'label' => __('Disable Title Animation', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'shopIntro'
    ]
);
$pixfortBuilder->addOption(
    'shop-disable-intro-title',
    [
        'type' => 'checkbox',
        'label' => __('Disable Title', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'shopIntro',
        'hideBorderBottom'  => true,
    ]
);
$pixfortBuilder->addOption(
    'shop-disable-intro-breadcrumbs',
    [
        'type' => 'checkbox',
        'label' => __('Disable Breadcrumbs', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'shopIntro',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
        'showBorderTop'  => true,
    ]
);
$pixfortBuilder->addOption(
    'shop-disable-intro-parallax',
    [
        'type' => 'checkbox',
        'label' => __('Disable Intro Parallax Effect', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'shopIntro',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-intro-top-height',
    [
        'type' => 'text',
        'label' => __('Custom Intro Top Padding (Optional)', 'pixfort-core'),
        'tab'             => 'shopIntro',
        'description' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-intro-bottom-height',
    [
        'type' => 'text',
        'label' => __('Custom Intro Bottom Padding (Optional)', 'pixfort-core'),
        'tab'             => 'shopIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-mobile-intro-top-height',
    [
        'type' => 'text',
        'label' => __('Custom Intro Mobile Top Padding (Optional)', 'pixfort-core'),
        'tab'             => 'shopIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'shop-mobile-intro-bottom-height',
    [
        'type' => 'text',
        'label' => __('Custom Intro Mobile Bottom Padding (Optional)', 'pixfort-core'),
        'tab'             => 'shopIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'shop-with-intro',
            'val' => ['1', true]
        ],
        'hideBorderBottom'  => true,
    ]
);