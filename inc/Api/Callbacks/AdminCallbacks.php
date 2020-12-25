<?php

/**
 * @package AlecadddPlugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }


    public function alecadddOptionsGroup($input)
    {
        return $input;
    }

    public function alecadddAdminSection()
    {
        echo 'check this section!';
    }

    public function alecadddTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="write something here!">';
    }

    public function alecadddFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="write something here!">';
    }
}
