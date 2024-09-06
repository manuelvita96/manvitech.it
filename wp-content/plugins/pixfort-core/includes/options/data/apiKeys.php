<?php

/*
    *   API Keys
    */
	$pixfortBuilder->addOption(
		'google-api-key',
		[
			'type' => 'text',
			'label' => __('Google API Key', 'pixfort-core'),
			'tab'             => 'apiKeys',
			'description' => __('Google API Key is required for Google Maps elements.', 'pixfort-core'),
			'tooltipText'     => __('For detailed information about setting up Google maps check this article from our knowledge base: ', 'pixfort-core') . '<br/><a target="_blank" href="https://essentials.pixfort.com/knowledge-base/using-advanced-google-maps-styles" target="_blank" class="text-primary font-semibold">https://essentials.pixfort.com/knowledge-base/using-advanced-google-maps-styles/</a>',
			'hideBorderBottom'   => true,
			'placeholder'		 => 'Google API Key'
		]
	);