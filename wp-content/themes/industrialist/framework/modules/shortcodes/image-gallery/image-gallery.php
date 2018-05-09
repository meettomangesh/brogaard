<?php
namespace Industrialist\Modules\Shortcodes\ImageGallery;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface
{

    private $base;

    /**
     * Image Gallery constructor.
     */
    public function __construct() {
        $this->base = 'mkd_image_gallery';

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
            'name' => esc_html__('Image Gallery', 'industrialist'),
            'base' => $this->getBase(),
            'category' => esc_html__('by MIKADO', 'industrialist'),
            'icon' => 'icon-wpb-image-gallery extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'attach_images',
                    'heading' => esc_html__('Images', 'industrialist'),
                    'param_name' => 'images',
                    'description' => esc_html__('Select images from media library', 'industrialist')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image Size', 'industrialist'),
                    'param_name' => 'image_size',
                    'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'industrialist')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Gallery Type', 'industrialist'),
                    'admin_label' => true,
                    'param_name' => 'type',
                    'value' => array(
                        esc_html__('Slider', 'industrialist') => 'slider',
                        esc_html__('Image Grid', 'industrialist') => 'image_grid'
                    ),
                    'description' => esc_html__('Select gallery type', 'industrialist'),
                    'save_always' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Column Number', 'industrialist'),
                    'param_name' => 'column_number',
                    'value' => array(2, 3, 4, 5),
                    'save_always' => true,
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array(
                            'image_grid'
                        )
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Open PrettyPhoto on click', 'industrialist'),
                    'param_name' => 'pretty_photo',
                    'value' => array(
                        esc_html__('No', 'industrialist') => 'no',
                        esc_html__('Yes', 'industrialist') => 'yes'
                    ),
                    'save_always' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Grayscale Images', 'industrialist'),
                    'param_name' => 'grayscale',
                    'value' => array(
                        esc_html__('No', 'industrialist') => 'no',
                        esc_html__('Yes', 'industrialist') => 'yes'
                    ),
                    'save_always' => true,
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array(
                            'image_grid'
                        )
                    )
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
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array(
                            'slider'
                        )
                    ),
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
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array(
                            'slider'
                        )
                    ),
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
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array(
                            'slider'
                        )
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
                    'dependency' => array(
                        'element' => 'type',
                        'value' => array(
                            'slider'
                        )
                    ),
                    'group' => esc_html__('Slider', 'industrialist'),
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
            'images' => '',
            'image_size' => 'thumbnail',
            'type' => 'slider',
            'pretty_photo' => '',
            'column_number' => '',
            'grayscale' => '',
            'autoplay' => '',
            'pause' => '',
            'loop' => '',
            'navigation' => '',
            'navigation_position' => '',
            'pagination' => '',
        );

        $params = shortcode_atts($args, $atts);
        $params['gallery_slider_data'] = $this->getGallerySliderData($params);
        $params['image_size'] = $this->getImageSize($params['image_size']);
        $params['images'] = $this->getGalleryImages($params);
        $params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
        $params['columns'] = 'mkd-gallery-columns-' . $params['column_number'];
        $params['gallery_classes'] = $this->getGalleryClasses($params);

        if ($params['type'] == 'image_grid') {
            $template = 'gallery-grid';
        } elseif ($params['type'] == 'slider') {
            $template = 'gallery-slider';
        }

        $html = industrialist_mikado_get_shortcode_module_template_part('templates/' . $template, 'image-gallery', '', $params);

        return $html;

    }

    private function getGalleryClasses($params) {
        $gallery_classes = array();

        $gallery_classes[] = ($params['grayscale'] == 'yes') ? 'mkd-grayscale' : '';
        $gallery_classes[] = ($params['navigation_position'] == 'inside') ? 'mkd-nav-inside' : '';

        return implode(' ', $gallery_classes);
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
            $image['title'] = get_the_title($id);

            $images[$i] = $image;
            $i++;
        }

        return $images;

    }

    /**
     * Return image size or custom image size array
     *
     * @param $image_size
     * @return array
     */
    private function getImageSize($image_size) {

        $image_size = trim($image_size);
        //Find digits
        preg_match_all('/\d+/', $image_size, $matches);
        if (in_array($image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
            return $image_size;
        } elseif (!empty($matches[0])) {
            return array(
                $matches[0][0],
                $matches[0][1]
            );
        } else {
            return 'thumbnail';
        }
    }

    /**
     * Return all configuration data for slider
     *
     * @param $params
     * @return array
     */
    private function getGallerySliderData($params) {
        $gallery_slider_data = array();

        $gallery_slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
        $gallery_slider_data['data-pause'] = ($params['pause'] != '') ? $params['pause'] : '';
        $gallery_slider_data['data-loop'] = ($params['loop'] !== '') ? $params['loop'] : '';
        $gallery_slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
        $gallery_slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

        return $gallery_slider_data;
    }
}