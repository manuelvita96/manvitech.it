<?php
namespace Elementor\TemplateLibrary;

use Elementor\Plugin;

/**
 * Elementor template library remote source.
 *
 * Elementor template library remote source handler class is responsible for
 * handling remote templates from Elementor.com servers.
 */
class Source_Custom extends Source_Base {

	/**
	 * New library option key.
	 */
	const LIBRARY_OPTION_KEY = 'custom_remote_info_library';

	/**
	 * Timestamp cache key to trigger library sync.
	 */
	const TIMESTAMP_CACHE_KEY = 'custom_remote_update_timestamp';

	/**
	 * API info URL.
	 *
	 * Holds the URL of the info API.
	 *
	 * @access public
	 * @static
	 *
	 * @var string API info URL.
	 */
	public static $api_info_url = '';

	/**
	 * API get template content URL.
	 *
	 * Holds the URL of the template content API.
	 *
	 * @access private
	 * @static
	 *
	 * @var string API get template content URL.
	 */
	private static $api_get_template_content_url = '';

	/**
	 * Get remote template ID.
	 *
	 * Retrieve the remote template ID.
	 *
	 * @access public
	 *
	 * @return string The remote template ID.
	 */
	public function get_id() {
		return 'remote';
	}

	/**
	 * Get remote template title.
	 *
	 * Retrieve the remote template title.
	 *
	 * @access public
	 *
	 * @return string The remote template title.
	 */
	public function get_title() {
		return __( 'Remote', 'custom-elementor-source' );
	}

	/**
	 * Register remote template data.
	 *
	 * Used to register custom template data like a post type, a taxonomy or any
	 * other data.
	 *
	 * @access public
	 */
	public function register_data() {}

	/**
	 * Get remote templates.
	 *
	 * Retrieve remote templates from Elementor.com servers.
	 *
	 * @access public
	 *
	 * @param array $args Optional. Nou used in remote source.
	 *
	 * @return array Remote templates.
	 */
	public function get_items( $args = [] ) {
		$library_data = self::get_library_data();

		$templates = [];

		if ( ! empty( $library_data['templates'] ) ) {
			foreach ( $library_data['templates'] as $template_data ) {
				$item = $this->prepare_template( $template_data );
				$templates[] = $item;
			}
		}

		return $templates;
	}

	/**
	 * Get templates data.
	 *
	 * Retrieve the templates data from a remote server.
	 *
	 * @access public
	 * @static
	 *
	 * @param bool $force_update Optional. Whether to force the data update or
	 *                                     not. Default is false.
	 *
	 * @return array The templates data.
	 */
	public static function get_library_data( $force_update = false ) {
		self::get_info_data( $force_update );

		$library_data = get_option( self::LIBRARY_OPTION_KEY );

		if ( empty( $library_data ) ) {
			return [];
		}

		return $library_data;
	}

	/**
	 * Get info data.
	 *
	 * This function notifies the user of upgrade notices, new templates and contributors.
	 *
	 * @access private
	 * @static
	 *
	 * @param bool $force_update Optional. Whether to force the data retrieval or
	 *                                     not. Default is false.
	 *
	 * @return array|false Info data, or false.
	 */
	private static function get_info_data( $force_update = false ) {
		require_once( 'demo/library.php');
		// $elementor_update_timestamp = get_option( '_transient_timeout_elementor_remote_info_api_data_' . ELEMENTOR_VERSION );
		// $update_timestamp = get_transient( self::TIMESTAMP_CACHE_KEY );
		//
		// if ( $force_update || ! $update_timestamp || $update_timestamp != $elementor_update_timestamp ) {
		// 	$timeout = ( $force_update ) ? 25 : 8;
		//
		// 	$response = wp_remote_get( self::$api_info_url, [
		// 		'timeout' => $timeout,
		// 		'body' => [
		// 			// Which API version is used.
		// 			'api_version' => ELEMENTOR_VERSION,
		// 			// Which language to return.
		// 			'site_lang' => get_bloginfo( 'language' ),
		// 		],
		// 	] );
		//
		// 	if ( is_wp_error( $response ) || 200 !== (int) wp_remote_retrieve_response_code( $response ) ) {
		// 		set_transient( self::TIMESTAMP_CACHE_KEY, [], 2 * HOUR_IN_SECONDS );
		//
		// 		return false;
		// 	}
		//
		// 	$info_data = json_decode( wp_remote_retrieve_body( $response ), true );
		//
		// 	if ( empty( $info_data ) || ! is_array( $info_data ) ) {
		// 		set_transient( self::TIMESTAMP_CACHE_KEY, [], 2 * HOUR_IN_SECONDS );
		//
		// 		return false;
		// 	}
		//
		// 	if ( isset( $library['library'] ) ) {
		// 		update_option( self::LIBRARY_OPTION_KEY, $library['library'], 'no' );
		// 	}
		//
		// 	set_transient( self::TIMESTAMP_CACHE_KEY, $elementor_update_timestamp, 12 * HOUR_IN_SECONDS );
		// }
		if ( isset( $library['library'] ) ) {
			update_option( self::LIBRARY_OPTION_KEY, $library['library'], 'no' );
		}

		return $library;
	}

