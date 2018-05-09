<?php
namespace Industrialist\Modules\Shortcodes\FrameSlider;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class FrameSlider
 */
class FrameSlider implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_frame_slider';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Frame Slider', 'industrialist'),
            'base' => $this->base,
            'icon' => 'icon-wpb-frame-slider extended-custom-icon',
            'category' => esc_html__('by MIKADO', 'industrialist'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'attach_images',
                    'param_name' => 'images',
                    'heading' => esc_html__('Images', 'industrialist'),
                    'description' => esc_html__('Select images from media library', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'frame',
                    'heading' => esc_html__('Frame', 'industrialist'),
                    'value' => array(
                        esc_html__('Phone', 'industrialist') => 'frame-one',
                        /*esc_html__('Laptop', 'industrialist') => 'frame-two',
                        esc_html__('Desktop', 'industrialist') => 'frame-three'*/
                    ),
                    'save_always' => true,
                ),
                array(
                    'type' => 'textarea',
                    'param_name' => 'custom_links',
                    'heading' => esc_html__('Custom Links', 'industrialist'),
                    'description' => esc_html__('Delimit links by comma', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'target',
                    'heading' => esc_html__('Custom Link Target', 'industrialist'),
                    'value' => array(
                        esc_html__('Same Window', 'industrialist') => '_self',
                        esc_html__('New Window', 'industrialist') => '_blank'
                    ),
                    'save_always' => true,
                    'dependency' => array('element' => 'custom_links', 'not_empty' => true)
                ),
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

    public function render($atts, $content = null) {
        $args = array(
            'images' => '',
            'frame' => '',
            'custom_links' => '',
            'target' => '',
            'autoplay' => '',
            'pause' => '',
            'loop' => '',
            'pagination' => '',
        );

        $html = '';

        $params = shortcode_atts($args, $atts);
        extract($params);

        $params['frame_slider_data'] = $this->getFrameSliderData($params);
        $params['images'] = $this->getGalleryImages($params);
        $params['links'] = $this->getGalleryLinks($params);
        $params['target'] = !empty($params['target']) ? $params['target'] : '_self';

        $html .= industrialist_mikado_get_shortcode_module_template_part('templates/frame-slider', 'frame-slider', '', $params);

        return $html;
    }

    /**
     * Return images for gallery
     *
     * @param $params
     * @return array
     */
    private function getGalleryImages($params) {
        $image_ids = array();
        $images = array();
        $i = 0;

        if ($params['images'] !== '') {
            $image_ids = explode(',', $params['images']);
        }

        foreach ($image_ids as $id) {

            $image['image_id'] = $id;
            $image_original = wp_get_attachment_image_src($id, 'full');
            $image['url'] = $image_original[0];
            $image['alt'] = get_post_meta($id, '_wp_attachment_image_alt', true);

            $images[$i] = $image;
            $i++;
        }

        return $images;
    }

    /**
     * Return links for gallery
     *
     * @param $params
     * @return array
     */
    private function getGalleryLinks($params) {
        $custom_links = array();

        if (!empty($params['custom_links'])) {
            $custom_links = array_map('trim', explode(',', $params['custom_links']));
        }

        return $custom_links;
    }

    /**
     * Return all configuration data for slider
     *
     * @param $params
     * @return array
     */
    private function getFrameSliderData($params) {
        $frame_slider_data = array();

        $frame_slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
        $frame_slider_data['data-pause'] = ($params['pause'] != '') ? $params['pause'] : '';
        $frame_slider_data['data-loop'] = ($params['loop'] !== '') ? $params['loop'] : '';
        $frame_slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

        return $frame_slider_data;
    }
}
