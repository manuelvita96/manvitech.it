<?php

/*
Plugin Name: manvitech - siti internet e social marketing
Plugin URI:  https://manvitech.it
Description: A site-specific functionality plugin for manvitech - siti internet e social marketing where you can paste your code snippets instead of using the theme's functions.php file
Author:      manvitech
Author URI:  http://beta.manvitech.it
Version:     2020.12.30
License:     GPL
*/

// uncomment the below line to enable CSS functionality
// add_filter( 'functionality_enable_styles', '__return_true' );

function post_title_shortcode(){
    return get_the_title();
}
add_shortcode('post_title','post_title_shortcode');