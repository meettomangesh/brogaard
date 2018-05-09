<?php
namespace Industrialist\Modules\Shortcodes\Counter;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Counter
 */
class Counter implements ShortcodeInterface
{

    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_counter';

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
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Counter', 'industrialist'),
                'base' => $this->getBase(),
                'category' => esc_html__('by MIKADO','industrialist'),
                'admin_enqueue_css' => array(industrialist_mikado_get_skin_uri() . '/assets/css/mkd-vc-extend.css'),
                'icon' => 'icon-wpb-counter extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array_merge(
                    industrialist_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                    array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Icon Size (px)', 'industrialist'),
                            'param_name' => 'icon_size',
                            'description' => '',
                            'dependency' => array('element' => 'icon_pack', 'not_empty' => true),
                        ),
                        array(
                            'type' => 'dropdown',
                            'admin_label' => true,
                            'heading' => esc_html__('Type', 'industrialist'),
                            'param_name' => 'type',
                            'value' => array(
                                esc_html__('Zero Counter', 'industrialist') => 'zero',
                                esc_html__('Random Counter', 'industrialist') => 'random'
                            ),
                            'save_always' => true,
                            'description' => ''
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Content Align', 'industrialist'),
                            'param_name' => 'content_align',
                            'value' => array(
                                '' => '',
                                esc_html__('Left', 'industrialist') => 'left',
                                esc_html__('Center', 'industrialist') => 'center',
                                esc_html__('Right', 'industrialist') => 'right'
                            ),
                            'description' => '',
                        ),
                        array(
                            'type' => 'textfield',
                            'admin_label' => true,
                            'heading' => esc_html__('Digit', 'industrialist'),
                            'param_name' => 'digit',
                            'description' => esc_html__('Enter the number that you would like displayed on the counter', 'industrialist')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Digit Font Size (px)', 'industrialist'),
                            'param_name' => 'font_size',
                            'description' => '',
                        ),
                        array(
                            'type' => 'dropdown',
                            'admin_label' => true,
                            'heading' => esc_html__('Enable Separator', 'industrialist'),
                            'param_name' => 'enable_separator',
                            'value' => array(
                                esc_html__('No', 'industrialist') => 'no',
                                esc_html__('Yes', 'industrialist') => 'yes'
                            ),
                            'save_always' => true,
                            'description' => '',
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
                        array(
                            'type' => 'dropdown',
                            'admin_label' => true,
                            'heading' => esc_html__('Skin', 'industrialist'),
                            'param_name' => 'skin',
                            'value' => array(
                                esc_html__('Default', 'industrialist') => '',
                                esc_html__('Light', 'industrialist') => 'light',
                                esc_html__('Dark', 'industrialist') => 'dark',
                            ),
                            'save_always' => true,
                            'description' => '',
                            'group' => esc_html__('Design Options', 'industrialist'),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Padding Bottom (px)', 'industrialist'),
                            'param_name' => 'padding_bottom',
                            'description' => '',
                            'group' => esc_html__('Design Options', 'industrialist'),
                        ),
                    )
                )
            ));
        }
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
            'type' => '',
            'content_align' => '',
            'digit' => '',
            'underline_digit' => '',
            'title' => '',
            'title_tag' => 'h4',
            'font_size' => '',
            'text' => '',
            'padding_bottom' => '',
            'icon_size' => '',
            'enable_separator' => '',
            'skin' => '',
        );

        $args = array_merge($args, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);

        // extract params for use in method
        extract($params);

        if ($params['icon_pack'] !== '') {
            $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $icon_classes = '';

            // generate icon holder classes
            $icon_classes .= 'mkd-icon-list-item-icon ';
            $icon_classes .= $params['icon_pack'];

            $params['icon_classes'] = $icon_classes;
            $params['icon'] = $params[$icon_pack_name];
            $params['icon_attributes']['style'] = $this->getIconStyles($params);
        }

        // get correct heading value, if provided heading isn't valid get the default one
        $headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
        $params['title_tag'] = (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

        $params['counter_styles'] = $this->getCounterStyles($params);
        $params['counter_digit_styles'] = $this->getCounterDigitStyles($params);
        $params['separator_params'] = $this->getSeparatorArgs($params);
        $params['counter_classes'] = $this->getCounterClasses($params);

        // get html from template
        $html = industrialist_mikado_get_shortcode_module_template_part('templates/counter', 'counter', '', $params);

        return $html;

    }

    /**
     * return holder inline styles
     *
     * @param $params
     * @return string
     */
    private function getCounterStyles($params) {
        $counter_styles = array();

        if ($params['padding_bottom'] !== '') {
            $counter_styles[] = 'padding-bottom: ' . $params['padding_bottom'] . 'px';
        }

        return implode(';', $counter_styles);
    }

    /**
     * return counter digit inline styles
     *
     * @param $params
     * @return string
     */
    private function getCounterDigitStyles($params) {
        $counter_digit_styles = array();

        if ($params['font_size'] !== '') {
            $counter_digit_styles[] = 'font-size: ' . $params['font_size'] . 'px';
        }

        return implode(';', $counter_digit_styles);
    }

    /**
     * generates icon inline styles
     *
     * @param $params
     * @return string
     */
    private function getIconStyles($params) {

        $icon_styles = array();

        if (!empty($params['icon_size'])) {
            $icon_styles[] = 'font-size:' . industrialist_mikado_filter_px($params['icon_size']) . 'px';
        }

        return implode(';', $icon_styles);
    }

    /*
     * return args for separator shortcode
     *
     * @params $params
     * @return array
     */
    private function getSeparatorArgs($params) {
        $separator_args = array();

        if ($params['content_align'] !== '') {
            $separator_args['position'] = $params['content_align'];
        }

        $separator_args['width'] = '40';
        $separator_args['thickness'] = '4';
        $separator_args['top_margin'] = '9';
        $separator_args['bottom_margin'] = '17';

        return $separator_args;
    }

    /**
     * return classes appended to shortcode holder
     *
     * @param $params
     * @return string
     */
    private function getCounterClasses($params) {

        $counter_classes = array();

        if ($params['content_align'] !== '') {
            switch ($params['content_align']) {
                case 'left':
                    $counter_classes[] = 'mkd-content-aligment-left';
                    break;
                case 'center':
                    $counter_classes[] = 'mkd-content-aligment-center';
                    break;
                case 'right':
                    $counter_classes[] = 'mkd-content-aligment-right';
                    break;
            }
        }

        if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $counter_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $counter_classes[] = 'mkd-dark';
                    break;
            }
        }

        return implode(' ', $counter_classes);
    }
}