<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Base;

class Enqueue
{
    function __construct()
    {
    }

    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    function enqueue()
    {
        wp_enqueue_style('pluginstyle', PLUGIN_URL . '/assets/mystyle.css');
        wp_enqueue_script('pluginscript', PLUGIN_URL . '/assets/myscript.js');
    }
}
