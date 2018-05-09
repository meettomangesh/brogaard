<?php

if (!function_exists('industrialist_mikado_portfolio_options_map')) {
    function industrialist_mikado_portfolio_options_map() {

        industrialist_mikado_add_admin_page(array(
            'slug' => '_portfolio',
            'title' => esc_html__('Portfolio', 'industrialist'),
            'icon' => 'fa fa-camera-retro'
        ));

        $panel_archive = industrialist_mikado_add_admin_panel(array(
            'title' => esc_html__('Portfolio Archive', 'industrialist'),
            'name' => 'panel_portfolio_archive',
            'page' => '_portfolio'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_archive_number_of_items',
            'type' => 'text',
            'label' => esc_html__('Number of Items', 'industrialist'),
            'description' => esc_html__('Set number of items for your portfolio list on archive pages. Default value is 12', 'industrialist'),
            'parent' => $panel_archive,
            'args' => array(
                'col_width' => 3
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_archive_number_of_columns',
            'type' => 'select',
            'label' => esc_html__('Number of Columns', 'industrialist'),
            'default_value' => '4',
            'description' => esc_html__('Set number of columns for your portfolio list on archive pages. Default value is 4 columns', 'industrialist'),
            'parent' => $panel_archive,
            'options' => array(
                '2' => esc_html__('2 Columns', 'industrialist'),
                '3' => esc_html__('3 Columns', 'industrialist'),
                '4' => esc_html__('4 Columns', 'industrialist'),
                '5' => esc_html__('5 Columns', 'industrialist')
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_archive_space_between_items',
            'type' => 'select',
            'label' => esc_html__('Space Between Items', 'industrialist'),
            'default_value' => 'normal',
            'description' => esc_html__('Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'industrialist'),
            'parent' => $panel_archive,
            'options' => array(
                'normal' => esc_html__('Normal', 'industrialist'),
                'small' => esc_html__('Small', 'industrialist'),
                'tiny' => esc_html__('Tiny', 'industrialist'),
                'no' => esc_html__('No Space', 'industrialist')
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_archive_image_size',
            'type' => 'select',
            'label' => esc_html__('Image Proportions', 'industrialist'),
            'default_value' => 'landscape',
            'description' => esc_html__('Set image proportions for your portfolio list on archive pages. Default value is landscape', 'industrialist'),
            'parent' => $panel_archive,
            'options' => array(
                'full' => esc_html__('Original', 'industrialist'),
                'landscape' => esc_html__('Landscape', 'industrialist'),
                'portrait' => esc_html__('Portrait', 'industrialist'),
                'square' => esc_html__('Square', 'industrialist')
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_archive_item_layout',
            'type' => 'select',
            'label' => esc_html__('Item Layout', 'industrialist'),
            'default_value' => 'standard-shader',
            'description' => esc_html__('Set item layour for your portfolio list on archive pages. Default value is Standard - Shader layout', 'industrialist'),
            'parent' => $panel_archive,
            'options' => array(
                'standard-shader' => esc_html__('Standard - Shader', 'industrialist'),
                'gallery-overlay' => esc_html__('Gallery - Overlay', 'industrialist')
            )
        ));

        $panel = industrialist_mikado_add_admin_panel(array(
            'title' => esc_html__('Portfolio Single', 'industrialist'),
            'name' => 'panel_portfolio_single',
            'page' => '_portfolio'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_template',
            'type' => 'select',
            'label' => esc_html__('Portfolio Type', 'industrialist'),
            'default_value' => 'small-images',
            'description' => esc_html__('Choose a default type for Single Project pages', 'industrialist'),
            'parent' => $panel,
            'options' => array(
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
                    'huge-images' => '',
                    'images' => '',
                    'small-images' => '',
                    'slider' => '',
                    'small-slider' => '',
                    'gallery' => '#mkd_portfolio_gallery_container',
                    'small-gallery' => '#mkd_portfolio_gallery_container',
                    'masonry' => '#mkd_portfolio_masonry_container',
                    'small-masonry' => '#mkd_portfolio_masonry_container',
                    'custom' => '',
                    'full-width-custom' => ''
                ),
                'hide' => array(
                    'huge-images' => '#mkd_portfolio_gallery_container, #mkd_portfolio_masonry_container',
                    'images' => '#mkd_portfolio_gallery_container, #mkd_portfolio_masonry_container',
                    'small-images' => '#mkd_portfolio_gallery_container, #mkd_portfolio_masonry_container',
                    'slider' => '#mkd_portfolio_gallery_container, #mkd_portfolio_masonry_container',
                    'small-slider' => '#mkd_portfolio_gallery_container, #mkd_portfolio_masonry_container',
                    'gallery' => '#mkd_portfolio_masonry_container',
                    'small-gallery' => '#mkd_portfolio_masonry_container',
                    'masonry' => '#mkd_portfolio_gallery_container',
                    'small-masonry' => '#mkd_portfolio_gallery_container',
                    'custom' => '#mkd_portfolio_gallery_container, #mkd_portfolio_masonry_container',
                    'full-width-custom' => '#mkd_portfolio_gallery_container, #mkd_portfolio_masonry_container'
                )
            )
        ));

        /***************** Gallery Layout *****************/

        $portfolio_gallery_container = industrialist_mikado_add_admin_container(array(
            'parent' => $panel,
            'name' => 'portfolio_gallery_container',
            'hidden_property' => 'portfolio_single_template',
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
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_gallery_columns_number',
            'type' => 'select',
            'label' => esc_html__('Number of Columns', 'industrialist'),
            'default_value' => 'three',
            'description' => esc_html__('Set number of columns for portfolio gallery type', 'industrialist'),
            'parent' => $portfolio_gallery_container,
            'options' => array(
                'two' => esc_html__('2 Columns', 'industrialist'),
                'three' => esc_html__('3 Columns', 'industrialist'),
                'four' => esc_html__('4 Columns', 'industrialist')
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_gallery_space_between_items',
            'type' => 'select',
            'label' => esc_html__('Space Between Items', 'industrialist'),
            'default_value' => 'normal',
            'description' => esc_html__('Set space size between columns for portfolio gallery type', 'industrialist'),
            'parent' => $portfolio_gallery_container,
            'options' => array(
                'normal' => esc_html__('Normal', 'industrialist'),
                'small' => esc_html__('Small', 'industrialist'),
                'tiny' => esc_html__('Tiny', 'industrialist'),
                'no' => esc_html__('No Space', 'industrialist')
            )
        ));

        /***************** Gallery Layout *****************/

        /***************** Masonry Layout *****************/

        $portfolio_masonry_container = industrialist_mikado_add_admin_container(array(
            'parent' => $panel,
            'name' => 'portfolio_masonry_container',
            'hidden_property' => 'portfolio_single_template',
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
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_masonry_columns_number',
            'type' => 'select',
            'label' => esc_html__('Number of Columns', 'industrialist'),
            'default_value' => 'three',
            'description' => esc_html__('Set number of columns for portfolio masonry type', 'industrialist'),
            'parent' => $portfolio_masonry_container,
            'options' => array(
                'two' => esc_html__('2 Columns', 'industrialist'),
                'three' => esc_html__('3 Columns', 'industrialist'),
                'four' => esc_html__('4 Columns', 'industrialist')
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_masonry_space_between_items',
            'type' => 'select',
            'label' => esc_html__('Space Between Items', 'industrialist'),
            'default_value' => 'normal',
            'description' => esc_html__('Set space size between columns for portfolio masonry type', 'industrialist'),
            'parent' => $portfolio_masonry_container,
            'options' => array(
                'normal' => esc_html__('Normal', 'industrialist'),
                'small' => esc_html__('Small', 'industrialist'),
                'tiny' => esc_html__('Tiny', 'industrialist'),
                'no' => esc_html__('No Space', 'industrialist')
            )
        ));

        /***************** Masonry Layout *****************/

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_lightbox_images',
            'type' => 'yesno',
            'label' => esc_html__('Enable Lightbox for Images', 'industrialist'),
            'description' => esc_html__('Enabling this option will turn on lightbox functionality for projects with images', 'industrialist'),
            'parent' => $panel,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_lightbox_videos',
            'type' => 'yesno',
            'label' => esc_html__('Enable Lightbox for Videos', 'industrialist'),
            'description' => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'industrialist'),
            'parent' => $panel,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_enable_categories',
            'type' => 'yesno',
            'label' => esc_html__('Enable Categories', 'industrialist'),
            'description' => esc_html__('Enabling this option will enable category meta description on single projects', 'industrialist'),
            'parent' => $panel,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_date',
            'type' => 'yesno',
            'label' => esc_html__('Enable Date', 'industrialist'),
            'description' => esc_html__('Enabling this option will enable date meta on single projects', 'industrialist'),
            'parent' => $panel,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_sticky_sidebar',
            'type' => 'yesno',
            'label' => esc_html__('Enable Sticky Side Text', 'industrialist'),
            'description' => esc_html__('Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'industrialist'),
            'parent' => $panel,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_comments',
            'type' => 'yesno',
            'label' => esc_html__('Show Comments', 'industrialist'),
            'description' => esc_html__('Enabling this option will show comments on your page', 'industrialist'),
            'parent' => $panel,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_hide_pagination',
            'type' => 'yesno',
            'label' => esc_html__('Hide Pagination', 'industrialist'),
            'description' => esc_html__('Enabling this option will turn off portfolio pagination functionality', 'industrialist'),
            'parent' => $panel,
            'default_value' => 'no',
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '#mkd_navigate_same_category_container'
            )
        ));

        $container_navigate_category = industrialist_mikado_add_admin_container(array(
            'name' => 'navigate_same_category_container',
            'parent' => $panel,
            'hidden_property' => 'portfolio_single_hide_pagination',
            'hidden_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_nav_same_category',
            'type' => 'yesno',
            'label' => esc_html__('Enable Pagination Through Same Category', 'industrialist'),
            'description' => esc_html__('Enabling this option will make portfolio pagination sort through current category', 'industrialist'),
            'parent' => $container_navigate_category,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'portfolio_single_slug',
            'type' => 'text',
            'label' => esc_html__('Portfolio Single Slug', 'industrialist'),
            'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'industrialist'),
            'parent' => $panel,
            'args' => array(
                'col_width' => 3
            )
        ));
    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_portfolio_options_map', 12);
}