<?php

$custom_sidebars = industrialist_mikado_get_custom_sidebars();

$sidebar_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Sidebar', 'industrialist'),
        'name' => 'sidebar_meta'
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_sidebar_meta',
        'type' => 'select',
        'label' => esc_html__('Layout', 'industrialist'),
        'description' => esc_html__('Choose the sidebar layout', 'industrialist'),
        'parent' => $sidebar_meta_box,
        'options' => array(
            '' => esc_html__('Default', 'industrialist'),
            'no-sidebar' => esc_html__('No Sidebar', 'industrialist'),
            'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'industrialist'),
            'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'industrialist'),
            'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'industrialist'),
            'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'industrialist'),
        )
    )
);

if (count($custom_sidebars) > 0) {
    industrialist_mikado_add_meta_box_field(array(
        'name' => 'mkd_custom_sidebar_meta',
        'type' => 'selectblank',
        'label' => esc_html__('Choose Widget Area in Sidebar', 'industrialist'),
        'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'industrialist'),
        'parent' => $sidebar_meta_box,
        'options' => $custom_sidebars,
        'args' => array(
            'select2' => true
        )
    ));
}
