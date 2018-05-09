<?php
namespace Industrialist\Modules\Shortcodes\Icon;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Icon
 * @package Industrialist\Modules\Shortcodes\Icon
 */
class Icon implements ShortcodeInterface
{


    /**
     * Icon constructor.
     */
    public function __construct() {
        $this->base = 'mkd_icon';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     *
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
            'name' => esc_html__('Icon', 'industrialist'),
            'base' => $this->base,
            'category' => esc_html__('by MIKADO', 'industrialist'),
            'icon' => 'icon-wpb-icon extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array_merge(
                \IndustrialistMikadoIconCollections::get_instance()->getVCParamsArray(),
                array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Size', 'industrialist'),
                        'admin_label' => true,
                        'param_name' => 'size',
                        'value' => array(
                            esc_html__('Tiny', 'industrialist') => 'mkd-icon-tiny',
                            esc_html__('Small', 'industrialist') => 'mkd-icon-small',
                            esc_html__('Medium', 'industrialist') => 'mkd-icon-medium',
                            esc_html__('Large', 'industrialist') => 'mkd-icon-large',
                            esc_html__('Very Large', 'industrialist') => 'mkd-icon-huge'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Custom Size (px)', 'industrialist'),
                        'param_name' => 'custom_size',
                        'value' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Type', 'industrialist'),
                        'param_name' => 'type',
                        'admin_label' => true,
                        'value' => array(
                            esc_html__('Normal', 'industrialist') => 'normal',
                            esc_html__('Circle', 'industrialist') => 'circle',
                            esc_html__('Square', 'industrialist') => 'square'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Border radius', 'industrialist'),
                        'param_name' => 'border_radius',
                        'description' => esc_html__('Please insert border radius(Rounded corners) in px. For example: 4 ', 'industrialist'),
                        'dependency' => array('element' => 'type', 'value' => array('square'))
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Shape Size (px)', 'industrialist'),
                        'param_name' => 'shape_size',
                        'admin_label' => true,
                        'value' => '',
                        'description' => '',
                        'dependency' => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Icon Color', 'industrialist'),
                        'param_name' => 'icon_color',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Border Color', 'industrialist'),
                        'param_name' => 'border_color',
                        'admin_label' => true,
                        'dependency' => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Border Width', 'industrialist'),
                        'param_name' => 'border_width',
                        'admin_label' => true,
                        'description' => esc_html__('Enter just number. Omit pixels', 'industrialist'),
                        'dependency' => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Background Color', 'industrialist'),
                        'param_name' => 'background_color',
                        'admin_label' => true,
                        'dependency' => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Hover Icon Color', 'industrialist'),
                        'param_name' => 'hover_icon_color',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Hover Border Color', 'industrialist'),
                        'param_name' => 'hover_border_color',
                        'admin_label' => true,
                        'dependency' => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Hover Background Color', 'industrialist'),
                        'param_name' => 'hover_background_color',
                        'admin_label' => true,
                        'dependency' => array('element' => 'type', 'value' => array('circle', 'square'))
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Margin', 'industrialist'),
                        'param_name' => 'margin',
                        'admin_label' => true,
                        'description' => esc_html__('Margin (top right bottom left)', 'industrialist')
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Icon Animation', 'industrialist'),
                        'param_name' => 'icon_animation',
                        'admin_label' => true,
                        'value' => array(
                            esc_html__('No', 'industrialist') => '',
                            esc_html__('Yes', 'industrialist') => 'yes'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Icon Animation Delay (ms)', 'industrialist'),
                        'param_name' => 'icon_animation_delay',
                        'value' => '',
                        'admin_label' => true,
                        'dependency' => array('element' => 'icon_animation', 'value' => 'yes')
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link', 'industrialist'),
                        'param_name' => 'link',
                        'value' => '',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Use Link as Anchor', 'industrialist'),
                        'value' => array(
                            esc_html__('Use this icon as Anchor?', 'industrialist') => 'yes'
                        ),
                        'param_name' => 'anchor_icon',
                        'admin_label' => true,
                        'description' => esc_html__('Check this box to use icon as anchor link (eg. #contact)', 'industrialist'),
                        'dependency' => Array('element' => 'link', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Target', 'industrialist'),
                        'param_name' => 'target',
                        'admin_label' => true,
                        'value' => array(
                            esc_html__('Self', 'industrialist') => '_self',
                            esc_html__('Blank', 'industrialist') => '_blank'
                        ),
                        'save_always' => true,
                        'dependency' => array('element' => 'link', 'not_empty' => true)
                    )
                )
            )
        ));
    }

    /**
     * Renders shortcode's HTML
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'size' => '',
            'custom_size' => '',
            'type' => 'normal',
            'border_radius' => '',
            'shape_size' => '',
            'icon_color' => '',
            'border_color' => '',
            'border_width' => '',
            'background_color' => '',
            'hover_icon_color' => '',
            'hover_border_color' => '',
            'hover_background_color' => '',
            'margin' => '',
            'icon_animation' => '',
            'icon_animation_delay' => '',
            'link' => '',
            'anchor_icon' => '',
            'target' => ''
        );

        $default_atts = array_merge($default_atts, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($default_atts, $atts);

        $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        //generate icon holder classes
        $icon_holder_classes = array('mkd-icon-shortcode', $params['type']);

        if ($params['icon_animation'] == 'yes') {
            $icon_holder_classes[] = 'mkd-icon-animation';
        }

        if ($params['custom_size'] == '') {
            $icon_holder_classes[] = $params['size'];
        }

        //prepare params for template
        $params['icon'] = $params[$icon_pack_name];
        $params['icon_holder_classes'] = $icon_holder_classes;
        $params['icon_holder_styles'] = $this->generateIconHolderStyles($params);
        $params['icon_holder_data'] = $this->generateIconHolderData($params);
        $params['icon_params'] = $this->generateIconParams($params);
        $params['icon_animation_holder'] = isset($params['icon_animation']) && $params['icon_animation'] == 'yes';
        $params['icon_animation_holder_styles'] = $this->generateIconAnimationHolderStyles($params);
        $params['link_class'] = $this->getLinkClass($params);

        $html = industrialist_mikado_get_shortcode_module_template_part('templates/icon', 'icon', '', $params);

        return $html;
    }

    /**
     * Generates icon parameters array
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconParams($params) {
        $icon_params = array('icon_attributes' => array());

        $icon_params['icon_attributes']['style'] = $this->generateIconStyles($params);
        $icon_params['icon_attributes']['class'] = 'mkd-icon-element';

        return $icon_params;
    }

    /**
     * Generates icon styles array
     *
     * @param $params
     *
     * @return string
     */
    private function generateIconStyles($params) {
        $icon_styles = array();

        if (!empty($params['icon_color'])) {
            $icon_styles[] = 'color: ' . $params['icon_color'];
        }

        if (($params['type'] !== 'normal' && !empty($params['shape_size'])) ||
            ($params['type'] == 'normal')
        ) {
            if (!empty($params['custom_size'])) {
                $icon_styles[] = 'font-size:' . industrialist_mikado_filter_px($params['custom_size']) . 'px';
            }
        }

        if ($params['type'] == 'normal') {
            if ($params['margin'] !== '') {
                $icon_styles[] = 'margin:' . $params['margin'];
            }
        }

        return implode(';', $icon_styles);
    }

    /**
     * Generates icon holder styles for circle and square icon type
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconHolderStyles($params) {
        $icon_holder_styles = array();

        //generate styles attribute only if type isn't normal
        if (isset($params['type']) && $params['type'] !== 'normal') {
            if (isset($params['margin']) && $params['margin'] !== '') {
                $icon_holder_styles[] = 'margin: ' . $params['margin'];
            }

            $shape_size = '';
            if (!empty($params['shape_size'])) {
                $shape_size = $params['shape_size'];
            } elseif (!empty($params['custom_size'])) {
                $shape_size = $params['custom_size'];
            }

            if (!empty($shape_size)) {
                $icon_holder_styles[] = 'width: ' . industrialist_mikado_filter_px($shape_size) . 'px';
                $icon_holder_styles[] = 'height: ' . industrialist_mikado_filter_px($shape_size) . 'px';
                $icon_holder_styles[] = 'line-height: ' . industrialist_mikado_filter_px($shape_size) . 'px';
            }

            if (!empty($params['background_color'])) {
                $icon_holder_styles[] = 'background-color: ' . $params['background_color'];
            }

            if (!empty($params['border_color']) && (isset($params['border_width']) && $params['border_width'] !== '')) {
                $icon_holder_styles[] = 'border-style: solid';
                $icon_holder_styles[] = 'border-color: ' . $params['border_color'];
                $icon_holder_styles[] = 'border-width: ' . industrialist_mikado_filter_px($params['border_width']) . 'px';
            } else if (isset($params['border_width']) && $params['border_width'] !== '') {
                $icon_holder_styles[] = 'border-style: solid';
                $icon_holder_styles[] = 'border-width: ' . industrialist_mikado_filter_px($params['border_width']) . 'px';
            } else if (!empty($params['border_color'])) {
                $icon_holder_styles[] = 'border-color: ' . $params['border_color'];
            }

            if ($params['type'] == 'square') {
                if (isset($params['border_radius']) && $params['border_radius'] !== '') {
                    $icon_holder_styles[] = 'border-radius: ' . industrialist_mikado_filter_px($params['border_radius']) . 'px';
                }
            }
        }

        return $icon_holder_styles;
    }

    /**
     * Generates icon holder data attribute array
     *
     * @param $params
     *
     * @return array
     */
    private function generateIconHolderData($params) {
        $icon_holder_data = array();

        if (isset($params['type']) && $params['type'] !== 'normal') {
            if (!empty($params['hover_border_color'])) {
                $icon_holder_data['data-hover-border-color'] = $params['hover_border_color'];
            }

            if (!empty($params['hover_background_color'])) {
                $icon_holder_data['data-hover-background-color'] = $params['hover_background_color'];
            }
        }

        if ((isset($params['icon_animation']) && $params['icon_animation'] == 'yes')
            && (isset($params['icon_animation_delay']) && $params['icon_animation_delay'] !== '')
        ) {
            $icon_holder_data['data-animation-delay'] = $params['icon_animation_delay'];
        }

        if (!empty($params['hover_icon_color'])) {
            $icon_holder_data['data-hover-color'] = $params['hover_icon_color'];
        }

        if (!empty($params['icon_color'])) {
            $icon_holder_data['data-color'] = $params['icon_color'];
        }

        return $icon_holder_data;
    }

    private function generateIconAnimationHolderStyles($params) {
        $animation_holder_styles = array();

        if ((isset($params['icon_animation']) && $params['icon_animation'] == 'yes')
            && (isset($params['icon_animation_delay']) && $params['icon_animation_delay'] !== '')
        ) {
            $animation_holder_styles[] = 'transition-delay: ' . $params['icon_animation_delay'] . 'ms';
            $animation_holder_styles[] = '-webkit-transition-delay: ' . $params['icon_animation_delay'] . 'ms';
            $animation_holder_styles[] = '-moz-transition-delay: ' . $params['icon_animation_delay'] . 'ms';
            $animation_holder_styles[] = '-ms-transition-delay: ' . $params['icon_animation_delay'] . 'ms';
        }

        return $animation_holder_styles;
    }

    private function getLinkClass($params) {
        $link_class = '';

        if ($params['anchor_icon'] != '' && $params['anchor_icon'] == 'yes') {
            $link_class .= 'mkd-anchor';
        }

        return $link_class;
    }
}