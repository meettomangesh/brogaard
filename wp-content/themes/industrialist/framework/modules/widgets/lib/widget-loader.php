<?php

if (!function_exists('industrialist_mikado_register_widgets')) {

    function industrialist_mikado_register_widgets() {

        $widgets = array(
            'IndustrialistMikadoLatestPosts',
            'IndustrialistMikadoSearchOpener',
            'IndustrialistMikadoSideAreaOpener',
            'IndustrialistMikadoSocialIconWidget',
            'IndustrialistMikadoSeparatorWidget',
            'IndustrialistMikadoImageWidget',
        );

        foreach ($widgets as $widget) {
            register_widget($widget);
        }
    }
}

add_action('widgets_init', 'industrialist_mikado_register_widgets');