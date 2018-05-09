<?php

if (!function_exists('industrialist_mikado_woocommerce_options_map')) {

    /**
     * Add Woocommerce options page
     */
    function industrialist_mikado_woocommerce_options_map() {

        industrialist_mikado_add_admin_page(
            array(
                'slug' => '_woocommerce_page',
                'title' =>esc_html__( 'Woocommerce','industrialist'),
                'icon' => 'fa fa-shopping-cart'
            )
        );

        /**
         * Product List Settings
         */
        $panel_product_list = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_product_list',
                'title' => esc_html__('Product List', 'industrialist'),
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'mkd_woo_product_list_columns',
            'type' => 'select',
            'label' => esc_html__('Product List Columns', 'industrialist'),
            'default_value' => 'mkd-woocommerce-columns-4',
            'description' => esc_html__('Choose number of columns for product listing and related products on single product', 'industrialist'),
            'options' => array(
                'mkd-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'industrialist'),
                'mkd-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'industrialist')
            ),
            'parent' => $panel_product_list,
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'mkd_woo_products_per_page',
            'type' => 'text',
            'label' => esc_html__('Number of products per page', 'industrialist'),
            'default_value' => '',
            'description' => esc_html__('Set number of products on shop page', 'industrialist'),
            'parent' => $panel_product_list,
            'args' => array(
                'col_width' => 3
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'name' => 'mkd_products_list_title_tag',
            'type' => 'select',
            'label' => esc_html__('Products Title Tag', 'industrialist'),
            'default_value' => 'h5',
            'description' => '',
            'options' => array(
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ),
            'parent' => $panel_product_list,
        ));

        /**
         * Single Product Settings
         */
        $panel_single_product = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_single_product',
                'title' => esc_html__('Single Product', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'mkd_single_product_title_tag',
            'type' => 'select',
            'label' => esc_html__('Single Product Title Tag', 'industrialist'),
            'default_value' => 'h2',
            'description' => '',
            'options' => array(
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ),
            'parent' => $panel_single_product,
        ));

        /**
         * DropDown Cart Widget Settings
         */
        $panel_dropdown_cart = industrialist_mikado_add_admin_panel(
            array(
                'page' => '_woocommerce_page',
                'name' => 'panel_dropdown_cart',
                'title' => esc_html__('Dropdown Cart Widget', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(array(
            'name' => 'mkd_woo_dropdown_cart_description',
            'type' => 'text',
            'label' => esc_html__('Cart Description', 'industrialist'),
            'default_value' => '',
            'description' => esc_html__('Enter dropdown cart description', 'industrialist'),
            'parent' => $panel_dropdown_cart
        ));
    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_woocommerce_options_map', 25);
}