<?php

if (!function_exists('industrialist_mikado_general_options_map')) {
    /**
     * General options page
     */
    function industrialist_mikado_general_options_map() {

        industrialist_mikado_add_admin_page(
            array(
                'slug' => '',
                'title' => esc_html__('General', 'industrialist'),
                'icon' => 'fa fa-institution'
            )
        );

        do_action('industrialist_mikado_before_general_options_map');

        $panel_design_style = industrialist_mikado_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_design_style',
                'title' => esc_html__('Appearance', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'google_fonts',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Google Font Family', 'industrialist'),
                'description' => esc_html__('Choose a default Google font for your site', 'industrialist'),
                'parent' => $panel_design_style
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'additional_google_fonts',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Additional Google Fonts', 'industrialist'),
                'description' => '',
                'parent' => $panel_design_style,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $panel_design_style,
                'name' => 'additional_google_fonts_container',
                'hidden_property' => 'additional_google_fonts',
                'hidden_value' => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'additional_google_font1',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'industrialist'),
                'description' => esc_html__('Choose additional Google font for your site', 'industrialist'),
                'parent' => $additional_google_fonts_container
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'additional_google_font2',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'industrialist'),
                'description' => esc_html__('Choose additional Google font for your site', 'industrialist'),
                'parent' => $additional_google_fonts_container
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'additional_google_font3',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'industrialist'),
                'description' => esc_html__('Choose additional Google font for your site', 'industrialist'),
                'parent' => $additional_google_fonts_container
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'additional_google_font4',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'industrialist'),
                'description' => esc_html__('Choose additional Google font for your site', 'industrialist'),
                'parent' => $additional_google_fonts_container
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'additional_google_font5',
                'type' => 'font',
                'default_value' => '-1',
                'label' => esc_html__('Font Family', 'industrialist'),
                'description' => esc_html__('Choose additional Google font for your site', 'industrialist'),
                'parent' => $additional_google_fonts_container
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'google_font_weight',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Style & Weight', 'industrialist'),
                'description' => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'industrialist'),
                'parent' => $panel_design_style,
                'options' => array(
                    '100' => esc_html__('100 Thin', 'industrialist'),
                    '100italic' => esc_html__('100 Thin Italic', 'industrialist'),
                    '200' => esc_html__('200 Extra-Light', 'industrialist'),
                    '200italic' => esc_html__('200 Extra-Light Italic', 'industrialist'),
                    '300' => esc_html__('300 Light', 'industrialist'),
                    '300italic' => esc_html__('300 Light Italic', 'industrialist'),
                    '400' => esc_html__('400 Regular', 'industrialist'),
                    '400italic' => esc_html__('400 Regular Italic', 'industrialist'),
                    '500' => esc_html__('500 Medium', 'industrialist'),
                    '500italic' => esc_html__('500 Medium Italic', 'industrialist'),
                    '600' => esc_html__('600 Semi-Bold', 'industrialist'),
                    '600italic' => esc_html__('600 Semi-Bold Italic', 'industrialist'),
                    '700' => esc_html__('700 Bold', 'industrialist'),
                    '700italic' => esc_html__('700 Bold Italic', 'industrialist'),
                    '800' => esc_html__('800 Extra-Bold', 'industrialist'),
                    '800italic' => esc_html__('800 Extra-Bold Italic', 'industrialist'),
                    '900' => esc_html__('900 Ultra-Bold', 'industrialist'),
                    '900italic' => esc_html__('900 Ultra-Bold Italic', 'industrialist')
                ),
                'args' => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'google_font_subset',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Subset', 'industrialist'),
                'description' => esc_html__('Choose a default Google font subsets for your site', 'industrialist'),
                'parent' => $panel_design_style,
                'options' => array(
                    'latin' => esc_html__('Latin', 'industrialist'),
                    'latin-ext' => esc_html__('Latin Extended', 'industrialist'),
                    'cyrillic' => esc_html__('Cyrillic', 'industrialist'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'industrialist'),
                    'greek' => esc_html__('Greek', 'industrialist'),
                    'greek-ext' => esc_html__('Greek Extended', 'industrialist'),
                    'vietnamese' => esc_html__('Vietnamese', 'industrialist')
                ),
                'args' => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'first_color',
                'type' => 'color',
                'label' => esc_html__('First Main Color', 'industrialist'),
                'description' => esc_html__('Choose the most dominant theme color. Default color is #ff1d4d', 'industrialist'),
                'parent' => $panel_design_style
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'page_background_color',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'industrialist'),
                'description' => esc_html__('Choose the background color for page content. Default color is #ffffff', 'industrialist'),
                'parent' => $panel_design_style
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'selection_color',
                'type' => 'color',
                'label' => esc_html__('Text Selection Color', 'industrialist'),
                'description' => esc_html__('Choose the color users see when selecting text', 'industrialist'),
                'parent' => $panel_design_style
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'boxed',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Boxed Layout', 'industrialist'),
                'description' => '',
                'parent' => $panel_design_style,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_boxed_container"
                )
            )
        );

        $boxed_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $panel_design_style,
                'name' => 'boxed_container',
                'hidden_property' => 'boxed',
                'hidden_value' => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'page_background_color_in_box',
                'type' => 'color',
                'label' => esc_html__('Page Background Color', 'industrialist'),
                'description' => esc_html__('Choose the page background color outside box.', 'industrialist'),
                'parent' => $boxed_container
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'boxed_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'industrialist'),
                'description' => esc_html__('Choose an image to be displayed in background', 'industrialist'),
                'parent' => $boxed_container
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'boxed_pattern_background_image',
                'type' => 'image',
                'label' => esc_html__('Background Pattern', 'industrialist'),
                'description' => esc_html__('Choose an image to be used as background pattern', 'industrialist'),
                'parent' => $boxed_container
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'boxed_background_image_attachment',
                'type' => 'select',
                'default_value' => 'fixed',
                'label' => esc_html__('Background Image Attachment', 'industrialist'),
                'description' => esc_html__('Choose background image attachment', 'industrialist'),
                'parent' => $boxed_container,
                'options' => array(
                    'fixed' => esc_html__('Fixed', 'industrialist'),
                    'scroll' => esc_html__('Scroll', 'industrialist')
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'initial_content_width',
                'type' => 'select',
                'default_value' => 'grid-1300',
                'label' => esc_html__('Initial Width of Content', 'industrialist'),
                'description' => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid"', 'industrialist'),
                'parent' => $panel_design_style,
                'options' => array(
                    'grid-1300' => esc_html('1300px - default value', 'industrialist'),
                    'grid-1200' => '1200px',
                    'grid-1100' => '1100px',
                    'grid-1000' => '1000px',
                    'grid-800' => '800px'
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'preload_pattern_image',
                'type' => 'image',
                'label' => esc_html__('Preload Pattern Image', 'industrialist'),
                'description' => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'industrialist'),
                'parent' => $panel_design_style
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'industrialist'),
                'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'industrialist'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = industrialist_mikado_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_settings',
                'title' => esc_html__('Behavior', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'smooth_scroll',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Smooth Scroll', 'industrialist'),
                'description' => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'industrialist'),
                'parent' => $panel_settings
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'smooth_page_transitions',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Smooth Page Transitions', 'industrialist'),
                'description' => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'industrialist'),
                'parent' => $panel_settings,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_page_transitions_container"
                )
            )
        );

        $page_transitions_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $panel_settings,
                'name' => 'page_transitions_container',
                'hidden_property' => 'smooth_page_transitions',
                'hidden_value' => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'smooth_pt_bgnd_color',
                'type' => 'color',
                'label' => esc_html__('Page Loader Background Color', 'industrialist'),
                //'description'   => 'Enabling this option will perform a smooth transition between pages when clicking on links.',
                'parent' => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = industrialist_mikado_add_admin_group(array(
            'name' => 'group_pt_spinner_animation',
            'title' => esc_html__('Loader Style', 'industrialist'),
            'description' => esc_html__('Define styles for loader spinner animation', 'industrialist'),
            'parent' => $page_transitions_container
        ));

        $row_pt_spinner_animation = industrialist_mikado_add_admin_row(array(
            'name' => 'row_pt_spinner_animation',
            'parent' => $group_pt_spinner_animation
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'selectsimple',
            'name' => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label' => esc_html__('Spinner Type', 'industrialist'),
            'parent' => $row_pt_spinner_animation,
            'options' => array(
                "pulse" => esc_html__("Pulse", 'industrialist'),
                "double_pulse" => esc_html__("Double Pulse", 'industrialist'),
                "cube" => esc_html__("Cube", 'industrialist'),
                "rotating_cubes" => esc_html__("Rotating Cubes", 'industrialist'),
                "stripes" => esc_html__("Stripes", 'industrialist'),
                "wave" => esc_html__("Wave", 'industrialist'),
                "two_rotating_circles" => esc_html__("2 Rotating Circles", 'industrialist'),
                "five_rotating_circles" => esc_html__("5 Rotating Circles", 'industrialist'),
                "atom" => esc_html__("Atom", 'industrialist'),
                "clock" => esc_html__("Clock", 'industrialist'),
                "mitosis" => esc_html__("Mitosis", 'industrialist'),
                "lines" => esc_html__("Lines", 'industrialist'),
                "fussion" => esc_html__("Fussion", 'industrialist'),
                "wave_circles" => esc_html__("Wave Circles", 'industrialist'),
                "pulse_circles" => esc_html__("Pulse Circles", 'industrialist')
            )
        ));

        industrialist_mikado_add_admin_field(array(
            'type' => 'colorsimple',
            'name' => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label' => esc_html__('Spinner Color', 'industrialist'),
            'parent' => $row_pt_spinner_animation
        ));

        /*

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'smooth_pt_true_ajax',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('True AJAX Transitions', 'industrialist'),
                'description' => esc_html__('Choose whether to load pages using AJAX or refresh the browser window, only mimicking AJAX behavior.', 'industrialist'),
                'parent' => $page_transitions_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#mkd_true_ajax_params_container"
                )
            )
        );

        $true_ajax_params_container = industrialist_mikado_add_admin_container(
            array(
                'parent' => $page_transitions_container,
                'name' => 'true_ajax_params_container',
                'hidden_property' => 'smooth_pt_true_ajax',
                'hidden_value' => 'no'
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'default_page_transition',
                'type' => 'select',
                'default_value' => 'fade',
                'label' => esc_html__('Page Transition', 'industrialist'),
                'description' => esc_html__('Choose the default type of transition between pages', 'industrialist'),
                'parent' => $true_ajax_params_container,
                'options' => array(
                    'no-animation' => esc_html__('No animation', 'industrialist'),
                    'fade' => esc_html__('Fade', 'industrialist')
                )
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'internal_no_ajax_links',
                'type' => 'textarea',
                'label' => esc_html__('List of Internal URLs Loaded Without AJAX (Comma-Separated)', 'industrialist'),
                'description' => esc_html__('To disable AJAX transitions on certain pages, enter their full URLs here (for example: http://www.mydomain.com/forum/)', 'industrialist'),
                'parent' => $true_ajax_params_container
            )
        );

        */

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'show_back_button',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Show "Back To Top Button"', 'industrialist'),
                'description' => esc_html__('Enabling this option will display a Back to Top button on every page', 'industrialist'),
                'parent' => $panel_settings
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'responsiveness',
                'type' => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__('Responsiveness', 'industrialist'),
                'description' => esc_html__('Enabling this option will make all pages responsive', 'industrialist'),
                'parent' => $panel_settings
            )
        );

        $panel_custom_code = industrialist_mikado_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'custom_css',
                'type' => 'textarea',
                'label' => esc_html__('Custom CSS', 'industrialist'),
                'description' => esc_html__('Enter your custom CSS here', 'industrialist'),
                'parent' => $panel_custom_code
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'custom_js',
                'type' => 'textarea',
                'label' => esc_html__('Custom JS', 'industrialist'),
                'description' => esc_html__('Enter your custom Javascript here', 'industrialist'),
                'parent' => $panel_custom_code
            )
        );

        $panel_google_api = industrialist_mikado_add_admin_panel(
            array(
                'page' => '',
                'name' => 'panel_google_api',
                'title' => esc_html__('Google API', 'industrialist')
            )
        );

        industrialist_mikado_add_admin_field(
            array(
                'name' => 'google_maps_api_key',
                'type' => 'text',
                'label' => esc_html__('Google Maps Api Key', 'industrialist'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation. Temporarily you can use "AIzaSyAidINa74sv7bt7Y3vqjKjM7m0PgJN1bhk"', 'industrialist'),
                'parent' => $panel_google_api
            )
        );

    }

    add_action('industrialist_mikado_options_map', 'industrialist_mikado_general_options_map', 1);

}