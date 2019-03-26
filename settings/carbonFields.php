<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once ( get_stylesheet_directory() . '/lib/carbon-fields/vendor/autoload.php' );
    Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {

    Container::make( 'post_meta', 'Page fields' )
        ->show_on_post_type( 'page' )
        ->where(
            'post_template', '=', 'home.php' )
        ->add_fields( array(
            Field::make( 'text', 'title', 'H1 top banner title' ),
            Field::make( 'textarea', 'desc', 'Top banner description' ),

            Field::make( 'text', 'press_list_title' ),
            Field::make( 'complex', 'press_list' )
                ->add_fields( array(
                    Field::make( 'image', 'image' ),
                ) ),

            Field::make( 'text', 'benefits_title' ),
            Field::make( 'image', 'benefits_img' ),
            Field::make( 'complex', 'benefit_list' )
                ->add_fields( array(
                    Field::make( 'text', 'title' ),
                    Field::make( 'textarea', 'desc', 'Description' ),
                ) ),

            Field::make( 'text', 'comments_title' ),
            Field::make( 'complex', 'comments_list' )
                ->add_fields( array(
                    Field::make( 'text', 'name' ),
                    Field::make( 'image', 'image' )->set_value_type( 'url' ),
                    Field::make( 'text', 'date' ),
                    Field::make( 'textarea', 'comment' )
                ) ),

            Field::make( 'text', 'blog_title' ),
            Field::make( 'text', 'blog_btn_title' ),
            Field::make( 'association', 'blog_posts' )
                ->set_types( array(
                    array(
                        'type' => 'post',
                        'post_type' => 'post',
                    ) ) )

        ) );

    Container::make( 'post_meta', 'Page fields' )
        ->show_on_post_type( 'page' )
        ->where(
            'post_template', '=', 'blog.php' )
        ->add_fields( array(
            Field::make( 'text', 'title', 'H1 top banner title' ),
        ) );

    Container::make( 'post_meta', 'Page fields' )
        ->show_on_post_type( 'page' )
        ->where( 'post_template', '=', 'car-info.php' )
        ->add_fields( array(
            Field::make( 'separator', 'before_bay_sep', 'Before you buy this car' ),
            Field::make( 'text', 'before_baying_title', 'Title'),
            Field::make( 'complex', 'before_baying_items' )
                ->add_fields( array(
                    Field::make( 'text', 'title' ),
                    Field::make( 'rich_text', 'desc', 'Description' ),
                ) ),

            Field::make( 'separator', 'quick_check_sep', 'Car quick check block' ),
            Field::make( 'text', 'quick_check_title', 'Title'),
            Field::make( 'complex', 'quick_check_items' )
                ->add_fields( array(
                    Field::make( 'text', 'text' ),
                ) ),
        ) );


    Container::make( 'theme_options', 'Theme Options' )
        ->add_fields( array(
            Field::make( 'image', 'header_logo'),
            Field::make( 'image', 'footer_logo'),

            Field::make( 'separator', 'titles_sep', 'Titles' ),
            Field::make( 'text', 'page_header_title'),
            Field::make( 'textarea', 'page_header_desc'),
            Field::make( 'text', 'car_not_found_text'),
            Field::make( 'text', 'post_header_title'),
            Field::make( 'text', 'debts_not_found'),
            Field::make( 'textarea', 'visual_reports_not_found_text'),
            Field::make( 'textarea', 'charges_info_not_found_text'),

            Field::make( 'separator', 'advertising_sep', 'Advertising links' ),
            Field::make( 'text', 'insurance'),
            Field::make( 'text', 'overview_insurance', 'Overview of insurance rates on the car link'),
            Field::make( 'text', 'car_loan_1'),
            Field::make( 'text', 'car_loan_2'),
            Field::make( 'text', 'debts_financed_link'),
            Field::make( 'rich_text', 'used_car_parts'),

        ) );

}
