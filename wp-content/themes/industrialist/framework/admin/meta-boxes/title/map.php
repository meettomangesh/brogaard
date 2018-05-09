<?php

$title_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' =>esc_html__( 'Title','industrialist'),
        'name' => 'title_meta'
    )
);

    industrialist_mikado_add_meta_box_field(
        array(
            'name' => 'mkd_show_title_area_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__('Show Title Area','industrialist'),
            'description' => esc_html__('Disabling this option will turn off page title area','industrialist'),
            'parent' => $title_meta_box,
            'options' => array(
                '' => '',
                'no' =>esc_html__( 'No','industrialist'),
                'yes' =>esc_html__( 'Yes','industrialist')
            ),
            'args' => array(
                "dependence" => true,
                "hide" => array(
                    "" => "",
                    "no" => "#mkd_mkd_show_title_area_meta_container",
                    "yes" => ""
                ),
                "show" => array(
                    "" => "#mkd_mkd_show_title_area_meta_container",
                    "no" => "",
                    "yes" => "#mkd_mkd_show_title_area_meta_container"
                )
            )
        )
    );

    $show_title_area_meta_container = industrialist_mikado_add_admin_container(
        array(
            'parent' => $title_meta_box,
            'name' => 'mkd_show_title_area_meta_container',
            'hidden_property' => 'mkd_show_title_area_meta',
            'hidden_value' => 'no'
        )
    );

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type','industrialist'),
                'description' => esc_html__('Choose title type','industrialist'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__('Standard','industrialist'),
                    'breadcrumb' => esc_html__('Breadcrumb','industrialist')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "breadcrumb" => "#mkd_mkd_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#mkd_mkd_title_area_type_meta_container",
                        "standard" => "#mkd_mkd_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'mkd_title_area_type_meta_container',
                'hidden_property' => 'mkd_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

            industrialist_mikado_add_meta_box_field(
                array(
                    'name' => 'mkd_title_area_enable_breadcrumbs_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' =>esc_html__( 'Enable Breadcrumbs','industrialist'),
                    'description' => esc_html__('This option will display Breadcrumbs in Title Area','industrialist'),
                    'parent' => $title_area_type_meta_container,
                    'options' => array(
                        '' => '',
                        'no'  => esc_html__('No','industrialist'),
                        'yes' => esc_html__( 'Yes','industrialist')
                    ),
                )
            );

            industrialist_mikado_add_meta_box_field(
                array(
                    'name' => 'mkd_title_area_separator_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' =>esc_html__( 'Enable Separator','industrialist'),
                    'description' => esc_html__('This option will display Separator in Title Area','industrialist'),
                    'parent' => $title_area_type_meta_container,
                    'options' => array(
                        '' => '',
                        'no'  => esc_html__('No','industrialist'),
                        'yes' => esc_html__('Yes','industrialist')
                    ),
                )
            );

            industrialist_mikado_add_meta_box_field(array(
                'type'			=> 'text',
                'name'			=> 'mkd_title_area_width_meta',
                'default_value'	=> '',
                'label'			=> esc_html__('Width','industrialist'),
                'description'   => esc_html__('This option will set maximum content width in Title Area ("px" or "%")','industrialist'),
                'parent'		=> $title_area_type_meta_container,
                'args' => array(
                    'col_width' => 3,
                )
            ));

            $group_page_title_styles = industrialist_mikado_add_admin_group(array(
                'name'			=> 'group_page_title_styles',
                'title'			=> esc_html__('Title','industrialist'),
                'description'	=> esc_html__('Define styles for page title','industrialist'),
                'parent'		=> $title_area_type_meta_container
            ));

                $row_page_title_styles_1 = industrialist_mikado_add_admin_row(array(
                    'name'		=> 'row_page_title_styles_1',
                    'parent'	=> $group_page_title_styles
                ));

                    industrialist_mikado_add_meta_box_field(array(
                        'type'			=> 'colorsimple',
                        'name'			=> 'mkd_page_title_color_meta',
                        'default_value'	=> '',
                        'label'			=> esc_html__( 'Text Color','industrialist'),
                        'parent'		=> $row_page_title_styles_1
                    ));

                    industrialist_mikado_add_meta_box_field(array(
                        'type'			=> 'textsimple',
                        'name'			=> 'mkd_page_title_fontsize_meta',
                        'default_value'	=> '',
                        'label'			=> esc_html__( 'Font Size','industrialist'),
                        'args'			=> array(
                            'suffix'	=> 'px'
                        ),
                        'parent'		=> $row_page_title_styles_1
                    ));

                    industrialist_mikado_add_meta_box_field(array(
                        'type'			=> 'textsimple',
                        'name'			=> 'mkd_page_title_lineheight_meta',
                        'default_value'	=> '',
                        'label'			=> esc_html__( 'Line Height','industrialist'),
                        'args'			=> array(
                            'suffix'	=> 'px'
                        ),
                        'parent'		=> $row_page_title_styles_1
                    ));

                    industrialist_mikado_add_meta_box_field(array(
                        'type'			=> 'selectblanksimple',
                        'name'			=> 'mkd_page_title_texttransform_meta',
                        'default_value'	=> '',
                        'label'			=> esc_html__('Text Transform','industrialist'),
                        'options'		=> industrialist_mikado_get_text_transform_array(),
                        'parent'		=> $row_page_title_styles_1
                    ));

                $row_page_title_styles_2 = industrialist_mikado_add_admin_row(array(
                    'name'		=> 'row_page_title_styles_2',
                    'parent'	=> $group_page_title_styles,
                    'next'		=> true
                ));

                    industrialist_mikado_add_meta_box_field(array(
                        'type'			=> 'selectblanksimple',
                        'name'			=> 'mkd_page_title_fontstyle_meta',
                        'default_value'	=> '',
                        'label'			=> esc_html__('Font Style','industrialist'),
                        'options'		=> industrialist_mikado_get_font_style_array(),
                        'parent'		=> $row_page_title_styles_2
                    ));

                    industrialist_mikado_add_meta_box_field(array(
                        'type'			=> 'selectblanksimple',
                        'name'			=> 'mkd_page_title_fontweight_meta',
                        'default_value'	=> '',
                        'label'			=> esc_html__( 'Font Weight','industrialist'),
                        'options'		=> industrialist_mikado_get_font_weight_array(),
                        'parent'		=> $row_page_title_styles_2
                    ));

                    industrialist_mikado_add_meta_box_field(array(
                        'type'			=> 'textsimple',
                        'name'			=> 'mkd_page_title_letter_spacing_meta',
                        'default_value'	=> '',
                        'label'			=> esc_html__('Letter Spacing','industrialist'),
                        'args'			=> array(
                            'suffix'	=> 'px'
                        ),
                        'parent'		=> $row_page_title_styles_2
                    ));

                    industrialist_mikado_add_meta_box_field(array(
                        'type'			=> 'textsimple',
                        'name'			=> 'mkd_page_title_margin_bottom_meta',
                        'default_value'	=> '',
                        'label'			=> esc_html__('Margin Bottom','industrialist'),
                        'args'			=> array(
                            'suffix'	=> 'px'
                        ),
                        'parent'		=> $row_page_title_styles_2
                    ));

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_title_area_animation_meta',
                'type' => 'select',
                'default_value' => '',
                'label' =>esc_html__( 'Animations','industrialist'),
                'description' =>esc_html__( 'Choose an animation for Title Area','industrialist'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No Animation','industrialist'),
                    'right-left' =>esc_html__( 'Text right to left','industrialist'),
                    'left-right' =>esc_html__( 'Text left to right','industrialist')
                )
            )
        );

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment','industrialist'),
                'description' =>esc_html__( 'Specify title vertical alignment','industrialist'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' =>esc_html__( 'From Bottom of Header','industrialist'),
                    'window_top' =>esc_html__( 'From Window Top','industrialist')
                )
            )
        );

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' =>esc_html__( 'Horizontal Alignment','industrialist'),
                'description' =>esc_html__( 'Specify title horizontal alignment','industrialist'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' =>esc_html__( 'Left','industrialist'),
                    'center' =>esc_html__( 'Center','industrialist'),
                    'right' => esc_html__('Right','industrialist')
                )
            )
        );

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' =>esc_html__( 'Breadcrumb Color','industrialist'),
                'description' =>esc_html__( 'Choose a color for breadcrumb text','industrialist'),
                'parent' => $show_title_area_meta_container
            )
        );

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color','industrialist'),
                'description' =>esc_html__( 'Choose a background color for Title Area','industrialist'),
                'parent' => $show_title_area_meta_container
            )
        );

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' =>esc_html__( 'Hide Background Image','industrialist'),
                'description' =>esc_html__( 'Enable this option to hide background image in Title Area','industrialist'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#mkd_mkd_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'mkd_hide_background_image_meta_container',
                'hidden_property' => 'mkd_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_title_area_background_image_meta',
                'type' => 'image',
                'label' =>esc_html__( 'Background Image','industrialist'),
                'description' =>esc_html__( 'Choose an Image for Title Area','industrialist'),
                'parent' => $hide_background_image_meta_container
            )
        );

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' =>esc_html__( 'Background Responsive Image','industrialist'),
                'description' => esc_html__('Enabling this option will make Title background image responsive','industrialist'),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No','industrialist'),
                    'yes' =>esc_html__( 'Yes','industrialist')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta",
                        "no" => "#mkd_mkd_title_area_background_image_responsive_meta_container, #mkd_mkd_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'mkd_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'mkd_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

            industrialist_mikado_add_meta_box_field(
                array(
                    'name' => 'mkd_title_area_background_image_parallax_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__('Background Image in Parallax','industrialist'),
                    'description' =>esc_html__( 'Enabling this option will make Title background image parallax','industrialist'),
                    'parent' => $title_area_background_image_responsive_meta_container,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__('No','industrialist'),
                        'yes' => esc_html__('Yes','industrialist'),
                        'yes_zoom' =>esc_html__( 'Yes, with zoom out','industrialist')
                    )
                )
            );

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'mkd_title_area_height_meta',
            'type' => 'text',
            'label' =>esc_html__( 'Height','industrialist'),
            'description' => esc_html__('Set a height for Title Area','industrialist'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'mkd_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__('Subtitle Text','industrialist'),
            'description' =>esc_html__( 'Enter your subtitle text','industrialist'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color','industrialist'),
                'description' =>esc_html__( 'Choose a color for subtitle text','industrialist'),
                'parent' => $show_title_area_meta_container
            )
        );