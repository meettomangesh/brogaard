<?php
namespace Industrialist\Modules\Shortcodes\ProgressCircle;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressCircle implements ShortcodeInterface
{

    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_progress_circle';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer. Hooked on vc_before_init
     *
     * @see mkd_core_get_carousel_slider_array_vc()
     */
    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Progress Circle', 'industrialist'),
            'base' => $this->getBase(),
            'icon' => 'icon-wpb-progress-circle extended-custom-icon',
            'category' => esc_html__('by MIKADO', 'industrialist'),
            'allowed_container_element' => 'vc_row',
            'params' => array_merge(
                array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Layout', 'industrialist'),
                        'param_name' => 'layout',
                        'value' => array(
                            esc_html__('Percentage', 'industrialist') => 'percentage',
                            esc_html__('Title', 'industrialist') => 'title',
                            esc_html__('Icon', 'industrialist') => 'icon',
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'description' => esc_html__('Choose which element will be shown in the middle of the circle', 'industrialist'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Percentage', 'industrialist'),
                        'param_name' => 'percent',
                        'description' => '',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Circle Size (px)', 'industrialist'),
                        'param_name' => 'size',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'industrialist'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Margin below chart (px)', 'industrialist'),
                        'param_name' => 'margin_below_chart',
                        'description' => '',
                        'group' => esc_html__('Design Options', 'industrialist'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'industrialist'),
                        'param_name' => 'title',
                        'description' => '',
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
                        'dependency' => array('element' => 'title', 'not_empty' => true)
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
                ),
                industrialist_mikado_icon_collections()->getVCParamsArray(array('dependency' => array('element' => 'layout', 'value' => array('icon')))),
                array(
                    array(
                        'type' => 'colorpicker',
                        'heading' => 'Icon Color',
                        'param_name' => 'icon_color',
                        'dependency' => Array('element' => 'icon_pack', 'value' => industrialist_mikado_icon_collections()->getIconCollectionsKeys()),
                        'group' => esc_html__('Design Options', 'industrialist'),
                        'dependency' => array('element' => 'layout', 'value' => array('icon')),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Icon Size (px)', 'industrialist'),
                        'param_name' => 'icon_custom_size',
                        'dependency' => Array('element' => 'icon_pack', 'value' => industrialist_mikado_icon_collections()->getIconCollectionsKeys()),
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'industrialist'),
                        'dependency' => array('element' => 'layout', 'value' => array('icon')),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Text', 'industrialist'),
                        'param_name' => 'text',
                        'description' => '',
                        'admin_label' => true,
                    )
                )
            )

        ));
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {

        $args = array(
            'size' => '',
            'layout' => 'percent',
            'percent' => '',
            'icon_color' => '',
            'icon_custom_size' => '',
            'title' => '',
            'title_tag' => 'h4',
            'text' => '',
            'active_color' => '',
            'inactive_color' => '',
            'margin_below_chart' => ''
        );

        $args = array_merge($args, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);

        $params['progress_circle_data'] = $this->getProgressCircleData($params);
        $params['progress_circle_style'] = $this->getProgressCircleStyle($params);
        $params['icon'] = $this->getProgressCircleIcon($params);

        $html = industrialist_mikado_get_shortcode_module_template_part('templates/progress-circle', 'progress-circle', '', $params);

        return $html;

    }

    /**
     * Return Progress Circle icon style for icon getProgressCircleIcon() method
     *
     * @param $params
     * @return string
     */
    private function getIconStyles($params) {

        $icon_styles = array();

        if ($params['icon_color'] !== '') {
            $icon_styles[] = 'color: ' . $params['icon_color'];
        }

        if ($params['icon_custom_size'] !== '') {
            $icon_styles[] = 'font-size: ' . $params['icon_custom_size'] . 'px';
        }

        return implode(';', $icon_styles);

    }

    /**
     * Return Progress Circle style
     *
     * @param $params
     * @return array
     */
    private function getProgressCircleStyle($params) {

        $progress_circle_style = array();

        if ($params['margin_below_chart'] !== '') {
            $progress_circle_style[] = 'margin-top: ' . $params['margin_below_chart'] . 'px';
        }

        return $progress_circle_style;

    }

    /**
     * Return data attributes for Progress Circle
     *
     * @param $params
     * @return array
     */
    private function getProgressCircleData($params) {

        $progress_circle_data = array();

        if ($params['size'] !== '') {
            $progress_circle_data['data-size'] = $params['size'];
        }
        if ($params['percent'] !== '') {
            $progress_circle_data['data-percent'] = $params['percent'];
        }
        if ($params['active_color'] !== '') {
            $progress_circle_data['data-bar-color'] = $params['active_color'];
        }
        if ($params['inactive_color'] !== '') {
            $progress_circle_data['data-track-color'] = $params['inactive_color'];
        }

        return $progress_circle_data;

    }

    /**
     * Return Progress Circle Icon
     *
     * @param $params
     * @return mixed
     */
    private function getProgressCircleIcon($params) {

        $icon = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $iconStyles = array();
        $iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);

        $progress_circle_icon = industrialist_mikado_icon_collections()->renderIcon($params[$icon], $params['icon_pack'], $iconStyles);

        return $progress_circle_icon;

    }

}