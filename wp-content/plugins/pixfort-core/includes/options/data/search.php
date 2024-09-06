<?php

$pixfortBuilder->addOption(
	'pix-heading-search',
	[
		'type'             => 'heading',
		'label' => __('Search', 'pixfort-core'),
		'tab'             => 'search',
		'icon'            => 'browserSearch',
		'linkText'            => __('Learn more about search', 'pixfort-core'),
		'linkHref'            => 'https://essentials.pixfort.com/knowledge-base/customize-website-search-bar/',
		'linkIcon'            => 'bookmark'
	]
);
$pixfortBuilder->addOption(
	'search-style',
	[
		'type' => 'radio',
		'label' => __('Default Search Overlay Style', 'pixfort-core'),
		'default' => '2',
		'tab'             => 'search',
		// 'imageSize'       => '130',
		'width'				=> 100,
		'height'			=> 73,
		'description' => __('Choose the default search overlay animation style.', 'pixfort-core'),
		'options'        => array(
			[
				'name'            => 'ZigZag',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/search/search-style-zigzag.webp',
				'value'            => '1'
			],
			[
				'name'            => 'Default Waves',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/search/search-style-default-waves.webp',
				'value'            => '2'
			],
			[
				'name'            => 'Paper Slides',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/search/search-style-paper-slides.webp',
				'value'            => '3'
			],
			[
				'name'            => 'Side Waves',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/search/search-style-side-waves.webp',
				'value'            => '4'
			],
			[
				'name'            => 'Time Machine',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/search/search-style-time-machine.webp',
				'value'            => '5'
			],
			[
				'name'            => 'Silly Waves',
				'image'            => PIX_CORE_PLUGIN_URI . 'includes/assets/core-options/thumbnails/search/search-style-silly-waves.webp',
				'value'            => '6'
			]
		),
	]
);
$pixfortBuilder->addOption(
	'opt-slider-label',
	[
		'type' => 'range',
		'label' => __('Default Search Overlay Layers', 'pixfort-core'),
		'description' => __('Choose the number of the search overlay animation layers.', 'pixfort-core'),
		'responsive' => false,
		'hideBorderBottom'  => true,
		'tooltipText'   => __('You can choose the number of layers for the default search animation (between 1 and 4).', 'pixfort-core'),
		'tooltipImage'   => PIX_CORE_PLUGIN_URI . '/includes/assets/core-options/tooltips/core-options-tooltip-search-layers-number.webp',
		'tab'             => 'search',
		'default' => '3',
		'min'             => '1',
		'max'             => '4',
	]
);
$pixfortBuilder->addOption(
	'pix-heading-search-colors',
	[
		'type'             => 'heading',
		'label' => __('Layer Colors', 'pixfort-core'),
		'tab'             => 'search',
		'icon'            => 'colorPalette',
	]
);
$pixfortBuilder->addOption(
	'overlay-color-1-primary',
	[
		'type' => 'checkbox',
		'label' => __('Use Primary Gradient for First Layer', 'pixfort-core'),
		'description' => __('Primary gradient color is set from Layout → Colors tab.', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '0',
		'tab'             => 'search'
	]
);
$pixfortBuilder->addOption(
	'overlay-color-1',
	[
		'type' => 'gradient',
		'label' => __('Layer 1 Gradient Color', 'pixfort-core'),
		'description' => __('Pick colors for the first layer.', 'pixfort-core'),
		'tab'             => 'search',
		'default'  => [
			'from' => '#7d8dff',
			'to'   => '#ff4f81',
		],
		'disableAlpha'         => true,
		'enableReset'	  => true,
		'dependency'        => [
			'field'             => 'overlay-color-1-primary',
			'val'               => ['0', false],
		]
	]
);
$pixfortBuilder->addOption(
	'overlay-color-2',
	[
		'type' => 'gradient',
		'label' => __('Layer 2 Gradient Color', 'pixfort-core'),
		'description' => __('Pick colors for the first layer.', 'pixfort-core'),
		'tab'             => 'search',
		'default'  => [
			'from' => '#7d8dff',
			'to'   => '#ff4f81',
		],
		'disableAlpha'         => true,
		'enableReset'	  => true,
		'dependency'        => [
			'field'             => 'opt-slider-label',
			'val'               => ['2'],
			'op'                => '>='
		]
	]
);
$pixfortBuilder->addOption(
	'overlay-color-3',
	[
		'type' => 'gradient',
		'label' => __('Layer 3 Gradient Color', 'pixfort-core'),
		'description' => __('Pick colors for the first layer.', 'pixfort-core'),
		'tab'             => 'search',
		'default'  => [
			'from' => '#7d8dff',
			'to'   => '#ff4f81',
		],
		'disableAlpha'         => true,
		'enableReset'	  => true,
		'dependency'        => [
			'field'             => 'opt-slider-label',
			'val'               => ['3'],
			'op'                => '>='
		]
	]
);
$pixfortBuilder->addOption(
	'overlay-color-4',
	[
		'type' => 'gradient',
		'label' => __('Layer 4 Gradient Color', 'pixfort-core'),
		'description' => __('Pick colors for the first layer.', 'pixfort-core'),
		'tab'             => 'search',
		'default'  => [
			'from' => '#7d8dff',
			'to'   => '#ff4f81',
		],
		'disableAlpha'         => true,
		'enableReset'	  => true,
		'dependency'        => [
			'field'             => 'opt-slider-label',
			'val'               => ['4'],
			'op'                => '>='
		]
	]
);
$pixfortBuilder->addOption(
	'search-dark-overlay',
	[
		'type' => 'checkbox',
		'label' => __('Use Dark Text Colors for Search Overlay', 'pixfort-core'),
		'description' => __('Default theme text colors are set from the Typograpy tab.', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '0',
		'tab'             => 'search'
	]
);
$pixfortBuilder->addOption(
	'pix-search-alert',
	[
		'type'             => 'alert',
		'tab'             => 'search',
		'label'     => __('Looking to Create Custom Search Popup?', 'pixfort-core'),
		'description'     => __('Check the article below from our knwoledge base:', 'pixfort-core'),
		'hidePaddingBottom' => false,
		'style' => 'simple',
		'icon'  =>  'info',
		'linkOneText'  =>  __('Check article', 'pixfort-core'),
		'linkOneHref'  =>  'https://essentials.pixfort.com/knowledge-base/customize-website-search-bar/#pix_section_custom_search',
		'linkOneIcon'  =>  'bookmark'
	]
);
