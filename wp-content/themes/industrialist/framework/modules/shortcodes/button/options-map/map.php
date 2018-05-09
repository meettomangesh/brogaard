<?php

if (!function_exists('industrialist_mikado_button_map')) {
    function industrialist_mikado_button_map() {
        $panel = industrialist_mikado_add_admin_panel(array(
            'title' => esc_html__('Button', 'industrialist'),
            'name' => 'panel_button',
            'page' => '_elements_page'
        ));

        //Typography options
        industrialist_mikado_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Typography', 'industrialist'),
            'parent' => $panel
        ));

        $typography_group = industrialist_mikado_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Typography', 'industrialist'),
            'description' => esc_html__('Setup typography for all button types', 'industrialist'),
            'parent' => $panel
        ));

        $typography_row = industrialist_mikado_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $typography_row,
            'type' => 'fontsimple',
            'name' => 'button_font_family',
            'default_value' => '',
            'label' => esc_html__('Font Family', 'industrialist'),
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $typography_row,
            'type' => 'selectsimple',
            'name' => 'button_text_transform',
            'default_value' => '',
            'label' => esc_html__('Text Transform', 'industrialist'),
            'options' => industrialist_mikado_get_text_transform_array()
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $typography_row,
            'type' => 'selectsimple',
            'name' => 'button_font_style',
            'default_value' => '',
            'label' => esc_html__('Font Style', 'industrialist'),
            'options' => industrialist_mikado_get_font_style_array()
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $typography_row,
            'type' => 'textsimple',
            'name' => 'button_letter_spacing',
            'default_value' => '',
            'label' => esc_html__('Letter Spacing', 'industrialist'),
            'args' => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = industrialist_mikado_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $typography_row2,
            'type' => 'selectsimple',
            'name' => 'button_font_weight',
            'default_value' => '',
            'label' => esc_html__('Font Weight', 'industrialist'),
            'options' => industrialist_mikado_get_font_weight_array()
        ));

        //Outline type options
        industrialist_mikado_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Types', 'industrialist'),
            'parent' => $panel
        ));

        $outline_group = industrialist_mikado_add_admin_group(array(
            'name' => 'outline_group',
            'title' => esc_html__('Outline Type', 'industrialist'),
            'description' => esc_html__('Setup outline button type', 'industrialist'),
            'parent' => $panel
        ));

        $outline_row = industrialist_mikado_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $outline_row,
            'type' => 'colorsimple',
            'name' => 'btn_outline_text_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'industrialist'),
            'description' => ''
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $outline_row,
            'type' => 'colorsimple',
            'name' => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label' => esc_html__('Text Hover Color', 'industrialist'),
            'description' => ''
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $outline_row,
            'type' => 'colorsimple',
            'name' => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label' => esc_html__('Hover Background Color', 'industrialist'),
            'description' => ''
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $outline_row,
            'type' => 'colorsimple',
            'name' => 'btn_outline_border_color',
            'default_value' => '',
            'label' => esc_html__('Border Color', 'industrialist'),
            'description' => ''
        ));

        $outline_row2 = industrialist_mikado_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $outline_row2,
            'type' => 'colorsimple',
            'name' => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label' => esc_html__('Hover Border Color', 'industrialist'),
            'description' => ''
        ));

        //Solid type options
        $solid_group = industrialist_mikado_add_admin_group(array(
            'name' => 'solid_group',
            'title' => esc_html__('Solid Type', 'industrialist'),
            'description' => esc_html__('Setup solid button type', 'industrialist'),
            'parent' => $panel
        ));

        $solid_row = industrialist_mikado_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $solid_row,
            'type' => 'colorsimple',
            'name' => 'btn_solid_text_color',
            'default_value' => '',
            'label' => esc_html__('Text Color', 'industrialist'),
            'description' => ''
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $solid_row,
            'type' => 'colorsimple',
            'name' => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label' => esc_html__('Text Hover Color', 'industrialist'),
            'description' => ''
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $solid_row,
            'type' => 'colorsimple',
            'name' => 'btn_solid_bg_color',
            'default_value' => '',
            'label' => esc_html__('Background Color', 'industrialist'),
            'description' => ''
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $solid_row,
            'type' => 'colorsimple',
            'name' => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label' => esc_html__('Hover Background Color', 'industrialist'),
            'description' => ''
        ));

        $solid_row2 = industrialist_mikado_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $solid_row2,
            'type' => 'colorsimple',
            'name' => 'btn_solid_border_color',
            'default_value' => '',
            'label' => esc_html__('Border Color', 'industrialist'),
            'description' => ''
        ));

        industrialist_mikado_add_admin_field(array(
            'parent' => $solid_row2,
            'type' => 'colorsimple',
            'name' => 'btn_solid_hover_border_color',
            'default_value' => '',
            'label' => esc_html__('Hover Border Color', 'industrialist'),
            'description' => ''
        ));
    }

    add_action('industrialist_mikado_options_elements_map', 'industrialist_mikado_button_map');
}