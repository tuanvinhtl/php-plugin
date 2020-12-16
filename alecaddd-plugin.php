<?php

/**
 * @package AlecadddPlugin
 * @version 1.7.2
 */
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
if (!class_exists('AlecadddPlugin')) {

    class AlecadddPlugin
    {
        function __construct()
        {
            add_action('init', array($this, 'custom_post_type'));
        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            add_action('admin_menu', array($this, 'add_admin_pages'));
        }

        public function add_admin_pages()
        {
            add_menu_page('Alecaddd Plugin', 'Alecaddd', 'manage_options', 'alecaddd_plugin', array($this, 'admin_index'), 'dashicons-image-filter', 60);
        }

        public function admin_index()
        {
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        function enqueue()
        {
            // endqueue all our style
            wp_enqueue_style('pluginstyle', plugins_url('/assets/mystyle.css', __FILE__));

            // endqueue all our scripts
            wp_enqueue_script('pluginscript', plugins_url('/assets/myscript.js', __FILE__));
        }
    }

    /**this is case check class */

    $alecaddddPlugin = new AlecadddPlugin();
    $alecaddddPlugin->register();


    // activation
    require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-activate.php';
    register_activation_hook(__FILE__, array('AlecadddPluginActivate', 'activate'));

    // deactivation
    require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-deactivate.php';
    register_deactivation_hook(__FILE__, array('AlecadddPluginDeActivate', 'deactivate'));
}
