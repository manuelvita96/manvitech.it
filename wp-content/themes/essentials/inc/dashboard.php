<?php

/**
 * pixfort start page
 */

// Redirect to the dashboard after theme activation
if (is_admin() && isset($_GET['activated']) && $pagenow == "themes.php") {
	wp_redirect(admin_url('?page=pixfort-theme-dashboard'));
}

function pixfort_el_args($getArgs) {
	$key = get_option('envato_purchase_code_27889640');
	if (!$key) {
		return $getArgs;
	}
	$getArgs['headers'] = array(
		'pix_domain' => site_url(),
		'purchase_key' => $key
	);
	return $getArgs;
}
add_filter('pixfort_el_remote_get_args', 'pixfort_el_args', 1);

/**
 * Display notice to activate the theme
 */
function pixfort_activation_notice() {
?>
	<div class="notice pixfort-admin-notice notice-warning2 is-dismissible">
		<div class="notice-text"><strong><?php echo esc_attr__('Essentials Theme:', 'essentials'); ?></strong><?php echo esc_attr__(' your copy of the theme is not verified yet! Verify it now from Essentials dashboard to activate all the features and demo content.', 'essentials'); ?></div>
		<a href="<?php echo esc_url(admin_url('?page=pixfort-theme-dashboard')); ?>" class="button button-primary"><?php esc_html_e('Go to Essentials Dashboard', 'essentials'); ?></a>
		<br />
	</div>
<?php
}

$status = PixfortHub::checkValidation();
if (!$status) {
	add_action('admin_notices', 'pixfort_activation_notice');
}


/**
 * Display notice to udapte pixfort-core plugin
 */
function pixfort_update_core_notice() {
?>
	<div class="pixfort-admin-notice pixfort-danger-notice  notice  notice-danger  is-dismissible2">
		<div class="notice-grid">
			<div class="grid-box box-1">
				<div>
					<h2><img class="alert-icon" src="<?php echo esc_url(get_template_directory_uri() . '/inc/assets/icons/warning-icon-white.svg'); ?>" /><?php esc_html_e('Important notice!', 'essentials'); ?></h2>
					<p class="notice-text"><strong><?php esc_html_e('It seems that you updated Essentials theme, please make sure to update "pixfort core" too from Essentials > Dashboard > Install plugins.', 'essentials'); ?></strong></p>
					<a href="<?php echo esc_url(admin_url('?page=pixfort-theme-dashboard')); ?>" class="button-danger"><?php esc_html_e('Go to Essentials Dashboard', 'essentials'); ?></a>
				</div>
			</div>
			<div class="grid-box box-2">
				<video style="" width="320" height="240" autoplay muted loop>
					<!-- <source src="https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/essentials/admin-panel/update-pixfort-core.mp4" type="video/mp4"> -->
					<source src="<?php echo version_compare(PIXFORT_PLUGIN_VERSION, '3.2.5', '<=') ? 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/themes/assets/pixfort-core-update-note-old-versions-video.mp4' : 'https://pixfort-space.sfo2.cdn.digitaloceanspaces.com/wordpress/themes/assets/pixfort-core-update-note-video.mp4'; ?>" type="video/mp4">
					Your browser does not support the video tag.
				</video>
			</div>
		</div>
	</div>
<?php
}

if (defined('PIXFORT_PLUGIN_VERSION')) {
	if (version_compare(PIXFORT_PLUGIN_VERSION, PIXFORT_THEME_VERSION, '<')) {
		add_action('admin_notices', 'pixfort_update_core_notice');
	}
	if (is_user_logged_in()) {
		if (get_option('pix_essentials_style_url')) {
			$upURL = get_site_url();
			$styleURL = get_option('pix_essentials_style_url');
			if (!empty(wp_upload_dir()['baseurl'])) {
				$upURL = wp_upload_dir()['baseurl'];
			}
			if (pixStringStartWith(get_option('pix_essentials_style_url'), 'https://')) {
				$protocols = array("http://", "https://");
				$styleURL = str_replace($protocols, "", $styleURL);
				$upURL = str_replace($protocols, "", $upURL);
			}
			if (!pixStringStartWith($styleURL, $upURL)) {
				add_action('admin_notices', 'pixfort_url_change_options_notice');
			}
		}
		// else {
		//     add_action( 'admin_notices', 'pixfort_save_theme_options_notice' );
		// }
	}
}


