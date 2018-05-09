<?php

class IndustrialistMikadoContactForm7 extends IndustrialistMikadoWidget
{
    protected $params;

    public function __construct() {
        parent::__construct(
            'mkd_contact_form7_widget', // Base ID
            esc_html__('Mikado Contact Form 7', 'industrialist'), // Name
            array('description' => esc_html__('Display Contact Form 7', 'industrialist'),) // Args
        );

        $this->setParams();
    }

    protected function setParams() {

        $contact_forms = array();

        $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

        if ($cf7) {
            foreach ($cf7 as $cform) {
                $contact_forms[$cform->ID] = $cform->post_title;
            }
        } else {
            $contact_forms[esc_html__('No contact forms found', 'industrialist')] = 0;
        }

        $this->params = array(
            array(
                'name' => 'text',
                'type' => 'textarea',
                'title' => esc_html__('Text', 'industrialist'),
            ),
            array(
                'name' => 'id',
                'type' => 'dropdown',
                'title' => esc_html__('Contact Form', 'industrialist'),
                'options' => $contact_forms
            ),
            array(
                'name' => 'html_class',
                'type' => 'dropdown',
                'title' => esc_html__('Style', 'industrialist'),
                'options' => array(
                    'default' => esc_html__('Default', 'industrialist'),
                    'cf7_custom_style_1' => esc_html__('Custom Style 1', 'industrialist'),
                    'cf7_custom_style_2' => esc_html__('Custom Style 2', 'industrialist'),
                    'cf7_custom_style_3' => esc_html__('Custom Style 3', 'industrialist'),
                ),
                'description' => esc_html__('You can style each form element individually in Mikado Options > Contact Form 7', 'industrialist'),
            ),
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('title', $instance['title']);
        // before and after widget arguments are defined by themes
        print ($args['before_widget']);
        if (!empty($title))
            print ($args['before_title']) . $title . ($args['after_title']);

        extract($args);

        //prepare variables
        $params = array();

        //is instance empty?
        if (is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach ($instance as $key => $value) {
                $params[$key] = $value;
            }
        }

        $cf_custom_style = '';
        if (($instance['html_class']) === 'cf7_custom_style_1') {
            $cf_custom_style = ' cf7_custom_style_1';
        } elseif (($instance['html_class']) === 'cf7_custom_style_2') {
            $cf_custom_style = ' cf7_custom_style_2';
        } elseif (($instance['html_class']) === 'cf7_custom_style_3') {
            $cf_custom_style = ' cf7_custom_style_3';
        }

        echo '<div class="mkd-contact-form-7-widget' . $cf_custom_style . '">';

        if (!empty($instance['text'])) {
            echo '<div class="mkd-contact-form-text">' . $instance['text'] . '</div>';

        }

        echo industrialist_mikado_execute_shortcode('contact-form-7', $params);

        echo '</div>'; //close mkd-contact-form-7-widget

        print $args['after_widget'];
    }
}

add_action('widgets_init', function () {
    register_widget('IndustrialistMikadoContactForm7');
});
