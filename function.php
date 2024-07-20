<?php
function mytheme_setup()
{
    // Menambahkan dukungan untuk judul dinamis.
    add_theme_support('title-tag');

    // Menambahkan dukungan untuk gambar unggulan.
    add_theme_support('post-thumbnails');

    // Menambahkan dukungan untuk HTML5.
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Menambahkan lokasi menu.
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'mytheme'),
        )
    );
}
add_action('after_setup_theme', 'mytheme_setup');

function mytheme_enqueue_scripts()
{
    wp_enqueue_style('mytheme-style', get_template_directory_uri() . '/dist/css/theme.min.css', array(), '1.0.0', 'all');
    wp_enqueue_script('mytheme-script', get_template_directory_uri() . '/dist/js/theme.min.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');