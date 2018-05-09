<?php

namespace Industrialist\Modules\Shortcodes\ContentSliderHolder;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Content Slider Holder
 */
class ContentSliderHolder implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_content_slider_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Content Slider', 'industrialist'),
                'base' => $this->base,
                'as_parent' => array('only' => 'mkd_content_slider'),
                'content_element' => true,
                'category' => esc_html__('by MIKADO', 'industrialist'),
                'icon' => 'icon-wpb-content-slider-holder extended-custom-icon',
                'show_settings_on_create' => true,
                'js_view' => 'VcColumnView',
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Slide duration', 'industrialist'),
                        'admin_label' => true,
                        'param_name' => 'autoplay',
                        'value' => array(
                            esc_html__('3', 'industrialist') => '3',
                            esc_html__('5', 'industrialist') => '5',
                            esc_html__('10', 'industrialist') => '10',
                            esc_html__('Disable', 'industrialist') => 'disable',
                        ),
                        'save_always' => true,
                        'description' => esc_html__('Auto rotate slides each X seconds', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Pause on hover', 'industrialist'),
                        'param_name' => 'pause',
                        'value' => array(
                            esc_html__('Yes', 'industrialist') => 'yes',
                            esc_html__('No', 'industrialist') => 'no'
                        ),
                        'save_always' => true,
                        'dependency' => array(
                            'element' => 'autoplay',
                            'value' => array(
                                '3', '5', '10'
                            )
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Loop', 'industrialist'),
                        'param_name' => 'loop',
                        'value' => array(
                            esc_html__('Yes', 'industrialist') => 'yes',
                            esc_html__('No', 'industrialist') => 'no'
                        ),
                        'save_always' => true,
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Show Navigation Arrows', 'industrialist'),
                        'param_name' => 'navigation',
                        'value' => array(
                            esc_html__('Yes', 'industrialist') => 'yes',
                            esc_html__('No', 'industrialist') => 'no'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Navigation Position', 'industrialist'),
                        'param_name' => 'navigation_position',
                        'value' => array(
                            esc_html__('Inside', 'industrialist') => 'inside',
                            esc_html__('Outside', 'industrialist') => 'outside'
                        ),
                        'std' => 'inside',
                        'save_always' => true,
                        'dependency' => array(
                            'element' => 'navigation',
                            'value' => array(
                                'yes'
                            )
                        ),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Show Pagination', 'industrialist'),
                        'param_name' => 'pagination',
                        'value' => array(
                            esc_html__('Yes', 'industrialist') => 'yes',
                            esc_html__('No', 'industrialist') => 'no'
                        ),
                        'save_always' => true,
                    ),
                    /* array(
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
                    ),*/
                ),
            ));
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'autoplay' => '',
            'pause' => '',
            'loop' => '',
            'navigation' => '',
            'navigation_position' => '',
            'pagination' => '',
            //'skin' => '',
        );

        $args = array_merge($args, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);

        // extract params for use in method
        extract($params);
        $params['content'] = $content;
        $params['content_slider_classes'] = $this->getContentSliderClasses($params);
        $params['content_slider_data'] = $this->getContentSliderData($params);

        $output = '';

        $output .= industrialist_mikado_get_shortcode_module_template_part('templates/content-slider-holder', 'content-slider', '', $params);

        return $output;
    }

    private function getContentSliderClasses($params) {
        $content_slider_classes = array();

        /*if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $content_slider_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $content_slider_classes[] = 'mkd-dark';
                    break;
            }
        }*/

        $content_slider_classes[] = ($params['navigation_position'] == 'inside') ? 'mkd-nav-inside' : '';

        return implode(' ', $content_slider_classes);
    }

    /**
     * Return all configuration data for slider
     *
     * @param $params
     * @return array
     */
    private function getContentSliderData($params) {
        $content_slider_data = array();

        $content_slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
        $content_slider_data['data-pause'] = ($params['pause'] != '') ? $params['pause'] : '';
        $content_slider_data['data-loop'] = ($params['loop'] !== '') ? $params['loop'] : '';
        $content_slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
        $content_slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

        return $content_slider_data;
    }
}
