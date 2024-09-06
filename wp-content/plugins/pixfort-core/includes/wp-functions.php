<?php

/**
* Functions which enhance the site by hooking into WordPress
*
* @package pixfort core
*/

/**
* Adds custom classes to the array of body classes.
*
* @param array $classes Classes for the body element.
* @return array
*/
if(!function_exists('pix_body_classes')){
    function pix_body_classes( $classes ) {
        // Adds a class of hfeed to non-singular pages.
        if ( ! is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( ! is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }
        
        if(pix_plugin_get_option('pix-body-padding')&&pix_plugin_get_option('pix-body-padding')!=='none'){
            $classes[] = ' pix-padding-style ';
            $classes[] = pix_plugin_get_option('pix-body-padding');
            if(pix_plugin_get_option('pix-use-clip-path')){
                $classes[] = ' use-clip-path ';
            }
        }
        if(pix_plugin_get_option('pix-body-bg-color')){
            if(pix_plugin_get_option('pix-body-bg-color')!='custom'){
                $classes[] = ' bg-'.pix_plugin_get_option('pix-body-bg-color');
            }
        }
        if(pix_plugin_get_option('pix-boxed-layout')){
            $classes[] = ' pix-boxed-layout';
        }

        if(!is_archive() && !is_search()){
            if(get_post_meta( get_the_ID(), 'pix-sections-stack', true ) && get_post_meta( get_the_ID(), 'pix-sections-stack', true )!=='false'){
                $classes[] = ' pix-sections-stack ';
            }
        }
        if(pix_plugin_get_option('pix-sticky-footer')){
            $classes[] = ' pix-is-sticky-footer ';
        }
        if(get_post_meta( get_the_ID(), 'pix-sections-stack-dark', true )){
            $classes[] = ' pix-dark-v-nav ';
        }
        if(pix_plugin_get_option('pix-exit-popup')){
            if( pix_show_exit_popup() ) {
                $classes[] = ' pix-exit-popup';
            }
        }
        if(pix_plugin_get_option('pix-automatic-popup')){
            if( pix_show_automatic_popup() ){
                $classes[] = ' pix-auto-popup';
            }
        }
        if(pix_plugin_get_option('site-disable-loading-bar')){
            $classes[] = ' pix-disable-loading-bar';
        }
        $pageTransition = 'default';
        if (!empty(pix_plugin_get_option('site-page-transition'))) {
            $pageTransition = pix_plugin_get_option('site-page-transition');
        }
        $classes[] = ' site-render-'.$pageTransition;
        // if(pix_plugin_get_option('pix-custom-boxed')){
            // $classes[] = ' pix-custom-boxed-layout';
        // }

        return $classes;
    }
}
add_filter( 'body_class', 'pix_body_classes' );


if ( !function_exists( 'pix_filter_excerpt' ) ) {
	function pix_filter_excerpt( $excerpt ) {
		$excerpt = strip_shortcodes( $excerpt );
		return $excerpt;
	}
}
add_filter( 'get_the_excerpt', 'pix_filter_excerpt' );

if ( !function_exists( 'pix_custom_excerpt_length' ) ) {
	function pix_custom_excerpt_length( $length ) {
		return 40;
	}
}
add_filter( 'excerpt_length', 'pix_custom_excerpt_length', 999 );

function pixfort_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'pixfort_new_excerpt_more');

/**
* Adds custom classes to the tag cloud widget.
*
* @param array $classes Classes for the widget links.
* @return array
*/
function pixfort_tagcloud_classes( $tag_data ) {
	return array_map (
		function ( $item ) {
			$item['class'] .= ' btn btn-sm pix-mr-5 pix-my-5 btn-white rounded-xl text-body-default text-sm shadow-sm shadow-hover-sm fly-sm font-weight-bold';
			$item['font_size'] = 14;
			return $item;
		},
		(array) $tag_data
	);
}
add_filter( 'wp_generate_tag_cloud_data', 'pixfort_tagcloud_classes' );

/**
* Modifies tag cloud widget arguments to display all tags in the same font size
* and use list format for better accessibility.
*
* @param   array $args Arguments for tag cloud widget.
* @return  array The filtered arguments for tag cloud widget.
*/
function pixfort_widget_tag_cloud_args( $args ) {
	$args['largest']  = 16;
	$args['smallest'] = 16;
	$args['unit']     = 'px';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'pixfort_widget_tag_cloud_args');


/**
 * WPML
 */
add_filter('wpml_pb_shortcode_encode', 'pix_wpml_pb_shortcode_encode_urlencoded_json', 10, 3);
if ( !function_exists( 'pix_wpml_pb_shortcode_encode_urlencoded_json' ) ) {
    function pix_wpml_pb_shortcode_encode_urlencoded_json($string, $encoding, $original_string) {
        if ('urlencoded_json' === $encoding) {
            $output = array();
            foreach ($original_string as $combined_key => $value) {
                $parts = explode('_', $combined_key);
                $i = array_pop($parts);
                $key = implode('_', $parts);
                $output[$i][$key] = $value;
            }
            $string = urlencode(json_encode($output));
        }
        return $string;
    }
}

add_filter('wpml_pb_shortcode_decode', 'pix_wpml_pb_shortcode_decode_urlencoded_json', 10, 3);
if ( !function_exists( 'pix_wpml_pb_shortcode_decode_urlencoded_json' ) ) {
    function pix_wpml_pb_shortcode_decode_urlencoded_json($string, $encoding, $original_string) {
        if ('urlencoded_json' === $encoding) {
            $rows = json_decode(urldecode($original_string), true);
            $string = array();
            foreach ($rows as $i => $row) {
                foreach ($row as $key => $value) {
                    $string[$key . '_' . $i] = array('value' => $value, 'translate' => true);
                }
            }
        }
        return $string;
    }
}