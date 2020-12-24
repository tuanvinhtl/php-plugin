<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{

    public $callbacks;
    public $settings;
    public $pages = array();
    public $subPages = array();

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubpages();
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subPages)->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => 'Alecaddd Plugin',
                'menu_title' => 'Alecaddd',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_plugin',
                'callback' =>  array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-image-filter',
                'position' => 60
            ],
            [
                'page_title' => 'Alecaddd Shop',
                'menu_title' => 'Alecaddd Shop',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_shop',
                'callback' => function () {
                    return require_once("$this->plugin_path/templates/admin.php");
                },
                'icon_url' => 'dashicons-store',
                'position' => 61
            ]
        ];
    }

    public function setSubpages()
    {
        $this->subPages = [
            [
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Custom post types',
                'menu_title' => 'CTP',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_CTP',
                'callback' => function () {
                    echo '<h1>Alecaddd_CTP Shop</h1>';
                }
            ],
            [
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Custom Tamoxy',
                'menu_title' => 'Tamoxy',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_Tamoxy',
                'callback' => function () {
                    echo '<h1>Alecaddd_Tamoxy Shop</h1>';
                }
            ],
            [
                'parent_slug' => 'alecaddd_plugin',
                'page_title' => 'Custom Vinh',
                'menu_title' => 'Vinh',
                'capability' => 'manage_options',
                'menu_slug' => 'alecaddd_Vinh',
                'callback' => function () {
                    echo '<h1>Alecaddd_Vinh Shop</h1>';
                }
            ]
        ];
    }
}
