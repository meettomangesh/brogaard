<?php
namespace Industrialist\Modules\Shortcodes\CallToAction;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CallToAction
 */
class CallToAction implements ShortcodeInterface
{

    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_call_to_action';

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

        $call_to_action_button_icons_array = array();
        $call_to_action_button_IconCollections = industrialist_mikado_icon_collections()->iconCollections;
        foreach ($call_to_action_button_IconCollections as $collection_key => $collection) {

            $call_to_action_button_icons_array[] = array(
                'type' => 'dropdown',
                'heading' => esc_html__('Button Icon', 'industrialist'),
                'param_name' => 'button_' . $collection->param,
                'value' => $collection->getIconsArray(),
                'save_always' => true,
                'dependency' => Array('element' => 'button_icon_pack', 'value' => array($collection_key)),
                'group' => esc_html('Button', 'industrialist'),
            );

        }

        vc_map(array(
            'name' => esc_html__('Call To Action', 'industrialist'),
            'base' => $this->getBase(),
            'category' => esc_html__('by MIKADO', 'industrialist'),
            'icon' => 'icon-wpb-call-to-action extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array_merge(
                array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Full Width', 'industrialist'),
                        'param_name' => 'full_width',
                        'admin_label' => true,
                        'value' => array(
                            esc_html__('Yes', 'industrialist') => 'yes',
                            esc_html__('No', 'industrialist') => 'no'
                        ),
                        'save_always' => true,
                        'description' => '',
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Content in grid', 'industrialist'),
                        'param_name' => 'content_in_grid',
                        'value' => array(
                            esc_html__('Yes', 'industrialist') => 'yes',
                            esc_html__('No', 'industrialist') => 'no'
                        ),
                        'save_always' => true,
                        'description' => '',
                        'dependency' => array('element' => 'full_width', 'value' => 'yes')
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Grid size', 'industrialist'),
                        'param_name' => 'grid_size',
                        'value' => array(
                            '75/25' => '75',
                            '50/50' => '50',
                            '66/33' => '66'
                        ),
                        'save_always' => true,
                        'description' => '',
                        'dependency' => array('element' => 'content_in_grid', 'value' => 'yes')
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Type', 'industrialist'),
                        'param_name' => 'type',
                        'admin_label' => true,
                        'value' => array(
                            esc_html__('Normal', 'industrialist') => 'normal',
                            esc_html__('With Icon', 'industrialist') => 'with-icon',
                        ),
                        'save_always' => true,
                        'description' => ''
                    )
                ),
                industrialist_mikado_icon_collections()->getVCParamsArray(array('element' => 'type', 'value' => array('with-icon'))),
                array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Show Button', 'industrialist'),
                        'param_name' => 'show_button',
                        'value' => array(
                            esc_html__('Yes', 'industrialist') => 'yes',
                            esc_html__('No', 'industrialist') => 'no'
                        ),
                        'admin_label' => true,
                        'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Button Position', 'industrialist'),
                        'param_name' => 'button_position',
                        'value' => array(
                            esc_html__('Default/right', 'industrialist') => '',
                            esc_html__('Center', 'industrialist') => 'center',
                            esc_html__('Left', 'industrialist') => 'left'
                        ),
                        'description' => '',
                        'dependency' => array('element' => 'show_button', 'value' => array('yes')),
                        'group' => esc_html('Button', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Button Size', 'industrialist'),
                        'param_name' => 'button_size',
                        'value' => array(
                            esc_html__('Default', 'industrialist') => '',
                            esc_html__('Small', 'industrialist') => 'small',
                            esc_html__('Medium', 'industrialist') => 'medium',
                            esc_html__('Large', 'industrialist') => 'large',
                            esc_html__('Extra Large', 'industrialist') => 'big_large'
                        ),
                        'description' => '',
                        'dependency' => array('element' => 'show_button', 'value' => array('yes')),
                        'group' => esc_html('Button', 'industrialist'),),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Button Text', 'industrialist'),
                        'param_name' => 'button_text',
                        'admin_label' => true,
                        'description' => esc_html__('Default text is "button"', 'industrialist'),
                        'dependency' => array('element' => 'show_button', 'value' => array('yes')),
                        'group' => esc_html('Button', 'industrialist'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Button Link', 'industrialist'),
                        'param_name' => 'button_link',
                        'description' => '',
                        'admin_label' => true,
                        'dependency' => array('element' => 'show_button', 'value' => array('yes')),
                        'group' => esc_html('Button', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Button Target', 'industrialist'),
                        'param_name' => 'button_target',
                        'value' => array(
                            '' => '',
                            esc_html__('Self', 'industrialist') => '_self',
                            esc_html__('Blank', 'industrialist') => '_blank'
                        ),
                        'description' => '',
                        'dependency' => array('element' => 'show_button', 'value' => array('yes')),
                        'group' => esc_html('Button', 'industrialist'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Button Icon Pack', 'industrialist'),
                        'param_name' => 'button_icon_pack',
                        'value' => array_merge(array('No Icon' => ''), industrialist_mikado_icon_collections()->getIconCollectionsVC()),
                        'save_always' => true,
                        'dependency' => array('element' => 'show_button', 'value' => array('yes')),
                        'group' => esc_html('Button', 'industrialist'),
                    )
                ),
                $call_to_action_button_icons_array,
                array(
                    array(
                        'type' => 'textarea_html',
                        'admin_label' => true,
                        'heading' => esc_html__('Content', 'industrialist'),
                        'param_name' => 'content',
                        'value' => '<p>' . esc_html__('I am test text for Call to action.', 'industrialist') . '</p>',
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
                        'heading' => esc_html__('Icon Size (px)', 'industrialist'),
                        'param_name' => 'icon_size',
                        'description' => '',
                        'dependency' => Array('element' => 'type', 'value' => array('with-icon')),
                        'group' => esc_html__('Design Options', 'industrialist'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Box Padding (top right bottom left) px', 'industrialist'),
                        'param_name' => 'box_padding',
                        'admin_label' => true,
                        'description' => esc_html__('Default padding is 20px on all sides', 'industrialist'),
                        'group' => esc_html__('Design Options', 'industrialist')
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Default Text Font Size (px)', 'industrialist'),
                        'param_name' => 'text_size',
                        'description' => esc_html__('Font size for p tag', 'industrialist'),
                        'group' => esc_html__('Design Options', 'industrialist'),
                    ),
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
            'type' => 'normal',
            'full_width' => 'yes',
            'content_in_grid' => 'yes',
            'grid_size' => '75',
            'icon_size' => '',
            'box_padding' => '20px',
            'text_size' => '',
            'show_button' => 'yes',
            'button_position' => 'right',
            'button_size' => '',
            'button_link' => '',
            'button_text' => 'button',
            'button_target' => '',
            'button_icon_pack' => '',
            'skin' => '',
        );

        $call_to_action_icons_form_fields = array();

        foreach (industrialist_mikado_icon_collections()->iconCollections as $collection_key => $collection) {

            $call_to_action_icons_form_fields['button_' . $collection->param] = '';

        }

        $args = array_merge($args, industrialist_mikado_icon_collections()->getShortcodeParams(), $call_to_action_icons_form_fields);

        $params = shortcode_atts($args, $atts);

        $params['content'] = $content;
        $params['text_wrapper_classes'] = $this->getTextWrapperClasses($params);
        $params['content_styles'] = $this->getContentStyles($params);
        $params['call_to_action_styles'] = $this->getCallToActionStyles($params);
        $params['icon'] = $this->getCallToActionIcon($params);
        $params['button_parameters'] = $this->getButtonParameters($params);
        $params['call_to_action_classes'] = $this->getCallToActionClasses($params);

        //Get HTML from template
        $html = industrialist_mikado_get_shortcode_module_template_part('templates/call-to-action', 'call-to-action', '', $params);

        return $html;

    }

    /**
     * Return Classes for Call To Action text wrapper
     *
     * @param $params
     * @return string
     */
    private function getTextWrapperClasses($params) {
        return ($params['show_button'] == 'yes') ? 'mkd-call-to-action-column1 mkd-call-to-action-cell' : '';
    }

    /**
     * Return CSS styles for Call To Action Icon
     *
     * @param $params
     * @return string
     */
    private function getIconStyles($params) {
        $icon_styles = array();

        if ($params['icon_size'] !== '') {
            $icon_styles[] = 'font-size: ' . $params['icon_size'] . 'px';
        }

        return implode(';', $icon_styles);
    }

    /**
     * Return CSS styles for Call To Action Content
     *
     * @param $params
     * @return string
     */
    private function getContentStyles($params) {
        $content_styles = array();

        if ($params['text_size'] !== '') {
            $content_styles[] = 'font-size: ' . $params['text_size'] . 'px';
        }

        return implode(';', $content_styles);
    }

    /**
     * Return CSS styles for Call To Action shortcode
     *
     * @param $params
     * @return string
     */
    private function getCallToActionStyles($params) {
        $call_to_action_styles = array();

        if ($params['box_padding'] != '') {
            $call_to_action_styles[] = 'padding: ' . $params['box_padding'] . ';';
        }

        return implode(';', $call_to_action_styles);
    }

    /**
     * Return Icon for Call To Action Shortcode
     *
     * @param $params
     * @return mixed
     */
    private function getCallToActionIcon($params) {

        $icon = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
        $icon_styles = array();
        $icon_styles['icon_attributes']['style'] = $this->getIconStyles($params);
        $call_to_action_icon = '';
        if (!empty($params[$icon])) {
            $call_to_action_icon = industrialist_mikado_icon_collections()->renderIcon($params[$icon], $params['icon_pack'], $icon_styles);
        }
        return $call_to_action_icon;

    }

    private function getButtonParameters($params) {
        $button_params = array();

        if (!empty($params['button_link'])) {
            $button_params['link'] = $params['button_link'];
        }

        if (!empty($params['button_size'])) {
            $button_params['size'] = $params['button_size'];
        }

        if (!empty($params['button_icon_pack'])) {
            $button_params['icon_pack'] = $params['button_icon_pack'];
            $icon_pack_name = industrialist_mikado_icon_collections()->getIconCollectionParamNameByKey($params['button_icon_pack']);
            $button_params[$icon_pack_name] = $params['button_' . $icon_pack_name];
        }

        if (!empty($params['button_target'])) {
            $button_params['target'] = $params['button_target'];
        }

        if (!empty($params['button_text'])) {
            $button_params['text'] = $params['button_text'];
        }

        $button_params['type'] = 'solid';

        if (!empty($params['skin'])) {
            $button_params['skin'] = ($params['skin'] == 'light') ? 'light' : 'dark';
        }

        return $button_params;
    }

    /**
     * Returns array of HTML classes for call to action
     *
     * @param $params
     *
     * @return string
     */
    private function getCallToActionClasses($params) {
        $cta_classes = array();

        if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $cta_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $cta_classes[] = 'mkd-dark';
                    break;
            }
        }

        return implode(' ', $cta_classes);
    }
}