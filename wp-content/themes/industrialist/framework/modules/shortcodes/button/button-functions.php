<?php

if (!function_exists('industrialist_mikado_get_button_html')) {
    /**
     * Calls button shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function industrialist_mikado_get_button_html($params) {
        $button_html = industrialist_mikado_execute_shortcode('mkd_button', $params);
        $button_html = str_replace("\n", '', $button_html);
        return $button_html;
    }
}

if (!function_exists('industrialist_mikado_get_btn_types')) {
    function industrialist_mikado_get_btn_types($empty_val = false) {
        $types = array(
            'outline' => 'Outline',
            'solid' => 'Solid',
        );

        if ($empty_val) {
            $types = array_merge(array(
                '' => 'Default'
            ), $types);
        }

        return $types;
    }
}