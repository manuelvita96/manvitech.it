<?php

/*
    *   General > Advanced
    */
// $pixfortBuilder->addOption(
//     'pix-disable-lazy-images',
//     [
//         'type' => 'checkbox',
//         'label' => __('Disable Image Lazy Loading', 'pixfort-core'),
//         'description' => __('Lazy loading will delay the loading of some images until they are needed in the page which improves the page performance. Please note that if you also have another lazy loading function in a different third party plugin then you should disable one of them.', 'pixfort-core'),
//         'options'         => array('1' => 'On', '0' => 'Off'),
//         'default'           => '0',
//         'tab'             => 'advanced',
//         'hideBorderBottom'   => true
//     ]
// );
$pixfortBuilder->addOption(
    'pix-heading-cursor',
    [
        'type'             => 'heading',
        'label'         => 'Custom Cursor',
        'tab'             => 'advanced',
        'icon'            => 'cursor'
    ]
);
$pixfortBuilder->addOption(
    'pix-custom-cursor',
    [
        'type' => 'checkbox',
        'label' => __('Enable Custom Cursor', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'advanced',
        'hideBorderBottom'   => true
    ]
);
$pixfortBuilder->addOption(
    'pix-cursor-color',
    [
        'type' => 'select',
        'label' => __('Cursor Background Color', 'pixfort-core'),
        'tab'             => 'advanced',
        'default'   => 'default',
        'showBorderTop'   => true,
        'options' => array_merge(
            array(
                'default'   => 'Default',
                'exclusion'   => 'Exclusion'
            ),
            array_flip($bg_colors_no_custom)
        ),
        'dependency' => [
            'field' => 'pix-custom-cursor',
            'val' => ['0', false],
            'op'                => '!='
        ]
    ]
);
$pixfortBuilder->addOption(
    'pix-disalbe-default-cursor',
    [
        'type' => 'checkbox',
        'label' => __('Disable Default Cursor', 'pixfort-core'),
        'options'         => array('1' => 'On', '0' => 'Off'),
        'default'           => '0',
        'tab'             => 'advanced',
        'dependency' => [
            'field' => 'pix-custom-cursor',
            'val' => ['0', false],
            'op'                => '!='
        ],
        'hideBorderBottom'   => true
    ]
);
