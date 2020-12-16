<?php

/**
 * @package AlecadddPlugin
 */

class AlecadddPluginDeActivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
