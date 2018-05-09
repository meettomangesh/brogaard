<?php

if (!function_exists('industrialist_mikado_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function industrialist_mikado_header_top_bar_styles() {

        if (industrialist_mikado_options()->getOptionValue('top_bar_height') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-top-bar', array('height' => industrialist_mikado_options()->getOptionValue('top_bar_height') . 'px'));
            echo industrialist_mikado_dynamic_css('.mkd-top-bar .mkd-logo-wrapper a', array('max-height' => industrialist_mikado_options()->getOptionValue('top_bar_height') . 'px'));
        }

        if (industrialist_mikado_options()->getOptionValue('top_bar_in_grid') == 'yes') {
            $top_bar_grid_selector = '.mkd-top-bar .mkd-grid .mkd-vertical-align-containers';
            $top_bar_grid_styles = array();
            if (industrialist_mikado_options()->getOptionValue('top_bar_grid_background_color') !== '') {
                $grid_background_color = industrialist_mikado_options()->getOptionValue('top_bar_grid_background_color');
                $grid_background_transparency = 1;

                if (industrialist_mikado_options()->getOptionValue('top_bar_grid_background_transparency') !== '') {
                    $grid_background_transparency = industrialist_mikado_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color = industrialist_mikado_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo industrialist_mikado_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = industrialist_mikado_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();
        if ($background_color !== '') {
            $background_transparency = 1;
            if (industrialist_mikado_options()->getOptionValue('top_bar_background_transparency') !== '') {
                $background_transparency = industrialist_mikado_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color = industrialist_mikado_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;
        }

        echo industrialist_mikado_dynamic_css('.mkd-top-bar', $top_bar_styles);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_header_top_bar_styles');
}

if (!function_exists('industrialist_mikado_header_standard_menu_area_styles')) {
    /**
     * Generates styles for header standard menu
     */
    function industrialist_mikado_header_standard_menu_area_styles() {

        $menu_area_header_standard_styles = array();

        if (industrialist_mikado_options()->getOptionValue('menu_area_background_color_header_standard') !== '') {
            $menu_area_background_color = industrialist_mikado_options()->getOptionValue('menu_area_background_color_header_standard');
            $menu_area_background_transparency = 1;

            if (industrialist_mikado_options()->getOptionValue('menu_area_background_transparency_header_standard') !== '') {
                $menu_area_background_transparency = industrialist_mikado_options()->getOptionValue('menu_area_background_transparency_header_standard');
            }

            $menu_area_header_standard_styles['background-color'] = industrialist_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if (industrialist_mikado_options()->getOptionValue('menu_area_border_header_standard') === 'yes') {
            if (industrialist_mikado_options()->getOptionValue('menu_area_border_header_standard_color') !== '') {
                $menu_area_header_standard_styles['border-bottom'] = '1px solid ' . industrialist_mikado_options()->getOptionValue('menu_area_border_header_standard_color');
            }
        }

        if (industrialist_mikado_options()->getOptionValue('menu_area_height_header_standard') !== '') {
            $max_height = intval(industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_area_height_header_standard')) * 0.9) . 'px';
            echo industrialist_mikado_dynamic_css('.mkd-header-standard .mkd-page-header .mkd-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_standard_styles['height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_area_height_header_standard')) . 'px';

        }

        echo industrialist_mikado_dynamic_css('.mkd-header-standard .mkd-page-header .mkd-menu-area', $menu_area_header_standard_styles);

        $menu_area_grid_header_standard_styles = array();

        if (industrialist_mikado_options()->getOptionValue('menu_area_in_grid_header_standard') == 'yes' && industrialist_mikado_options()->getOptionValue('menu_area_grid_background_color_header_standard') !== '') {
            $menu_area_grid_background_color = industrialist_mikado_options()->getOptionValue('menu_area_grid_background_color_header_standard');
            $menu_area_grid_background_transparency = 1;

            if (industrialist_mikado_options()->getOptionValue('menu_area_grid_background_transparency_header_standard') !== '') {
                $menu_area_grid_background_transparency = industrialist_mikado_options()->getOptionValue('menu_area_grid_background_transparency_header_standard');
            }

            $menu_area_grid_header_standard_styles['background-color'] = industrialist_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo industrialist_mikado_dynamic_css('.mkd-header-standard .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers', $menu_area_grid_header_standard_styles);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_header_standard_menu_area_styles');
}

if (!function_exists('industrialist_mikado_header_standard_extended_logo_area_styles')) {
    /**
     * Generates styles for header standard extended menu
     */
    function industrialist_mikado_header_standard_extended_logo_area_styles() {
        global $industrialist_options;

        $logo_area_header_standard_extended_styles = array();

        if ($industrialist_options['logo_area_background_color_header_standard_extended'] !== '') {
            $logo_area_background_color = $industrialist_options['logo_area_background_color_header_standard_extended'];
            $logo_area_background_transparency = 1;

            if ($industrialist_options['logo_area_background_transparency_header_standard_extended'] !== '') {
                $logo_area_background_transparency = $industrialist_options['logo_area_background_transparency_header_standard_extended'];
            }

            $logo_area_header_standard_extended_styles['background-color'] = industrialist_mikado_rgba_color($logo_area_background_color, $logo_area_background_transparency);
        }

        if (industrialist_mikado_options()->getOptionValue('logo_area_border_header_standard_extended') == 'yes' &&
            industrialist_mikado_options()->getOptionValue('logo_area_border_color_header_standard_extended') !== ''
        ) {

            $logo_area_header_standard_extended_styles['border-bottom'] = '1px solid ' . industrialist_mikado_options()->getOptionValue('logo_area_border_color_header_standard_extended');
        }

        if ($industrialist_options['logo_area_height_header_standard_extended'] !== '') {
            $max_height = intval(industrialist_mikado_filter_px($industrialist_options['logo_area_height_header_standard_extended']) * 0.9) . 'px';
            echo industrialist_mikado_dynamic_css('.mkd-header-standard-extended .mkd-page-header .mkd-logo-wrapper a', array('max-height' => $max_height));

            $logo_area_header_standard_extended_styles['height'] = industrialist_mikado_filter_px($industrialist_options['logo_area_height_header_standard_extended']) . 'px';

        }

        echo industrialist_mikado_dynamic_css('.mkd-header-standard-extended .mkd-page-header .mkd-logo-area', $logo_area_header_standard_extended_styles);

        $logo_area_grid_header_standard_extended_styles = array();

        if ($industrialist_options['logo_area_in_grid_header_standard_extended'] == 'yes' && $industrialist_options['logo_area_grid_background_color_header_standard_extended'] !== '') {
            $logo_area_grid_background_color = $industrialist_options['logo_area_grid_background_color_header_standard_extended'];
            $logo_area_grid_background_transparency = 1;

            if ($industrialist_options['logo_area_grid_background_transparency_header_standard_extended'] !== '') {
                $logo_area_grid_background_transparency = $industrialist_options['logo_area_grid_background_transparency_header_standard_extended'];
            }

            $logo_area_grid_header_standard_extended_styles['background-color'] = industrialist_mikado_rgba_color($logo_area_grid_background_color, $logo_area_grid_background_transparency);
        }

        if (industrialist_mikado_options()->getOptionValue('logo_area_in_grid_border_header_standard_extended') == 'yes' &&
            industrialist_mikado_options()->getOptionValue('logo_area_in_grid_border_color_header_standard_extended') !== ''
        ) {

            $logo_area_grid_header_standard_extended_styles['border-bottom'] = '1px solid ' . industrialist_mikado_options()->getOptionValue('logo_area_in_grid_border_color_header_standard_extended');

        } else if (industrialist_mikado_options()->getOptionValue('logo_area_in_grid_border_header_standard_extended') == 'no') {
            $logo_area_grid_header_standard_extended_styles['border'] = '0';
        }

        echo industrialist_mikado_dynamic_css('.mkd-header-standard-extended .mkd-page-header .mkd-logo-area .mkd-grid .mkd-vertical-align-containers', $logo_area_grid_header_standard_extended_styles);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_header_standard_extended_logo_area_styles');
}

if (!function_exists('industrialist_mikado_header_minimal_menu_area_styles')) {
    /**
     * Generates styles for header minimal menu
     */
    function industrialist_mikado_header_minimal_menu_area_styles() {
        global $industrialist_options;

        $menu_area_header_minimal_styles = array();

        if ($industrialist_options['menu_area_background_color_header_minimal'] !== '') {
            $menu_area_background_color = $industrialist_options['menu_area_background_color_header_minimal'];
            $menu_area_background_transparency = 1;

            if ($industrialist_options['menu_area_background_transparency_header_minimal'] !== '') {
                $menu_area_background_transparency = $industrialist_options['menu_area_background_transparency_header_minimal'];
            }

            $menu_area_header_minimal_styles['background-color'] = industrialist_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if (industrialist_mikado_options()->getOptionValue('menu_area_border_header_minimal') === 'yes') {
            if (industrialist_mikado_options()->getOptionValue('menu_area_border_header_minimal_color') !== '') {
                $menu_area_header_minimal_styles['border-bottom'] = '1px solid ' . industrialist_mikado_options()->getOptionValue('menu_area_border_header_minimal_color');
            }
        }

        if ($industrialist_options['menu_area_height_header_minimal'] !== '') {
            $max_height = intval(industrialist_mikado_filter_px($industrialist_options['menu_area_height_header_minimal']) * 0.9) . 'px';
            echo industrialist_mikado_dynamic_css('.mkd-header-minimal .mkd-page-header .mkd-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_minimal_styles['height'] = industrialist_mikado_filter_px($industrialist_options['menu_area_height_header_minimal']) . 'px';

        }

        echo industrialist_mikado_dynamic_css('.mkd-header-minimal .mkd-page-header .mkd-menu-area', $menu_area_header_minimal_styles);

        $menu_area_grid_header_minimal_styles = array();

        if ($industrialist_options['menu_area_in_grid_header_minimal'] == 'yes' && $industrialist_options['menu_area_grid_background_color_header_minimal'] !== '') {
            $menu_area_grid_background_color = $industrialist_options['menu_area_grid_background_color_header_minimal'];
            $menu_area_grid_background_transparency = 1;

            if ($industrialist_options['menu_area_grid_background_transparency_header_minimal'] !== '') {
                $menu_area_grid_background_transparency = $industrialist_options['menu_area_grid_background_transparency_header_minimal'];
            }

            $menu_area_grid_header_minimal_styles['background-color'] = industrialist_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo industrialist_mikado_dynamic_css('.mkd-header-minimal .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers', $menu_area_grid_header_minimal_styles);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_header_minimal_menu_area_styles');
}

if (!function_exists('industrialist_mikado_header_minimal_opener_styles')) {
    /**
     * Generates styles for header minimal icon opener
     */
    function industrialist_mikado_header_minimal_opener_styles() {
        global $industrialist_options;

        $menu_area_header_minimal_opener_styles = array();
        $menu_area_header_minimal_opener_holder_styles = array();

        if ($industrialist_options['header_icon_opener_size_minimal'] !== '') {

            $menu_area_header_minimal_opener_styles['font-size'] = industrialist_mikado_filter_px($industrialist_options['header_icon_opener_size_minimal']) . 'px';
            $menu_area_header_minimal_opener_holder_styles['width'] = industrialist_mikado_filter_px($industrialist_options['header_icon_opener_size_minimal']) . 'px';

        }

        echo industrialist_mikado_dynamic_css('
        .mkd-fullscreen-menu-opener .mkd-fullscreen-menu-closer-icon, 
        .mkd-fullscreen-menu-opener .mkd-fullscreen-menu-opener-icon'
            , $menu_area_header_minimal_opener_styles);
        echo industrialist_mikado_dynamic_css('
        
        
        .mkd-fullscreen-menu-opener'
            , $menu_area_header_minimal_opener_holder_styles);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_header_minimal_opener_styles');
}

if (!function_exists('industrialist_mikado_header_standard_extended_menu_area_styles')) {
    /**
     * Generates styles for header standard extended menu
     */
    function industrialist_mikado_header_standard_extended_menu_area_styles() {
        global $industrialist_options;

        $menu_area_header_standard_extended_styles = array();

        if ($industrialist_options['menu_area_background_color_header_standard_extended'] !== '') {
            $menu_area_background_color = $industrialist_options['menu_area_background_color_header_standard_extended'];
            $menu_area_background_transparency = 1;

            if ($industrialist_options['menu_area_background_transparency_header_standard_extended'] !== '') {
                $menu_area_background_transparency = $industrialist_options['menu_area_background_transparency_header_standard_extended'];
            }

            $menu_area_header_standard_extended_styles['background-color'] = industrialist_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if (industrialist_mikado_options()->getOptionValue('menu_area_border_header_standard_extended') == 'yes' &&
            industrialist_mikado_options()->getOptionValue('menu_area_border_header_standard_extended_color') !== ''
        ) {

            $menu_area_header_standard_extended_styles['border-bottom'] = '1px solid ' . industrialist_mikado_options()->getOptionValue('menu_area_border_header_standard_extended_color');
        }

        if ($industrialist_options['menu_area_height_header_standard_extended'] !== '') {

            $menu_area_header_standard_extended_styles['height'] = industrialist_mikado_filter_px($industrialist_options['menu_area_height_header_standard_extended']) . 'px';

        }

        echo industrialist_mikado_dynamic_css('.mkd-header-standard-extended .mkd-page-header .mkd-menu-area', $menu_area_header_standard_extended_styles);

        $menu_area_grid_header_standard_extended_styles = array();

        if ($industrialist_options['menu_area_in_grid_header_standard_extended'] == 'yes' && $industrialist_options['menu_area_grid_background_color_header_standard_extended'] !== '') {
            $menu_area_grid_background_color = $industrialist_options['menu_area_grid_background_color_header_standard_extended'];
            $menu_area_grid_background_transparency = 1;

            if ($industrialist_options['menu_area_grid_background_transparency_header_standard_extended'] !== '') {
                $menu_area_grid_background_transparency = $industrialist_options['menu_area_grid_background_transparency_header_standard_extended'];
            }

            $menu_area_grid_header_standard_extended_styles['background-color'] = industrialist_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo industrialist_mikado_dynamic_css('.mkd-header-standard-extended .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers', $menu_area_grid_header_standard_extended_styles);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_header_standard_extended_menu_area_styles');
}

if (!function_exists('industrialist_mikado_header_box_menu_area_styles')) {
    /**
     * Generates styles for header box menu
     */
    function industrialist_mikado_header_box_menu_area_styles() {
        global $industrialist_options;

        $menu_area_header_box_styles = array();

        if ($industrialist_options['menu_area_height_header_box'] !== '') {
            $max_height = intval(industrialist_mikado_filter_px($industrialist_options['menu_area_height_header_box']) * 0.9) . 'px';
            echo industrialist_mikado_dynamic_css('.mkd-header-box .mkd-page-header .mkd-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_box_styles['height'] = industrialist_mikado_filter_px($industrialist_options['menu_area_height_header_box']) . 'px';

        }

        echo industrialist_mikado_dynamic_css('.mkd-header-box .mkd-page-header .mkd-menu-area', $menu_area_header_box_styles);

        $menu_area_grid_header_box_styles = array();

        if ($industrialist_options['menu_area_grid_background_color_header_box'] !== '') {
            $menu_area_grid_background_color = $industrialist_options['menu_area_grid_background_color_header_box'];
            $menu_area_grid_background_transparency = 1;

            $menu_area_grid_header_box_styles['background-color'] = industrialist_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        if (industrialist_mikado_options()->getOptionValue('menu_area_border_header_box') == 'yes' &&
            industrialist_mikado_options()->getOptionValue('menu_area_border_header_box_color') !== ''
        ) {

            $menu_area_grid_header_box_styles['border-bottom'] = '1px solid ' . industrialist_mikado_options()->getOptionValue('menu_area_border_header_box_color');
        }

        if (industrialist_mikado_options()->getOptionValue('menu_area_border_box_header_box') !== '') {

            $menu_area_grid_header_box_styles['border-radius'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_area_border_box_header_box'));

        }

        echo industrialist_mikado_dynamic_css('.mkd-header-box .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers', $menu_area_grid_header_box_styles);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_header_box_menu_area_styles');
}


if (!function_exists('industrialist_mikado_vertical_menu_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function industrialist_mikado_vertical_menu_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.mkd-header-vertical .mkd-vertical-area-background'
        );

        if (industrialist_mikado_options()->getOptionValue('vertical_header_background_color') !== '') {
            $vertical_header_styles['background-color'] = industrialist_mikado_options()->getOptionValue('vertical_header_background_color');
        }

        if (industrialist_mikado_options()->getOptionValue('vertical_header_background_image') !== '') {
            $vertical_header_styles['background-image'] = 'url(' . industrialist_mikado_options()->getOptionValue('vertical_header_background_image') . ')';
        }


        echo industrialist_mikado_dynamic_css($vertical_header_selectors, $vertical_header_styles);


        if (industrialist_mikado_options()->getOptionValue('top_bar') === 'yes') {
            $vertical_header_padding_top = array();

            $vertical_header_padding_top_selectors = array(
                '.mkd-header-vertical .mkd-vertical-menu-area'
            );

            $vertical_header_padding_top['padding-top'] = (industrialist_mikado_options()->getOptionValue('top_bar_height') !== '') ? (industrialist_mikado_options()->getOptionValue('top_bar_height') + 35) . 'px' : '72px';
            echo industrialist_mikado_dynamic_css($vertical_header_padding_top_selectors, $vertical_header_padding_top);
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_vertical_menu_styles');
}

if (!function_exists('industrialist_mikado_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function industrialist_mikado_sticky_header_styles() {

        if (industrialist_mikado_options()->getOptionValue('sticky_header_in_grid') == 'yes' && industrialist_mikado_options()->getOptionValue('sticky_header_grid_background_color') !== '') {
            $sticky_header_grid_background_color = industrialist_mikado_options()->getOptionValue('sticky_header_grid_background_color');
            $sticky_header_grid_background_transparency = 1;

            if (industrialist_mikado_options()->getOptionValue('sticky_header_grid_transparency') !== '') {
                $sticky_header_grid_background_transparency = industrialist_mikado_options()->getOptionValue('sticky_header_grid_transparency');
            }

            echo industrialist_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header .mkd-grid .mkd-vertical-align-containers', array('background-color' => industrialist_mikado_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if (industrialist_mikado_options()->getOptionValue('sticky_header_background_color') !== '') {

            $sticky_header_background_color = industrialist_mikado_options()->getOptionValue('sticky_header_background_color');
            $sticky_header_background_color_transparency = 1;

            if (industrialist_mikado_options()->getOptionValue('sticky_header_transparency') !== '') {
                $sticky_header_background_color_transparency = industrialist_mikado_options()->getOptionValue('sticky_header_transparency');
            }

            echo industrialist_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header .mkd-sticky-holder', array('background-color' => industrialist_mikado_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if (industrialist_mikado_options()->getOptionValue('sticky_header_height') !== '') {
            $max_height = intval(industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sticky_header_height')) * 0.9) . 'px';

            echo industrialist_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header', array('height' => industrialist_mikado_options()->getOptionValue('sticky_header_height') . 'px'));
            echo industrialist_mikado_dynamic_css('.mkd-page-header .mkd-sticky-header .mkd-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if (industrialist_mikado_options()->getOptionValue('sticky_color') !== '') {
            $sticky_menu_item_styles['color'] = industrialist_mikado_options()->getOptionValue('sticky_color');
        }
        if (industrialist_mikado_options()->getOptionValue('sticky_google_fonts') !== '-1') {
            $sticky_menu_item_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('sticky_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('sticky_fontsize') !== '') {
            $sticky_menu_item_styles['font-size'] = industrialist_mikado_options()->getOptionValue('sticky_fontsize') . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('sticky_lineheight') !== '') {
            $sticky_menu_item_styles['line-height'] = industrialist_mikado_options()->getOptionValue('sticky_lineheight') . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('sticky_texttransform') !== '') {
            $sticky_menu_item_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('sticky_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('sticky_fontstyle') !== '') {
            $sticky_menu_item_styles['font-style'] = industrialist_mikado_options()->getOptionValue('sticky_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('sticky_fontweight') !== '') {
            $sticky_menu_item_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('sticky_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('sticky_letterspacing') !== '') {
            $sticky_menu_item_styles['letter-spacing'] = industrialist_mikado_options()->getOptionValue('sticky_letterspacing') . 'px';
        }

        $sticky_menu_item_selector = array('.mkd-page-header .mkd-sticky-header .mkd-main-menu > ul > li > a', '.mkd-page-header .mkd-sticky-header .mkd-main-menu > ul > li.mkd-active-item > a', '.mkd-page-header .mkd-sticky-header .mkd-main-menu > ul > li:hover > a',);

        $sticky_header_header_buttons_selsectors = array('.mkd-page-header .mkd-sticky-header .mkd-side-menu-button-opener', '.mkd-page-header .mkd-sticky-header .mkd-search-opener', '.mkd-page-header .mkd-sticky-header .mkd-side-menu-button-opener:hover', '.mkd-page-header .mkd-sticky-header .mkd-search-opener:hover');

        echo industrialist_mikado_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);
        if (industrialist_mikado_options()->getOptionValue('sticky_color') !== '') {
            echo industrialist_mikado_dynamic_css($sticky_header_header_buttons_selsectors, array('color' => $sticky_menu_item_styles['color']));
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_sticky_header_styles');
}

if (!function_exists('industrialist_mikado_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function industrialist_mikado_fixed_header_styles() {

        if (industrialist_mikado_options()->getOptionValue('fixed_header_grid_background_color') !== '') {

            $fixed_header_grid_background_color = industrialist_mikado_options()->getOptionValue('fixed_header_grid_background_color');
            $fixed_header_grid_background_color_transparency = 1;

            if (industrialist_mikado_options()->getOptionValue('fixed_header_grid_transparency') !== '') {
                $fixed_header_grid_background_color_transparency = industrialist_mikado_options()->getOptionValue('fixed_header_grid_transparency');
            }

            echo industrialist_mikado_dynamic_css('.mkd-fixed-wrapper.fixed .mkd-grid .mkd-vertical-align-containers',
                array('background-color' => industrialist_mikado_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if (industrialist_mikado_options()->getOptionValue('fixed_header_background_color') !== '') {

            $fixed_header_background_color = industrialist_mikado_options()->getOptionValue('fixed_header_background_color');
            $fixed_header_background_color_transparency = 1;

            if (industrialist_mikado_options()->getOptionValue('fixed_header_transparency') !== '') {
                $fixed_header_background_color_transparency = industrialist_mikado_options()->getOptionValue('fixed_header_transparency');
            }

            echo industrialist_mikado_dynamic_css('.mkd-fixed-wrapper.fixed .mkd-menu-area',
                array('background-color' => industrialist_mikado_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_fixed_header_styles');
}

if (!function_exists('industrialist_mikado_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function industrialist_mikado_main_menu_styles() {
        global $industrialist_options;

        $main_menu_styles_array = array();

        if (industrialist_mikado_options()->getOptionValue('menu_color') !== '') {
            $main_menu_styles_array['color'] = industrialist_mikado_options()->getOptionValue('menu_color');
        }
        if (industrialist_mikado_options()->getOptionValue('menu_google_fonts') !== '-1') {
            $main_menu_styles_array['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('menu_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('menu_fontsize') !== '') {
            $main_menu_styles_array['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('menu_fontstyle') !== '') {
            $main_menu_styles_array['font-style'] = industrialist_mikado_options()->getOptionValue('menu_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('menu_fontweight') !== '') {
            $main_menu_styles_array['font-weight'] = industrialist_mikado_options()->getOptionValue('menu_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('menu_texttransform') !== '') {
            $main_menu_styles_array['text-transform'] = industrialist_mikado_options()->getOptionValue('menu_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('menu_letterspacing') !== '') {
            $main_menu_styles_array['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_letterspacing')) . 'px';
        }

        echo industrialist_mikado_dynamic_css('
            .mkd-main-menu.mkd-default-nav > ul > li > a,
            .mkd-page-header #lang_sel > ul > li > a,
            .mkd-page-header #lang_sel_click > ul > li > a,
            .mkd-page-header #lang_sel ul > li:hover > a', $main_menu_styles_array);

        if (industrialist_mikado_options()->getOptionValue('menu_google_fonts') !== '-1') {
            echo industrialist_mikado_dynamic_css('.mkd-page-header #lang_sel_list', array(
                'font-family' => industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('')) . 'sans-serif !important'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('menu_hovercolor') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
            .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a,
            body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
            body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a,
            .mkd-page-header #lang_sel ul li a:hover,
            .mkd-page-header #lang_sel_click > ul > li a:hover', array(
                'color' => industrialist_mikado_options()->getOptionValue('menu_hovercolor')
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('menu_activecolor') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a,
			body:not(.mkd-menu-item-first-level-bg-color) .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a', array(
                'color' => industrialist_mikado_options()->getOptionValue('menu_activecolor')
            ));

        }


        if (industrialist_mikado_options()->getOptionValue('menu_text_background_color') !== '') {

            $menu_item_style_array = array();
            if (industrialist_mikado_options()->getOptionValue('menu_text_background_color') !== '') {
                $menu_item_style_array['background-color'] = industrialist_mikado_options()->getOptionValue('menu_text_background_color');
            }

            echo industrialist_mikado_dynamic_css('
            .mkd-main-menu.mkd-default-nav > ul > li > a,
            .mkd-page-header #lang_sel .lang_sel_sel,
            .mkd-top-bar #lang_sel .lang_sel_sel', $menu_item_style_array);

        }

        if (industrialist_mikado_options()->getOptionValue('menu_hover_background_color') !== '') {
            $menu_hover_background_color = industrialist_mikado_options()->getOptionValue('menu_hover_background_color');
            $menu_hover_background_color_rgb = 1;
            if (industrialist_mikado_options()->getOptionValue('menu_hover_background_color_transparency') !== '') {
                $menu_hover_background_color_rgb = industrialist_mikado_options()->getOptionValue('menu_hover_background_color_transparency');
            }
            $menu_hover_background_color = industrialist_mikado_rgba_color($menu_hover_background_color, $menu_hover_background_color_rgb);

            echo industrialist_mikado_dynamic_css('
            .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
            .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a,
            .mkd-page-header #lang_sel li:hover .lang_sel_sel', array(
                'background-color' => $menu_hover_background_color
            ));


        }

        if (industrialist_mikado_options()->getOptionValue('menu_active_background_color') !== '') {
            $menu_active_background_color = industrialist_mikado_options()->getOptionValue('menu_active_background_color');
            $menu_active_background_color_rgb = 1;
            if (industrialist_mikado_options()->getOptionValue('menu_active_background_color_transparency') !== '') {
                $menu_active_background_color_rgb = industrialist_mikado_options()->getOptionValue('menu_active_background_color_transparency');
            }
            $menu_active_background_color = industrialist_mikado_rgba_color($menu_active_background_color, $menu_active_background_color_rgb);

            echo industrialist_mikado_dynamic_css('
            .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a', array(
                'background-color' => $menu_active_background_color
            ));


        }

        if (industrialist_mikado_options()->getOptionValue('menu_light_hovercolor') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-light-header .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
			.mkd-light-header .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a
			', array(
                'color' => industrialist_mikado_options()->getOptionValue('menu_light_hovercolor') . '!important'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('menu_light_activecolor') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-light-header .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a
            ', array(
                'color' => industrialist_mikado_options()->getOptionValue('menu_light_activecolor') . '!important'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('menu_dark_hovercolor') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-dark-header .mkd-main-menu.mkd-default-nav > ul > li:hover > a,
			.mkd-dark-header .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item:hover > a
			', array(
                'color' => industrialist_mikado_options()->getOptionValue('menu_dark_hovercolor') . '!important'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('menu_dark_activecolor') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-dark-header .mkd-main-menu.mkd-default-nav > ul > li.mkd-active-item > a
            ', array(
                'color' => industrialist_mikado_options()->getOptionValue('menu_dark_activecolor') . '!important'
            ));

        }


        if (industrialist_mikado_options()->getOptionValue('menu_lineheight') !== '' || industrialist_mikado_options()->getOptionValue('menu_padding_left_right') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-main-menu.mkd-default-nav > ul > li > a span.item_inner', array(
                'line-height' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_lineheight')) . 'px',
                'padding' => '0 ' . industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_padding_left_right')) . 'px'
            ));
        }

        if (industrialist_mikado_options()->getOptionValue('menu_margin_left_right') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-main-menu.mkd-default-nav > ul > li', array(
                'margin' => '0 ' . industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_margin_left_right')) . 'px'
            ));
        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_background_color') !== '') {

            $dropdown_styles = array();

            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color = industrialist_mikado_options()->getOptionValue('dropdown_background_color') !== "" ? industrialist_mikado_options()->getOptionValue('dropdown_background_color') : '';
            $dropdown_bg_transparency = industrialist_mikado_options()->getOptionValue('dropdown_background_transparency') !== "" ? industrialist_mikado_options()->getOptionValue('dropdown_background_transparency') : $dropdown_bg_transparency_initial;

            $dropdown_styles['background-color'] = industrialist_mikado_rgba_color($dropdown_bg_color, $dropdown_bg_transparency);

            if (industrialist_mikado_options()->getOptionValue('dropdown_border_color') !== '') {
                $dropdown_styles['border-color'] = industrialist_mikado_options()->getOptionValue('dropdown_border_color');
            } else {
                $dropdown_styles['border-color'] = $dropdown_styles['background-color'];
            }

            $dropdown_selector = array(
                '.mkd-full-width-wide-menu .mkd-drop-down .wide .second',
                '.mkd-drop-down .second .inner > ul',
                '.mkd-drop-down .second .inner ul li ul',
                '.mkd-drop-down li.narrow .second .inner ul',
                '.shopping_cart_dropdown',
                '.mkd-page-header #lang_sel ul ul',
                '.mkd-top-bar #lang_sel ul ul',
                '.mkd-drop-down .wide.wide_background .second',
                '.mkd-drop-down > ul > li.narrow > .second > .inner > ul',
                '.mkd-drop-down > ul > li.wide > .second > .inner > ul'
            );

            echo industrialist_mikado_dynamic_css($dropdown_selector, $dropdown_styles);

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_top_padding') !== '') {

            echo industrialist_mikado_dynamic_css('
                .mkd-drop-down .second .inner > ul, 
                .mkd-drop-down li.narrow .second .inner ul
				', array(
                'padding-top' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_top_padding')) . 'px'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_bottom_padding') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .second .inner > ul, 
            .mkd-drop-down li.narrow .second .inner ul', array(
                'padding-bottom' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_bottom_padding')) . 'px'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_top_position') !== '') {

            echo industrialist_mikado_dynamic_css('
            header .mkd-drop-down .second
            ', array(
                'top' => industrialist_mikado_options()->getOptionValue('dropdown_top_position') . '%'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_background_color_secondlvl') !== '') {

            $dropdown_styles = array();

            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color = industrialist_mikado_options()->getOptionValue('dropdown_background_color_secondlvl') !== "" ? industrialist_mikado_options()->getOptionValue('dropdown_background_color_secondlvl') : '';
            $dropdown_bg_transparency = industrialist_mikado_options()->getOptionValue('dropdown_background_transparency_secondlvl') !== "" ? industrialist_mikado_options()->getOptionValue('dropdown_background_transparency_secondlvl') : $dropdown_bg_transparency_initial;

            $dropdown_styles['background-color'] = industrialist_mikado_rgba_color($dropdown_bg_color, $dropdown_bg_transparency);

            if (industrialist_mikado_options()->getOptionValue('dropdown_border_color_secondlvl') !== '') {
                $dropdown_styles['border-color'] = industrialist_mikado_options()->getOptionValue('dropdown_border_color_secondlvl');
            } else {
                $dropdown_styles['border-color'] = $dropdown_styles['background-color'];
            }

            $dropdown_selector = array(
                '.mkd-drop-down > ul > li.narrow > .second > .inner > ul'
            );

            echo industrialist_mikado_dynamic_css($dropdown_selector, $dropdown_styles);

        }


        $dropdown_styles_array = array();

        if (industrialist_mikado_options()->getOptionValue('dropdown_color') !== '') {
            $dropdown_styles_array['color'] = industrialist_mikado_options()->getOptionValue('dropdown_color');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_google_fonts') !== '-1') {
            $dropdown_styles_array['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('dropdown_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_fontsize') !== '') {
            $dropdown_styles_array['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_lineheight') !== '') {
            $dropdown_styles_array['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_fontstyle') !== '') {
            $dropdown_styles_array['font-style'] = industrialist_mikado_options()->getOptionValue('dropdown_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_fontweight') !== '') {
            $dropdown_styles_array['font-weight'] = industrialist_mikado_options()->getOptionValue('dropdown_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_texttransform') !== '') {
            $dropdown_styles_array['text-transform'] = industrialist_mikado_options()->getOptionValue('dropdown_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_letterspacing') !== '') {
            $dropdown_styles_array['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_letterspacing'));
        }

        echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .second .inner > ul > li > a,
			.mkd-drop-down .second .inner > ul > li > h4,
			.mkd-drop-down .wide .second .inner > ul > li > h4,
			.mkd-drop-down .wide .second .inner > ul > li > a,
			.mkd-drop-down .wide .second ul li ul li.menu-item-has-children > a,
			.mkd-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children > a,
			.mkd-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4 a,
			.mkd-drop-down .wide .second .inner > ul li .flexslider ul li  h4 a,
			.mkd-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4,
			.mkd-drop-down .wide .second .inner > ul li .flexslider ul li  h4,
			.mkd-main-menu.mkd-default-nav #lang_sel ul li li a,
			.mkd-main-menu.mkd-default-nav #lang_sel_click ul li ul li a,
			.mkd-main-menu.mkd-default-nav #lang_sel ul ul a,
			.mkd-main-menu.mkd-default-nav #lang_sel_click ul ul a', $dropdown_styles_array);

        if (industrialist_mikado_options()->getOptionValue('dropdown_color') !== '') {

            echo industrialist_mikado_dynamic_css('
            .shopping_cart_dropdown ul li
			.item_info_holder .item_left a,
			.shopping_cart_dropdown ul li .item_info_holder .item_right .amount,
			.shopping_cart_dropdown .cart_bottom .subtotal_holder .total,
			.shopping_cart_dropdown .cart_bottom .subtotal_holder .total_amount
			', array(
                'color' => industrialist_mikado_options()->getOptionValue('dropdown_color')
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_hovercolor') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .second .inner > ul > li:hover > a,
			.mkd-drop-down .wide .second ul li ul li.menu-item-has-children:hover > a,
			.mkd-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children:hover > a,
			.mkd-main-menu.mkd-default-nav #lang_sel ul li li:hover a,
			.mkd-main-menu.mkd-default-nav #lang_sel_click ul li ul li:hover a,
			.mkd-main-menu.mkd-default-nav #lang_sel ul li:hover > a,
			.mkd-main-menu.mkd-default-nav #lang_sel_click ul li:hover > a,
			.mkd-drop-down .second .inner > ul > li.current-menu-item > a
			', array(
                'color' => industrialist_mikado_options()->getOptionValue('dropdown_hovercolor') . '!important'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_background_hovercolor') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down li:not(.wide) .second .inner > ul > li:hover > a
            ', array(
                'background-color' => industrialist_mikado_options()->getOptionValue('dropdown_background_hovercolor')
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_padding_top_bottom') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .wide .second>.inner>ul>li.sub>ul>li>a,
			.mkd-drop-down .second .inner ul li a,
			.mkd-drop-down .wide .second ul li a,
			.mkd-drop-down .second .inner ul.right li a
			', array(
                'padding-top' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_padding_top_bottom')),
                'padding-bottom' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_padding_top_bottom'))
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_background_color_wide_secondlvl') !== '') {

            $dropdown_styles = array();

            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color = industrialist_mikado_options()->getOptionValue('dropdown_background_color_wide_secondlvl') !== "" ? industrialist_mikado_options()->getOptionValue('dropdown_background_color_wide_secondlvl') : '';
            $dropdown_bg_transparency = industrialist_mikado_options()->getOptionValue('dropdown_background_transparency_wide_secondlvl') !== "" ? industrialist_mikado_options()->getOptionValue('dropdown_background_transparency_wide_secondlvl') : $dropdown_bg_transparency_initial;

            $dropdown_styles['background-color'] = industrialist_mikado_rgba_color($dropdown_bg_color, $dropdown_bg_transparency);

            if (industrialist_mikado_options()->getOptionValue('dropdown_border_color_wide_secondlvl') !== '') {
                $dropdown_styles['border-color'] = industrialist_mikado_options()->getOptionValue('dropdown_border_color_wide_secondlvl');
            } else {
                $dropdown_styles['border-color'] = $dropdown_styles['background-color'];
            }

            $dropdown_selector = array('
                .mkd-drop-down > ul > li.wide > .second > .inner > ul,
                .mkd-full-width-wide-menu .mkd-drop-down .wide .second'
            );

            echo industrialist_mikado_dynamic_css($dropdown_selector, $dropdown_styles);

        }

        $dropdown_wide_styles = array();
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_color') !== '') {
            $dropdown_wide_styles['color'] = industrialist_mikado_options()->getOptionValue('dropdown_wide_color');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_google_fonts') !== '-1') {
            $dropdown_wide_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('dropdown_wide_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_fontsize') !== '') {
            $dropdown_wide_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_wide_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_lineheight') !== '') {
            $dropdown_wide_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_wide_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_fontstyle') !== '') {
            $dropdown_wide_styles['font-style'] = industrialist_mikado_options()->getOptionValue('dropdown_wide_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_fontweight') !== '') {
            $dropdown_wide_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('dropdown_wide_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_texttransform') !== '') {
            $dropdown_wide_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('dropdown_wide_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_letterspacing') !== '') {
            $dropdown_wide_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_wide_letterspacing')) . 'px';
        }

        echo industrialist_mikado_dynamic_css('.mkd-drop-down .wide .second .inner > ul > li > a', $dropdown_wide_styles);


        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_hovercolor') !== '') {

            echo industrialist_mikado_dynamic_css('.mkd-drop-down .wide .second .inner > ul > li:hover > a', array(
                'color' => industrialist_mikado_options()->getOptionValue('dropdown_wide_hovercolor') . '!important'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_background_hovercolor') !== '') {

            echo industrialist_mikado_dynamic_css('.mkd-drop-down .wide .second .inner > ul > li:hover > a', array(
                'background-color' => industrialist_mikado_options()->getOptionValue('dropdown_wide_background_hovercolor')
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_padding_top_bottom') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .wide .second>.inner > ul > li.sub > ul > li > a,
			.mkd-drop-down .wide .second .inner ul li a,
			.mkd-drop-down .wide .second ul li a,
			.mkd-drop-down .wide .second .inner ul.right li a', array(
                'padding-top' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_wide_padding_top_bottom')) . 'px',
                'padding-bottom' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_wide_padding_top_bottom')) . 'px'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_background_color_thirdlvl') !== '') {

            $dropdown_styles = array();

            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color = industrialist_mikado_options()->getOptionValue('dropdown_background_color_thirdlvl') !== "" ? industrialist_mikado_options()->getOptionValue('dropdown_background_color_thirdlvl') : '';
            $dropdown_bg_transparency = industrialist_mikado_options()->getOptionValue('dropdown_background_transparency_thirdlvl') !== "" ? industrialist_mikado_options()->getOptionValue('dropdown_background_transparency_thirdlvl') : $dropdown_bg_transparency_initial;

            $dropdown_styles['background-color'] = industrialist_mikado_rgba_color($dropdown_bg_color, $dropdown_bg_transparency);

            if (industrialist_mikado_options()->getOptionValue('dropdown_border_color_thirdlvl') !== '') {
                $dropdown_styles['border-color'] = industrialist_mikado_options()->getOptionValue('dropdown_border_color_thirdlvl');
            } else {
                $dropdown_styles['border-color'] = $dropdown_styles['background-color'];
            }

            $dropdown_selector = array(
                '.mkd-drop-down .second .inner ul li.sub ul',
                '.mkd-drop-down .second .inner ul li ul'
            );

            echo industrialist_mikado_dynamic_css($dropdown_selector, $dropdown_styles);

        }

        $dropdown_thirdlvl_styles = array();
        if (industrialist_mikado_options()->getOptionValue('dropdown_color_thirdlvl') !== '') {
            $dropdown_thirdlvl_styles['color'] = industrialist_mikado_options()->getOptionValue('dropdown_color_thirdlvl');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_google_fonts_thirdlvl') !== '-1') {
            $dropdown_thirdlvl_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('dropdown_google_fonts_thirdlvl'));
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_fontsize_thirdlvl') !== '') {
            $dropdown_thirdlvl_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_fontsize_thirdlvl')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_lineheight_thirdlvl') !== '') {
            $dropdown_thirdlvl_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_lineheight_thirdlvl')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_fontstyle_thirdlvl') !== '') {
            $dropdown_thirdlvl_styles['font-style'] = industrialist_mikado_options()->getOptionValue('dropdown_fontstyle_thirdlvl');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_fontweight_thirdlvl') !== '') {
            $dropdown_thirdlvl_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('dropdown_fontweight_thirdlvl');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_texttransform_thirdlvl') !== '') {
            $dropdown_thirdlvl_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('dropdown_texttransform_thirdlvl');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_letterspacing_thirdlvl') !== '') {
            $dropdown_thirdlvl_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_letterspacing_thirdlvl')) . 'px';
        }

        echo industrialist_mikado_dynamic_css('.mkd-drop-down .second .inner ul li.sub ul li a', $dropdown_thirdlvl_styles);

        if (industrialist_mikado_options()->getOptionValue('dropdown_hovercolor_thirdlvl') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .second .inner ul li.sub ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next),
            .mkd-drop-down .second .inner ul li ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next),
            .mkd-drop-down .second .inner ul li.sub ul li.current-menu-item a,
            .mkd-drop-down .second .inner ul li ul li.current-menu-item a
			', array(
                'color' => industrialist_mikado_options()->getOptionValue('dropdown_hovercolor_thirdlvl') . '!important'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_background_hovercolor_thirdlvl') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .second .inner ul li.sub ul li:hover a,
			.mkd-drop-down .second .inner ul li ul li:hover a,
			.mkd-drop-down .second .inner ul li.sub ul li.current-menu-item a,
			.mkd-drop-down .second .inner ul li ul li.current-menu-item a
			', array(
                'background-color' => industrialist_mikado_options()->getOptionValue('dropdown_background_hovercolor_thirdlvl')
            ));

        }


        if (industrialist_mikado_options()->getOptionValue('dropdown_border_color_wide_thirdlvl') !== '') {

            $dropdown_separator_styles = array();

            $dropdown_separator_styles['border-color'] = industrialist_mikado_options()->getOptionValue('dropdown_border_color_wide_thirdlvl');

            $dropdown_separator_selector = array(
                '.mkd-drop-down .wide .second ul li'
            );

            echo industrialist_mikado_dynamic_css($dropdown_separator_selector, $dropdown_separator_styles);

        }

        $dropdown_wide_thirdlvl_styles = array();
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_color_thirdlvl') !== '') {
            $dropdown_wide_thirdlvl_styles['color'] = industrialist_mikado_options()->getOptionValue('dropdown_wide_color_thirdlvl');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_google_fonts_thirdlvl') !== '-1') {
            $dropdown_wide_thirdlvl_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('dropdown_wide_google_fonts_thirdlvl'));
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_fontsize_thirdlvl') !== '') {
            $dropdown_wide_thirdlvl_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_wide_fontsize_thirdlvl')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_lineheight_thirdlvl') !== '') {
            $dropdown_wide_thirdlvl_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_wide_lineheight_thirdlvl')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_fontstyle_thirdlvl') !== '') {
            $dropdown_wide_thirdlvl_styles['font-style'] = industrialist_mikado_options()->getOptionValue('dropdown_wide_fontstyle_thirdlvl');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_fontweight_thirdlvl') !== '') {
            $dropdown_wide_thirdlvl_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('dropdown_wide_fontweight_thirdlvl');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_texttransform_thirdlvl') !== '') {
            $dropdown_wide_thirdlvl_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('dropdown_wide_texttransform_thirdlvl');
        }
        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_letterspacing_thirdlvl') !== '') {
            $dropdown_wide_thirdlvl_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('dropdown_wide_letterspacing_thirdlvl')) . 'px';
        }

        echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .wide .second .inner ul li.sub ul li a,
			.mkd-drop-down .wide .second ul li ul li a
			', $dropdown_wide_thirdlvl_styles);

        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_hovercolor_thirdlvl') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .wide .second .inner ul li.sub ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover,
			.mkd-drop-down .wide .second .inner ul li ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover,
			.mkd-drop-down .wide .second .inner ul li.sub ul li.current-menu-item a,
            .mkd-drop-down .wide .second ul li ul li.current-menu-item a
			', array(
                'color' => industrialist_mikado_options()->getOptionValue('dropdown_wide_hovercolor_thirdlvl') . '!important'
            ));

        }

        if (industrialist_mikado_options()->getOptionValue('dropdown_wide_background_hovercolor_thirdlvl') !== '') {

            echo industrialist_mikado_dynamic_css('
            .mkd-drop-down .wide .second .inner ul li.sub ul li:hover a,
			.mkd-drop-down .wide .second .inner ul li ul li:hover a,
			.mkd-drop-down .wide .second .inner ul li.sub ul li.current-menu-item a,
            .mkd-drop-down .wide .second ul li ul li.current-menu-item a
			', array(
                'background-color' => industrialist_mikado_options()->getOptionValue('dropdown_wide_background_hovercolor_thirdlvl')
            ));

        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_main_menu_styles');
}

if (!function_exists('industrialist_mikado_vertical_main_menu_styles')) {
    /**
     * Generates styles for vertical main main menu
     */
    function industrialist_mikado_vertical_main_menu_styles() {
        $dropdown_styles = array();

        if (industrialist_mikado_options()->getOptionValue('vertical_dropdown_background_color') !== '' || industrialist_mikado_options()->getOptionValue('vertical_dropdown_transparency') !== '') {

            //dropdown background and transparency styles
            $dropdown_bg_color_initial = '#fff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color = industrialist_mikado_options()->getOptionValue('vertical_dropdown_background_color') !== "" ? industrialist_mikado_options()->getOptionValue('vertical_dropdown_background_color') : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = industrialist_mikado_options()->getOptionValue('vertical_dropdown_transparency') !== "" ? industrialist_mikado_options()->getOptionValue('vertical_dropdown_transparency') : $dropdown_bg_transparency_initial;

            $dropdown_bg_color_rgb = industrialist_mikado_hex2rgb($dropdown_bg_color);

            $dropdown_styles['background-color'] = 'rgba(' . $dropdown_bg_color_rgb[0] . ',' . $dropdown_bg_color_rgb[1] . ',' . $dropdown_bg_color_rgb[2] . ',' . $dropdown_bg_transparency . ')';

        }

        if (industrialist_mikado_options()->getOptionValue('vertical_dropdown_border_color') !== '') {
            $dropdown_styles['border-color'] = industrialist_mikado_options()->getOptionValue('vertical_dropdown_border_color');
        }

        $dropdown_selector = array(
            '.mkd-header-vertical .mkd-vertical-dropdown-float .menu-item .second',
            '.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner ul ul'
        );

        echo industrialist_mikado_dynamic_css($dropdown_selector, $dropdown_styles);


        $main_menu_styles = array();

        if (industrialist_mikado_options()->getOptionValue('vertical_header_align') !== '') {
            $main_menu_styles['text-align'] = industrialist_mikado_options()->getOptionValue('vertical_header_align');
        }

        $main_menu_selector = array(
            '.mkd-header-vertical .mkd-header-vertical .mkd-vertical-menu-area-inner'
        );

        echo industrialist_mikado_dynamic_css($main_menu_selector, $main_menu_styles);

        $main_menu_items_styles = array();

        if (industrialist_mikado_options()->getOptionValue('vertical_dropdown_border_bottom') == 'yes' &&
            industrialist_mikado_options()->getOptionValue('vertical_dropdown_border_bottom_color') !== ''
        ) {

            $main_menu_items_styles['border-bottom'] = '1px solid ' . industrialist_mikado_options()->getOptionValue('vertical_dropdown_border_bottom_color');
        }

        $main_menu_items_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu > ul > li:not(:last-child)'
        );

        echo industrialist_mikado_dynamic_css($main_menu_items_selector, $main_menu_items_styles);

        $fist_level_styles = array();
        $fist_level_hover_styles = array();

        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_color') !== '') {
            $fist_level_styles['color'] = industrialist_mikado_options()->getOptionValue('vertical_menu_1st_color');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_google_fonts') !== '-1') {
            $fist_level_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('vertical_menu_1st_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_fontsize') !== '') {
            $fist_level_styles['font-size'] = industrialist_mikado_options()->getOptionValue('vertical_menu_1st_fontsize') . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_lineheight') !== '') {
            $fist_level_styles['line-height'] = industrialist_mikado_options()->getOptionValue('vertical_menu_1st_lineheight') . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_texttransform') !== '') {
            $fist_level_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('vertical_menu_1st_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_fontstyle') !== '') {
            $fist_level_styles['font-style'] = industrialist_mikado_options()->getOptionValue('vertical_menu_1st_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_fontweight') !== '') {
            $fist_level_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('vertical_menu_1st_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_letter_spacing') !== '') {
            $fist_level_styles['letter-spacing'] = industrialist_mikado_options()->getOptionValue('vertical_menu_1st_letter_spacing') . 'px';
        }

        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_hover_color') !== '') {
            $fist_level_hover_styles['color'] = industrialist_mikado_options()->getOptionValue('vertical_menu_1st_hover_color');
        }

        $first_level_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu > ul > li > a'
        );
        $first_level_hover_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu > ul > li:hover > a',
            '.mkd-header-vertical .mkd-vertical-menu > ul > li > a.mkd-active-item'
        );

        echo industrialist_mikado_dynamic_css($first_level_selector, $fist_level_styles);
        echo industrialist_mikado_dynamic_css($first_level_hover_selector, $fist_level_hover_styles);
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_1st_hover_background_color') !== '') {

            $rgba = industrialist_mikado_hex2rgb(industrialist_mikado_options()->getOptionValue('vertical_menu_1st_hover_background_color'));
            echo industrialist_mikado_dynamic_css('.mkd-header-vertical .mkd-vertical-menu > ul > li:hover', array('background-color' => 'rgba(' . $rgba[0] . ',' . $rgba[1] . ',' . $rgba[2] . ',0.07)'));
        }

        $second_level_styles = array();
        $second_level_hover_styles = array();

        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_color') !== '') {
            $second_level_styles['color'] = industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_color');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_google_fonts') !== '-1') {
            $second_level_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_fontsize') !== '') {
            $second_level_styles['font-size'] = industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_fontsize') . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_lineheight') !== '') {
            $second_level_styles['line-height'] = industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_lineheight') . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_texttransform') !== '') {
            $second_level_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_fontstyle') !== '') {
            $second_level_styles['font-style'] = industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_fontweight') !== '') {
            $second_level_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_letter_spacing') !== '') {
            $second_level_styles['letter-spacing'] = industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_letter_spacing') . 'px';
        }

        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_hover_color') !== '') {
            $second_level_hover_styles['color'] = industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_hover_color');
        }

        $second_level_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu .second .inner > ul > li > a'
        );

        $second_level_hover_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu .second .inner > ul > li:hover > a',
            '.mkd-header-vertical .mkd-vertical-menu .second .inner > ul > li > a.mkd-active-item'
        );

        echo industrialist_mikado_dynamic_css($second_level_selector, $second_level_styles);
        echo industrialist_mikado_dynamic_css($second_level_hover_selector, $second_level_hover_styles);
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_hover_background_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner > ul > li:hover', array('background-color' => industrialist_mikado_options()->getOptionValue('vertical_menu_2nd_hover_background_color')));
        }

        $third_level_styles = array();
        $third_level_hover_styles = array();

        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_color') !== '') {
            $third_level_styles['color'] = industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_color');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_google_fonts') !== '-1') {
            $third_level_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_fontsize') !== '') {
            $third_level_styles['font-size'] = industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_fontsize') . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_lineheight') !== '') {
            $third_level_styles['line-height'] = industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_lineheight') . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_texttransform') !== '') {
            $third_level_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_fontstyle') !== '') {
            $third_level_styles['font-style'] = industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_fontweight') !== '') {
            $third_level_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_letter_spacing') !== '') {
            $third_level_styles['letter-spacing'] = industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_letter_spacing') . 'px';
        }

        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_hover_color') !== '') {
            $third_level_hover_styles['color'] = industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_hover_color');
        }

        $third_level_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu .second .inner ul li ul li a'
        );

        $third_level_hover_selector = array(
            '.mkd-header-vertical .mkd-vertical-menu .second .inner ul li ul li:hover a',
            '.mkd-header-vertical .mkd-vertical-menu .second .inner ul li ul li a.mkd-active-item'
        );

        echo industrialist_mikado_dynamic_css($third_level_selector, $third_level_styles);
        echo industrialist_mikado_dynamic_css($third_level_hover_selector, $third_level_hover_styles);
        if (industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_hover_background_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner ul li.sub ul li:hover', array('background-color' => industrialist_mikado_options()->getOptionValue('vertical_menu_3rd_hover_background_color')));
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_vertical_main_menu_styles');
}


