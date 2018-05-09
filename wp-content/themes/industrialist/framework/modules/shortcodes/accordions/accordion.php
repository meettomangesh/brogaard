<?php
namespace Industrialist\Modules\Shortcodes\Accordion;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Accordions
 */
class Accordion implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_accordion';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                "name" => esc_html__('Accordion Item', 'industrialist'),
                "base" => $this->base,
                "as_parent" => array('except' => 'vc_row'),
                "as_child" => array('only' => 'mkd_accordion_holder'),
                'is_container' => true,
                "category" => 'by MIKADO',
                "icon" => "icon-wpb-accordion-item extended-custom-icon",
                "show_settings_on_create" => true,
                "js_view" => 'VcColumnView',
                "params" => array_merge(
                    industrialist_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                    array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Icon Size (px)', 'industrialist'),
                            'param_name' => 'icon_size',
                            'description' => '',
                            'dependency' => array('element' => 'icon_pack', 'not_empty' => true),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'industrialist'),
                            'param_name' => 'title',
                            'admin_label' => true,
                            'value' => esc_html__('Section', 'industrialist'),
                            'description' => esc_html__('Enter accordion section title.', 'industrialist')
                        ),
                        array(
                            'type' => 'dropdown',
                            'class' => '',
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
                            'type' => 'el_id',
                            'heading' => esc_html__('Section ID', 'industrialist'),
                            'param_name' => 'el_id',
                            'description' => sprintf(esc_html__('Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'industrialist'), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__('link', 'industrialist') . '</a>'),
                        ),
                    )
                )
            ));
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'title' => esc_html__('Accordion Title','industrialist'),
            'title_tag' => 'h6',
            'el_id' => '',
            'icon_size' => '',
        );

        $args = array_merge($args, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);

        // extract params for use in method
        extract($params);
        $params['content'] = $content;

        if ($params['icon_pack'] !== '') {
            $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $icon_classes = '';

            // generate icon holder classes
            $icon_classes .= 'mkd-icon-list-item-icon ';
            $icon_classes .= $params['icon_pack'];

            $params['icon_classes'] = $icon_classes;
            $params['icon'] = $params[$icon_pack_name];
            $params['icon_attributes']['style'] = $this->getIconStyle($params);
        }

        $output = '';

        $output .= industrialist_mikado_get_shortcode_module_template_part('templates/accordion', 'accordions', '', $params);

        return $output;
    }

    /**
     * generates icon styles
     *
     * @param $params
     *
     * @return array
     */
    private function getIconStyle($params) {

        $icon_styles = array();

        if (!empty($params['icon_size'])) {
            $icon_styles[] = 'font-size:' . industrialist_mikado_filter_px($params['icon_size']) . 'px';
        }

        return implode(';', $icon_styles);
    }
}