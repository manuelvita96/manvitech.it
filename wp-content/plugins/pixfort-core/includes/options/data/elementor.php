<?php

/*
*   Elementor
*/
$pixfortBuilder->addOption(
    'pix-disable-elementor-demo',
    [
        'type' => 'checkbox',
        'label' => __('Disable pixfort Demo Blocks', 'pixfort-core'),
        'description' => __('If you disable pixfort Templates blocks from Elementor library you will see the default Elementor blocks instead.', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'elementor'
    ]
);
$pixfortBuilder->addOption(
    'pix-add-default-container',
    [
        'type' => 'checkbox',
        'label' => __('Add Default Page Container in Elementor', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'elementor'
    ]
);
$pixfortBuilder->addOption(
    'pix-enable-elementor-loader',
    [
        'type' => 'checkbox',
        'label' => __('Enable Direct Elementor Loader', 'pixfort-core'),
        'description' => __('If you are facing issues with loading Elementor parts of the site because of any external third party plugins you can enable this option for direct Elementor builder loading.', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'elementor'
    ]
);
$pixfortBuilder->addOption(
    'pix-disable-elementor-theme-fonts',
    [
        'type' => 'checkbox',
        'label' => __('Disable Adding Theme fonts Inside Elementor', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'elementor',
        'hideBorderBottom'   => true
    ]
);
