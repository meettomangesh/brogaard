<?php

$general_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('General', 'industrialist'),
        'name' => 'general_meta'
    )
);


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_page_background_color_meta',
        'type' => 'color',
        'default_value' => '',
        'label' => esc_html__('Page Background Color', 'industrialist'),
        'description' => esc_html__('Choose background color for page content', 'industrialist'),
        'parent' => $general_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_content_behind_header_meta',
        'type'          => 'yesno',
        'default_value' => 'no',
        'label'         => 'Always put content behind header',
        'description'   => 'Enabling this option will put page content behind page header',
        'parent'        => $general_meta_box,
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_page_slider_meta',
        'type' => 'text',
        'default_value' => '',
        'label' => esc_html__('Slider Shortcode', 'industrialist'),
        'description' => esc_html__('Paste your slider shortcode here', 'industrialist'),
        'parent' => $general_meta_box
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_page_transition_type',
        'type' => 'selectblank',
        'label' => esc_html__('Page Transition', 'industrialist'),
        'description' => esc_html__('Choose the type of transition to this page', 'industrialist'),
        'parent' => $general_meta_box,
        'default_value' => '',
        'options' => array(
            'no-animation' => esc_html__('No animation', 'industrialist'),
            'fade' => esc_html__('Fade', 'industrialist')
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_boxed_meta',
        'type'          => 'selectblank',
        'default_value' => '',
        'label'         => esc_html__('Boxed Layout','industrialist'),
        'description'   => '',
        'parent'        => $general_meta_box,
        'options'       => array(
            'no'  => esc_html__('No', 'industrialist'),
            'yes' => esc_html__('Yes', 'industrialist')
        ),
        'args'          => array(
            'dependence' => true,
            'hide'       => array(
                ''    => '',
                'no'  => '#mkd_boxed_container',
                'yes' => ''
            ),
            'show'       => array(
                ''    => '',
                'no'  => '',
                'yes' => '#mkd_boxed_container'
            )
        )
    ));

$boxed_container = industrialist_mikado_add_admin_container(
    array(
        'parent'            => $general_meta_box,
        'name'              => 'boxed_container',
        'hidden_property'   => 'mkd_boxed_meta',
        'hidden_value'    => 'no',
        'hidden_values'   => array('', 'no')
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_background_color_in_box',
        'type'          => 'color',
        'label'         => esc_html__('Page Background Color','industrialist'),
        'description'   => esc_html__('Choose the page background color outside box.','industrialist'),
        'parent'        => $boxed_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_boxed_background_image',
        'type'          => 'image',
        'label'         =>esc_html__( 'Background Image','industrialist'),
        'description'   =>esc_html__( 'Choose an image to be displayed in background','industrialist'),
        'parent'        => $boxed_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_boxed_pattern_background_image',
        'type'          => 'image',
        'label'         => esc_html__('Background Pattern','industrialist'),
        'description'   => esc_html__( 'Choose an image to be used as background pattern','industrialist'),
        'parent'        => $boxed_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_boxed_background_image_attachment',
        'type'          => 'selectblank',
        'default_value' => '',
        'label'         => esc_html__('Background Image Attachment','industrialist'),
        'description'   => esc_html__('Choose background image attachment','industrialist'),
        'parent'        => $boxed_container,
        'options'       => array(
            'fixed'     => esc_html__('Fixed','industrialist'),
            'scroll'    => esc_html__('Scroll','industrialist')
        )
    )
);

$mkd_content_padding_group = industrialist_mikado_add_admin_group(array(
    'name' => 'content_padding_group',
    'title' => esc_html__('Content Style','industrialist'),
    'description' => esc_html__('Define styles for Content area','industrialist'),
    'parent' => $general_meta_box
));

$mkd_content_padding_row = industrialist_mikado_add_admin_row(array(
    'name' => 'mkd_content_padding_row',
    'next' => true,
    'parent' => $mkd_content_padding_group
));

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_content_top_padding',
        'type'          => 'textsimple',
        'default_value' => '',
        'label'         => esc_html__('Content Top Padding','industrialist'),
        'parent'        => $mkd_content_padding_row,
        'args'          => array(
            'suffix' => 'px'
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'        => 'mkd_page_content_top_padding_mobile',
        'type'        => 'selectblanksimple',
        'label'       => esc_html__('Set this top padding for mobile header','industrialist'),
        'parent'      => $mkd_content_padding_row,
        'options'     => array(
            'yes' => 'Yes',
            'no' => 'No',
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name'          => 'mkd_page_content_bottom_padding',
        'type'          => 'textsimple',
        'default_value' => '',
        'label'         => esc_html__('Content Bottom Padding','industrialist'),
        'parent'        => $mkd_content_padding_row,
        'args'          => array(
            'suffix' => 'px'
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_page_comments_meta',
        'type' => 'selectblank',
        'label' => esc_html__('Show Comments', 'industrialist'),
        'description' => esc_html__('Enabling this option will show comments on your page', 'industrialist'),
        'parent' => $general_meta_box,
        'options' => array(
            'yes' => esc_html__('Yes', 'industrialist'),
            'no' => esc_html__('No', 'industrialist')
        )
    )
);