	/**
	 * Get remote template.
	 *
	 * Retrieve a single remote template from Elementor.com servers.
	 *
	 * @access public
	 *
	 * @param int $template_id The template ID.
	 *
	 * @return array Remote template.
	 */
	public function get_item( $template_id ) {
		$templates = $this->get_items();

		return $templates[ $template_id ];
	}

	/**
	 * Save remote template.
	 *
	 * Remote template from Elementor.com servers cannot be saved on the
	 * database as they are retrieved from remote servers.
	 *
	 * @access public
	 *
	 * @param array $template_data Remote template data.
	 *
	 * @return \WP_Error
	 */
	public function save_item( $template_data ) {
		return new \WP_Error( 'invalid_request', 'Cannot save template to a remote source' );
	}

	/**
	 * Update remote template.
	 *
	 * Remote template from Elementor.com servers cannot be updated on the
	 * database as they are retrieved from remote servers.
	 *
	 * @access public
	 *
	 * @param array $new_data New template data.
	 *
	 * @return \WP_Error
	 */
	public function update_item( $new_data ) {
		return new \WP_Error( 'invalid_request', 'Cannot update template to a remote source' );
	}

	/**
	 * Delete remote template.
	 *
	 * Remote template from Elementor.com servers cannot be deleted from the
	 * database as they are retrieved from remote servers.
	 *
	 * @access public
	 *
	 * @param int $template_id The template ID.
	 *
	 * @return \WP_Error
	 */
	public function delete_template( $template_id ) {
		return new \WP_Error( 'invalid_request', 'Cannot delete template from a remote source' );
	}

	/**
	 * Export remote template.
	 *
	 * Remote template from Elementor.com servers cannot be exported from the
	 * database as they are retrieved from remote servers.
	 *
	 * @access public
	 *
	 * @param int $template_id The template ID.
	 *
	 * @return \WP_Error
	 */
	public function export_template( $template_id ) {
		return new \WP_Error( 'invalid_request', 'Cannot export template from a remote source' );
	}

	/**
	 * Get remote template data.
	 *
	 * Retrieve the data of a single remote template from Elementor.com servers.
	 *
	 * @access public
	 *
	 * @param array  $args    Custom template arguments.
	 * @param string $context Optional. The context. Default is `display`.
	 *
	 * @return array Remote Template data.
	 */
	public function get_data( array $args, $context = 'display' ) {
		$data = self::get_template_content( $args['template_id'] );

		if ( is_wp_error( $data ) ) {
			return $data;
		}

		$data['content'] = $this->replace_elements_ids( $data['content'] );
		$data['content'] = $this->process_export_import_content( $data['content'], 'on_import' );

		$post_id = $args['editor_post_id'];
		$document = Plugin::$instance->documents->get( $post_id );
		if ( $document ) {
			$data['content'] = $document->get_elements_raw_data( $data['content'], true );
		}

		return $data;
	}


