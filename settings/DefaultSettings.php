<?php

require_files_arr(array(
    '/settings/carbonFields.php',
    '/settings/PostType.php',
    '/settings/PostTypeReg.php',
    '/settings/TaxonomyReg.php',
    '/settings/NavFooterWalker.php',
    '/settings/Custom_Walker_Nav_Menu.php'
));

function setup(){

    function load_enqueue() {

        wp_enqueue_style('style', get_stylesheet_directory_uri() . '/assets/css/main.css');

/*        $configData = (new Config())->getConfig();
        if( $configData->styles != null ){
            foreach($configData->styles as $item ){
                wp_enqueue_style($item, get_stylesheet_directory_uri() . '/css/'.$item );
            }
        }*/

        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', '/wp-includes/js/jquery/jquery.js?ver=1.12.4', false, NULL, true );
        wp_enqueue_script( 'jquery' );

        wp_deregister_script( 'jquery-migrate' );
        wp_register_script( 'jquery-migrate', '/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1', false, NULL, true );
        wp_enqueue_script( 'jquery-migrate' );

        wp_enqueue_script('main_js', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'),null,true);
        //wp_localize_script('main', '$ajax',array('url' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('full_access')));

    }
    add_action( 'wp_enqueue_scripts', 'load_enqueue' );


    add_theme_support('widgets');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');


/*    remove_action('wp_head', 'wlwmanifest_link'); */

}
add_action('after_setup_theme', 'setup');

function set_https_on(){
    if( strpos( get_option('siteurl'), 'https://' ) !== false ){
        $_SERVER['HTTPS'] = 'on';
    }
}
set_https_on();

function custom_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['ico'] = 'image/x-icon';
    return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');

add_filter( 'post_class', 'remove_hentry' );
function remove_hentry( $classes ) {
    $unset = array('hentry'); // можно добавить еще
    return array_diff( $classes, $unset );
}

function set_link_tag($url, $rel){
    echo '<link rel="'. $rel .'" href="'. esc_url( $url ) .'" />';
    echo "\n";
}

/*Add Prev and Next Tags to Paginated Single Posts*/
function add_rel_prev_next_paginated_posts(){

    if( is_single() ){
        global $post;

        $all_posts = (new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => -1 )))->get_posts( ) ;
        wp_reset_postdata();

        for($i = 0; $i < count($all_posts); $i++ ){
            if( $all_posts[$i]->ID == $post->ID){
                if( isset($all_posts[$i-1]) ){
                    set_link_tag( get_permalink($all_posts[$i-1]->ID) , 'prev' );
                }

                if( isset($all_posts[$i+1]) ){
                    set_link_tag( get_permalink($all_posts[$i+1]->ID), 'next' );
                }
                break;
            }
        }

    }

    //set_robots_meta_teg();
}
add_action('wp_head', 'add_rel_prev_next_paginated_posts', 10, 3 );

function set_robots_meta_teg(){
    if( is_robots_index( ) ){
        echo '<meta name="robots" content="index,follow">';
    }
}

function is_robots_index(){
    global $post;
    $post_meta = get_post_meta($post->ID);
    $footer_menu_pages = wp_get_nav_menu_items('footer-menu');
    $set_index = false;

    //print_r($post_meta['_yoast_wpseo_meta-robots-noindex'][0] == 1 );
    //print_r($post_meta['_yoast_wpseo_meta-robots-nofollow'][0] == 1 );
    //   print_r( $post_meta );

    if( ($post_meta['_yoast_wpseo_meta-robots-noindex'][0] != 1 && $post_meta['_yoast_wpseo_meta-robots-nofollow'][0] != 1)
        || ( !isset( $post_meta['_yoast_wpseo_meta-robots-noindex'][0]) && $post_meta['_yoast_wpseo_meta-robots-nofollow'][0] != 1)
        || ( !isset( $post_meta['_yoast_wpseo_meta-robots-nofollow'][0]) && $post_meta['_yoast_wpseo_meta-robots-noindex'][0] != 1)
        || ( !isset( $post_meta['_yoast_wpseo_meta-robots-nofollow'][0]) && !isset( $post_meta['_yoast_wpseo_meta-robots-noindex'][0]) )){

        foreach ( $footer_menu_pages as $item ){
            if( $item->object_id == $post->ID ){
                $set_index = true;
                break;
            }
        }

        if(	is_front_page() || $post->post_type == 'post' || $post->post_type == 'banks' || $post->post_type == 'cards' || get_page_template_slug($post->ID) == 'front-page.php' || $set_index ){
            return true;
        }
    }

    return false;
}


