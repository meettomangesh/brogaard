<?php

if (!function_exists('industrialist_mikado_sidebar_options_map')) {

    function industrialist_mikado_sidebar_options_map() {

        industrialist_mikado_add_admin_page(
            array(
                'slug' => '_sidebar_page',
                'title' => esc_html__('Sidebar','industrialist'),
                'icon' => 'fa fa-bars'
            )
        );

        $panel_widgets = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_sidebar_page',
                'name' => 'panel_widgets',
                'title' => esc_html__('Widgets','industrialist')
            )
        );

        /**
         * Navigation style
         */

        industrialist_mikado_add_admin_field(array(
            'name' => 'sidebar_widget_separator',
            'type' => 'yesno',
            'label' => esc_html__('Show Separator', 'industrialist'),
            'description' => esc_html__('Enabling this option will show separator below title on widgets in sidebar.', 'industrialist'),
            'parent' => $panel_widgets,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'color',
            'name' => 'sidebar_background_color',
            'default_value' => '',
            'label' => esc_html__('Sidebar Background Color','industrialist'),
            'description' => esc_html__('Choose background color for sidebar','industrialist'),
            'parent' => $panel_widgets
        ));

        $group_sidebar_padding = industrialist_mikado_add_admin_group(array(
            'name' => 'group_sidebar_padding',
            'title' => esc_html__('Padding','industrialist'),
            'parent' => $panel_widgets
        ));

        $row_sidebar_padding = industrialist_mikado_add_admin_row(array(
            'name' => 'row_sidebar_padding',
            'parent' => $group_sidebar_padding
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'sidebar_padding_top',
            'default_value' => '',
            'label' => esc_html__('Top Padding','industrialist'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_sidebar_padding
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'sidebar_padding_right',
            'default_value' => '',
            'label' => esc_html__('Right Padding','industrialist'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_sidebar_padding
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'sidebar_padding_bottom',
            'default_value' => '',
            'label' =>esc_html__( 'Bottom Padding','industrialist'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_sidebar_padding
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'textsimple',
            'name' => 'sidebar_padding_left',
            'default_value' => '',
            'label' =>esc_html__( 'Left Padding','industrialist'),
            'args' => array(
                'suffix' => 'px'
            ),
            'parent' => $row_sidebar_padding
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'select',
            'name' => 'sidebar_alignment',
            'default_value' => '',
            'label' => esc_html__('Text Alignment','industrialist'),
            'description' => esc_html__('Choose text aligment','industrialist'),
            'options' => array(
                'left' => esc_html__('Left','industrialist'),
                'center' => esc_html__('Center','industrialist'),
                'right' => esc_html__('Right','industrialist')
            ),
            'parent' => $panel_widgets
        ));

    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_sidebar_options_map');

}