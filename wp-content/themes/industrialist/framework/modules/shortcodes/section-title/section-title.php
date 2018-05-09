<?php
namespace Industrialist\Modules\Shortcodes\SectionTitle;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class SectionTitle
 */
class SectionTitle implements ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'mkd_section_title';

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
                'name' => esc_html__('Section Title', 'industrialist'),
                'base' => $this->base,
                'category' => esc_html__('by MIKADO','industrialist'),
                'icon' => 'icon-wpb-section-title extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'industrialist'),
                        'param_name' => 'title',
                        'admin_label' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Tag', 'industrialist'),
                        'param_name' => 'title_tag',
                        'value' => array(
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                            'h6' => 'h6'
                        ),
                        'save_always' => true,
                        'dependency' => array('element' => 'title', 'not_empty' => true)
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
                        'type' => 'textarea_html',
                        'heading' => esc_html__('Content', 'industrialist'),
                        'param_name' => 'content',
                        'value' => '<p>' . 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' . '</p>',
                        'description' => '',
                    )
                )
            ));
        }
    }

    public function render($atts, $content = null) {

        $args = array(
            'title' => '',
            'title_tag' => 'h2',
            'enable_separator' => '',
            'content_align' => '',
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;

        //Get HTML from template based on type of team

        $params['section_title_classes'] = $this->getSectionTitleClasses($params);
        $params['title_tag'] = $this->getTitleTag($params, $args);
        $params['separator_params'] = $this->getSeparatorStyles($params);

        $html = industrialist_mikado_get_shortcode_module_template_part('templates/section-title', 'section-title', '', $params);

        return $html;
    }

    /**
     * Return classes appended to shortcode holder
     *
     * @param $params
     * @return string
     */
    private function getSectionTitleClasses($params) {

        $section_title_classes = '';

        if ($params['content_align'] !== '') {

            switch ($params['content_align']) {
                case 'left':
                    $section_title_classes = 'mkd-content-aligment-left';
                    break;
                case 'center':
                    $section_title_classes = 'mkd-content-aligment-center';
                    break;
                case 'right':
                    $section_title_classes = 'mkd-content-aligment-right';
                    break;
            }
        }

        return $section_title_classes;
    }

    /**
     * Return Title Tag. If provided heading isn't valid get the default one
     *
     * @param $params
     * @return string
     */
    private function getTitleTag($params, $args) {

        $tag_array = array('h2', 'h3', 'h4', 'h5', 'h6');

        return (in_array($params['title_tag'], $tag_array)) ? $params['title_tag'] : $args['title_tag'];
    }

    /*
     * Return args for separator shortcode
     *
     * @params $params
     * @return array
     */

    private function getSeparatorStyles($params) {
        $separator_styles = array();

        if ($params['content_align'] !== '') {
            $separator_styles['position'] = $params['content_align'];
        }

        $separator_styles['width'] = '40';
        $separator_styles['thickness'] = '2';
        $separator_styles['top_margin'] = '0';
        $separator_styles['bottom_margin'] = '30';

        return $separator_styles;
    }
}