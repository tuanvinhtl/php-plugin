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

        $this->setSettings();
        $this->setSections();
        $this->setFields();

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

    public function setSettings()
    {
        $args = [
            [
                'option_group' => 'alecaddd_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'alecadddOptionsGroup'),
            ],
            [
                'option_group' => 'alecaddd_options_group',
                'option_name' => 'first_name',
            ]
        ];
        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = [
            [
                'id' => 'alecaddd_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'alecadddAdminSection'),
                'page' => 'alecaddd_plugin'
            ]
        ];
        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = [
            [
                'id' => 'text_example',
                'title' => 'Text example',
                'callback' => array($this->callbacks, 'alecadddTextExample'),
                'page' => 'alecaddd_plugin',
                'section' => 'alecaddd_admin_index',
                'args' => [
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                ]
            ],
            [
                'id' => 'first_name',
                'title' => 'First name',
                'callback' => array($this->callbacks, 'alecadddFirstName'),
                'page' => 'alecaddd_plugin',
                'section' => 'alecaddd_admin_index',
                'args' => [
                    'label_for' => 'first_name',
                    'class' => 'example-class'
                ]
            ]
        ];
        $this->settings->setFields($args);
    }
}
