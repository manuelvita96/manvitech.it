<?php


$pixfortBuilder->addOption(
    'pix-heading-colors',
    [
        'type'             => 'heading',
        'label'         => 'Main Colors',
        'tab'             => 'colors',
        'icon'            => 'colorPalette',
        'linkText'            => __('Learn more about color system', 'pixfort-core'),
		'linkHref'            => 'https://essentials.pixfort.com/knowledge-base/essentials-color-system/',
		'linkIcon'            => 'bookmark'
    ]
);

$pixfortBuilder->addOption(
	'opt-primary-color',
	[
		'type'             => 'color',
		'label' => __('Primary Color', 'pixfort-core'),
		'description' => __('The main color used widely across your site that represents your brand.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'  => '#7d8dff',
		'disableAlpha'         => true,
	]
);
$pixfortBuilder->addOption(
	'opt-secondary-color',
	[
		'type' => 'color',
		'label' => __('Secondary Color', 'pixfort-core'),
		'description' => __('A complementary color for secondary features and background accents.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'  => '#ff4f81',
		'disableAlpha'         => true,
	]
);
$pixfortBuilder->addOption(
	'opt-link-color',
	[
		'type' => 'color',
		'label' => __('Link Color', 'pixfort-core'),
		'description' => __('Defines the color for hyperlink text in website.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'  => '#333333',
		'disableAlpha'         => true,
		'hideBorderBottom'  => true
	]
);
/*
*   Primary Gradient color
*/
$pixfortBuilder->addOption(
	'pix-heading-colors-primary-gradient',
	[
		'type'             => 'heading',
		'label'         => 'Primary Gradient Color',
		'tab'             => 'colors',
		'icon'            => 'style',
		'hidePaddingTop' => true,
	]
);
$pixfortBuilder->addOption(
	'opt-primary-gradient-switch',
	[
		'type' => 'checkbox',
		'label' => __('Use 3 Gradient Color Stops', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '0',
		'tab'             => 'colors'
	]
);
$pixfortBuilder->addOption(
	'opt-color-gradient-primary-1',
	[
		'type' => 'color',
		'label' => __('Starting Gradient Color (Left)', 'pixfort-core'),
		// 'description' => __('Pick the link color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#7d8dff',
		'disableAlpha'         => true,
	]
);
$pixfortBuilder->addOption(
	'opt-color-gradient-primary-middle',
	[
		'type' => 'color',
		'label' => __('Middle Gradient Color', 'pixfort-core'),
		// 'description' => __('Pick the link color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#4ed199',
		'disableAlpha'         => true,
		'dependency' => [
			'field' => 'opt-primary-gradient-switch',
			'val' => ['1', true],
		]
	]
);
$pixfortBuilder->addOption(
	'opt-color-gradient-primary-2',
	[
		'type' => 'color',
		'label' => __('Ending Gradient Color (Right)', 'pixfort-core'),
		// 'description' => __('Pick the link color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#ff4f81',
		'disableAlpha'         => true,
	]
);
$pixfortBuilder->addOption(
	'opt-primary-gradient-dir',
	[
		'type' => 'select',
		'label' => __('Gradient Direction', 'pixfort-core'),
		'tab'             => 'colors',
		'default'   => 'to right',
		'options' => [
			"to right"            => __('Left to right', 'pixfort-core'),
			"to top"        => __('Bottom to top', 'pixfort-core'),
			"to top right"        => __('Bottom left to top right', 'pixfort-core'),
			"to bottom right"        => __('Top left to bottom right', 'pixfort-core'),
		]
	]
);
$pixfortBuilder->addOption(
	'disable-fixed-gradient',
	[
		'type' => 'checkbox',
		'label' => __('Disable Fixed Gradients', 'pixfort-core'),
		// 'description' => __('Fixed gradient colors slow down the website in some browsers, please disable the fixed gradient if it\' affecting website performance.', 'pixfort-core'),
		'tooltipText'   => __('Fixed gradient colors slow down the website in some browsers, please disable the fixed gradient if it\'s affecting website performance.', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '0',
		'tab'             => 'colors',
		'hideBorderBottom'  => true
	]
);
/*
*   Main colors
*/
$pixfortBuilder->addOption(
	'pix-heading-colors-main-colors',
	[
		'type'             => 'heading',
		'label'         => 'Basic Colors',
		'tab'             => 'colors',
		'icon'            => 'colors'
	]
);
$pixfortBuilder->addOption(
	'opt-color-blue',
	[
		'type' => 'color',
		'label' => __('Blue Color', 'pixfort-core'),
		'description' => __('Pick the blue color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'  => '#1274e7',
		'disableAlpha'         => true,
		'enableReset'	  => true,
	]
);

$pixfortBuilder->addOption(
	'opt-color-green',
	[
		'type' => 'color',
		'label' => __('Green Color', 'pixfort-core'),
		'description' => __('Pick the green color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#4ed199',
		'disableAlpha'         => true,
		'enableReset'	  => true,
	]
);

$pixfortBuilder->addOption(
	'opt-color-cyan',
	[
		'type' => 'color',
		'label' => __('Cyan Color', 'pixfort-core'),
		'description' => __('Pick the cyan color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#0dd3ff',
		'disableAlpha'         => true,
		'enableReset'	  => true,
	]
);

$pixfortBuilder->addOption(
	'opt-color-yellow',
	[
		'type' => 'color',
		'label' => __('Yellow Color', 'pixfort-core'),
		'description' => __('Pick the yellow color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#ffc168',
		'disableAlpha'         => true,
		'enableReset'	  => true,
	]
);

$pixfortBuilder->addOption(
	'opt-color-orange',
	[
		'type' => 'color',
		'label' => __('Orange Color', 'pixfort-core'),
		'description' => __('Pick the orange color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#ff9900',
		'disableAlpha'         => true,
		'enableReset'	  => true,
	]
);

$pixfortBuilder->addOption(
	'opt-color-red',
	[
		'type' => 'color',
		'label' => __('Red Color', 'pixfort-core'),
		'description' => __('Pick the red color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#ff6c5f',
		'disableAlpha'         => true,
		'enableReset'	  => true,
	]
);

$pixfortBuilder->addOption(
	'opt-color-brown',
	[
		'type' => 'color',
		'label' => __('Brown Color', 'pixfort-core'),
		'description' => __('Pick the brown color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#b4a996',
		'disableAlpha'         => true,
		'enableReset'	  => true,
	]
);

$pixfortBuilder->addOption(
	'opt-color-purple',
	[
		'type' => 'color',
		'label' => __('Purple Color', 'pixfort-core'),
		'description' => __('Pick the purple color for the theme.', 'pixfort-core'),
		'tab'             => 'colors',
		'default'         => '#4b19f7',
		'disableAlpha'         => true,
		'hideBorderBottom'  => true,
		'enableReset'	  => true,
	]
);
