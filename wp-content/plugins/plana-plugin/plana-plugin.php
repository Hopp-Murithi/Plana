<?php

/**
 * @package Plana
 */

/*
Plugin Name: Events Plana
Plugin URI: http://...
Description: An Event Management plugin developed from scratch by the bests devs in town.
Version: 1.0.0
Author: Hopp and Kores
Author URI: http://...
License: GPLv2 or Later
Text Domain: Plana Plugin
*/

//Security Check here and there
defined('ABSPATH') or die("Caught you hacker");

if(file_exists(dirname(__FILE__).'/vendor/autoload.php')){
    require_once dirname(__FILE__).'/vendor/autoload.php';
}


function activate_plana_plugin(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_plana_plugin');

function deactivate_plana_plugin(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_plana_plugin');

if (class_exists( 'Inc\\Init')){
    Inc\Init::register_sevices();
}