add_action('admin_init', 'pix_dashboard_redirect_admin_page');

function pix_dashboard_redirect_admin_page() {
    if (isset($_GET['page']) && $_GET['page'] === 'pixfort-dashboard') {
		if(defined('PIXFORT_PLUGIN_VERSION')) {
			if (version_compare(PIXFORT_PLUGIN_VERSION, '3.2.5', '>=')) {
				$pixfortHub = new PixfortHub();
				$pixfortHub->checkLicenseUpdate();
				$redirect_url = admin_url('admin.php?page=pixfort-options#/dashboard');
				wp_redirect($redirect_url);
				exit;
			}
		}
    } else if (isset($_GET['page']) && $_GET['page'] === 'pixfort-theme-dashboard') {
		$pixfortHub = new PixfortHub();
		$dashboard_wizard = get_option('pixfort_dashboard_wizard');
		$status = $pixfortHub->checkValidation();
		$pixfortHub->checkLicenseUpdate();
		$coreVersion = false;
		$oldCoreVersion = false;
		if(defined('PIXFORT_PLUGIN_VERSION')) {
			$coreVersion = PIXFORT_PLUGIN_VERSION;
			if (version_compare(PIXFORT_PLUGIN_VERSION, '3.2.5', '<=')) {
				$oldCoreVersion = true;
			}
		}
		if ($dashboard_wizard) {
			$step = (int) $dashboard_wizard['step'];
		}
		if($status) {
			if($step!==1) {
				if($coreVersion) {
					if(!$oldCoreVersion) {
						wp_redirect(admin_url('admin.php?page=pixfort-options#/dashboard'));
					}
				}
			}
		}
	}
}

function pixStringStartWith($s1, $s2) {
	return (substr($s1, 0, strlen($s2)) === $s2);
}


function pixfort_url_change_options_notice() {
?>
	<div class="pixfort-admin-notice  notice  notice-warning  is-dismissible">
		<p class="notice-text"><strong><?php esc_html_e('Important Note: ', 'essentials'); ?></strong><?php esc_html_e('It seems that the website URL has been changed, please make sure to go to Essentials Theme options and click on the Save button to refresh the options URLs.', 'essentials'); ?></p>
		<a href="<?php echo esc_url(admin_url('admin.php?page=pixfort-options')); ?>" class="button"><?php esc_html_e('Go to Theme options', 'essentials'); ?></a>
	</div>
<?php
}
function pixfort_save_theme_options_notice() {
?>
	<div class="pixfort-admin-notice  notice  notice-warning  is-dismissible">
		<p class="notice-text"><strong><?php esc_html_e('Important Note: ', 'essentials'); ?></strong><?php esc_html_e('Please make sure to go to Essentials Theme options and click on the Save options button.', 'essentials'); ?></p>
		<a href="<?php echo esc_url(admin_url('admin.php?page=pixfort-options')); ?>" class="button"><?php esc_html_e('Go to Theme options', 'essentials'); ?></a>
	</div>
<?php
}


add_action('admin_init', 'pix_woocommerce_plugin_status');


function pix_woocommerce_plugin_status() {
	if (class_exists('WooCommerce')) {
		$woo_status = get_option('pix_woocommerce_active');
		if (!$woo_status) {
			update_option('pix_woocommerce_active', 'true');
			if (function_exists('pix_update_style_url')) {
				pix_update_style_url();
			}
		}
	} else {
		update_option('pix_woocommerce_active', '');
	}
}

add_action('admin_init', 'pix_theme_style_check');
function pix_theme_style_check() {
	if (defined('PIXFORT_PLUGIN_VERSION')) {
		if (PIXFORT_PLUGIN_VERSION === PIXFORT_THEME_VERSION) {
			$site_style_version = get_option('pixfort_site_style_version');
			if (!$site_style_version) {
				if (function_exists('pix_update_style_url')) {
					update_option('pixfort_site_style_version', PIXFORT_THEME_VERSION);
					pix_update_style_url();
				}
			} else {
				if ($site_style_version !== PIXFORT_THEME_VERSION) {
					if (function_exists('pix_update_style_url')) {
						pix_update_style_url();
						update_option('pixfort_site_style_version', PIXFORT_THEME_VERSION);
					}
				}
			}
		}
	} 
}

add_action('admin_menu', 'pix_admin_dashboard_menu');
if (is_admin()) require get_template_directory() . '/inc/config/plugins.php';

