<?php
namespace MikadoCore\CPT\Carousels\Shortcodes;

use MikadoCore\Lib;


/**
 * Class Table
 * @package MikadoCore\CPT\Carousels\Shortcodes
 */
class Table implements Lib\ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_clients_table';

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
        vc_map(array(
            'name' => esc_html__('Clients Table', 'mkd-core'),
            'base' => $this->base,
            'category' => 'by MIKADO',
            'icon' => 'icon-wpb-carousel-slider extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Carousel', 'mkd-core'),
                    'param_name' => 'carousel',
                    'value' => mkd_core_get_carousel_slider_array(),
                    'description' => '',
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order By', 'mkd-core'),
                    'param_name' => 'orderby',
                    'value' => array(
                        '' => '',
                        esc_html__('Title', 'mkd-core') => 'title',
                        esc_html__('Date', 'mkd-core') => 'date'
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order', 'mkd-core'),
                    'param_name' => 'order',
                    'value' => array(
                        '' => '',
                        esc_html__('ASC', 'mkd-core') => 'ASC',
                        esc_html__('DESC', 'mkd-core') => 'DESC',
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Number of items showing', 'mkd-core'),
                    'param_name' => 'number_of_items',
                    'value' => array(
                        '3' => '3',
                        '4' => '4',
                        '5' => '5'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Autoplay Timeout', 'mkd-core'),
                    'param_name' => 'autoplay_timeout',
                    'value' => array(
                        esc_html__('Disabled', 'mkd-core') => '0',
                        esc_html__('3s', 'mkd-core') => '3',
                        esc_html__('4s', 'mkd-core') => '4',
                        esc_html__('5s', 'mkd-core') => '5'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Image Animation', 'mkd-core'),
                    'param_name' => 'image_animation',
                    'value' => array(
                        esc_html__('Image Change', 'mkd-core') => 'image-change',
                        esc_html__('Image Zoom', 'mkd-core') => 'image-zoom'
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                    'description' => esc_html__('Note: Only on "Image Change" zoom image will be used', 'mkd-core')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show navigation?', 'mkd-core'),
                    'param_name' => 'show_navigation',
                    'value' => array(
                        esc_html__('Yes', 'mkd-core') => 'yes',
                        esc_html__('No', 'mkd-core') => 'no',
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => ''
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
            'carousel' => '',
            'orderby' => 'date',
            'order' => 'ASC',
            'number_of_items' => '5',
            'autoplay_timeout' => '0',
            'image_animation' => 'image-change',
            'show_navigation' => ''
        );

        $params = shortcode_atts($args, $atts);
        $params['carousel_data_attributes'] = $this->getCarouselDataAttributes($params);

        extract($params);

        $html = '';

        if ($carousel !== '') {

            $html .= '<div class="mkd-carousel-holder clearfix">';
            $html .= '<div class="mkd-carousel" ' . industrialist_mikado_get_inline_attrs($carousel_data_attributes) . '>';

            $args = array(
                'post_type' => 'carousels',
                'carousels_category' => $params['carousel'],
                'orderby' => $params['orderby'],
                'order' => $params['order'],
                'posts_per_page' => '-1'
            );

            $query = new \WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $carousel_item = $this->getCarouselItemData(get_the_ID(), $params);
                    $html .= mkd_core_get_shortcode_module_template_part('carousels', 'carousel-template', '', $carousel_item);
                }
            }

            wp_reset_postdata();


            $html .= '</div>';
            $html .= '</div>';

        }

        return $html;
    }

    /**
     * Return all data that carousel needs, images, titles, links, etc
     *
     * @param $params
     * @return array
     */
    private function getCarouselItemData($item_id, $params) {

        $carousel_item = array();

        if (($meta_temp = get_post_meta($item_id, 'mkd_carousel_image', true)) !== '') {
            $carousel_item['image'] = $meta_temp;
        } else {
            $carousel_item['image'] = '';
        }

        if ($params['image_animation'] == 'image-change' && ($meta_temp = get_post_meta($item_id, 'mkd_carousel_hover_image', true)) !== '') {
            $carousel_item['hover_image'] = $meta_temp;
            $carousel_item['hover_class'] = 'mkd-has-hover-image';
        } else {
            $carousel_item['hover_image'] = '';
            $carousel_item['hover_class'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'mkd_carousel_item_link', true)) != '') {
            $carousel_item['link'] = $meta_temp;
        } else {
            $carousel_item['link'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'mkd_carousel_item_target', true)) != '') {
            $carousel_item['target'] = $meta_temp;
        } else {
            $carousel_item['target'] = '_self';
        }

        $carousel_item['title'] = get_the_title();

        $carousel_item['carousel_image_classes'] = $this->getCarouselImageClasses($params);

        return $carousel_item;

    }

    /**
     * Return CSS classes for carousel image
     *
     * @param $params
     * @return array
     */
    private function getCarouselImageClasses($params) {

        $carousel_image_classes = array();
        if ($params['image_animation'] !== '') {
            $carousel_image_classes[] = 'mkd-' . $params['image_animation'];
        }

        return implode(' ', $carousel_image_classes);

    }

    /**
     * Return data attributes for carousel
     *
     * @param $params
     * @return array
     */
    private function getCarouselDataAttributes($params) {

        $carousel_data = array();

        if ($params['number_of_items'] !== '') {
            $carousel_data['data-items'] = $params['number_of_items'];
        }
        if ($params['show_navigation'] !== '') {
            $carousel_data['data-navigation'] = $params['show_navigation'];
        }
        if ($params['autoplay_timeout'] !== '') {
            $carousel_data['data-autoplay'] = $params['autoplay_timeout'];
        }

        return $carousel_data;

    }

}