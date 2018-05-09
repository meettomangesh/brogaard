<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class IndustrialistMikadoSeparatorWidget extends IndustrialistMikadoWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'mkd_separator_widget', // Base ID
            esc_html__('Mikado Separator Widget', 'industrialist') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Type', 'industrialist'),
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal', 'industrialist'),
                    'full-width' => esc_html__('Full Width', 'industrialist')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Position', 'industrialist'),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center', 'industrialist'),
                    'left' => esc_html__('Left', 'industrialist'),
                    'right' => esc_html__('Right', 'industrialist')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Style', 'industrialist'),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid', 'industrialist'),
                    'dashed' => esc_html__('Dashed', 'industrialist'),
                    'dotted' => esc_html__('Dotted', 'industrialist')
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color', 'industrialist'),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width', 'industrialist'),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)', 'industrialist'),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin', 'industrialist'),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin', 'industrialist'),
                'name' => 'bottom_margin',
                'description' => ''
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if (is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach ($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget mkd-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[mkd_separator $params]"); // XSS OK

        echo '</div>'; //close div.mkd-separator-widget
    }

    /*
     * override widget title interface rendering
    */
    protected function widget_title($title) {
        return '';
    }
}