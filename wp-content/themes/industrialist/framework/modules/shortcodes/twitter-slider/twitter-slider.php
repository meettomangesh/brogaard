<?php

namespace Industrialist\Modules\Shortcodes\TwitterSlider;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class TwitterSlider implements ShortcodeInterface
{
    private $base;

    public function __construct() {
        $this->base = 'mkd_twitter_slider';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     *
     */
    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Twitter Slider', 'industrialist'),
            'base' => $this->base,
            'icon' => 'icon-wpb-twitter-slider extended-custom-icon',
            'category' => esc_html__('by MIKADO', 'industrialist'),
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
                    'heading' => esc_html__('User ID', 'industrialist'),
                    'param_name' => 'user_id',
                    'value' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Number of tweets', 'industrialist'),
                    'param_name' => 'count',
                    'value' => '',
                    'description' => esc_html__('Default Number is 4', 'industrialist'),
                    'admin_label' => true
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Tweets Color', 'industrialist'),
                    'param_name' => 'tweets_color',
                    'value' => '',
                    'description' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'textfield',
                    'class' => '',
                    'heading' => esc_html__('Tweet Cache Time', 'industrialist'),
                    'param_name' => 'transient_time',
                    'value' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Skin', 'industrialist'),
                    'param_name' => 'skin',
                    'description' => '',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('Dark', 'industrialist') => 'dark',
                        esc_html__('Light', 'industrialist') => 'light'
                    ),
                ),

                ////////////////////////////////////////////////

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Slide duration', 'industrialist'),
                    'admin_label' => true,
                    'param_name' => 'autoplay',
                    'value' => array(
                        esc_html__('3', 'industrialist') => '3',
                        esc_html__('5', 'industrialist') => '5',
                        esc_html__('10', 'industrialist') => '10',
                        esc_html__('Disable', 'industrialist') => 'disable'
                    ),
                    'save_always' => true,
                    'description' => esc_html__('Auto rotate slides each X seconds', 'industrialist'),
                    'group' => esc_html__('Slider', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Pause on hover', 'industrialist'),
                    'param_name' => 'pause',
                    'value' => array(
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no'
                    ),
                    'save_always' => true,
                    'dependency' => array(
                        'element' => 'autoplay',
                        'value' => array(
                            '3', '5', '10'
                        )
                    ),
                    'group' => esc_html__('Slider', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Loop', 'industrialist'),
                    'param_name' => 'loop',
                    'value' => array(
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no'
                    ),
                    'save_always' => true,
                    'group' => esc_html__('Slider', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show Navigation Arrows', 'industrialist'),
                    'param_name' => 'navigation',
                    'value' => array(
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no'
                    ),
                    'save_always' => true,
                    'group' => esc_html__('Slider', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Navigation Position', 'industrialist'),
                    'param_name' => 'navigation_position',
                    'value' => array(
                        esc_html__('Inside', 'industrialist') => 'inside',
                        esc_html__('Outside', 'industrialist') => 'outside'
                    ),
                    'std' => 'inside',
                    'save_always' => true,
                    'dependency' => array(
                        'element' => 'navigation',
                        'value' => array(
                            'yes'
                        )
                    ),
                    'group' => esc_html__('Slider', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show Pagination', 'industrialist'),
                    'param_name' => 'pagination',
                    'value' => array(
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no'
                    ),
                    'save_always' => true,
                    'group' => esc_html__('Slider', 'industrialist'),
                )
            )
        ));
    }


    /**
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $params = array(
            'user_id' => '',
            'count' => '4',
            'tweets_color' => '',
            'transient_time' => '0',
            'skin' => '',
            'title' => '',
            'title_tag' => '',
            'autoplay' => '',
            'pause' => '',
            'loop' => '',
            'navigation' => '',
            'navigation_position' => '',
            'pagination' => '',
        );

        $params = shortcode_atts($params, $atts);

        $html = '';

        $twitter_api = \MikadoTwitterApi::getInstance();

        if ($twitter_api->hasUserConnected()) {
            $response = $twitter_api->fetchTweets($params['user_id'], $params['count'], array(
                'transient_time' => $params['transient_time'],
                'transient_id' => 'mkd_twitter_slider_cache'
            ));

            $params['response'] = $response;
            $params['twitter_api'] = $twitter_api;
            $params['tweet_styles'] = $this->getTweetStyles($params);
            $params['twitter_classes'] = $this->getTwitterSliderClasses($params);
            $params['twitter_slider_data'] = $this->getTwitterSliderData($params);

            $html .= industrialist_mikado_get_shortcode_module_template_part('templates/twitter-slider', 'twitter-slider', '', $params);
        } else {
            $html .= esc_html__('It seams that you haven\'t connected with your Twitter account', 'industrialist');
        }

        return $html;
    }

    /**
     * Return all configuration data for slider
     *
     * @param $params
     * @return array
     */
    private function getTwitterSliderData($params) {
        $twitter_slider_data = array();

        $twitter_slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
        $twitter_slider_data['data-pause'] = ($params['pause'] != '') ? $params['pause'] : '';
        $twitter_slider_data['data-loop'] = ($params['loop'] !== '') ? $params['loop'] : '';
        $twitter_slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
        $twitter_slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

        return $twitter_slider_data;
    }

    /**
     * @param $params
     *
     * @return array
     */
    private function getTweetStyles($params) {
        $styles = array();

        if (!empty($params['tweets_color'])) {
            $styles[] = 'color: ' . $params['tweets_color'];
        }

        return $styles;
    }

    private function getTwitterSliderClasses($params) {
        $twitter_classes = array();

        if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $twitter_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $twitter_classes[] = 'mkd-dark';
                    break;
            }
        }

        $twitter_classes[] = ($params['navigation_position'] == 'inside') ? 'mkd-nav-inside' : '';

        return implode(' ', $twitter_classes);
    }
}