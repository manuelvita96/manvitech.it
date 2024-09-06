<?php

$pixfortBuilder->addOption(
    'pic-custom-css',
    [
        'type' => 'code',
        'label' => 'Custom CSS',
        'tab'             => 'layoutAdvanced',
        'description'     => __('Add custom CSS to your website.', 'pixfort-core'),
    ]
);
$pixfortBuilder->addOption(
    'pix-custom-js-header',
    [
        'type' => 'code',
        'label' => 'Custom JS (in Header)',
        'tab'             => 'layoutAdvanced',
        'mode'             => 'javascript',
        'description'     => __('Add custom Javascript code to your website header.', 'pixfort-core'),
    ]
);
$pixfortBuilder->addOption(
    'pix-custom-js-footer',
    [
        'type' => 'code',
        'label' => 'Custom JS (in Footer)',
        'tab'             => 'layoutAdvanced',
        'mode'             => 'javascript',
        'description'     => __('Add custom Javascript code to your website footer.', 'pixfort-core'),
    ]
);
$pixfortBuilder->addOption(
    'pix-custom-header-includes',
    [
        'type' => 'code',
        'label' => 'Custom Header Tags Include',
        'tab'             => 'layoutAdvanced',
        'mode'             => 'html',
        'description'     => __('Add custom code to your website header (for example external tags and scripts).', 'pixfort-core'),
    ]
);
$pixfortBuilder->addOption(
    'pix-custom-container-width',
    [
        'type' => 'text',
        'label' => __('Custom Website Width', 'pixfort-core'),
        'tab'             => 'layoutAdvanced',
        'description' => __('Input a custom website content width (with unit) to change the default width (the default is 1140px).', 'pixfort-core'),
    ]
);
$pixfortBuilder->addOption(
    'pix-mobile-breakpoint',
    [
        'type' => 'text',
        'label' => __('Custom Mobile Breakpoint', 'pixfort-core'),
        'tab'             => 'layoutAdvanced',
        'description' => __('Input a custom screen width in pixels to change the default breakpoint in which the mobile elements (for example the Mobile Header) will be displayed (the default is 992px).', 'pixfort-core'),
        'hideBorderBottom'      => true,
    ]
);
