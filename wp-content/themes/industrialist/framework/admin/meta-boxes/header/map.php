<?php

$header_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Header', 'industrialist'),
        'name' => 'header_meta'
    )
);

$temp_holder_show = '';
$temp_holder_hide = '';
$temp_array_standard = array();
$temp_array_standard_extended = array();
$temp_array_box = array();
$temp_array_minimal = array();
$temp_array_vertical = array();
$temp_array_top_header = array();
$temp_array_behaviour = array();
switch (industrialist_mikado_options()->getOptionValue('header_type')) {

    case 'header-standard':
        $temp_holder_show = '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container';

        $temp_array_standard = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                'header-vertical',
                'header-minimal',
                'header-standard-extended',
                'header-box',
            )
        );

        $temp_array_standard_extended = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-box',
            )
        );

        $temp_array_box = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',

            )
        );

        $temp_array_minimal = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-standard-extended',
                'header-box',

            )
        );


        $temp_array_vertical = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'default',
            'hidden_values' => array('header-vertical')
        );
        break;

    case 'header-standard-extended':
        $temp_holder_show = '#mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_box_type_meta_container';

        $temp_array_standard = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',
                'header-box',
            )
        );

        $temp_array_standard_extended = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-box',

            )
        );

        $temp_array_box = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',

            )
        );

        $temp_array_minimal = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_vertical = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'default',
            'hidden_values' => array('header-vertical')
        );
        break;

    case 'header-box':
        $temp_holder_show = '#mkd_mkd_header_box_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container';

        $temp_array_standard = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_standard_extended = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-box',

            )
        );

        $temp_array_box = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',

            )
        );

        $temp_array_minimal = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-standard-extended',
                'header-box',

            )
        );


        $temp_array_vertical = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'default',
            'hidden_values' => array('header-vertical')
        );
        break;


    case 'header-minimal':
        $temp_holder_show = '#mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_behaviour_meta';
        $temp_holder_hide = '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container';

        $temp_array_standard = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_standard_extended = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-box',

            )
        );

        $temp_array_box = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',

            )
        );

        $temp_array_minimal = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                'header-standard',
                'header-vertical',
                'header-standard-extended',
                'header-box',

            )
        );


        $temp_array_vertical = array(
            'hidden_values' => array(
                '',
                'header-standard',
                'header-minimal',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'default',
            'hidden_values' => array('header-vertical')
        );
        break;

    case 'header-vertical':
        $temp_holder_show = '#mkd_mkd_header_vertical_type_meta_container';
        $temp_holder_hide = '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_behaviour_meta, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container';

        $temp_array_standard = array(
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_standard_extended = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-box',

            )
        );

        $temp_array_box = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                '',
                'header-standard',
                'header-vertical',
                'header-minimal',
                'header-standard-extended',

            )
        );

        $temp_array_minimal = array(
            'hidden_values' => array(
                '',
                'header-vertical',
                'header-standard',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_vertical = array(
            'hidden_value' => 'default',
            'hidden_values' => array(
                'header-standard',
                'header-minimal',
                'header-standard-extended',
                'header-box',

            )
        );

        $temp_array_behaviour = array(
            'hidden_values' => array('', 'header-vertical')
        );

        $temp_array_top_header = array(
            'hidden_value' => 'default',
            'hidden_values' => array('', 'header-vertical')
        );
        break;
}

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_header_type_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Choose Header Type', 'industrialist'),
        'description' => esc_html__('Select header type layout', 'industrialist'),
        'parent' => $header_meta_box,
        'options' => array(
            '' => esc_html__('Default', 'industrialist'),
            'header-standard' => esc_html__('Standard Header', 'industrialist'),
            'header-standard-extended' => esc_html__('Standard Extended Header', 'industrialist'),
            'header-box' => esc_html__('"In The Box" Header', 'industrialist'),
            'header-minimal' => esc_html__('Minimal Header', 'industrialist'),
            'header-vertical' => esc_html__('Vertical Header', 'industrialist'),
        ),
        'args' => array(
            "dependence" => true,
            "hide" => array(
                "" => $temp_holder_hide,
                'header-standard' => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container',
                'header-standard-extended' => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_box_type_meta_container',
                'header-box' => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_standard_type_meta_container',
                'header-minimal' => '#mkd_mkd_header_vertical_type_meta_container, #mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container',
                'header-vertical' => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta, #mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_header_box_type_meta_container',
            ),
            "show" => array(
                "" => $temp_holder_show,
                "header-standard" => '#mkd_mkd_header_standard_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta',
                "header-standard-extended" => '#mkd_mkd_header_standard_extended_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta',
                "header-box" => '#mkd_mkd_header_box_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta',
                "header-minimal" => '#mkd_mkd_header_minimal_type_meta_container, #mkd_mkd_top_bar_container_meta_container, #mkd_mkd_header_behaviour_meta',
                "header-vertical" => '#mkd_mkd_header_vertical_type_meta_container',
            )
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array_merge(
        array(
            'parent' => $header_meta_box,
            'type' => 'select',
            'name' => 'mkd_header_behaviour_meta',
            'default_value' => '',
            'label' => esc_html__('Choose Header behaviour', 'industrialist'),
            'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'industrialist'),
            'options' => array(
                '' => '',
                'no-behavior' => esc_html__('No Behavior', 'industrialist'),
                'sticky-header-on-scroll-up' => esc_html__('Sticky on scrol up', 'industrialist'),
                'sticky-header-on-scroll-down-up' => esc_html__('Sticky on scrol up/down', 'industrialist'),
                'fixed-on-scroll' => esc_html__('Fixed on scroll', 'industrialist')
            ),
            'hidden_property' => 'mkd_header_type_meta',
            'hidden_value' => '',
            'args' => array(
                'dependence' => true,
                'show' => array(
                    '' => '',
                    'sticky-header-on-scroll-up' => '',
                    'sticky-header-on-scroll-down-up' => '#mkd_mkd_sticky_amount_container_meta_container',
                    'no-behavior' => ''
                ),
                'hide' => array(
                    '' => '#mkd_mkd_sticky_amount_container_meta_container',
                    'sticky-header-on-scroll-up' => '#mkd_mkd_sticky_amount_container_meta_container',
                    'sticky-header-on-scroll-down-up' => '',
                    'no-behavior' => '#mkd_mkd_sticky_amount_container_meta_container'
                )
            )
        ),
        $temp_array_behaviour
    )
);

$sticky_amount_container = industrialist_mikado_add_admin_container(
    array(
        'parent' => $header_meta_box,
        'name' => 'mkd_sticky_amount_container_meta_container',
        'hidden_property' => 'mkd_header_behaviour_meta',
        'hidden_value' => '',
        'hidden_values' => array('', 'no-behavior', 'sticky-header-on-scroll-up'),
    )
);

$sticky_amount_group = industrialist_mikado_add_admin_group(array(
    'name' => 'sticky_amount_group',
    'title' => esc_html__('Scroll Amount for Sticky Header Appearance', 'industrialist'),
    'parent' => $sticky_amount_container,
    'description' => esc_html__('Enter the amount of pixels for sticky header appearance, or set browser height to "Yes" for predefined sticky header appearance amount', 'industrialist')
));

$sticky_amount_row = industrialist_mikado_add_admin_row(array(
    'name' => 'sticky_amount_group',
    'parent' => $sticky_amount_group
));

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_scroll_amount_for_sticky_meta',
        'type' => 'textsimple',
        'label' => esc_html__('Amount in px', 'industrialist'),
        'parent' => $sticky_amount_row,
        'args' => array(
            'suffix' => 'px'
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_scroll_amount_for_sticky_fullscreen_meta',
        'type' => 'yesnosimple',
        'label' => esc_html__('Browser Height', 'industrialist'),
        'default_value' => 'no',
        'parent' => $sticky_amount_row
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_header_style_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Header Skin', 'industrialist'),
        'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'industrialist'),
        'parent' => $header_meta_box,
        'options' => array(
            '' => '',
            'light-header' => esc_html__('Light', 'industrialist'),
            'dark-header' => esc_html__('Dark', 'industrialist')
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'parent' => $header_meta_box,
        'type' => 'select',
        'name' => 'mkd_enable_header_style_on_scroll_meta',
        'default_value' => '',
        'label' => esc_html__('Enable Header Style on Scroll', 'industrialist'),
        'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'industrialist'),
        'options' => array(
            '' => '',
            'no' => esc_html__('No', 'industrialist'),
            'yes' => esc_html__('Yes', 'industrialist')
        )
    )
);

$header_standard_type_meta_container = industrialist_mikado_add_admin_container(
    array_merge(
        array(
            'parent' => $header_meta_box,
            'name' => 'mkd_header_standard_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_standard
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_in_grid_header_standard_meta',
    'type' => 'select',
    'label' => esc_html__('Header In Grid', 'industrialist'),
    'description' => esc_html__('Set header content to be in grid', 'industrialist'),
    'parent' => $header_standard_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => esc_html__('Default', 'industrialist'),
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_menu_area_in_grid_header_standard_container',
            'no' => '#mkd_menu_area_in_grid_header_standard_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_menu_area_in_grid_header_standard_container'
        )
    )
));

