<?php

$pixfortBuilder->addOption(
	'pix-disable-blog-author-box',
	[
		'type' => 'checkbox',
		'label' => __('Disable Post Author Box', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '0',
		'tab'             => 'blogAdvanced'
	]
);
$pixfortBuilder->addOption(
	'pix-disable-blog-social',
	[
		'type' => 'checkbox',
		'label' => __('Disable Post Social Share Buttons', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '0',
		'tab'             => 'blogAdvanced'
	]
);
$pixfortBuilder->addOption(
	'pix-disable-blog-related',
	[
		'type' => 'checkbox',
		'label' => __('Disable Related Posts', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '0',
		'tab'             => 'blogAdvanced'
	]
);
$pixfortBuilder->addOption(
	'pix-blog-related-count',
	[
		'type' => 'select',
		'label' => __('Number of related posts', 'pixfort-core'),
		'default'             => '4',
		'options' => [
			'2'   => "2",
			'3'   => "3",
			'4'   => __('4 (Default)', 'pixfort-core')
		],
		'dependency' => [
            'field' => 'pix-disable-blog-related',
            'val' => ['0', false]
        ],
		'tab'             => 'blogAdvanced',
	]
);
$pixfortBuilder->addOption(
	'pix-blog-related-style',
	[
		'type' => 'radio',
		'label' => 'Related Posts Style',
		'default' => 'full-img',
		'tab'             => 'blogAdvanced',
		'imageSize'       => '130',
		'width'				=> 130,
		'height'			=> 86,
		'options'        => array(
			[
				'name'            => 'Default',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/blog/style-default.svg',
				'value'            => 'default'
			],
			[
				'name'            => 'With Padding',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/blog/style-with-padding.svg',
				'value'            => 'with-padding'
			],
			[
				'name'            => 'Full Image',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/blog/style-full-image.svg',
				'value'            => 'full-img'
			]
		),
		'dependency' => [
            'field' => 'pix-disable-blog-related',
            'val' => ['0', false]
        ],
	]
);
$pixfortBuilder->addOption(
	'pix-enable-blog-line-breaks',
	[
		'type' => 'checkbox',
		'label' => __('Enable Default Posts Line Breaks', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '0',
		'tab'             => 'blogAdvanced',
		'hideBorderBottom'      => true
	]
);
