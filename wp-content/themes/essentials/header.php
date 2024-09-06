<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<?php
$body_style = '';
if (pix_get_option('pix-body-bg-color')) {
	if (pix_get_option('pix-body-bg-color') == 'custom') {
		$body_style .= 'background: ' . pix_get_option('custom-body-bg-color') . ';';
	}
}
$pageTransitionLoading = true;
if (!empty(pix_get_option('site-disable-loading-icon'))) {
	if (pix_get_option('site-disable-loading-icon')) {
		$pageTransitionLoading = false;
	}
}
?>
<body <?php body_class(); ?> style="<?php echo esc_attr($body_style); ?>">
	<?php wp_body_open(); ?>
	<?php if (pix_get_option('site-page-transition')!=='disable-page-transition') {?>
	<div class="pix-page-loading-bg"></div>
	<?php } ?>
	<?php
	if ($pageTransitionLoading) {
		get_template_part('template-parts/loading');
	}
	if (pix_get_option('show-banner')) {
		if (pix_show_banner()) {
			get_template_part('template-parts/banner');
		}
	}
	$pageClasses = 'site';
	$pageClasses = apply_filters('pixfort_page_classes', $pageClasses);
	?>
	<div id="page" class="<?php echo esc_attr($pageClasses); ?>">
		<?php
		if (get_post_type() !== 'elementor_library') {
			if (function_exists('elementor_theme_do_location') && elementor_theme_do_location('header')) {
				elementor_theme_do_location('header');
			} else {
				// if (pix_get_option('pix-header')) {
				// 	get_template_part('template-parts/headers/main');
				// } else {
				// 	if (!function_exists('pixfort_core_plugin')) {
				// 		get_template_part('template-parts/headers/main');
				// 	}
				// }
				get_template_part('template-parts/headers/main');
			}
		}
