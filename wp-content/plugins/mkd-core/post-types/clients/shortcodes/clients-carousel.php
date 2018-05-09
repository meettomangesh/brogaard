<?php
namespace MikadoCore\CPT\Clients\Shortcodes;

use MikadoCore\Lib;


/**
 * Class ClientsCarousel
 * @package MikadoCore\CPT\Carousels\Shortcodes
 */
class ClientsCarousel implements Lib\ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_clients_carousel';

        add_action('vc_before_init', array($this, 'vcMap'));

        // clients category filter
        add_filter('vc_autocomplete_mkd_clients_carousel_category_callback', array(&$this, 'clientsCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        // clients category render
        add_filter('vc_autocomplete_mkd_clients_carousel_category_render', array(&$this, 'clientsCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array

        // clients selected clients filter
        add_filter('vc_autocomplete_mkd_clients_carousel_selected_clients_callback', array(&$this, 'clientsIdAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        // clients selected clients render
        add_filter('vc_autocomplete_mkd_clients_carousel_selected_clients_render', array(&$this, 'clientsIdAutocompleteRender',), 10, 1); // Render exact client. Must return an array (label,value)
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
     */
    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Clients Carousel', 'mkd-core'),
            'base' => $this->base,
            'category' => 'by MIKADO',
            'icon' => 'icon-wpb-clients-carousel extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(

                array(
                    'type' => 'autocomplete',
                    'param_name' => 'category',
                    'heading' => esc_html__('One-Category Clients Carousel', 'mkd-core'),
                    'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'mkd-core')
                ),
                array(
                    'type' => 'autocomplete',
                    'param_name' => 'selected_clients',
                    'heading' => esc_html__('Show Only Clients with Listed IDs', 'mkd-core'),
                    'settings' => array(
                        'multiple' => true,
                        'sortable' => true,
                        'unique_values' => true
                    ),
                    'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)', 'mkd-core')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order By', 'mkd-core'),
                    'param_name' => 'order_by',
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
                    'heading' => esc_html__('Image Animation', 'mkd-core'),
                    'param_name' => 'image_animation',
                    'value' => array(
                        esc_html__('Image Change', 'mkd-core') => 'image-change',
                        esc_html__('Image Zoom', 'mkd-core') => 'image-zoom',
                        esc_html__('Image Flip', 'mkd-core') => 'image-flip'
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                    'description' => esc_html__('Note: Only on "Image Change" and "Image Flip" hover image will be used', 'mkd-core')
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
                    'description' => '',
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Slide duration', 'mkd-core'),
                    'admin_label' => true,
                    'param_name' => 'autoplay',
                    'value' => array(
                        esc_html__('3', 'mkd-core') => '3',
                        esc_html__('5', 'mkd-core') => '5',
                        esc_html__('10', 'mkd-core') => '10',
                        esc_html__('Disable', 'mkd-core') => 'disable'
                    ),
                    'save_always' => true,
                    'description' => esc_html__('Auto rotate slides each X seconds', 'mkd-core'),
                    'group' => esc_html__('Slider', 'mkd-core'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Pause on hover', 'mkd-core'),
                    'param_name' => 'pause',
                    'value' => array(
                        esc_html__('Yes', 'mkd-core') => 'yes',
                        esc_html__('No', 'mkd-core') => 'no'
                    ),
                    'save_always' => true,
                    'dependency' => array(
                        'element' => 'autoplay',
                        'value' => array(
                            '3', '5', '10'
                        )
                    ),
                    'group' => esc_html__('Slider', 'mkd-core'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Loop', 'mkd-core'),
                    'param_name' => 'loop',
                    'value' => array(
                        esc_html__('Yes', 'mkd-core') => 'yes',
                        esc_html__('No', 'mkd-core') => 'no'
                    ),
                    'save_always' => true,
                    'group' => esc_html__('Slider', 'mkd-core'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show Navigation Arrows', 'mkd-core'),
                    'param_name' => 'navigation',
                    'value' => array(
                        esc_html__('Yes', 'mkd-core') => 'yes',
                        esc_html__('No', 'mkd-core') => 'no'
                    ),
                    'save_always' => true,
                    'group' => esc_html__('Slider', 'mkd-core'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Navigation Position', 'mkd-core'),
                    'param_name' => 'navigation_position',
                    'value' => array(
                        esc_html__('Inside', 'mkd-core') => 'inside',
                        esc_html__('Outside', 'mkd-core') => 'outside'
                    ),
                    'std' => 'inside',
                    'save_always' => true,
                    'dependency' => array(
                        'element' => 'navigation',
                        'value' => array(
                            'yes'
                        )
                    ),
                    'group' => esc_html__('Slider', 'mkd-core'),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show Pagination', 'mkd-core'),
                    'param_name' => 'pagination',
                    'value' => array(
                        esc_html__('Yes', 'mkd-core') => 'yes',
                        esc_html__('No', 'mkd-core') => 'no'
                    ),
                    'save_always' => true,
                    'group' => esc_html__('Slider', 'mkd-core'),
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
            'category' => '',
            'selected_clients' => '',
            'order_by' => 'date',
            'order' => 'ASC',
            'number_of_items' => '5',
            'image_animation' => 'image-change',
            'autoplay' => '',
            'pause' => '',
            'loop' => '',
            'navigation' => '',
            'navigation_position' => '',
            'pagination' => '',
        );

        $params = shortcode_atts($args, $atts);
        $params['carousel_data_attributes'] = $this->getCarouselDataAttributes($params);

        extract($params);

        $query_array = $this->getQueryArray($params);

        $query_results = new \WP_Query($query_array);

        $html = '';

        $html .= '<div class="mkd-clients-carousel-holder clearfix">';
        $html .= '<div class="mkd-clients-carousel  mkd-owl-shortcode-slider" ' . industrialist_mikado_get_inline_attrs($carousel_data_attributes) . '>';

        if ($query_results->have_posts()) {
            while ($query_results->have_posts()) {
                $query_results->the_post();
                $carousel_item = $this->getCarouselItemData(get_the_ID(), $params);
                $html .= mkd_core_get_shortcode_module_template_part('clients', 'clients-carousel', '', $carousel_item);
            }
        }

        wp_reset_postdata();


        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * Generates client list query attribute array
     *
     * @param $params
     *
     * @return array
     */
    public function getQueryArray($params) {

        $query_array = array(
            'post_status' => 'publish',
            'post_type' => 'clients',
            'posts_per_page' => '-1',
            'orderby' => $params['order_by'],
            'order' => $params['order'],
        );

        if (!empty($params['category'])) {
            $query_array['clients-category'] = $params['category'];
        }

        $client_ids = null;
        if (!empty($params['selected_clients'])) {
            $client_ids = explode(',', $params['selected_clients']);
            $query_array['post__in'] = $client_ids;
        }

        return $query_array;
    }

    /**
     * Return all data that carousel needs, images, titles, links, etc
     *
     * @param $params
     * @return array
     */
    private function getCarouselItemData($item_id, $params) {

        $carousel_item = array();

        if (($meta_temp = get_post_meta($item_id, 'mkd_client_image', true)) !== '') {
            $carousel_item['image'] = $meta_temp;
        } else {
            $carousel_item['image'] = '';
        }

        if ($params['image_animation'] == 'image-change' && ($meta_temp = get_post_meta($item_id, 'mkd_client_hover_image', true)) !== '' ) {
            $carousel_item['hover_image'] = $meta_temp;
            $carousel_item['hover_class'] = 'mkd-has-hover-image';
        } else if ($params['image_animation'] == 'image-flip' && ($meta_temp = get_post_meta($item_id, 'mkd_client_hover_image', true)) !== '' ) {
            $carousel_item['hover_image'] = $meta_temp;
            $carousel_item['hover_class'] = 'mkd-has-hover-image';
        } else {
            $carousel_item['hover_image'] = '';
            $carousel_item['hover_class'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'mkd_client_item_link', true)) != '') {
            $carousel_item['link'] = $meta_temp;
        } else {
            $carousel_item['link'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'mkd_client_item_target', true)) != '') {
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

        $carousel_data['data-items'] = ($params['number_of_items'] != '') ? $params['number_of_items'] : '';
        $carousel_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
        $carousel_data['data-pause'] = ($params['pause'] != '') ? $params['pause'] : '';
        $carousel_data['data-loop'] = ($params['loop'] !== '') ? $params['loop'] : '';
        $carousel_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
        $carousel_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

        return $carousel_data;
    }

    /*
     *
     */
    public function clientsCategoryAutocompleteSuggester($query) {
        global $wpdb;
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS clients_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'clients-category' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {

                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['clients_category_title']) > 0) ? esc_html__('Category', 'mkd-core') . ': ' . $value['clients_category_title'] : '');
                $results[] = $data;
            }
        }
        return $results;
    }

    /*
     *
     */
    public function clientsCategoryAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get clients category
            $clients_category = get_term_by('slug', $query, 'clients-category');
            if (is_object($clients_category)) {

                $clients_category_slug = $clients_category->slug;
                $clients_category_title = $clients_category->name;

                $clients_category_title_display = '';
                if (!empty($clients_category_title)) {
                    $clients_category_title_display = esc_html__('Category', 'mkd-core') . ': ' . $clients_category_title;
                }

                $data = array();
                $data['value'] = $clients_category_slug;
                $data['label'] = $clients_category_title_display;

                return !empty($data) ? $data : false;
            }
            return false;
        }
        return false;
    }

    /*
     *
     */
    public function clientsIdAutocompleteSuggester($query) {
        global $wpdb;
        $client_id = (int)$query;
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts}
					WHERE post_type = 'clients' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $client_id > 0 ? $client_id : -1, stripslashes($query), stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['id'];
                $data['label'] = esc_html__('Id', 'mkd-core') . ': ' . $value['id'] . ((strlen($value['title']) > 0) ? ' - ' . esc_html__('Title', 'mkd-core') . ': ' . $value['title'] : '');
                $results[] = $data;
            }
        }

        return $results;
    }

    /*
     *
     */
    public function clientsIdAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get client
            $client = get_post((int)$query);
            if (!is_wp_error($client)) {

                $client_id = $client->ID;
                $client_title = $client->post_title;

                $client_title_display = '';
                if (!empty($client_title)) {
                    $client_title_display = ' - ' . esc_html__('Title', 'mkd-core') . ': ' . $client_title;
                }

                $client_id_display = esc_html__('Id', 'mkd-core') . ': ' . $client_id;

                $data = array();
                $data['value'] = $client_id;
                $data['label'] = $client_id_display . $client_title_display;

                return !empty($data) ? $data : false;
            }
            return false;
        }
        return false;
    }
}