<?php

if (!function_exists('industrialist_mikado_search_opener_icon_size')) {

    function industrialist_mikado_search_opener_icon_size() {

        if(industrialist_mikado_options()->getOptionValue('header_search_icon_size')) {
            echo industrialist_mikado_dynamic_css('.mkd-search-opener > *:not(.mkd-search-icon-text)', array(
                'font-size' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('header_search_icon_size')).'px!important'
            ));
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_opener_icon_size');

}

if (!function_exists('industrialist_mikado_search_opener_icon_colors')) {

    function industrialist_mikado_search_opener_icon_colors() {

        if (industrialist_mikado_options()->getOptionValue('header_search_icon_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-page-header .mkd-search-opener', array(
                'color' => industrialist_mikado_options()->getOptionValue('header_search_icon_color')
            ));
        }

        if (industrialist_mikado_options()->getOptionValue('header_search_icon_hover_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-page-header .mkd-search-opener:hover', array(
                'color' => industrialist_mikado_options()->getOptionValue('header_search_icon_hover_color')
            ));
        }

        if (industrialist_mikado_options()->getOptionValue('header_light_search_icon_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-search-opener,
			.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-search-opener,
			.mkd-light-header .mkd-top-bar .mkd-search-opener', array(
                'color' => industrialist_mikado_options()->getOptionValue('header_light_search_icon_color') . ' !important'
            ));
        }

        if (industrialist_mikado_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-search-opener:hover,
			.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-search-opener:hover,
			.mkd-light-header .mkd-top-bar .mkd-search-opener:hover', array(
                'color' => industrialist_mikado_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
            ));
        }

        if (industrialist_mikado_options()->getOptionValue('header_dark_search_icon_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-search-opener,
			.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-search-opener,
			.mkd-dark-header .mkd-top-bar .mkd-search-opener', array(
                'color' => industrialist_mikado_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
            ));
        }
        if (industrialist_mikado_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-search-opener:hover,
			.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-search-opener:hover,
			.mkd-dark-header .mkd-top-bar .mkd-search-opener:hover', array(
                'color' => industrialist_mikado_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
            ));
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_opener_icon_colors');

}

