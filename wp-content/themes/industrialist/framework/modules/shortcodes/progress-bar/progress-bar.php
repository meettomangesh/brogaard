<?php
namespace Industrialist\Modules\Shortcodes\ProgressBar;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'mkd_progress_bar';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(array(
            'name' => esc_html__('Progress Bar', 'industrialist'),
            'base' => $this->base,
            'icon' => 'icon-wpb-progress-bar extended-custom-icon',
            'category' => esc_html__('by MIKADO','industrialist'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Title', 'industrialist'),
                    'param_name' => 'title',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
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
                    'admin_label' => true,
                    'heading' => esc_html__('Percentage', 'industrialist'),
                    'param_name' => 'percent',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Percentage Type', 'industrialist'),
                    'param_name' => 'percentage_type',
                    'value' => array(
                        esc_html__('Floating', 'industrialist') => 'floating',
                        esc_html__('Static', 'industrialist') => 'static'
                    ),
                    'dependency' => Array('element' => 'percent', 'not_empty' => true)
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Floating Type', 'industrialist'),
                    'param_name' => 'floating_type',
                    'value' => array(
                        esc_html__('Outside Floating', 'industrialist') => 'floating_outside',
                        esc_html__('Inside Floating', 'industrialist') => 'floating_inside'
                    ),
                    'dependency' => array('element' => 'percentage_type', 'value' => array('floating'))
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Active Color', 'industrialist'),
                    'param_name' => 'active_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options', 'industrialist')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Inactive Color', 'industrialist'),
                    'param_name' => 'inactive_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options', 'industrialist')
                ),
            )
        ));

    }

    public function render($atts, $content = null) {
        $args = array(
            'title' => '',
            'title_tag' => 'h6',
            'percent' => '100',
            'percentage_type' => 'floating',
            'floating_type' => 'floating_outside',
            'active_color' => '',
            'inactive_color' => '',
        );

        $params = shortcode_atts($args, $atts);

        //Extract params for use in method
        extract($params);

        $params['percentage_classes'] = $this->getPercentageClasses($params);
        $params['active_styles'] = $this->getActiveStyles($params);
        $params['inactive_styles'] = $this->getInactiveStyles($params);

        //init variables
        $html = industrialist_mikado_get_shortcode_module_template_part('templates/progress-bar', 'progress-bar', '', $params);

        return $html;

    }

    /**
     * Generates css classes for progress bar
     *
     * @param $params
     *
     * @return array
     */
    private function getPercentageClasses($params) {

        $percentClassesArray = array();

        if (!empty($params['percentage_type']) != '') {

            if ($params['percentage_type'] == 'floating') {

                $percentClassesArray[] = 'mkd-floating';

                if ($params['floating_type'] == 'floating_outside') {

                    $percentClassesArray[] = 'mkd-floating-outside';

                } elseif ($params['floating_type'] == 'floating_inside') {

                    $percentClassesArray[] = 'mkd-floating-inside';
                }

            } elseif ($params['percentage_type'] == 'static') {

                $percentClassesArray[] = 'mkd-static';

            }
        }
        return implode(' ', $percentClassesArray);
    }


    /**
     * generates active styles
     *
     * @param $params
     *
     * @return array
     */
    private function getActiveStyles($params) {
        $active_styles = array();

        if (!empty($params['active_color'])) {
            $active_styles[] = 'background-color:' . $params['active_color'];
        }

        return implode(';', $active_styles);
    }

    /**
     * generates inactive styles
     *
     * @param $params
     *
     * @return array
     */
    private function getInactiveStyles($params) {
        $inactive_styles = array();

        if (!empty($params['inactive_color'])) {
            $inactive_styles[] = 'background-color:' . $params['inactive_color'];
        }

        return implode(';', $inactive_styles);
    }
}