$menu_area_in_grid_header_standard_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'menu_area_in_grid_header_standard_container',
    'parent' => $header_standard_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_header_standard_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_grid_background_color_header_standard_meta',
        'type' => 'color',
        'label' => esc_html__('Grid Background Color', 'industrialist'),
        'description' => esc_html__('Set grid background color for header area', 'industrialist'),
        'parent' => $menu_area_in_grid_header_standard_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_grid_background_transparency_header_standard_meta',
        'type' => 'text',
        'label' => esc_html__('Grid Background Transparency', 'industrialist'),
        'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'industrialist'),
        'parent' => $menu_area_in_grid_header_standard_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_in_grid_shadow_header_standard_meta',
    'type' => 'select',
    'label' => esc_html__('Grid Area Shadow', 'industrialist'),
    'description' => esc_html__('Set shadow on grid area', 'industrialist'),
    'parent' => $menu_area_in_grid_header_standard_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    )
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_position_header_standard_meta',
        'type' => 'select',
        'label' => esc_html__('Position of Menu', 'industrialist'),
        'description' => esc_html__('Set position of menu in header', 'industrialist'),
        'parent' => $header_standard_type_meta_container,
        'default_value' => '',
        'options' => array(
            '' => '',
            'left' => esc_html__('Left (Next To Logo)', 'industrialist'),
            'right' => esc_html__('Right', 'industrialist'),
        )
    )
);


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_background_color_header_standard_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'industrialist'),
        'description' => esc_html__('Choose a background color for header area', 'industrialist'),
        'parent' => $header_standard_type_meta_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_background_transparency_header_standard_meta',
        'type' => 'text',
        'label' => esc_html__('Transparency', 'industrialist'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'industrialist'),
        'parent' => $header_standard_type_meta_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_shadow_header_standard_meta',
    'type' => 'select',
    'label' => esc_html__('Header Area Shadow', 'industrialist'),
    'description' => esc_html__('Set shadow on header area', 'industrialist'),
    'parent' => $header_standard_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    )
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_border_header_standard_meta',
    'type' => 'select',
    'label' => esc_html__('Header Area Border', 'industrialist'),
    'description' => esc_html__('Set border on header area', 'industrialist'),
    'parent' => $header_standard_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_menu_area_border_header_standard_container',
            'no' => '#mkd_menu_area_border_header_standard_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_menu_area_border_header_standard_container'
        )
    )
));

