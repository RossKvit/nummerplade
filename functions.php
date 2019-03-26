<?php


error_reporting(E_ERROR ); //E_ERROR
$conf['error_level'] = 1;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


function require_files_arr( $files ){
    foreach( $files as $item ){
        require_once get_stylesheet_directory() .'/'. $item;
    }
}
require_files_arr( array(
    'core/Component.php',
    'core/themeFunctions.php',
    'core/pupuga/autoload.php',
    'core/Post.php',
    'core/Cars.php',
    'settings/DefaultSettings.php',
//    'core/ConfigXmlLoader.php'

) );

(new Cars);

//var_dump(admin_url('admin-ajax.php'));

add_action( 'wp_enqueue_scripts', 'myajax_data', 100, 100 );
function myajax_data(){

    wp_localize_script('get_additional_info_json', 'ajaxurl',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}
