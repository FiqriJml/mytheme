<?php

function mytheme_enqueue_scripts()
{
    wp_enqueue_style('mytheme-style', get_template_directory_uri() . '/dist/css/theme.min.css', array(), '1.0.0', 'all');
    wp_enqueue_script('mytheme-script', get_template_directory_uri() . '/dist/js/theme.min.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');