$menu_area_border_header_standard_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'menu_area_border_header_standard_container',
    'parent' => $header_standard_type_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_standard_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_border_header_standard_color_meta',
        'type' => 'color',
        'label' => esc_html__('Border Color', 'industrialist'),
        'description' => esc_html__('Set border color for menu area', 'industrialist'),
        'parent' => $menu_area_border_header_standard_container
    )
);

$header_minimal_type_meta_container = industrialist_mikado_add_admin_container(
    array_merge(
        array(
            'parent' => $header_meta_box,
            'name' => 'mkd_header_minimal_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_minimal
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_in_grid_header_minimal_meta',
    'type' => 'select',
    'label' => esc_html__('Header In Grid', 'industrialist'),
    'description' => esc_html__('Set header content to be in grid', 'industrialist'),
    'parent' => $header_minimal_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => esc_html__('Default', 'industrialist'),
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_menu_area_in_grid_header_minimal_container',
            'no' => '#mkd_menu_area_in_grid_header_minimal_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_menu_area_in_grid_header_minimal_container'
        )
    )
));

$menu_area_in_grid_header_minimal_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'menu_area_in_grid_header_minimal_container',
    'parent' => $header_minimal_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_header_minimal_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_grid_background_color_header_minimal_meta',
        'type' => 'color',
        'label' => esc_html__('Grid Background Color', 'industrialist'),
        'description' => esc_html__('Set grid background color for header area', 'industrialist'),
        'parent' => $menu_area_in_grid_header_minimal_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_grid_background_transparency_header_minimal_meta',
        'type' => 'text',
        'label' => esc_html__('Grid Background Transparency', 'industrialist'),
        'description' => esc_html__('Set grid background transparency for header (0 = fully transparent, 1 = opaque)', 'industrialist'),
        'parent' => $menu_area_in_grid_header_minimal_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_in_grid_shadow_header_minimal_meta',
    'type' => 'select',
    'label' => esc_html__('Grid Area Shadow', 'industrialist'),
    'description' => esc_html__('Set shadow on grid area', 'industrialist'),
    'parent' => $menu_area_in_grid_header_minimal_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    )
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_background_color_header_minimal_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'industrialist'),
        'description' => esc_html__('Choose a background color for header area', 'industrialist'),
        'parent' => $header_minimal_type_meta_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_background_transparency_header_minimal_meta',
        'type' => 'text',
        'label' => esc_html__('Transparency', 'industrialist'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'industrialist'),
        'parent' => $header_minimal_type_meta_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_shadow_header_minimal_meta',
    'type' => 'select',
    'label' => esc_html__('Header Area Shadow', 'industrialist'),
    'description' => esc_html__('Set shadow on header area', 'industrialist'),
    'parent' => $header_minimal_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    )
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_border_header_minimal_meta',
    'type' => 'select',
    'label' => esc_html__('Header Area Border', 'industrialist'),
    'description' => esc_html__('Set border on header area', 'industrialist'),
    'parent' => $header_minimal_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_menu_area_border_header_minimal_container',
            'no' => '#mkd_menu_area_border_header_minimal_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_menu_area_border_header_minimal_container'
        )
    )
));

