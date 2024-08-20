<?php




function enqueue_custom_styles(): void
{
    wp_enqueue_style('tailwind-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