	/**
	 * Get template content.
	 *
	 * Retrieve the templates content received from a remote server.
	 *
	 * @access public
	 * @static
	 *
	 * @param int $template_id The template ID.
	 *
	 * @return array The template content.
	 */
	public static function get_template_content( $template_id ) {
		$library_data = self::get_library_data();
		$file = false;
		if ( ! empty( $library_data['templates'] ) ) {
			foreach ( $library_data['templates'] as $template_data ) {
				if($template_data['id']==$template_id){
					$file = $template_data['file'];
					break;
				}
			}
		}

		$template_content = [];
		$urlBase = 'https://import.pixfort.com/essentials/elementor/';
		$url = $urlBase .$file;

		$body_args = [];
		$getArgs = [
			'timeout' => 40,
			'body' => $body_args
		];
		$getArgs = apply_filters( 'pixfort_el_remote_get_args', $getArgs );
		$body_args = [
			// Which API version is used.
			'api_version' => ELEMENTOR_VERSION,
			// Which language to return.
			'site_lang' => get_bloginfo( 'language' ),
		];

		/**
		 * API: Template body args.
		 *
		 * Filters the body arguments send with the GET request when fetching the content.
		 *
		 * @param array $body_args Body arguments.
		 */
		$body_args = apply_filters( 'elementor/api/get_templates/body_args', $body_args );

		$response = wp_remote_get( $url, $getArgs );

		if ( is_wp_error( $response ) ) {
			return $response;
		}

		$response_code = (int) wp_remote_retrieve_response_code( $response );

		if ( 200 !== $response_code ) {
			return new \WP_Error( 'response_code_error', sprintf( 'The request returned with a status code of %s.', $response_code ) );
		}

		$template_content = json_decode( wp_remote_retrieve_body( $response ), true );




		if ( isset( $template_content['error'] ) ) {
			return new \WP_Error( 'response_error', $template_content['error'] );
			// return new \WP_Error( 'response_error', 'It seems that some files or configurations on your server are corrupted!' );
		}

		if ( empty( $template_content['data'] ) && empty( $template_content['content'] ) ) {
			// return new \WP_Error( 'template_data_error', 'An invalid data was returned.' );
			return new \WP_Error( 'template_data_error', 'It seems that some files or configurations on your server are corrupted!.' );
		}

		if(!empty($template_content['pixIsNested'])){
			if(!empty($template_content['pixNestedTemplates'])){
				if(is_array($template_content['pixNestedTemplates'])){
					$templates = $template_content['pixNestedTemplates'];
					$template_content = json_encode($template_content);
					require PIX_CORE_PLUGIN_DIR.'/functions/elementor/includes/local.php';
					$localSource = new Source_Custom_Local();
					$idBase = 'pix_template_temp_';
					$i = 1;
					foreach ($templates as $value) {
						$fullID = $idBase . $i;
						$urlValue = $urlBase . $value;
						$res = $localSource->pix_import_single_template($urlValue);
						if(!empty($res)){
							if(!empty($res['template_id'])){
								$template_content =	str_replace($fullID, $res['template_id'], $template_content);
							}
						}
						$i++;
					}
					$template_content = json_decode($template_content, true);
				}
			}
		}
		return $template_content;
	}

	/**
	 * @access private
	 */
	private function prepare_template( array $template_data ) {
		$favorite_templates = $this->get_user_meta( 'favorites' );

		return [
			'template_id' => $template_data['id'],
			'file' => $template_data['file'],
			'source' => $this->get_id(),
			'type' => $template_data['type'],
			'subtype' => $template_data['subtype'],
			'title' => $template_data['title'],
			'thumbnail' => $template_data['thumbnail'],
			'date' => $template_data['tmpl_created'],
			'author' => $template_data['author'],
			'tags' => json_decode( $template_data['tags'] ),
			'isPro' => false,
			'popularityIndex' => (int) $template_data['popularity_index'],
			'trendIndex' => (int) $template_data['trend_index'],
			'hasPageSettings' => ( '1' === $template_data['has_page_settings'] ),
			'url' => $template_data['url'],
			'accessLevel' => 0,
			'accessTier' => "free",
			'favorite' => ! empty( $favorite_templates[ $template_data['id'] ] ),
		];
	}
}
