<?php

class IndustrialistMikadoLatestPosts extends IndustrialistMikadoWidget
{
    protected $params;

    public function __construct() {
        parent::__construct(
            'mkd_latest_posts_widget', // Base ID
            esc_html__('Mikado Latest Post', 'industrialist'), // Name
            array('description' => esc_html__('Display posts from your blog', 'industrialist'),) // Args
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Type', 'industrialist'),
                'name' => 'type',
                'options' => array(
                    'minimal' => esc_html__('Minimal', 'industrialist'),
                    'image_in_box' => esc_html__('Image in box', 'industrialist')
                ),
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Number of Posts', 'industrialist'),
                'name' => 'number_of_posts',
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Order By', 'industrialist'),
                'name' => 'order_by',
                'options' => array(
                    'title' => esc_html__('Title', 'industrialist'),
                    'date' => esc_html__('Date', 'industrialist')
                ),
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Order', 'industrialist'),
                'name' => 'order',
                'options' => array(
                    'ASC' => esc_html__('ASC', 'industrialist'),
                    'DESC' => esc_html__('DESC', 'industrialist')
                ),
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Category Slug', 'industrialist'),
                'name' => 'category',
                'description' => esc_html__('Leave empty for all or use comma for list', 'industrialist'),
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Image Size', 'industrialist'),
                'name' => 'image_size',
                'options' => array(
                    'original' => esc_html__('Original', 'industrialist'),
                    'landscape' => esc_html__('Landscape', 'industrialist'),
                    'square' => esc_html__('Square', 'industrialist')
                ),
                'description' => esc_html__('Applied only to Image in Box type', 'industrialist'),
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Title Tag', 'industrialist'),
                'name' => 'title_tag',
                'options' => array(
                    '' => '',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Display Date', 'industrialist'),
                'name' => 'display_date',
                'options' => array(
                    '' => esc_html__('Default', 'industrialist'),
                    'yes' => esc_html__('Yes', 'industrialist'),
                    'no' => esc_html__('No', 'industrialist'),
                ),
            ),


        );
    }

    public function widget($args, $instance) {

        $title = apply_filters('title', $instance['title']);
        // before and after widget arguments are defined by themes
        print ($args['before_widget']);
        if (!empty($title))
            print ($args['before_title']) . esc_attr($title) . ($args['after_title']);

        extract($args);

        //prepare variables
        $content = '';
        $params = array();
        $params['number_of_columns'] = '1';

        //is instance empty?
        if (is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach ($instance as $key => $options) {
                $params[$key] = $options;
            }
        }

        if (empty($params['number_of_posts'])) {
            $params['number_of_posts'] = 4;
        }
        if (empty($params['title_tag'])) {
            $params['title_tag'] = 'h5';
        }
        if (empty($params['display_excerpt'])) {
            $params['display_excerpt'] = 'no';
        }
        if (empty($params['excerpt_length'])) {
            $params['excerpt_length'] = '90';
        }
        if (empty($params['display_categories'])) {
            $params['display_categories'] = 'no';
        }
        if (empty($params['display_date'])) {
            $params['display_date'] = 'yes';
        }
        if (empty($params['display_share'])) {
            $params['display_share'] = 'no';
        }
        if (empty($params['display_read_more'])) {
            $params['display_read_more'] = 'no';
        }

        echo '<div class="mkd-latest-posts-widget">';

        echo industrialist_mikado_execute_shortcode('mkd_blog_list', $params);

        echo '</div>'; // close mkd-latest-posts-widget

        print ($args['after_widget']);
    }
}

