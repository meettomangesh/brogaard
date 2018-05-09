<?php

if (!function_exists('industrialist_mikado_content_options_map')) {

    function industrialist_mikado_content_options_map() {

        $panel_content = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_page_page',
                'name' => 'panel_content',
                'title' => esc_html__('Content','industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'type' => 'text',
            'name' => 'content_top_padding',
            'description' => esc_html__('Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value','industrialist'),
            'default_value' => '66',
            'label' => esc_html__('Content Top Padding for Template in Full Width','industrialist'),
            'args' => array(
                'suffix' => 'px',
                'col_width' => 3
            ),
            'parent' => $panel_content
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'text',
            'name' => 'content_top_padding_in_grid',
            'description' => esc_html__('Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value','industrialist'),
            'default_value' => '66',
            'label' => esc_html__('Content Top Padding for Templates in Grid','industrialist'),
            'args' => array(
                'suffix' => 'px',
                'col_width' => 3
            ),
            'parent' => $panel_content
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'text',
            'name' => 'content_top_padding_mobile',
            'description' => esc_html__('Enter top padding for content area for Mobile Header','industrialist'),
            'default_value' => '',
            'label' => esc_html__('Content Top Padding for Mobile Header','industrialist'),
            'args' => array(
                'suffix' => 'px',
                'col_width' => 3
            ),
            'parent' => $panel_content
        ));

    }

    add_action('industrialist_mikado_after_page_options_map', 'industrialist_mikado_content_options_map');

}