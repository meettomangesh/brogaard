<?php

if (!function_exists('industrialist_mikado_header_class')) {
    /**
     * Function that adds class to header based on theme options
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added header class
     */
    function industrialist_mikado_header_class($classes) {
        $header_type = industrialist_mikado_get_meta_field_intersect('header_type', industrialist_mikado_get_page_id());

        $classes[] = 'mkd-' . $header_type;

        return $classes;
    }

    add_filter('body_class', 'industrialist_mikado_header_class');
}

if (!function_exists('industrialist_mikado_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added behaviour class
     */
    function industrialist_mikado_header_behaviour_class($classes) {

        $header_behaviour = industrialist_mikado_get_meta_field_intersect('header_behaviour', industrialist_mikado_get_page_id());

        $classes[] = 'mkd-' . $header_behaviour;
        return $classes;
    }

    add_filter('body_class', 'industrialist_mikado_header_behaviour_class');
}

if (!function_exists('industrialist_mikado_mobile_header_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function industrialist_mikado_mobile_header_class($classes) {
        $classes[] = 'mkd-default-mobile-header';

        $classes[] = 'mkd-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'industrialist_mikado_mobile_header_class');
}

if (!function_exists('industrialist_mikado_header_class_first_level_bg_color')) {
    /**
     * Function that adds first level menu background color class to header tag
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added first level menu background color class
     */
    function industrialist_mikado_header_class_first_level_bg_color($classes) {

        //check if first level hover background color is set
        if (industrialist_mikado_options()->getOptionValue('menu_hover_background_color') !== '') {
            $classes[] = 'mkd-menu-item-first-level-bg-color';
        }

        return $classes;
    }

    add_filter('body_class', 'industrialist_mikado_header_class_first_level_bg_color');
}

if (!function_exists('industrialist_mikado_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     *
     * @param array array of classes from main filter
     *
     * @return array array of classes with added menu dropdown appearance class
     */
    function industrialist_mikado_menu_dropdown_appearance($classes) {

        if (industrialist_mikado_options()->getOptionValue('menu_dropdown_appearance') !== 'default') {
            $classes[] = 'mkd-' . industrialist_mikado_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'industrialist_mikado_menu_dropdown_appearance');
}

if (!function_exists('industrialist_mikado_header_skin_class')) {

    /**
     * @param $classes
     *
     * @return array
     */
    function industrialist_mikado_header_skin_class($classes) {

        $id = industrialist_mikado_get_page_id();

        if (($meta_temp = get_post_meta($id, 'mkd_header_style_meta', true)) !== '') {
            $classes[] = 'mkd-' . $meta_temp;
        } else if (industrialist_mikado_options()->getOptionValue('header_style') !== '') {
            $classes[] = 'mkd-' . industrialist_mikado_options()->getOptionValue('header_style');
        }

        return $classes;

    }

    add_filter('body_class', 'industrialist_mikado_header_skin_class');

}

if (!function_exists('industrialist_mikado_header_scroll_style_class')) {

    /**
     * @param $classes
     *
     * @return array
     */
    function industrialist_mikado_header_scroll_style_class($classes) {

        if (industrialist_mikado_get_meta_field_intersect('enable_header_style_on_scroll') == 'yes') {
            $classes[] = 'mkd-header-style-on-scroll';
        }

        return $classes;

    }

    add_filter('body_class', 'industrialist_mikado_header_scroll_style_class');

}

if (!function_exists('industrialist_mikado_header_global_js_var')) {
    /**
     * @param $global_variables
     *
     * @return mixed
     */
    function industrialist_mikado_header_global_js_var($global_variables) {

        $global_variables['mkdTopBarHeight'] = industrialist_mikado_get_top_bar_height();
        $global_variables['mkdStickyHeaderHeight'] = industrialist_mikado_get_sticky_header_height();
        $global_variables['mkdStickyHeaderTransparencyHeight'] = industrialist_mikado_get_sticky_header_height_of_complete_transparency();

        return $global_variables;
    }

    add_filter('industrialist_mikado_js_global_variables', 'industrialist_mikado_header_global_js_var');
}

if (!function_exists('industrialist_mikado_header_per_page_js_var')) {
    /**
     * @param $perPageVars
     *
     * @return mixed
     */
    function industrialist_mikado_header_per_page_js_var($perPageVars) {
        $id = industrialist_mikado_get_page_id();

        $perPageVars['mkdStickyScrollAmount'] = industrialist_mikado_get_sticky_scroll_amount();
        $perPageVars['mkdStickyScrollAmountFullScreen'] = get_post_meta($id, 'mkd_scroll_amount_for_sticky_fullscreen_meta', true) === 'yes';

        return $perPageVars;
    }

    add_filter('industrialist_mikado_per_page_js_vars', 'industrialist_mikado_header_per_page_js_var');
}

if (!function_exists('industrialist_mikado_full_width_wide_menu_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function industrialist_mikado_full_width_wide_menu_class($classes) {
        if (industrialist_mikado_options()->getOptionValue('enable_wide_menu_background') === 'yes') {
            $classes[] = 'mkd-full-width-wide-menu';
        }

        return $classes;
    }

    add_filter('body_class', 'industrialist_mikado_full_width_wide_menu_class');
}

if (!function_exists('industrialist_mikado_header_bottom_shadow_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function industrialist_mikado_header_bottom_shadow_class($classes) {
        $id = industrialist_mikado_get_page_id();
        $header_type = industrialist_mikado_get_meta_field_intersect('header_type', $id);
        switch ($header_type) {
            case 'header-standard':
                $disable_shadow_standard = industrialist_mikado_get_meta_field_intersect('menu_area_shadow_header_standard', $id) == 'no';
                if ($disable_shadow_standard) {
                    $classes[] = 'mkd-header-standard-shadow-disable';
                }

                $disable_grid_shadow_standard = industrialist_mikado_get_meta_field_intersect('menu_area_in_grid_shadow_header_standard', $id) == 'no';
                if ($disable_grid_shadow_standard) {
                    $classes[] = 'mkd-header-standard-in-grid-shadow-disable';
                }
                break;
            case 'header-standard-extended':
                $disable_logo_border_standard_extended = industrialist_mikado_get_meta_field_intersect('logo_area_border_header_standard_extended', $id) == 'no';
                if ($disable_logo_border_standard_extended) {
                    $classes[] = 'mkd-header-standard-extended-logo-border-disable';
                }

                $disable_menu_shadow_standard_extended = industrialist_mikado_get_meta_field_intersect('menu_area_shadow_header_standard_extended', $id) == 'no';
                if ($disable_menu_shadow_standard_extended) {
                    $classes[] = 'mkd-header-standard-extended-menu-shadow-disable';
                }

                $disable_logo_grid_border_standard_extended = industrialist_mikado_get_meta_field_intersect('logo_area_in_grid_border_header_standard_extended', $id) == 'no';
                if ($disable_logo_grid_border_standard_extended) {
                    $classes[] = 'mkd-header-standard-extended-logo-in-grid-border-disable';
                }

                $disable_menu_grid_shadow_standard_extended = industrialist_mikado_get_meta_field_intersect('menu_area_in_grid_shadow_header_standard_extended', $id) == 'no';
                if ($disable_menu_grid_shadow_standard_extended) {
                    $classes[] = 'mkd-header-standard-extended-menu-in-grid-shadow-disable';
                }
                break;
            case 'header-box':
                break;
            case 'header-minimal':
                $disable_shadow_minimal = industrialist_mikado_get_meta_field_intersect('menu_area_shadow_header_minimal', $id) == 'no';
                if ($disable_shadow_minimal) {
                    $classes[] = 'mkd-header-minimal-shadow-disable';
                }

                $disable_grid_shadow_minimal = industrialist_mikado_get_meta_field_intersect('menu_area_in_grid_shadow_header_minimal', $id) == 'no';
                if ($disable_grid_shadow_minimal) {
                    $classes[] = 'mkd-header-minimal-in-grid-shadow-disable';
                }
                break;
            case 'header-vertical':
                $disable_shadow_vertical = industrialist_mikado_get_meta_field_intersect('vertical_header_shadow', $id) == 'no';
                if ($disable_shadow_vertical) {
                    $classes[] = 'mkd-header-vertical-shadow-disable';
                }
                break;
        }

        return $classes;
    }

    add_filter('body_class', 'industrialist_mikado_header_bottom_shadow_class');
}

if (!function_exists('industrialist_mikado_get_top_bar_styles')) {
    /**
     * Sets per page styles for header top bar
     *
     * @param $styles
     *
     * @return array
     */
    function industrialist_mikado_get_top_bar_styles($styles) {
        $id = industrialist_mikado_get_page_id();
        $class_prefix = industrialist_mikado_get_unique_page_class();
        $top_bar_style = array();
        $custom_style = '';

        $top_bar_bg_color = get_post_meta($id, 'mkd_top_bar_background_color_meta', true);

        $top_bar_selector = array(
            $class_prefix . ' .mkd-top-bar'
        );

        if ($top_bar_bg_color !== '') {
            $top_bar_transparency = get_post_meta($id, 'mkd_top_bar_background_transparency_meta', true);
            if ($top_bar_transparency === '') {
                $top_bar_transparency = 1;
            }

            $top_bar_style['background-color'] = industrialist_mikado_rgba_color($top_bar_bg_color, $top_bar_transparency);
        }

        $custom_style .= industrialist_mikado_dynamic_css($top_bar_selector, $top_bar_style);


        $page_selector = array(
            $class_prefix . ' . mkd - top - bar',
            $class_prefix . ' . mkd - top - bar . mkd - logo - wrapper a'
        );
        $page_css = array();

        $top_bar_height = get_post_meta($id, 'mkd_top_bar_height_meta', true);

        if ($top_bar_height !== '') {
            $page_css['height'] = $top_bar_height . 'px';
        }

        $custom_style .= industrialist_mikado_dynamic_css($page_selector, $page_css);

        $custom_style = $custom_style . $styles;


        return $custom_style;
    }

    add_filter('industrialist_mikado_add_page_custom_style', 'industrialist_mikado_get_top_bar_styles');
}

if (!function_exists('industrialist_mikado_top_bar_skin_class')) {
    /**
     * @param $classes
     *
     * @return array
     */
    function industrialist_mikado_top_bar_skin_class($classes) {
        $id = industrialist_mikado_get_page_id();
        $top_bar_skin = get_post_meta($id, 'mkd_top_bar_skin_meta', true);

        if ($top_bar_skin !== '') {
            $classes[] = 'mkd - top - bar - ' . $top_bar_skin;
        }

        return $classes;
    }

    add_filter('body_class', 'industrialist_mikado_top_bar_skin_class');
}

if (!function_exists('industrialist_mikado_top_bar_logo_area')) {
    /**
     * @param $params
     *
     * @return array
     */
    function industrialist_mikado_top_bar_logo_area($params) {

        $header_type = industrialist_mikado_get_meta_field_intersect('header_type');
        switch ($header_type) {
            case 'header - box': {
                if (industrialist_mikado_get_meta_field_intersect('logo_area_header_box') == 'yes') {

                    $logo_style = industrialist_mikado_get_meta_field_intersect('logo_area_style_header_box');
                    $params['logo_area_style'] = $logo_style !== '' ? 'mkd - ' . $logo_style : '';

                    $params['header_box_logo_area'] = true;
                    $params['show_widget_center'] = false;
                } else {
                    $params['header_box_logo_area'] = false;
                }
            }
                break;
        }

        return $params;

    }

    add_filter('industrialist_mikado_header_top_params', 'industrialist_mikado_top_bar_logo_area');
}
