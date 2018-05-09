<?php

if (!function_exists('industrialist_mikado_content_styles')) {
    /**
     * Generates content custom styles
     */
    function industrialist_mikado_content_styles() {

        $content_style = array();
        if (industrialist_mikado_options()->getOptionValue('content_top_padding') !== '') {
            $padding_top = (industrialist_mikado_options()->getOptionValue('content_top_padding'));
            $content_style['padding-top'] = industrialist_mikado_filter_px($padding_top) . 'px';
        }

        $content_selector = array(
            '.mkd-content .mkd-content-inner > .mkd-full-width > .mkd-full-width-inner',
        );

        echo industrialist_mikado_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
        if (industrialist_mikado_options()->getOptionValue('content_top_padding_in_grid') !== '') {
            $padding_top_in_grid = (industrialist_mikado_options()->getOptionValue('content_top_padding_in_grid'));
            $content_style_in_grid['padding-top'] = industrialist_mikado_filter_px($padding_top_in_grid) . 'px';

        }

        $content_selector_in_grid = array(
            '.mkd-content .mkd-content-inner > .mkd-container > .mkd-container-inner',
        );

        echo industrialist_mikado_dynamic_css($content_selector_in_grid, $content_style_in_grid);

    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_content_styles');
}