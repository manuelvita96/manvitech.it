<?php

/*
    *   Sidebars
    */
	$pixfortBuilder->addOption(
		'pix-heading-sidebars',
		[
			'type'             => 'heading',
			'label'         => 'Sidebars',
			'tab'             => 'sidebars',
			'icon'            => 'sidebar',
			'linkText'            => __('Learn more about sidebars', 'pixfort-core'),
			'linkHref'            => 'https://essentials.pixfort.com/knowledge-base/how-to-create-edit-sidebars/',
			'linkIcon'            => 'bookmark'
		]
	);
	$pixfortBuilder->addOption(
		'pix_sidebars',
		[
			'type' => 'sidebars',
			'label' => __('Manage Sidebars', 'pixfort-core'),
			'description'     => __('Sidebars can be used on pages, blog, portfolio,...etc.', 'pixfort-core'),
			'tab'             => 'sidebars',
			'hideBorderBottom'   => false,
			// 'tooltipText'     => __('You can edit the sidebar widgets from WordPress Panel → Appearance → Widgets.', 'pixfort-core') . '<br/><br/><a target="_blank" href="./widgets.php" class="text-primary font-semibold" target="_blank">Open Widgets Page</a>',
		]
	);
	$pixfortBuilder->addOption(
		'pix-sidebars-alert',
		[
			'type'             => 'alert',
			'tab'             => 'sidebars',
			// 'label'     => __('Missing a Social Icon?', 'pixfort-core'),
			'description'     => __('You can edit the sidebar widgets from WordPress Panel → Appearance → Widgets.', 'pixfort-core'),
			'hidePaddingTop' => false,
			'style' => 'clean',
			// 'icon'  =>  'info',
			'linkOneText'  =>  __('Open Widgets Page', 'pixfort-core'),
			'linkOneHref'  =>  './widgets.php',
			// 'linkOneIcon'  =>  'bookmark'
		]
	);