<?php

if(!function_exists('industrialist_mikado_title_classes')) {
    /**
     * Function that adds classes to title div.
     * All other functions are tied to it with add_filter function
     * @param array $classes array of classes
     */
    function industrialist_mikado_title_classes($classes = array()) {
        $classes = array();
        $classes = apply_filters('industrialist_mikado_title_classes', $classes);

        if(is_array($classes) && count($classes)) {
            echo implode(' ', $classes);
        }
    }
}

if(!function_exists('industrialist_mikado_title_type_class')) {
    /**
     * Function that adds class on title based on title type option
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function industrialist_mikado_title_type_class($classes) {
        $id = industrialist_mikado_get_page_id();

        if(($meta_temp = get_post_meta($id, "mkd_title_area_type_meta", true)) !== ""){
            $title_type = $meta_temp;
        }else {
            $title_type = industrialist_mikado_options()->getOptionValue('title_area_type');
        }

        $classes[] = 'mkd-'.$title_type.'-type';

        return $classes;

    }

    add_filter('industrialist_mikado_title_classes', 'industrialist_mikado_title_type_class');
}

if(!function_exists('industrialist_mikado_title_background_image_classes')) {
    function industrialist_mikado_title_background_image_classes($classes) {
        //init variables
        $id                         = industrialist_mikado_get_page_id();
        $is_img_responsive 		    = '';
        $is_image_parallax		    = '';
        $is_image_parallax_array    = array('yes', 'yes_zoom');
        $show_title_img			    = true;
        $title_img				    = '';

        //is responsive image is set for current page?
        if(($meta_temp = get_post_meta($id, "mkd_title_area_background_image_responsive_meta", true)) != "") {
            $is_img_responsive = $meta_temp;
        } else {
            //take value from theme options
            $is_img_responsive = industrialist_mikado_options()->getOptionValue('title_area_background_image_responsive');
        }

        //is title image chosen for current page?
        if(($meta_temp = get_post_meta($id, "mkd_title_area_background_image_meta", true)) != ""){
            $title_img = $meta_temp;
        }else{
            //take image that is set in theme options
            $title_img = industrialist_mikado_options()->getOptionValue('title_area_background_image');
        }

        //is image set to be fixed for current page?
        if(($meta_temp = get_post_meta($id, "mkd_title_area_background_image_parallax_meta", true)) != ""){
            $is_image_parallax = $meta_temp;
        }else{
            //take setting from theme options
            $is_image_parallax = industrialist_mikado_options()->getOptionValue('title_area_background_image_parallax');
        }

        //is title image hidden for current page?
        if(get_post_meta($id, "mkd_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is title image set and visible?
        if($title_img !== '' && $show_title_img == true) {
            //is image not responsive and parallax title is set?
            $classes[] = 'mkd-preload-background';
            $classes[] = 'mkd-has-background';

            if($is_img_responsive == 'no' && in_array($is_image_parallax, $is_image_parallax_array)) {
                $classes[] = 'mkd-has-parallax-background';

                if($is_image_parallax == 'yes_zoom') {
                    $classes[] = 'mkd-zoom-out';
                }
            }

            //is image not responsive
            elseif($is_img_responsive == 'yes'){
                $classes[] = 'mkd-has-responsive-background';
            }
        }

        return $classes;
    }

    add_filter('industrialist_mikado_title_classes', 'industrialist_mikado_title_background_image_classes');
}

if(!function_exists('industrialist_mikado_title_content_alignment_class')) {
    /**
     * Function that adds class on title based on title content alignmnt option
     * Could be left, centered or right
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function industrialist_mikado_title_content_alignment_class($classes) {

        //init variables
        $id                      = industrialist_mikado_get_page_id();
        $title_content_alignment = 'left';

        if(($meta_temp = get_post_meta($id, "mkd_title_area_content_alignment_meta", true)) != "") {
            $title_content_alignment = $meta_temp;

        } else {
            $title_content_alignment = industrialist_mikado_options()->getOptionValue('title_area_content_alignment');
        }

        $classes[] = 'mkd-content-'.$title_content_alignment.'-alignment';

        return $classes;

    }

    add_filter('industrialist_mikado_title_classes', 'industrialist_mikado_title_content_alignment_class');
}

if(!function_exists('industrialist_mikado_title_animation_class')) {
    /**
     * Function that adds class on title based on title animation option
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function industrialist_mikado_title_animation_class($classes) {

        //init variables
        $id                      = industrialist_mikado_get_page_id();
        $title_animation = 'no';

        if(($meta_temp = get_post_meta($id, "mkd_title_area_animation_meta", true)) !== "") {
            $title_animation = $meta_temp;

        } else {
            $title_animation = industrialist_mikado_options()->getOptionValue('title_area_animation');
        }

        $classes[] = 'mkd-animation-'.$title_animation;

        return $classes;

    }

    add_filter('industrialist_mikado_title_classes', 'industrialist_mikado_title_animation_class');
}

if(!function_exists('industrialist_mikado_title_background_image_div_classes')) {
    function industrialist_mikado_title_background_image_div_classes($classes) {

        //init variables
        $id                         = industrialist_mikado_get_page_id();
        $is_img_responsive 		    = '';
        $show_title_img			    = true;
        $title_img				    = '';

        //is responsive image is set for current page?
        if(($meta_temp = get_post_meta($id, "mkd_title_area_background_image_responsive_meta", true)) != "") {
            $is_img_responsive = $meta_temp;
        } else {
            //take value from theme options
            $is_img_responsive = industrialist_mikado_options()->getOptionValue('title_area_background_image_responsive');
        }

        //is title image chosen for current page?
        if(($meta_temp = get_post_meta($id, "mkd_title_area_background_image_meta", true)) != ""){
            $title_img = $meta_temp;
        }else{
            //take image that is set in theme options
            $title_img = industrialist_mikado_options()->getOptionValue('title_area_background_image');
        }

        //is title image hidden for current page?
        if(get_post_meta($id, "mkd_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is title image set, visible and responsive?
        if($title_img !== '' && $show_title_img == true) {

            //is image responsive?
            if($is_img_responsive == 'yes') {
                $classes[] = 'mkd-title-image-responsive';
            }
            //is image not responsive?
            elseif($is_img_responsive == 'no') {
                $classes[] = 'mkd-title-image-not-responsive';
            }
        }

        return $classes;
    }

    add_filter('industrialist_mikado_title_classes', 'industrialist_mikado_title_background_image_div_classes');
}

if (!function_exists('industrialist_mikado_title_page_style')) {
    /**
     * Function that return container style
     */
    function industrialist_mikado_title_page_style($style) {
        $id = industrialist_mikado_get_page_id();
        $class_id = industrialist_mikado_get_page_id();
        if (industrialist_mikado_is_woocommerce_installed() && is_product()) {
            $class_id = get_the_ID();
        }

        $class_prefix = industrialist_mikado_get_unique_page_class($class_id);

        $title_selector = array(
            $class_prefix . ' .mkd-title .mkd-title-holder h1',
        );

        $title_class = array();

        $page_title_color = get_post_meta($id, "mkd_page_title_color_meta", true);

        if ($page_title_color) {
            $title_class['color'] = $page_title_color;
        }

        $page_title_font_size = get_post_meta($id, "mkd_page_title_fontsize_meta", true);

        if ($page_title_font_size) {
            $title_class['font-size'] = industrialist_mikado_filter_px($page_title_font_size) . 'px';
        }

        $page_title_line_height = get_post_meta($id, "mkd_page_title_lineheight_meta", true);

        if ($page_title_line_height) {
            $title_class['line-height'] = industrialist_mikado_filter_px($page_title_line_height) . 'px';
        }

        $page_title_texttransform = get_post_meta($id, "mkd_page_title_texttransform_meta", true);

        if ($page_title_texttransform) {
            $title_class['text-transform'] = $page_title_texttransform;
        }

        $page_title_font_style = get_post_meta($id, "mkd_page_title_fontstyle_meta", true);

        if ($page_title_font_style) {
            $title_class['font-style'] = $page_title_font_style;
        }

        $page_title_font_weight = get_post_meta($id, "mkd_page_title_fontweight_meta", true);

        if ($page_title_font_weight) {
            $title_class['font-weight'] = $page_title_font_weight;
        }

        $page_title_letter_spacing = get_post_meta($id, "mkd_page_title_letter_spacing_meta", true);

        if ($page_title_letter_spacing) {
            $title_class['letter-spacing'] = industrialist_mikado_filter_px($page_title_letter_spacing) . 'px';
        }

        $page_title_margin_bottom = get_post_meta($id, "mkd_page_title_letter_spacing_meta", true);

        if ($page_title_margin_bottom) {
            $title_class['margin-bottom'] = industrialist_mikado_filter_px($page_title_margin_bottom) . 'px';
        }

        $current_style = industrialist_mikado_dynamic_css($title_selector, $title_class);
        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('industrialist_mikado_add_page_custom_style', 'industrialist_mikado_title_page_style');
}

if (!function_exists('industrialist_mikado_title_width_page_style')) {
    /**
     * Function that return container style
     */
    function industrialist_mikado_title_width_page_style($style) {
        $id = industrialist_mikado_get_page_id();
        $class_id = industrialist_mikado_get_page_id();
        if (industrialist_mikado_is_woocommerce_installed() && is_product()) {
            $class_id = get_the_ID();
        }

        $class_prefix = industrialist_mikado_get_unique_page_class($class_id);


        $title_selector = array(
            $class_prefix . ' .mkd-title .mkd-title-holder .mkd-title-subtitle-holder',
        );

        $title_class = array();

        $page_title_width = get_post_meta($id, "mkd_title_area_width_meta", true);

        if ($page_title_width) {
            $title_class['max-width'] = $page_title_width;
        }

        $current_style = industrialist_mikado_dynamic_css($title_selector, $title_class);
        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter('industrialist_mikado_add_page_custom_style', 'industrialist_mikado_title_width_page_style');
}
