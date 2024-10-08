<?php
/**
 * Page custom meta fields.
 */


function pix_page_meta_add(){

	global $pix_page_meta_box_3;


	$header_posts = get_posts([
	    'post_type' => 'pixheader',
	    'post_status' => array('publish', 'private'),
	    'numberposts' => -1
	]);

	$headers = array();

	$headers[''] = "Theme Default";
	$headers['disable'] = "Disable";
	foreach ($header_posts as $key => $value) {
	    $headers[$value->ID] = $value->post_title;
	}

	$footer_posts = get_posts([
	    'post_type' => 'pixfooter',
	    'post_status' => array('publish', 'private'),
	    'numberposts' => -1
	]);

	$footers = array();
	$footers[''] = "Theme Default";
	$footers['disable'] = "Disabled";
	foreach ($footer_posts as $key => $value) {
	    $footers[$value->ID] = $value->post_title;
	}


	$sidebars = array();
	$sidebars[''] = 'Theme default';
	$sidebars['sidebar-1'] = 'Main Sidebar';
	if(!empty(pix_plugin_get_option('pix_sidebars'))){
	    foreach (pix_plugin_get_option('pix_sidebars') as $key => $value) {
	        $sidebars['sidebar-'.str_replace(' ', '', $value)] = $value;
	    }
	}

	$pagePostTypes = array('page', 'elementor_library');
	$pagePostTypes = apply_filters( 'pixfort_page_options_post_types', $pagePostTypes );

	$pix_page_meta_box_3 = array(
		'id' 		=> 'pix-meta-options',
		'title' 	=> __('pixfort Options','pixfort-core'),
		'page' 		=> $pagePostTypes,
		'post_types'	=> array('page', 'post'),
		'context' 	=> 'normal',
		'priority' 	=> 'default',
		'fields'	=> array(

			array(
				'id'		=> 'pix-custom-intro-bg',
				'type'		=> 'media',
				'title'		=> __('Page intro background image', 'pixfort-core'),
				'sub_desc'	=> __('Select an image to override the default intro background image.', 'pixfort-core'),
			),

			array(
				'id'		=> 'pix-hide-top-padding',
				'type'		=> 'select',
				'title'		=> __('Hide Top Padding', 'pixfort-core'),
				'sub_desc'	=> __('Hide the padding before page content (under the header).', 'pixfort-core'),
				'options'	=> array('1' => 'Yes', '0' => 'No'),
				'default'		=> '0'
			),

			array(
				'id'		=> 'pix-hide-top-area',
				'type'		=> 'select',
				'title'		=> __('Hide top area (Intro)', 'pixfort-core'),
				'sub_desc'	=> __('Hide the area under header).', 'pixfort-core'),
				'options'	=> array(
					'1' => 'Yes',
					'0' => 'No',
					'default' => 'Theme default'
				),
				'default'		=> 'default'
			),

			array(
				'id'		=> 'pix-sections-stack',
				'type'		=> 'switch',
				'title'		=> __('Enable section slides', 'pixfort-core'),
				'options'	=> array('1' => 'On', '0' => 'Off'),
				'std'		=> '0'
			),
			array(
				'id'		=> 'pix-sections-stack-dark',
				'type'		=> 'switch',
				'title'		=> __('Dark section slides navigation', 'pixfort-core'),
				'options'	=> array('1' => 'On', '0' => 'Off'),
				'std'		=> '0'
			),

			array(
				'id' 		=> 'pix-page-header',
				'type' 		=> 'select',
				'title' 	=> __('Custom Header', 'pixfort-core'),
				'options' 	=> $headers,
			),
			array(
				'id' 		=> 'pix-page-footer',
				'type' 		=> 'select',
				'title' 	=> __('Custom Footer', 'pixfort-core'),
				'options' 	=> $footers,
			),
			array(
				'id' 		=> 'pix-page-sidebar',
				'type' 		=> 'select',
				'title' 	=> __('Custom Sidebar', 'pixfort-core'),
				'sub_desc'	=> __('Select if you choose sidebar template for the page.', 'pixfort-core'),
				'options' 	=> $sidebars,
			),
			array(
				'id' 		=> 'pix-page-sidebar-sticky',
				'type' 		=> 'select',
				'title' 	=> __('Sidebar Sticky', 'pixfort-core'),
				'options' 	=> array(
	                ''   => "Theme default",
	                'sticky-bottom'   => "Sticky bottom",
	                'sticky-top'   => "Sticky Top",
	                'sticky-disabled'   => "Disable Sticky"
	            ),
			),
			array(
				'id' 		=> 'pix-disable-wp-block-library',
				'type' 		=> 'select',
				'title' 	=> __('Disable Gutenberg CSS from this page', 'pixfort-core'),
				'sub_desc'	=> __('If you don\'t use Gutenberg in the page, you can disabled its css to improve page performance.', 'pixfort-core'),
				'options' 	=> array(
	                ''   => "No",
	                'yes'   => "Yes"
	            ),
			),
		),
	);
	add_meta_box($pix_page_meta_box_3['id'], $pix_page_meta_box_3['title'], 'pix_page_show_box', $pix_page_meta_box_3['page'], $pix_page_meta_box_3['context'], $pix_page_meta_box_3['priority']);
}

 add_action('admin_menu', 'pix_page_meta_add');


 function pix_page_show_box() {
	global $pix_page_meta_box_3, $post;

	$header_posts = get_posts([
	    'post_type' => 'pixheader',
	    'post_status' => array('publish', 'private'),
	    'numberposts' => -1
	]);

	$headers = array();

	$headers[''] = "Theme Default";
	$headers['disable'] = "Disable";
	foreach ($header_posts as $key => $value) {
	    $headers[$value->ID] = $value->post_title;
	}

	$footer_posts = get_posts([
	    'post_type' => 'pixfooter',
	    'post_status' => array('publish', 'private'),
	    'numberposts' => -1
	]);

	$footers = array();
	$footers[''] = "Theme Default";
	$footers['disable'] = "Disabled";
	foreach ($footer_posts as $key => $value) {
	    $footers[$value->ID] = $value->post_title;
	}


	$sidebars = array();
	$sidebars[''] = 'Theme default';
	$sidebars['sidebar-1'] = 'Main Sidebar';
	if(!empty(pix_plugin_get_option('pix_sidebars'))){
	    foreach (pix_plugin_get_option('pix_sidebars') as $key => $value) {
	        $sidebars['sidebar-'.str_replace(' ', '', $value)] = $value;
	    }
	}

	// Use nonce for verification
	echo '<div id="pix-wrapper" class="pix-meta-page-options pix-header-options-area">';
		echo '<input type="hidden" name="pix_page_meta_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';



		echo '<table class="form-table">';
			echo '<tbody>';
			// $test = new PixfortOptions();
			


				// foreach ($pix_page_meta_box_3['fields'] as $field) {
				// 	$meta = get_post_meta($post->ID, $field['id'], true);
				// 	if( ! key_exists('std', $field) ) $field['std'] = false;
				// 	$meta = ( $meta || $meta==='0' ) ? $meta : stripslashes(htmlspecialchars(($field['std']), ENT_QUOTES ));
				// 	pix_meta_field_input( $field, $meta );
				// }

				
			// $test->loadOptionsData();
			// echo '<div id="pixfort_builder_option"></div>';
			// echo '<input type="text" name="pixfort-options" id="pixfort-options" class="large-text" value="" >';




			$pixfortBuilder = new PixfortOptions();
			$pixfortBuilder->initOptions(
				'meta',
				$post
			);

			$pixfortBuilder->addOption(
				'pix-custom-intro-bg',
				[
					'type' 			=> 'image',
					'label' 		=> 'Page intro background image',
					'default' 		=> '',
					'local' 		=> true,
					'description' 	=> __('Select an image to override the default intro background image.', 'pixfort-core'),
				]
			);
			$pixfortBuilder->addOption(
				'pix-hide-top-padding',
				[
					'type' 			=> 'select',
					'label' 		=> 'Hide Top Padding',
					'default' 		=> '0',
					'options'		=> array('1' => 'Yes', '0' => 'No'),
					'description' 	=> __('Hide the padding before page content (under the header).', 'pixfort-core'),
				]
			);
			$pixfortBuilder->addOption(
				'pix-hide-top-area',
				[
					'type' 			=> 'select',
					'label' 		=> 'Hide top area (Intro)',
					'default' 		=> 'default',
					'options'		=> array(
						'1' => 'Yes',
						'0' => 'No',
						'default' => 'Theme default'
					),
					'description' 	=> __('Hide the area under header).', 'pixfort-core'),
				]
			);
			$pixfortBuilder->addOption(
				'pix-sections-stack',
				[
					'type' 			=> 'checkbox',
					'label' 		=> 'Enable section slides',
					'default' 		=> '0',
					'options'		=> array('1' => 'On', '0' => 'Off'),
					// 'description' 	=> __('Hide the area under header).', 'pixfort-core'),
				]
			);
			$pixfortBuilder->addOption(
				'pix-sections-stack-dark',
				[
					'type' 			=> 'checkbox',
					'label' 		=> 'Dark section slides navigation',
					'default' 		=> '0',
					'options'		=> array('1' => 'On', '0' => 'Off'),
					// 'description' 	=> __('Hide the area under header).', 'pixfort-core'),
				]
			);

			

			$pixfortBuilder->addOption(
				'pix-page-header',
				[
					'type' => 'select',
					'label' => 'Custom Header',
					'default' => '',
					'options' => $headers
				]
			);
			$pixfortBuilder->addOption(
				'pix-page-footer',
				[
					'type' => 'select',
					'label' => 'Custom Footer',
					'default' => '',
					'options' => $footers
				]
			);

			$pixfortBuilder->addOption(
				'pix-page-sidebar',
				[
					'type' => 'select',
					'label' => 'Custom Sidebar',
					'default' => '',
					'description' => __('Select if you choose sidebar template for the page.', 'pixfort-core'),
					'options' => $sidebars
				]
			);
			$pixfortBuilder->addOption(
				'pix-page-sidebar-sticky',
				[
					'type' => 'select',
					'label' => 'Sidebar Sticky',
					'default' => '',
					'description' => __('Select if you choose sidebar template for the page.', 'pixfort-core'),
					'options' => array(
						''   => "Theme default",
						'sticky-bottom'   => "Sticky bottom",
						'sticky-top'   => "Sticky Top",
						'sticky-disabled'   => "Disable Sticky"
					),
				]
			);
			$pixfortBuilder->addOption(
				'pix-disable-wp-block-library',
				[
					'type' => 'select',
					'label' => 'Disable Gutenberg CSS from this page',
					'default' => '',
					'description' => __('If you don\'t use Gutenberg in the page, you can disabled its css to improve page performance.', 'pixfort-core'),
					'options' => array(
						''   => "No",
						'yes'   => "Yes"
					),
				]
			);
				

			$pixfortBuilder->loadOptionsData();
		?>
			<!-- <div style="width:100%;text-align:center;" class="pixfort_headerbuilder_loading"><img src="<?php echo PIX_IMG_PLACEHOLDER; ?>" /></div> -->
		<?php
		
			echo '<div id="fu3obnz"></div>';


			echo '</tbody>';
		echo '</table>';

	echo '</div>';
}