if (!function_exists('industrialist_mikado_search_opener_icon_background_colors')) {

    function industrialist_mikado_search_opener_icon_background_colors() {

        if (industrialist_mikado_options()->getOptionValue('search_icon_background_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-opener', array(
                'background-color' => industrialist_mikado_options()->getOptionValue('search_icon_background_color')
            ));
        }

        if (industrialist_mikado_options()->getOptionValue('search_icon_background_hover_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-opener:hover', array(
                'background-color' => industrialist_mikado_options()->getOptionValue('search_icon_background_hover_color')
            ));
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_opener_icon_background_colors');
}

if (!function_exists('industrialist_mikado_search_opener_text_styles')) {

    function industrialist_mikado_search_opener_text_styles() {
        $text_styles = array();

        if (industrialist_mikado_options()->getOptionValue('search_icon_text_color') !== '') {
            $text_styles['color'] = industrialist_mikado_options()->getOptionValue('search_icon_text_color');
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_text_fontsize') !== '') {
            $text_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_text_lineheight') !== '') {
            $text_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_text_texttransform') !== '') {
            $text_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('search_icon_text_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
            $text_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
            $text_styles['font-style'] = industrialist_mikado_options()->getOptionValue('search_icon_text_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_text_fontweight') !== '') {
            $text_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('search_icon_text_fontweight');
        }

        if (!empty($text_styles)) {
            echo industrialist_mikado_dynamic_css('.mkd-search-icon-text', $text_styles);
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_text_color_hover') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-opener:hover .mkd-search-icon-text', array(
                'color' => industrialist_mikado_options()->getOptionValue('search_icon_text_color_hover')
            ));
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_opener_text_styles');
}

if (!function_exists('industrialist_mikado_search_opener_spacing')) {

    function industrialist_mikado_search_opener_spacing() {
        $spacing_styles = array();

        if (industrialist_mikado_options()->getOptionValue('search_padding_left') !== '') {
            $spacing_styles['padding-left'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_padding_left')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('search_padding_right') !== '') {
            $spacing_styles['padding-right'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_padding_right')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('search_margin_left') !== '') {
            $spacing_styles['margin-left'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_margin_left')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('search_margin_right') !== '') {
            $spacing_styles['margin-right'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_margin_right')) . 'px';
        }

        if (!empty($spacing_styles)) {
            echo industrialist_mikado_dynamic_css('.mkd-search-opener', $spacing_styles);
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_opener_spacing');
}

if (!function_exists('industrialist_mikado_search_bar_background')) {

    function industrialist_mikado_search_bar_background() {

        if (industrialist_mikado_options()->getOptionValue('search_background_color') !== '') {
            echo industrialist_mikado_dynamic_css(' 
            .mkd-search-fade .mkd-fullscreen-search-holder .mkd-fullscreen-search-table, 
            .mkd-fullscreen-search-overlay, .mkd-search-slide-window-top, 
            .mkd-search-slide-window-top input[type="text"],
            .mkd-search-dropdown .mkd-search-dropdown-holder input[type="text"]
            ', array(
                'background-color' => industrialist_mikado_options()->getOptionValue('search_background_color')
            ));
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_bar_background');
}

if (!function_exists('industrialist_mikado_search_text_styles')) {

    function industrialist_mikado_search_text_styles() {
        $text_styles = array();

        if (industrialist_mikado_options()->getOptionValue('search_text_color') !== '') {
            $text_styles['color'] = industrialist_mikado_options()->getOptionValue('search_text_color');
        }
        if (industrialist_mikado_options()->getOptionValue('search_text_fontsize') !== '') {
            $text_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_text_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('search_text_texttransform') !== '') {
            $text_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('search_text_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('search_text_google_fonts') !== '-1') {
            $text_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
        }
        if (industrialist_mikado_options()->getOptionValue('search_text_fontstyle') !== '') {
            $text_styles['font-style'] = industrialist_mikado_options()->getOptionValue('search_text_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('search_text_fontweight') !== '') {
            $text_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('search_text_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('search_text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_text_letterspacing')) . 'px';
        }

        if(!empty($text_styles)) {
            echo industrialist_mikado_dynamic_css('
            .mkd-search-cover input[type="text"], 
            .mkd-fullscreen-search-holder .mkd-form-holder .mkd-search-field, 
            .mkd-search-slide-window-top input[type="text"],
            .mkd-search-dropdown .mkd-search-dropdown-holder input[type="text"]', $text_styles);
        }
        if(industrialist_mikado_options()->getOptionValue('search_text_disabled_color') !== '') {
            echo industrialist_mikado_dynamic_css('
            .mkd-search-cover input[type="text"]::-webkit-input-placeholder, 
            .mkd-search-cover input[type="text"]::-moz-placeholder,
            .mkd-fullscreen-search-holder .mkd-form-holder .mkd-search-field::-webkit-input-placeholder, 
            .mkd-fullscreen-search-holder .mkd-form-holder .mkd-search-field::-moz-placeholder,
            .mkd-search-slide-window-top input[type="text"]::-webkit-input-placeholder, 
            .mkd-search-slide-window-top input[type="text"]::-moz-placeholder,
            .mkd-search-dropdown .mkd-search-dropdown-holder input[type="text"]::-webkit-input-placeholder,
            .mkd-search-dropdown .mkd-search-dropdown-holder input[type="text"]::-moz-placeholder
            '

                , array(
                'color' => industrialist_mikado_options()->getOptionValue('search_text_disabled_color')
            ));
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_text_styles');
}

if(!function_exists('industrialist_mikado_search_fullscreen_styles')) {

    function industrialist_mikado_search_fullscreen_styles() {
        $border_styles = array();

        if(industrialist_mikado_options()->getOptionValue('search_border_color') !== '') {
            $border_styles['border-color'] = industrialist_mikado_options()->getOptionValue('search_border_color');
        }

        if(!empty($border_styles)) {
            echo industrialist_mikado_dynamic_css('.mkd-fullscreen-search-holder .mkd-field-holder', $border_styles);
        }

        $border_styles = array();

        if(industrialist_mikado_options()->getOptionValue('search_border_focus_color') !== '') {
            $border_styles['background-color'] = industrialist_mikado_options()->getOptionValue('search_border_focus_color');
        }

        if(!empty($border_styles)) {
            echo industrialist_mikado_dynamic_css('.mkd-fullscreen-search-holder .mkd-field-holder .mkd-line', $border_styles);
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_fullscreen_styles');
}

if (!function_exists('industrialist_mikado_search_icon_styles')) {

    function industrialist_mikado_search_icon_styles() {

        if (industrialist_mikado_options()->getOptionValue('search_icon_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-slide-window-top i, .mkd-fullscreen-search-holder .mkd-search-submit', array(
                'color' => industrialist_mikado_options()->getOptionValue('search_icon_color')
            ));
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_hover_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-slide-window-top > i:hover, .mkd-fullscreen-search-holder .mkd-search-submit:hover', array(
                'color' => industrialist_mikado_options()->getOptionValue('search_icon_hover_color')
            ));
        }
        if (industrialist_mikado_options()->getOptionValue('search_icon_size') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-slide-window-top > i, .mkd-fullscreen-search-holder .mkd-search-submit', array(
                'font-size' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_icon_size')) . 'px'
            ));
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_icon_styles');
}

if (!function_exists('industrialist_mikado_search_close_icon_styles')) {

    function industrialist_mikado_search_close_icon_styles() {

        if (industrialist_mikado_options()->getOptionValue('search_close_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-slide-window-top .mkd-search-close i, .mkd-search-cover .mkd-search-close i, .mkd-fullscreen-search-close i', array(
                'color' => industrialist_mikado_options()->getOptionValue('search_close_color')
            ));
        }
        if (industrialist_mikado_options()->getOptionValue('search_close_hover_color') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-slide-window-top .mkd-search-close i:hover, .mkd-search-cover .mkd-search-close i:hover, .mkd-fullscreen-search-close i:hover', array(
                'color' => industrialist_mikado_options()->getOptionValue('search_close_hover_color')
            ));
        }
        if (industrialist_mikado_options()->getOptionValue('search_close_size') !== '') {
            echo industrialist_mikado_dynamic_css('.mkd-search-slide-window-top .mkd-search-close i, .mkd-search-cover .mkd-search-close i, .mkd-fullscreen-search-close i', array(
                'font-size' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('search_close_size')) . 'px'
            ));
        }

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_search_close_icon_styles');
}

if (!function_exists('industrialist_mikado_fullscreen_search_styles')) {
    function industrialist_mikado_fullscreen_search_styles() {
        $bg_image = industrialist_mikado_options()->getOptionValue('fullscreen_search_background_image');
        $selector = '.mkd-search-fade .mkd-fullscreen-search-holder';
        $styles = array();

        if (!$bg_image) {
            return;
        }

        $styles['background-image'] = 'url(' . $bg_image . ')';

        echo industrialist_mikado_dynamic_css($selector, $styles);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_fullscreen_search_styles');
}

?>