function pix_admin_dashboard_menu() {
	$theme_params = pix_theme_params();
	add_menu_page($theme_params['name'], $theme_params['name'], 'manage_options', 'pixfort-theme-dashboard', 'pixfort_theme_dashboard', get_template_directory_uri() . '/inc/config/img/pixfort-logo.svg', 1);
	add_submenu_page('pixfort-theme-dashboard', $theme_params['name'] . ' Dashboard', 'Dashboard', 'manage_options', 'pixfort-theme-dashboard', 'pixfort_theme_dashboard', 3);
	add_submenu_page('pixfort-dashboard', $theme_params['name'] . ' Old Dashboard', 'Old Dashboard', 'manage_options', 'pixfort-dashboard', 'pixfort_admin_page', 2);

	if (class_exists('PIX_OCDI')) {
		add_submenu_page('pixfort-theme-dashboard', 'Demo Import', 'Demo Import', 'import', 'pix-one-click-demo-import', 'pt-ocdi/plugin_page_setup', 9);
	}
}

function pixfort_theme_dashboard() {
	if (isset($_GET['page']) && $_GET['page'] === 'pixfort-theme-dashboard' && !isset($_GET['pixfortKey'])) {
		require_once get_template_directory() . '/inc/config/dashboard-wizard.php';
	}
	
}

add_action('admin_init', 'pixfortDashboardRequest');
function pixfortDashboardRequest() {
	// Returned from hub
	$validationResult = false;
	$redirectURL = '?page=pixfort-dashboard';
	$optionsKey = 'pixfort_dashboard_options';
	if (!empty($_GET['page'])) {
		if($_GET['page']==='pixfort-theme-dashboard'){
			$redirectURL = 'admin.php?page=pixfort-theme-dashboard';
			$optionsKey = 'pixfort_dashboard_wizard';
		}
	}
	if (!empty($_GET['pixfortKey'])) {
		$pixfortHub = new PixfortHub();
		$status = $pixfortHub->checkValidation();
		if (!$status) {
			$validationResult = $pixfortHub->pix_theme_verify($_GET['pixfortKey']);
			if (!empty($validationResult) && !empty($validationResult['result'])) {
				if ($validationResult['result']) {
					// $data = array(
					// 	'is-start' => true,
					// 	'step'     => 2
					// );
					// $dashboard_options = get_option($optionsKey);
					// if ($dashboard_options) {
					// 	$data['is-start'] = $dashboard_options['is-start'];
					// }
					// update_option($optionsKey, $data);
					wp_redirect(admin_url($redirectURL));
				}
			}
		} else {
			wp_redirect(admin_url($redirectURL));
		}
	}
}


function pixSameDomains($domain1, $domain2) {
	if (substr($domain1, 0, 8) === "https://") {
		$domain1 = substr($domain1, 8);
	} elseif (substr($domain1, 0, 7) === "http://") {
		$domain1 = substr($domain1, 7);
	}
	if (substr($domain1, 0, 4) === "www.") {
		$domain1 = substr($domain1, 4);
	}

	if (substr($domain2, 0, 8) === "https://") {
		$domain2 = substr($domain2, 8);
	} elseif (substr($domain2, 0, 7) === "http://") {
		$domain2 = substr($domain2, 7);
	}
	if (substr($domain2, 0, 4) === "www.") {
		$domain2 = substr($domain2, 4);
	}

	if ($domain2 != $domain1) {
		return false;
	}
	return true;
}