function set_head_scripts(){
    $configData = (new Config())->getConfig();
    if( isset($configData->head_scripts) ){
        foreach ( $configData->head_scripts as $item ){
            echo require_tmpl($item);
        }
    }
}

//add_action('wp_footer', 'set_head_scripts', 10, 3 );


function redirect_to_lowercase(){

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

    $cur_url = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $cur_url = explode("?", $cur_url);
    $link = $cur_url[0];
    $params = isset($cur_url[1]) ? $cur_url[1]:'';

    if( preg_match('/[A-Z]/', $link) ){

        $link = trim($params) != false? strtolower( $link ).'?'.$params : strtolower( $link ) ;
        header("Cache-Control: no-cache, must-revalidate");
        header("Location: ". $link ,TRUE,301);
        exit();
    }
}

add_filter('init', 'redirect_to_lowercase', 10, 3 );

function http_last_mod(){

    global $post;

    $LastModified_unix = strtotime($post->post_modified);
    $LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
    $IfModifiedSince = false;
    if (isset($_ENV['HTTP_IF_MODIFIED_SINCE']))
        $IfModifiedSince = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
        $IfModifiedSince = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
    if ($IfModifiedSince && $IfModifiedSince >= $LastModified_unix) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
        exit;
    }
    header('Last-Modified: '. $LastModified);
}

add_filter('wp', 'http_last_mod', 10, 3 );


function many_to_one_redirect(){
    $redirect_list =  carbon_get_theme_option( 'many_to_one_redirect', 'complex' );

    foreach ( $redirect_list as $redirect_item ){
        foreach ($redirect_item['redirect_list_from'] as $item){

            $redirect_item_url = str_ireplace(get_option('home'),'', $item['title']);
            $redirect_item_url = trim( $redirect_item_url );
            $redirect_item_url = rtrim($redirect_item_url,'/');

            if( is_current_url( home_url().$redirect_item_url ) ){

                if (strpos($redirect_item['redirect_to'],'/') === 0){
                    $redirect_item['redirect_to'] = home_url().$redirect_item['redirect_to'];
                }
                $current_get_params = get_current_get_params();

                if( $current_get_params !== false ){
                    $redirect_item['redirect_to'] = $redirect_item['redirect_to'].'/?'.get_current_get_params();
                }

                header("Cache-Control: no-cache, must-revalidate");
                header("Location: ".$redirect_item['redirect_to'],TRUE,301);
                exit();
            }
        }
    }
}
//add_action('wp', 'many_to_one_redirect', 9, 3 );

function get_protocol() {
    // Set the base protocol to http
    $protocol = 'http';
    // check for https
    if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
        $protocol .= "s";
    }

    return $protocol;
}


function wp_remove_seo_hooks(){

    if( isset($GLOBALS['wp_filter']['wpseo_head']->callbacks['20']) ){
        unset( $GLOBALS['wp_filter']['wpseo_head']->callbacks['20'] );
    }

    if(strpos( $_SERVER['REQUEST_URI'], '/blog/page', 0) !== false  ){
        set_link_tag($_SERVER['HTTP_HOST'].'/blog/', 'canonical' );
    }

    $post = get_page_by_path( str_replace( array( get_additional_slug().'/', '/kreditnye-karty/' ) , '/', explode('?', $_SERVER['REQUEST_URI'], 2)[0] ) , OBJECT, 'banks');
    if( $post == null ){
        $post = get_page_by_path( str_replace( array( get_additional_slug().'/', '/kreditnye-karty/' ) , '/', explode('?', $_SERVER['REQUEST_URI'], 2)[0] ) , OBJECT, 'cards');
    }

    if( isset( $post->post_parent ) && $post->post_parent != 0 && ( $post->post_type == 'cards' || $post->post_type == 'banks' ) ){
        set_link_tag( get_permalink( $post->post_parent ), 'canonical' );
    }

    if( is_robots_index() && isset($GLOBALS['wp_filter']['wpseo_head']->callbacks['10']) ){
        unset( $GLOBALS['wp_filter']['wpseo_head']->callbacks['10'] );
    }
}
//add_filter( 'wp', 'wp_remove_seo_hooks', 11 );



