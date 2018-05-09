<?php
namespace MikadoCore\CPT\Clients\Shortcodes;

use MikadoCore\Lib;


/**
 * Class ClientsTable
 * @package MikadoCore\CPT\Carousels\Shortcodes
 */
class ClientsTable implements Lib\ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_clients_table';

        add_action('vc_before_init', array($this, 'vcMap'));

        // clients category filter
        add_filter('vc_autocomplete_mkd_clients_table_categories_callback', array(&$this, 'clientsCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        // clients category render
        add_filter('vc_autocomplete_mkd_clients_table_categories_render', array(&$this, 'clientsCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array
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
            'name' => esc_html__('Clients Table', 'mkd-core'),
            'base' => $this->base,
            'category' => 'by MIKADO',
            'icon' => 'icon-wpb-clients-table extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params' => array(

                array(
                    'type' => 'autocomplete',
                    'param_name' => 'categories',
                    'heading' => esc_html__('Category', 'mkd-core'),
                    'settings' => array(
                        'multiple' => true,
                        'sortable' => true,
                        'unique_values' => true
                    ),
                    'description' => ''
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
                        esc_html__('Image Zoom', 'mkd-core') => 'image-zoom'
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                    'description' => esc_html__('Note: Only on "Image Change" hover image will be used', 'mkd-core')
                ),
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
            'categories' => '',
            'order_by' => 'date',
            'order' => 'ASC',
            'image_animation' => 'image-change',
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $categories = explode(',', $params['categories']);

        $html = '';
        if (count($categories) >= 1 && $categories[0] !== '') {
            $html .= '<div class="mkd-clients-table-holder column-' . count($categories) . ' clearfix">';

            foreach ($categories as $category) {

                $params['category'] = $category;

                $query_array_item = $this->getQueryArray($params);
                $query_results = new \WP_Query($query_array_item);

                $taxonomy = get_term_by('slug', $category, 'clients-category');

                $html .= '<div class="mkd-clients-table-column">';
                $html .= '<div class="mkd-clients-table-heading">';
                $html .= '<h6>' . $taxonomy->name . '</h6>';
                $html .= '</div>';

                if ($query_results->have_posts()) {
                    while ($query_results->have_posts()) {
                        $query_results->the_post();
                        $table_item = $this->getTableItemData(get_the_ID(), $params);
                        $html .= mkd_core_get_shortcode_module_template_part('clients', 'clients-table', '', $table_item);
                    }
                }

                wp_reset_postdata();

                $html .= '</div>';
            }

            $html .= '<div class="mkd-border"></div>';
            $html .= '</div>';

        }

        return $html;
    }

    /**
     * Generates clients list query attribute array
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
            'tax_query' => array(
                array(
                    'taxonomy' => 'clients-category',
                    'field' => 'slug',
                    'terms' => explode(',', $params['category']),
                ),
            ),
        );

        return $query_array;
    }

    /**
     * Return all data that table needs, images, titles, links, etc
     *
     * @param $params
     * @return array
     */
    private function getTableItemData($item_id, $params) {

        $table_item = array();

        $table_item['taxonomy'] = get_the_terms($item_id, 'clients-category');

        if (($meta_temp = get_post_meta($item_id, 'mkd_client_image', true)) !== '') {
            $table_item['image'] = $meta_temp;
        } else {
            $table_item['image'] = '';
        }

        if ($params['image_animation'] == 'image-change' && ($meta_temp = get_post_meta($item_id, 'mkd_client_hover_image', true)) !== '') {
            $table_item['hover_image'] = $meta_temp;
            $table_item['hover_class'] = 'mkd-has-hover-image';
        } else {
            $table_item['hover_image'] = '';
            $table_item['hover_class'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'mkd_client_item_link', true)) != '') {
            $table_item['link'] = $meta_temp;
        } else {
            $table_item['link'] = '';
        }

        if (($meta_temp = get_post_meta($item_id, 'mkd_client_item_target', true)) != '') {
            $table_item['target'] = $meta_temp;
        } else {
            $table_item['target'] = '_self';
        }

        $table_item['title'] = get_the_title();

        return $table_item;
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
}