$menu_area_border_header_minimal_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'menu_area_border_header_minimal_container',
    'parent' => $header_minimal_type_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_minimal_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_border_header_minimal_color_meta',
        'type' => 'color',
        'label' => esc_html__('Border Color', 'industrialist'),
        'description' => esc_html__('Set border color for menu area', 'industrialist'),
        'parent' => $menu_area_border_header_minimal_container
    )
);


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_fullscreen_menu_background_image_meta',
        'type' => 'image',
        'default_value' => '',
        'label' => esc_html__('Fullscreen Background Image', 'industrialist'),
        'description' => esc_html__('Set background image for Fullscreen Menu', 'industrialist'),
        'parent' => $header_minimal_type_meta_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_disable_fullscreen_menu_background_image_meta',
        'type' => 'yesno',
        'default_value' => 'no',
        'label' => esc_html__('Disable Fullscreen Background Image', 'industrialist'),
        'description' => esc_html__('Enabling this option will hide background image in Fullscreen Menu', 'industrialist'),
        'parent' => $header_minimal_type_meta_container
    )
);

$header_standard_extended_type_meta_container = industrialist_mikado_add_admin_container(
    array_merge(
        array(
            'parent' => $header_meta_box,
            'name' => 'mkd_header_standard_extended_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_standard_extended
    )
);

industrialist_mikado_add_admin_section_title(array(
    'name' => 'logo_area_standard_extended_title',
    'parent' => $header_standard_extended_type_meta_container,
    'title' => esc_html__('Logo Area', 'industrialist')
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_logo_area_style_header_standard_extended_meta',
    'type' => 'select',
    'label' => esc_html__('Logo Area Skin', 'industrialist'),
    'description' => esc_html__('Choose a logo area style to make logo in that predefined style', 'industrialist'),
    'parent' => $header_standard_extended_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => esc_html__('Default', 'industrialist'),
        'light-logo-area' => esc_html__('Light', 'industrialist'),
        'dark-logo-area' => esc_html__('Dark', 'industrialist')
    )
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_logo_area_in_grid_header_standard_extended_meta',
    'type' => 'select',
    'label' => esc_html__('Logo Area In Grid', 'industrialist'),
    'description' => esc_html__('Set logo area content to be in grid', 'industrialist'),
    'parent' => $header_standard_extended_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => esc_html__('Default', 'industrialist'),
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_logo_area_in_grid_header_standard_extended_container',
            'no' => '#mkd_logo_area_in_grid_header_standard_extended_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_logo_area_in_grid_header_standard_extended_container'
        )
    )
));

