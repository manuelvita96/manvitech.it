<?php

$pixfortBuilder->addOption(
	'pix-heading-blog-intro',
	[
		'type'             => 'heading',
		'label'         => 'Blog Intro',
		'tab'             => 'blogIntro',
		'icon'            => 'intro',
		'linkText'            => __('Learn more about intro section', 'pixfort-core'),
		'linkHref'            => 'https://essentials.pixfort.com/knowledge-base/customize-page-intro-section/',
		'linkIcon'            => 'bookmark'
	]
);
$pixfortBuilder->addOption(
    'post-with-intro',
    [
        'type' => 'checkbox',
        'label' => __('Enable Blog Posts Intro', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '1',
        'tab'             => 'blogIntro',
        'tooltipText'     => __('The Intro Section is the first section in the page after the header, which contains the page title and breadcrumbs.', 'pixfort-core') . '<br/><br/>' . __('For more information ', 'pixfort-core') . '<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/customize-page-intro-section/" target="_blank" class="text-primary font-semibold">check this article</a>',
        'tooltipImage'   => PIX_CORE_PLUGIN_URI . '/includes/assets/core-options/tooltips/core-options-tooltip-page-intro-section.webp',
    ]
);
$pixfortBuilder->addOption(
    'blog-divider-style',
    [
        'type' => 'radio',
        'label' => 'Blog Divider Style',
        'default' => '0',
        'tab'             => 'blogIntro',
        'imageSize'       => '130',
        'options'        => $opts_dividers,
        'width'				=> 130,
		'height'			=> 86,
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
        'hideBorderBottom'      => true,
    ]
);
$pixfortBuilder->addOption(
    'pix-blog-intro-style-alert',
    [
        'type'             => 'alert',
        'tab'             => 'blogIntro',
        'description'     => __('The intro divider color is the same as the blog background color set in Blog → General → Blog Background Color', 'pixfort-core'),
        'hidePaddingBottom' => false,
        'hidePaddingTop' => true,
        'style' => 'clean',
        'icon'  =>  'info',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-divider-height',
    [
        'type' => 'text',
        'label' => __('Custom Divider Height (Optional)', 'pixfort-core'),
        'tab'             => 'blogIntro',
        'description' => __('Leave empty to use the default height for each divider.', 'pixfort-core'),
        'placeholder' => __('For example: 400px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
        'showBorderTop'   => true,
    ]
);
$pixfortBuilder->addOption(
    'blog-intro-img',
    [
        'type'             => 'media',
        'label'         => __('Blog Intro Background Image', 'pixfort-core'),
        'default'         => '',
        'tab'             => 'blogIntro',
        'showBorderTop'   => false,
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
        'removePadding'       => true,
    ]
);
$pixfortBuilder->addOption(
    'blog-intro-light',
    [
        'type' => 'checkbox',
        'label' => __('Enable Blog Light Intro Text', 'pixfort-core'),
        'description' => __('Disable to display dark text in the intro.', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '1',
        'tab'             => 'blogIntro',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-intro-align',
    [
        'type' => 'select',
        'label' => __('Blog Intro Text Align', 'pixfort-core'),
        'default'             => 'text-center',
        'options' => [
            'text-left'   => __('Left', 'pixfort-core'),
            'text-center'   => __('Center', 'pixfort-core'),
            'text-right'   => __('Right', 'pixfort-core')
        ],
        'tab'             => 'blogIntro',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-intr-bg-color',
    [
        'type' => 'select',
        'label' => __('Blog Intro Overlay Color', 'pixfort-core'),
        'options' => array_flip($bg_colors_no_custom),
        'default'             => 'primary',
        'tab'             => 'blogIntro',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-intro-opacity',
    [
        'type' => 'select',
        'label' => __('Blog Intro Overlay Opacity', 'pixfort-core'),
        'default'             => 'pix-opacity-2',
        'tab'             => 'blogIntro',
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
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-disable-title-animation',
    [
        'type' => 'checkbox',
        'label' => __('Disable Title Animation', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'blogIntro'
    ]
);
$pixfortBuilder->addOption(
    'blog-disable-intro-title',
    [
        'type' => 'checkbox',
        'label' => __('Disable Title', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'blogIntro',
        'hideBorderBottom'  => true,
    ]
);
$pixfortBuilder->addOption(
    'blog-disable-intro-breadcrumbs',
    [
        'type' => 'checkbox',
        'label' => __('Disable Intro Breadcrumbs', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'blogIntro',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
        'showBorderTop'  => true,
    ]
);
$pixfortBuilder->addOption(
    'blog-disable-intro-parallax',
    [
        'type' => 'checkbox',
        'label' => __('Disable Intro Parallax Effect', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'blogIntro',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-intro-top-height',
    [
        'type' => 'text',
        'label' => __('Custom Intro Top Padding (Optional)', 'pixfort-core'),
        'tab'             => 'blogIntro',
        'description' => __('Leave empty to use the default top padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-intro-bottom-height',
    [
        'type' => 'text',
        'label' => __('Custom Intro Bottom Padding (Optional)', 'pixfort-core'),
        'tab'             => 'blogIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-mobile-intro-top-height',
    [
        'type' => 'text',
        'label' => __('Custom Intro Mobile Top Padding (Optional)', 'pixfort-core'),
        'tab'             => 'blogIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
    ]
);
$pixfortBuilder->addOption(
    'blog-mobile-intro-bottom-height',
    [
        'type' => 'text',
        'label' => __('Custom Intro Mobile Bottom Padding (Optional)', 'pixfort-core'),
        'tab'             => 'blogIntro',
        'description' => __('Leave empty to use the default bottom padding for the intro.', 'pixfort-core'),
        'placeholder' => __('For example: 200px', 'pixfort-core'),
        'default'  => '',
        'dependency' => [
            'field' => 'post-with-intro',
            'val' => ['1', true]
        ],
        'hideBorderBottom'  => true,
    ]
);