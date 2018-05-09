<?php
namespace Industrialist\Modules\Header\Types;

use Industrialist\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header 'In The Box' layout and option
 *
 * Class HeaderBox
 */
class HeaderBox extends HeaderType
{
    protected $heightOfTransparency;
    protected $heightOfCompleteTransparency;
    protected $headerHeight;
    protected $mobileHeaderHeight;

    /**
     * Sets slug property which is the same as value of option in DB
     */
    public function __construct() {
        $this->slug = 'header-box';

        if (!is_admin()) {

            $menuAreaHeight = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('menu_area_height_header_box'));
            $this->menuAreaHeight = $menuAreaHeight !== '' ? intval($menuAreaHeight) : 100;

            $mobileHeaderHeight = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('mobile_header_height'));
            $this->mobileHeaderHeight = $mobileHeaderHeight !== '' ? intval($mobileHeaderHeight) : 100;

            add_action('wp', array($this, 'setHeaderHeightProps'));

            add_filter('industrialist_mikado_js_global_variables', array($this, 'getGlobalJSVariables'));
            add_filter('industrialist_mikado_per_page_js_vars', array($this, 'getPerPageJSVariables'));
            add_filter('industrialist_mikado_add_page_custom_style', array($this, 'headerPerPageStyles'));
        }
    }

    public function headerPerPageStyles($style) {
        $id = industrialist_mikado_get_page_id();
        $class_prefix = industrialist_mikado_get_unique_page_class();
        $main_menu_grid_style = array();
        $current_style = '';
        $main_menu_grid_selector = array($class_prefix . '.mkd-header-box .mkd-page-header .mkd-menu-area .mkd-grid .mkd-vertical-align-containers');

        /* header in grid style - start */

        $menu_area_grid_background_color = get_post_meta($id, 'mkd_menu_area_grid_background_color_header_box_meta', true);
        $menu_area_grid_background_transparency = 1;

//        $menu_area_border = get_post_meta($id, 'mkd_menu_area_border_header_centered_meta', true);
//        $menu_area_border_color = get_post_meta($id, 'mkd_menu_area_border_header_centered_color_meta', true);

        $menu_area_grid_background_color_rgba = industrialist_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);

        if ($menu_area_grid_background_color_rgba !== null) {
            $main_menu_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
        }

//        if ($menu_area_border === 'no') {
//            $main_menu_grid_style['border-bottom'] = 'none';
//        } elseif ($menu_area_border === 'yes' && $menu_area_border_color !== '') {
//            $main_menu_grid_style['border-bottom'] = '1px solid ' . $menu_area_border_color;
//        }

        $menu_area_grid_border_radius = get_post_meta($id, 'mkd_menu_area_border_box_header_box_meta', true);
        if ($menu_area_grid_border_radius !== '') {
            $main_menu_grid_style['border-radius'] = $menu_area_grid_border_radius;
        }

        /* header in grid style - end */

        /* top bar background on this header */

        $current_style .= industrialist_mikado_dynamic_css($main_menu_grid_selector, $main_menu_grid_style);

        $top_bar_style = array();
        $top_bar_selector = array($class_prefix . ' .mkd-top-bar-background');

        $top_bar_background_height = industrialist_mikado_get_top_bar_background_height();

        if ($top_bar_background_height !== '') {
            $top_bar_style['height'] = $top_bar_background_height . 'px';
        }

        $top_bar_bg_color = get_post_meta($id, 'mkd_top_bar_background_color_meta', true);

        if ($top_bar_bg_color !== '') {
            $top_bar_transparency = get_post_meta($id, 'mkd_top_bar_background_transparency_meta', true);
            if ($top_bar_transparency === '') {
                $top_bar_transparency = 1;
            }

            $top_bar_style['background-color'] = industrialist_mikado_rgba_color($top_bar_bg_color, $top_bar_transparency);
        }

        $current_style .= industrialist_mikado_dynamic_css($top_bar_selector, $top_bar_style);

        $current_style = $current_style . $style;

        return $current_style;
    }

    /**
     * Loads template file for this header type
     *
     * @param array $parameters associative array of variables that needs to passed to template
     */
    public function loadTemplate($parameters = array()) {
        $id = industrialist_mikado_get_page_id();

        $parameters['menu_area_in_grid'] = industrialist_mikado_get_meta_field_intersect('menu_area_in_grid_header_box', $id) == 'yes' ? true : false;
        $parameters['header_box_logo_area'] = industrialist_mikado_get_meta_field_intersect('logo_area_header_box', $id) == 'yes' ? true : false;

        $logo_style = industrialist_mikado_get_meta_field_intersect('logo_area_style_header_box', $id);
        $parameters['logo_area_style'] = $logo_style !== '' ? 'mkd-' . $logo_style : '';

        $parameters = apply_filters('industrialist_mikado_header_box_parameters', $parameters);

        industrialist_mikado_get_module_template_part('templates/types/' . $this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps() {
        $this->heightOfTransparency = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight = $this->calculateHeaderHeight();
        $this->mobileHeaderHeight = $this->calculateMobileHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return int
     */
    public function calculateHeightOfTransparency() {
        $id = industrialist_mikado_get_page_id();

        $sliderExists = get_post_meta($id, 'mkd_page_slider_meta', true) !== '';


        $transparencyHeight = $this->menuAreaHeight;

        if (($sliderExists && industrialist_mikado_is_top_bar_enabled())
            || industrialist_mikado_is_top_bar_enabled() && industrialist_mikado_is_top_bar_transparent()
        ) {
            $transparencyHeight += industrialist_mikado_get_top_bar_height();
        }


        return $transparencyHeight;
    }

    /**
     * Returns height of completely transparent header parts
     *
     * @return int
     */
    public function calculateHeightOfCompleteTransparency() {

        $transparencyHeight = $this->menuAreaHeight / 2;

        return $transparencyHeight;
    }


    /**
     * Returns total height of header
     *
     * @return int|string
     */
    public function calculateHeaderHeight() {
        $headerHeight = $this->menuAreaHeight;
        if (industrialist_mikado_is_top_bar_enabled()) {
            $headerHeight += industrialist_mikado_get_top_bar_height();
        }

        return $headerHeight;
    }

    /**
     * Returns total height of mobile header
     *
     * @return int|string
     */
    public function calculateMobileHeaderHeight() {
        $mobileHeaderHeight = $this->mobileHeaderHeight;

        return $mobileHeaderHeight;
    }

    /**
     * Returns global js variables of header
     *
     * @param $globalVariables
     *
     * @return int|string
     */
    public function getGlobalJSVariables($globalVariables) {
        $globalVariables['mkdLogoAreaHeight'] = 0;
        $globalVariables['mkdMenuAreaHeight'] = $this->headerHeight;
        $globalVariables['mkdMobileHeaderHeight'] = $this->mobileHeaderHeight;

        return $globalVariables;
    }

    /**
     * Returns per page js variables of header
     *
     * @param $perPageVars
     *
     * @return int|string
     */
    public function getPerPageJSVariables($perPageVars) {
        //calculate transparency height only if header has no sticky behaviour
        if (!in_array(industrialist_mikado_get_meta_field_intersect('header_behaviour'), array(
            'sticky-header-on-scroll-up',
            'sticky-header-on-scroll-down-up'
        ))
        ) {
            $perPageVars['mkdHeaderTransparencyHeight'] = $this->headerHeight - (industrialist_mikado_get_top_bar_height() + $this->heightOfCompleteTransparency);
        } else {
            $perPageVars['mkdHeaderTransparencyHeight'] = 0;
        }

        return $perPageVars;
    }
}