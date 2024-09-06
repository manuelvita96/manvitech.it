<?php

function pixfort_demo_elementor_popups() {
	$data = array();
	$wpb = false;
	$elementor = false;
	if (defined('WPB_VC_VERSION')) {
		$wpb = true;
	}
	if (class_exists('\Elementor\Plugin')) {
		$elementor = true;
	}

	if ($wpb) {
		// [WPBakery] Popups with Launcher

		$demo = array(
			'import_file_name'             => 'General Popup with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-general-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-general.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-general-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Contact Popup with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-contact-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-contact.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-contact-popup-preview',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Call Links Popup with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-call-links-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-call-links.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-call-links-popup-preview',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Sidebar Links Right with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-sidebar-links-right-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-sidebar-links-right.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-sidebar-links-right-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Circles Popup with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-circles-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-circles.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-circles-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Popup with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-cookie-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-cookie.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-cookie-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Social Buttons with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-social-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-social-buttons.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-social-buttons-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Deal Popup with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-deal-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-deal.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-deal-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'News Popup with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-news-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-news.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-news-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Help Popup with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-help-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-help.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-help-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Contact Full Screen with Launcher - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-launcher-contact-full-screen-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-launcher-contact-full-screen.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-contact-full-screen-popup-preview/',
		);
		array_push($data, $demo);

		// [WPBakery] Normal Popups

		$demo = array(
			'import_file_name'             => 'Sidebar Links Left Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-sidebar-links-left-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-sidebar-links-left.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Circles Default Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-circles-default-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-circles-default.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Promo Mini Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-promo-mini-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-promo-mini.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Promo Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-promo-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-promo.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Promo Wide Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-promo-wide-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-promo-wide.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Photo Boxes Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-photo-boxes-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-photo-boxes.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Newsletter Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-newsletter-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-newsletter.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Features Small Left Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-features-small-left-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-features-small-left.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Welcome Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-welcome-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-welcome.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Banner Small Right Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-banner-small-right-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-banner-small-right.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Project Overview Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-project-overview-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-project-overview.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Quick Overview Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-quick-overview-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-quick-overview.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Search Extended Full Screen - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-search-extended-full-screen-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-search-extended.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Top Bar Search Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-top-bar-search-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-top-bar-search.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Search Simple Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-search-simple-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-search-simple.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Links Full Screen Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-links-full-screen-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-links-full-screen.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Links Top Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-links-top-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-links-top.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Article Overview Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-article-overview-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-article-overview.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'About Bottom Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-about-bottom-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-about-bottom.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Sidebar About Right Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-sidebar-about-right-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-sidebar-about-right.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Bottom Bar Social Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-bottom-bar-social-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-bottom-bar-social.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Bottom Bar Links Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-bottom-bar-links-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-bottom-bar-links.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Quick Links Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-quick-links-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-quick-links.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Normal Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-cookie-normal-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-cookie-normal.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Non-dismissible Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-cookie-non-dismissible-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-cookie-non-dismissible.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Small Left Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-cookie-small-left-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-cookie-small-left.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Mini Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-cookie-mini-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-cookie-mini.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Age Verification Popup - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/core/demo-content/popups/wpbakery/popup-age-verification-wpbakery.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/wpbakery/popup-age-verification.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);



		$demo = array(
			'import_file_name'             => 'Popup Video - WPBakery',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-video.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-video.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Application',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-application.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-application.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Address Extended',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-address-information.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-address-extended.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Cookie policy',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-cookie-policy.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-cookie.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Subscribe 1',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-subscribe-1.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-subscribe-1.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Subscribe 2',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-subscribe-2.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-subscribe-2.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Countdown',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-countdown.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-countdown.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup CTA',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-cta.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-cta.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Information',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-information.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-information.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Image',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-image.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-image.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Pricing',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-pricing.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-pricing.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Contact Extended',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-contact-extended.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-contact-extended.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Download',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-download.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-download.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Contact',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-contact.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-contact.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Address Simple',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-address-simple.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-address-simple.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Creative',
			'categories'                   => array('Popups'),
			'import_file_url'            => 'https://import.pixfort.com/essentials/demo-content/popups/wpbakery/popup-creative.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/wpbakery/popup-creative.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);
	}









	if ($elementor) {
		// [Elementor] Popups with Launcher

		$demo = array(
			'import_file_name'             => 'General Popup with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-general-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-general.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-general-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Contact Popup with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-contact-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-contact.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-contact-popup-preview',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Call Links Popup with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-call-links-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-call-links.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-call-links-popup-preview',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Sidebar Links Right with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-sidebar-links-right-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-sidebar-links-right.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-sidebar-links-right-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Circles Popup with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-circles-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-circles.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-circles-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Popup with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-cookie-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-cookie.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-cookie-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Social Buttons with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-social-buttons-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-social-buttons.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-social-buttons-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Deal Popup with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-deal-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-deal.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-deal-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'News Popup with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-news-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-news.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-news-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Help Popup with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-help-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-help.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-help-popup-preview/',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Contact Full Screen with Launcher - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-launcher-contact-full-screen-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-launcher-contact-full-screen.webp',
			'preview_url'                  => 'https://core.pixfort.com/launcher-contact-full-screen-popup-preview/',
		);
		array_push($data, $demo);

		// [Elementor] Normal Popups

		$demo = array(
			'import_file_name'             => 'Sidebar Links Left Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-sidebar-links-left-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-sidebar-links-left.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Circles Default Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-circles-default-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-circles-default.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Promo Mini Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-promo-mini-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-promo-mini.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Promo Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-promo-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-promo.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Promo Wide Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-promo-wide-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-promo-wide.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Photo Boxes Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-photo-boxes-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-photo-boxes.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Newsletter Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-newsletter-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-newsletter.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Features Small Left Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-features-small-left-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-features-small-left.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Welcome Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-welcome-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-welcome.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Banner Small Right Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-banner-small-right-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-banner-small-right.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Project Overview Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-project-overview-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-project-overview.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Quick Overview Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-quick-overview-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-quick-overview.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Search Extended Full Screen - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-search-extended-full-screen-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-search-extended.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Top Bar Search Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-top-bar-search-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-top-bar-search.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Search Simple Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-search-simple-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-search-simple.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Links Full Screen Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-links-full-screen-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-links-full-screen.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Links Top Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-details-top-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-links-top.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Article Overview Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-article-overview-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-article-overview.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'About Bottom Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-about-bottom-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-about-bottom.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Sidebar About Right Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-sidebar-about-right-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-sidebar-about-right.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Bottom Bar Social Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-bottom-bar-social-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-bottom-bar-social.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Bottom Bar Links Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-bottom-bar-links-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-bottom-bar-links.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Quick Links Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-quick-links-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-quick-links.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Normal Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-cookie-normal-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-cookie-normal.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Non-dismissible Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-cookie-non-dismissible-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-cookie-non-dismissible.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Small Left Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-cookie-small-left-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-cookie-small-left.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Cookie Mini Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-cookie-mini-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-cookie-mini.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Age Verification Popup - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-age-verification-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/core/data/thumbnails/one_click/popups/elementor/popup-age-verification.webp',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Video - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-video-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-video.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Application - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-application-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-application.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Address Extended - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-address-information-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-address-extended.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Cookie policy - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-cookie-policy-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-cookie.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Subscribe 1 - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-subscribe-1-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-subscribe-1.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Subscribe 2 - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-subscribe-2-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-subscribe-2.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Countdown - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-countdown-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-countdown.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup CTA - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-cta-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-cta.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Information - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-information-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-information.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Image - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-image-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-image.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Pricing - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-pricing-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-pricing.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Contact Extended - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-contact-extended-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-contact-extended.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Download - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-download-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-download.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Contact - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-contact-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-contact.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Address Simple - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-address-information-simple-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-address-simple.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);

		$demo = array(
			'import_file_name'             => 'Popup Creative - Elementor',
			'categories'                   => array('Popups'),
			'import_file_url'            	=> 'https://import.pixfort.com/core/demo-content/popups/elementor/popup-creative-elementor.xml',
			'import_preview_image_url'     => 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/data/thumbnails/one_click/popups/elementor/elementor-popup-creative.jpg',
			'preview_url'                  => 'https://core.pixfort.com/#pix_section_normal_popups',
		);
		array_push($data, $demo);
	}
	return $data;
}
