<?php

function custom5_enqueue_script(){
wp_enqueue_style('customStyle',get_template_directory_uri().'./custom/custom.css',[],'1.0.0','all');
wp_enqueue_script('customjs', get_template_directory_uri().'./custom/custom.js',[], '1.0.0',true);
}

//This is firing the custom style and script. 
add_action('wp_enqueue_scripts', 'custom5_enqueue_script');



//menu setup
function plana_theme_setup(){
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header');
    register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init','plana_theme_setup');
