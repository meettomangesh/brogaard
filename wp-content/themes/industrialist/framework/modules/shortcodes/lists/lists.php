<?php
namespace Industrialist\Modules\Shortcodes\Lists;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class Lists implements ShortcodeInterface
{

    private $base;

    function __construct() {
        $this->base = 'mkd_lists';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Lists', 'industrialist'),
                'base' => $this->base,
                'icon' => 'icon-wpb-list extended-custom-icon',
                'category' => esc_html__('by MIKADO', 'industrialist'),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Bullet Type', 'industrialist'),
                        'param_name' => 'bullet_type',
                        'value' => array(
                            esc_html__('Icon', 'industrialist') => 'icon',
                            esc_html__('Number', 'industrialist') => 'number'
                        ),
                        'description' => '',
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Number Type', 'industrialist'),
                        'param_name' => 'number_type',
                        'value' => array(
                            esc_html__('Decimal', 'industrialist') => 'decimal',
                            esc_html__('Roman', 'industrialist') => 'roman',
                        ),
                        'description' => '',
                        'dependency' => array('element' => 'bullet_type', 'value' => array('number')),
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Icon Size (px)', 'industrialist'),
                        'param_name' => 'icon_size',
                        'description' => '',
                        'dependency' => array('element' => 'bullet_type', 'value' => array('icon')),
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Icon Color', 'industrialist'),
                        'param_name' => 'icon_color',
                        'description' => '',
                        'dependency' => array('element' => 'bullet_type', 'value' => array('icon')),
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Text Size (px)', 'industrialist'),
                        'param_name' => 'text_size',
                        'description' => '',
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Text Color', 'industrialist'),
                        'param_name' => 'text_color',
                        'description' => '',
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Text Font Weight', 'industrialist'),
                        'param_name' => 'text_weight',
                        'value' => array(
                            esc_html__('Default', 'industrialist') => '',
                            esc_html__('Light', 'industrialist') => 'light',
                            esc_html__('Normal', 'industrialist') => 'normal',
                            esc_html__('Bold', 'industrialist') => 'bold'
                        ),
                        'description' => '',
                    ),
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Unordered List Items', 'industrialist'),
                        'param_name' => 'unordered_list_items',
                        'value' => '',
                        'params' => array_merge(
                            industrialist_mikado_icon_collections()->getVCParamsArray(array(), '', false),
                            array(
                                array(
                                    'type' => 'textfield',
                                    'heading' => esc_html__('Text', 'industrialist'),
                                    'param_name' => 'text',
                                    'admin_label' => true,
                                ),
                            )
                        ),
                        'dependency' => array('element' => 'bullet_type', 'value' => array('icon')),
                        'group' => esc_html__('List Items', 'industrialist'),
                    ),
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Ordered List Items', 'industrialist'),
                        'param_name' => 'ordered_list_items',
                        'value' => '',
                        'params' => array(
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Text', 'industrialist'),
                                'param_name' => 'text',
                                'admin_label' => true,
                            ),
                        ),
                        'dependency' => array('element' => 'bullet_type', 'value' => array('number')),
                        'group' => esc_html__('List Items', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Animate List', 'industrialist'),
                        'param_name' => 'animate',
                        'value' => array(
                            esc_html__('No', 'industrialist') => 'no',
                            esc_html__('Yes', 'industrialist') => 'yes'
                        ),
                        'description' => '',
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Padding left (px)', 'industrialist'),
                        'param_name' => 'padding_left',
                        'value' => '',
                        'save_always' => true,
                    ),

                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'bullet_type' => '',
            'number_type' => '',
            'unordered_list_items' => '',
            'ordered_list_items' => '',
            'animate' => '',
            'icon_size' => '',
            'icon_color' => '',
            'padding_left' => '',
            'text_size' => '',
            'text_color' => '',
            'text_weight' => '',
        );

        $args = array_merge($args, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);

        extract($params);

        $params['icon_attributes']['style'] = $this->getIconStyles($params);


        $params['unordered_list_items'] = json_decode(urldecode($params['unordered_list_items']), true);
        $params['ordered_list_items'] = json_decode(urldecode($params['ordered_list_items']), true);
        $params['list_classes'] = $this->getListClasses($params);
        $params['list_styles'] = $this->getListStyles($params);
        $params['text_styles'] = $this->getTextStyles($params);

        if ($params['bullet_type'] == 'icon') {
            $html = industrialist_mikado_get_shortcode_module_template_part('templates/unordered', 'lists', '', $params);
        }
        if ($params['bullet_type'] == 'number') {
            $html = industrialist_mikado_get_shortcode_module_template_part('templates/ordered', 'lists', '', $params);
        }

        return $html;
    }

    /**
     * generates list classes
     *
     * @param $params
     *
     * @return string
     */
    private function getListClasses($params) {
        $list_classes = array();

        // general
        $list_classes[] = ($params['animate'] == 'yes') ? 'mkd-animate-list' : '';

        // unordered
        if ($params['bullet_type'] == 'icon') {

        }

        // ordered
        if ($params['bullet_type'] == 'number') {
            $list_classes[] = ($params['number_type'] == 'decimal') ? 'mkd-decimal' : 'mkd-roman';
        }

        $list_classes = implode(' ', $list_classes);

        return $list_classes;
    }

    private function getListStyles($params) {
        $list_styles = '';

        $list_styles .= ($params['padding_left'] != '') ? 'padding-left: ' . $params['padding_left'] . 'px;' : '';

        return $list_styles;
    }

    /**
     * generates icon styles
     *
     * @param $params
     *
     * @return array
     */
    private function getIconStyles($params) {
        $icon_styles = array();

        if (!empty($params['icon_color'])) {
            $icon_styles[] = 'color:' . $params['icon_color'];
        }

        if (!empty($params['icon_size'])) {
            $icon_styles[] = 'font-size:' . industrialist_mikado_filter_px($params['icon_size']) . 'px';
        }

        return implode(';', $icon_styles);
    }

    /**
     * generates text styles
     *
     * @param $params
     *
     * @return array
     */
    private function getTextStyles($params) {
        $text_styles = array();

        if (!empty($params['text_color'])) {
            $text_styles[] = 'color:' . $params['text_color'];
        }

        if (!empty($params['text_size'])) {
            $text_styles[] = 'font-size:' . industrialist_mikado_filter_px($params['text_size']) . 'px';
        }

        if (!empty($params['text_weight'])) {
            $text_styles[] = 'font-weight:' . $params['text_weight'];
        }

        return implode(';', $text_styles);
    }
}