<?php

if (!function_exists('industrialist_mikado_footer_options_map')) {
    /**
     * Add footer options
     */
    function industrialist_mikado_footer_options_map() {

        industrialist_mikado_add_admin_page(
            array(
                'slug' => '_footer_page',
                'title' => esc_html__('Footer','industrialist'),
                'icon' => 'fa fa-sort-amount-asc'
            )
        );

        $footer_panel = industrialist_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Footer','industrialist'),
                'name' => 'footer',
                'page' => '_footer_page'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'uncovering_footer',
                'default_value' => 'no',
                'label' => esc_html__('Uncovering Footer','industrialist'),
                'description' =>esc_html__('Enabling this option will make Footer gradually appear on scroll','industrialist'),
                'parent' => $footer_panel,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'footer_in_grid',
                'default_value' => 'yes',
                'label' => esc_html__('Footer in Grid','industrialist'),
                'description' => esc_html__('Enabling this option will place Footer content in grid','industrialist'),
                'parent' => $footer_panel,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'show_footer_top',
                'default_value' => 'yes',
                'label' => esc_html__('Show Footer Top','industrialist'),
                'description' => esc_html__('Enabling this option will show Footer Top area','industrialist'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_show_footer_top_container'
                ),
                'parent' => $footer_panel,
            )
        );

        $show_footer_top_container = industrialist_mikado_add_admin_container(
            array(
                'name' => 'show_footer_top_container',
                'hidden_property' => 'show_footer_top',
                'hidden_value' => 'no',
                'parent' => $footer_panel
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_top_columns',
                'default_value' => '4',
                'label' => esc_html__('Footer Top Columns','industrialist'),
                'description' =>esc_html__( 'Choose number of columns for Footer Top area','industrialist'),
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '5' => '3(25%+25%+50%)',
                    '6' => '3(50%+25%+25%)',
                    '4' => '4'
                ),
                'parent' => $show_footer_top_container,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_top_columns_alignment',
                'default_value' => '',
                'label' => esc_html__('Footer Top Columns Alignment','industrialist'),
                'description' => esc_html__('Text Alignment in Footer Columns','industrialist'),
                'options' => array(
                    'left' =>esc_html__( 'Left','industrialist'),
                    'center' => esc_html__('Center','industrialist'),
                    'right' =>esc_html__( 'Right','industrialist')
                ),
                'parent' => $show_footer_top_container,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'show_footer_bottom',
                'default_value' => 'yes',
                'label' =>esc_html__( 'Show Footer Bottom','industrialist'),
                'description' =>esc_html__( 'Enabling this option will show Footer Bottom area','industrialist'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_show_footer_bottom_container'
                ),
                'parent' => $footer_panel,
            )
        );

        $show_footer_bottom_container = industrialist_mikado_add_admin_container(
            array(
                'name' => 'show_footer_bottom_container',
                'hidden_property' => 'show_footer_bottom',
                'hidden_value' => 'no',
                'parent' => $footer_panel
            )
        );


        industrialist_mikado_add_admin_field(
            array(
                'type' => 'select',
                'name' => 'footer_bottom_columns',
                'default_value' => '3',
                'label' =>esc_html__( 'Footer Bottom Columns','industrialist'),
                'description' => esc_html__('Choose number of columns for Footer Bottom area','industrialist'),
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3'
                ),
                'parent' => $show_footer_bottom_container,
            )
        );


        $panel_widgets = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_footer_page',
                'name' => 'panel_widgets',
                'title' => esc_html__('Widgets','industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'footer_widget_separator',
            'type' => 'yesno',
            'label' => esc_html__('Show Separator', 'industrialist'),
            'description' => esc_html__('Enabling this option will show separator below title on widgets in footer.', 'industrialist'),
            'parent' => $panel_widgets,
            'default_value' => 'yes'
        ));


    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_footer_options_map', 9);

}