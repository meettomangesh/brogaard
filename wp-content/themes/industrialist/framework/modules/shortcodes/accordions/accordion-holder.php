<?php
namespace Industrialist\Modules\Shortcodes\AccordionHolder;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * class Accordions
 */
class AccordionHolder implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_accordion_holder';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Accordion', 'industrialist'),
                'base' => $this->base,
                'as_parent' => array('only' => 'mkd_accordion'),
                'content_element' => true,
                'category' => esc_html__('by MIKADO','industrialist'),
                'icon' => 'icon-wpb-accordion-holder extended-custom-icon',
                'show_settings_on_create' => true,
                'js_view' => 'VcColumnView',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Extra class name', 'industrialist'),
                        'param_name' => 'el_class',
                        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'industrialist')
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Layout', 'industrialist'),
                        'param_name' => 'layout',
                        'value' => array(
                            esc_html__('Accordion', 'industrialist') => 'accordion',
                            esc_html__('Toggle', 'industrialist') => 'toggle',
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Type', 'industrialist'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__('Flat', 'industrialist') => 'flat',
                            esc_html__('Boxed', 'industrialist') => 'boxed',
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),
                )
            ));
        }
    }

    public function render($atts, $content = null) {
        $default_atts = (array(
            'title' => '',
            'layout' => 'accordion',
            'type' => '',
            'skin' => '',
        ));

        $params = shortcode_atts($default_atts, $atts);
        extract($params);

        $params['accordion_classes'] = $this->getAccordionClasses($params);;
        $params['content'] = $content;

        $output = '';

        $output .= industrialist_mikado_get_shortcode_module_template_part('templates/accordion-holder', 'accordions', '', $params);

        return $output;
    }

    /**
     * Generates accordion classes
     *
     * @param $params
     *
     * @return string
     */
    private function getAccordionClasses($params) {

        $accordion_classes = array(
            'mkd-' . $params['layout'],
            'mkd-' . $params['type'],
        );

        if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $accordion_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $accordion_classes[] = 'mkd-dark';
                    break;
            }
        }

        $accordion_classes = implode(' ', $accordion_classes);

        return $accordion_classes;
    }
}
