<?php
namespace Industrialist\Modules\Shortcodes\Button;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package Industrialist\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'mkd_button';

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
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Button', 'industrialist'),
                'base' => $this->base,
                'category' => esc_html__('by MIKADO','industrialist'),
                'icon' => 'icon-wpb-button extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array_merge(
                    array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Size', 'industrialist'),
                            'param_name' => 'size',
                            'value' => array(
                                esc_html__('Default', 'industrialist') => '',
                                esc_html__('Small', 'industrialist') => 'small',
                                esc_html__('Medium', 'industrialist') => 'medium',
                                esc_html__('Large', 'industrialist') => 'large',
                                esc_html__('Extra Large', 'industrialist') => 'huge',
                                esc_html__('Extra Large Full Width', 'industrialist') => 'huge-full-width'
                            ),
                            'save_always' => true,
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Type', 'industrialist'),
                            'param_name' => 'type',
                            'value' => array(
                                esc_html__('Default', 'industrialist') => '',
                                esc_html__('Outline', 'industrialist') => 'outline',
                                esc_html__('Solid', 'industrialist') => 'solid',
                                esc_html__('Minimal', 'industrialist') => 'minimal',
                            ),
                            'save_always' => true,
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Text', 'industrialist'),
                            'param_name' => 'text',
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Link', 'industrialist'),
                            'param_name' => 'link',
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Link Target', 'industrialist'),
                            'param_name' => 'target',
                            'value' => array(
                                esc_html__('Self', 'industrialist') => '_self',
                                esc_html__('Blank', 'industrialist') => '_blank'
                            ),
                            'save_always' => true,
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Custom CSS class', 'industrialist'),
                            'param_name' => 'custom_class',
                            'admin_label' => true
                        )
                    ),
                    industrialist_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                    array(
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
                            'admin_label' => true,
                            'group' => esc_html__('Design Options', 'industrialist'),
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Color', 'industrialist'),
                            'param_name' => 'color',
                            'group' => esc_html__('Design Options', 'industrialist'),
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Hover Color', 'industrialist'),
                            'param_name' => 'hover_color',
                            'group' => esc_html__('Design Options', 'industrialist'),
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Background Color', 'industrialist'),
                            'param_name' => 'background_color',
                            'admin_label' => true,
                            'dependency' => array('element' => 'type', 'value' => array('solid')),
                            'group' => esc_html__('Design Options', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Hover Background Color', 'industrialist'),
                            'param_name' => 'hover_background_color',
                            'admin_label' => true,
                            'group' => esc_html__('Design Options', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Border Color', 'industrialist'),
                            'param_name' => 'border_color',
                            'admin_label' => true,
                            'group' => esc_html__('Design Options', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Hover Border Color', 'industrialist'),
                            'param_name' => 'hover_border_color',
                            'admin_label' => true,
                            'group' => esc_html__('Design Options', 'industrialist')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Font Size (px)', 'industrialist'),
                            'param_name' => 'font_size',
                            'admin_label' => true,
                            'group' => esc_html__('Design Options', 'industrialist')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Font Weight', 'industrialist'),
                            'param_name' => 'font_weight',
                            'value' => array(
                                esc_html__('Default', 'industrialist') => '',
                                esc_html__('Thin', 'industrialist') => '100',
                                esc_html__('Extra Light', 'industrialist') => '200',
                                esc_html__('Light', 'industrialist') => '300',
                                esc_html__('Normal', 'industrialist') => '400',
                                esc_html__('Medium', 'industrialist') => '500',
                                esc_html__('Semi Bold', 'industrialist') => '600',
                                esc_html__('Bold', 'industrialist') => '700',
                                esc_html__('Extra Bold', 'industrialist') => '800',
                                esc_html__('Ultra Bold', 'industrialist') => '900'
                            ),
                            'admin_label' => true,
                            'group' => esc_html__('Design Options', 'industrialist'),
                            'save_always' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Margin', 'industrialist'),
                            'param_name' => 'margin',
                            'description' => esc_html__('Insert margin in format: 0px 0px 1px 0px', 'industrialist'),
                            'admin_label' => true,
                            'group' => esc_html__('Design Options', 'industrialist')
                        )
                    )
                ) //close array_merge
            ));
        }
    }

    /**
     * Renders HTML for button shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size' => '',
            'type' => '',
            'skin' => '',
            'text' => '',
            'link' => '',
            'target' => '',
            'color' => '',
            'hover_color' => '',
            'background_color' => '',
            'hover_background_color' => '',
            'border_color' => '',
            'hover_border_color' => '',
            'font_size' => '',
            'font_weight' => '',
            'margin' => '',
            'custom_class' => '',
            'html_type' => 'anchor',
            'input_name' => '',
            'hover_animation' => '',
            'custom_atts' => array()
        );

        $default_atts = array_merge($default_atts, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($default_atts, $atts);

        if ($params['html_type'] !== 'input') {
            $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $icon_pack_name ? $params[$icon_pack_name] : '';
        }

        $params['size'] = !empty($params['size']) ? $params['size'] : 'medium';
        $params['type'] = !empty($params['type']) ? $params['type'] : 'outline';


        $params['link'] = !empty($params['link']) ? $params['link'] : '#';
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        //prepare params for template
        $params['button_classes'] = $this->getButtonClasses($params);
        $params['button_custom_atts'] = !empty($params['custom_atts']) ? $params['custom_atts'] : array();
        $params['button_styles'] = $this->getButtonStyles($params);
        $params['button_data'] = $this->getButtonDataAttr($params);

        return industrialist_mikado_get_shortcode_module_template_part('templates/' . $params['html_type'], 'button', $params['hover_animation'], $params);
    }

    /**
     * Returns array of button styles
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonStyles($params) {
        $button_styles = array();

        if (!empty($params['color'])) {
            $button_styles[] = 'color: ' . $params['color'];
        }

        if (!empty($params['background_color']) && $params['type'] !== 'outline') {
            $button_styles[] = 'background-color: ' . $params['background_color'];
        }

        if (!empty($params['border_color'])) {
            $button_styles[] = 'border-color: ' . $params['border_color'];
        }

        if (!empty($params['font_size'])) {
            $button_styles[] = 'font-size: ' . industrialist_mikado_filter_px($params['font_size']) . 'px';
        }

        if (!empty($params['font_weight'])) {
            $button_styles[] = 'font-weight: ' . $params['font_weight'];
        }

        if (!empty($params['margin'])) {
            $button_styles[] = 'margin: ' . $params['margin'];
        }

        return $button_styles;
    }

    /**
     *
     * Returns array of button data attr
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonDataAttr($params) {
        $button_data = array();

        if (!empty($params['hover_background_color'])) {
            $button_data['data-hover-bg-color'] = $params['hover_background_color'];
        }

        if (!empty($params['hover_color'])) {
            $button_data['data-hover-color'] = $params['hover_color'];
        }

        if (!empty($params['hover_color'])) {
            $button_data['data-hover-color'] = $params['hover_color'];
        }

        if (!empty($params['hover_border_color'])) {
            $button_data['data-hover-border-color'] = $params['hover_border_color'];
        }

        return $button_data;
    }

    /**
     * Returns array of HTML classes for button
     *
     * @param $params
     *
     * @return array
     */
    private function getButtonClasses($params) {
        $button_classes = array(
            'mkd-btn',
            'mkd-btn-' . $params['size'],
            'mkd-btn-' . $params['type'],
        );

        if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $button_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $button_classes[] = 'mkd-dark';
                    break;
            }
        }

        if (!empty($params['hover_background_color'])) {
            $button_classes[] = 'mkd-btn-custom-hover-bg';
        }

        if (!empty($params['hover_border_color'])) {
            $button_classes[] = 'mkd-btn-custom-border-hover';
        }

        if (!empty($params['hover_color'])) {
            $button_classes[] = 'mkd-btn-custom-hover-color';
        }

        if (!empty($params['icon'])) {
            $button_classes[] = 'mkd-btn-icon';
        }

        if (!empty($params['custom_class'])) {
            $button_classes[] = $params['custom_class'];
        }

        if (!empty($params['hover_animation'])) {
            $button_classes[] = 'mkd-btn-' . $params['hover_animation'];
        }

        return $button_classes;
    }
}