<?php

// Clients

$client_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('clients'),
        'title' => esc_html__('Client','industrialist'),
        'name' => 'client_meta'
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_client_image',
        'type' => 'image',
        'label' =>esc_html__( 'Client Image','industrialist'),
        'description' =>esc_html__( 'Choose client image (min width needs to be 215px)','industrialist'),
        'parent' => $client_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_client_hover_image',
        'type' => 'image',
        'label' => esc_html__('Client Hover Image','industrialist'),
        'description' => esc_html__('Choose client hover image (min width needs to be 215px)','industrialist'),
        'parent' => $client_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_client_item_link',
        'type' => 'text',
        'label' =>esc_html__( 'Link','industrialist'),
        'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)','industrialist'),
        'parent' => $client_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_client_item_target',
        'type' => 'selectblank',
        'label' => esc_html__('Target','industrialist'),
        'description' => esc_html__('Specify where to open the linked document','industrialist'),
        'parent' => $client_meta_box,
        'options' => array(
            '_self' => esc_html__('Self','industrialist'),
            '_blank' => esc_html__('Blank','industrialist'),
        )
    )
);