<?php

if(!function_exists('industrialist_mikado_header_register_main_navigation')) {
    /**
     * Registers main navigation
     */
    function industrialist_mikado_header_register_main_navigation() {
        register_nav_menus(
            array(
                'main-navigation' => esc_html__('Main Navigation', 'industrialist'),
                'vertical-navigation' => esc_html__('Vertical Navigation', 'industrialist'),
                'mobile-navigation' => esc_html__('Mobile Navigation', 'industrialist')
            )
        );
    }

    add_action('after_setup_theme', 'industrialist_mikado_header_register_main_navigation');
}

if(!function_exists('industrialist_mikado_is_top_bar_transparent')) {
    /**
     * Checks if top bar is transparent or not
     *
     * @return bool
     */
    function industrialist_mikado_is_top_bar_transparent() {
        $top_bar_enabled = industrialist_mikado_is_top_bar_enabled();

        $top_bar_bg_color     = industrialist_mikado_get_meta_field_intersect('top_bar_background_color');
        $top_bar_transparency = industrialist_mikado_get_meta_field_intersect('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
        }

        return false;
    }
}

if(!function_exists('industrialist_mikado_is_top_bar_completely_transparent')) {
    function industrialist_mikado_is_top_bar_completely_transparent() {
        $top_bar_enabled = industrialist_mikado_is_top_bar_enabled();

        $top_bar_bg_color     = industrialist_mikado_options()->getOptionValue('top_bar_background_color');
        $top_bar_transparency = industrialist_mikado_options()->getOptionValue('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency === '0';
        }

        return false;
    }
}

if(!function_exists('industrialist_mikado_is_top_bar_enabled')) {
    function industrialist_mikado_is_top_bar_enabled() {
        $id = industrialist_mikado_get_page_id();

        $top_bar_enabled = industrialist_mikado_get_meta_field_intersect('top_bar', $id) === 'yes';
        if(industrialist_mikado_get_meta_field_intersect('header_type', $id) === 'header-box'){
            $top_bar_enabled = true;
        }

        return $top_bar_enabled;
    }
}

if(!function_exists('industrialist_mikado_get_top_bar_height')) {
    /**
     * Returns top bar height
     *
     * @return bool|int|void
     */
    function industrialist_mikado_get_top_bar_height() {
        if(industrialist_mikado_is_top_bar_enabled()) {
            $top_bar_height = industrialist_mikado_filter_px(industrialist_mikado_get_meta_field_intersect('top_bar_height'));
            $def_top_bar_height = 45;

            return $top_bar_height !== '' ? intval($top_bar_height) : $def_top_bar_height;
        }

        return 0;
    }
}

if(!function_exists('industrialist_mikado_get_top_bar_background_height')) {
    /**
     * Returns top bar background height
     *
     * @return bool|int|void
     */
    function industrialist_mikado_get_top_bar_background_height() {

        $top_bar_height = industrialist_mikado_filter_px(industrialist_mikado_get_meta_field_intersect('top_bar_height'));
        $header_height = industrialist_mikado_filter_px(industrialist_mikado_get_meta_field_intersect('menu_area_height_header_box'));

        if($top_bar_height == ''){
            $top_bar_height = 55;
        }
        if($header_height == ''){
            $header_height = 100;
        }

        $top_bar_background_height = round($top_bar_height) + round($header_height / 2);
        return $top_bar_background_height;
    }
}

if(!function_exists('industrialist_mikado_get_sticky_header_height')) {
    /**
     * Returns top sticky header height
     *
     * @return bool|int|void
     */
    function industrialist_mikado_get_sticky_header_height() {
        //sticky menu height, needed only for sticky header on scroll up
        if(industrialist_mikado_options()->getOptionValue('header_type') !== 'header-vertical' &&
            in_array(industrialist_mikado_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up'))
        ) {

            $sticky_header_height = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sticky_header_height'));

            return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
        }

        return 0;

    }
}

if(!function_exists('industrialist_mikado_get_sticky_header_height_of_complete_transparency')) {
    /**
     * Returns top sticky header height it is fully transparent. used in anchor logic
     *
     * @return bool|int|void
     */
    function industrialist_mikado_get_sticky_header_height_of_complete_transparency() {

        if(industrialist_mikado_options()->getOptionValue('header_type') !== 'header-vertical') {
            if(industrialist_mikado_options()->getOptionValue('sticky_header_transparency') === '0') {
                $stickyHeaderTransparent = industrialist_mikado_options()->getOptionValue('sticky_header_grid_background_color') !== '' &&
                    industrialist_mikado_options()->getOptionValue('sticky_header_grid_transparency') === '0';
            } else {
                $stickyHeaderTransparent = industrialist_mikado_options()->getOptionValue('sticky_header_background_color') !== '' &&
                    industrialist_mikado_options()->getOptionValue('sticky_header_transparency') === '0';
            }

            if($stickyHeaderTransparent) {
                return 0;
            } else {
                $sticky_header_height = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sticky_header_height'));

                return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
            }
        }

        return 0;
    }
}

if(!function_exists('industrialist_mikado_get_sticky_scroll_amount')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function industrialist_mikado_get_sticky_scroll_amount() {

        //sticky menu scroll amount
        if(industrialist_mikado_options()->getOptionValue('header_type') !== 'header-vertical' &&
            in_array(industrialist_mikado_options()->getOptionValue('header_behaviour'), array(
                'sticky-header-on-scroll-up',
                'sticky-header-on-scroll-down-up'
            ))
        ) {

            $sticky_scroll_amount = industrialist_mikado_filter_px(industrialist_mikado_get_meta_field_intersect('scroll_amount_for_sticky'));

            return $sticky_scroll_amount !== '' ? intval($sticky_scroll_amount) : 0;
        }

        return 0;

    }
}