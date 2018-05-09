<?php

if (!function_exists('industrialist_mikado_woocommerce_products_per_page')) {
    /**
     * Function that sets number of products per page. Default is 12
     * @return int number of products to be shown per page
     */
    function industrialist_mikado_woocommerce_products_per_page() {

        $products_per_page = 12;

        if (industrialist_mikado_options()->getOptionValue('mkd_woo_products_per_page')) {
            $products_per_page = industrialist_mikado_options()->getOptionValue('mkd_woo_products_per_page');
        }
        if (isset($_GET['woo-products-count']) && $_GET['woo-products-count'] === 'view-all') {
            $products_per_page = 9999;
        }

        return $products_per_page;
    }
}

if (!function_exists('industrialist_mikado_woocommerce_related_products_args')) {
    /**
     * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
     * @param $args array array of args for the query
     * @return mixed array of changed args
     */
    function industrialist_mikado_woocommerce_related_products_args($args) {

        if (industrialist_mikado_options()->getOptionValue('mkd_woo_product_list_columns')) {

            $related = industrialist_mikado_options()->getOptionValue('mkd_woo_product_list_columns');
            switch ($related) {
                case 'mkd-woocommerce-columns-4':
                    $args['posts_per_page'] = 4;
                    break;
                case 'mkd-woocommerce-columns-3':
                    $args['posts_per_page'] = 3;
                    break;
                default:
                    $args['posts_per_page'] = 3;
            }

        } else {
            $args['posts_per_page'] = 3;
        }

        return $args;
    }
}

if (!function_exists('industrialist_mikado_woocommerce_template_loop_product_title')) {
    /**
     * Function for overriding product title template in Product List Loop
     */
    function industrialist_mikado_woocommerce_template_loop_product_title() {

        $tag = industrialist_mikado_options()->getOptionValue('mkd_products_list_title_tag');
        if ($tag === '') {
            $tag = 'h5';
        }
        the_title('<' . $tag . ' class="mkd-product-list-title"><a href="' . get_the_permalink() . '">', '</a></' . $tag . '>');
    }
}

if (!function_exists('industrialist_mikado_woocommerce_single_add_pretty_photo_for_images')) {
    /**
     * Function that add necessary html attributes for prettyPhoto
     */
    function industrialist_mikado_woocommerce_single_add_pretty_photo_for_images($html, $attachment_id) {
        $our_html = '';

        if (!empty($html)) {
            $full_size_image = wp_get_attachment_image_src($attachment_id, 'full');

            $attributes = array(
                'data-src' => $full_size_image[0],
                'data-large_image' => $full_size_image[0],
                'data-large_image_width' => $full_size_image[1],
                'data-large_image_height' => $full_size_image[2],
            );

            $our_html .= '<div class="woocommerce-product-gallery__image"><a href="' . esc_url($full_size_image[0]) . '" data-rel="prettyPhoto[woo_single_pretty_photo]">';
            $our_html .= wp_get_attachment_image($attachment_id, 'shop_single', false, $attributes);
            $our_html .= '</a></div>';

            $html = $our_html;
        }

        return $html;
    }

    add_filter('woocommerce_single_product_image_thumbnail_html', 'industrialist_mikado_woocommerce_single_add_pretty_photo_for_images', 10, 2);
}

if (!function_exists('industrialist_mikado_woocommerce_template_single_title')) {
    /**
     * Function for overriding product title template in Single Product template
     */
    function industrialist_mikado_woocommerce_template_single_title() {

        $tag = industrialist_mikado_options()->getOptionValue('mkd_single_product_title_tag');
        if ($tag === '') {
            $tag = 'h1';
        }
        the_title('<' . $tag . '  itemprop="name" class="mkd-single-product-title">', '</' . $tag . '>');
    }
}

if (!function_exists('industrialist_mikado_woocommerce_sale_flash')) {
    /**
     * Function for overriding Sale Flash Template
     *
     * @return string
     */
    function industrialist_mikado_woocommerce_sale_flash() {

        return '<span class="mkd-onsale">' . esc_html__('SALE', 'industrialist') . '</span>';
    }
}

if (!function_exists('industrialist_mikado_woocommerce_product_out_of_stock')) {
    /**
     * Function for adding Out Of Stock Template
     *
     * @return string
     */
    function industrialist_mikado_woocommerce_product_out_of_stock() {

        global $product;

        if (!$product->is_in_stock()) {
            print '<span class="mkd-out-of-stock">' . esc_html__('OUT OF STOCK', 'industrialist') . '</span>';
        }
    }
}

if (!function_exists('industrialist_mikado_woocommerce_view_all_pagination')) {
    /**
     * Function for adding New WooCommerce Pagination Template
     *
     * @return string
     */
    function industrialist_mikado_woocommerce_view_all_pagination() {

        global $wp_query;

        if ($wp_query->max_num_pages <= 1) {
            return;
        }

        $html = '';

        if (get_option('woocommerce_shop_page_id')) {
            $html .= '<div class="mkd-woo-view-all-pagination">';
            $html .= '<a href="' . get_permalink(get_option('woocommerce_shop_page_id')) . '?woo-products-count=view-all">' . esc_html__('View All', 'industrialist') . '</a>';
            $html .= '</div>';
        }

        print $html;
    }
}

