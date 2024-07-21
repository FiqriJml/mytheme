<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'custom_block_editor');
function custom_block_editor()
{
    Container::make('post_meta', 'Custom Data')
        ->where('post_type', '=', 'post')
        ->add_fields(
            array(
                Field::make('text', 'crb_text', 'Text Field'),
            )
        );
}