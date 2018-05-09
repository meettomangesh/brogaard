<?php

if (!function_exists('industrialist_mikado_search_body_class')) {
    /**
     * Function that adds body classes for different search types
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function industrialist_mikado_search_body_class($classes) {

        if (is_active_widget(false, false, 'mkd_search_opener')) {

            $classes[] = 'mkd-' . industrialist_mikado_options()->getOptionValue('search_type');

            if (industrialist_mikado_options()->getOptionValue('search_type') == 'fullscreen-search') {

                $is_fullscreen_bg_image_set = industrialist_mikado_options()->getOptionValue('fullscreen_search_background_image') !== '';

                if ($is_fullscreen_bg_image_set) {
                    $classes[] = 'mkd-fullscreen-search-with-bg-image';
                }

                $classes[] = 'mkd-search-fade';

            }

        }

        return $classes;

    }

    add_filter('body_class', 'industrialist_mikado_search_body_class');
}

if (!function_exists('industrialist_mikado_get_search')) {
    /**
     * Loads search HTML based on search type option.
     */
    function industrialist_mikado_get_search() {

        if (industrialist_mikado_active_widget(false, false, 'mkd_search_opener')) {

            $search_type = industrialist_mikado_options()->getOptionValue('search_type');

            //var_dump('xxx: ' . $search_type);

            if ($search_type == 'search-covers-header') {
                industrialist_mikado_set_position_for_covering_search();

                return;
            } else if ($search_type == 'search-slides-from-window-top') {
                industrialist_mikado_set_search_position_in_menu($search_type);
                if (industrialist_mikado_is_responsive_on()) {
                    industrialist_mikado_set_search_position_mobile();
                }

                return;
            } elseif ($search_type === 'search-dropdown') {
                industrialist_mikado_set_dropdown_search_position();

                return;
            }

            industrialist_mikado_load_search_template();

        }
    }

}

if (!function_exists('industrialist_mikado_set_position_for_covering_search')) {
    /**
     * Finds part of header where search template will be loaded
     */
    function industrialist_mikado_set_position_for_covering_search() {

        $containing_sidebar = industrialist_mikado_active_widget(false, false, 'mkd_search_opener');

        foreach ($containing_sidebar as $sidebar) {

            if (strpos($sidebar, 'top-bar') !== false) {
                add_action('industrialist_mikado_after_header_top_html_open', 'industrialist_mikado_load_search_template');
            } else if (strpos($sidebar, 'main-menu') !== false) {
                add_action('industrialist_mikado_after_header_menu_area_html_open', 'industrialist_mikado_load_search_template');
            } else if (strpos($sidebar, 'mobile-logo') !== false) {
                add_action('industrialist_mikado_after_mobile_header_html_open', 'industrialist_mikado_load_search_template');
            } else if (strpos($sidebar, 'logo') !== false) {
                add_action('industrialist_mikado_after_header_logo_area_html_open', 'industrialist_mikado_load_search_template');
            } else if (strpos($sidebar, 'sticky') !== false) {
                add_action('industrialist_mikado_after_sticky_menu_html_open', 'industrialist_mikado_load_search_template');
            }
        }
    }
}

if (!function_exists('industrialist_mikado_set_search_position_in_menu')) {
    /**
     * Finds part of header where search template will be loaded
     */
    function industrialist_mikado_set_search_position_in_menu($type) {

        add_action('industrialist_mikado_after_header_menu_area_html_open', 'industrialist_mikado_load_search_template');

    }
}

if (!function_exists('industrialist_mikado_set_search_position_mobile')) {
    /**
     * Hooks search template to mobile header
     */
    function industrialist_mikado_set_search_position_mobile() {

        add_action('industrialist_mikado_after_mobile_header_html_open', 'industrialist_mikado_load_search_template');

    }

}

if (!function_exists('industrialist_mikado_load_search_template')) {
    /**
     * Loads HTML template with parameters
     */
    function industrialist_mikado_load_search_template() {
        global $industrialist_IconCollections;

        $search_type = industrialist_mikado_options()->getOptionValue('search_type');

        $search_icon = '';
        $search_icon_close = '';
        if (industrialist_mikado_options()->getOptionValue('search_icon_pack') !== '') {
            $search_icon = $industrialist_IconCollections->getSearchIcon(industrialist_mikado_options()->getOptionValue('search_icon_pack'), true);
            $search_icon_close = $industrialist_IconCollections->getSearchClose(industrialist_mikado_options()->getOptionValue('search_icon_pack'), true);
        }

        $parameters = array(
            'search_in_grid' => industrialist_mikado_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
            'search_icon' => $search_icon,
            'search_icon_close' => $search_icon_close
        );

        industrialist_mikado_get_module_template_part('templates/types/' . $search_type, 'search', '', $parameters);

    }

}

if (!function_exists('industrialist_mikado_set_dropdown_search_position')) {
    function industrialist_mikado_set_dropdown_search_position() {

        add_action('industrialist_mikado_after_search_opener', 'industrialist_mikado_load_search_template');
    }
}