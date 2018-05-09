<?php

namespace Industrialist\Modules\Shortcodes\InfoBox;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class InfoBox implements ShortcodeInterface
{
    private $base;

    public function __construct() {
        $this->base = 'mkd_info_box';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Info Box', 'industrialist'),
            'base' => $this->base,
            'category' => esc_html__('by MIKADO','industrialist'),
            'icon' => 'icon-wpb-info-box extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array_merge(
                industrialist_mikado_icon_collections()->getVCParamsArray('', '', true),
                array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image', 'industrialist'),
                        'param_name' => 'image',
                        'value' => '',
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency' => array('element' => 'icon_pack', 'not_empty' => true),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Hide Icon on Hover', 'industrialist'),
                        'param_name' => 'hide_icon',
                        'value' => array(
                            esc_html__('No', 'industrialist') => '',
                            esc_html__('Yes', 'industrialist') => 'yes',
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency' => array('element' => 'icon_pack', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'industrialist'),
                        'param_name' => 'title',
                        'value' => '',
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Text', 'industrialist'),
                        'param_name' => 'text',
                        'value' => '',
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Button Link', 'industrialist'),
                        'param_name' => 'button_link',
                        'value' => '',
                        'save_always' => true,
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Button Text', 'industrialist'),
                        'param_name' => 'button_text',
                        'value' => '',
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency' => array('element' => 'button_link', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Button Target', 'industrialist'),
                        'param_name' => 'button_target',
                        'value' => array(
                            esc_html__('Same Window', 'industrialist') => '',
                            esc_html__('New Window', 'industrialist') => '_blank'
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency' => array('element' => 'button_link', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Color', 'industrialist'),
                        'param_name' => 'background_color',
                        'value' => '',
                        'save_always' => true,
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'industrialist'),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Background Image', 'industrialist'),
                        'param_name' => 'background_image',
                        'value' => '',
                        'save_always' => true,
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Button Type', 'industrialist'),
                        'param_name' => 'button_type',
                        'value' => array_flip(industrialist_mikado_get_btn_types(true)),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency' => array('element' => 'button_link', 'not_empty' => true),
                        'group' => esc_html__('Design Options', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Hover Button Type', 'industrialist'),
                        'param_name' => 'hover_button_type',
                        'value' => array_flip(industrialist_mikado_get_btn_types(true)),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency' => array('element' => 'button_link', 'not_empty' => true),
                        'group' => esc_html__('Design Options', 'industrialist'),
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Button Hover Background Color', 'industrialist'),
                        'param_name' => 'button_hover_bg_color',
                        'value' => '',
                        'save_always' => true,
                        'group' => esc_html__('Design Options', 'industrialist'),
                        'dependency' => array('element' => 'button_link', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Button Hover Text Color', 'industrialist'),
                        'param_name' => 'button_hover_color',
                        'value' => '',
                        'save_always' => true,
                        'group' => esc_html__('Design Options', 'industrialist'),
                        'dependency' => array('element' => 'button_link', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Button Hover Border Color', 'industrialist'),
                        'param_name' => 'button_hover_border_color',
                        'value' => '',
                        'save_always' => true,
                        'group' => esc_html__('Design Options', 'industrialist'),
                        'dependency' => array('element' => 'button_link', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Icon Color', 'industrialist'),
                        'param_name' => 'icon_color',
                        'value' => '',
                        'save_always' => true,
                        'dependency' => array('element' => 'icon_pack', 'not_empty' => true),
                        'group' => esc_html__('Design Options', 'industrialist'),
                    )
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $defaults = array(
            'image' => '',
            'hide_icon' => '',
            'background_color' => '',
            'background_image' => '',
            'title' => '',
            'button_link' => '',
            'button_text' => '',
            'button_target' => '',
            'button_type' => '',
            'hover_button_type' => '',
            'button_hover_bg_color' => '',
            'button_hover_color' => '',
            'button_hover_border_color' => '',
            'text' => '',
            'icon_color' => ''
        );

        $defaults = array_merge($defaults, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($defaults, $atts);

        $params['info_box_styles'] = $this->getInfoBoxStyles($params);
        $params['button_params'] = $this->getButtonParams($params);
        $params['info_box_classes'] = $this->getInfoBoxClasses($params);

        $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $params['icon'] = $icon_pack_name ? $params[$icon_pack_name] : '';
        $params['show_icon'] = $params['icon'] !== '';
        $params['icon_styles'] = $this->getIconStyles($params);

        return industrialist_mikado_get_shortcode_module_template_part('templates/info-box', 'info-box', '', $params);
    }

    private function getInfoBoxStyles($params) {
        $styles = array();

        if ($params['background_color'] !== '') {
            $styles[] = 'background-color: ' . $params['background_color'];
        } elseif ($params['background_image']) {
            $styles[] = 'background-image: url(' . wp_get_attachment_url($params['background_image']) . ')';
        }

        return $styles;
    }

    private function getButtonParams($params) {
        $button_params = array();

        if (!empty($params['button_link'])) {
            $button_params['link'] = $params['button_link'];
        }

        if (!empty($params['button_text'])) {
            $button_params['text'] = $params['button_text'];
        }

        if (!empty($params['button_target'])) {
            $button_params['target'] = $params['button_target'];
        }

        if (!empty($params['button_type'])) {
            $button_params['type'] = $params['button_type'];
        } else {
            $button_params['type'] = 'solid';
        }

        if (!empty($params['hover_button_type'])) {
            $button_params['hover_type'] = $params['hover_button_type'];
        }

        if (!empty($params['button_hover_bg_color'])) {
            $button_params['hover_background_color'] = $params['button_hover_bg_color'];
        }

        if (!empty($params['button_hover_color'])) {
            $button_params['hover_color'] = $params['button_hover_color'];
        }

        if (!empty($params['button_hover_border_color'])) {
            $button_params['hover_border_color'] = $params['button_hover_border_color'];
        }

        $button_params['size'] = 'medium';

        return $button_params;
    }

    private function getInfoBoxClasses($params) {
        $info_box_classes = array('mkd-info-box-holder');

        if (!empty($params['background_image']) && empty($params['background_color'])) {
            $info_box_classes[] = 'mkd-info-box-with-image';
        }

        if ($params['hide_icon'] === 'yes') {
            $info_box_classes[] = 'mkd-hide-icon';
        }

        return $info_box_classes;
    }

    private function getIconStyles($params) {
        $styles = array();

        if (!empty($params['show_icon']) && $params['show_icon']) {
            if (!empty($params['icon_color'])) {
                $styles[] = 'color: ' . $params['icon_color'];
            }
        }

        return implode(', ', $styles);
    }

}