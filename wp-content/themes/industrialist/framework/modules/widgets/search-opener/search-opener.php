<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Mikado_Search_Opener
 */
class IndustrialistMikadoSearchOpener extends IndustrialistMikadoWidget
{
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'mkd_search_opener', // Base ID
            esc_html__('Mikado Search Opener', 'industrialist') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'name' => 'search_icon_size',
                'type' => 'textfield',
                'title' => esc_html__('Search Icon Size (px)', 'industrialist'),
                'description' => esc_html__('Define size for Search icon', 'industrialist')
            ),
            array(
                'name' => 'search_icon_color',
                'type' => 'textfield',
                'title' => esc_html__('Search Icon Color', 'industrialist'),
                'description' => esc_html__('Define color for Search icon', 'industrialist')
            ),
            array(
                'name' => 'search_icon_hover_color',
                'type' => 'textfield',
                'title' => esc_html__('Search Icon Hover Color', 'industrialist'),
                'description' => esc_html__('Define hover color for Search icon', 'industrialist')
            ),
            array(
                'name' => 'show_label',
                'type' => 'dropdown',
                'title' => esc_html__('Enable Search Icon Text', 'industrialist'),
                'description' => esc_html__('Enable this option to show \'Search\' text next to search icon in header', 'industrialist'),
                'options' => array(
                    '' => '',
                    'yes' => esc_html__('Yes', 'industrialist'),
                    'no' => esc_html__('No', 'industrialist')
                )
            ),
            array(
                'name' => 'close_icon_position',
                'type' => 'dropdown',
                'title' => esc_html__('Close icon stays on opener place', 'industrialist'),
                'description' => esc_html__('Enable this option to set close icon on same position like opener icon', 'industrialist'),
                'options' => array(
                    'yes' => esc_html__('Yes', 'industrialist'),
                    'no' => esc_html__('No', 'industrialist')
                )
            ),
            array(
                'name' => 'enable_separator',
                'type' => 'dropdown',
                'title' => esc_html__('Enable Separator on Left Side', 'industrialist'),
                'description' => esc_html__('Enable this option to show separator before search icon in header', 'industrialist'),
                'options' => array(
                    '' => '',
                    'yes' => esc_html__('Yes', 'industrialist'),
                    'no' => esc_html__('No', 'industrialist')
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
        global $industrialist_options, $industrialist_IconCollections;

        $search_type_class = 'mkd-search-opener';
        $fullscreen_search_overlay = false;
        $search_opener_styles = array();
        $show_search_text = $instance['show_label'] == 'yes' || $industrialist_options['enable_search_icon_text'] == 'yes' ? true : false;
        $close_icon_on_same_position = $instance['close_icon_position'] == 'yes' ? true : false;

        if (isset($industrialist_options['search_type']) && $industrialist_options['search_type'] == 'fullscreen-search') {
            if (isset($industrialist_options['search_animation']) && $industrialist_options['search_animation'] == 'search-from-circle') {
                $fullscreen_search_overlay = true;
            }
        }

        if (isset($industrialist_options['search_type']) && $industrialist_options['search_type'] == 'search_covers_header') {
            if (isset($industrialist_options['search_cover_only_bottom_yesno']) && $industrialist_options['search_cover_only_bottom_yesno'] == 'yes') {
                $search_type_class .= ' search_covers_only_bottom';
            }
        }

        if (!empty($instance['enable_separator']) && $instance['enable_separator'] === 'yes') {
            $search_type_class .= ' mkd-widget-separator';
        }

        if (!empty($instance['search_icon_size'])) {
            $search_opener_styles[] = 'font-size: ' . $instance['search_icon_size'] . 'px';
        }

        if (!empty($instance['search_icon_color'])) {
            $search_opener_styles[] = 'color: ' . $instance['search_icon_color'];
        }

        print $args['before_widget'];

        ?>

        <a <?php echo industrialist_mikado_get_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?>
            <?php if ($close_icon_on_same_position) {
                echo industrialist_mikado_get_inline_attr('yes', 'data-icon-close-same-position');
            } ?>
            <?php industrialist_mikado_inline_style($search_opener_styles); ?>
            <?php industrialist_mikado_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <?php if (isset($industrialist_options['search_icon_pack'])) {
                $industrialist_IconCollections->getSearchIcon($industrialist_options['search_icon_pack'], false);
            } ?>
            <?php if ($show_search_text) { ?>
                <span class="mkd-search-icon-text"><?php esc_html_e('Search', 'industrialist'); ?></span>
            <?php } ?>
        </a>

        <?php if ($fullscreen_search_overlay) { ?>
            <div class="mkd-fullscreen-search-overlay"></div>
        <?php } ?>

        <?php do_action('industrialist_mikado_after_search_opener'); ?>

        <?php print $args['after_widget']; ?>
    <?php }

    /*
     * override widget title interface rendering
    */
    protected function widget_title($title) {
        return '';
    }
}