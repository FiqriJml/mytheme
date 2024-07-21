<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Load Carbon fields through composer
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once get_template_directory() . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}
// Get and set data for gutenberg blocks
function getData()
{
    return get_query_var('component_data', []);
}

function setData($data)
{
    return set_query_var('component_data', $data);
}

add_action('after_setup_theme', 'mytheme_setup');
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