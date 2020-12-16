<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Base;

class SettingsLinks
{
    function __construct()
    {
    }

    public function register()
    {
        add_filter('plugin_action_links_' . PLUGIN, array($this, 'settings_link'));
    }

    public function settings_link($links)
    {
        // add custom settings link
        $settings_link = '<a href="admin.php?page=alecaddd_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
