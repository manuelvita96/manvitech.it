<?php

/*
    *   Popups
    */
$pixfortBuilder->addOption(
	'pix-heading-popups',
	[
		'type'             => 'heading',
		'label'         => 'Popups',
		'tab'             => 'popups',
		'icon'            => 'layers'
	]
);
$pixfortBuilder->addOption(
	'pix-popups-alert',
	[
		'type'             => 'alert',
		'tab'             => 'popups',
		'description'     => __('Please note that the Automatic and Exit popup options are now inside each popup options (with more new advanced settings). For detailed information about creating popups check this article from our knowledge base:', 'pixfort-core'),
		'hidePaddingBottom' => true,
		'style' => 'clean',
		'icon'  =>  'info',
		'linkOneText'  =>  __('Learn more about Popups', 'pixfort-core'),
		'linkOneHref'  =>  'https://essentials.pixfort.com/knowledge-base/how-to-add-popups/',
		'linkOneIcon'  =>  'bookmark'
	]
);

if (!empty(pix_plugin_get_option('pix-exit-popup')) || !empty(pix_plugin_get_option('pix-old-popups'))) {
	$pixfortBuilder->addOption(
		'pix-exit-popup',
		[
			'type' => 'select',
			'label' => __('Exit popup', 'pixfort-core'),
			'tab'             => 'popups',
			'description' => __('The popup will show when the mouse leave the browser tab.', 'pixfort-core'),
			'options' => $popups
		]
	);
	$pixfortBuilder->addOption(
		'pix-exit-popup-id',
		[
			'type' => 'text',
			'label' => __('Exit popup ID', 'pixfort-core'),
			'tab'             => 'popups',
			'description' => __('Changing the ID will reset the closed state for all users (all users will start to see the popup again).', 'pixfort-core'),
			'default'  => 'exit-popup-1',
			'dependency' => [
				'field' => 'pix-exit-popup',
				'val'               => ['', 'false', false],
				'op'                => '!='
			]
		]
	);
}

if (!empty(pix_plugin_get_option('pix-automatic-popup')) || !empty(pix_plugin_get_option('pix-old-popups'))) {
	$pixfortBuilder->addOption(
		'pix-automatic-popup',
		[
			'type' => 'select',
			'label' => __('Automatic popup', 'pixfort-core'),
			'tab'             => 'popups',
			'description' => __('The popup will show after a specified amount of time.', 'pixfort-core'),
			'options' => $popups
		]
	);
	$pixfortBuilder->addOption(
		'pix-automatic-popup-id',
		[
			'type' => 'text',
			'label' => __('Automatic popup ID', 'pixfort-core'),
			'tab'             => 'popups',
			'description' => __('Changing the ID will reset the closed state for all users (all users will start to see the popup again).', 'pixfort-core'),
			'default'  => 'automatic-popup-1',
			'dependency' => [
				'field' => 'pix-automatic-popup',
				'val'               => ['', 'false', false],
				'op'                => '!='
			]
		]
	);
	$pixfortBuilder->addOption(
		'pix-automatic-popup-time',
		[
			'type' => 'text',
			'label' => __('Automatic popup time', 'pixfort-core'),
			'tab'             => 'popups',
			'description' => __('The time before opening the popup (in seconds).', 'pixfort-core'),
			'default'  => '5',
			'dependency' => [
				'field' => 'pix-automatic-popup',
				'val'               => ['', 'false', false],
				'op'                => '!='
			]
		]
	);
}
$pixfortBuilder->addOption(
	'pix-enable-popup-enqueue',
	[
		'type' => 'checkbox',
		'label' => __('Enqueue Scripts and Styling in Popups', 'pixfort-core'),
		'tooltipText'     => __('Enabling this option will enqueue the scripts and css files required in the popup dynamically if they are not already loaded in the page.', 'pixfort-core'),
		'options'         => array('1' => 'On', '0' => 'Off'),
		'default'           => '1',
		'tab'             => 'popups',
		'hideBorderBottom'   => true
	]
);
if (!empty(pix_plugin_get_option('pix-old-popups'))) {
	/*
	* Deprecate (Preload Page Popups)
	*/
	$pixfortBuilder->addOption(
		'pix-preload-page-popups',
		[
			'type' => 'checkbox',
			'label' => __('Preload Page Popups', 'pixfort-core'),
			'tooltipText'     => __('Enabling Popups preloading will load the page popups content with the page to reduce the delay before displaying the requested Popup.', 'pixfort-core'),
			'options'         => array('1' => 'On', '0' => 'Off'),
			'default'           => '0',
			'tab'             => 'popups',
			'hideBorderBottom'   => true
		]
	);
	$pixfortBuilder->addOption(
		'pix-old-popups',
		[
			'type' => 'checkbox',
			'label' => __('Disable New Popups', 'pixfort-core'),
			'description'     => __('Enable this option only if you are facing an issue with the new Popups on the site.</br>Note: this option will be deprecated in future updates, please make sure to use the new popups.', 'pixfort-core'),
			'options'         => array('1' => 'On', '0' => 'Off'),
			'default'           => '0',
			'tab'             => 'popups',
			'showBorderTop'   => true,
			'hideBorderBottom'   => true
		]
	);
}