if (!function_exists('industrialist_mikado_woo_view_all_pagination_additional_tag_before')) {
    function industrialist_mikado_woo_view_all_pagination_additional_tag_before() {

        print '<div class="mkd-woo-pagination-holder"><div class="mkd-woo-pagination-inner">';
    }
}

if (!function_exists('industrialist_mikado_woo_view_all_pagination_additional_tag_after')) {
    function industrialist_mikado_woo_view_all_pagination_additional_tag_after() {

        print '</div></div>';
    }
}

if (!function_exists('industrialist_mikado_single_product_content_additional_tag_before')) {
    function industrialist_mikado_single_product_content_additional_tag_before() {

        print '<div class="mkd-single-product-content">';
    }
}

if (!function_exists('industrialist_mikado_single_product_content_additional_tag_after')) {
    function industrialist_mikado_single_product_content_additional_tag_after() {

        print '</div>';
    }
}

if (!function_exists('industrialist_mikado_single_product_summary_additional_tag_before')) {
    function industrialist_mikado_single_product_summary_additional_tag_before() {

        print '<div class="mkd-single-product-summary">';
    }
}

if (!function_exists('industrialist_mikado_single_product_summary_additional_tag_after')) {
    function industrialist_mikado_single_product_summary_additional_tag_after() {

        print '</div>';
    }
}

if (!function_exists('industrialist_mikado_pl_holder_additional_tag_before')) {
    function industrialist_mikado_pl_holder_additional_tag_before() {

        print '<div class="mkd-pl-main-holder">';
    }
}

if (!function_exists('industrialist_mikado_pl_holder_additional_tag_after')) {
    function industrialist_mikado_pl_holder_additional_tag_after() {

        print '</div>';
    }
}

if (!function_exists('industrialist_mikado_pl_inner_additional_tag_before')) {
    function industrialist_mikado_pl_inner_additional_tag_before() {

        print '<div class="mkd-pl-inner">';
    }
}

if (!function_exists('industrialist_mikado_pl_inner_additional_tag_after')) {
    function industrialist_mikado_pl_inner_additional_tag_after() {

        print '</div>';
    }
}

if (!function_exists('industrialist_mikado_pl_image_additional_tag_before')) {
    function industrialist_mikado_pl_image_additional_tag_before() {

        print '<div class="mkd-pl-image">';
    }
}

if (!function_exists('industrialist_mikado_pl_image_additional_tag_after')) {
    function industrialist_mikado_pl_image_additional_tag_after() {

        print '</div>';
    }
}

if (!function_exists('industrialist_mikado_pl_inner_text_additional_tag_before')) {
    function industrialist_mikado_pl_inner_text_additional_tag_before() {

        print '<div class="mkd-pl-text"><div class="mkd-pl-text-outer"><div class="mkd-pl-text-inner">';
    }
}

if (!function_exists('industrialist_mikado_pl_inner_text_additional_tag_after')) {
    function industrialist_mikado_pl_inner_text_additional_tag_after() {

        print '</div></div></div>';
    }
}

if (!function_exists('industrialist_mikado_pl_text_wrapper_additional_tag_before')) {
    function industrialist_mikado_pl_text_wrapper_additional_tag_before() {

        print '<div class="mkd-pl-text-wrapper">';
    }
}

if (!function_exists('industrialist_mikado_pl_text_wrapper_additional_tag_after')) {
    function industrialist_mikado_pl_text_wrapper_additional_tag_after() {

        print '</div>';
    }
}

if (!function_exists('industrialist_mikado_pl_rating_additional_tag_before')) {
    function industrialist_mikado_pl_rating_additional_tag_before() {
        global $product;

        if (get_option('woocommerce_enable_review_rating') !== 'no') {

            // woo 3.0
            if (function_exists('wc_get_rating_html')) {
                $rating_html = wc_get_rating_html($product->get_average_rating());
            } else {
                $rating_html = $product->get_rating_html();
            }

            if ($rating_html !== '') {
                print '<div class="mkd-pl-rating-holder">';
            }
        }
    }
}

if (!function_exists('industrialist_mikado_pl_rating_additional_tag_after')) {
    function industrialist_mikado_pl_rating_additional_tag_after() {
        global $product;

        if (get_option('woocommerce_enable_review_rating') !== 'no') {

            // woo 3.0
            if (function_exists('wc_get_rating_html')) {
                $rating_html = wc_get_rating_html($product->get_average_rating());
            } else {
                $rating_html = $product->get_rating_html();
            }

            if ($rating_html !== '') {
                print '</div>';
            }
        }
    }
}

if (!function_exists('industrialist_mikado_woocommerce_product_thumbnail_columns')) {
    /*
     * set number of columns for thumbs in product single
     */
    function industrialist_mikado_woocommerce_product_thumbnail_columns() {
        return 3;
    }

    add_filter('woocommerce_product_thumbnails_columns', 'industrialist_mikado_woocommerce_product_thumbnail_columns', 10, 2);
}