$logo_area_in_grid_header_standard_extended_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'logo_area_in_grid_header_standard_extended_container',
    'parent' => $header_standard_extended_type_meta_container,
    'hidden_property' => 'mkd_logo_area_in_grid_header_standard_extended_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_logo_area_grid_background_color_header_standard_extended_meta',
        'type' => 'color',
        'label' => esc_html__('Grid Background Color', 'industrialist'),
        'description' => esc_html__('Set grid background color for logo area', 'industrialist'),
        'parent' => $logo_area_in_grid_header_standard_extended_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_logo_area_grid_background_transparency_header_standard_extended_meta',
        'type' => 'text',
        'label' => esc_html__('Grid Background Transparency', 'industrialist'),
        'description' => esc_html__('Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'industrialist'),
        'parent' => $logo_area_in_grid_header_standard_extended_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_logo_area_in_grid_border_header_standard_extended_meta',
    'type' => 'select',
    'label' => esc_html__('Grid Area Border', 'industrialist'),
    'description' => esc_html__('Set border on grid area', 'industrialist'),
    'parent' => $logo_area_in_grid_header_standard_extended_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_logo_area_in_grid_border_header_standard_extended_container',
            'no' => '#mkd_logo_area_in_grid_border_header_standard_extended_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_logo_area_in_grid_border_header_standard_extended_container'
        )
    )
));

$logo_area_in_grid_border_header_standard_extended_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'logo_area_in_grid_border_header_standard_extended_container',
    'parent' => $logo_area_in_grid_header_standard_extended_container,
    'hidden_property' => 'mkd_logo_area_in_grid_border_header_standard_extended_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_logo_area_in_grid_border_color_header_standard_extended_meta',
    'type' => 'color',
    'label' => esc_html__('Border Color', 'industrialist'),
    'description' => esc_html__('Set border color for grid area', 'industrialist'),
    'parent' => $logo_area_in_grid_border_header_standard_extended_container
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_logo_area_background_color_header_standard_extended_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'industrialist'),
        'description' => esc_html__('Choose a background color for logo area', 'industrialist'),
        'parent' => $header_standard_extended_type_meta_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_logo_area_background_transparency_header_standard_extended_meta',
        'type' => 'text',
        'label' => esc_html__('Transparency', 'industrialist'),
        'description' => esc_html__('Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'industrialist'),
        'parent' => $header_standard_extended_type_meta_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_logo_area_border_header_standard_extended_meta',
    'type' => 'select',
    'label' => esc_html__('Logo Area Border', 'industrialist'),
    'description' => esc_html__('Set border on logo area', 'industrialist'),
    'parent' => $header_standard_extended_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_logo_border_bottom_color_standard_extended_container',
            'no' => '#mkd_logo_border_bottom_color_standard_extended_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_logo_border_bottom_color_standard_extended_container'
        )
    )
));

$border_bottom_color_standard_extended_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'logo_border_bottom_color_standard_extended_container',
    'parent' => $header_standard_extended_type_meta_container,
    'hidden_property' => 'mkd_logo_area_border_header_standard_extended_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_logo_area_border_color_header_standard_extended_meta',
    'type' => 'color',
    'label' => esc_html__('Border Color', 'industrialist'),
    'description' => esc_html__('Choose color of logo area bottom border', 'industrialist'),
    'parent' => $border_bottom_color_standard_extended_container
));

industrialist_mikado_add_admin_section_title(array(
    'name' => 'menu_area_standard_extended_title',
    'parent' => $header_standard_extended_type_meta_container,
    'title' => esc_html__('Menu Area', 'industrialist')
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_in_grid_header_standard_extended_meta',
    'type' => 'select',
    'label' => esc_html__('Menu Area In Grid', 'industrialist'),
    'description' => esc_html__('Set menu area content to be in grid', 'industrialist'),
    'parent' => $header_standard_extended_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => esc_html__('Default', 'industrialist'),
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_menu_area_in_grid_header_standard_extended_container',
            'no' => '#mkd_menu_area_in_grid_header_standard_extended_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_menu_area_in_grid_header_standard_extended_container'
        )
    )
));

