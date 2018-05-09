<?php

if(!function_exists('industrialist_mikado_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function industrialist_mikado_register_top_header_areas() {
        $top_bar_layout = industrialist_mikado_options()->getOptionValue('top_bar_layout');

        register_sidebar(array(
            'name'          => esc_html__('Top Bar Left', 'industrialist'),
            'id'            => 'mkd-top-bar-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s mkd-top-bar-widget"><div class="mkd-top-bar-widget-inner">',
            'after_widget'  => '</div></div>'
        ));

        //register this widget area only if top bar layout is three columns
        if($top_bar_layout === 'three-columns') {
            register_sidebar(array(
                'name'          => esc_html__('Top Bar Center', 'industrialist'),
                'id'            => 'mkd-top-bar-center',
                'before_widget' => '<div id="%1$s" class="widget %2$s mkd-top-bar-widget"><div class="mkd-top-bar-widget-inner">',
                'after_widget'  => '</div></div>'
            ));
        }

        register_sidebar(array(
            'name'          => esc_html__('Top Bar Right', 'industrialist'),
            'id'            => 'mkd-top-bar-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s mkd-top-bar-widget"><div class="mkd-top-bar-widget-inner">',
            'after_widget'  => '</div></div>'
        ));
    }

    add_action('widgets_init', 'industrialist_mikado_register_top_header_areas');
}

if(!function_exists('industrialist_mikado_header_standard_widget_areas')) {
    /**
     * Registers widget areas for standard header type
     */
    function industrialist_mikado_header_standard_widget_areas() {

        register_sidebar(array(
            'name'          => esc_html__('Right From Logo', 'industrialist'),
            'id'            => 'mkd-right-from-logo',
            'before_widget' => '<div id="%1$s" class="widget %2$s mkd-right-from-logo-widget"><div class="mkd-right-from-logo-widget-inner">',
            'after_widget'  => '</div></div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side from the logo - Standard Extended header type only', 'industrialist')
        ));

        register_sidebar(array(
            'name'          => esc_html__('Right From Main Menu', 'industrialist'),
            'id'            => 'mkd-right-from-main-menu',
            'before_widget' => '<div id="%1$s" class="widget %2$s mkd-right-from-main-menu-widget"><div class="mkd-right-from-main-menu-widget-inner">',
            'after_widget'  => '</div></div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'industrialist')
        ));

    }

    add_action('widgets_init', 'industrialist_mikado_header_standard_widget_areas');
}

if(!function_exists('industrialist_mikado_header_vertical_widget_areas')) {
    /**
     * Registers widget areas for vertical header
     */
    function industrialist_mikado_header_vertical_widget_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Vertical Area', 'industrialist'),
            'id'            => 'mkd-vertical-area',
            'before_widget' => '<div id="%1$s" class="widget %2$s mkd-vertical-area-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the bottom of vertical menu', 'industrialist')
        ));
    }

    add_action('widgets_init', 'industrialist_mikado_header_vertical_widget_areas');
}

if(!function_exists('industrialist_mikado_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function industrialist_mikado_register_mobile_header_areas() {
        if(industrialist_mikado_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Right From Mobile Logo', 'industrialist'),
                'id'            => 'mkd-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s mkd-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo', 'industrialist')
            ));
        }
    }
    add_action('widgets_init', 'industrialist_mikado_register_mobile_header_areas');
}

if(!function_exists('industrialist_mikado_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function industrialist_mikado_register_sticky_header_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Sticky Right', 'industrialist'),
            'id'            => 'mkd-sticky-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s mkd-sticky-right-widget"><div class="mkd-sticky-right-widget-inner">',
            'after_widget'  => '</div></div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side in sticky menu', 'industrialist')
        ));
    }
    add_action('widgets_init', 'industrialist_mikado_register_sticky_header_areas');
}