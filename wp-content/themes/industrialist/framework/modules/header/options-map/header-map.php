<?php

if ( ! function_exists('industrialist_mikado_header_options_map') ) {

	function industrialist_mikado_header_options_map() {

		industrialist_mikado_add_admin_page(
			array(
				'slug' => '_header_page',
                'title' => esc_html__('Header', 'industrialist'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = industrialist_mikado_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
                'title' => esc_html__('Header', 'industrialist')
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
                'label'         => esc_html__('Choose Header Type', 'industrialist'),
                'description'   => esc_html__('Select the type of header you would like to use', 'industrialist'),
				'options' => array(
                    'header-standard'          => array(
                        'image' => MIKADO_FRAMEWORK_ROOT.'/admin/assets/img/header-standard.png',
                        'label' => esc_html__('Standard', 'industrialist')
                    ),
                    'header-standard-extended' => array(
                        'image' => MIKADO_FRAMEWORK_ROOT.'/admin/assets/img/header-standard-extended.png',
                        'label' => esc_html__('Standard Extended', 'industrialist')
                    ),
                    'header-box'               => array(
                        'image' => MIKADO_FRAMEWORK_ROOT.'/admin/assets/img/header-box.png',
                        'label' => esc_html__('In The Box', 'industrialist')
                    ),
                    'header-minimal'           => array(
                        'image' => MIKADO_FRAMEWORK_ROOT.'/admin/assets/img/header-minimal.png',
                        'label' => esc_html__('Minimal', 'industrialist')
                    ),
                    'header-vertical'          => array(
                        'image' => MIKADO_FRAMEWORK_ROOT.'/admin/assets/img/header-vertical.png',
                        'label' => esc_html__('Vertical', 'industrialist')
                    ),
				),
                'args'          => array(
                    'use_images'  => true,
                    'hide_labels' => true,
                    'dependence'  => true,
                    'show'        => array(
                        'header-standard'          => '#mkd_panel_header_standard,#mkd_header_behaviour,#mkd_panel_sticky_header,#mkd_panel_main_menu',
                        'header-standard-extended' => '#mkd_panel_header_standard_extended,#mkd_header_behaviour,#mkd_panel_sticky_header,#mkd_panel_main_menu',
                        'header-box'               => '#mkd_panel_header_box,#mkd_header_behaviour,#mkd_panel_sticky_header,#mkd_panel_main_menu',
                        'header-minimal'           => '#mkd_panel_header_minimal,#mkd_header_behaviour,#mkd_panel_fullscreen_menu,#mkd_panel_sticky_header',
                        'header-vertical'          => '#mkd_panel_header_vertical,#mkd_panel_vertical_main_menu',
                    ),
                    'hide'        => array(
                        'header-standard'          => '#mkd_panel_header_vertical,#mkd_panel_vertical_main_menu,#mkd_panel_header_minimal,#mkd_panel_fullscreen_menu,#mkd_panel_fixed_header,#mkd_panel_header_standard_extended,#mkd_panel_header_box',
                        'header-standard-extended' => '#mkd_panel_header_vertical,#mkd_panel_vertical_main_menu,#mkd_panel_header_standard,#mkd_panel_header_minimal,#mkd_panel_fullscreen_menu,#mkd_panel_fixed_header,#mkd_panel_header_box',
                        'header-box'               => '#mkd_panel_header_vertical,#mkd_panel_vertical_main_menu,#mkd_panel_header_standard,#mkd_panel_header_minimal,#mkd_panel_fullscreen_menu,#mkd_panel_fixed_header,#mkd_panel_header_standard_extended',
                        'header-minimal'           => '#mkd_panel_header_standard,#mkd_panel_main_menu,#mkd_panel_header_vertical,#mkd_panel_fixed_header,#mkd_panel_header_standard_extended,#mkd_panel_header_box',
                        'header-vertical'          => '#mkd_panel_header_standard,#mkd_header_behaviour,#mkd_panel_fixed_header,#mkd_panel_sticky_header,#mkd_panel_main_menu,#mkd_panel_header_minimal,#mkd_panel_fullscreen_menu,#mkd_panel_header_standard_extended,#mkd_panel_header_box',
                    )
                )
			)
		);

        industrialist_mikado_add_admin_field(
            array(
                'parent'          => $panel_header,
                'type'            => 'select',
                'name'            => 'header_behaviour',
                'default_value'   => 'sticky-header-on-scroll-up',
                'label'           => esc_html__('Choose Header behaviour', 'industrialist'),
                'description'     => esc_html__('Select the behaviour of header when you scroll down to page', 'industrialist'),
                'options'         => array(
                    'no-behavior'                     => esc_html__('No Behavior', 'industrialist'),
                    'sticky-header-on-scroll-up'      => esc_html__('Sticky on scrol up', 'industrialist'),
                    'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'industrialist'),
                    'fixed-on-scroll'                 => esc_html__('Fixed on scroll', 'industrialist')
                ),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array('header-vertical'),
                'args'            => array(
                    'dependence' => true,
                    'show'       => array(
                        'sticky-header-on-scroll-up'      => '#mkd_panel_sticky_header',
                        'sticky-header-on-scroll-down-up' => '#mkd_panel_sticky_header',
                        'fixed-on-scroll'                 => '',
                    ),
                    'hide'       => array(
                        'sticky-header-on-scroll-up'      => '#mkd_panel_fixed_header',
                        'sticky-header-on-scroll-down-up' => '#mkd_panel_fixed_header',
                        'no-behavior'                     => '#mkd_panel_fixed_header, #mkd_panel_fixed_header, #mkd_panel_sticky_header',
                        'fixed-on-scroll'                 => '#mkd_panel_sticky_header',
                    )
                )
            )
        );

        /***************** Top Bar Start *******************/

        industrialist_mikado_add_admin_field(
            array(
                'name'          => 'top_bar',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Top Bar', 'industrialist'),
                'description'   => esc_html__('Enabling this option will show top bar area', 'industrialist'),
                'parent'        => $panel_header,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_top_bar_container"
                )
            )
        );

		$top_bar_container = industrialist_mikado_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $top_bar_container,
                'type'          => 'select',
                'name'          => 'top_bar_layout',
                'default_value' => 'three-columns',
                'label'         => esc_html__('Choose top bar layout', 'industrialist'),
                'description'   => esc_html__('Select the layout for top bar', 'industrialist'),
                'options'       => array(
                    'two-columns'   => esc_html__('Two columns', 'industrialist'),
                    'three-columns' => esc_html__('Three columns', 'industrialist')
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        'two-columns'   => '#mkd_top_bar_layout_container',
                        'three-columns' => '#mkd_top_bar_two_columns_layout_container'
                    ),
                    'show'       => array(
                        'two-columns'   => '#mkd_top_bar_two_columns_layout_container',
                        'three-columns' => '#mkd_top_bar_layout_container'
                    )
                )
            )
        );

        $top_bar_layout_container = industrialist_mikado_add_admin_container(array(
            'name'            => 'top_bar_layout_container',
            'parent'          => $top_bar_container,
            'hidden_property' => 'top_bar_layout',
            'hidden_value'    => '',
            'hidden_values'   => array('two-columns'),
        ));

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $top_bar_layout_container,
                'type'          => 'select',
                'name'          => 'top_bar_column_widths',
                'default_value' => '30-30-30',
                'label'         => esc_html__('Choose column widths', 'industrialist'),
                'description'   => '',
                'options'       => array(
                    '30-30-30' => '33% - 33% - 33%',
                    '25-50-25' => '25% - 50% - 25%'
                )
            )
        );

        $top_bar_two_columns_layout = industrialist_mikado_add_admin_container(array(
            'name'            => 'top_bar_two_columns_layout_container',
            'parent'          => $top_bar_container,
            'hidden_property' => 'top_bar_layout',
            'hidden_value'    => '',
            'hidden_values'   => array('three-columns'),
        ));

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $top_bar_two_columns_layout,
                'type'          => 'select',
                'name'          => 'top_bar_two_column_widths',
                'default_value' => '50-50',
                'label'         => esc_html__('Choose column widths', 'industrialist'),
                'description'   => '',
                'options'       => array(
                    '50-50' => '50% - 50%',
                    '33-66' => '33% - 66%',
                    '66-33' => '66% - 33%'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name'          => 'top_bar_in_grid',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Top Bar in grid', 'industrialist'),
                'description'   => esc_html__('Set top bar content to be in grid', 'industrialist'),
                'parent'        => $top_bar_container,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_top_bar_in_grid_container"
                )
            )
        );

        $top_bar_in_grid_container = industrialist_mikado_add_admin_container(array(
            'name'            => 'top_bar_in_grid_container',
            'parent'          => $top_bar_container,
            'hidden_property' => 'top_bar_in_grid',
            'hidden_value'    => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'top_bar_grid_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Grid Background Color', 'industrialist'),
            'description' => esc_html__('Set grid background color for top bar', 'industrialist'),
            'parent'      => $top_bar_in_grid_container
        ));


        industrialist_mikado_add_admin_field(array(
            'name'        => 'top_bar_grid_background_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Grid Background Transparency', 'industrialist'),
            'description' => esc_html__('Set grid background transparency for top bar', 'industrialist'),
            'parent'      => $top_bar_in_grid_container,
            'args'        => array('col_width' => 3)
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'top_bar_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'industrialist'),
            'description' => esc_html__('Set background color for top bar', 'industrialist'),
            'parent'      => $top_bar_container
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'top_bar_background_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Background Transparency', 'industrialist'),
            'description' => esc_html__('Set background transparency for top bar', 'industrialist'),
            'parent'      => $top_bar_container,
            'args'        => array('col_width' => 3)
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'top_bar_height',
            'type'        => 'text',
            'label'       => esc_html__('Top bar height', 'industrialist'),
            'description' => esc_html__('Enter top bar height (Default is 45px)', 'industrialist'),
            'parent'      => $top_bar_container,
            'args'        => array(
                'col_width' => 2,
                'suffix'    => 'px'
            )
        ));

        /***************** Top Bar End *******************/

        /***************** Header Style Start *******************/

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header,
                'type'          => 'select',
                'name'          => 'header_style',
                'default_value' => '',
                'label'         => esc_html__('Header Skin', 'industrialist'),
                'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'industrialist'),
                'options'       => array(
                    ''             => '',
                    'light-header' => esc_html__('Light', 'industrialist'),
                    'dark-header'  => esc_html__('Dark', 'industrialist')
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header,
                'type'          => 'yesno',
                'name'          => 'enable_header_style_on_scroll',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Header Style on Scroll', 'industrialist'),
                'description'   => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'industrialist'),
            )
        );

        /***************** Header Style End *******************/

        /***************** Header Standard Start *******************/


        $panel_header_standard = industrialist_mikado_add_admin_panel(
            array(
                'page'            => '_header_page',
                'name'            => 'panel_header_standard',
                'title'           => esc_html__('Header Standard', 'industrialist'),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-standard-extended',
                    'header-box',
                    'header-vertical',
                    'header-minimal',
                )
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_header_standard,
                'name'   => 'menu_area_title',
                'title'  => esc_html__('Menu Area', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_header_standard',
                'default_value' => 'yes',
                'label'         => esc_html__('Header In Grid', 'industrialist'),
                'description'   => esc_html__('Set header content to be in grid', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_in_grid_header_standard_container'
                )
            )
        );

        $menu_area_in_grid_header_standard_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_standard,
                'name'            => 'menu_area_in_grid_header_standard_container',
                'hidden_property' => 'menu_area_in_grid_header_standard',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_standard_container,
                'type'          => 'color',
                'name'          => 'menu_area_grid_background_color_header_standard',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Color', 'industrialist'),
                'description'   => esc_html__('Set grid background color for header area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_standard_container,
                'type'          => 'text',
                'name'          => 'menu_area_grid_background_transparency_header_standard',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Transparency', 'industrialist'),
                'description'   => esc_html__('Set grid background transparency for header', 'industrialist'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_standard_container,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_shadow_header_standard',
                'default_value' => 'no',
                'label'         => esc_html__('Grid Area Shadow', 'industrialist'),
                'description'   => esc_html__('Set shadow on grid area', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard,
                'type'          => 'select',
                'name'          => 'menu_area_position_header_standard',
                'default_value' => 'left',
                'label'         => esc_html__('Position of Menu', 'industrialist'),
                'description'   => esc_html__('Set position of menu in header', 'industrialist'),
                'options'       => array(
                    'left' => esc_html__('Left (Next To Logo)','industrialist'),
                    'right' => esc_html__('Right','industrialist'),
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard,
                'type'          => 'color',
                'name'          => 'menu_area_background_color_header_standard',
                'default_value' => '',
                'label'         => esc_html__('Background color', 'industrialist'),
                'description'   => esc_html__('Set background color for header', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard,
                'type'          => 'text',
                'name'          => 'menu_area_background_transparency_header_standard',
                'default_value' => '',
                'label'         => esc_html__('Background transparency', 'industrialist'),
                'description'   => esc_html__('Set background transparency for header', 'industrialist'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard,
                'type'          => 'yesno',
                'name'          => 'menu_area_shadow_header_standard',
                'default_value' => 'yes',
                'label'         => esc_html__('Header Area Shadow', 'industrialist'),
                'description'   => esc_html__('Set shadow on header area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_standard',
                'default_value' => 'no',
                'label'         => esc_html__('Header Area Border', 'industrialist'),
                'description'   => esc_html__('Set border on header area', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_border_standard_container'
                )
            )
        );

        $menu_area_border_standard_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_standard,
                'name'            => 'menu_area_border_standard_container',
                'hidden_property' => 'menu_area_border_header_standard',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_border_standard_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_header_standard_color',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
                'description'   => esc_html__('Set border color for menu area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard,
                'type'          => 'text',
                'name'          => 'menu_area_height_header_standard',
                'default_value' => '',
                'label'         => esc_html__('Height', 'industrialist'),
                'description'   => esc_html__('Enter header height (default is 100px)', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        /***************** Header Standard End *******************/

        /***************** Header Minimal Start *******************/

        $panel_header_minimal = industrialist_mikado_add_admin_panel(
            array(
                'page'            => '_header_page',
                'name'            => 'panel_header_minimal',
                'title'           => esc_html__('Header Minimal', 'industrialist'),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-vertical',
                    'header-standard',
                    'header-standard-extended',
                    'header-box',
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_header_minimal',
                'default_value' => 'no',
                'label'         => esc_html__('Header In Grid', 'industrialist'),
                'description'   => esc_html__('Set header content to be in grid', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_in_grid_header_minimal_container'
                )
            )
        );

        $menu_area_in_grid_header_minimal_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_minimal,
                'name'            => 'menu_area_in_grid_header_minimal_container',
                'hidden_property' => 'menu_area_in_grid_header_minimal',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_minimal_container,
                'type'          => 'color',
                'name'          => 'menu_area_grid_background_color_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Color', 'industrialist'),
                'description'   => esc_html__('Set grid background color for header area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_minimal_container,
                'type'          => 'text',
                'name'          => 'menu_area_grid_background_transparency_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Transparency', 'industrialist'),
                'description'   => esc_html__('Set grid background transparency for header', 'industrialist'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_minimal_container,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_shadow_header_minimal',
                'default_value' => 'no',
                'label'         => esc_html__('Grid Area Shadow', 'industrialist'),
                'description'   => esc_html__('Set shadow on grid area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'color',
                'name'          => 'menu_area_background_color_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Background color', 'industrialist'),
                'description'   => esc_html__('Set background color for header', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'text',
                'name'          => 'menu_area_background_transparency_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Background transparency', 'industrialist'),
                'description'   => esc_html__('Set background transparency for header', 'industrialist'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'yesno',
                'name'          => 'menu_area_shadow_header_minimal',
                'default_value' => 'yes',
                'label'         => esc_html__('Header Area Shadow', 'industrialist'),
                'description'   => esc_html__('Set shadow on header area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_minimal',
                'default_value' => 'no',
                'label'         => esc_html__('Header Area Border', 'industrialist'),
                'description'   => esc_html__('Set border on header area', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_border_minimal_container'
                )
            )
        );

        $menu_area_border_minimal_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_minimal,
                'name'            => 'menu_area_border_minimal_container',
                'hidden_property' => 'menu_area_border_header_minimal',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_border_minimal_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_header_minimal_color',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
                'description'   => esc_html__('Set border color for menu area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'text',
                'name'          => 'menu_area_height_header_minimal',
                'default_value' => '',
                'label'         => esc_html__('Height', 'industrialist'),
                'description'   => esc_html__('Enter header height (default is 100px)', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_minimal,
                'type'          => 'text',
                'name'          => 'header_icon_opener_size_minimal',
                'default_value' => '',
                'label'         => esc_html__('Opener Icon Size', 'industrialist'),
                'description'   => esc_html__('Enter font size for Icon Opener', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        /***************** Header Minimal End *******************/


        /***************** Standard Extended Header Layout - start ****************/

        $panel_header_standard_extended = industrialist_mikado_add_admin_panel(
            array(
                'page'            => '_header_page',
                'name'            => 'panel_header_standard_extended',
                'title'           => esc_html__('Header Standard Extended', 'industrialist'),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-vertical',
                    'header-standard',
                    'header-box',
                    'header-minimal',
                )
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_header_standard_extended,
                'name'   => 'logo_menu_area_title',
                'title'  => esc_html__('Logo Area', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'select',
                'name'          => 'logo_area_style_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Logo Area Skin', 'industrialist'),
                'description'   => esc_html__('Choose a logo area style to make logo in that predefined style', 'industrialist'),
                'options'       => array(
                    ''             => '',
                    'light-logo-area' => esc_html__('Light', 'industrialist'),
                    'dark-logo-area'  => esc_html__('Dark', 'industrialist')
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'yesno',
                'name'          => 'logo_area_in_grid_header_standard_extended',
                'default_value' => 'yes',
                'label'         => esc_html__('Logo Area In Grid', 'industrialist'),
                'description'   => esc_html__('Set menu area content to be in grid', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_logo_area_in_grid_header_standard_extended_container'
                )
            )
        );

        $logo_area_in_grid_header_standard_extended_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_standard_extended,
                'name'            => 'logo_area_in_grid_header_standard_extended_container',
                'hidden_property' => 'logo_area_in_grid_header_standard_extended',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $logo_area_in_grid_header_standard_extended_container,
                'type'          => 'color',
                'name'          => 'logo_area_grid_background_color_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Color', 'industrialist'),
                'description'   => esc_html__('Set grid background color for logo area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $logo_area_in_grid_header_standard_extended_container,
                'type'          => 'text',
                'name'          => 'logo_area_grid_background_transparency_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Transparency', 'industrialist'),
                'description'   => esc_html__('Set grid background transparency', 'industrialist'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $logo_area_in_grid_header_standard_extended_container,
                'type'          => 'yesno',
                'name'          => 'logo_area_in_grid_border_header_standard_extended',
                'default_value' => 'no',
                'label'         => esc_html__('Grid Area Border', 'industrialist'),
                'description'   => esc_html__('Set border on grid area', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_logo_area_in_grid_border_header_standard_extended_container'
                )
            )
        );

        $logo_area_in_grid_border_header_standard_extended_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $logo_area_in_grid_header_standard_extended_container,
                'name'            => 'logo_area_in_grid_border_header_standard_extended_container',
                'hidden_property' => 'logo_area_in_grid_border_header_standard_extended',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $logo_area_in_grid_border_header_standard_extended_container,
                'type'          => 'color',
                'name'          => 'logo_area_in_grid_border_color_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
                'description'   => esc_html__('Set border color for grid area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'color',
                'name'          => 'logo_area_background_color_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Background color', 'industrialist'),
                'description'   => esc_html__('Set background color for logo area', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'text',
                'name'          => 'logo_area_background_transparency_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Background transparency', 'industrialist'),
                'description'   => esc_html__('Set background transparency for logo area', 'industrialist'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'yesno',
                'name'          => 'logo_area_border_header_standard_extended',
                'default_value' => 'yes',
                'label'         => esc_html__('Logo Area Border', 'industrialist'),
                'description'   => esc_html__('Set border on logo area', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_logo_area_border_header_standard_extended_container'
                )
            )
        );

        $logo_area_border_header_standard_extended_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_standard_extended,
                'name'            => 'logo_area_border_header_standard_extended_container',
                'hidden_property' => 'logo_area_border_header_standard_extended',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $logo_area_border_header_standard_extended_container,
                'type'          => 'color',
                'name'          => 'logo_area_border_color_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
                'description'   => esc_html__('Set border color for logo area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'text',
                'name'          => 'logo_area_height_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Height', 'industrialist'),
                'description'   => esc_html__('Enter logo area height (default is 90px)', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );


        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_header_standard_extended,
                'name'   => 'main_menu_area_title',
                'title'  => esc_html__('Menu Area', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_header_standard_extended',
                'default_value' => 'yes',
                'label'         => esc_html__('Menu Area In Grid', 'industrialist'),
                'description'   => esc_html__('Set menu area content to be in grid', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_in_grid_header_standard_extended_container'
                )
            )
        );

        $menu_area_in_grid_header_standard_extended_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_standard_extended,
                'name'            => 'menu_area_in_grid_header_standard_extended_container',
                'hidden_property' => 'menu_area_in_grid_header_standard_extended',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_standard_extended_container,
                'type'          => 'color',
                'name'          => 'menu_area_grid_background_color_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Color', 'industrialist'),
                'description'   => esc_html__('Set grid background color for menu area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_standard_extended_container,
                'type'          => 'text',
                'name'          => 'menu_area_grid_background_transparency_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Grid Background Transparency', 'industrialist'),
                'description'   => esc_html__('Set grid background transparency', 'industrialist'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_in_grid_header_standard_extended_container,
                'type'          => 'yesno',
                'name'          => 'menu_area_in_grid_shadow_header_standard_extended',
                'default_value' => 'no',
                'label'         => esc_html__('Grid Area Shadow', 'industrialist'),
                'description'   => esc_html__('Set shadow on grid area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'color',
                'name'          => 'menu_area_background_color_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Background color', 'industrialist'),
                'description'   => esc_html__('Set background color for menu area', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'text',
                'name'          => 'menu_area_background_transparency_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Background transparency', 'industrialist'),
                'description'   => esc_html__('Set background transparency for menu area', 'industrialist'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'yesno',
                'name'          => 'menu_area_shadow_header_standard_extended',
                'default_value' => 'yes',
                'label'         => esc_html__('Menu Area Shadow', 'industrialist'),
                'description'   => esc_html__('Set shadow on menu area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_standard_extended',
                'default_value' => 'no',
                'label'         => esc_html__('Header Area Border', 'industrialist'),
                'description'   => esc_html__('Set border on header area', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_border_standard_extended_container'
                )
            )
        );

        $menu_area_border_standard_extended_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_standard_extended,
                'name'            => 'menu_area_border_standard_extended_container',
                'hidden_property' => 'menu_area_border_header_standard_extended',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_border_standard_extended_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_header_standard_extended_color',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
                'description'   => esc_html__('Set border color for menu area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_standard_extended,
                'type'          => 'text',
                'name'          => 'menu_area_height_header_standard_extended',
                'default_value' => '',
                'label'         => esc_html__('Height', 'industrialist'),
                'description'   => esc_html__('Enter menu area height (default is 80px)', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        /***************** Standard Extended Header Layout - end ****************/

        /***************** In The Box Header Layout - start ****************/

        $panel_header_box = industrialist_mikado_add_admin_panel(
            array(
                'page'            => '_header_page',
                'name'            => 'panel_header_box',
                'title'           => esc_html__('Header "In The Box"', 'industrialist'),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-standard',
                    'header-standard-extended',
                    'header-vertical',
                    'header-minimal',
                )
            )
        );


        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_header_box,
                'name'   => 'logo_area_title',
                'title'  => esc_html__('Logo Area', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_box,
                'type'          => 'yesno',
                'name'          => 'logo_area_header_box',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Logo Area', 'industrialist'),
                'description'   => esc_html__('Set Logo Area over the menu area', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_logo_area_box_container'
                )
            )
        );

        $logo_area_box_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_box,
                'name'            => 'logo_area_box_container',
                'hidden_property' => 'logo_area_header_box',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $logo_area_box_container,
                'type'          => 'select',
                'name'          => 'logo_area_style_header_box',
                'default_value' => '',
                'label'         => esc_html__('Logo Area Skin', 'industrialist'),
                'description'   => esc_html__('Choose a logo area style to make logo in that predefined style', 'industrialist'),
                'options'       => array(
                    ''             => '',
                    'light-logo-area' => esc_html__('Light', 'industrialist'),
                    'dark-logo-area'  => esc_html__('Dark', 'industrialist')
                )
            )
        );


        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_header_box,
                'name'   => 'main_menu_area_title',
                'title'  => esc_html__('Menu Area', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_box,
                'type'          => 'color',
                'name'          => 'menu_area_grid_background_color_header_box',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'industrialist'),
                'description'   => esc_html__('Set grid background color for header area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_box,
                'type'          => 'yesno',
                'name'          => 'menu_area_border_header_box',
                'default_value' => 'no',
                'label'         => esc_html__('Header Area Border', 'industrialist'),
                'description'   => esc_html__('Set border on header area', 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_menu_area_border_box_container'
                )
            )
        );

        $menu_area_border_box_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $panel_header_box,
                'name'            => 'menu_area_border_box_container',
                'hidden_property' => 'menu_area_border_header_box',
                'hidden_value'    => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $menu_area_border_box_container,
                'type'          => 'color',
                'name'          => 'menu_area_border_header_box_color',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
                'description'   => esc_html__('Set border color for menu area', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_box,
                'type'          => 'text',
                'name'          => 'menu_area_height_header_box',
                'default_value' => '',
                'label'         => esc_html__('Height', 'industrialist'),
                'description'   => esc_html__('Enter header height (default is 100px)', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_box,
                'type'          => 'text',
                'name'          => 'menu_area_border_box_header_box',
                'default_value' => '',
                'label'         => esc_html__('Header Border Radius', 'industrialist'),
                'description'   => esc_html__('Enter border radius for Header (e.g. 2px or 5%)', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        /***************** In The Box Header Layout - end ****************/

        /***************** Header Vertical - start ****************/

        do_action('industrialist_mikado_header_options_map');

        $panel_header_vertical = industrialist_mikado_add_admin_panel(
            array(
                'page'            => '_header_page',
                'name'            => 'panel_header_vertical',
                'title'           => esc_html__('Header Vertical', 'industrialist'),
                'hidden_property' => 'header_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'header-standard',
                    'header-standard-extended',
                    'header-box',
                    'header-minimal',
                )
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name'        => 'vertical_header_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'industrialist'),
            'description' => esc_html__('Set background color for vertical menu', 'industrialist'),
            'parent'      => $panel_header_vertical
        ));

        industrialist_mikado_add_admin_field(
            array(
                'name'          => 'vertical_header_background_image',
                'type'          => 'image',
                'default_value' => '',
                'label'         => esc_html__('Background Image', 'industrialist'),
                'description'   => esc_html__('Set background image for vertical menu', 'industrialist'),
                'parent'        => $panel_header_vertical
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_vertical,
                'type'          => 'select',
                'name'          => 'vertical_header_align',
                'default_value' => 'center',
                'label'         => esc_html__('Horizontal Align', 'industrialist'),
                'description'   => esc_html__('Choose alignment for vertical menu', 'industrialist'),
                'options'       => array(
                    'center' => 'Center',
                    'left' => 'Left',
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_header_vertical,
                'type'          => 'yesno',
                'name'          => 'vertical_header_shadow',
                'default_value' => 'yes',
                'label'         => esc_html__('Shadow', 'industrialist'),
                'description'   => esc_html__('Set shadow on vertical header', 'industrialist'),
            )
        );

        /***************** Header Vertical - end ****************/

        /***************** Header Sticky - start ****************/

        $panel_sticky_header = industrialist_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Sticky Header', 'industrialist'),
                'name'            => 'panel_sticky_header',
                'page'            => '_header_page',
                'hidden_property' => 'header_behaviour',
                'hidden_values'   => array(
                    'no-behavior',
                    'fixed-on-scroll'

                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name'        => 'scroll_amount_for_sticky',
                'type'        => 'text',
                'label'       => esc_html__('Scroll Amount for Sticky', 'industrialist'),
                'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'industrialist'),
                'parent'      => $panel_sticky_header,
                'args'        => array(
                    'col_width' => 2,
                    'suffix'    => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name'          => 'sticky_header_in_grid',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Sticky Header in grid', 'industrialist'),
                'description'   => esc_html__('Set sticky header content to be in grid', 'industrialist'),
                'parent'        => $panel_sticky_header,
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_sticky_header_in_grid_container"
                )
            )
        );

        $sticky_header_in_grid_container = industrialist_mikado_add_admin_container(array(
            'name'            => 'sticky_header_in_grid_container',
            'parent'          => $panel_sticky_header,
            'hidden_property' => 'sticky_header_in_grid',
            'hidden_value'    => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'sticky_header_grid_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Grid Background Color', 'industrialist'),
            'description' => esc_html__('Set grid background color for sticky header', 'industrialist'),
            'parent'      => $sticky_header_in_grid_container
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'sticky_header_grid_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Sticky Header Grid Transparency', 'industrialist'),
            'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)', 'industrialist'),
            'parent'      => $sticky_header_in_grid_container,
            'args'        => array(
                'col_width' => 1
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'sticky_header_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Background Color', 'industrialist'),
            'description' => esc_html__('Set background color for sticky header', 'industrialist'),
            'parent'      => $panel_sticky_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'sticky_header_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Sticky Header Transparency', 'industrialist'),
            'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'industrialist'),
            'parent'      => $panel_sticky_header,
            'args'        => array(
                'col_width' => 1
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'sticky_header_height',
            'type'        => 'text',
            'label'       => esc_html__('Sticky Header Height', 'industrialist'),
            'description' => esc_html__('Enter height for sticky header (default is 100px)', 'industrialist'),
            'parent'      => $panel_sticky_header,
            'args'        => array(
                'col_width' => 2,
                'suffix'    => 'px'
            )
        ));

        $group_sticky_header_menu = industrialist_mikado_add_admin_group(array(
            'title'       => esc_html__('Sticky Header Menu', 'industrialist'),
            'name'        => 'group_sticky_header_menu',
            'parent'      => $panel_sticky_header,
            'description' => esc_html__('Define styles for sticky menu items', 'industrialist'),
        ));

        $row1_sticky_header_menu = industrialist_mikado_add_admin_row(array(
            'name'   => 'row1',
            'parent' => $group_sticky_header_menu
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'sticky_color',
            'type'        => 'colorsimple',
            'label'       => esc_html__('Text Color', 'industrialist'),
            'description' => '',
            'parent'      => $row1_sticky_header_menu
        ));

        $row2_sticky_header_menu = industrialist_mikado_add_admin_row(array(
            'name'   => 'row2',
            'parent' => $group_sticky_header_menu
        ));

        industrialist_mikado_add_admin_field(
            array(
                'name'          => 'sticky_google_fonts',
                'type'          => 'fontsimple',
                'label'         => esc_html__('Font Family', 'industrialist'),
                'default_value' => '-1',
                'parent'        => $row2_sticky_header_menu,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type'          => 'textsimple',
                'name'          => 'sticky_fontsize',
                'label'         => esc_html__('Font Size', 'industrialist'),
                'default_value' => '',
                'parent'        => $row2_sticky_header_menu,
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type'          => 'textsimple',
                'name'          => 'sticky_lineheight',
                'label'         => esc_html__('Line height', 'industrialist'),
                'default_value' => '',
                'parent'        => $row2_sticky_header_menu,
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type'          => 'selectblanksimple',
                'name'          => 'sticky_texttransform',
                'label'         => esc_html__('Text transform', 'industrialist'),
                'default_value' => '',
                'options'       => industrialist_mikado_get_text_transform_array(),
                'parent'        => $row2_sticky_header_menu
            )
        );

        $row3_sticky_header_menu = industrialist_mikado_add_admin_row(array(
            'name'   => 'row3',
            'parent' => $group_sticky_header_menu
        ));

        industrialist_mikado_add_admin_field(
            array(
                'type'          => 'selectblanksimple',
                'name'          => 'sticky_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'industrialist'),
                'options'       => industrialist_mikado_get_font_style_array(),
                'parent'        => $row3_sticky_header_menu
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type'          => 'selectblanksimple',
                'name'          => 'sticky_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'industrialist'),
                'options'       => industrialist_mikado_get_font_weight_array(),
                'parent'        => $row3_sticky_header_menu
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type'          => 'textsimple',
                'name'          => 'sticky_letterspacing',
                'label'         => esc_html__('Letter Spacing', 'industrialist'),
                'default_value' => '',
                'parent'        => $row3_sticky_header_menu,
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        /***************** Header Sticky - end ****************/

        /***************** Header Fixed - start ****************/

        $panel_fixed_header = industrialist_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Fixed Header', 'industrialist'),
                'name'            => 'panel_fixed_header',
                'page'            => '_header_page',
                'hidden_property' => 'header_behaviour',
                'hidden_values'   => array(
                    'sticky-header-on-scroll-up',
                    'sticky-header-on-scroll-down-up',
                    'no-behavior',
                    'fixed-on-scroll'
                )
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name'          => 'fixed_header_grid_background_color',
            'type'          => 'color',
            'default_value' => '',
            'label'         => esc_html__('Grid Background Color', 'industrialist'),
            'description'   => esc_html__('Set grid background color for fixed header', 'industrialist'),
            'parent'        => $panel_fixed_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'          => 'fixed_header_grid_transparency',
            'type'          => 'text',
            'default_value' => '',
            'label'         => esc_html__('Header Transparency Grid', 'industrialist'),
            'description'   => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)', 'industrialist'),
            'parent'        => $panel_fixed_header,
            'args'          => array(
                'col_width' => 1
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name'          => 'fixed_header_background_color',
            'type'          => 'color',
            'default_value' => '',
            'label'         => esc_html__('Background Color', 'industrialist'),
            'description'   => esc_html__('Set background color for fixed header', 'industrialist'),
            'parent'        => $panel_fixed_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'fixed_header_transparency',
            'type'        => 'text',
            'label'       => esc_html__('Header Transparency', 'industrialist'),
            'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)', 'industrialist'),
            'parent'      => $panel_fixed_header,
            'args'        => array(
                'col_width' => 1
            )
        ));

        /***************** Header Fixed - end ****************/

        /***************** Header Main Menu - start ****************/

        $panel_main_menu = industrialist_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Main Menu', 'industrialist'),
                'name'            => 'panel_main_menu',
                'page'            => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values'   => array('header-vertical', 'header-minimal')
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_main_menu,
                'name'   => 'main_menu_area_title',
                'title'  => esc_html__('Main Menu General Settings', 'industrialist')
            )
        );

        $drop_down_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'drop_down_group',
                'title'       => esc_html__('Main Dropdown Menu', 'industrialist'),
                'description' => esc_html__('Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'industrialist')
            )
        );

        $drop_down_row1 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name'   => 'drop_down_row1',
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_border_color',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
            )
        );


        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_row1,
                'type'          => 'textsimple',
                'name'          => 'dropdown_background_transparency',
                'default_value' => '',
                'label'         => esc_html__('Transparency', 'industrialist'),
            )
        );

        $drop_down_padding_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'drop_down_padding_group',
                'title'       => esc_html__('Main Dropdown Menu Padding', 'industrialist'),
                'description' => esc_html__('Choose a top/bottom padding for dropdown menu', 'industrialist')
            )
        );

        $drop_down_padding_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $drop_down_padding_group,
                'name'   => 'drop_down_padding_row',
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_padding_row,
                'type'          => 'textsimple',
                'name'          => 'dropdown_top_padding',
                'default_value' => '',
                'label'         => esc_html__('Top Padding', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $drop_down_padding_row,
                'type'          => 'textsimple',
                'name'          => 'dropdown_bottom_padding',
                'default_value' => '',
                'label'         => esc_html__('Bottom Padding', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_main_menu,
                'type'          => 'select',
                'name'          => 'menu_dropdown_appearance',
                'default_value' => 'default',
                'label'         => esc_html__('Main Dropdown Menu Appearance', 'industrialist'),
                'description'   => esc_html__('Choose appearance for dropdown menu', 'industrialist'),
                'options'       => array(
                    'dropdown-default'           => esc_html__('Default', 'industrialist'),
                    'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'industrialist'),
                    'dropdown-slide-from-top'    => esc_html__('Slide From Top', 'industrialist'),
                    'dropdown-animate-height'    => esc_html__('Animate Height', 'industrialist'),
                    'dropdown-slide-from-left'   => esc_html__('Slide From Left', 'industrialist')
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_main_menu,
                'type'          => 'text',
                'name'          => 'dropdown_top_position',
                'default_value' => '',
                'label'         => esc_html__('Dropdown position', 'industrialist'),
                'description'   => esc_html__('Enter value in percentage of entire header height', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => '%'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_main_menu,
                'type'          => 'yesno',
                'name'          => 'enable_wide_menu_background',
                'default_value' => 'yes',
                'label'         => esc_html__('Enable Full Width Background for Wide Dropdown Type', 'industrialist'),
                'description'   => esc_html__('Enabling this option will show full width background  for wide dropdown type', 'industrialist'),
            )
        );

        $first_level_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'first_level_group',
                'title'       => esc_html__('1st Level Menu', 'industrialist'),
                'description' => esc_html__('Define styles for 1st level in Top Navigation Menu', 'industrialist')
            )
        );

        $first_level_row1 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row1'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'menu_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'menu_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'menu_activecolor',
                'default_value' => '',
                'label'         => esc_html__('Active Text Color', 'industrialist'),
            )
        );

        $first_level_row2 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row2',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row2,
                'type'          => 'colorsimple',
                'name'          => 'menu_text_background_color',
                'default_value' => '',
                'label'         => esc_html__('Text Background Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row2,
                'type'          => 'colorsimple',
                'name'          => 'menu_hover_background_color',
                'default_value' => '',
                'label'         => esc_html__('Hover Text Background Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row2,
                'type'          => 'colorsimple',
                'name'          => 'menu_active_background_color',
                'default_value' => '',
                'label'         => esc_html__('Active Text Background Color', 'industrialist'),
            )
        );

        $first_level_row3 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row3',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'colorsimple',
                'name'          => 'menu_light_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Light Menu Hover Text Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'colorsimple',
                'name'          => 'menu_light_activecolor',
                'default_value' => '',
                'label'         => esc_html__('Light Menu Active Text Color', 'industrialist'),
            )
        );

        $first_level_row4 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row4',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row4,
                'type'          => 'colorsimple',
                'name'          => 'menu_dark_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Dark Menu Hover Text Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row4,
                'type'          => 'colorsimple',
                'name'          => 'menu_dark_activecolor',
                'default_value' => '',
                'label'         => esc_html__('Dark Menu Active Text Color', 'industrialist'),
            )
        );

        $first_level_row5 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row5',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row5,
                'type'          => 'fontsimple',
                'name'          => 'menu_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row5,
                'type'          => 'textsimple',
                'name'          => 'menu_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row5,
                'type'          => 'textsimple',
                'name'          => 'menu_hover_background_color_transparency',
                'default_value' => '',
                'label'         => esc_html__('Hover Background Color Transparency', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row5,
                'type'          => 'textsimple',
                'name'          => 'menu_active_background_color_transparency',
                'default_value' => '',
                'label'         => esc_html__('Active Background Color Transparency', 'industrialist'),
            )
        );

        $first_level_row6 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row6',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row6,
                'type'          => 'selectblanksimple',
                'name'          => 'menu_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'industrialist'),
                'options'       => industrialist_mikado_get_font_style_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row6,
                'type'          => 'selectblanksimple',
                'name'          => 'menu_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'industrialist'),
                'options'       => industrialist_mikado_get_font_weight_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row6,
                'type'          => 'textsimple',
                'name'          => 'menu_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row6,
                'type'          => 'selectblanksimple',
                'name'          => 'menu_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'industrialist'),
                'options'       => industrialist_mikado_get_text_transform_array()
            )
        );

        $first_level_row7 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $first_level_group,
                'name'   => 'first_level_row7',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row7,
                'type'          => 'textsimple',
                'name'          => 'menu_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row7,
                'type'          => 'textsimple',
                'name'          => 'menu_padding_left_right',
                'default_value' => '',
                'label'         => esc_html__('Padding Left/Right', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row7,
                'type'          => 'textsimple',
                'name'          => 'menu_margin_left_right',
                'default_value' => '',
                'label'         => esc_html__('Margin Left/Right', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'second_level_group',
                'title'       => esc_html__('2nd Level Menu', 'industrialist'),
                'description' => esc_html__('Define styles for 2nd level in Top Navigation Menu', 'industrialist')
            )
        );

        $second_level_row0 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name'   => 'second_level_row0'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row0,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_color_secondlvl',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row0,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_border_color_secondlvl',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
            )
        );


        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row0,
                'type'          => 'textsimple',
                'name'          => 'dropdown_background_transparency_secondlvl',
                'default_value' => '',
                'label'         => esc_html__('Transparency', 'industrialist'),
            )
        );

        $second_level_row1 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name'   => 'second_level_row1'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Color', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Background Color', 'industrialist')
            )
        );

        $second_level_row2 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name'   => 'second_level_row2',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row2,
                'type'          => 'fontsimple',
                'name'          => 'dropdown_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_padding_top_bottom',
                'default_value' => '',
                'label'         => esc_html__('Padding Top/Bottom', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_row3 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $second_level_group,
                'name'   => 'second_level_row3',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font style', 'industrialist'),
                'options'       => industrialist_mikado_get_font_style_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font weight', 'industrialist'),
                'options'       => industrialist_mikado_get_font_weight_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => 'dropdown_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter spacing', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'industrialist'),
                'options'       => industrialist_mikado_get_text_transform_array()
            )
        );

        $second_level_wide_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'second_level_wide_group',
                'title'       => esc_html__('2nd Level Wide Menu', 'industrialist'),
                'description' => esc_html__('Define styles for 2nd level in Wide Menu', 'industrialist')
            )
        );


        $second_level_wide_row0 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name'   => 'second_level_wide_row0'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row0,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_color_wide_secondlvl',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row0,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_border_color_wide_secondlvl',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
            )
        );


        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row0,
                'type'          => 'textsimple',
                'name'          => 'dropdown_background_transparency_wide_secondlvl',
                'default_value' => '',
                'label'         => esc_html__('Transparency', 'industrialist'),
            )
        );

        $second_level_wide_row1 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name'   => 'second_level_wide_row1'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Color', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_background_hovercolor',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Background Color', 'industrialist')
            )
        );

        $second_level_wide_row2 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name'   => 'second_level_wide_row2',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row2,
                'type'          => 'fontsimple',
                'name'          => 'dropdown_wide_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_lineheight',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_padding_top_bottom',
                'default_value' => '',
                'label'         => esc_html__('Padding Top/Bottom', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $second_level_wide_row3 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $second_level_wide_group,
                'name'   => 'second_level_wide_row3',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font style', 'industrialist'),
                'options'       => industrialist_mikado_get_font_style_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font weight', 'industrialist'),
                'options'       => industrialist_mikado_get_font_weight_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row3,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter spacing', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $second_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'industrialist'),
                'options'       => industrialist_mikado_get_text_transform_array()
            )
        );

        $third_level_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'third_level_group',
                'title'       => esc_html__('3nd Level Menu', 'industrialist'),
                'description' => esc_html__('Define styles for 3nd level in Top Navigation Menu', 'industrialist')
            )
        );

        $third_level_row0 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name'   => 'third_level_row0'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row0,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_color_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row0,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_border_color_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row0,
                'type'          => 'textsimple',
                'name'          => 'dropdown_background_transparency_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Transparency', 'industrialist'),
            )
        );

        $third_level_row1 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name'   => 'third_level_row1'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_color_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_hovercolor_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Color', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_background_hovercolor_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Background Color', 'industrialist')
            )
        );

        $third_level_row2 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name'   => 'third_level_row2',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row2,
                'type'          => 'fontsimple',
                'name'          => 'dropdown_google_fonts_thirdlvl',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_fontsize_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_lineheight_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_row3 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $third_level_group,
                'name'   => 'third_level_row3',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_fontstyle_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font style', 'industrialist'),
                'options'       => industrialist_mikado_get_font_style_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_fontweight_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font weight', 'industrialist'),
                'options'       => industrialist_mikado_get_font_weight_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => 'dropdown_letterspacing_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Letter spacing', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_texttransform_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'industrialist'),
                'options'       => industrialist_mikado_get_text_transform_array()
            )
        );


        /***********************************************************/
        $third_level_wide_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $panel_main_menu,
                'name'        => 'third_level_wide_group',
                'title'       => esc_html__('3rd Level Wide Menu', 'industrialist'),
                'description' => esc_html__('Define styles for 3rd level in Wide Menu', 'industrialist')
            )
        );


        $third_level_wide_row0 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name'   => 'third_level_wide_row0'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row0,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_border_color_wide_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
            )
        );

        $third_level_wide_row1 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name'   => 'third_level_wide_row1'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_color_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_hovercolor_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Color', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row1,
                'type'          => 'colorsimple',
                'name'          => 'dropdown_wide_background_hovercolor_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Hover/Active Background Color', 'industrialist')
            )
        );

        $third_level_wide_row2 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name'   => 'third_level_wide_row2',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row2,
                'type'          => 'fontsimple',
                'name'          => 'dropdown_wide_google_fonts_thirdlvl',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_fontsize_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row2,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_lineheight_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Line Height', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $third_level_wide_row3 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $third_level_wide_group,
                'name'   => 'third_level_wide_row3',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_fontstyle_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font style', 'industrialist'),
                'options'       => industrialist_mikado_get_font_style_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_fontweight_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Font weight', 'industrialist'),
                'options'       => industrialist_mikado_get_font_weight_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row3,
                'type'          => 'textsimple',
                'name'          => 'dropdown_wide_letterspacing_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Letter spacing', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $third_level_wide_row3,
                'type'          => 'selectblanksimple',
                'name'          => 'dropdown_wide_texttransform_thirdlvl',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'industrialist'),
                'options'       => industrialist_mikado_get_text_transform_array()
            )
        );

        /***************** Header Main Menu - end ****************/

        /***************** Header Vertical - start ****************/

        $panel_vertical_main_menu = industrialist_mikado_add_admin_panel(
            array(
                'title'           => esc_html__('Vertical Main Menu', 'industrialist'),
                'name'            => 'panel_vertical_main_menu',
                'page'            => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values'   => array(
                    'header-standard',
                    'header-minimal'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_vertical_main_menu,
                'type'          => 'select',
                'name'          => 'vertical_header_main_menu',
                'default_value' => 'float',
                'label'         => esc_html__('Menu Area Style', 'industrialist'),
                'description'   => esc_html__('Choose a menu area style for Header Vertical', 'industrialist'),
                'options'       => array(
                    'float' => esc_html__('Float', 'industrialist'),
                    'click'  => esc_html__('On Click', 'industrialist')
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $panel_vertical_main_menu,
                'type'          => 'yesno',
                'name'          => 'vertical_dropdown_border_bottom',
                'default_value' => 'no',
                'label'         => esc_html__('Main Menu Separator', 'industrialist'),
                'description'   => esc_html__('Place separator between menu items', 'industrialist'),
                'args'          => array(
                    "dependence"             => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_vertical_dropdown_border_bottom_container"
                )
            )
        );

        $vertical_dropdown_border_bottom_container = industrialist_mikado_add_admin_container(array(
            'name' => 'vertical_dropdown_border_bottom_container',
            'parent' => $panel_vertical_main_menu,
            'hidden_property' => 'vertical_dropdown_border_bottom',
            'hidden_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'vertical_dropdown_border_bottom_color',
            'type'        => 'color',
            'label'       => esc_html__('Separator Color', 'industrialist'),
            'description' => esc_html__('Choose color for separator between menu items', 'industrialist'),
            'parent'      => $vertical_dropdown_border_bottom_container
        ));


        $drop_down_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $panel_vertical_main_menu,
                'name'        => 'vertical_drop_down_group',
                'title'       => esc_html__('Main Dropdown Menu', 'industrialist'),
                'description' => esc_html__('Set a style for dropdown menu', 'industrialist')
            )
        );

        $vertical_drop_down_row1 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name'   => 'mkd_drop_down_row1',
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $vertical_drop_down_row1,
                'type'          => 'colorsimple',
                'name'          => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $vertical_drop_down_row1,
                'type'          => 'colorsimple',
                'name'          => 'vertical_dropdown_border_color',
                'default_value' => '',
                'label'         => esc_html__('Border Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $vertical_drop_down_row1,
                'type'          => 'textsimple',
                'name'          => 'vertical_dropdown_transparency',
                'default_value' => '',
                'label'         => esc_html__('Transparency', 'industrialist'),
            )
        );

        $group_vertical_first_level = industrialist_mikado_add_admin_group(array(
            'name'        => 'group_vertical_first_level',
            'title'       => esc_html__('1st level', 'industrialist'),
            'description' => esc_html__('Define styles for 1st level menu', 'industrialist'),
            'parent'      => $panel_vertical_main_menu
        ));

        $row_vertical_first_level_1 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_first_level_1',
            'parent' => $group_vertical_first_level
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_1st_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'industrialist'),
            'parent'        => $row_vertical_first_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_1st_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Color', 'industrialist'),
            'parent'        => $row_vertical_first_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_1st_hover_background_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'industrialist'),
            'parent'        => $row_vertical_first_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_1st_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_first_level_1
        ));

        $row_vertical_first_level_2 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_first_level_2',
            'parent' => $group_vertical_first_level,
            'next'   => true
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_1st_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_first_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_1st_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'industrialist'),
            'options'       => industrialist_mikado_get_text_transform_array(),
            'parent'        => $row_vertical_first_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'vertical_menu_1st_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family', 'industrialist'),
            'parent'        => $row_vertical_first_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_1st_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'industrialist'),
            'options'       => industrialist_mikado_get_font_style_array(),
            'parent'        => $row_vertical_first_level_2
        ));

        $row_vertical_first_level_3 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_first_level_3',
            'parent' => $group_vertical_first_level,
            'next'   => true
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_1st_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'industrialist'),
            'options'       => industrialist_mikado_get_font_weight_array(),
            'parent'        => $row_vertical_first_level_3
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_1st_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_first_level_3
        ));

        $group_vertical_second_level = industrialist_mikado_add_admin_group(array(
            'name'        => 'group_vertical_second_level',
            'title'       => esc_html__('2nd level', 'industrialist'),
            'description' => esc_html__('Define styles for 2nd level menu', 'industrialist'),
            'parent'      => $panel_vertical_main_menu
        ));

        $row_vertical_second_level_1 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_second_level_1',
            'parent' => $group_vertical_second_level
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_2nd_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'industrialist'),
            'parent'        => $row_vertical_second_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_2nd_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Color', 'industrialist'),
            'parent'        => $row_vertical_second_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_2nd_hover_background_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'industrialist'),
            'parent'        => $row_vertical_second_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_2nd_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_second_level_1
        ));

        $row_vertical_second_level_2 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_second_level_2',
            'parent' => $group_vertical_second_level,
            'next'   => true
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_2nd_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_second_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_2nd_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'industrialist'),
            'options'       => industrialist_mikado_get_text_transform_array(),
            'parent'        => $row_vertical_second_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'vertical_menu_2nd_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family','industrialist'),
            'parent'        => $row_vertical_second_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_2nd_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'industrialist'),
            'options'       => industrialist_mikado_get_font_style_array(),
            'parent'        => $row_vertical_second_level_2
        ));

        $row_vertical_second_level_3 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_second_level_3',
            'parent' => $group_vertical_second_level,
            'next'   => true
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_2nd_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'industrialist'),
            'options'       => industrialist_mikado_get_font_weight_array(),
            'parent'        => $row_vertical_second_level_3
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_2nd_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_second_level_3
        ));

        $group_vertical_third_level = industrialist_mikado_add_admin_group(array(
            'name'        => 'group_vertical_third_level',
            'title'       => esc_html__('3rd level', 'industrialist'),
            'description' => esc_html__('Define styles for 3rd level menu', 'industrialist'),
            'parent'      => $panel_vertical_main_menu
        ));

        $row_vertical_third_level_1 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_third_level_1',
            'parent' => $group_vertical_third_level
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_3rd_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color', 'industrialist'),
            'parent'        => $row_vertical_third_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_3rd_hover_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Color', 'industrialist'),
            'parent'        => $row_vertical_third_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'vertical_menu_3rd_hover_background_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color', 'industrialist'),
            'parent'        => $row_vertical_third_level_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_3rd_fontsize',
            'default_value' => '',
            'label'         => esc_html__('Font Size', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_third_level_1
        ));

        $row_vertical_third_level_2 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_third_level_2',
            'parent' => $group_vertical_third_level,
            'next'   => true
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_3rd_lineheight',
            'default_value' => '',
            'label'         => esc_html__('Line Height', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_third_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_3rd_texttransform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform', 'industrialist'),
            'options'       => industrialist_mikado_get_text_transform_array(),
            'parent'        => $row_vertical_third_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'fontsimple',
            'name'          => 'vertical_menu_3rd_google_fonts',
            'default_value' => '-1',
            'label'         => esc_html__('Font Family', 'industrialist'),
            'parent'        => $row_vertical_third_level_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_3rd_fontstyle',
            'default_value' => '',
            'label'         => esc_html__('Font Style', 'industrialist'),
            'options'       => industrialist_mikado_get_font_style_array(),
            'parent'        => $row_vertical_third_level_2
        ));

        $row_vertical_third_level_3 = industrialist_mikado_add_admin_row(array(
            'name'   => 'row_vertical_third_level_3',
            'parent' => $group_vertical_third_level,
            'next'   => true
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'selectblanksimple',
            'name'          => 'vertical_menu_3rd_fontweight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight', 'industrialist'),
            'options'       => industrialist_mikado_get_font_weight_array(),
            'parent'        => $row_vertical_third_level_3
        ));

        industrialist_mikado_add_admin_field(array(
            'type'          => 'textsimple',
            'name'          => 'vertical_menu_3rd_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing', 'industrialist'),
            'args'          => array(
                'suffix' => 'px'
            ),
            'parent'        => $row_vertical_third_level_3
        ));

        /***************** Header Vertical - end ****************/

        /***************** Header Mobile - start ****************/

        $panel_mobile_header = industrialist_mikado_add_admin_panel(array(
            'title' => esc_html__('Mobile header','industrialist'),
            'name'  => 'panel_mobile_header',
            'page'  => '_header_page'
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_header_height',
            'type'        => 'text',
            'label'       => esc_html__('Mobile Header Height', 'industrialist'),
            'description' => esc_html__('Enter height for mobile header in pixels', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_header_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Header Background Color', 'industrialist'),
            'description' => esc_html__('Choose color for mobile header', 'industrialist'),
            'parent'      => $panel_mobile_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_menu_background_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Menu Background Color', 'industrialist'),
            'description' => esc_html__('Choose color for mobile menu', 'industrialist'),
            'parent'      => $panel_mobile_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_menu_separator_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Menu Item Separator Color', 'industrialist'),
            'description' => esc_html__('Choose color for mobile menu horizontal separators', 'industrialist'),
            'parent'      => $panel_mobile_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_logo_height',
            'type'        => 'text',
            'label'       => esc_html__('Logo Height For Mobile Header', 'industrialist'),
            'description' => esc_html__('Define logo height for screen size smaller than 1000px', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_logo_height_phones',
            'type'        => 'text',
            'label'       => esc_html__('Logo Height For Mobile Devices', 'industrialist'),
            'description' => esc_html__('Define logo height for screen size smaller than 480px', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        industrialist_mikado_add_admin_section_title(array(
            'parent' => $panel_mobile_header,
            'name'   => 'mobile_header_fonts_title',
            'title'  => esc_html__('Typography', 'industrialist')
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_text_color',
            'type'        => 'color',
            'label'       => esc_html__('Navigation Text Color', 'industrialist'),
            'description' => esc_html__('Define color for mobile navigation text', 'industrialist'),
            'parent'      => $panel_mobile_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_text_hover_color',
            'type'        => 'color',
            'label'       => esc_html__('Navigation Hover/Active Color', 'industrialist'),
            'description' => esc_html__('Define hover/active color for mobile navigation text', 'industrialist'),
            'parent'      => $panel_mobile_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_font_family',
            'type'        => 'font',
            'label'       => esc_html__('Navigation Font Family', 'industrialist'),
            'description' => esc_html__('Define font family for mobile navigation text', 'industrialist'),
            'parent'      => $panel_mobile_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_font_size',
            'type'        => 'text',
            'label'       => esc_html__('Navigation Font Size', 'industrialist'),
            'description' => esc_html__('Define font size for mobile navigation text', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_line_height',
            'type'        => 'text',
            'label'       => esc_html__('Navigation Line Height', 'industrialist'),
            'description' => esc_html__('Define line height for mobile navigation text', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_text_transform',
            'type'        => 'select',
            'label'       => esc_html__('Navigation Text Transform', 'industrialist'),
            'description' => esc_html__('Define text transform for mobile navigation text', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'options'     => industrialist_mikado_get_text_transform_array(true)
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_font_style',
            'type'        => 'select',
            'label'       => esc_html__('Navigation Font Style', 'industrialist'),
            'description' => esc_html__('Define font style for mobile navigation text', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'options'     => industrialist_mikado_get_font_style_array(true)
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_font_weight',
            'type'        => 'select',
            'label'       => esc_html__('Navigation Font Weight', 'industrialist'),
            'description' => esc_html__('Define font weight for mobile navigation text', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'options'     => industrialist_mikado_get_font_weight_array(true)
        ));

        industrialist_mikado_add_admin_section_title(array(
            'name'   => 'mobile_opener_panel',
            'parent' => $panel_mobile_header,
            'title'  => esc_html__('Mobile Menu Opener', 'industrialist')
        ));

        industrialist_mikado_add_admin_field(array(
            'name'          => 'mobile_icon_pack',
            'type'          => 'select',
            'label'         => esc_html__('Mobile Navigation Icon Pack', 'industrialist'),
            'default_value' => 'font_awesome',
            'description'   => esc_html__('Choose icon pack for mobile navigation icon', 'industrialist'),
            'parent'        => $panel_mobile_header,
            'options'       => industrialist_mikado_icon_collections()->getIconCollectionsExclude(array(
                'linea_icons',
                'simple_line_icons',
                'linear_icons'
            ))
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_icon_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Navigation Icon Color', 'industrialist'),
            'description' => esc_html__('Choose color for icon header', 'industrialist'),
            'parent'      => $panel_mobile_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_icon_hover_color',
            'type'        => 'color',
            'label'       => esc_html__('Mobile Navigation Icon Hover Color', 'industrialist'),
            'description' => esc_html__('Choose hover color for mobile navigation icon ', 'industrialist'),
            'parent'      => $panel_mobile_header
        ));

        industrialist_mikado_add_admin_field(array(
            'name'        => 'mobile_icon_size',
            'type'        => 'text',
            'label'       => esc_html__('Mobile Navigation Icon size', 'industrialist'),
            'description' => esc_html__('Choose size for mobile navigation icon', 'industrialist'),
            'parent'      => $panel_mobile_header,
            'args'        => array(
                'col_width' => 3,
                'suffix'    => 'px'
            )
        ));

        /***************** Header Mobile - end ****************/
    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_header_options_map', 3);

}