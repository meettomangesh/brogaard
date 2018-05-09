<?php

namespace Industrialist\Modules\Shortcodes\PricingSlider;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingSlider implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'mkd_pricing_slider';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {


        vc_map(array(
            'name' => esc_html__('Pricing Slider', 'industrialist'),
            'base' => $this->base,
            'category' => esc_html__('by MIKADO','industrialist'),
            'icon' => 'icon-wpb-pricing-slider extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Title', 'industrialist'),
                    'param_name' => 'title',
                    'value' => '',
                    'description' => '',
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Title Tag', 'industrialist'),
                    'param_name' => 'title_tag',
                    'value' => array(
                        '' => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => '',
                    'dependency' => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'industrialist'),
                    'param_name' => 'description',
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Unit name', 'industrialist'),
                    'param_name' => 'unit_name',
                    'description' => esc_html__('Enter singular name of unit you will charge for (ex. unit)', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Units range', 'industrialist'),
                    'param_name' => 'units_range',
                    'description' => esc_html__('Enter maximum number of units you will charge (ex. 1000)', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Units breakpoints', 'industrialist'),
                    'param_name' => 'units_breakpoints',
                    'description' => esc_html__('Enter breakpoint value where price per unit will be reduced (ex. 100)', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Per Unit', 'industrialist'),
                    'param_name' => 'price_per_unit',
                    'description' => esc_html__('Enter value of price that will be charged per unit (ex. 5)', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Reduce Per Breakpoint', 'industrialist'),
                    'param_name' => 'price_reduce_per_breakpoint',
                    'description' => esc_html__('Enter value for which price will be reduced on each breakpoint (ex. 0.2)', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Period Button Label', 'industrialist'),
                    'param_name' => 'price_period',
                    'description' => esc_html__('Enter pricing period you will be charging by (ex. Monthly Pricing)', 'industrialist')
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Enable Extra Period', 'industrialist'),
                    'param_name' => 'extra_period',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no'
                    ),
                    'description' => esc_html__('Enable this option if you need extra pricing period (ex. Yearly)', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Per Unit', 'industrialist'),
                    'param_name' => 'price_per_unit_extra',
                    'description' => esc_html__('Enter value of price that will be charged per unit (ex. 5)', 'industrialist'),
                    'group' => esc_html__('Extra Period', 'industrialist'),
                    'dependency' => array('element' => 'extra_period', 'value' => 'yes')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Reduce Per Breakpoint', 'industrialist'),
                    'param_name' => 'price_reduce_per_breakpoint_extra',
                    'description' => esc_html__('Enter value for which price will be reduced on each breakpoint (ex. 0.2)', 'industrialist'),
                    'group' => esc_html__('Extra Period', 'industrialist'),
                    'dependency' => array('element' => 'extra_period', 'value' => 'yes')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Period Button Label', 'industrialist'),
                    'param_name' => 'price_period_extra',
                    'description' => esc_html__('Enter pricing period you will be charging by (ex. Yearly Pricing)', 'industrialist'),
                    'group' => esc_html__('Extra Period', 'industrialist'),
                    'dependency' => array('element' => 'extra_period', 'value' => 'yes')
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Initially Active', 'industrialist'),
                    'param_name' => 'extra_initially_active',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('No', 'industrialist') => 'no',
                        esc_html__('Yes', 'industrialist') => 'yes'
                    ),
                    'description' => esc_html__('Set extra period to be initially active state', 'industrialist'),
                    'group' => esc_html__('Extra Period', 'industrialist'),
                    'dependency' => array('element' => 'extra_period', 'value' => 'yes')
                ),
                /* Pricing info parameters */
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Title', 'industrialist'),
                    'param_name' => 'info_title',
                    'value' => esc_html__('Pay what you need', 'industrialist'),
                    'description' => '',
                    'group' => esc_html__('Pricing Info', 'industrialist')
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Title Tag', 'industrialist'),
                    'param_name' => 'info_title_tag',
                    'value' => array(
                        '' => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => '',
                    'group' => esc_html__('Pricing Info', 'industrialist'),
                    'dependency' => array('element' => 'info_title', 'not_empty' => true)
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'industrialist'),
                    'param_name' => 'info_description',
                    'group' => esc_html__('Pricing Info', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Currency', 'industrialist'),
                    'param_name' => 'currency',
                    'description' => esc_html__('Default mark is $', 'industrialist'),
                    'group' => esc_html__('Pricing Info', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Price Period', 'industrialist'),
                    'param_name' => 'price_period_info',
                    'description' => esc_html__('Default label is monthly', 'industrialist'),
                    'group' => esc_html__('Pricing Info', 'industrialist')
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
                    'description' => '',
                    'group' => esc_html__('Pricing Info', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Button Text', 'industrialist'),
                    'param_name' => 'button_text',
                    'dependency' => array('element' => 'show_button', 'value' => 'yes'),
                    'group' => esc_html__('Pricing Info', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Button Link', 'industrialist'),
                    'param_name' => 'link',
                    'dependency' => array('element' => 'show_button', 'value' => 'yes'),
                    'group' => esc_html__('Pricing Info', 'industrialist')
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Button Text Color', 'industrialist'),
                    'param_name' => 'button_text_color',
                    'group' => esc_html__('Design Options', 'industrialist')
                ),
                array(
                    'type' => 'colorpicker',
                    'admin_label' => true,
                    'heading' => esc_html__('Unit Text Color', 'industrialist'),
                    'param_name' => 'unit_text_color',
                    'group' => esc_html__('Design Options', 'industrialist')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Skin', 'industrialist'),
                    'param_name' => 'skin',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('Light', 'industrialist') => 'light',
                        esc_html__('Dark', 'industrialist') => 'dark'
                    ),
                    'save_always' => true,
                    'group' => esc_html__('Design Options', 'industrialist')
                ),
            )
        ));
    }

    /**
     * Renders HTML for product list shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'title' => '',
            'title_tag' => 'h2',
            'description' => '',
            'unit_name' => 'unit',
            'units_range' => '0',
            'units_breakpoints' => '0',
            'price_per_unit' => '0',
            'price_reduce_per_breakpoint' => '0',
            'price_period' => 'Monthly',
            'extra_period' => 'no',
            'price_per_unit_extra' => '0',
            'price_reduce_per_breakpoint_extra' => '0',
            'price_period_extra' => 'Yearly',
            'extra_initially_active' => 'no',
            'info_title' => 'Pay what you need',
            'info_title_tag' => 'h4',
            'info_description' => '',
            'currency' => '$',
            'price_period_info' => 'Monthly',
            'show_button' => 'no',
            'link' => '',
            'button_text' => 'button',
            'button_text_color' => '',
            'unit_text_color' => '',
            'skin' => '',
        );

        $params = shortcode_atts($default_atts, $atts);
        // extract params for use in method
        extract($params);

        $params['button_value'] = $this->getButtonData($params);
        $params['button_value_extra'] = $this->getButtonDataExtra($params);
        $params['pricing_info_params'] = $this->getPricingInfoParams($params);
        $params['slider_data'] = $this->getSliderData($params);
        $params['unit_text_style'] = $this->getStyleForUnitText($params);
        $params['separator_params'] = $this->getSeparatorStyles($params);
        $params['pricing_slider_classes'] = $this->getPricingSliderClasses($params);

        $html = industrialist_mikado_get_shortcode_module_template_part('templates/pricing-slider', 'pricing-slider', '', $params);

        return $html;
    }

    /**
     * Return data attributes for button
     *
     * @param $params
     * @return array
     */
    private function getButtonData($params) {

        $buttonData = array();

        if ($params['price_per_unit'] !== '') {
            $buttonData['data-price-per-unit'] = $params['price_per_unit'];
        }

        if ($params['price_reduce_per_breakpoint'] !== '') {
            $buttonData['data-price-reduce-per-breakpoint'] = $params['price_reduce_per_breakpoint'];
        }


        return $buttonData;

    }

    /**
     * Return data attributes for button
     *
     * @param $params
     * @return array
     */
    private function getButtonDataExtra($params) {

        $buttonData = array();

        if ($params['price_per_unit_extra'] !== '') {
            $buttonData['data-price-per-unit'] = $params['price_per_unit_extra'];
        }

        if ($params['units_breakpoints'] !== '') {
            $buttonData['data-price-reduce-per-breakpoint'] = $params['price_reduce_per_breakpoint_extra'];
        }


        return $buttonData;

    }

    /**
     * Return data attributes for slider
     *
     * @param $params
     * @return array
     */
    private function getSliderData($params) {

        $sliderData = array();

        if ($params['units_range'] !== '') {
            $sliderData['data-units-range'] = $params['units_range'];
        }

        if ($params['units_breakpoints'] !== '') {
            $sliderData['data-units-breakpoints'] = $params['units_breakpoints'];
        }

        if ($params['unit_name'] !== '') {
            $sliderData['data-unit-name'] = $params['unit_name'];
        }


        return $sliderData;

    }

    /**
     * Return data attributes for button
     *
     * @param $params
     * @return string
     */
    private function getPricingInfoParams($params) {

        $pricing_info_params = array();

        $pricing_info_params['show_button'] = $params['show_button'];
        $pricing_info_params['currency'] = $params['currency'];
        $pricing_info_params['price'] = 0;
        $pricing_info_params['price_period'] = $params['price_period_info'];
        $pricing_info_params['button_text'] = $params['button_text'];
        $pricing_info_params['link'] = $params['link'];

        return $pricing_info_params;
    }

    /**
     * Return string with styles for unit text
     *
     * @param $params
     * @return string
     */
    private function getStyleForUnitText($params) {
        $unitStyle = array();

        if ($params['unit_text_color'] !== '') {
            $unitStyle[] = "color: " . $params['unit_text_color'];
        }

        return implode(';', $unitStyle);
    }

    /*
     * Return args for separator shortcode
     *
     * @params $params
     * @return array
     */

    private function getSeparatorStyles($params) {
        $separator_styles = array();

        $separator_styles['position'] = 'left';
        $separator_styles['width'] = '40';
        $separator_styles['thickness'] = '2';
        $separator_styles['top_margin'] = '0';
        $separator_styles['bottom_margin'] = '14';

        return $separator_styles;
    }

    /**
     * Generates pricing slider classes
     *
     * @param $params
     *
     * @return string
     */
    private function getPricingSliderClasses($params) {

        $pricing_slider_classes = array();

        if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $pricing_slider_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $pricing_slider_classes[] = 'mkd-dark';
                    break;
            }
        }

        $pricing_slider_classes = implode(' ', $pricing_slider_classes);

        return $pricing_slider_classes;
    }
}