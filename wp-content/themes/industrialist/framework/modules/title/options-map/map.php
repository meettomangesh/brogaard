<?php

if ( ! function_exists('industrialist_mikado_title_options_map') ) {

	function industrialist_mikado_title_options_map() {

		industrialist_mikado_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' =>esc_html__( 'Title','industrialist'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = industrialist_mikado_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' =>esc_html__( 'Title Settings','industrialist')
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' =>esc_html__( 'Show Title Area','industrialist'),
				'description' => esc_html__('This option will enable/disable Title Area','industrialist'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkd_show_title_area_container"
				)
			)
		);

		$show_title_area_container = industrialist_mikado_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' =>esc_html__( 'Title Area Type','industrialist'),
				'description' =>esc_html__( 'Choose title type','industrialist'),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' =>esc_html__( 'Standard','industrialist'),
					'breadcrumb' =>esc_html__( 'Breadcrumb','industrialist')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumb" => "#mkd_title_area_type_container"
					),
					"show" => array(
						"standard" => "#mkd_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = industrialist_mikado_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value' => '',
				'hidden_values' => array('breadcrumb'),
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_enable_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Breadcrumbs','industrialist'),
				'description' =>esc_html__( 'This option will display Breadcrumbs in Title Area','industrialist'),
				'parent' => $title_area_type_container,
			)
		);

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'title_area_separator',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Enable Separator','industrialist'),
                'description' => esc_html__('This option will display Separator in Title Area','industrialist'),
                'parent' => $title_area_type_container,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'title_area_width',
                'type' => 'text',
                'default_value' => '',
                'label'			=> esc_html__('Width','industrialist'),
                'description'   => esc_html__('This option will set maximum content width in Title Area ("px" or "%")','industrialist'),
                'parent' => $title_area_type_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_animation',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__( 'Animations','industrialist'),
				'description' => esc_html__('Choose an animation for Title Area','industrialist'),
				'parent' => $show_title_area_container,
				'options' => array(
					'no' => esc_html__('No Animation','industrialist'),
					'right-left' => esc_html__('Text right to left','industrialist'),
					'left-right' =>esc_html__( 'Text left to right','industrialist')
				)
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_vertial_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__('Vertical Alignment','industrialist'),
				'description' => esc_html__('Specify title vertical alignment','industrialist'),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__('From Bottom of Header','industrialist'),
					'window_top' => esc_html__('From Window Top','industrialist')
				)
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' =>esc_html__( 'Horizontal Alignment','industrialist'),
				'description' =>esc_html__( 'Specify title horizontal alignment','industrialist'),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__('Left','industrialist'),
					'center' => esc_html__('Center','industrialist'),
					'right' => esc_html__('Right','industrialist')
				)
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' =>esc_html__( 'Background Color','industrialist'),
				'description' =>esc_html__( 'Choose a background color for Title Area','industrialist'),
				'parent' => $show_title_area_container
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' =>esc_html__( 'Background Image','industrialist'),
				'description' =>esc_html__( 'Choose an Image for Title Area','industrialist'),
				'parent' => $show_title_area_container
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image','industrialist'),
				'description' => esc_html__('Enabling this option will make Title background image responsive','industrialist'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#mkd_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = industrialist_mikado_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax','industrialist'),
				'description' =>esc_html__( 'Enabling this option will make Title background image parallax','industrialist'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No','industrialist'),
					'yes' =>esc_html__( 'Yes','industrialist'),
					'yes_zoom' => esc_html__('Yes, with zoom out','industrialist')
				)
			)
		);

		industrialist_mikado_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height','industrialist'),
			'description' => esc_html__('Set a height for Title Area','industrialist'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 3,
				'suffix' => 'px'
			)
		));


		$panel_typography = industrialist_mikado_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography','industrialist')
			)
		);

		$group_page_title_styles = industrialist_mikado_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Title','industrialist'),
			'description'	=> esc_html__('Define styles for page title','industrialist'),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = industrialist_mikado_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Text Color','industrialist'),
			'parent'		=> $row_page_title_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_fontsize',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Font Size','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_lineheight',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Line Height','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_texttransform',
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

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label'			=>esc_html__( 'Font Family','industrialist'),
			'parent'		=> $row_page_title_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','industrialist'),
			'options'		=> industrialist_mikado_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontweight',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Font Weight','industrialist'),
			'options'		=> industrialist_mikado_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

		$group_page_subtitle_styles = industrialist_mikado_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title'			=> esc_html__('Subtitle','industrialist'),
			'description'	=> esc_html__('Define styles for page subtitle','industrialist'),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = industrialist_mikado_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Text Color','industrialist'),
			'parent'		=> $row_page_subtitle_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','industrialist'),
			'options'		=> industrialist_mikado_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = industrialist_mikado_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family','industrialist'),
			'parent'		=> $row_page_subtitle_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontstyle',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Font Style','industrialist'),
			'options'		=> industrialist_mikado_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontweight',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Font Weight','industrialist'),
			'options'		=> industrialist_mikado_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));


        $group_page_title_separator_styles = industrialist_mikado_add_admin_group(array(
            'name'			=> 'group_page_title_separator',
            'title'			=> esc_html__('Separator','industrialist'),
            'description'	=> esc_html__('Define styles for page title separator','industrialist'),
            'parent'		=> $panel_typography
        ));

        $row_page_title_separator_styles_1 = industrialist_mikado_add_admin_row(array(
            'name'		=> 'row_page_title_separator_styles_1',
            'parent'	=> $group_page_title_separator_styles
        ));

        industrialist_mikado_add_admin_field(array(
            'type'			=> 'colorsimple',
            'name'			=> 'page_title_separator_color',
            'default_value'	=> '',
            'label'			=> esc_html__( 'Color','industrialist'),
            'parent'		=> $row_page_title_separator_styles_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_separator_width',
            'default_value'	=> '',
            'label'			=> esc_html__('Width','industrialist'),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_title_separator_styles_1
        ));

        industrialist_mikado_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_separator_thickness',
            'default_value'	=> '',
            'label'			=> esc_html__('Thickness','industrialist'),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_title_separator_styles_1
        ));

        $row_page_separator_styles_2 = industrialist_mikado_add_admin_row(array(
            'name'		=> 'row_page_title_separator_styles_2',
            'parent'	=> $group_page_title_separator_styles,
            'next'		=> true
        ));

        industrialist_mikado_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_separator_margin_top',
            'default_value'	=> '',
            'label'			=> esc_html__('Margin Top','industrialist'),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_separator_styles_2
        ));

        industrialist_mikado_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_separator_margin_bottom',
            'default_value'	=> '',
            'label'			=> esc_html__('Margin Bottom','industrialist'),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_separator_styles_2
        ));

		$group_page_breadcrumbs_styles = industrialist_mikado_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title'			=> esc_html__('Breadcrumbs','industrialist'),
			'description'	=>esc_html__( 'Define styles for page breadcrumbs','industrialist'),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = industrialist_mikado_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color','industrialist'),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_fontsize',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Font Size','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform','industrialist'),
			'options'		=> industrialist_mikado_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = industrialist_mikado_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family','industrialist'),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style','industrialist'),
			'options'		=> industrialist_mikado_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontweight',
			'default_value'	=> '',
			'label'			=>esc_html__( 'Font Weight','industrialist'),
			'options'		=> industrialist_mikado_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing','industrialist'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = industrialist_mikado_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color','industrialist'),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));

	}

	add_action( 'industrialist_mikado_options_map', 'industrialist_mikado_title_options_map', 6);

}