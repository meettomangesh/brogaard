<?php

namespace Industrialist\Modules\Shortcodes\TabHolder;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tabs
 */
class TabHolder implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_tab_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Tab', 'industrialist'),
                'base' => $this->getBase(),
                'as_parent' => array('only' => 'mkd_tab'),
                'content_element' => true,
                'show_settings_on_create' => true,
                'category' => esc_html__('by MIKADO','industrialist'),
                'icon' => 'icon-wpb-tab-holder extended-custom-icon',
                'js_view' => 'VcColumnView',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Extra class name', 'industrialist'),
                        'param_name' => 'class_name',
                        'value' => '',
                        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'industrialist')
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin-label' => true,
                        'heading' => esc_html__('Style', 'industrialist'),
                        'param_name' => 'style',
                        'value' => array(
                            esc_html__('Horizontal', 'industrialist') => 'horizontal_tab',
                            esc_html__('Vertical', 'industrialist') => 'vertical_tab'
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),

                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Tab Label Width', 'industrialist'),
                        'param_name' => 'tab_label_width',
                        'value' => array(
                            esc_html__('Equal', 'industrialist') => 'equal',
                            esc_html__('Variable', 'industrialist') => 'variable'
                        ),
                        'save_always' => true,
                        'description' => '',
                        'dependency' => array('element' => 'style', 'value' => array('horizontal_tab'))
                    ),

                    array(
                        'type' => 'dropdown',
                        'class' => '',
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
                    ),
                )
            ));
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'class_name' => '',
            'style' => 'horizontal_tab',
            'title_layout' => 'without_icon',
            'title_tag' => 'h6',
            'tab_label_width' => 'equal',
        );

        $args = array_merge($args, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);

        extract($params);

        // Extract tab titles
        preg_match_all('/tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
        $tab_titles = array();

        /**
         * get tab titles array
         *
         */
        if (isset($matches[0])) {
            $tab_titles = $matches[0];
        }

        $tab_title_array = array();

        foreach ($tab_titles as $tab) {
            preg_match('/tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE);
            $tab_title_array[] = $tab_matches[1][0];
        }

        $params['tabs_titles'] = $tab_title_array;
        $params['tab_class'] = $this->getTabClass($params);
        $params['tab_class'] .= ' mkd-column-' . count($tab_title_array);
        $params['content'] = $content;

        $output = '';

        $output .= industrialist_mikado_get_shortcode_module_template_part('templates/tab-holder', 'tabs', '', $params);

        return $output;
    }

    /**
     * Generates tabs class
     *
     * @param $params
     *
     * @return string
     */
    private function getTabClass($params) {
        $tab_style = $params['style'];
        $tab_class = array();

        switch ($tab_style) {
            case 'vertical_tab':
                $tab_class[] = 'mkd-vertical-tab';
                break;
            default : {
                $tab_class[] = 'mkd-horizontal-tab';
                $tab_class[] = ($params['tab_label_width'] == 'equal') ? 'equal' : 'variable';
                break;
            }
        }

        if ($params['class_name'] !== '') {
            $tab_class[] = $params['class_name'];
        }

        $tab_class = implode(' ', $tab_class);

        return $tab_class;
    }
}