<?php

$logo_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Logo','industrialist'),
        'name'  => 'logo_meta'
    )
);


industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_logo_image_meta',
        'type'          => 'image',
        'label'         =>  esc_html__('Logo Image - Default','industrialist'),
        'description'   =>  esc_html__('Choose a default logo image to display ','industrialist'),
        'parent'        => $logo_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_logo_image_dark_meta',
        'type'          => 'image',
        'label'         =>  esc_html__('Logo Image - Dark','industrialist'),
        'description'   =>  esc_html__('Choose a default logo image to display ','industrialist'),
        'parent'        => $logo_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_logo_image_light_meta',
        'type'          => 'image',
        'label'         =>  esc_html__('Logo Image - Light','industrialist'),
        'description'   => esc_html__( 'Choose a default logo image to display ','industrialist'),
        'parent'        => $logo_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_logo_image_sticky_meta',
        'type'          => 'image',
        'label'         =>  esc_html__('Logo Image - Sticky','industrialist'),
        'description'   =>  esc_html__('Choose a default logo image to display ','industrialist'),
        'parent'        => $logo_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_logo_image_mobile_meta',
        'type'          => 'image',
        'label'         =>  esc_html__('Logo Image - Mobile','industrialist'),
        'description'   =>  esc_html__('Choose a default logo image to display ','industrialist'),
        'parent'        => $logo_meta_box
    )
);