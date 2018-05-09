<?php

namespace Industrialist\Modules\Shortcodes\ServiceTable;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class ServiceTable implements ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'mkd_service_table';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        $service_array = array();

        for ($y = 1; $y <= 8; $y++) {
            $service_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Feature ', 'industrialist') . $y . esc_html__(' Title', 'industrialist'),
                'param_name' => 'feature_' . $y . '_title',
                'value' => '',
                'group' => esc_html__('Features', 'industrialist'),
            );
        }


        for ($x = 1; $x <= 3; $x++) {
            $service_array[] = array(
                'type' => 'dropdown',
                'heading' => esc_html__('Service ', 'industrialist') . $x . esc_html__(' Enabled', 'industrialist'),
                'param_name' => 'service_' . $x . '_enabled',
                'value' => array(
                    '' => '',
                    esc_html__('No', 'industrialist') => 'no',
                    esc_html__('Yes', 'industrialist') => 'yes'
                )
            );

            //
            $service_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Service ', 'industrialist') . $x . esc_html__(' Title', 'industrialist'),
                'param_name' => 'service_' . $x . '_title',
                'value' => '',
                'dependency' => array('element' => 'service_' . $x . '_enabled', 'value' => 'yes')
            );
            $service_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Service ', 'industrialist') . $x . esc_html__(' Price', 'industrialist'),
                'param_name' => 'service_' . $x . '_price',
                'value' => '',
                'dependency' => array('element' => 'service_' . $x . '_enabled', 'value' => 'yes')
            );
            $service_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Service ', 'industrialist') . $x . esc_html__(' Currency', 'industrialist'),
                'param_name' => 'service_' . $x . '_currency',
                'value' => '',
                'description' => esc_html__('Default mark is $', 'industrialist'),
                'dependency' => array('element' => 'service_' . $x . '_enabled', 'value' => 'yes')
            );
            $service_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Service ', 'industrialist') . $x . esc_html__(' Price Period', 'industrialist'),
                'param_name' => 'service_' . $x . '_price_period',
                'value' => '',
                'dependency' => array('element' => 'service_' . $x . '_enabled', 'value' => 'yes')
            );
            $service_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Service ', 'industrialist') . $x . esc_html__(' Button Text', 'industrialist'),
                'param_name' => 'service_' . $x . '_button_text',
                'value' => '',
                'dependency' => array('element' => 'service_' . $x . '_enabled', 'value' => 'yes')
            );
            $service_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Service ', 'industrialist') . $x . esc_html__(' Button Link', 'industrialist'),
                'param_name' => 'service_' . $x . '_button_link',
                'value' => '',
                'dependency' => array('element' => 'service_' . $x . '_enabled', 'value' => 'yes')
            );
            //

            for ($y = 1; $y <= 8; $y++) {
                $service_array[] = array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Feature ', 'industrialist') . $y . esc_html__(' Enabled', 'industrialist'),
                    'param_name' => 'feature_' . $y . '_' . $x . '_enabled',
                    'value' => array(
                        '' => '',
                        esc_html__('No', 'industrialist') => 'no',
                        esc_html__('Yes', 'industrialist') => 'yes'
                    ),
                    'group' => esc_html__('Service ', 'industrialist') . $x,
                    'dependency' => array('element' => 'feature_' . $y . '_title', 'not_empty' => true)
                );
            }

        }


        vc_map(array(
            'name' => esc_html__('Service Table', 'industrialist'),
            'base' => $this->base,
            'icon' => 'icon-wpb-service-table extended-custom-icon',
            'category' => esc_html__('by MIKADO','industrialist'),
            'allowed_container_element' => 'vc_row',
            'params' => array_merge(
                array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Feature Column Title', 'industrialist'),
                        'param_name' => 'feature_column_title',
                        'admin_label' => true
                    )
                ),
                $service_array
            )
        ));
    }

    public function render($atts, $content = null) {

        $args = array(
            'feature_column_title' => '',
        );

        $service_count = 3;
        $features_count = 8;
        $feature_fields = array();
        $service_fields = array();
        $service_feature_fields = array();

        for ($y = 1; $y <= $features_count; $y++) {
            $feature_fields['feature_' . $y . '_title'] = '';
            $feature_fields['feature_' . $y . '_price'] = '';
            $feature_fields['feature_' . $y . '_currency'] = '';
            $feature_fields['feature_' . $y . '_price_period'] = '';
        }

        for ($x = 1; $x <= $service_count; $x++) {
            for ($y = 1; $y <= $features_count; $y++) {
                $service_feature_fields['feature_' . $y . '_' . $x . '_enabled'] = '';
            }

            $service_fields['service_' . $x . '_enabled'] = '';
            $service_fields['service_' . $x . '_title'] = '';
            $service_fields['service_' . $x . '_price'] = '';
            $service_fields['service_' . $x . '_currency'] = '';
            $service_fields['service_' . $x . '_price_period'] = '';
            $service_fields['service_' . $x . '_button_text'] = '';
            $service_fields['service_' . $x . '_button_link'] = '';
        }

        $args = array_merge($args, $service_fields, $feature_fields, $service_feature_fields);
        $params = shortcode_atts($args, $atts);

        extract($params);

        $params['service_count'] = $service_count;
        $params['features_count'] = $features_count;
        $params['table_titles'] = $this->getTableTitles($params);
        $params['table_prices'] = $this->getTablePrices($params);
        $params['table_currencies'] = $this->getTableCurrencies($params);
        $params['table_price_periods'] = $this->getTablePricePeriods($params);
        $params['table_button_texts'] = $this->getTableButtonTexts($params);
        $params['table_button_links'] = $this->getTableButtonLinks($params);
        $params['table_rows'] = $this->getTableRows($params);
        $cols = $this->getColNumber($params);

        $html = '';

        $html .= '<div class="mkd-service-table mkd-cols-' . $cols . '">';
        $html .= '<div class="mkd-service-table-inner">';
        $html .= '<table class="mkd-service-table-holder">';

        $html .= industrialist_mikado_get_shortcode_module_template_part('templates/service-table', 'service-table', '', $params);

        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;

    }

    private function getTableTitles($params) {

        extract($params);
        $titles = array();

        $titles[] = $params['feature_column_title'];

        for ($i = 1; $i <= $service_count; $i++) {
            if ($params['service_' . $i . '_enabled'] == 'yes') {
                $titles[] = ${'service_' . $i . '_title'};
            }
        }
        return $titles;
    }

    //
    private function getTablePrices($params) {

        extract($params);
        $prices = array();

        $prices[] = '';

        for ($i = 1; $i <= $service_count; $i++) {
            if ($params['service_' . $i . '_enabled'] == 'yes') {
                $prices[] = ${'service_' . $i . '_price'};
            }
        }
        return $prices;
    }

    private function getTableCurrencies($params) {

        extract($params);
        $currencies = array();

        $currencies[] = '';

        for ($i = 1; $i <= $service_count; $i++) {
            if ($params['service_' . $i . '_enabled'] == 'yes') {
                $currencies[] = ${'service_' . $i . '_currency'};
            }
        }
        return $currencies;
    }

    private function getTablePricePeriods($params) {

        extract($params);
        $price_periods = array();

        $price_periods[] = '';

        for ($i = 1; $i <= $service_count; $i++) {
            if ($params['service_' . $i . '_enabled'] == 'yes') {
                $price_periods[] = ${'service_' . $i . '_price_period'};
            }
        }
        return $price_periods;
    }

    private function getTableButtonTexts($params) {

        extract($params);
        $button_texts = array();

        $button_texts[] = '';

        for ($i = 1; $i <= $service_count; $i++) {
            if ($params['service_' . $i . '_enabled'] == 'yes') {
                $button_texts[] = ${'service_' . $i . '_button_text'};
            }
        }
        return $button_texts;
    }

    private function getTableButtonLinks($params) {

        extract($params);
        $button_links = array();

        $button_links[] = '';

        for ($i = 1; $i <= $service_count; $i++) {
            if ($params['service_' . $i . '_enabled'] == 'yes') {
                $button_links[] = ${'service_' . $i . '_button_link'};
            }
        }
        return $button_links;
    }

    //

    private function getColNumber($params) {

        extract($params);
        $cols = 0;

        for ($i = 1; $i <= $service_count; $i++) {
            if ($params['service_' . $i . '_enabled'] == 'yes') {
                $cols++;
            }
        }

        return $cols;

    }

    private function getTableRows($params) {

        extract($params);
        $features = array();

        for ($i = 1; $i <= $features_count; $i++) {
            if ($params['feature_' . $i . '_title'] != '') {
                $feature_title = ${'feature_' . $i . '_title'};
                $feature_enabled = array();
                for ($j = 1; $j <= $service_count; $j++) {
                    if ($params['service_' . $j . '_enabled'] == 'yes') {
                        $feature_enabled[] = $params['feature_' . $i . '_' . $j . '_enabled'];
                    }
                }

                $feature['title'] = $feature_title;
                $feature['features_enabled'] = $feature_enabled;

                $features[] = $feature;
            }
        }

        return $features;

    }

}
