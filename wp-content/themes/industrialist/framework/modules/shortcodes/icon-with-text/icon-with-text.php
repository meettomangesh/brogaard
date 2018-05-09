<?php
namespace Industrialist\Modules\Shortcodes\IconWithText;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class IconWithText
 * @package Industrialist\Modules\Shortcodes\IconWithText
 */
class IconWithText implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    /**
     *
     */
    public function __construct() {
        $this->base = 'mkd_icon_with_text';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     *
     */
    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Icon With Text', 'industrialist'),
                'base' => $this->base,
                'icon' => 'icon-wpb-icon-with-text extended-custom-icon',
                'category' => esc_html__('by MIKADO','industrialist'),
                'allowed_container_element' => 'vc_row',
                'params' => array_merge(
                    industrialist_mikado_icon_collections()->getVCParamsArray(),
                    array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('Custom Icon', 'industrialist'),
                            'param_name' => 'custom_icon'
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Icon Position', 'industrialist'),
                            'param_name' => 'icon_position',
                            'value' => array(
                                esc_html__('Top', 'industrialist') => 'top',
                                esc_html__('Left', 'industrialist') => 'left',
                                esc_html__('Left From Title', 'industrialist') => 'left-from-title',
                                esc_html__('Right', 'industrialist') => 'right'
                            ),
                            'description' => esc_html__('Icon Position', 'industrialist'),
                            'save_always' => true,
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Icon Type', 'industrialist'),
                            'param_name' => 'icon_type',
                            'value' => array(
                                esc_html__('Normal', 'industrialist') => 'normal',
                                esc_html__('Circle', 'industrialist') => 'circle',
                                esc_html__('Square', 'industrialist') => 'square'
                            ),
                            'save_always' => true,
                            'admin_label' => true,
                            'group' => esc_html__('Icon Settings', 'industrialist'),
                            'description' => esc_html__('This attribute doesn\'t work when Icon Position is Top. In This case Icon Type is Normal', 'industrialist'),
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Icon Size', 'industrialist'),
                            'param_name' => 'icon_size',
                            'value' => array(
                                esc_html__('Tiny', 'industrialist') => 'mkd-icon-tiny',
                                esc_html__('Small', 'industrialist') => 'mkd-icon-small',
                                esc_html__('Medium', 'industrialist') => 'mkd-icon-medium',
                                esc_html__('Large', 'industrialist') => 'mkd-icon-large',
                                esc_html__('Very Large', 'industrialist') => 'mkd-icon-huge'
                            ),
                            'admin_label' => true,
                            'save_always' => true,
                            'group' => esc_html__('Icon Settings', 'industrialist'),
                            'description' => esc_html__('This attribute doesn\'t work when Icon Position is Top', 'industrialist')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Custom Icon Size (px)', 'industrialist'),
                            'param_name' => 'custom_icon_size',
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Icon Animation', 'industrialist'),
                            'param_name' => 'icon_animation',
                            'value' => array(
                                esc_html__('No', 'industrialist') => '',
                                esc_html__('Yes', 'industrialist') => 'yes'
                            ),
                            'group' => esc_html__('Icon Settings', 'industrialist'),
                            'save_always' => true,
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Icon Animation Delay (ms)', 'industrialist'),
                            'param_name' => 'icon_animation_delay',
                            'group' => esc_html__('Icon Settings', 'industrialist'),
                            'dependency' => array('element' => 'icon_animation', 'value' => array('yes'))
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Icon Margin', 'industrialist'),
                            'param_name' => 'icon_margin',
                            'value' => '',
                            'description' => esc_html__('Margin should be set in a top right bottom left format', 'industrialist'),
                            'admin_label' => true,
                            'group' => esc_html__('Icon Settings', 'industrialist'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Shape Size (px)', 'industrialist'),
                            'param_name' => 'shape_size',
                            'description' => '',
                            'admin_label' => true,
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Icon Color', 'industrialist'),
                            'param_name' => 'icon_color',
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Icon Hover Color', 'industrialist'),
                            'param_name' => 'icon_hover_color',
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Icon Background Color', 'industrialist'),
                            'param_name' => 'icon_background_color',
                            'description' => esc_html__('Icon Background Color (only for square and circle icon type)', 'industrialist'),
                            'dependency' => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Icon Hover Background Color', 'industrialist'),
                            'param_name' => 'icon_hover_background_color',
                            'description' => esc_html__('Icon Hover Background Color (only for square and circle icon type)', 'industrialist'),
                            'dependency' => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Icon Border Color', 'industrialist'),
                            'param_name' => 'icon_border_color',
                            'description' => esc_html__('Only for Square and Circle Icon type', 'industrialist'),
                            'dependency' => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Icon Border Hover Color', 'industrialist'),
                            'param_name' => 'icon_border_hover_color',
                            'description' => esc_html__('Only for Square and Circle Icon type', 'industrialist'),
                            'dependency' => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Border Width', 'industrialist'),
                            'param_name' => 'icon_border_width',
                            'description' => esc_html__('Only for Square and Circle Icon type', 'industrialist'),
                            'dependency' => array('element' => 'icon_type', 'value' => array('square', 'circle')),
                            'group' => esc_html__('Icon Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title', 'industrialist'),
                            'param_name' => 'title',
                            'value' => '',
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'dropdown',
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
                            'dependency' => array('element' => 'title', 'not_empty' => true),
                            'group' => esc_html__('Text Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Title Color', 'industrialist'),
                            'param_name' => 'title_color',
                            'dependency' => array('element' => 'title', 'not_empty' => true),
                            'group' => esc_html__('Text Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'textarea',
                            'heading' => esc_html__('Text', 'industrialist'),
                            'param_name' => 'text'
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Text Color', 'industrialist'),
                            'param_name' => 'text_color',
                            'dependency' => array('element' => 'text', 'not_empty' => true),
                            'group' => esc_html__('Text Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Link', 'industrialist'),
                            'param_name' => 'link',
                            'value' => '',
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Link Text', 'industrialist'),
                            'param_name' => 'link_text',
                            'dependency' => array('element' => 'link', 'not_empty' => true)
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Target', 'industrialist'),
                            'param_name' => 'target',
                            'value' => array(
                                '' => '',
                                esc_html__('Self', 'industrialist') => '_self',
                                esc_html__('Blank', 'industrialist') => '_blank'
                            ),
                            'dependency' => array('element' => 'link', 'not_empty' => true),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Text Left Padding (px)', 'industrialist'),
                            'param_name' => 'text_left_padding',
                            'dependency' => array('element' => 'icon_position', 'value' => array('left')),
                            'group' => esc_html__('Text Settings', 'industrialist')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Text Right Padding (px)', 'industrialist'),
                            'param_name' => 'text_right_padding',
                            'dependency' => array('element' => 'icon_position', 'value' => array('right')),
                            'group' => esc_html__('Text Settings', 'industrialist')
                        )
                    )
                )
            ));
        }
    }

    /**
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'custom_icon' => '',
            'icon_position' => '',
            'icon_type' => '',
            'icon_size' => '',
            'custom_icon_size' => '',
            'icon_animation' => '',
            'icon_animation_delay' => '',
            'icon_margin' => '',
            'shape_size' => '',
            'icon_color' => '',
            'icon_hover_color' => '',
            'icon_background_color' => '',
            'icon_hover_background_color' => '',
            'icon_border_color' => '',
            'icon_border_hover_color' => '',
            'icon_border_width' => '',
            'title' => '',
            'title_tag' => 'h5',
            'title_color' => '',
            'text' => '',
            'text_color' => '',
            'link' => '',
            'link_text' => '',
            'target' => '_self',
            'text_left_padding' => '',
            'text_right_padding' => ''
        );

        $default_atts = array_merge($default_atts, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($default_atts, $atts);

        $params['icon_params'] = $this->getIconParams($params);
        $params['iwt_classes'] = $this->getIwtClasses($params);
        $params['title_styles'] = $this->getTitleStyles($params);
        $params['content_styles'] = $this->getContentStyles($params);
        $params['text_styles'] = $this->getTextStyles($params);

        return industrialist_mikado_get_shortcode_module_template_part('templates/icon-with-text', 'icon-with-text', $params['icon_position'], $params);
    }

    /**
     * Returns parameters for icon shortcode as a string
     *
     * @param $params
     *
     * @return array
     */
    private function getIconParams($params) {
        $icon_params = array();

        if (empty($params['custom_icon'])) {
            $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

            $icon_params['icon_pack'] = $params['icon_pack'];
            $icon_params[$icon_pack_name] = $params[$icon_pack_name];

            if (!empty($params['icon_size'])) {
                $icon_params['size'] = $params['icon_size'];
            }

            if (!empty($params['custom_icon_size'])) {
                $icon_params['custom_size'] = $params['custom_icon_size'];
            }

            if (!empty($params['icon_type'])) {
                $icon_params['type'] = $params['icon_type'];
            }

            $icon_params['shape_size'] = $params['shape_size'];

            if (!empty($params['icon_border_color'])) {
                $icon_params['border_color'] = $params['icon_border_color'];
            }

            if (!empty($params['icon_border_hover_color'])) {
                $icon_params['hover_border_color'] = $params['icon_border_hover_color'];
            }

            if (!empty($params['icon_border_width'])) {
                $icon_params['border_width'] = $params['icon_border_width'];
            }

            if (!empty($params['icon_background_color'])) {
                $icon_params['background_color'] = $params['icon_background_color'];
            }

            if (!empty($params['icon_hover_background_color'])) {
                $icon_params['hover_background_color'] = $params['icon_hover_background_color'];
            }

            $icon_params['icon_color'] = $params['icon_color'];

            if (!empty($params['icon_hover_color'])) {
                $icon_params['hover_icon_color'] = $params['icon_hover_color'];
            }

            $icon_params['icon_animation'] = $params['icon_animation'];
            $icon_params['icon_animation_delay'] = $params['icon_animation_delay'];
            $icon_params['margin'] = $params['icon_margin'];
        }

        return $icon_params;
    }

    /**
     * Returns array of holder classes
     *
     * @param $params
     *
     * @return array
     */
    private function getIwtClasses($params) {
        $iwt_classes = array('mkd-iwt', 'clearfix');

        if (!empty($params['icon_position'])) {
            switch ($params['icon_position']) {
                case 'top':
                    $iwt_classes[] = 'mkd-iwt-icon-top';
                    break;
                case 'left':
                    $iwt_classes[] = 'mkd-iwt-icon-left';
                    break;
                case 'right':
                    $iwt_classes[] = 'mkd-iwt-icon-right';
                    break;
                case 'left-from-title':
                    $iwt_classes[] = 'mkd-iwt-left-from-title';
                    break;
                default:
                    break;
            }
        }

        if (!empty($params['icon_size'])) {
            $iwt_classes[] = 'mkd-iwt-' . str_replace('mkd-', '', $params['icon_size']);
        }

        return $iwt_classes;
    }

    private function getTitleStyles($params) {
        $title_styles = array();

        if (!empty($params['title_color'])) {
            $title_styles[] = 'color: ' . $params['title_color'];
        }

        return $title_styles;
    }

    private function getTextStyles($params) {
        $text_styles = array();

        if (!empty($params['text_color'])) {
            $text_styles[] = 'color: ' . $params['text_color'];
        }

        return $text_styles;
    }

    private function getContentStyles($params) {
        $content_styles = array();

        if ($params['icon_position'] == 'left' && !empty($params['text_left_padding'])) {
            $content_styles[] = 'padding-left: ' . industrialist_mikado_filter_px($params['text_left_padding']) . 'px';
        }

        if ($params['icon_position'] == 'right' && !empty($params['text_right_padding'])) {
            $content_styles[] = 'padding-right: ' . industrialist_mikado_filter_px($params['text_right_padding']) . 'px';
        }

        return $content_styles;
    }
}