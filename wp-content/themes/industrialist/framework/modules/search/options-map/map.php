<?php

if(!function_exists('industrialist_mikado_search_options_map')) {

    function industrialist_mikado_search_options_map() {

        industrialist_mikado_add_admin_page(
            array(
                'slug'  => '_search_page',
                'title' => esc_html__('Search', 'industrialist'),
                'icon'  => 'icon_search'
            )
        );

        $search_panel = industrialist_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Search', 'industrialist'),
                'name'  => 'search',
                'page'  => '_search_page'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_panel,
                'type'          => 'select',
                'name'          => 'search_type',
                'default_value' => 'search-dropdown',
                'label'         => esc_html__('Select Search Type', 'industrialist'),
                'description'   => esc_html__("Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with transparent header)", 'industrialist'),
                'options'       => array(
                    'fullscreen-search'                => esc_html__('Fullscreen Search', 'industrialist'),
                    'search-covers-header'             => esc_html__('Search Covers Header', 'industrialist'),
                    'search-slides-from-window-top'    => esc_html__('Slide from Window Top', 'industrialist'),
                    'search-dropdown'                  => esc_html__('Search Dropdown', 'industrialist')
                ),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        'search-covers-header'             => '#mkd_search_animation_container, #mkd_search_fullscreen_border_container, #mkd_search_icon_container',
                        'fullscreen-search'                => '#mkd_search_close_container',
                        'search-slides-from-window-top'    => '#mkd_search_animation_container, #mkd_search_fullscreen_border_container',
                        'search-dropdown'                  => '#mkd_search_animation_container, #mkd_search_fullscreen_border_container, #mkd_search_icon_container, #mkd_search_close_container'
                    ),
                    'show'       => array(
                        'search-covers-header'             => '#mkd_search_close_container',
                        'fullscreen-search'                => '#mkd_search_animation_container, #mkd_search_fullscreen_border_container, #mkd_search_icon_container',
                        'search-slides-from-window-top'    => '#mkd_search_close_container, #mkd_search_icon_container',
                        'search-dropdown'                  => ''
                    )
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_panel,
                'type'          => 'select',
                'name'          => 'search_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Search Icon Pack', 'industrialist'),
                'description'   => esc_html__('Choose icon pack for search icon', 'industrialist'),
                'options'       => industrialist_mikado_icon_collections()->getIconCollectionsExclude(array(
                    'linea_icons',
                    'simple_line_icons',
                    'dripicons'
                ))
            )
        );

        $search_animation_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $search_panel,
                'name'            => 'search_animation_container',
                'hidden_property' => 'search_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'search-covers-header',
                    'search-slides-from-window-top'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_panel,
                'type'          => 'yesno',
                'name'          => 'search_in_grid',
                'default_value' => 'yes',
                'label'         => esc_html__('Search area in grid', 'industrialist'),
                'description'   => esc_html__('Set search area to be in grid', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'fullscreen_search_background_image',
            'type' => 'image',
            'parent' => $search_animation_container,
            'label' => esc_html__('Full Screen Search Background Image', 'industrialist'),
            'description' => esc_html__('Choose full screen search background image', 'industrialist')
        ));

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $search_panel,
                'name'   => 'initial_header_icon_title',
                'title'  => esc_html__('Initial Search Icon in Header', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_panel,
                'type'          => 'text',
                'name'          => 'header_search_icon_size',
                'default_value' => '',
                'label'         => esc_html__('Icon Size', 'industrialist'),
                'description'   => esc_html__('Set size for icon', 'industrialist'),
                'args'          => array(
                    'col_width' => 3,
                    'suffix'    => 'px'
                )
            )
        );

        $search_icon_color_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $search_panel,
                'title'       => esc_html__('Icon Colors', 'industrialist'),
                'description' => esc_html__('Define color style for icon', 'industrialist'),
                'name'        => 'search_icon_color_group'
            )
        );

        $search_icon_color_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_icon_color_group,
                'name'   => 'search_icon_color_row'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent' => $search_icon_color_row,
                'type'   => 'colorsimple',
                'name'   => 'header_search_icon_color',
                'label'  => esc_html__('Color', 'industrialist')
            )
        );
        industrialist_mikado_add_admin_field(
            array(
                'parent' => $search_icon_color_row,
                'type'   => 'colorsimple',
                'name'   => 'header_search_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'industrialist')
            )
        );
        industrialist_mikado_add_admin_field(
            array(
                'parent' => $search_icon_color_row,
                'type'   => 'colorsimple',
                'name'   => 'header_light_search_icon_color',
                'label'  => esc_html__('Light Header Icon Color', 'industrialist')
            )
        );
        industrialist_mikado_add_admin_field(
            array(
                'parent' => $search_icon_color_row,
                'type'   => 'colorsimple',
                'name'   => 'header_light_search_icon_hover_color',
                'label'  => esc_html__('Light Header Icon Hover Color', 'industrialist')
            )
        );

        $search_icon_color_row2 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_icon_color_group,
                'name'   => 'search_icon_color_row2',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent' => $search_icon_color_row2,
                'type'   => 'colorsimple',
                'name'   => 'header_dark_search_icon_color',
                'label'  => esc_html__('Dark Header Icon Color', 'industrialist')
            )
        );
        industrialist_mikado_add_admin_field(
            array(
                'parent' => $search_icon_color_row2,
                'type'   => 'colorsimple',
                'name'   => 'header_dark_search_icon_hover_color',
                'label'  => esc_html__('Dark Header Icon Hover Color', 'industrialist')
            )
        );


        $search_icon_background_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $search_panel,
                'title'       => esc_html__('Icon Background Style', 'industrialist'),
                'description' => esc_html__('Define background style for icon', 'industrialist'),
                'name'        => 'search_icon_background_group'
            )
        );

        $search_icon_background_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_icon_background_group,
                'name'   => 'search_icon_background_row'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_background_row,
                'type'          => 'colorsimple',
                'name'          => 'search_icon_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_background_row,
                'type'          => 'colorsimple',
                'name'          => 'search_icon_background_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Background Hover Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_panel,
                'type'          => 'yesno',
                'name'          => 'enable_search_icon_text',
                'default_value' => 'no',
                'label'         => esc_html__('Enable Search Icon Text', 'industrialist'),
                'description'   => esc_html__("Enable this option to show 'Search' text next to search icon in header", 'industrialist'),
                'args'          => array(
                    'dependence'             => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_enable_search_icon_text_container'
                )
            )
        );

        $enable_search_icon_text_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $search_panel,
                'name'            => 'enable_search_icon_text_container',
                'hidden_property' => 'enable_search_icon_text',
                'hidden_value'    => 'no'
            )
        );

        $enable_search_icon_text_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $enable_search_icon_text_container,
                'title'       => esc_html__('Search Icon Text', 'industrialist'),
                'name'        => 'enable_search_icon_text_group',
                'description' => esc_html__('Define Style for Search Icon Text', 'industrialist')
            )
        );

        $enable_search_icon_text_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $enable_search_icon_text_group,
                'name'   => 'enable_search_icon_text_row'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row,
                'type'          => 'colorsimple',
                'name'          => 'search_icon_text_color',
                'label'         => esc_html__('Text Color', 'industrialist'),
                'default_value' => ''
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row,
                'type'          => 'colorsimple',
                'name'          => 'search_icon_text_color_hover',
                'label'         => esc_html__('Text Hover Color', 'industrialist'),
                'default_value' => ''
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row,
                'type'          => 'textsimple',
                'name'          => 'search_icon_text_fontsize',
                'label'         => esc_html__('Font Size', 'industrialist'),
                'default_value' => '',
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row,
                'type'          => 'textsimple',
                'name'          => 'search_icon_text_lineheight',
                'label'         => esc_html__('Line Height', 'industrialist'),
                'default_value' => '',
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $enable_search_icon_text_row2 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $enable_search_icon_text_group,
                'name'   => 'enable_search_icon_text_row2',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row2,
                'type'          => 'selectblanksimple',
                'name'          => 'search_icon_text_texttransform',
                'label'         => esc_html__('Text Transform', 'industrialist'),
                'default_value' => '',
                'options'       => industrialist_mikado_get_text_transform_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row2,
                'type'          => 'fontsimple',
                'name'          => 'search_icon_text_google_fonts',
                'label'         => esc_html__('Font Family', 'industrialist'),
                'default_value' => '-1',
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row2,
                'type'          => 'selectblanksimple',
                'name'          => 'search_icon_text_fontstyle',
                'label'         => esc_html__('Font Style', 'industrialist'),
                'default_value' => '',
                'options'       => industrialist_mikado_get_font_style_array(),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row2,
                'type'          => 'selectblanksimple',
                'name'          => 'search_icon_text_fontweight',
                'label'         => esc_html__('Font Weight', 'industrialist'),
                'default_value' => '',
                'options'       => industrialist_mikado_get_font_weight_array(),
            )
        );

        $enable_search_icon_text_row3 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $enable_search_icon_text_group,
                'name'   => 'enable_search_icon_text_row3',
                'next'   => true
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $enable_search_icon_text_row3,
                'type'          => 'textsimple',
                'name'          => 'search_icon_text_letterspacing',
                'label'         => esc_html__('Letter Spacing', 'industrialist'),
                'default_value' => '',
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $search_icon_spacing_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $search_panel,
                'title'       => esc_html__('Icon Spacing', 'industrialist'),
                'description' => esc_html__('Define padding and margins for Search icon', 'industrialist'),
                'name'        => 'search_icon_spacing_group'
            )
        );

        $search_icon_spacing_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_icon_spacing_group,
                'name'   => 'search_icon_spacing_row'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'search_padding_left',
                'default_value' => '',
                'label'         => esc_html__('Padding Left', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'search_padding_right',
                'default_value' => '',
                'label'         => esc_html__('Padding Right', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'search_margin_left',
                'default_value' => '',
                'label'         => esc_html__('Margin Left', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_spacing_row,
                'type'          => 'textsimple',
                'name'          => 'search_margin_right',
                'default_value' => '',
                'label'         => esc_html__('Margin Right', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $search_panel,
                'name'   => 'search_form_title',
                'title'  => esc_html__('Search Bar', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_panel,
                'type'          => 'color',
                'name'          => 'search_background_color',
                'default_value' => '',
                'label'         => esc_html__('Background Color', 'industrialist'),
                'description'   => esc_html__('Choose a background color for Select search bar', 'industrialist')
            )
        );

        $search_input_text_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $search_panel,
                'title'       => esc_html__('Search Input Text', 'industrialist'),
                'description' => esc_html__('Define style for search text', 'industrialist'),
                'name'        => 'search_input_text_group'
            )
        );

        $search_input_text_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_input_text_group,
                'name'   => 'search_input_text_row'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_input_text_row,
                'type'          => 'colorsimple',
                'name'          => 'search_text_color',
                'default_value' => '',
                'label'         => esc_html__('Text Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_input_text_row,
                'type'          => 'colorsimple',
                'name'          => 'search_text_disabled_color',
                'default_value' => '',
                'label'         => esc_html__('Disabled Text Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_input_text_row,
                'type'          => 'textsimple',
                'name'          => 'search_text_fontsize',
                'default_value' => '',
                'label'         => esc_html__('Font Size', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_input_text_row,
                'type'          => 'selectblanksimple',
                'name'          => 'search_text_texttransform',
                'default_value' => '',
                'label'         => esc_html__('Text Transform', 'industrialist'),
                'options'       => industrialist_mikado_get_text_transform_array()
            )
        );

        $search_input_text_row2 = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_input_text_group,
                'name'   => 'search_input_text_row2'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_input_text_row2,
                'type'          => 'fontsimple',
                'name'          => 'search_text_google_fonts',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_input_text_row2,
                'type'          => 'selectblanksimple',
                'name'          => 'search_text_fontstyle',
                'default_value' => '',
                'label'         => esc_html__('Font Style', 'industrialist'),
                'options'       => industrialist_mikado_get_font_style_array(),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_input_text_row2,
                'type'          => 'selectblanksimple',
                'name'          => 'search_text_fontweight',
                'default_value' => '',
                'label'         => esc_html__('Font Weight', 'industrialist'),
                'options'       => industrialist_mikado_get_font_weight_array()
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_input_text_row2,
                'type'          => 'textsimple',
                'name'          => 'search_text_letterspacing',
                'default_value' => '',
                'label'         => esc_html__('Letter Spacing', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $search_icon_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $search_panel,
                'name'            => 'search_icon_container',
                'hidden_property' => 'search_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'search-covers-header',
                    'search-dropdown'
                )
            )
        );

        $search_icon_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $search_icon_container,
                'title'       => esc_html__('Search Icon', 'industrialist'),
                'description' => esc_html__('Define style for search icon', 'industrialist'),
                'name'        => 'search_icon_group'
            )
        );

        $search_icon_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_icon_group,
                'name'   => 'search_icon_row'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_row,
                'type'          => 'colorsimple',
                'name'          => 'search_icon_color',
                'default_value' => '',
                'label'         => esc_html__('Icon Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_row,
                'type'          => 'colorsimple',
                'name'          => 'search_icon_hover_color',
                'default_value' => '',
                'label'         => esc_html__('Icon Hover Color', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_icon_row,
                'type'          => 'textsimple',
                'name'          => 'search_icon_size',
                'default_value' => '',
                'label'         => esc_html__('Icon Size', 'industrialist'),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $search_close_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $search_panel,
                'name'            => 'search_close_container',
                'hidden_property' => 'search_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'fullscreen-search',
                    'search-dropdown'
                )
            )
        );

        $search_close_icon_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $search_close_container,
                'title'       => esc_html__('Search Close', 'industrialist'),
                'description' => esc_html__('Define style for search close icon', 'industrialist'),
                'name'        => 'search_close_icon_group'
            )
        );

        $search_close_icon_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_close_icon_group,
                'name'   => 'search_icon_row'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_close_icon_row,
                'type'          => 'colorsimple',
                'name'          => 'search_close_color',
                'label'         => esc_html__('Icon Color', 'industrialist'),
                'default_value' => ''
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_close_icon_row,
                'type'          => 'colorsimple',
                'name'          => 'search_close_hover_color',
                'label'         => esc_html__('Icon Hover Color', 'industrialist'),
                'default_value' => ''
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_close_icon_row,
                'type'          => 'textsimple',
                'name'          => 'search_close_size',
                'label'         => esc_html__('Icon Size', 'industrialist'),
                'default_value' => '',
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        $search_fullscreen_border_container = industrialist_mikado_add_admin_container(
            array(
                'parent'          => $search_panel,
                'name'            => 'search_fullscreen_border_container',
                'hidden_property' => 'search_type',
                'hidden_value'    => '',
                'hidden_values'   => array(
                    'search-covers-header',
                    'search-slides-from-window-top',
                    'search-dropdown'
                )
            )
        );

        $search_bottom_border_group = industrialist_mikado_add_admin_group(
            array(
                'parent'      => $search_fullscreen_border_container,
                'title'       => esc_html__('Search Bottom Border', 'industrialist'),
                'description' => esc_html__('Define style for Search text input bottom border (for Fullscreen search type)', 'industrialist'),
                'name'        => 'search_bottom_border_group'
            )
        );

        $search_bottom_border_row = industrialist_mikado_add_admin_row(
            array(
                'parent' => $search_bottom_border_group,
                'name'   => 'search_icon_row'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_bottom_border_row,
                'type'          => 'colorsimple',
                'name'          => 'search_border_color',
                'label'         => esc_html__('Border Color', 'industrialist'),
                'default_value' => ''
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent'        => $search_bottom_border_row,
                'type'          => 'colorsimple',
                'name'          => 'search_border_focus_color',
                'label'         => esc_html__('Border Focus Color', 'industrialist'),
                'default_value' => ''
            )
        );

    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_search_options_map', 5);

}