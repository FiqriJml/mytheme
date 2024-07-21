<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$includes = array(
    '/theme-setup.php',     // Initialize theme default settings.
    '/enqueue.php', // Enqueue elements
    '/custom-block-editor.php', // Register blocks
);

foreach ($includes as $file) {
    require_once get_template_directory() . '/inc' . $file;
}