function pixfort_admin_page() {
	$pixfortHub = new PixfortHub();
	$token = $pixfortHub->getCsrfToken();
	$nonce = $pixfortHub->getVerifyNonce();
	$verify_action = $pixfortHub->getverifyAction();
	$verify_url = $pixfortHub->getVerifyUrl();
	$server_status = pix_get_server_status();

	

	wp_enqueue_script('pixfort-dashboard', get_template_directory_uri() . '/inc/config/js/dashboard.min.js', array('jquery'), PIXFORT_THEME_VERSION, true);
	$dashboardOpts = array(
		'AJAX_URL'	=> admin_url('admin-ajax.php')
	);
	$theme_params = pix_theme_params();
	//after wp_enqueue_script
	wp_localize_script('pixfort-dashboard', 'dashboard_object', $dashboardOpts);

	$isStart = true;
	$step = 1;
	$dashboard_options = get_option('pixfort_dashboard_options');
	if ($dashboard_options) {
		$isStart = $dashboard_options['is-start'];
		$step = $dashboard_options['step'];
	} else {
		$data = array(
			'is-start' => true,
			'step'     => 1
		);
		update_option('pixfort_dashboard_options', $data);
	}

	$dashClass = 'getting-started';
	if (!$isStart) {
		$dashClass = 'animate-dashboard';
	}

	$simpleSite = true;
	if(function_exists('pll_languages_list')) {
		$plList = pll_the_languages(array('raw'=>1));
		if(!empty($plList)&&is_array($plList)){
			$simpleSite = false;
			$site_theme_urls = get_option('pixfort_site_theme_urls');
			$langURLs = [];
			foreach ($plList as $key => $value) {
				array_push($langURLs, $value['url']);
			}
			if (!$site_theme_urls||!is_array($site_theme_urls)) {
				update_option('pixfort_site_theme_urls', $langURLs);
			} else {
				$siteURL = site_url();
				$validLangURL = false;
				foreach ($langURLs as $langURL) {
					if(!pixSameDomains($siteURL, $langURL)){
						$validLangURL = true;
					}
				}
				if(!$validLangURL) {
					$pixfortHub->disableActivation();
					update_option('pixfort_site_theme_urls', $langURLs);
				}
			}
		}
	}

	$site_theme_url = get_option('pixfort_site_theme_url');
	if($simpleSite){
		if (!$site_theme_url) {
			update_option('pixfort_site_theme_url', site_url());
		} else {
			$siteURL = site_url();
			if(!pixSameDomains($siteURL, $site_theme_url)){
				$pixfortHub->disableActivation();
				update_option('pixfort_site_theme_url', site_url());
			}
		}
	}
	
	
	if (!empty($_GET['pixfort_e'])) {
		if (!empty($_GET['pixfort_e_ek'])) {
			if (!empty($_GET['pixfort_e_pk'])) {
				update_option('envato_purchase_code_27889640', $_GET['pixfort_e_ek']);
				update_option('pixfort_key', $_GET['pixfort_e_pk']);
			}
		}
	}
	if (!empty($_GET['pixfort_dis'])) {
		if ($_GET['pixfort_dis'] == 12) {
			update_option('envato_purchase_code_27889640', '');
			update_option('pixfort_key', '');
		}
		if ($_GET['pixfort_dis'] == 13) {
			update_option('pix_license_update_fail', '');
		}
	}

	$opt_key = 'envato_purchase_code_' . PixfortHub::$item_id;
	$code = get_option($opt_key);
	$pixfortKey = get_option('pixfort_key');
	$pixfortHub->checkLicenseUpdate();


?>



	<svg class="pix-dashboard-divider" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1200 360" preserveAspectRatio="none">
		<g class="layer-3 pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="700">
			<polygon fill="url(#divider-80213-bottom-overlay-layer-3)" points="0 240 1200 0 1200 360 0 360"></polygon>
		</g>
		<g class="layer-2 pix-waiting animated" data-anim-type="fade-in-up" data-anim-delay="600">
			<polygon fill="url(#divider-80213-bottom-overlay-layer-2)" points="0 300 1200 60 1200 360 0 360"></polygon>
		</g>
		<polygon fill="#ffffff" points="0 360 1200 120 1200 360"></polygon>
		<defs>
			<linearGradient id="divider-80213-bottom-overlay-layer-3" x1="0%" y1="0%" x2="100%" y2="0%">
				<stop offset="0%" stop-color="rgba(52,58,64,0.01)"></stop>
				<stop offset="100%" stop-color="rgba(255,255,255,0.15)"></stop>
			</linearGradient>
			<linearGradient id="divider-80213-bottom-overlay-layer-2" x1="0%" y1="0%" x2="100%" y2="0%">
				<stop offset="0%" stop-color="#5c96f6"></stop>
				<stop offset="50%" stop-color="#c757be"></stop>
				<stop offset="100%" stop-color="#ea4157"></stop>
			</linearGradient>
		</defs>
	</svg>


	<div class="wrap">
		<div class="page-title"><?php echo esc_html($theme_params['name']); ?> <?php esc_html_e('Dashboard', 'essentials'); ?></div>


		<div class="dashboard-grid <?php echo esc_attr($dashClass); ?>">

			<?php
			$pluginsClass = 'is-active';
			if ($isStart && $step > 1) {
				$pluginsClass = '';
			}
			?>
			<div id="pix-plugins" class="pix-server-status pix-dashboard-box <?php echo esc_attr($pluginsClass); ?>">
				<div>
					<div class="box-title text-center"><?php esc_html_e('Step 1', 'essentials'); ?></div>
					<div class="box-subtitle text-center"><?php esc_html_e('Plugins Installation', 'essentials'); ?></div>
					<div class="text-center">
						<img class="pix-plugins-img" src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/required-plugins.png'); ?>" />
					</div>
					<?php
					$pluginSetup = new PixFort_Plugins_Setup();
					$pluginSetup->envato_setup_default_plugins();
					?>
					<div class="text-center useful-note">
						<!-- <img class="pix-plugins-img" src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/other-plugins.png'); ?>"  /> -->
						<div><?php esc_html_e('Note: The additional compatible plugins with Essentials can be installed from WordPress plugins page.', 'essentials'); ?></div>
					</div>
				</div>
			</div>
			<?php
			$verifyClass = '';
			if ($isStart && $step > 1) {
				$verifyClass = 'is-active';
			}
			?>
			<div id="pix-verification" class="pix-verification pix-dashboard-box text-center <?php echo esc_attr($verifyClass); ?>">
				<div>
					<div class="box-title"><?php esc_html_e('Step 2', 'essentials'); ?></div>
					<div class="box-subtitle"><?php esc_html_e('Theme activation', 'essentials'); ?></div>
					<?php

					$status = $pixfortHub->checkValidation();
					if ($status) {
					?>
						<div class="dash-done-icon">


							<div class="svg-box svg-dashboard-done">
								<svg class="circular green-stroke">
									<circle class="path" cx="75" cy="75" r="50" fill="none" stroke-width="5" stroke-miterlimit="10" />
								</svg>
								<svg class="svg-checkmark green-stroke">
									<g transform="matrix(0.79961,8.65821e-32,8.39584e-32,0.79961,-489.57,-205.679)">
										<path class="checkmark__check" fill="none" d="M616.306,283.025L634.087,300.805L673.361,261.53" />
									</g>
								</svg>
							</div>

						</div>
						<p class="box-text pix-verify-status-text text-center">
							<?php esc_html_e('Great news! your theme is activated! You are ready to go!', 'essentials'); ?>
						</p>
						<div class="text-center">
							<a href="#" class="pix-theme-deactivate" data-pk="<?php echo get_option('envato_purchase_code_27889640'); ?>"><?php esc_html_e('Deactivate theme', 'essentials'); ?></a>
						</div>
					<?php
					} else {
					?>
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/activation.svg'); ?>" />
						<p class="box-text">
							<?php esc_html_e('In order to use all the included features you need to verify the theme using your account on pixfort hub.', 'essentials'); ?>
						</p>
						<form method="GET" target="_blank" action="<?php echo esc_url($verify_url); ?>">
							<input type="hidden" name="_csrf" value="<?php echo esc_attr($token); ?>" />
							<input type="hidden" name="theme_version" value="<?php echo esc_attr(PIXFORT_THEME_VERSION); ?>" />
							<input type="hidden" name="theme" value="essentials" />
							<input type="hidden" name="version" value="2" />
							<input type="hidden" name="domain" value="<?php echo site_url(); ?>" />
							<input type="hidden" name="nonce" value="<?php echo esc_attr($nonce); ?>" />
							<input type="hidden" name="verify_action" value="<?php echo esc_attr($verify_action); ?>" />
							<input type="hidden" name="return_url" value="<?php echo admin_url('admin.php?page=pixfort-dashboard&fi=ras'); ?>" />
							<input type="submit" class="pix-btn btn-primary pixfort-active-theme" value="Activate theme"></input>
						</form>
					<?php
					}
					if (!empty($_GET['pixinfo'])) {
						echo '<br />Purchase code:<div>' . get_option('envato_purchase_code_27889640') . '</div>';
						echo '<div>pixfort key: ' . get_option('pixfort_key') . '</div>';
						echo '<div>pixfort site URL: ' . get_option('pixfort_site_theme_url') . '</div>';
						echo '<div>License update: ' . get_option('pix_license_update_fail') . '</div>';

						var_dump(site_url());
					}
					if ($isStart) {
					?>
						<br />
						<a class="pixfort-skip pix-btn btn-link" href="#pix-info"><?php esc_html_e('Skip this step', 'essentials'); ?></a>
					<?php } ?>
				</div>
			</div>
			<div id="pix-info" class="pix-server-status pix-dashboard-box">
				<div>
					<div class="box-title text-center"><?php esc_html_e('Step 3', 'essentials'); ?></div>
					<div class="box-subtitle text-center"><?php esc_html_e('Useful Information', 'essentials'); ?></div>
					<div class="pix-useful-items">
						<?php if (class_exists('PIX_OCDI')) { ?>
							<a href="<?php echo esc_url(admin_url('admin.php?page=pix-one-click-demo-import')); ?>" class="useful-item">
								<div class="useful-item-inner">
									<div class="useful-title"><?php esc_html_e('Demo Import', 'essentials'); ?></div>
									<div class="useful-text"><?php esc_html_e('Go to Demo import page', 'essentials'); ?></div>
								</div>
							</a>
						<?php } ?>
						<a target="_blank" href="<?php echo esc_url(admin_url('admin.php?page=pixfort-options#/')); ?>" class="useful-item">
							<div class="useful-item-inner">
								<div class="useful-title"><?php esc_html_e('Theme Options', 'essentials'); ?></div>
								<div class="useful-text"><?php esc_html_e('Open theme settings', 'essentials'); ?></div>
							</div>
						</a>
					</div>
					<div class="pix-useful-items">
						<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/" class="useful-item">
							<div class="useful-item-inner">
								<div class="useful-title"><?php esc_html_e('Knowledge base', 'essentials'); ?></div>
								<div class="useful-text"><?php esc_html_e('Check all the help articles', 'essentials'); ?></div>
							</div>
						</a>
						<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/videos/" class="useful-item">
							<div class="useful-item-inner">
								<div class="useful-title"><?php esc_html_e('Videos', 'essentials'); ?></div>
								<div class="useful-text"><?php esc_html_e('Check the video tutorials', 'essentials'); ?></div>
							</div>
						</a>
					</div>
					<div class="pix-useful-items pix-changelog">
						<a target="_blank" href="https://essentials.pixfort.com/knowledge-base/changelog/#pix_section_changelog" class="useful-item">
							<div class="useful-item-inner">
								<div class="useful-title"><?php esc_html_e('Changelog', 'essentials'); ?> v<?php echo esc_attr(PIXFORT_THEME_VERSION); ?></div>
								<div class="useful-text"><?php esc_html_e('Check latest theme updates', 'essentials'); ?></div>
							</div>
						</a>
					</div>
					<div class="pix-useful-items">
						<a target="_blank" href="http://hub.pixfort.com/" class="useful-item">
							<div class="useful-item-inner">
								<div class="useful-title"><?php esc_html_e('Support', 'essentials'); ?></div>
								<div class="useful-text"><?php esc_html_e('Get support and check your licenses', 'essentials'); ?></div>
							</div>
						</a>
						<div class="useful-item">
							<div class="useful-item-inner">
								<div class="useful-title"><?php esc_html_e('Follow us on', 'essentials'); ?></div>
								<div class="useful-text social-links">
									<a href="https://youtube.com/pixfort" target="_blank"><?php esc_html_e('YouTube', 'essentials'); ?></a>,
									<a href="https://www.facebook.com/pixfort" target="_blank"><?php esc_html_e('Facebook', 'essentials'); ?></a>,
									<a href="https://www.instagram.com/pixfort" target="_blank"><?php esc_html_e('Instagram', 'essentials'); ?></a>,
									<a href="https://www.twitter.com/pixfort" target="_blank"><?php esc_html_e('Twitter', 'essentials'); ?></a>,
									<a href="https://dribbble.com/PixFort" target="_blank"><?php esc_html_e('Dribbble', 'essentials'); ?></a>
								</div>
							</div>
						</div>
					</div>



					<?php if ($isStart) { ?>
						<a class="pixfort-finish pix-btn btn-link" href="#"><?php esc_html_e('Finish', 'essentials'); ?></a>
					<?php } ?>
				</div>
			</div>
			<div class="pix-server-status pix-dashboard-box">
				<div>
					<div class="box-subtitle"><?php esc_html_e('Server status', 'essentials'); ?></div>
					<?php
					if (current_user_can('switch_themes')) {
						foreach ($server_status as $key => $value) {
					?>
							<div class="pix-dash-status-item">
								<span class=item-text><?php echo esc_html($value['label']); ?></span>
								<?php

								if ($value['status']) {
								?>
									<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/check.svg'); ?>" />
									<?php
								} else {
									if (!empty($value['help'])) {
									?>
										<a class="help-btn" target="_blank" href="<?php echo esc_url($value['help']); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/help.svg'); ?>" /></a>
									<?php
									}
									?>
									<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/error.svg'); ?>" />
								<?php
								}
								?>
							</div>
						<?php
						}
					} else {
						?>
						<p><?php esc_html_e('Please login as admin to view server status.', 'essentials'); ?></p>
					<?php
					}
					?>
				</div>
			</div>



			<div class="pix-showcase pix-dashboard-box">
				<div>
					<a href="https://core.pixfort.com/showcase/" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/inc/config/img/dashboard-essentials-showcase.webp'); ?>" title"Shocase" /></a>

				</div>
			</div>

		</div>
	</div>
<?php
}


