<?php
if (!function_exists('industrialist_mikado_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function industrialist_mikado_register_side_area_sidebar() {

        register_sidebar(array(
            'name' => esc_html__('Side Area', 'industrialist'),
            'id' => 'sidearea',
            'description' => esc_html__('Side Area', 'industrialist'),
            'before_widget' => '<div id="%1$s" class="widget mkd-sidearea %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="mkd-widget-title-holder"><h4 class="mkd-widget-title">',
            'after_title' => '</h4></div>',
        ));

    }

    add_action('widgets_init', 'industrialist_mikado_register_side_area_sidebar');

}

if (!function_exists('industrialist_mikado_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function industrialist_mikado_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'mkd_side_area_opener')) {

            if (industrialist_mikado_options()->getOptionValue('side_area_type')) {

                $classes[] = 'mkd-' . industrialist_mikado_options()->getOptionValue('side_area_type');

                if (industrialist_mikado_options()->getOptionValue('side_area_type') === 'side-menu-slide-with-content') {

                    $classes[] = 'mkd-' . industrialist_mikado_options()->getOptionValue('side_area_slide_with_content_width');

                }

            }

        }

        return $classes;

    }

    add_filter('body_class', 'industrialist_mikado_side_menu_body_class');
}


if (!function_exists('industrialist_mikado_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function industrialist_mikado_get_side_area() {

        if (is_active_widget(false, false, 'mkd_side_area_opener')) {

            industrialist_mikado_get_module_template_part('templates/sidearea', 'sidearea');

        }

    }

}

if (!function_exists('industrialist_mikado_get_side_menu_icon_html')) {
    /**
     * Function that outputs html for side area icon opener.
     * Uses $industrialist_IconCollections global variable
     * @return string generated html
     */
    function industrialist_mikado_get_side_menu_icon_html() {

        $icon_html = '';

        if (industrialist_mikado_options()->getOptionValue('side_area_button_icon_pack') !== '') {
            $icon_pack = industrialist_mikado_options()->getOptionValue('side_area_button_icon_pack');

            $icons = industrialist_mikado_icon_collections()->getIconCollection($icon_pack);
            $icon_options_field = 'side_area_icon_' . $icons->param;

            if (industrialist_mikado_options()->getOptionValue($icon_options_field) !== '') {

                $icon = industrialist_mikado_options()->getOptionValue($icon_options_field);
                $icon_html = industrialist_mikado_icon_collections()->renderIcon($icon, $icon_pack);

            }

        }

        return $icon_html;
    }
}