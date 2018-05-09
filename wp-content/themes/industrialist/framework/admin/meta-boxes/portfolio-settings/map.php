<?php

if (!function_exists('industrialist_mikado_map_portfolio_settings')) {
    function industrialist_mikado_map_portfolio_settings() {
        $meta_box = industrialist_mikado_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'industrialist'),
            'name' => 'portfolio_settings_meta_box'
        ));

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'mkd_portfolio_single_template_meta',
            'type' => 'select',
            'label' => esc_html__('Portfolio Type', 'industrialist'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'industrialist'),
            'parent' => $meta_box,
            'options' => array(
                '' => esc_html__('Default', 'industrialist'),
                'huge-images' => esc_html__('Portfolio Full Width Images', 'industrialist'),
                'images' => esc_html__('Portfolio Images', 'industrialist'),
                'small-images' => esc_html__('Portfolio Small Images', 'industrialist'),
                'slider' => esc_html__('Portfolio Slider', 'industrialist'),
                'small-slider' => esc_html__('Portfolio Small Slider', 'industrialist'),
                'gallery' => esc_html__('Portfolio Gallery', 'industrialist'),
                'small-gallery' => esc_html__('Portfolio Small Gallery', 'industrialist'),
                'masonry' => esc_html__('Portfolio Masonry', 'industrialist'),
                'small-masonry' => esc_html__('Portfolio Small Masonry', 'industrialist'),
                'custom' => esc_html__('Portfolio Custom', 'industrialist'),
                'full-width-custom' => esc_html__('Portfolio Full Width Custom', 'industrialist')
            ),
            'args' => array(
                'dependence' => true,
                'show' => array(
                    '' => '',
                    'huge-images' => '',
                    'images' => '',
                    'small-images' => '',
                    'slider' => '',
                    'small-slider' => '',
                    'gallery' => '#mkd_mkd_gallery_type_meta_container',
                    'small-gallery' => '#mkd_mkd_gallery_type_meta_container',
                    'masonry' => '#mkd_mkd_masonry_type_meta_container',
                    'small-masonry' => '#mkd_mkd_masonry_type_meta_container',
                    'custom' => '',
                    'full-width-custom' => ''
                ),
                'hide' => array(
                    '' => '#mkd_mkd_gallery_type_meta_container, #mkd_mkd_masonry_type_meta_container',
                    'huge-images' => '#mkd_mkd_gallery_type_meta_container, #mkd_mkd_masonry_type_meta_container',
                    'images' => '#mkd_mkd_gallery_type_meta_container, #mkd_mkd_masonry_type_meta_container',
                    'small-images' => '#mkd_mkd_gallery_type_meta_container, #mkd_mkd_masonry_type_meta_container',
                    'slider' => '#mkd_mkd_gallery_type_meta_container, #mkd_mkd_masonry_type_meta_container',
                    'small-slider' => '#mkd_mkd_gallery_type_meta_container, #mkd_mkd_masonry_type_meta_container',
                    'gallery' => '#mkd_mkd_masonry_type_meta_container',
                    'small-gallery' => '#mkd_mkd_masonry_type_meta_container',
                    'masonry' => '#mkd_mkd_gallery_type_meta_container',
                    'small-masonry' => '#mkd_mkd_gallery_type_meta_container',
                    'custom' => '#mkd_mkd_gallery_type_meta_container, #mkd_mkd_masonry_type_meta_container',
                    'full-width-custom' => '#mkd_mkd_gallery_type_meta_container, #mkd_mkd_masonry_type_meta_container'
                )
            )
        ));

        /***************** Gallery Layout *****************/

        $gallery_type_meta_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $meta_box,
                'name' => 'mkd_gallery_type_meta_container',
                'hidden_property' => 'mkd_portfolio_single_template_meta',
                'hidden_values' => array(
                    'huge-images',
                    'images',
                    'small-images',
                    'slider',
                    'small-slider',
                    'masonry',
                    'small-masonry',
                    'custom',
                    'full-width-custom'
                )
            )
        );

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'mkd_portfolio_single_gallery_columns_number_meta',
            'type' => 'select',
            'label' => esc_html__('Number of Columns', 'industrialist'),
            'default_value' => '',
            'description' => esc_html__('Set number of columns for portfolio gallery type', 'industrialist'),
            'parent' => $gallery_type_meta_container,
            'options' => array(
                '' => esc_html__('Default', 'industrialist'),
                'two' => esc_html__('2 Columns', 'industrialist'),
                'three' => esc_html__('3 Columns', 'industrialist'),
                'four' => esc_html__('4 Columns', 'industrialist')
            )
        ));

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'mkd_portfolio_single_gallery_space_between_items_meta',
            'type' => 'select',
            'label' => esc_html__('Space Between Items', 'industrialist'),
            'default_value' => '',
            'description' => esc_html__('Set space size between columns for portfolio gallery type', 'industrialist'),
            'parent' => $gallery_type_meta_container,
            'options' => array(
                '' => esc_html__('Default', 'industrialist'),
                'normal' => esc_html__('Normal', 'industrialist'),
                'small' => esc_html__('Small', 'industrialist'),
                'tiny' => esc_html__('Tiny', 'industrialist'),
                'no' => esc_html__('No Space', 'industrialist')
            )
        ));

        /***************** Gallery Layout *****************/

        /***************** Masonry Layout *****************/

        $masonry_type_meta_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $meta_box,
                'name' => 'mkd_masonry_type_meta_container',
                'hidden_property' => 'mkd_portfolio_single_template_meta',
                'hidden_values' => array(
                    'huge-images',
                    'images',
                    'small-images',
                    'slider',
                    'small-slider',
                    'gallery',
                    'small-gallery',
                    'custom',
                    'full-width-custom'
                )
            )
        );

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'mkd_portfolio_single_masonry_columns_number_meta',
            'type' => 'select',
            'label' => esc_html__('Number of Columns', 'industrialist'),
            'default_value' => '',
            'description' => esc_html__('Set number of columns for portfolio masonry type', 'industrialist'),
            'parent' => $masonry_type_meta_container,
            'options' => array(
                '' => esc_html__('Default', 'industrialist'),
                'two' => esc_html__('2 Columns', 'industrialist'),
                'three' => esc_html__('3 Columns', 'industrialist'),
                'four' => esc_html__('4 Columns', 'industrialist')
            )
        ));

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'mkd_portfolio_single_masonry_space_between_items_meta',
            'type' => 'select',
            'label' => esc_html__('Space Between Items', 'industrialist'),
            'default_value' => '',
            'description' => esc_html__('Set space size between columns for portfolio masonry type', 'industrialist'),
            'parent' => $masonry_type_meta_container,
            'options' => array(
                '' => esc_html__('Default', 'industrialist'),
                'normal' => esc_html__('Normal', 'industrialist'),
                'small' => esc_html__('Small', 'industrialist'),
                'tiny' => esc_html__('Tiny', 'industrialist'),
                'no' => esc_html__('No Space', 'industrialist')
            )
        ));

        /***************** Masonry Layout *****************/

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'portfolio_info_top_padding',
            'type' => 'text',
            'label' => esc_html__('Portfolio Info Top Padding', 'industrialist'),
            'description' => esc_html__('Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'industrialist'),
            'parent' => $meta_box,
            'args' => array(
                'col_width' => 3,
                'suffix' => 'px'
            )
        ));

        $all_pages = array();
        $pages = get_pages();
        foreach ($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'portfolio_single_back_to_link',
            'type' => 'select',
            'label' => esc_html__('"Back To" Link', 'industrialist'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'industrialist'),
            'parent' => $meta_box,
            'options' => $all_pages
        ));

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'portfolio_external_link',
            'type' => 'text',
            'label' => esc_html__('Portfolio External Link', 'industrialist'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'industrialist'),
            'parent' => $meta_box,
            'args' => array(
                'col_width' => 3
            )
        ));

        industrialist_mikado_add_meta_box_field(
            array(
                'name' => 'mkd_portfolio_featured_image_meta',
                'type' => 'image',
                'label' => esc_html__('Featured Image', 'industrialist'),
                'description' => esc_html__('Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'industrialist'),
                'parent' => $meta_box
            )
        );

        industrialist_mikado_add_meta_box_field(array(
            'name' => 'portfolio_masonry_dimensions',
            'type' => 'select',
            'label' => esc_html__('Dimensions for Masonry', 'industrialist'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'industrialist'),
            'parent' => $meta_box,
            'options' => array(
                '' => esc_html__('Default', 'industrialist'),
                'large-width' => esc_html__('Large Width', 'industrialist'),
            )
        ));
    }

    add_action('industrialist_mikado_meta_boxes_map', 'industrialist_mikado_map_portfolio_settings');
}