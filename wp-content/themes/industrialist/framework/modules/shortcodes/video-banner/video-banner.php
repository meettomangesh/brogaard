<?php

namespace Industrialist\Modules\Shortcodes\VideoBanner;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;


class VideoBanner implements ShortcodeInterface
{
    private $base;

    public function __construct() {
        $this->base = 'mkd_video_banner';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Video Banner', 'industrialist'),
            'base' => $this->base,
            'category' => esc_html__('by MIKADO','industrialist'),
            'icon' => 'icon-wpb-video-banner extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'industrialist'),
                    'param_name' => 'title',
                    'value' => '',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Title Tag', 'industrialist'),
                    'param_name' => 'title_tag',
                    'value' => array(
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6'
                    ),
                    'dependency' => Array('element' => 'title', 'not_empty' => true),
                    'save_always' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Subtitle', 'industrialist'),
                    'param_name' => 'subtitle',
                    'value' => '',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Subtitle Tag', 'industrialist'),
                    'param_name' => 'subtitle_tag',
                    'value' => array(
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6'
                    ),
                    'dependency' => Array('element' => 'subtitle', 'not_empty' => true),
                    'save_always' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Video Link', 'industrialist'),
                    'param_name' => 'video_link',
                    'value' => '',
                    'save_always' => true,
                    'admin_label' => true
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Video Banner', 'industrialist'),
                    'param_name' => 'video_banner',
                    'value' => '',
                    'save_always' => true,
                    'admin_label' => true
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
                ),
            )
        ));
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'title' => '',
            'title_tag' => '',
            'subtitle' => '',
            'subtitle_tag' => '',
            'video_link' => '',
            'video_banner' => '',
            'skin' => '',
        );

        $params = shortcode_atts($default_atts, $atts);
        $params['banner_id'] = rand();
        $params['video_banner_classes'] = $this->getVideoBannerClasses($params);

        return industrialist_mikado_get_shortcode_module_template_part('templates/video-banner', 'video-banner', '', $params);
    }

    private function getVideoBannerClasses($params) {
        $video_banner_classes = array();

        if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $video_banner_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $video_banner_classes[] = 'mkd-dark';
                    break;
            }
        }

        return implode(' ', $video_banner_classes);
    }
}