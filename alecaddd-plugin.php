<?php

/**
 * @package AlecadddPlugin
 * @version 1.7.2
 */

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/*
Plugin Name: Alecaddd Plugin
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Vinh Tuan
Version: 1.7.2
Author URI: http://ma.tt/
license: GPLv2 or later
*/

defined('ABSPATH') or die('Hey, you can\t access this file');

if (file_exists(__FILE__) . '/vendor/autoload.php') {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


function activate_alecaddd_plugin()
{
    Activate::activate();
}
register_activation_hook(__FILE__, 'activate_alecaddd_plugin');


function deactivate_alecaddd_plugin()
{
    Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_alecaddd_plugin');


if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
