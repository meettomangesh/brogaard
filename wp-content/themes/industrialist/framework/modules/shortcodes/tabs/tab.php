<?php
namespace Industrialist\Modules\Shortcodes\Tab;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tab
 */
class Tab implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_tab';
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
                'name' => esc_html__('Tab Item', 'industrialist'),
                'base' => $this->getBase(),
                'as_parent' => array(),
                'as_child' => array('only' => 'mkd_tab_holder'),
                'is_container' => true,
                'category' => esc_html__('by MIKADO', 'industrialist'),
                'icon' => 'icon-wpb-tab-item extended-custom-icon',
                'show_settings_on_create' => true,
                'js_view' => 'VcColumnView',
                'params' => array_merge(
                    industrialist_mikado_icon_collections()->getVCParamsArray(array(), '', true),
                    array(
                        array(
                            'type' => 'textfield',
                            'admin_label' => true,
                            'heading' => esc_html__('Title', 'industrialist'),
                            'param_name' => 'tab_title',
                            'description' => ''
                        )
                    )
                )
            ));
        }
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'tab_title' => 'Tab',
            'tab_id' => '',
        );

        $default_atts = array_merge($default_atts, industrialist_mikado_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($default_atts, $atts);
        extract($params);

        if ($params['icon_pack'] !== '') {
            $iconPackName = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
            $params['icon'] = $params[$iconPackName];
        }

        $rand_number = rand(0, 1000);
        $params['tab_title'] = $params['tab_title'] . '-' . $rand_number;

        $params['content'] = $content;

        $output = '';
        $output .= industrialist_mikado_get_shortcode_module_template_part('templates/tab', 'tabs', '', $params);
        return $output;
    }
}