<?php

class IndustrialistMikadoSideAreaOpener extends IndustrialistMikadoWidget
{
    public function __construct() {
        parent::__construct(
            'mkd_side_area_opener', // Base ID
            esc_html__('Mikado Side Area Opener', 'industrialist') // Name
        );

        $this->setParams();
    }

    protected function setParams() {

        $this->params = array(
            array(
                'name' => 'side_area_opener_icon_color',
                'type' => 'textfield',
                'title' => esc_html__('Icon Color', 'industrialist'),
                'description' => esc_html__('Define color for Side Area opener icon', 'industrialist')
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


    public function widget($args, $instance) {

        $sidearea_icon_styles = array();
        $sidearea_holder_class = '';

        if (!empty($instance['side_area_opener_icon_color'])) {
            $sidearea_icon_styles[] = 'color: ' . $instance['side_area_opener_icon_color'];
        }

        if (!empty($instance['enable_separator']) && $instance['enable_separator'] === 'yes') {
            $sidearea_holder_class .= ' mkd-widget-separator';
        }

        $icon_size = '';
        if (industrialist_mikado_options()->getOptionValue('side_area_predefined_icon_size')) {
            $icon_size = industrialist_mikado_options()->getOptionValue('side_area_predefined_icon_size');
        }
        ?>

        <?php print $args['before_widget']; ?>

        <a class="mkd-side-menu-button-opener <?php echo esc_attr($icon_size); ?> <?php echo esc_attr($sidearea_holder_class); ?>" <?php industrialist_mikado_inline_style($sidearea_icon_styles) ?> href="javascript:void(0)">
            <?php echo industrialist_mikado_get_side_menu_icon_html(); ?>
        </a>

        <?php print $args['after_widget']; ?>

    <?php }

    /*
     * override widget title interface rendering
    */
    protected function widget_title($title) {
        return '';
    }
}