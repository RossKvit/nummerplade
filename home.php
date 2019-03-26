<?php
/** Template Name: Home */

    get_header();

    Component::get_component('PressList', null);
    Component::get_component('RecentSearch', array( 'count' => 4 ) );
    Component::get_component('OurBenefits', null);
    Component::get_component('Comments', null);
    Component::get_component('Blog', array( 'posts_count' => 4 ));
    Component::get_component('Content', null);

    get_footer();