$menu_area_in_grid_header_standard_extended_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'menu_area_in_grid_header_standard_extended_container',
    'parent' => $header_standard_extended_type_meta_container,
    'hidden_property' => 'mkd_menu_area_in_grid_header_standard_extended_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_grid_background_color_header_standard_extended_meta',
        'type' => 'color',
        'label' => esc_html__('Grid Background Color', 'industrialist'),
        'description' => esc_html__('Set grid background color for menu area', 'industrialist'),
        'parent' => $menu_area_in_grid_header_standard_extended_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_grid_background_transparency_header_standard_extended_meta',
        'type' => 'text',
        'label' => esc_html__('Grid Background Transparency', 'industrialist'),
        'description' => esc_html__('Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'industrialist'),
        'parent' => $menu_area_in_grid_header_standard_extended_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_in_grid_shadow_header_standard_extended_meta',
    'type' => 'select',
    'label' => esc_html__('Grid Area Shadow', 'industrialist'),
    'description' => esc_html__('Set shadow on grid area', 'industrialist'),
    'parent' => $menu_area_in_grid_header_standard_extended_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    )
));

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_background_color_header_standard_extended_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'industrialist'),
        'description' => esc_html__('Choose a background color for menu area', 'industrialist'),
        'parent' => $header_standard_extended_type_meta_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_background_transparency_header_standard_extended_meta',
        'type' => 'text',
        'label' => esc_html__('Transparency', 'industrialist'),
        'description' => esc_html__('Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'industrialist'),
        'parent' => $header_standard_extended_type_meta_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_shadow_header_standard_extended_meta',
    'type' => 'select',
    'label' => esc_html__('Menu Area Shadow', 'industrialist'),
    'description' => esc_html__('Set shadow on menu area', 'industrialist'),
    'parent' => $header_standard_extended_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    )
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_menu_area_border_header_standard_extended_meta',
    'type' => 'select',
    'label' => esc_html__('Header Area Border', 'industrialist'),
    'description' => esc_html__('Set border on header area', 'industrialist'),
    'parent' => $header_standard_extended_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_menu_area_border_header_standard_extended_container',
            'no' => '#mkd_menu_area_border_header_standard_extended_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_menu_area_border_header_standard_extended_container'
        )
    )
));

$menu_area_border_header_standard_extended_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'menu_area_border_header_standard_extended_container',
    'parent' => $header_standard_extended_type_meta_container,
    'hidden_property' => 'mkd_menu_area_border_header_standard_extended_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_border_header_standard_extended_color_meta',
        'type' => 'color',
        'label' => esc_html__('Border Color', 'industrialist'),
        'description' => esc_html__('Set border color for menu area', 'industrialist'),
        'parent' => $menu_area_border_header_standard_extended_container
    )
);


$header_box_type_meta_container = industrialist_mikado_add_admin_container(
    array_merge(
        array(
            'parent' => $header_meta_box,
            'name' => 'mkd_header_box_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_box
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_logo_area_header_box_meta',
    'type' => 'select',
    'label' => esc_html__('Enable Logo Area', 'industrialist'),
    'description' => esc_html__('Set Logo Area over the menu area', 'industrialist'),
    'parent' => $header_box_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'hide' => array(
            '' => '#mkd_logo_area_box_container',
            'no' => '#mkd_logo_area_box_container',
            'yes' => ''
        ),
        'show' => array(
            '' => '',
            'no' => '',
            'yes' => '#mkd_logo_area_box_container'
        )
    )
));

$logo_area_box_container = industrialist_mikado_add_admin_container(array(
    'type' => 'container',
    'name' => 'logo_area_box_container',
    'parent' => $header_box_type_meta_container,
    'hidden_property' => 'mkd_logo_area_header_box_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));


industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_logo_area_style_header_box_meta',
    'type' => 'select',
    'label' => esc_html__('Logo Area Skin', 'industrialist'),
    'description' => esc_html__('Choose a logo area style to make logo in that predefined style', 'industrialist'),
    'parent' => $logo_area_box_container,
    'default_value' => '',
    'options' => array(
        '' => esc_html__('Default', 'industrialist'),
        'light-logo-area' => esc_html__('Light', 'industrialist'),
        'dark-logo-area' => esc_html__('Dark', 'industrialist')
    )
));


industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_menu_area_grid_background_color_header_box_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'industrialist'),
        'description' => esc_html__('Set grid background color for header area', 'industrialist'),
        'parent' => $header_box_type_meta_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'parent' => $header_box_type_meta_container,
        'type' => 'text',
        'name' => 'mkd_menu_area_border_box_header_box_meta',
        'default_value' => '',
        'label' => esc_html__('Header Border Radius', 'industrialist'),
        'description' => esc_html__('Enter border radius for Header (e.g. 2px)', 'industrialist'),
        'args' => array(
            'col_width' => 3,
            'suffix' => 'px'
        )
    )
);

$top_bar_container = industrialist_mikado_add_admin_container(
    array_merge(
        array(
            'parent' => $header_meta_box,
            'name' => 'mkd_top_bar_container_meta_container',
            'hidden_property' => 'mkd_header_type_meta',

        ),
        $temp_array_top_header
    )
);

industrialist_mikado_add_admin_section_title(array(
    'name' => 'top_bar_section_title',
    'parent' => $top_bar_container,
    'title' => esc_html__('Top Bar', 'industrialist')
));

$top_bar_global_option = industrialist_mikado_options()->getOptionValue('top_bar');

$top_bar_default_dependency = array(
    '' => '#mkd_top_bar_container_no_style'
);

$top_bar_show_array = array(
    'yes' => '#mkd_top_bar_container_no_style'
);

$top_bar_hide_array = array(
    'no' => '#mkd_top_bar_container_no_style'
);

if ($top_bar_global_option === 'yes') {
    $top_bar_show_array = array_merge($top_bar_show_array, $top_bar_default_dependency);
    $top_bar_container_hide_array = array('no');
} else {
    $top_bar_hide_array = array_merge($top_bar_hide_array, $top_bar_default_dependency);
    $top_bar_container_hide_array = array('', 'no');
}


industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_top_bar_meta',
    'type' => 'select',
    'label' => esc_html__('Enable Top Bar on This Page', 'industrialist'),
    'description' => esc_html__('Enabling this option will enable top bar on this page', 'industrialist'),
    'parent' => $top_bar_container,
    'default_value' => '',
    'options' => array(
        '' => esc_html__('Default', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist'),
        'no' => esc_html__('No', 'industrialist')
    ),
    'args' => array(
        'dependence' => true,
        'show' => $top_bar_show_array,
        'hide' => $top_bar_hide_array
    )
));

$top_bar_container = industrialist_mikado_add_admin_container_no_style(array(
    'name' => 'top_bar_container_no_style',
    'parent' => $top_bar_container,
    'hidden_property' => 'mkd_top_bar_meta',
    'hidden_value' => 'no',
    'hidden_values' => $top_bar_container_hide_array
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_top_bar_in_grid_meta',
    'type' => 'select',
    'label' => esc_html__('Top Bar In Grid', 'industrialist'),
    'description' => esc_html__('Set top bar content to be in grid', 'industrialist'),
    'parent' => $top_bar_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    )
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_top_bar_skin_meta',
    'type' => 'select',
    'label' => esc_html__('Top Bar Skin', 'industrialist'),
    'options' => array(
        '' => esc_html__('Default', 'industrialist'),
        'light' => esc_html__('White', 'industrialist'),
        'dark' => esc_html__('Black', 'industrialist'),
        'gray' => esc_html__('Gray', 'industrialist'),
    ),
    'parent' => $top_bar_container
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_top_bar_background_color_meta',
    'type' => 'color',
    'label' => esc_html__('Top Bar Background Color', 'industrialist'),
    'parent' => $top_bar_container
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_top_bar_background_transparency_meta',
    'type' => 'text',
    'label' => esc_html__('Top Bar Background Color Transparency', 'industrialist'),
    'description' => esc_html__('Set top bar background color transparenct. Value should be between 0 and 1', 'industrialist'),
    'parent' => $top_bar_container,
    'args' => array(
        'col_width' => 3
    )
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_top_bar_height_meta',
    'type' => 'text',
    'label' => esc_html__('Top bar height', 'industrialist'),
    'description' => esc_html__('Enter top bar height (Default is 45px)', 'industrialist'),
    'parent' => $top_bar_container,
    'args' => array(
        'col_width' => 2,
        'suffix' => 'px'
    )
));

