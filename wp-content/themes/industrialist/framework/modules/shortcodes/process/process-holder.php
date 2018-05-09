<?php

namespace Industrialist\Modules\Shortcodes\ProcessHolder;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProcessHolder implements ShortcodeInterface
{

    private $base;

    function __construct() {
        $this->base = 'mkd_process_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                    'name' => esc_html__('Process', 'industrialist'),
                    'base' => $this->base,
                    'icon' => 'icon-wpb-process-holder extended-custom-icon',
                    'category' => esc_html__('by MIKADO','industrialist'),
                    'as_parent' => array('only' => 'mkd_process'),
                    'js_view' => 'VcColumnView',
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'class' => '',
                            'heading' => esc_html__('Columns', 'industrialist'),
                            'admin_label' => true,
                            'param_name' => 'number_of_columns',
                            'value' => array(
                                esc_html__('Three', 'industrialist') => 'columns-3',
                                esc_html__('Four', 'industrialist') => 'columns-4',
                                esc_html__('Five', 'industrialist') => 'columns-5'
                            ),
                            'description' => '',
                            'save_always' => true
                        ),
                        array(
                            'type' => 'dropdown',
                            'class' => '',
                            'heading' => 'Type',
                            'param_name' => 'type',
                            'value' => array(
                                esc_html__('Classic', 'industrialist') => 'icon-or-number',
                                esc_html__('Icon and number', 'industrialist') => 'icon-and-number',
                            ),
                            'save_always' => true,
                            'description' => ''
                        ),
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {

        $args = array(
            'number_of_columns' => '',
            'type' => '',
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $params['process_holder_classes'] = $this->getProcessHolderClasses($params);

        // add option from holder shortcode into nested shortcode
        $content = str_replace('mkd_process', 'mkd_process type="' . $params['type'] . '"', $content);

        $html = '';

        $html .= '<div  ' . industrialist_mikado_get_class_attribute($params['process_holder_classes']) . '>';
        $html .= '<div class="mkd-process-holder-inner">';
        $html .= do_shortcode($content);
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    private function getProcessHolderClasses($params) {
        $process_holder_class = array();

        $process_holder_class[] = 'mkd-process-holder';
        $process_holder_class[] = $params['number_of_columns'];

        return implode(' ', $process_holder_class);
    }
}