<?php

/**
 * Trigger this file on Plugin uninstall
 * @package AlecadddPlugin
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// Clear database stored data
$books = get_posts(array('post_type' => 'book', 'numberpost' => -1));

foreach ($books as $book) {
    # code...
    wp_delete_post($book->ID, true);
}
