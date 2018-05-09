<?php
if (!function_exists('industrialist_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function industrialist_mikado_design_styles() {

        $preload_background_styles = array();

        if (industrialist_mikado_options()->getOptionValue('preload_pattern_image') !== "") {
            $preload_background_styles['background-image'] = 'url(' . industrialist_mikado_options()->getOptionValue('preload_pattern_image') . ') !important';
        } else {
            $preload_background_styles['background-image'] = 'url(' . esc_url(MIKADO_ASSETS_ROOT . "/img/preload_pattern.png") . ') !important';
        }

        echo industrialist_mikado_dynamic_css('.mkd-preload-background', $preload_background_styles);

        if (industrialist_mikado_options()->getOptionValue('google_fonts')) {
            $font_family = industrialist_mikado_options()->getOptionValue('google_fonts');
            if (industrialist_mikado_is_font_option_valid($font_family)) {
                echo industrialist_mikado_dynamic_css('body', array('font-family' => industrialist_mikado_get_font_option_val($font_family)));
            }
        }

        if (industrialist_mikado_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'a',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a',
                '.mkd-comment-holder .mkd-comment-text .mkd-comment-date',
                '#submit_comment:hover',
                '.post-password-form input[type=submit]:hover',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                '.mkd-owl-slider .owl-nav .mkd-next-icon:hover i',
                '.mkd-owl-slider .owl-nav .mkd-prev-icon:hover i',
                '.mkd-main-menu ul li.mkd-active-item a',
                '.mkd-main-menu ul li:hover a',
                '.mkd-main-menu ul .mkd-menu-featured-icon',
                '.mkd-drop-down .second .inner ul li ul li:hover>a',
                '.mkd-drop-down .second .inner ul li.current-menu-item>a',
                '.mkd-drop-down .second .inner ul li.sub ul li:hover>a',
                '.mkd-drop-down .second .inner>ul>li:hover>a',
                '.mkd-drop-down .wide .second .inner ul li.sub .flexslider ul li a:hover',
                '.mkd-drop-down .wide .second ul li .flexslider ul li a:hover',
                '.mkd-drop-down .wide .second .inner ul li.sub .flexslider.widget_flexslider .menu_recent_post_text a:hover',
                '.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner ul li a:hover',
                '.mkd-header-vertical .mkd-vertical-dropdown-click .second .inner ul li a:hover',
                '.mkd-header-vertical .mkd-vertical-menu ul li a:hover',
                '.mkd-header-vertical a:hover',
                '.mkd-mobile-header .mkd-mobile-nav a:hover',
                '.mkd-mobile-header .mkd-mobile-nav h4:hover',
                '.mkd-mobile-header .mkd-mobile-menu-opener a:hover',
                '.mkd-page-header .mkd-sticky-header .mkd-main-menu>ul>li:hover>a',
                '.mkd-page-header .mkd-sticky-header .mkd-search-opener:hover',
                '.mkd-page-header .mkd-sticky-header .mkd-side-menu-button-opener:hover',
                '.mkd-page-header .mkd-search-opener:hover',
                '.mkd-title .mkd-title-holder .mkd-breadcrumbs a:hover',
                '.mkd-side-menu-button-opener:hover',
                'nav.mkd-fullscreen-menu ul>li:hover>a',
                '.mkd-search-cover .mkd-search-close a:hover',
                '.mkd-portfolio-list-holder article .mkd-pli-text .mkd-pli-category-holder h6 a:hover',
                '.mkd-portfolio-list-holder.mkd-pl-gallery-overlay article .mkd-pli-text .mkd-pli-category-holder a',
                '.mkd-pl-filter-holder ul li.mkd-pl-current h6',
                '.mkd-pl-filter-holder ul li:hover h6',
                '.mkd-portfolio-slider-holder .owl-nav .owl-next:hover .mkd-next-icon',
                '.mkd-portfolio-slider-holder .owl-nav .owl-next:hover .mkd-prev-icon',
                '.mkd-portfolio-slider-holder .owl-nav .owl-prev:hover .mkd-next-icon',
                '.mkd-portfolio-slider-holder .owl-nav .owl-prev:hover .mkd-prev-icon',
                '.mkd-portfolio-single-holder .mkd-ps-info-holder .mkd-portfolio-info-item.mkd-portfolio-categories h6 a:hover',
                '.mkd-portfolio-single-holder .mkd-ps-info-holder .mkd-portfolio-info-item.mkd-portfolio-tags h6 a:hover',
                '.mkd-portfolio-single-holder .mkd-ps-info-holder .mkd-portfolio-info-item.mkd-portfolio-custom-field a:hover',
                '.mkd-portfolio-single-nav .mkd-portfolio-next:hover a .nav-item h6',
                '.mkd-portfolio-single-nav .mkd-portfolio-prev:hover a .nav-item h6',
                '.mkd-portfolio-single-nav .mkd-portfolio-back-btn:hover a',
                '.mkd-team.main-info-below-image .mkd-team-info .mkd-team-title-holder .mkd-team-position',
                '.mkd-team.main-info-below-image .mkd-team-info .mkd-team-social-wrapp .mkd-icon-shortcode a:hover',
                '.mkd-counter-holder .mkd-counter',
                '.mkd-message .mkd-message-inner a.mkd-close i:hover',
                '.mkd-ordered-list ol>li.mkd-list-item:before',
                '.mkd-testimonials-holder .mkd-testimonials.mkd-testimonials-slider .mkd-testimonial-text-holder .mkd-testimonial-text-inner .mkd-testimonials-job',
                '.mkd-testimonials-holder .mkd-testimonials.mkd-testimonials-carousel .mkd-testimonial-content .mkd-testimonial-bottom .mkd-testimonial-job',
                '.mkd-testimonials-holder .mkd-owl-shortcode-slider~[class^=owl-external-controls]:hover',
                '.mkd-price-table.mkd-active .mkd-price-table-inner .mkd-price-table-price .mkd-price-holder .mkd-currency',
                '.mkd-price-table.mkd-active .mkd-price-table-inner .mkd-price-table-price .mkd-price-holder .mkd-value',
                '.mkd-tabs .mkd-tabs-nav li.ui-state-active a .mkd-icon-frame',
                '.mkd-tabs .mkd-tabs-nav li.ui-state-hover a .mkd-icon-frame',
                '.mkd-accordion-holder .mkd-accordion-title-holder.ui-state-active .mkd-accordion-icon-holder',
                '.mkd-accordion-holder .mkd-accordion-title-holder.ui-state-hover .mkd-accordion-icon-holder',
                '.mkd-blog-list-holder .mkd-item-info-section>div a:hover',
                '.mkd-btn.mkd-btn-outline',
                '.mkd-btn.mkd-btn-minimal',
                'blockquote .mkd-icon-quotations-holder',
                '.mkd-video-button-play .mkd-video-button-wrapper',
                '.mkd-dropcaps',
                '.mkd-service-table table tbody tr td .mkd-mark.mkd-checked',
                '.mkd-info-box-holder .mkd-ib-front-holder .mkd-ib-top-holder .mkd-ib-media-holder .mkd-ib-icon-holder',
                '.mkd-info-box-holder .mkd-ib-front-holder .mkd-ib-top-holder .mkd-ib-title',
                '.mkd-twitter-slider .mkd-twitter-slider-item .mkd-twitter-time:before',
                '.mkd-progress-circle-holder .mkd-progress-circle i',
                '.mkd-progress-circle-holder .mkd-progress-circle span',
                '.mkd-image-with-hover-info-item .mkd-hover-holder .mkd-hover-holder-inner .mkd-hover-content .mkd-hover-content-inner .mkd-image-description-pre',
                '.mkd-image-with-hover-info-item .mkd-hover-holder .mkd-hover-holder-inner .mkd-hover-content .mkd-hover-content-inner .mkd-image-description-add',
                '.wpb_widgetised_column .widget ul li a',
                'aside.mkd-sidebar .widget ul li a',
                '.wpb_widgetised_column .widget #wp-calendar tfoot a',
                'aside.mkd-sidebar .widget #wp-calendar tfoot a',
                '.wpb_widgetised_column .mkd-latest-posts-widget .mkd-blog-list-holder ul>li .mkd-item-info-section>div:before',
                'aside.mkd-sidebar .mkd-latest-posts-widget .mkd-blog-list-holder ul>li .mkd-item-info-section>div:before',
                'footer .mkd-footer-top .mkd-latest-posts-widget .mkd-blog-list-holder ul>li .mkd-item-info-section>div:before',
                '.mkd-side-menu .widget ul li a',
                '.mkd-side-menu .widget #wp-calendar tfoot a',
                '.mkd-side-menu .mkd-latest-posts-widget .mkd-blog-list-holder ul>li .mkd-item-info-section>div:before',
                '.mkd-blog-holder.mkd-blog-type-standard article.format-link .mkd-post-text .mkd-post-mark',
                '.mkd-blog-holder.mkd-blog-type-standard article.format-quote .mkd-post-text .mkd-post-mark',
                '.mkd-blog-holder.mkd-blog-type-standard article.format-quote .mkd-post-text a .quote-author',
                '.mkd-blog-holder.mkd-blog-type-masonry article.format-link .mkd-post-text .mkd-post-mark',
                '.mkd-blog-holder.mkd-blog-type-masonry article.format-quote .mkd-post-text .mkd-post-mark',
                '.mkd-blog-holder.mkd-blog-type-masonry article.format-quote .mkd-post-text a .quote-author',
                '.mkd-blog-holder:not(.mkd-blog-single) .mkd-post-info>div a:hover',
                '.mkd-blog-holder:not(.mkd-blog-single) .mkd-post-info>div.mkd-blog-like a:hover:before',
                '.mkd-read-more-holder .mkd-btn span.mkd-icon-font-elegant:before',
                '.mkd-author-description .mkd-author-social-holder a:hover',
                '.single-post article.format-link .mkd-post-text .mkd-post-mark',
                '.single-post article.format-quote .mkd-post-text .mkd-post-mark',
                '.mkd-blog-holder.mkd-blog-single .mkd-post-info>div a:hover',
                '.mkd-blog-holder.mkd-blog-single .mkd-post-info>div.mkd-blog-like a:hover:before',
                '.single-post .mkd-blog-single-nav .mkd-blog-next a .nav-item h6',
                '.single-post .mkd-blog-single-nav .mkd-blog-prev a .nav-item h6',
                '.single-post .mkd-blog-single-nav .mkd-blog-next a .nav-item:hover h5',
                '.single-post .mkd-blog-single-nav .mkd-blog-next:hover a .nav-item h6',
                '.single-post .mkd-blog-single-nav .mkd-blog-prev a .nav-item:hover h5',
                '.single-post .mkd-blog-single-nav .mkd-blog-prev:hover a .nav-item h6',
                'aside.mkd-sidebar .widget.widget_categories ul li:hover a',
                '.wpb_widgetised_column .widget.widget_categories ul li:hover a ',
                'aside.mkd-sidebar .mkd-latest-posts-widget .mkd-blog-list-holder ul > li .mkd-item-text-holder .mkd-item-title > a:hover',
                '.wpb_widgetised_column .mkd-latest-posts-widget .mkd-blog-list-holder ul > li .mkd-item-text-holder .mkd-item-title > a:hover'
            );

            $woo_color_selector = array();
            if (industrialist_mikado_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.woocommerce-page .mkd-content .mkd-quantity-buttons .mkd-quantity-minus:hover',
                    '.woocommerce-page .mkd-content .mkd-quantity-buttons .mkd-quantity-plus:hover',
                    'div.woocommerce .mkd-quantity-buttons .mkd-quantity-minus:hover',
                    'div.woocommerce .mkd-quantity-buttons .mkd-quantity-plus:hover',
                    '.woocommerce .star-rating',
                    '.mkd-single-product-summary .price',
                    '.mkd-single-product-summary .product_meta>span a:hover',
                    '.mkd-woocommerce-page.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a',
                    '.mkd-woocommerce-page.woocommerce-account .woocommerce table.shop_table td.order-number a:hover',
                    '.widget.woocommerce ul li a',
                    '.widget.woocommerce.widget_products ul li a:hover',
                    '.widget.woocommerce.widget_recent_reviews ul li a:hover',
                    '.widget.woocommerce.widget_recently_viewed_products ul li a:hover',
                    '.widget.woocommerce.widget_shopping_cart ul li a:hover',
                    '.widget.woocommerce.widget_top_rated_products ul li a:hover',
                    '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li a:not(.remove):hover',
                    '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content ul li .remove:hover',
                    '.mkd-shopping-cart-dropdown .mkd-item-info-holder .remove:hover',
                    '.widget.woocommerce.widget_product_categories ul li a:hover',
                    '.widget.woocommerce.widget_layered_nav ul li a:hover',
                    '.widget.woocommerce.widget_layered_nav_filters ul li a:hover'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

            $color_important_selector = array(
                '.mkd-dark-header .mkd-page-header>div:not(.mkd-sticky-header) .mkd-side-menu-button-opener:hover',
                '.mkd-dark-header .mkd-top-bar .mkd-side-menu-button-opener:hover',
                '.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-side-menu-button-opener:hover',
                '.mkd-light-header .mkd-page-header>div:not(.mkd-sticky-header) .mkd-side-menu-button-opener:hover',
                '.mkd-light-header .mkd-top-bar .mkd-side-menu-button-opener:hover',
                '.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-side-menu-button-opener:hover',
                '.mkd-btn.mkd-btn-minimal.mkd-light:not(.mkd-btn-custom-hover-color):hover',
                '.mkd-btn.mkd-btn-minimal.mkd-dark:not(.mkd-btn-custom-hover-color):hover'
            );

            $background_color_selector = array(
                '.mkd-st-loader .pulse',
                '.mkd-st-loader .double_pulse .double-bounce1',
                '.mkd-st-loader .double_pulse .double-bounce2',
                '.mkd-st-loader .cube',
                '.mkd-st-loader .rotating_cubes .cube1',
                '.mkd-st-loader .rotating_cubes .cube2',
                '.mkd-st-loader .stripes>div',
                '.mkd-st-loader .wave>div',
                '.mkd-st-loader .two_rotating_circles .dot1',
                '.mkd-st-loader .two_rotating_circles .dot2',
                '.mkd-st-loader .five_rotating_circles .container1>div',
                '.mkd-st-loader .five_rotating_circles .container2>div',
                '.mkd-st-loader .five_rotating_circles .container3>div',
                '.mkd-st-loader .atom .ball-1:before',
                '.mkd-st-loader .atom .ball-2:before',
                '.mkd-st-loader .atom .ball-3:before',
                '.mkd-st-loader .atom .ball-4:before',
                '.mkd-st-loader .clock .ball:before',
                '.mkd-st-loader .mitosis .ball',
                '.mkd-st-loader .lines .line1',
                '.mkd-st-loader .lines .line2',
                '.mkd-st-loader .lines .line3',
                '.mkd-st-loader .lines .line4',
                '.mkd-st-loader .fussion .ball',
                '.mkd-st-loader .fussion .ball-1',
                '.mkd-st-loader .fussion .ball-2',
                '.mkd-st-loader .fussion .ball-3',
                '.mkd-st-loader .fussion .ball-4',
                '.mkd-st-loader .wave_circles .ball',
                '.mkd-st-loader .pulse_circles .ball',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '.mkd-pagination li a:hover',
                '.mkd-pagination li.active span',
                '.mkd-single-links-pages-inner a:hover span',
                '.mkd-single-links-pages-inner>span',
                '.mkd-owl-shortcode-slider .owl-controls .owl-dots .owl-dot.active span',
                '#mkd-back-to-top>span',
                '.mkd-drop-down .second .inner ul li a:before',
                '.mkd-header-vertical .mkd-vertical-dropdown-float .second .inner ul li a:before',
                '.mkd-header-vertical .mkd-vertical-dropdown-click .second:after',
                '.mkd-header-vertical .mkd-vertical-menu>ul>li>a:before',
                '.mkd-header-vertical .mkd-vertical-menu>ul>li>a:after',
                'nav.mkd-fullscreen-menu ul>li:hover>a .mkd-underline',
                'body.search-results .mkd-search-page-form-holder>*>.mkd-search-submit',
                'body.search-no-results .mkd-search-page-form-holder>*>.mkd-search-submit',
                '.mkd-pl-standard-pagination ul li.mkd-pl-pag-active a',
                '.mkd-icon-shortcode.circle',
                '.mkd-icon-shortcode.square',
                '.mkd-progress-bar .mkd-progress-content-outer .mkd-progress-content',
                '.mkd-pricing-slider .mkd-pricing-slider-button-holder .mkd-pricing-slider-button-extra.active .mkd-btn',
                '.mkd-pricing-slider .mkd-pricing-slider-button-holder .mkd-pricing-slider-button.active .mkd-btn',
                '.mkd-pricing-slider .mkd-pricing-slider-bar-holder .mkd-pricing-slider-bar',
                '.mkd-pricing-slider .mkd-pricing-slider-bar-holder .mkd-pricing-slider-bar .mkd-pricing-slider-drag',
                '.mkd-tabs .mkd-tabs-nav li .mkd-tab-title a',
                '.mkd-tabs.equal .mkd-tabs-nav li .mkd-tab-title a',
                '.mkd-blog-list-holder.mkd-boxes>ul>li .mkd-item-text-holder .mkd-read-more-holder>a .arrow_carrot-right:after',
                '.mkd-btn.mkd-btn-solid',
                '.mkd-clients-carousel .owl-controls .owl-dots .owl-dot.active span',
                '.mkd-dropcaps.mkd-circle',
                '.mkd-dropcaps.mkd-square',
                '.mkd-process-item.mkd-icon-and-number .mkd-process-item-numeration',
                '.mkd-workflow .mkd-workflow-item .mkd-workflow-item-inner .mkd-workflow-text .circle:after',
                '.mkd-video-banner-holder .mkd-video-banner-overlay .mkd-video-banner-overlay-inner1 .mkd-video-banner-overlay-inner2 .mkd-icon-holder',
                '.wpb_widgetised_column .widget #wp-calendar td#today',
                'aside.mkd-sidebar .widget #wp-calendar td#today',
                '.wpb_widgetised_column .widget.widget_search .input-holder button',
                'aside.mkd-sidebar .widget.widget_search .input-holder button',
                '.wpb_widgetised_column .widget.widget_tag_cloud a',
                'aside.mkd-sidebar .widget.widget_tag_cloud a',
                '.mkd-side-menu .widget #wp-calendar td#today',
                '.mkd-side-menu .widget.widget_search .input-holder button',
                '.mkd-side-menu .widget.widget_tag_cloud a',
                '.mkd-blog-holder.mkd-blog-type-standard article.format-audio .mkd-icon-holder .mkd-icon',
                '.mkd-blog-holder.mkd-blog-type-masonry article.format-audio .mkd-icon-holder .mkd-icon',
                '.mkd-blog-holder:not(.mkd-blog-single) .mkd-post-info-category a',
                '.mkd-blog-holder.mkd-date-outside .mkd-post-info-date .year',
                '.mkd-blog-audio-holder .mejs-container .mejs-controls>.mejs-playpause-button button',
                '.mkd-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.mkd-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.single-post article.format-audio .mkd-icon-holder .mkd-icon',
                '.mkd-blog-holder.mkd-blog-single .mkd-post-info-category a',
            );

            $woo_background_color_selector = array();
            if (industrialist_mikado_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .mkd-content a.added_to_cart',
                    '.woocommerce-page .mkd-content a.button',
                    '.woocommerce-page .mkd-content button[type=submit]',
                    '.woocommerce-page .mkd-content input[type=submit]',
                    'div.woocommerce a.added_to_cart',
                    'div.woocommerce a.button',
                    'div.woocommerce button[type=submit]',
                    'div.woocommerce input[type=submit]',
                    '.woocommerce-page .mkd-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    '.woocommerce .mkd-onsale',
                    '.woocommerce-pagination .page-numbers li a.current',
                    '.woocommerce-pagination .page-numbers li a:hover',
                    '.woocommerce-pagination .page-numbers li span.current',
                    '.woocommerce-pagination .page-numbers li span:hover',
                    '.woocommerce-pagination .page-numbers li a:hover',
                    '.mkd-woo-view-all-pagination a:hover',
                    '.mkd-woo-single-page .woocommerce-tabs ul.tabs>li',
                    'ul.products>.product .mkd-pl-inner .mkd-pl-text-inner .added_to_cart',
                    'ul.products>.product .mkd-pl-inner .mkd-pl-text-inner .button',
                    '.widget.woocommerce.widget_product_search .input-holder button',
                    '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
                    '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
                    '.widget.woocommerce.widget_price_filter .price_slider_amount .button',
                    '.widget.woocommerce.widget_product_tag_cloud a',
                    '.widget.woocommerce.widget_shopping_cart .widget_shopping_cart_content .buttons a',
                    '.mkd-shopping-cart-dropdown .mkd-cart-bottom .mkd-view-cart',
                    '.mkd-shopping-cart-holder .mkd-header-cart .mkd-cart-number',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_important_selector = array(
                '.mkd-btn.mkd-btn-outline:not(.mkd-btn-custom-hover-bg):hover',
                '.mkd-service-table table tbody tr td .mkd-btn.mkd-btn-solid:not(.mkd-btn-custom-hover-bg):hover'
            );

            $border_color_selector = array(
                '.mkd-st-loader .pulse_circles .ball',
                '#respond input[type=text]:focus',
                '#respond textarea:focus',
                '.post-password-form input[type=password]:focus',
                '.wpcf7-form-control.wpcf7-date:focus',
                '.wpcf7-form-control.wpcf7-number:focus',
                '.wpcf7-form-control.wpcf7-quiz:focus',
                '.wpcf7-form-control.wpcf7-select:focus',
                '.wpcf7-form-control.wpcf7-text:focus',
                '.wpcf7-form-control.wpcf7-textarea:focus',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '.mkd-title .mkd-separator-holder .mkd-separator',
                '.mkd-testimonials-holder .mkd-testimonials.mkd-testimonials-slider .mkd-testimonial-text-holder .mkd-testimonial-text-inner .mkd-separator-holder .mkd-separator',
                '.mkd-pricing-slider .mkd-pricing-slider-button-holder .mkd-pricing-slider-button-extra.active .mkd-btn',
                '.mkd-pricing-slider .mkd-pricing-slider-button-holder .mkd-pricing-slider-button.active .mkd-btn',
                '.mkd-btn.mkd-btn-solid',
                '.mkd-btn.mkd-btn-outline',
                '.wpb_widgetised_column .widget .mkd-widget-title-holder .mkd-separator',
                'aside.mkd-sidebar .widget .mkd-widget-title-holder .mkd-separator',
                '.mkd-side-menu .widget .mkd-widget-title-holder .mkd-separator',
                '.mkd-blog-holder.mkd-blog-type-standard article .mkd-post-text .mkd-separator',
                '.mkd-blog-holder.mkd-blog-type-masonry article .mkd-post-text .mkd-separator',
                '.mkd-post-ajax-preloader .mkd-pulse',
                '.single-post article .mkd-post-text .mkd-separator',
                '.mkd-drop-down > ul > li.narrow > .second > .inner > ul',
                '.mkd-drop-down > ul > li.wide > .second > .inner > ul',
            );

            $border_color_important_selector = array(
                '.mkd-btn.mkd-btn-outline:not(.mkd-btn-custom-border-hover):hover',
                '.mkd-service-table table tbody tr td .mkd-btn.mkd-btn-solid:not(.mkd-btn-custom-hover-bg):hover'
            );

            $border_top_color_selector = array(
                '.mkd-search-dropdown .mkd-search-dropdown-holder',
            );

            $woo_border_top_color_selector = array();
            if (industrialist_mikado_is_woocommerce_installed()) {
                $woo_border_top_color_selector = array(
                    '.mkd-shopping-cart-dropdown',
                );
            }

            $border_top_color_selector = array_merge($border_top_color_selector, $woo_border_top_color_selector);

            echo industrialist_mikado_dynamic_css($color_selector, array('color' => industrialist_mikado_options()->getOptionValue('first_color')));
            echo industrialist_mikado_dynamic_css($color_important_selector, array('color' => industrialist_mikado_options()->getOptionValue('first_color') . '!important'));
            echo industrialist_mikado_dynamic_css('::selection', array('background' => industrialist_mikado_options()->getOptionValue('first_color')));
            echo industrialist_mikado_dynamic_css('::-moz-selection', array('background' => industrialist_mikado_options()->getOptionValue('first_color')));
            echo industrialist_mikado_dynamic_css($background_color_selector, array('background-color' => industrialist_mikado_options()->getOptionValue('first_color')));
            echo industrialist_mikado_dynamic_css($background_color_important_selector, array('background-color' => industrialist_mikado_options()->getOptionValue('first_color') . '!important'));
            echo industrialist_mikado_dynamic_css($border_color_selector, array('border-color' => industrialist_mikado_options()->getOptionValue('first_color')));
            echo industrialist_mikado_dynamic_css($border_color_important_selector, array('border-color' => industrialist_mikado_options()->getOptionValue('first_color') . '!important'));
            echo industrialist_mikado_dynamic_css($border_top_color_selector, array('border-top-color' => industrialist_mikado_options()->getOptionValue('first_color')));
        }

        if (industrialist_mikado_options()->getOptionValue('page_background_color')) {
            $background_color_selector = array(
                '.mkd-content .mkd-content-inner > .mkd-container',
                '.mkd-content .mkd-content-inner > .mkd-full-width'
            );
            echo industrialist_mikado_dynamic_css($background_color_selector, array('background-color' => industrialist_mikado_options()->getOptionValue('page_background_color')));
        }

        if (industrialist_mikado_options()->getOptionValue('selection_color')) {
            echo industrialist_mikado_dynamic_css('::selection', array('background' => industrialist_mikado_options()->getOptionValue('selection_color')));
            echo industrialist_mikado_dynamic_css('::-moz-selection', array('background' => industrialist_mikado_options()->getOptionValue('selection_color')));
        }

        $boxed_background_style = array();
        if (industrialist_mikado_options()->getOptionValue('page_background_color_in_box')) {
            $boxed_background_style['background-color'] = industrialist_mikado_options()->getOptionValue('page_background_color_in_box');
        }

        if (industrialist_mikado_options()->getOptionValue('boxed_background_image')) {
            $boxed_background_style['background-image'] = 'url(' . esc_url(industrialist_mikado_options()->getOptionValue('boxed_background_image')) . ')';
            $boxed_background_style['background-position'] = 'center 0px';
            $boxed_background_style['background-repeat'] = 'no-repeat';
        }

        if (industrialist_mikado_options()->getOptionValue('boxed_pattern_background_image')) {
            $boxed_background_style['background-image'] = 'url(' . esc_url(industrialist_mikado_options()->getOptionValue('boxed_pattern_background_image')) . ')';
            $boxed_background_style['background-position'] = '0px 0px';
            $boxed_background_style['background-repeat'] = 'repeat';
        }

        if (industrialist_mikado_options()->getOptionValue('boxed_background_image_attachment')) {
            $boxed_background_style['background-attachment'] = (industrialist_mikado_options()->getOptionValue('boxed_background_image_attachment'));
        }

        echo industrialist_mikado_dynamic_css('.mkd-boxed .mkd-wrapper', $boxed_background_style);
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_design_styles');
}

if (!function_exists('industrialist_mikado_h1_styles')) {

    function industrialist_mikado_h1_styles() {

        $h1_styles = array();

        if (industrialist_mikado_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = industrialist_mikado_options()->getOptionValue('h1_color');
        }
        if (industrialist_mikado_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('h1_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h1_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h1_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('h1_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = industrialist_mikado_options()->getOptionValue('h1_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('h1_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h1_letterspacing')) . 'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo industrialist_mikado_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_h1_styles');
}

if (!function_exists('industrialist_mikado_h2_styles')) {

    function industrialist_mikado_h2_styles() {

        $h2_styles = array();

        if (industrialist_mikado_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = industrialist_mikado_options()->getOptionValue('h2_color');
        }
        if (industrialist_mikado_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('h2_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h2_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h2_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('h2_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = industrialist_mikado_options()->getOptionValue('h2_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('h2_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h2_letterspacing')) . 'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo industrialist_mikado_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_h2_styles');
}

if (!function_exists('industrialist_mikado_h3_styles')) {

    function industrialist_mikado_h3_styles() {

        $h3_styles = array();

        if (industrialist_mikado_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = industrialist_mikado_options()->getOptionValue('h3_color');
        }
        if (industrialist_mikado_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('h3_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h3_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h3_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('h3_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = industrialist_mikado_options()->getOptionValue('h3_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('h3_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h3_letterspacing')) . 'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo industrialist_mikado_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_h3_styles');
}

if (!function_exists('industrialist_mikado_h4_styles')) {

    function industrialist_mikado_h4_styles() {

        $h4_styles = array();

        if (industrialist_mikado_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = industrialist_mikado_options()->getOptionValue('h4_color');
        }
        if (industrialist_mikado_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('h4_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h4_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h4_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('h4_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = industrialist_mikado_options()->getOptionValue('h4_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('h4_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h4_letterspacing')) . 'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo industrialist_mikado_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_h4_styles');
}

if (!function_exists('industrialist_mikado_h5_styles')) {

    function industrialist_mikado_h5_styles() {

        $h5_styles = array();

        if (industrialist_mikado_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = industrialist_mikado_options()->getOptionValue('h5_color');
        }
        if (industrialist_mikado_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('h5_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h5_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h5_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('h5_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = industrialist_mikado_options()->getOptionValue('h5_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('h5_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h5_letterspacing')) . 'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo industrialist_mikado_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_h5_styles');
}

if (!function_exists('industrialist_mikado_h6_styles')) {

    function industrialist_mikado_h6_styles() {

        $h6_styles = array();

        if (industrialist_mikado_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = industrialist_mikado_options()->getOptionValue('h6_color');
        }
        if (industrialist_mikado_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('h6_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h6_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h6_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('h6_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = industrialist_mikado_options()->getOptionValue('h6_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('h6_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('h6_letterspacing')) . 'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo industrialist_mikado_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_h6_styles');
}

if (!function_exists('industrialist_mikado_text_styles')) {

    function industrialist_mikado_text_styles() {

        $text_styles = array();

        if (industrialist_mikado_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = industrialist_mikado_options()->getOptionValue('text_color');
        }
        if (industrialist_mikado_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('text_google_fonts'));
        }
        if (industrialist_mikado_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('text_fontsize')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('text_lineheight')) . 'px';
        }
        if (industrialist_mikado_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('text_texttransform');
        }
        if (industrialist_mikado_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = industrialist_mikado_options()->getOptionValue('text_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('text_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('text_letterspacing')) . 'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo industrialist_mikado_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_text_styles');
}

if (!function_exists('industrialist_mikado_link_styles')) {

    function industrialist_mikado_link_styles() {

        $link_styles = array();

        if (industrialist_mikado_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = industrialist_mikado_options()->getOptionValue('link_color');
        }
        if (industrialist_mikado_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = industrialist_mikado_options()->getOptionValue('link_fontstyle');
        }
        if (industrialist_mikado_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('link_fontweight');
        }
        if (industrialist_mikado_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = industrialist_mikado_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo industrialist_mikado_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_link_styles');
}

if (!function_exists('industrialist_mikado_link_hover_styles')) {

    function industrialist_mikado_link_hover_styles() {

        $link_hover_styles = array();

        if (industrialist_mikado_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = industrialist_mikado_options()->getOptionValue('link_hovercolor');
        }
        if (industrialist_mikado_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = industrialist_mikado_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo industrialist_mikado_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if (industrialist_mikado_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = industrialist_mikado_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo industrialist_mikado_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_link_hover_styles');
}

if (!function_exists('industrialist_mikado_smooth_page_transition_styles')) {

    function industrialist_mikado_smooth_page_transition_styles() {

        $loader_style = array();

        if (industrialist_mikado_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = industrialist_mikado_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array('.mkd-smooth-transition-loader');

        if (!empty($loader_style)) {
            echo industrialist_mikado_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if (industrialist_mikado_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = industrialist_mikado_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.mkd-st-loader .pulse',
            '.mkd-st-loader .double_pulse .double-bounce1',
            '.mkd-st-loader .double_pulse .double-bounce2',
            '.mkd-st-loader .cube',
            '.mkd-st-loader .rotating_cubes .cube1',
            '.mkd-st-loader .rotating_cubes .cube2',
            '.mkd-st-loader .stripes > div',
            '.mkd-st-loader .wave > div',
            '.mkd-st-loader .two_rotating_circles .dot1',
            '.mkd-st-loader .two_rotating_circles .dot2',
            '.mkd-st-loader .five_rotating_circles .container1 > div',
            '.mkd-st-loader .five_rotating_circles .container2 > div',
            '.mkd-st-loader .five_rotating_circles .container3 > div',
            '.mkd-st-loader .atom .ball-1:before',
            '.mkd-st-loader .atom .ball-2:before',
            '.mkd-st-loader .atom .ball-3:before',
            '.mkd-st-loader .atom .ball-4:before',
            '.mkd-st-loader .clock .ball:before',
            '.mkd-st-loader .mitosis .ball',
            '.mkd-st-loader .lines .line1',
            '.mkd-st-loader .lines .line2',
            '.mkd-st-loader .lines .line3',
            '.mkd-st-loader .lines .line4',
            '.mkd-st-loader .fussion .ball',
            '.mkd-st-loader .fussion .ball-1',
            '.mkd-st-loader .fussion .ball-2',
            '.mkd-st-loader .fussion .ball-3',
            '.mkd-st-loader .fussion .ball-4',
            '.mkd-st-loader .wave_circles .ball',
            '.mkd-st-loader .pulse_circles .ball'
        );

        if (!empty($spinner_style)) {
            echo industrialist_mikado_dynamic_css($spinner_selectors, $spinner_style);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_smooth_page_transition_styles');
}

if (!function_exists('industrialist_mikado_sidebar_styles')) {

    function industrialist_mikado_sidebar_styles() {

        $sidebar_styles = array();

        if (industrialist_mikado_options()->getOptionValue('sidebar_background_color') !== '') {
            $sidebar_styles['background-color'] = industrialist_mikado_options()->getOptionValue('sidebar_background_color');
        }

        if (industrialist_mikado_options()->getOptionValue('sidebar_padding_top') !== '') {
            $sidebar_styles['padding-top'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sidebar_padding_top')) . 'px';
        }

        if (industrialist_mikado_options()->getOptionValue('sidebar_padding_right') !== '') {
            $sidebar_styles['padding-right'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sidebar_padding_right')) . 'px';
        }

        if (industrialist_mikado_options()->getOptionValue('sidebar_padding_bottom') !== '') {
            $sidebar_styles['padding-bottom'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sidebar_padding_bottom')) . 'px';
        }

        if (industrialist_mikado_options()->getOptionValue('sidebar_padding_left') !== '') {
            $sidebar_styles['padding-left'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sidebar_padding_left')) . 'px';
        }

        if (industrialist_mikado_options()->getOptionValue('sidebar_alignment') !== '') {
            $sidebar_styles['text-align'] = industrialist_mikado_options()->getOptionValue('sidebar_alignment');
        }

        if (!empty($sidebar_styles)) {
            echo industrialist_mikado_dynamic_css('aside.mkd-sidebar', $sidebar_styles);
        }
    }

    add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_sidebar_styles');
}