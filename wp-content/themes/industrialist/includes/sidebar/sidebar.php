<?php

if (!function_exists('industrialist_mikado_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function industrialist_mikado_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar','industrialist'),
            'id' => 'sidebar',
            'description' =>esc_html__( 'Default Sidebar','industrialist'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="mkd-widget-title-holder"><h4 class="mkd-widget-title">',
            'after_title' => '</h4>' . industrialist_mikado_get_widget_title_separator('sidebar') . '</div>',
        ));

    }

    add_action('widgets_init', 'industrialist_mikado_register_sidebars');
}

if (!function_exists('industrialist_mikado_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates IndustrialistMikadoSidebar object
     */
    function industrialist_mikado_add_support_custom_sidebar() {
        add_theme_support('IndustrialistMikadoSidebar');
        if (get_theme_support('IndustrialistMikadoSidebar')) new IndustrialistMikadoSidebar();
    }

    add_action('after_setup_theme', 'industrialist_mikado_add_support_custom_sidebar');
}
