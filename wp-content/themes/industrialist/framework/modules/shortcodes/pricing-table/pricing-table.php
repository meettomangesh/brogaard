<?php
namespace Industrialist\Modules\Shortcodes\PricingTable;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'mkd_pricing_table';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Pricing Table Item', 'industrialist'),
                'base' => $this->base,
                'icon' => 'icon-wpb-pricing-table-item extended-custom-icon',
                'category' => esc_html__('by MIKADO', 'industrialist'),
                'allowed_container_element' => 'vc_row',
                'as_child' => array('only' => 'mkd_pricing_table_holder'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Title', 'industrialist'),
                        'param_name' => 'title',
                        'value' => esc_html__('Basic Plan', 'industrialist'),
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Price', 'industrialist'),
                        'param_name' => 'price',
                        'description' => esc_html__('Default value is 100', 'industrialist'),
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Currency', 'industrialist'),
                        'param_name' => 'currency',
                        'description' => esc_html__('Default mark is $', 'industrialist'),
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Price Period', 'industrialist'),
                        'param_name' => 'price_period',
                        'description' => esc_html__('Default label is monthly', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Show Button', 'industrialist'),
                        'param_name' => 'show_button',
                        'value' => array(
                            esc_html__('Default', 'industrialist') => '',
                            esc_html__('Yes', 'industrialist') => 'yes',
                            esc_html__('No', 'industrialist') => 'no'
                        ),
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Button Text', 'industrialist'),
                        'param_name' => 'button_text',
                        'dependency' => array('element' => 'show_button', 'value' => 'yes')
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Button Link', 'industrialist'),
                        'param_name' => 'link',
                        'dependency' => array('element' => 'show_button', 'value' => 'yes')
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Active', 'industrialist'),
                        'param_name' => 'active',
                        'value' => array(
                            esc_html__('No', 'industrialist') => 'no',
                            esc_html__('Yes', 'industrialist') => 'yes'
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'class' => '',
                        'heading' => esc_html__('Content', 'industrialist'),
                        'param_name' => 'content',
                        'value' => '<li>content content content</li><li>content content content</li><li>content content content</li>',
                        'description' => ''
                    )
                )
            ));
        }
    }

    public function render($atts, $content = null) {

        $args = array(
            'title' => 'Basic Plan',
            'price' => '100',
            'currency' => '$',
            'price_period' => 'Monthly',
            'active' => 'no',
            'active_text' => 'Best choice',
            'show_button' => 'yes',
            'link' => '',
            'button_text' => 'button'
        );
        $params = shortcode_atts($args, $atts);
        extract($params);

        $html = '';
        $pricing_table_clasess = 'mkd-price-table';

        if ($active == 'yes') {
            $pricing_table_clasess .= ' mkd-active';
        }

        $params['pricing_table_classes'] = $pricing_table_clasess;
        $params['content'] = preg_replace('#^<\/p>|<p>$#', '', $content);

        $html .= industrialist_mikado_get_shortcode_module_template_part('templates/pricing-table', 'pricing-table', '', $params);
        return $html;

    }

}
