<?php

require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkd.kses.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkd.layout.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkd.optionsapi.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkd.framework.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkd.functions.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkd.common.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkd.icons/mkd.icons.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/admin/options/mkd-options-setup.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/admin/meta-boxes/mkd-meta-boxes-setup.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/modules/mkd-modules-loader.php";

if (!function_exists('industrialist_mikado_admin_scripts_init')) {
    /**
     * Function that registers all scripts that are necessary for our back-end
     */
    function industrialist_mikado_admin_scripts_init() {

        /**
         * @see MikadoSkinAbstract::registerScripts - hooked with 10
         * @see MikadoSkinAbstract::registerStyles - hooked with 10
         */
        do_action('industrialist_mikado_admin_scripts_init');
    }

    add_action('admin_init', 'industrialist_mikado_admin_scripts_init');
}

if (!function_exists('industrialist_mikado_enqueue_admin_styles')) {
    /**
     * Function that enqueues styles for options page
     */
    function industrialist_mikado_enqueue_admin_styles() {
        wp_enqueue_style('wp-color-picker');

        /**
         * @see MikadoSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('industrialist_mikado_enqueue_admin_styles');
    }
}

if (!function_exists('industrialist_mikado_enqueue_admin_scripts')) {
    /**
     * Function that enqueues styles for options page
     */
    function industrialist_mikado_enqueue_admin_scripts() {
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('common');
        wp_enqueue_script('wp-lists');
        wp_enqueue_script('postbox');
        wp_enqueue_media();
        wp_enqueue_script("mkd-dependence", get_template_directory_uri() . '/framework/admin/assets/js/mkd-ui/mkd-dependence.js', array(), false, true);
        wp_enqueue_script("mkd-twitter-connect", get_template_directory_uri() . '/framework/admin/assets/js/mkd-twitter-connect.js', array(), false, true);

        /**
         * @see MikadoSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('industrialist_mikado_enqueue_admin_scripts');
    }
}

if (!function_exists('industrialist_mikado_enqueue_meta_box_styles')) {
    /**
     * Function that enqueues styles for meta boxes
     */
    function industrialist_mikado_enqueue_meta_box_styles() {
        wp_enqueue_style('wp-color-picker');

        /**
         * @see MikadoSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('industrialist_mikado_enqueue_meta_box_styles');
    }
}

if (!function_exists('industrialist_mikado_enqueue_meta_box_scripts')) {
    /**
     * Function that enqueues scripts for meta boxes
     */
    function industrialist_mikado_enqueue_meta_box_scripts() {
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('common');
        wp_enqueue_script('wp-lists');
        wp_enqueue_script('postbox');
        wp_enqueue_media();
        wp_enqueue_script('mkd-dependence');

        /**
         * @see MikadoSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('industrialist_mikado_enqueue_meta_box_scripts');
    }
}

if (!function_exists('industrialist_mikado_enqueue_nav_menu_script')) {
    /**
     * Function that enqueues styles and scripts necessary for menu administration page.
     * It checks $hook variable
     * @param $hook string current page hook to check
     */
    function industrialist_mikado_enqueue_nav_menu_script($hook) {
        if ($hook == 'nav-menus.php') {
            wp_enqueue_script('mkd-nav-menu', get_template_directory_uri() . '/framework/admin/assets/js/mkd-nav-menu.js');
            wp_enqueue_style('mkd-nav-menu', get_template_directory_uri() . '/framework/admin/assets/css/mkd-nav-menu.css');
        }
    }

    add_action('admin_enqueue_scripts', 'industrialist_mikado_enqueue_nav_menu_script');
}


if (!function_exists('industrialist_mikado_enqueue_widgets_admin_script')) {
    /**
     * Function that enqueues styles and scripts for admin widgets page.
     * @param $hook string current page hook to check
     */
    function industrialist_mikado_enqueue_widgets_admin_script($hook) {
        if ($hook == 'widgets.php') {
            wp_enqueue_script('mkd-dependence');
        }
    }

    add_action('admin_enqueue_scripts', 'industrialist_mikado_enqueue_widgets_admin_script');
}


if (!function_exists('industrialist_mikado_enqueue_styles_slider_taxonomy')) {
    /**
     * Enqueue styles when on slider taxonomy page in admin
     */
    function industrialist_mikado_enqueue_styles_slider_taxonomy() {
        if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'slides_category') {
            industrialist_mikado_enqueue_admin_styles();
        }
    }

    add_action('admin_print_scripts-edit-tags.php', 'industrialist_mikado_enqueue_styles_slider_taxonomy');
}

if (!function_exists('industrialist_mikado_init_theme_options_array')) {
    /**
     * Function that merges $industrialist_options and default options array into one array.
     *
     * @see array_merge()
     */
    function industrialist_mikado_init_theme_options_array() {
        global $industrialist_options, $industrialist_Framework;

        $db_options = get_option('mkd_industrialist_options');

        //does mkd_options exists in db?
        if (is_array($db_options)) {
            //merge with default options
            $industrialist_options = array_merge($industrialist_Framework->mkdOptions->options, get_option('mkd_industrialist_options'));
        } else {
            //options don't exists in db, take default ones
            $industrialist_options = $industrialist_Framework->mkdOptions->options;
        }
    }

    add_action('industrialist_mikado_after_options_map', 'industrialist_mikado_init_theme_options_array', 0);
}

if (!function_exists('industrialist_mikado_init_theme_options')) {
    /**
     * Function that sets $industrialist_options variable if it does'nt exists
     */
    function industrialist_mikado_init_theme_options() {
        global $industrialist_options;
        global $industrialist_Framework;
        if (isset($industrialist_options['reset_to_defaults'])) {
            if ($industrialist_options['reset_to_defaults'] == 'yes') delete_option("mkd_industrialist_options");
        }

        if (!get_option("mkd_industrialist_options")) {
            add_option("mkd_industrialist_options",
                $industrialist_Framework->mkdOptions->options
            );

            $industrialist_options = $industrialist_Framework->mkdOptions->options;
        }
    }
}

if (!function_exists('industrialist_mikado_register_theme_settings')) {
    /**
     * Function that registers setting that will be used to store theme options
     */
    function industrialist_mikado_register_theme_settings() {
        register_setting('industrialist_mikado_theme_menu', 'mkd_options');
    }

    add_action('admin_init', 'industrialist_mikado_register_theme_settings');
}

if (!function_exists('industrialist_mikado_get_admin_tab')) {
    /**
     * Helper function that returns current tab from url.
     * @return null
     */
    function industrialist_mikado_get_admin_tab() {
        return isset($_GET['page']) ? industrialist_mikado_strafter($_GET['page'], 'tab') : NULL;
    }
}

if (!function_exists('industrialist_mikado_strafter')) {
    /**
     * Function that returns string that comes after found string
     * @param $string string where to search
     * @param $substring string what to search for
     * @return null|string string that comes after found string
     */
    function industrialist_mikado_strafter($string, $substring) {
        $pos = strpos($string, $substring);
        if ($pos === false) {
            return NULL;
        }

        return (substr($string, $pos + strlen($substring)));
    }
}

if (!function_exists('industrialist_mikado_save_options')) {
    /**
     * Function that saves theme options to db.
     * It hooks to ajax wp_ajax_mkd_save_options action.
     */
    function industrialist_mikado_save_options() {
        global $industrialist_options;

        if(current_user_can('administrator')) {

            $_REQUEST = stripslashes_deep($_REQUEST);

            unset($_REQUEST['action']);

            check_ajax_referer('mkd_ajax_save_nonce', 'mkd_ajax_save_nonce');

            $industrialist_options = array_merge($industrialist_options, $_REQUEST);

            update_option('mkd_industrialist_options', $industrialist_options);

            do_action('industrialist_mikado_after_theme_option_save');
            echo "Saved";

            die();
        }
    }

    add_action('wp_ajax_industrialist_mikado_save_options', 'industrialist_mikado_save_options');
}

if (!function_exists('industrialist_mikado_meta_box_add')) {
    /**
     * Function that adds all defined meta boxes.
     * It loops through array of created meta boxes and adds them
     */
    function industrialist_mikado_meta_box_add() {
        global $industrialist_Framework;


        foreach ($industrialist_Framework->mkdMetaBoxes->metaBoxes as $key => $box) {
            $hidden = false;
            if (!empty($box->hidden_property)) {
                foreach ($box->hidden_values as $value) {
                    if (industrialist_mikado_option_get_value($box->hidden_property) == $value)
                        $hidden = true;

                }
            }

            if (is_string($box->scope)) {
                $box->scope = array($box->scope);
            }

            if (is_array($box->scope) && count($box->scope)) {
                foreach ($box->scope as $screen) {
                    add_meta_box(
                        'mkd-meta-box-' . $key,
                        $box->title,
                        'industrialist_mikado_render_meta_box',
                        $screen,
                        'advanced',
                        'high',
                        array('box' => $box)
                    );

                    if ($hidden) {
                        add_filter('postbox_classes_' . $screen . '_mkd-meta-box-' . $key, 'industrialist_mikado_meta_box_add_hidden_class');
                    }
                }
            }

        }

        add_action('admin_enqueue_scripts', 'industrialist_mikado_enqueue_meta_box_styles');
        add_action('admin_enqueue_scripts', 'industrialist_mikado_enqueue_meta_box_scripts');
    }

    add_action('add_meta_boxes', 'industrialist_mikado_meta_box_add');
}

if (!function_exists('industrialist_mikado_get_meta_post_types')) {
    function industrialist_mikado_get_meta_post_types() {
        $post_types = array("page", "post", "portfolio-item", "testimonials", "slides", "carousels", "clients", "masonry_gallery");

        $post_types = apply_filters('industrialist_mikado_meta_post_types', $post_types);

        return $post_types;
    }
}

if (!function_exists('industrialist_mikado_meta_box_save')) {
    /**
     * Function that saves meta box to postmeta table
     * @param $post_id int id of post that meta box is being saved
     * @param $post WP_Post current post object
     */
    function industrialist_mikado_meta_box_save($post_id, $post) {
        global $industrialist_Framework;
        global $industrialist_IconCollections;

        $nonces_array = array();
        $meta_boxes = industrialist_mikado_framework()->mkdMetaBoxes->getMetaBoxesByScope($post->post_type);

        if (is_array($meta_boxes) && count($meta_boxes)) {
            foreach ($meta_boxes as $meta_box) {
                $nonces_array[] = 'mkd_themename_meta_box_' . $meta_box->name . '_save';
            }
        }

        if (is_array($nonces_array) && count($nonces_array)) {
            foreach ($nonces_array as $nonce) {
                if (!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $nonce)) {
                    return;
                }
            }
        }

        $postTypes = industrialist_mikado_get_meta_post_types();

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!isset($_POST['_wpnonce'])) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (!in_array($post->post_type, $postTypes)) {
            return;
        }

        foreach ($industrialist_Framework->mkdMetaBoxes->options as $key => $box) {

            if (isset($_POST[$key]) && trim($_POST[$key] !== '')) {

                $value = $_POST[$key];

                update_post_meta($post_id, $key, $value);
            } else {
                delete_post_meta($post_id, $key);
            }
        }

        $portfolios = false;
        if (isset($_POST['optionLabel'])) {
            foreach ($_POST['optionLabel'] as $key => $value) {
                $portfolios_val[$key] = array('optionLabel' => $value, 'optionValue' => $_POST['optionValue'][$key], 'optionUrl' => $_POST['optionUrl'][$key], 'optionlabelordernumber' => $_POST['optionlabelordernumber'][$key]);
                $portfolios = true;

            }
        }

        if ($portfolios) {
            update_post_meta($post_id, 'mkd_portfolios', $portfolios_val);
        } else {
            delete_post_meta($post_id, 'mkd_portfolios');
        }

        $portfolio_images = false;
        if (isset($_POST['portfolioimg'])) {
            foreach ($_POST['portfolioimg'] as $key => $value) {
                $portfolio_images_val[$key] = array('portfolioimg' => $_POST['portfolioimg'][$key], 'portfoliotitle' => $_POST['portfoliotitle'][$key], 'portfolioimgordernumber' => $_POST['portfolioimgordernumber'][$key], 'portfoliovideotype' => $_POST['portfoliovideotype'][$key], 'portfoliovideoid' => $_POST['portfoliovideoid'][$key], 'portfoliovideoimage' => $_POST['portfoliovideoimage'][$key], 'portfoliovideowebm' => $_POST['portfoliovideowebm'][$key], 'portfoliovideomp4' => $_POST['portfoliovideomp4'][$key], 'portfoliovideoogv' => $_POST['portfoliovideoogv'][$key], 'portfolioimgtype' => $_POST['portfolioimgtype'][$key]);
                $portfolio_images = true;
            }
        }


        if ($portfolio_images) {
            update_post_meta($post_id, 'mkd_portfolio_images', $portfolio_images_val);
        } else {
            delete_post_meta($post_id, 'mkd_portfolio_images');
        }

        $slide_elements = false;
        if (isset($_POST['slideelementtype'])) {
            foreach ($_POST['slideelementtype'] as $key => $value) {
                $slide_elements_val[$key] = array(
                    'slideelementtype' => $value,
                    'slideelementname' => $_POST['slideelementname'][$key],
                    'slideelementzindex' => $_POST['slideelementzindex'][$key],
                    'slideelementpivot' => $_POST['slideelementpivot'][$key],
                    'slideelementvisible' => $_POST['slideelementvisible'][$key],
                    'slideelementmargintop' => $_POST['slideelementmargintop'][$key],
                    'slideelementmarginbottom' => $_POST['slideelementmarginbottom'][$key],
                    'slideelementmarginleft' => $_POST['slideelementmarginleft'][$key],
                    'slideelementmarginright' => $_POST['slideelementmarginright'][$key],

                    'slideelementtext' => $_POST['slideelementtext'][$key],
                    'slideelementtextoptions' => $_POST['slideelementtextoptions'][$key],
                    'slideelementtextlink' => $_POST['slideelementtextlink'][$key],
                    'slideelementtexttarget' => $_POST['slideelementtexttarget'][$key],
                    'slideelementtextlinkhovercolor' => $_POST['slideelementtextlinkhovercolor'][$key],
                    'slideelementtextwidth' => $_POST['slideelementtextwidth'][$key],
                    'slideelementtextheight' => $_POST['slideelementtextheight'][$key],
                    'slideelementtextleft' => $_POST['slideelementtextleft'][$key],
                    'slideelementtexttop' => $_POST['slideelementtexttop'][$key],
                    'slideelementtextstyle' => $_POST['slideelementtextstyle'][$key],
                    'slideelementfontcolor' => $_POST['slideelementfontcolor'][$key],
                    'slideelementfontsize' => $_POST['slideelementfontsize'][$key],
                    'slideelementlineheight' => $_POST['slideelementlineheight'][$key],
                    'slideelementletterspacing' => $_POST['slideelementletterspacing'][$key],
                    'slideelementfontfamily' => $_POST['slideelementfontfamily'][$key],
                    'slideelementfontstyle' => $_POST['slideelementfontstyle'][$key],
                    'slideelementfontweight' => $_POST['slideelementfontweight'][$key],
                    'slideelementtexttransform' => $_POST['slideelementtexttransform'][$key],
                    'slideelementtextbgndcolor' => $_POST['slideelementtextbgndcolor'][$key],
                    'slideelementtextbgndtransparency' => $_POST['slideelementtextbgndtransparency'][$key],
                    'slideelementtextborderthickness' => $_POST['slideelementtextborderthickness'][$key],
                    'slideelementtextborderstyle' => $_POST['slideelementtextborderstyle'][$key],
                    'slideelementtextbordercolor' => $_POST['slideelementtextbordercolor'][$key],

                    'slideelementimageurl' => $_POST['slideelementimageurl'][$key],
                    'slideelementimageuploadheight' => $_POST['slideelementimageuploadheight'][$key],
                    'slideelementimageuploadwidth' => $_POST['slideelementimageuploadwidth'][$key],
                    'slideelementimagewidth' => $_POST['slideelementimagewidth'][$key],
                    'slideelementimageheight' => $_POST['slideelementimageheight'][$key],
                    'slideelementimageleft' => $_POST['slideelementimageleft'][$key],
                    'slideelementimagetop' => $_POST['slideelementimagetop'][$key],
                    'slideelementimagelink' => $_POST['slideelementimagelink'][$key],
                    'slideelementimagetarget' => $_POST['slideelementimagetarget'][$key],
                    'slideelementimageborderthickness' => $_POST['slideelementimageborderthickness'][$key],
                    'slideelementimageborderstyle' => $_POST['slideelementimageborderstyle'][$key],
                    'slideelementimagebordercolor' => $_POST['slideelementimagebordercolor'][$key],

                    'slideelementbuttontext' => $_POST['slideelementbuttontext'][$key],
                    'slideelementbuttonlink' => $_POST['slideelementbuttonlink'][$key],
                    'slideelementbuttontarget' => $_POST['slideelementbuttontarget'][$key],
                    'slideelementbuttontop' => $_POST['slideelementbuttontop'][$key],
                    'slideelementbuttonleft' => $_POST['slideelementbuttonleft'][$key],
                    'slideelementbuttonsize' => $_POST['slideelementbuttonsize'][$key],
                    'slideelementbuttontype' => $_POST['slideelementbuttontype'][$key],
                    'slideelementbuttoninline' => $_POST['slideelementbuttoninline'][$key],
                    'slideelementbuttonfontsize' => $_POST['slideelementbuttonfontsize'][$key],
                    'slideelementbuttonfontweight' => $_POST['slideelementbuttonfontweight'][$key],
                    'slideelementbuttonfontcolor' => $_POST['slideelementbuttonfontcolor'][$key],
                    'slideelementbuttonfonthovercolor' => $_POST['slideelementbuttonfonthovercolor'][$key],
                    'slideelementbuttonbgndcolor' => $_POST['slideelementbuttonbgndcolor'][$key],
                    'slideelementbuttonbgndhovercolor' => $_POST['slideelementbuttonbgndhovercolor'][$key],
                    'slideelementbuttonbordercolor' => $_POST['slideelementbuttonbordercolor'][$key],
                    'slideelementbuttonborderhovercolor' => $_POST['slideelementbuttonborderhovercolor'][$key],
                    'slideelementbuttoniconpack' => $_POST['slideelementbuttoniconpack'][$key],

                    'slideelementsectionlinkanchor' => $_POST['slideelementsectionlinkanchor'][$key],
                    'slideelementsectionlinktext' => $_POST['slideelementsectionlinktext'][$key],

                    'slideelementanimation' => $_POST['slideelementanimation'][$key],
                    'slideelementanimationdelay' => $_POST['slideelementanimationdelay'][$key],
                    'slideelementanimationduration' => $_POST['slideelementanimationduration'][$key],
                    'slideelementresponsive' => $_POST['slideelementresponsive'][$key],
                    'slideelementscalemobile' => $_POST['slideelementscalemobile'][$key],
                    'slideelementscaletabletp' => $_POST['slideelementscaletabletp'][$key],
                    'slideelementscaletabletl' => $_POST['slideelementscaletabletl'][$key],
                    'slideelementscalelaptop' => $_POST['slideelementscalelaptop'][$key],
                    'slideelementscaledesktop' => $_POST['slideelementscaledesktop'][$key],
                    'slideelementleftmobile' => $_POST['slideelementleftmobile'][$key],
                    'slideelementlefttabletp' => $_POST['slideelementlefttabletp'][$key],
                    'slideelementlefttabletl' => $_POST['slideelementlefttabletl'][$key],
                    'slideelementleftlaptop' => $_POST['slideelementleftlaptop'][$key],
                    'slideelementleftdesktop' => $_POST['slideelementleftdesktop'][$key],
                    'slideelementtopmobile' => $_POST['slideelementtopmobile'][$key],
                    'slideelementtoptabletp' => $_POST['slideelementtoptabletp'][$key],
                    'slideelementtoptabletl' => $_POST['slideelementtoptabletl'][$key],
                    'slideelementtoplaptop' => $_POST['slideelementtoplaptop'][$key],
                    'slideelementtopdesktop' => $_POST['slideelementtopdesktop'][$key]
                );
                // handling various icon_packs
                foreach ($industrialist_IconCollections->iconCollections as $collection_key => $collection_object) {
                    $slide_elements_val[$key]['slideelementbuttonicon_' . $collection_key] = $_POST['slideelementbuttonicon_' . $collection_key][$key];
                }
                $slide_elements = true;

            }
        }

        if ($slide_elements) {
            update_post_meta($post_id, 'mkd_slide_elements', $slide_elements_val);
        } else {
            delete_post_meta($post_id, 'mkd_slide_elements');
        }
    }

    add_action('save_post', 'industrialist_mikado_meta_box_save', 1, 2);
}

if (!function_exists('industrialist_mikado_render_meta_box')) {
    /**
     * Function that renders meta box
     * @param $post WP_Post post object
     * @param $metabox array array of current meta box parameters
     */
    function industrialist_mikado_render_meta_box($post, $metabox) { ?>

        <div class="mkd-meta-box mkd-page">
            <div class="mkd-meta-box-holder">

                <?php $metabox['args']['box']->render(); ?>
                <?php wp_nonce_field('mkd_themename_meta_box_' . $metabox['args']['box']->name . '_save', 'mkd_themename_meta_box_' . $metabox['args']['box']->name . '_save'); ?>

            </div>
        </div>

        <?php
    }
}

if (!function_exists('industrialist_mikado_meta_box_add_hidden_class')) {
    /**
     * Function that adds class that will initially hide meta box
     * @param array $classes array of classes
     * @return array modified array of classes
     */
    function industrialist_mikado_meta_box_add_hidden_class($classes = array()) {
        if (!in_array('mkd-meta-box-hidden', $classes))
            $classes[] = 'mkd-meta-box-hidden';

        return $classes;
    }

}

if (!function_exists('industrialist_mikado_remove_default_custom_fields')) {
    /**
     * Function that removes default WordPress custom fields interface
     */
    function industrialist_mikado_remove_default_custom_fields() {
        foreach (array('normal', 'advanced', 'side') as $context) {
            $postTypes = industrialist_mikado_get_meta_post_types();
            foreach ($postTypes as $postType) {
                remove_meta_box('postcustom', $postType, $context);
            }
        }
    }

    add_action('do_meta_boxes', 'industrialist_mikado_remove_default_custom_fields');
}


if (!function_exists('industrialist_mikado_get_custom_sidebars')) {
    /**
     * Function that returns all custom made sidebars.
     *
     * @uses get_option()
     * @return array array of custom made sidebars where key and value are sidebar name
     */
    function industrialist_mikado_get_custom_sidebars() {
        $custom_sidebars = get_option('mkd_sidebars');
        $formatted_array = array();

        if (is_array($custom_sidebars) && count($custom_sidebars)) {
            foreach ($custom_sidebars as $custom_sidebar) {
                $formatted_array[sanitize_title($custom_sidebar)] = $custom_sidebar;
            }
        }

        return $formatted_array;
    }
}

if (!function_exists('industrialist_mikado_generate_icon_pack_options')) {
    /**
     * Generates options HTML for each icon in given icon pack
     * Hooked to wp_ajax_update_admin_nav_icon_options action
     */
    function industrialist_mikado_generate_icon_pack_options() {
        global $industrialist_IconCollections;

        $html = '';
        $icon_pack = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
        $collections_object = $industrialist_IconCollections->getIconCollection($icon_pack);

        if ($collections_object) {
            $icons = $collections_object->getIconsArray();
            if (is_array($icons) && count($icons)) {
                foreach ($icons as $key => $icon) {
                    $html .= '<option value="' . esc_attr($key) . '">' . esc_html($key) . '</option>';
                }
            }
        }

        print $html;
    }

    add_action('wp_ajax_update_admin_nav_icon_options', 'industrialist_mikado_generate_icon_pack_options');
}

if (!function_exists('industrialist_mikado_admin_notice')) {
    /**
     * Prints admin notice. It checks if notice has been disabled and if it hasn't then it displays it
     * @param $id string id of notice. It will be used to store notice dismis
     * @param $message string message to show to the user
     * @param $class string HTML class of notice
     * @param bool $is_dismisable whether notice is dismisable or not
     */
    function industrialist_mikado_admin_notice($id, $message, $class, $is_dismisable = true) {
        $is_dismised = get_user_meta(get_current_user_id(), 'dismis_' . $id);

        //if notice isn't dismissed
        if (!$is_dismised && is_admin()) {
            echo '<div style="display: block;" class="' . esc_attr($class) . ' is-dismissible notice">';
            echo '<p>';

            echo wp_kses_post($message);

            if ($is_dismisable) {
                echo '<strong style="display: block; margin-top: 7px;"><a href="' . esc_url(add_query_arg('mkd_dismis_notice', $id)) . '">' . esc_html__('Dismiss this notice', 'industrialist') . '</a></strong>';
            }

            echo '</p>';

            echo '</div>';
        }

    }
}

if (!function_exists('industrialist_mikado_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function industrialist_mikado_save_dismisable_notice() {
        if (is_admin() && !empty($_GET['mkd_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['mkd_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_' . $notice_id, 1);
        }
    }

    add_action('admin_init', 'industrialist_mikado_save_dismisable_notice');
}

if (!function_exists('industrialist_mikado_hook_twitter_request_ajax')) {
    /**
     * Wrapper function for obtaining twitter request token.
     * Hooks to wp_ajax_mkd_twitter_obtain_request_token ajax action
     *
     * @see MikadoTwitterApi::obtainRequestToken()
     */
    function industrialist_mikado_hook_twitter_request_ajax() {
        MikadoTwitterApi::getInstance()->obtainRequestToken();
    }

    add_action('wp_ajax_mkd_twitter_obtain_request_token', 'industrialist_mikado_hook_twitter_request_ajax');
}
?>