/**
 * Server status function
 */
function pix_get_server_status() {

	$result = array();
	$uploads_dir = wp_upload_dir();
	$is_writable = wp_is_writable($uploads_dir['basedir'] . '/');

	array_push($result, array(
		'label'         => esc_attr__('Writable uploads directory', 'essentials'),
		'status'        => $is_writable,
		'help'          => 'https://pixfort.com'
	));

	$memory_limit = ini_get('memory_limit');
	$memory_limit_byte = wp_convert_hr_to_bytes($memory_limit);
	$res_memory_limit = $memory_limit_byte >= 268435456;

	array_push($result, array(
		'label'         => esc_attr__('Memory limit (256MB)', 'essentials'),
		'status'        => $res_memory_limit,
		'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_memory_limit'
	));

	$upload_max_filesize_min = '64M';
	$upload_max_filesize = ini_get('upload_max_filesize');
	$upload_max_filesize_byte = wp_convert_hr_to_bytes($upload_max_filesize);
	$upload_max_filesize_status = $upload_max_filesize_byte >= 67108864;

	array_push($result, array(
		'label'         => esc_attr__('Upload max filesize (64MB)', 'essentials'),
		'status'        => $upload_max_filesize_status,
		'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_upload_max_filesize'
	));

	$post_max_size_min = '128M';
	$post_max_size = ini_get('post_max_size');
	$post_max_size_byte = wp_convert_hr_to_bytes($post_max_size);
	$post_max_size_status = ($post_max_size_byte >= 67108864);

	array_push($result, array(
		'label'         => esc_attr__('Post max size (64MB)', 'essentials'),
		'status'        => $post_max_size_status,
		'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_post_max_size'
	));

	$max_input_vars_min = 3000;
	$max_input_vars = ini_get('max_input_vars');
	$max_input_vars_status = $max_input_vars >= $max_input_vars_min;

	array_push($result, array(
		'label'         => esc_attr__('Max input vars (3000)', 'essentials'),
		'status'        => $max_input_vars_status,
		'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_max_input_vars'
	));

	$max_execution_time_min = 300;
	$max_execution_time = ini_get('max_execution_time');
	$max_execution_time_status = $max_execution_time >= $max_execution_time_min;

	array_push($result, array(
		'label'         => esc_attr__('Max execution time (300s)', 'essentials'),
		'status'        => $max_execution_time_status,
		'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_max_execution_time'
	));

	$xmlReady = false;
	if (class_exists('XMLReader')) {
		$xmlReady = true;
	} elseif (function_exists('simplexml_load_file')) {
		//simplexml available
		$xmlReady = true;
	}
	array_push($result, array(
		'label'         => esc_attr__('XML Reader', 'essentials'),
		'status'        => $xmlReady,
		// 'help'          => 'https://essentials.pixfort.com/knowledge-base/setting-up-the-recommended-server-configuration/#pix_section_max_execution_time'
	));

	return $result;
}

/**
 * One click demo import plugin configuration
 */
function PIX_OCDI_page_setup($default_settings) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__('One Click Demo Import', 'essentials');
	$default_settings['menu_title']  = esc_html__('Import Demo Data', 'essentials');
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'pix-one-click-demo-import';

	return $default_settings;
}
add_filter('pt-ocdi/plugin_page_setup', 'PIX_OCDI_page_setup');
