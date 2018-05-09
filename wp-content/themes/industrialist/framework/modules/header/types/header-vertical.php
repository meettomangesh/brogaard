<?php
namespace Industrialist\Modules\Header\Types;

use Industrialist\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header Vertical layout and option
 *
 * Class HeaderVertical
 */
class HeaderVertical extends HeaderType
{
    public function __construct() {
        $this->slug = 'header-vertical';

        add_action('wp', array($this, 'setHeaderHeightProps'));

        add_filter('industrialist_mikado_js_global_variables', array($this, 'getGlobalJSVariables'));
        add_filter('industrialist_mikado_per_page_js_vars', array($this, 'getPerPageJSVariables'));
        add_filter('industrialist_mikado_add_page_custom_style', array($this, 'headerPerPageStyles'));
    }

    public function headerPerPageStyles($style) {
        $id = industrialist_mikado_get_page_id();
        $class_prefix = industrialist_mikado_get_unique_page_class();
        $main_menu_style = array();
        $main_menu_item_style = array();
        $current_style = '';
        $main_menu_selector = array($class_prefix . '.mkd-header-vertical .mkd-vertical-menu-area-inner');
        $main_menu_item_selector = array($class_prefix . '.mkd-header-vertical .mkd-vertical-menu > ul > li:not(:last-child)');

        /* header style - start */

        $menu_text_align = get_post_meta($id, 'mkd_vertical_header_align_meta', true);

        if ($menu_text_align !== null) {
            $main_menu_style['text-align'] = $menu_text_align;
        }

        /* header style - end */

        /* header in grid style - start */

        $menu_item_separator = get_post_meta($id, 'mkd_vertical_dropdown_border_bottom_meta', true);
        $menu_item_separator_color = get_post_meta($id, 'mkd_vertical_dropdown_border_bottom_color_meta', true);


        if ($menu_item_separator === 'no') {
            $main_menu_item_style['border-bottom'] = 'none';
        } elseif ($menu_item_separator === 'yes' && $menu_item_separator_color !== '') {
            $main_menu_item_style['border-bottom'] = '1px solid ' . $menu_item_separator_color;
        }

        /* header in grid style - end */

        $current_style .= industrialist_mikado_dynamic_css($main_menu_selector, $main_menu_style);
        $current_style .= industrialist_mikado_dynamic_css($main_menu_item_selector, $main_menu_item_style);

        $current_style = $current_style . $style;

        return $current_style;
    }

    /**
     * Loads template for header type
     *
     * @param array $parameters associative array of variables to pass to template
     */
    public function loadTemplate($parameters = array()) {
        industrialist_mikado_get_module_template_part('templates/types/' . $this->slug, $this->moduleName, '', $parameters);
    }

    /**
     * Sets header height properties after WP object is set up
     */
    public function setHeaderHeightProps() {
        $this->heightOfTransparency = $this->calculateHeightOfTransparency();
        $this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
        $this->headerHeight = $this->calculateHeaderHeight();
    }

    /**
     * Returns total height of transparent parts of header
     *
     * @return mixed
     */
    public function calculateHeightOfTransparency() {
        return 0;
    }

    /**
     * Returns height of header parts that are totaly transparent
     *
     * @return mixed
     */
    public function calculateHeightOfCompleteTransparency() {
        return 0;
    }

    /**
     * Returns header height
     *
     * @return mixed
     */
    public function calculateHeaderHeight() {
        return 0;
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
        $globalVariables['mkdMenuAreaHeight'] = 0;

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
        $perPageVars['mkdHeaderTransparencyHeight'] = 0;

        return $perPageVars;
    }
}