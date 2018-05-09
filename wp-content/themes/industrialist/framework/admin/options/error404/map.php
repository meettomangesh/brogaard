<?php

if (!function_exists('industrialist_mikado_error_404_options_map')) {

    function industrialist_mikado_error_404_options_map() {

        industrialist_mikado_add_admin_page(array(
            'slug' => '__404_error_page',
            'title' => esc_html__('404 Error Page', 'industrialist'),
            'icon' => 'fa fa-exclamation-triangle'
        ));

        $panel_404_options = industrialist_mikado_add_admin_panel(array(
            'page' => '__404_error_page',
            'name' => 'panel_404_options',
            'title' => esc_html__('404 Page Option', 'industrialist')
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => '404_image',
            'type' => 'image',
            'default_value' => '',
            'label' => esc_html__('Image', 'industrialist'),
            'description' => esc_html__('Set image for 404 page', 'industrialist'),
            'parent' => $panel_404_options
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'text',
            'name' => '404_title',
            'default_value' => '',
            'label' => esc_html__('Title', 'industrialist'),
            'description' => esc_html__('Enter title for 404 page', 'industrialist')
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'text',
            'name' => '404_text',
            'default_value' => '',
            'label' => esc_html__('Text', 'industrialist'),
            'description' => esc_html__('Enter text for 404 page', 'industrialist')
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'text',
            'name' => '404_back_to_home',
            'default_value' => '',
            'label' => esc_html__('Back to Home Button Label', 'industrialist'),
            'description' => esc_html__('Enter label for "Back to Home" button', 'industrialist')
        ));

    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_error_404_options_map', 15);

}