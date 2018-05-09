<?php

/**
 * Widget that adds image type
 *
 * Class Image_Widget
 */
class IndustrialistMikadoImageWidget extends IndustrialistMikadoWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'mkd_image_widget', // Base ID
            esc_html__('Mikado Image Widget', 'industrialist') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'title' => esc_html__('Image Source', 'industrialist'),
                'name' => 'image_src'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Image Alt', 'industrialist'),
                'name' => 'image_alt'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Link', 'industrialist'),
                'name' => 'link'
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Hover Type', 'industrialist'),
                'name' => 'hover_type',
                'options' => array(
                    'mkd-zoom' => esc_html__('Zoom', 'industrialist'),
                    'mkd-fade' => esc_html__('Fade', 'industrialist'),
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Target', 'industrialist'),
                'name' => 'target',
                'options' => array(
                    '_self' => esc_html__('Same Window', 'industrialist'),
                    '_blank' => esc_html__('New Window', 'industrialist')
                )
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

        if (!empty($instance['title']) && $instance['title'] !== '') {
            $title = apply_filters('title', $instance['title']);
        }
        // before and after widget arguments are defined by themes
        print $args['before_widget'];
        if (!empty($title))
            print $args['before_title'] . $title . $args['after_title'];

        extract($args);

        $image_src = '';
        $hover_type = '';
        $image_alt = 'Widget Image';

        if (!empty($instance['image_alt']) && $instance['image_alt'] !== '') {
            $image_alt = $instance['image_alt'];
        }

        if (!empty($instance['hover_type']) && $instance['hover_type'] !== '') {
            $hover_type = $instance['hover_type'];
        }

        $target = '_self';

        if (!empty($instance['target']) && $instance['target'] !== '') {
            $target = $instance['target'];
        }

        ?>

        <div class="mkd-image-widget <?php echo esc_attr($hover_type); ?>">
            <?php
            if (!empty($instance['link']) && $instance['link'] !== '') {
                echo '<a href="' . esc_url($instance['link']) . '" target="' . $target . '">';
            }
            if (!empty($instance['image_src']) && $instance['image_src'] !== '') {
                echo '<figure>';
                echo '<img src="' . esc_url($instance['image_src']) . '" alt="' . $image_alt . '" />';
                echo '</figure>';
            }
            if (!empty($instance['link']) && $instance['link'] !== '') {
                echo '</a>';
            }
            ?>
        </div>
        <?php

        print $args['after_widget'];
    }
}