<?php
namespace Industrialist\Modules\Shortcodes\PricingTableHolder;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTableHolder implements ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'mkd_pricing_table_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Pricing Table', 'industrialist'),
                'base' => $this->base,
                'as_parent' => array('only' => 'mkd_pricing_table'),
                'content_element' => true,
                'category' => esc_html__('by MIKADO', 'industrialist'),
                'icon' => 'icon-wpb-pricing-table-holder extended-custom-icon',
                'show_settings_on_create' => true,
                'js_view' => 'VcColumnView',
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Columns', 'industrialist'),
                        'param_name' => 'columns',
                        'value' => array(
                            esc_html__('Two', 'industrialist') => 'mkd-two-columns',
                            esc_html__('Three', 'industrialist') => 'mkd-three-columns',
                            esc_html__('Four', 'industrialist') => 'mkd-four-columns',
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Layout', 'industrialist'),
                        'param_name' => 'layout',
                        'value' => array(
                            esc_html__('Equal size', 'industrialist') => '',
                            esc_html__('Larger active', 'industrialist') => 'mkd-larger-active',
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Skin', 'industrialist'),
                        'param_name' => 'skin',
                        'value' => array(
                            esc_html__('Default', 'industrialist') => '',
                            esc_html__('Light', 'industrialist') => 'light',
                            esc_html__('Dark', 'industrialist') => 'dark',
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),

                ),
            ));
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'columns' => 'mkd-two-columns',
            'layout' => '',
            'skin' => '',
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $params['pricing_tables_classes'] = $this->getPricingTablesClasses($params);

        $html = '<div class="mkd-pricing-tables clearfix ' . $params['pricing_tables_classes'] . '">';
        $html .= do_shortcode($content);
        $html .= '</div>';

        return $html;
    }

    /**
     * Returns array of pricing tables classes
     *
     * @param $params
     *
     * @return string
     */
    private function getPricingTablesClasses($params) {
        $pricing_tables_classes = array();

        $pricing_tables_classes[] = $params['columns'];
        if (!empty($params['layout'])) {
            $pricing_tables_classes[] = $params['layout'];
        }
        if (!empty($params['skin'])) {
            $pricing_tables_classes[] = $params['skin'];
        }

        $pricing_tables_classes[] = '';

        return implode(' ', $pricing_tables_classes);
    }
}