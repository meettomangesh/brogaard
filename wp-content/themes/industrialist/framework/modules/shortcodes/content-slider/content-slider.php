<?php

namespace Industrialist\Modules\Shortcodes\ContentSlider;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Content Slider
 */
class ContentSlider implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_content_slider';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Content Slider Item', 'industrialist'),
                'base' => $this->base,
                'icon' => 'icon-wpb-content-slider-item extended-custom-icon',
                'category' => esc_html__('by MIKADO', 'industrialist'),
                'allowed_container_element' => 'vc_row',
                'as_child' => array('only' => 'mkd_content_slider_holder'),
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'admin_label' => true,
                        'heading' => esc_html__('Slide Image', 'industrialist'),
                        'param_name' => 'image',
                        'value' => '',
                        'description' => esc_html__('Select image from media library.', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Image Position', 'industrialist'),
                        'param_name' => 'image_position',
                        'value' => array(
                            esc_html__('Left', 'industrialist') => 'left',
                            esc_html__('Right', 'industrialist') => 'right',
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
                        'value' => '',
                        'description' => '',
                    ),
                )
            ));
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'image' => '',
            'image_position' => '',
        );

        $params = shortcode_atts($args, $atts);

        // extract params for use in method
        extract($params);
        $params['content'] = $content;

        $output = '';

        $output .= industrialist_mikado_get_shortcode_module_template_part('templates/content-slider', 'content-slider', '', $params);

        return $output;
    }
}