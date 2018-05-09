<?php

if (!function_exists('mkd_core_version_class')) {
    /**
     * Adds plugins version class to body
     * @param $classes
     * @return array
     */
    function mkd_core_version_class($classes) {
        $classes[] = 'mkd-core-' . MIKADO_CORE_VERSION;

        return $classes;
    }

    add_filter('body_class', 'mkd_core_version_class');
}

if (!function_exists('mkd_core_theme_installed')) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function mkd_core_theme_installed() {
        return defined('MIKADO_ROOT');
    }
}

if (!function_exists('mkd_core_get_shortcode_module_template_part')) {
    /**
     * Loads module template part.
     *
     * @param string $shortcode name of the shortcode folder
     * @param string $template name of the template to load
     * @param string $slug
     * @param array $params array of parameters to pass to template
     *
     */
    function mkd_core_get_shortcode_module_template_part($shortcode, $template, $slug = '', $params = array()) {

        //HTML Content from template
        $html = '';
        $template_path = MIKADO_CORE_CPT_PATH . '/' . $shortcode . '/shortcodes/templates';

        $temp = $template_path . '/' . $template;
        if (is_array($params) && count($params)) {
            extract($params);
        }

        $template = '';

        if (!empty($temp)) {
            if (!empty($slug)) {
                $template = "{$temp}-{$slug}.php";

                if (!file_exists($template)) {
                    $template = $temp . '.php';
                }
            } else {
                $template = $temp . '.php';
            }
        }

        if ($template) {
            ob_start();
            include($template);
            $html = ob_get_clean();
        }

        return $html;
    }
}

if (!function_exists('mkd_core_init_shortcode_loader')) {
    function mkd_core_init_shortcode_loader() {

        include_once 'shortcode-loader.php';
    }

    add_action('industrialist_mikado_shortcode_loader', 'mkd_core_init_shortcode_loader');
}

if (!function_exists('mkd_core_get_yes_no_select_array')) {
    /**
     * Returns array of yes no
     * @return array
     */
    function mkd_core_get_yes_no_select_array($enable_default = true, $set_yes_to_be_first = false) {
        $select_options = array();

        if ($enable_default) {
            $select_options[''] = esc_html__('Default', 'mkd-core');
        }

        if ($set_yes_to_be_first) {
            $select_options['yes'] = esc_html__('Yes', 'mkd-core');
            $select_options['no'] = esc_html__('No', 'mkd-core');
        } else {
            $select_options['no'] = esc_html__('No', 'mkd-core');
            $select_options['yes'] = esc_html__('Yes', 'mkd-core');
        }

        return $select_options;
    }
}

if (!function_exists('mkd_core_get_text_transform_array')) {
    /**
     * Returns array of text transforms
     *
     * @param bool $first_empty
     * @return array
     */
    function mkd_core_get_text_transform_array($first_empty = false) {
        $text_transforms = array();

        if ($first_empty) {
            $text_transforms[''] = esc_html__('Default', 'mkd-core');
        }

        $text_transforms['none'] = esc_html__('None', 'mkd-core');
        $text_transforms['capitalize'] = esc_html__('Capitalize', 'mkd-core');
        $text_transforms['uppercase'] = esc_html__('Uppercase', 'mkd-core');
        $text_transforms['lowercase'] = esc_html__('Lowercase', 'mkd-core');
        $text_transforms['initial'] = esc_html__('Initial', 'mkd-core');
        $text_transforms['inherit'] = esc_html__('Inherit', 'mkd-core');

        return $text_transforms;
    }
}

if (!function_exists('mkd_core_get_title_tag')) {
    /**
     * Returns array of title tags
     *
     * @param bool $first_empty
     * @param array $additional_elements
     * @return array
     */
    function mkd_core_get_title_tag($first_empty = false, $additional_elements = array()) {
        $title_tag = array();

        if ($first_empty) {
            $title_tag[''] = esc_html__('Default', 'mkd-core');
        }

        $title_tag['h1'] = 'h1';
        $title_tag['h2'] = 'h2';
        $title_tag['h3'] = 'h3';
        $title_tag['h4'] = 'h4';
        $title_tag['h5'] = 'h5';
        $title_tag['h6'] = 'h6';

        if (!empty($additional_elements)) {
            $title_tag = array_merge($title_tag, $additional_elements);
        }

        return $title_tag;
    }
}

if (!function_exists('mkd_core_add_user_custom_fields')) {

    function mkd_core_add_user_custom_fields($user_contact) {

        /**
         * Function that add custom user fields
         **/

        $user_contact['facebook'] = esc_html__('Facebook', 'industrialist');
        $user_contact['twitter'] = esc_html__('Twitter', 'industrialist');
        $user_contact['googleplus'] = esc_html__('Google Plus', 'industrialist');
        $user_contact['instagram'] = esc_html__('Instagram', 'industrialist');

        return $user_contact;

    }

    add_filter('user_contactmethods', 'mkd_core_add_user_custom_fields');
}