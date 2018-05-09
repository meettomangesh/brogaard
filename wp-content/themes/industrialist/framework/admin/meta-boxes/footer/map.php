<?php

$footer_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Footer','industrialist'),
        'name' => 'footer_meta'
    )
);

    industrialist_mikado_add_meta_box_field(
        array(
            'name' => 'mkd_disable_footer_meta',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__('Disable Footer for this Page','industrialist'),
            'description' => esc_html__('Enabling this option will hide footer on this page','industrialist'),
            'parent' => $footer_meta_box,
        )
    );