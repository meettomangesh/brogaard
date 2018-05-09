<?php

if (!function_exists('industrialist_mikado_blog_options_map')) {

    function industrialist_mikado_blog_options_map() {

        industrialist_mikado_add_admin_page(
            array(
                'slug' => '_blog_page',
                'title' => esc_html__('Blog', 'industrialist'),
                'icon' => 'fa fa-files-o'
            )
        );

        /**
         * Blog Lists
         */

        $custom_sidebars = industrialist_mikado_get_custom_sidebars();

        $panel_blog_lists = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_blog_page',
                'name' => 'panel_blog_lists',
                'title' => esc_html__('Blog Lists', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_lists,
                'name' => 'templates_title_blog_list',
                'title' => esc_html__('Blog Templates', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_enable',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__('Enable Standard List Options', 'industrialist'),
            'description' => esc_html__('Enabling this option will display options for Standard Blog List', 'industrialist'),
            'parent' => $panel_blog_lists,
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_panel_blog_standard'
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_enable',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__('Enable Masonry List Options', 'industrialist'),
            'description' => esc_html__('Enabling this option will display options for Masonry Blog List', 'industrialist'),
            'parent' => $panel_blog_lists,
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_panel_blog_masonry'
            )
        ));

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_lists,
                'name' => 'archive_title_blog_list',
                'title' => esc_html__('Archive - All Posts', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_type',
            'type' => 'select',
            'label' => esc_html__('Blog Layout for Archive Pages', 'industrialist'),
            'description' => esc_html__('Choose a default blog layout', 'industrialist'),
            'default_value' => 'standard',
            'parent' => $panel_blog_lists,
            'options' => array(
                'standard' => esc_html__('Blog: Standard', 'industrialist'),
                'masonry' => esc_html__('Blog: Masonry', 'industrialist'),
                'masonry-full-width' => esc_html__('Blog: Masonry Full Width', 'industrialist'),
                'standard-whole-post' => esc_html__('Blog: Standard Whole Post', 'industrialist')
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'archive_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Archive and Category Sidebar', 'industrialist'),
            'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists', 'industrialist'),
            'parent' => $panel_blog_lists,
            'options' => array(
                'default' => esc_html__('No Sidebar', 'industrialist'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'industrialist'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'industrialist'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'industrialist'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'industrialist'),
            )
        ));


        if (count($custom_sidebars) > 0) {
            industrialist_mikado_add_admin_field(array(
                'name' => 'blog_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'industrialist'),
                'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"', 'industrialist'),
                'parent' => $panel_blog_lists,
                'options' => industrialist_mikado_get_custom_sidebars(),
                'args' => array(
                    'select2' => true
                )
            ));
        }

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'number_of_chars',
                'default_value' => '',
                'label' => esc_html__('Number of Words in Excerpt', 'industrialist'),
                'parent' => $panel_blog_lists,
                'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'industrialist'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_lists,
                'name' => 'pagination_title_blog_list',
                'title' => esc_html__('Pagination', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'pagination',
                'default_value' => 'yes',
                'label' => esc_html__('Pagination', 'industrialist'),
                'parent' => $panel_blog_lists,
                'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List', 'industrialist'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_mkd_pagination_container'
                )
            )
        );

        $pagination_container = industrialist_mikado_add_admin_container(
            array(
                'name' => 'mkd_pagination_container',
                'hidden_property' => 'pagination',
                'hidden_value' => 'no',
                'parent' => $panel_blog_lists,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'parent' => $pagination_container,
                'type' => 'text',
                'name' => 'blog_page_range',
                'default_value' => '',
                'label' => esc_html__('Pagination Range limit', 'industrialist'),
                'description' => esc_html__('Enter a number that will limit pagination to a certain range of links', 'industrialist'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );
        industrialist_mikado_add_admin_field(
            array(
                'type' => 'selectblank',
                'name' => 'pagination_type',
                'default_value' => 'standard_pagination',
                'label' => esc_html__('Pagination Type', 'industrialist'),
                'parent' => $pagination_container,
                'description' => esc_html__('Choose Pagination Type', 'industrialist'),
                'options' => array(
                    'standard_paginaton' => esc_html__('Standard Pagination', 'industrialist'),
                    'load_more_pagination' => esc_html__('Load More', 'industrialist')
                ),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        /* standard options */

        $panel_blog_standard = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_blog_page',
                'name' => 'panel_blog_standard',
                'title' => esc_html__('Blog Standard', 'industrialist'),
                'hidden_property' => 'blog_list_standard_enable',
                'hidden_value' => 'no',
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'blog_list_standard_date_position',
                'type' => 'yesno',
                'label' => esc_html__('Date outside', 'industrialist'),
                'description' => esc_html__('Date outside', 'industrialist'),
                'parent' => $panel_blog_standard,
                'default_value' => 'no',
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_separator',
            'type' => 'yesno',
            'label' => esc_html__('Show Separator', 'industrialist'),
            'description' => esc_html__('Enabling this option will show separator below title on your blog list.', 'industrialist'),
            'parent' => $panel_blog_standard,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'blog_list_standard_number_of_chars',
                'default_value' => '45',
                'label' => esc_html__('Number of Words in Excerpt', 'industrialist'),
                'parent' => $panel_blog_standard,
                'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'industrialist'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_standard,
                'name' => 'post_info_title_blog_list_standard',
                'title' => esc_html__('Post Info', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_category',
            'type' => 'yesno',
            'label' => esc_html__('Show Category', 'industrialist'),
            'description' => esc_html__('Enabling this option will show category post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_standard,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_date',
            'type' => 'yesno',
            'label' => esc_html__('Show Date', 'industrialist'),
            'description' => esc_html__('Enabling this option will show date post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_standard,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_author',
            'type' => 'yesno',
            'label' => esc_html__('Show Author', 'industrialist'),
            'description' => esc_html__('Enabling this option will show author post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_standard,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_comment',
            'type' => 'yesno',
            'label' => esc_html__('Show Comments', 'industrialist'),
            'description' => esc_html__('Enabling this option will show comments post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_standard,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_like',
            'type' => 'yesno',
            'label' => esc_html__('Show Like', 'industrialist'),
            'description' => esc_html__('Enabling this option will show like post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_standard,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_share',
            'type' => 'yesno',
            'label' => esc_html__('Show Share', 'industrialist'),
            'description' => esc_html__('Enabling this option will show share post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_standard,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_standard_read_more',
            'type' => 'yesno',
            'label' => esc_html__('Show Read More', 'industrialist'),
            'description' => esc_html__('Enabling this option will show read more button on your blog page.', 'industrialist'),
            'parent' => $panel_blog_standard,
            'default_value' => 'no'
        ));

        /* masonry options */

        $panel_blog_masonry = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_blog_page',
                'name' => 'panel_blog_masonry',
                'title' => esc_html__('Blog Masonry', 'industrialist'),
                'hidden_property' => 'blog_list_masonry_enable',
                'hidden_value' => 'no'
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_column',
            'type' => 'select',
            'label' => esc_html__('Number of Columns', 'industrialist'),
            'description' => esc_html__('Choose number of columns for Blog Masonry', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'options' => array(
                'one' => esc_html__('One', 'industrialist'),
                'two' => esc_html__('Two', 'industrialist'),
                'three' => esc_html__('Three', 'industrialist'),
                'four' => esc_html__('Four', 'industrialist'),
                'five' => esc_html__('Five', 'industrialist')
            ),
            'default_value' => 'three'
        ));

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'masonry_filter',
                'default_value' => 'no',
                'label' => esc_html__('Masonry Filter', 'industrialist'),
                'parent' => $panel_blog_masonry,
                'description' => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates', 'industrialist'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_separator',
            'type' => 'yesno',
            'label' => esc_html__('Show Separator', 'industrialist'),
            'description' => esc_html__('Enabling this option will show separator below title on your blog list.', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'blog_list_masonry_number_of_chars',
                'default_value' => '45',
                'label' => esc_html__('Number of Words in Excerpt', 'industrialist'),
                'parent' => $panel_blog_masonry,
                'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'industrialist'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_masonry,
                'name' => 'post_info_title_blog_list_masonry',
                'title' => esc_html__('Post Info', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_category',
            'type' => 'yesno',
            'label' => esc_html__('Show Category', 'industrialist'),
            'description' => esc_html__('Enabling this option will show category post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_date',
            'type' => 'yesno',
            'label' => esc_html__('Show Date', 'industrialist'),
            'description' => esc_html__('Enabling this option will show date post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_author',
            'type' => 'yesno',
            'label' => esc_html__('Show Author', 'industrialist'),
            'description' => esc_html__('Enabling this option will show author post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_comment',
            'type' => 'yesno',
            'label' => esc_html__('Show Comments', 'industrialist'),
            'description' => esc_html__('Enabling this option will show comments post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_like',
            'type' => 'yesno',
            'label' => esc_html__('Show Like', 'industrialist'),
            'description' => esc_html__('Enabling this option will show like post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_share',
            'type' => 'yesno',
            'label' => esc_html__('Show Share', 'industrialist'),
            'description' => esc_html__('Enabling this option will show share post info on your blog page.', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_list_masonry_read_more',
            'type' => 'yesno',
            'label' => esc_html__('Show Read More', 'industrialist'),
            'description' => esc_html__('Enabling this option will show read more button on your blog page.', 'industrialist'),
            'parent' => $panel_blog_masonry,
            'default_value' => 'no'
        ));

        /**
         * Blog Single
         */
        $panel_blog_single = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_blog_page',
                'name' => 'panel_blog_single',
                'title' => esc_html__('Blog Single', 'industrialist')
            )
        );


        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_sidebar_layout',
            'type' => 'select',
            'label' => esc_html__('Sidebar Layout', 'industrialist'),
            'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'industrialist'),
            'parent' => $panel_blog_single,
            'options' => array(
                'default' => esc_html__('No Sidebar', 'industrialist'),
                'sidebar-33-right' => esc_html__('Sidebar 1/3 Right', 'industrialist'),
                'sidebar-25-right' => esc_html__('Sidebar 1/4 Right', 'industrialist'),
                'sidebar-33-left' => esc_html__('Sidebar 1/3 Left', 'industrialist'),
                'sidebar-25-left' => esc_html__('Sidebar 1/4 Left', 'industrialist')
            ),
            'default_value' => 'default'
        ));


        if (count($custom_sidebars) > 0) {
            industrialist_mikado_add_admin_field(array(
                'name' => 'blog_single_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'industrialist'),
                'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'industrialist'),
                'parent' => $panel_blog_single,
                'options' => industrialist_mikado_get_custom_sidebars(),
                'args' => array(
                    'select2' => true
                )
            ));
        }

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_title_in_title_area',
            'type' => 'yesno',
            'label' => esc_html__('Show Post Title in Title Area', 'industrialist'),
            'description' => esc_html__('Enabling this option will show post title in title area on single post pages', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'no'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_separator',
            'type' => 'yesno',
            'label' => esc_html__('Show Separator', 'industrialist'),
            'description' => esc_html__('Enabling this option will show separator post info on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        //Post Info
        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_single,
                'name' => 'post_info_title_blog_single',
                'title' => esc_html__('Post Info', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_date',
            'type' => 'yesno',
            'label' => esc_html__('Show Date', 'industrialist'),
            'description' => esc_html__('Enabling this option will show date post info on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_author',
            'type' => 'yesno',
            'label' => esc_html__('Show Author', 'industrialist'),
            'description' => esc_html__('Enabling this option will show author post info on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_comments',
            'type' => 'yesno',
            'label' => esc_html__('Show Comments', 'industrialist'),
            'description' => esc_html__('Enabling this option will show comments post info on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_like',
            'type' => 'yesno',
            'label' => esc_html__('Show Like', 'industrialist'),
            'description' => esc_html__('Enabling this option will show like post info on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_share',
            'type' => 'yesno',
            'label' => esc_html__('Show Share', 'industrialist'),
            'description' => esc_html__('Enabling this option will show share post info on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_tags',
            'type' => 'yesno',
            'label' => esc_html__('Show Tags', 'industrialist'),
            'description' => esc_html__('Enabling this option will show post tags on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes'
        ));

        //Post Info Category

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_single,
                'name' => 'post_info_category_title_blog_single',
                'title' => esc_html__('Category', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_category',
            'type' => 'yesno',
            'label' => esc_html__('Show Category', 'industrialist'),
            'description' => esc_html__('Enabling this option will show category post info on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'yes',
        ));

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_single,
                'name' => 'navigation_title_blog_single',
                'title' => esc_html__('Navigation', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_single_navigation',
                'default_value' => 'no',
                'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'industrialist'),
                'parent' => $panel_blog_single,
                'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'industrialist'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_mkd_blog_single_navigation_container'
                )
            )
        );

        $blog_single_navigation_container = industrialist_mikado_add_admin_container(
            array(
                'name' => 'mkd_blog_single_navigation_container',
                'hidden_property' => 'blog_single_navigation',
                'hidden_value' => 'no',
                'parent' => $panel_blog_single,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_navigation_through_same_category',
                'default_value' => 'no',
                'label' => esc_html__('Enable Navigation Only in Current Category', 'industrialist'),
                'description' => esc_html__('Limit your navigation only through current category', 'industrialist'),
                'parent' => $blog_single_navigation_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_single,
                'name' => 'author_info_box_title_blog_single',
                'title' => esc_html__('Author', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_author_info',
                'default_value' => 'no',
                'label' => esc_html__('Show Author Info Box', 'industrialist'),
                'parent' => $panel_blog_single,
                'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'industrialist'),
                'args' => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#mkd_mkd_blog_single_author_info_container'
                )
            )
        );

        $blog_single_author_info_container = industrialist_mikado_add_admin_container(
            array(
                'name' => 'mkd_blog_single_author_info_container',
                'hidden_property' => 'blog_author_info',
                'hidden_value' => 'no',
                'parent' => $panel_blog_single,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'yesno',
                'name' => 'blog_author_info_email',
                'default_value' => 'no',
                'label' => esc_html__('Show Author Email', 'industrialist'),
                'description' => esc_html__('Enabling this option will show author email', 'industrialist'),
                'parent' => $blog_single_author_info_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );

        industrialist_mikado_add_admin_section_title(
            array(
                'parent' => $panel_blog_single,
                'name' => 'related_posts_blog_single',
                'title' => esc_html__('Related Posts', 'industrialist')
            )
        );


        industrialist_mikado_add_admin_field(array(
            'name' => 'blog_single_related_posts',
            'type' => 'yesno',
            'label' => esc_html__('Show Related Posts', 'industrialist'),
            'description' => esc_html__('Enabling this option will show related posts on your single post page.', 'industrialist'),
            'parent' => $panel_blog_single,
            'default_value' => 'no',
            'args' => array(
                'dependence' => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkd_related_image_container'
            )
        ));

        $related_image_container = industrialist_mikado_add_admin_container(
            array(
                'name' => 'related_image_container',
                'hidden_property' => 'blog_single_related_posts',
                'hidden_value' => 'no',
                'parent' => $panel_blog_single,
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'type' => 'text',
                'name' => 'blog_single_related_image_size',
                'default_value' => '',
                'label' => esc_html__('Related Posts Image Max Width', 'industrialist'),
                'parent' => $related_image_container,
                'description' => esc_html__('Define maximum width for related posts images on your single post pages. Default value is 1200', 'industrialist'),
                'args' => array(
                    'col_width' => 3
                )
            )
        );

    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_blog_options_map', 11);

}