/*-----------------------------------------------------------------------------------*/
/*	Save data when page is edited
/*-----------------------------------------------------------------------------------*/
function pix_page_save_data($post_id) {
	global $pix_page_meta_box_3;

	// verify nonce
	if( key_exists( 'pix_page_meta_nonce',$_POST ) ) {
		if ( ! wp_verify_nonce( $_POST['pix_page_meta_nonce'], basename(__FILE__) ) ) {
			return $post_id;
		}
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ( (key_exists('post_type', $_POST)) && ('page' == $_POST['post_type']) ) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}

	if(!empty($pix_page_meta_box_3)){
		foreach ( (array)$pix_page_meta_box_3['fields'] as $field ) {
			$old = get_post_meta($post_id, $field['id'], true);
			if( key_exists($field['id'], $_POST) ) {
				$new = $_POST[$field['id']];
			} else {
				$new = ""; // problem with "quick edit"
				//continue;
			}

			if( isset($new) && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			}elseif('' == $new && $old) {
			    delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}

}
add_action('save_post', 'pix_page_save_data');


/*-----------------------------------------------------------------------------------*/
/*	Styles & scripts
/*-----------------------------------------------------------------------------------*/
function pix_page_admin_styles() {
	wp_enqueue_style( 'pix-admin-core', PIX_CORE_PLUGIN_URI. 'functions/css/pix-admin-core.css', false, PLUGIN_VERSION, 'all');
	wp_enqueue_style( 'pix-meta', PIX_CORE_PLUGIN_URI. 'functions/css/pixbuilder.css', false, PLUGIN_VERSION, 'all');
    wp_enqueue_style( 'pix-meta2', PIX_CORE_PLUGIN_URI. 'functions/pixbuilder.css', false, PLUGIN_VERSION, 'all');
}
add_action('admin_print_styles', 'pix_page_admin_styles');
