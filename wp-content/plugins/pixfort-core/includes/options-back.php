<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Options Backend.
 *
 * 
 *
 * @since 1.0
 */
class OptionsBack {


    public function __construct() {
        $this->load();
    }

    public function load() {

        add_action('wp_ajax_pix_conditions_search', array($this, 'conditionsSearch'));
        add_action('wp_ajax_nopriv_pix_conditions_search', array($this, 'conditionsSearch'));
        
        return $this;
    }

    
    
    public function conditionsSearch() {
        $result = array(
            'result' => true
        );
        if (!empty($_REQUEST['data'])) {
            $data = $_REQUEST['data'];
            if (!is_array($data)) {
                $data = stripslashes($data);
                $obj = json_decode(wp_specialchars_decode($data));
            } else {
                $obj = $data;
            }
            if (!empty($obj['value'])) {
                $value = $obj['value'];
                if (!empty($obj['nestedValue'])) {
                    $result['list'] = [];
                    switch ($obj['nestedValue']) {
                        case 'post':
                        case 'product':
                        case 'page':
                        case 'portfolio':
                        case 'child_of':
                        case 'any_child_of':
                            $post_type = $obj['nestedValue'];
                            if($post_type==='child_of' || $post_type==='any_child_of') {
                                $post_type = ['post', 'page'];
                            }
                            $query_params = [
                                'post_type' => $post_type,
                                's' => $value,
                                'posts_per_page' => -1,
                                'lang'           => '',
                            ];
                            $query = new \WP_Query( $query_params );
                            foreach ( $query->posts as $post ) {
                                // $text = $post->post_title;
                                // $post_type_obj = get_post_type_object( $post->post_type );
                                // if ( ! empty( $data['include_type'] ) ) {
                                //     $text = $post_type_obj->labels->name . ': ' . $post->post_title;
                                // } else {
                                //     $text = $post->post_title;
                                // }
                                $result['list'][] = [
                                    'value' => $post->ID,
                                    'name' => esc_html( $post->post_title ),
                                ];
                            }
                            break;
                        case 'cat':			            
                            $query_params_1 = [
                                'taxonomy' => 'category',
                                's' => $value,
                                'posts_per_page' => -1,
                                'hide_empty' => false
                            ];
                            $query_params_2 = [
                                'taxonomy' => 'portfolio-types',
                                'search' => $value,
                                'number' => 0,
                                'hide_empty' => false,
                            ];
                            
                            // Get terms for the first taxonomy
                            $terms_1 = get_terms($query_params_1);
                            
                            // Get terms for the second taxonomy
                            $terms_2 = get_terms($query_params_2);
                            
                            // Merge the two results
                            $query = array_merge($terms_1, $terms_2);
                            
                            $query = array_unique($query, SORT_REGULAR);

                            foreach ( $query as $term ) {
                                if(empty($result['list'][$term->term_id])) { 
                                    $result['list'][] = [
                                        'value' => $term->term_id,
                                        'name' => esc_html( $term->name ),
                                    ];
                                }
                            }
                            break;
                        case 'product_cat':			            
                            $query_params = [
                                'taxonomy' => 'product_cat',
                                's' => $value,
                                'posts_per_page' => -1,
                                'hide_empty' => false
                            ];
                            $query = get_terms( $query_params );
                            foreach ( $query as $term ) {
                                $result['list'][] = [
                                    'value' => $term->term_id,
                                    'name' => esc_html( $term->name ),
                                ];
                            }
                            break;
                        case 'product_tag':			            
                            $query_params = [
                                'taxonomy' => 'product_tag',
                                's' => $value,
                                'posts_per_page' => -1,
                                'hide_empty' => false
                            ];
                            $query = get_terms( $query_params );
                            foreach ( $query as $term ) {
                                $result['list'][] = [
                                    'value' => $term->term_id,
                                    'name' => esc_html( $term->name ),
                                ];
                            }
                            break;
                        // case 'page':
                        //     $query_params = [
                        //         'post_type' => 'page',
                        //         's' => $value,
                        //         'posts_per_page' => -1,
                        //     ];
                        //     $query = new \WP_Query( $query_params );
                        //     foreach ( $query->posts as $post ) {
                        //         $result['list'][] = [
                        //             'value' => $post->ID,
                        //             'name' => esc_html( $post->post_title ),
                        //         ];
                        //     }
                        //     break;
                        case 'author':
                            $query_params = [
                                'has_published_posts' => true,
                                'fields' => [
                                    'ID',
                                    'display_name',
                                ],
                                'search' => '*' . $value . '*',
                                'search_columns' => [
                                    'user_login',
                                    'user_nicename',
                                ],
                            ];

                            $user_query = new \WP_User_Query($query_params);

                            foreach ($user_query->get_results() as $author) {
                                $result['list'][] = [
                                    'value' => $author->ID,
                                    'name' => $author->display_name
                                ];
                            }
                            break;
                    }
                }
            }
        }
        echo json_encode($result);
        wp_die();
    }
}
