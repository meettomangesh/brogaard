<?php

if (!function_exists('industrialist_mikado_page_options_map')) {

    function industrialist_mikado_page_options_map() {

        industrialist_mikado_add_admin_page(
            array(
                'slug' => '_page_page',
                'title' => esc_html__('Page', 'industrialist'),
                'icon' => 'fa fa-institution'
            )
        );

        $custom_sidebars = industrialist_mikado_get_custom_sidebars();

        $panel_sidebar = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_page_page',
                'name' => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'page_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Sidebar Layout', 'industrialist'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'industrialist'),
            'default_value' => 'default',
            'parent' => $panel_sidebar,
            'options' => array(
                'default' => esc_html__('No Sidebar', 'industrialist'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'industrialist'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'industrialist'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'industrialist'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'industrialist')
            )
        ));


        if (count($custom_sidebars) > 0) {
            industrialist_mikado_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'industrialist'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'industrialist'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars,
                'args' => array(
                    'select2' => true
                )
            ));
        }

        industrialist_mikado_add_admin_field(array(
            'name' => 'page_show_comments',
            'type' => 'yesno',
            'label' => esc_html__('Show Comments', 'industrialist'),
            'description' => esc_html__('Enabling this option will show comments on your page', 'industrialist'),
            'default_value' => 'yes',
            'parent' => $panel_sidebar
        ));

        do_action('industrialist_mikado_after_page_options_map');

    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_page_options_map', 7);

}