<?php
namespace Industrialist\Modules\Shortcodes\Process;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class Process implements ShortcodeInterface
{

    private $base;

    function __construct() {
        $this->base = 'mkd_process';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                    'name' => esc_html__('Process Item', 'industrialist'),
                    'base' => $this->base,
                    'allowed_container_element' => 'vc_row',
                    'as_child' => array('only' => 'mkd_process_holder'),
                    'category' => esc_html__('by MIKADO','industrialist'),
                    'icon' => 'icon-wpb-process-item extended-custom-icon',
                    'params' => array_merge(
                        industrialist_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                        array(
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Image', 'industrialist'),
                                'param_name' => 'image',
                                'description' => esc_html__('Insert process item image.', 'industrialist')
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title', 'industrialist'),
                                'param_name' => 'title',
                                'admin_label' => true,
                                'description' => ''
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
                                'description' => '',
                                'dependency' => array('element' => 'title', 'not_empty' => true)
                            ),
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Text', 'industrialist'),
                                'param_name' => 'text',
                                'admin_label' => true,
                                'description' => ''
                            ),
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {

        $args = array(
            'image' => '',
            'title' => '',
            'title_tag' => 'h5',
            'text' => '',
            'type' => '',
        );

        $args = array_merge($args, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);

        if ($params['icon_pack'] !== '') {
            $params['icon_parameters'] = $this->getIconParameters($params);
        }

        $html = industrialist_mikado_get_shortcode_module_template_part('templates/process', 'process', '', $params);

        return $html;
    }

    private function getIconParameters($params) {
        $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);

        $params_array['icon_pack'] = $params['icon_pack'];
        $params_array['type'] = 'circle';
        $params_array[$icon_pack_name] = $params[$icon_pack_name];

        return $params_array;
    }
}