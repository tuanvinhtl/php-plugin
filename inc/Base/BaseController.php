<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Base;

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin;

    function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__DIR__));
        $this->plugin_url = plugin_dir_path(dirname(__DIR__));
        $this->plugin = plugin_basename(dirname(__FILE__, 3) . '/alecaddd-plugin.php');
    }
}
