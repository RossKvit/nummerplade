<?php
/** Template Name: Blog */

get_header();

Component::get_component('Blog', array( 'class' => 'blog--page' ));

get_footer();