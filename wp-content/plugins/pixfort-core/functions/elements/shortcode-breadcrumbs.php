<?php

// Breadcrumbs -----------------------------
vc_map(array(
    'base'             => 'pix_breadcrumbs',
    'name'             => __('Breadcrumbs', 'pixfort-core'),
    'category'         => __('pixfort', 'pixfort-core'),
    'class'         => 'pixfort_element',
    "weight"    => "1000",
    'icon'             => PIX_CORE_PLUGIN_URI . 'functions/images/elements/breadcrumbs.png',
    'description'     => __('Add page breadcrumbs', 'pixfort-core'),
    'params'         => array(
        array(
            'type' => 'css_editor',
            'heading' => __('Css', 'pixfort-core'),
            'param_name' => 'css',
            'group' => __('Design options', 'pixfort-core'),
        ),
    )
));