$header_vertical_type_meta_container = industrialist_mikado_add_admin_container(
    array_merge(
        array(
            'parent' => $header_meta_box,
            'name' => 'mkd_header_vertical_type_meta_container',
            'hidden_property' => 'mkd_header_type_meta'
        ),
        $temp_array_vertical
    )
);

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_vertical_header_background_color_meta',
    'type' => 'color',
    'label' => esc_html__('Background Color', 'industrialist'),
    'description' => esc_html__('Set background color for vertical menu', 'industrialist'),
    'parent' => $header_vertical_type_meta_container
));

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_vertical_header_background_image_meta',
        'type' => 'image',
        'default_value' => '',
        'label' => esc_html__('Background Image', 'industrialist'),
        'description' => esc_html__('Set background image for vertical menu', 'industrialist'),
        'parent' => $header_vertical_type_meta_container
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_disable_vertical_header_background_image_meta',
        'type' => 'yesno',
        'default_value' => 'no',
        'label' => esc_html__('Disable Background Image', 'industrialist'),
        'description' => esc_html__('Enabling this option will hide background image in Vertical Menu', 'industrialist'),
        'parent' => $header_vertical_type_meta_container
    )
);


industrialist_mikado_add_meta_box_field(
    array(
        'parent' => $header_vertical_type_meta_container,
        'type' => 'select',
        'name' => 'mkd_vertical_header_align_meta',
        'default_value' => 'center',
        'label' => esc_html__('Horizontal Align', 'industrialist'),
        'description' => esc_html__('Choose alignment for Vertical menu', 'industrialist'),
        'options' => array(
            'center' => esc_html__('Center', 'industrialist'),
            'left' => esc_html__('Left', 'industrialist')
        )
    )
);


industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_vertical_header_shadow_meta',
    'type' => 'select',
    'label' => esc_html__('Shadow', 'industrialist'),
    'description' => esc_html__('Set shadow on vertical menu', 'industrialist'),
    'parent' => $header_vertical_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => '',
        'no' => esc_html__('No', 'industrialist'),
        'yes' => esc_html__('Yes', 'industrialist')
    )
));

industrialist_mikado_add_meta_box_field(
    array(
        'parent' => $header_vertical_type_meta_container,
        'type' => 'select',
        'name' => 'mkd_vertical_header_main_menu_meta',
        'default_value' => '',
        'label' => esc_html__('Menu Area Style', 'industrialist'),
        'description' => esc_html__('Choose a menu area style for Header Vertical', 'industrialist'),
        'options' => array(
            '' => '',
            'float' => esc_html__('Float', 'industrialist'),
            'click' => esc_html__('On Click', 'industrialist')
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'parent' => $header_vertical_type_meta_container,
        'type' => 'select',
        'name' => 'mkd_vertical_dropdown_border_bottom_meta',
        'default_value' => '',
        'label' => esc_html__('Main Menu Separator', 'industrialist'),
        'description' => esc_html__('Place separator between menu items', 'industrialist'),
        'options' => array(
            '' => '',
            'yes' => esc_html__('Yes', 'industrialist'),
            'No' => esc_html__('No', 'industrialist'),
        ),
        'args' => array(
            'dependence' => true,
            'hide' => array(
                '' => '#mkd_vertical_dropdown_border_bottom_meta_container',
                'no' => '#mkd_vertical_dropdown_border_bottom_meta_container',
                'yes' => ''
            ),
            'show' => array(
                '' => '',
                'no' => '',
                'yes' => '#mkd_vertical_dropdown_border_bottom_meta_container'
            )
        )
    )
);

$vertical_dropdown_border_bottom_meta_container = industrialist_mikado_add_admin_container(array(
    'name' => 'vertical_dropdown_border_bottom_meta_container',
    'parent' => $header_vertical_type_meta_container,
    'hidden_property' => 'mkd_vertical_dropdown_border_bottom_meta',
    'hidden_value' => 'no',
    'hidden_values' => array('', 'no')
));

industrialist_mikado_add_meta_box_field(array(
    'name' => 'mkd_vertical_dropdown_border_bottom_color_meta',
    'type' => 'color',
    'label' => esc_html__('Separator Color', 'industrialist'),
    'description' => esc_html__('Choose color for separator between menu items', 'industrialist'),
    'parent' => $vertical_dropdown_border_bottom_meta_container
));
