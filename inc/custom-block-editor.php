<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('post_meta', 'Custom Data')
        ->where('post_type', '=', 'post')
        ->add_fields(
            array(
                Field::make('text', 'crb_text', 'Text Field'),
            )
        );
}