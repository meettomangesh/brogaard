<?php

namespace Industrialist\Modules\Shortcodes\BlogList;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    function __construct() {
        $this->base = 'mkd_blog_list';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Category filter
        add_filter('vc_autocomplete_mkd_blog_list_category_callback', array(&$this, 'blogListCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        //Category render
        add_filter('vc_autocomplete_mkd_blog_list_category_render', array(&$this, 'blogListCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array

    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        vc_map(array(
            'name' => esc_html__('Blog List', 'industrialist'),
            'base' => $this->base,
            'icon' => 'icon-wpb-blog-list extended-custom-icon',
            'category' => esc_html__('by MIKADO', 'industrialist'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Type', 'industrialist'),
                    'param_name' => 'type',
                    'value' => array(
                        esc_html__('Boxes', 'industrialist') => 'boxes',
                        esc_html__('Masonry', 'industrialist') => 'masonry',
                        esc_html__('Minimal', 'industrialist') => 'minimal',
                        esc_html__('Image in box', 'industrialist') => 'image_in_box'
                    ),
                    'description' => '',
                    'save_always' => true
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Number of Posts', 'industrialist'),
                    'param_name' => 'number_of_posts',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Number of Columns', 'industrialist'),
                    'param_name' => 'number_of_columns',
                    'value' => array(
                        esc_html__('One', 'industrialist') => '1',
                        esc_html__('Two', 'industrialist') => '2',
                        esc_html__('Three', 'industrialist') => '3',
                        esc_html__('Four', 'industrialist') => '4'
                    ),
                    'description' => '',
                    'save_always' => true
                ),
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Order By', 'industrialist'),
                    'param_name' => 'order_by',
                    'value' => array(
                        esc_html__('Title', 'industrialist') => 'title',
                        esc_html__('Date', 'industrialist') => 'date'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Order', 'industrialist'),
                    'param_name' => 'order',
                    'value' => array(
                        esc_html__('ASC', 'industrialist') => 'ASC',
                        esc_html__('DESC', 'industrialist') => 'DESC'
                    ),
                    'save_always' => true,
                    'description' => ''
                ),
                array(
                    'type' => 'autocomplete',
                    'heading' => esc_html__('Category Slug', 'industrialist'),
                    'param_name' => 'category',
                    'description' => esc_html__('Leave empty for all or use comma for list', 'industrialist'),
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Image Size', 'industrialist'),
                    'param_name' => 'image_size',
                    'value' => array(
                        esc_html__('Original', 'industrialist') => 'original',
                        esc_html__('Landscape', 'industrialist') => 'landscape',
                        esc_html__('Square', 'industrialist') => 'square'
                    ),
                    'description' => '',
                    'dependency' => Array('element' => 'type', 'value' => array('boxes', 'masonry', 'image_in_box')),
                    'save_always' => true
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Display separator', 'industrialist'),
                    'param_name' => 'display_separator',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no'
                    ),
                    'description' => 'Display vertical separator between blog articles.',
                    'dependency' => Array('element' => 'type', 'value' => array('masonry')),
                    'save_always' => true,
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Title Tag', 'industrialist'),
                    'param_name' => 'title_tag',
                    'value' => array(
                        '' => '',
                        'h2' => 'h2',
                        'h3' => 'h3',
                        'h4' => 'h4',
                        'h5' => 'h5',
                        'h6' => 'h6',
                    ),
                    'description' => '',
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Display Excerpt', 'industrialist'),
                    'param_name' => 'display_excerpt',
                    'value' => array(
                        'Default' => '',
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no',
                    ),
                    'description' => '',
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
                array(
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => esc_html__('Excerpt Length', 'industrialist'),
                    'param_name' => 'excerpt_length',
                    'description' => esc_html__('Number of characters', 'industrialist'),
                    'dependency' => Array('element' => 'display_excerpt', 'value' => array('yes')),
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Display Categories', 'industrialist'),
                    'param_name' => 'display_categories',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no',
                    ),
                    'description' => '',
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Display Date', 'industrialist'),
                    'param_name' => 'display_date',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no',
                    ),
                    'description' => '',
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Display Share', 'industrialist'),
                    'param_name' => 'display_share',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no',
                    ),
                    'description' => '',
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
                array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Display Read More', 'industrialist'),
                    'param_name' => 'display_read_more',
                    'value' => array(
                        esc_html__('Default', 'industrialist') => '',
                        esc_html__('Yes', 'industrialist') => 'yes',
                        esc_html__('No', 'industrialist') => 'no',
                    ),
                    'description' => 'Display read more button',
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
                array(
                    'type' => 'colorpicker',
                    'class' => '',
                    'heading' => esc_html__('Background Color', 'industrialist'),
                    'param_name' => 'background_color',
                    'value' => '',
                    'description' => '',
                    'dependency' => Array('element' => 'type', 'value' => array('boxes')),
                    'group' => esc_html__('Content Layout', 'industrialist'),
                ),
            )
        ));
    }

    public function render($atts, $content = null) {

        $default_atts = array(
            'type' => 'boxes',
            'number_of_posts' => '',
            'number_of_columns' => '3',
            'image_size' => '',
            'order_by' => '',
            'order' => '',
            'category' => '',
            'display_separator' => '',
            'title_tag' => 'h4',
            'display_excerpt' => 'yes',
            'excerpt_length' => '90',
            'display_categories' => 'yes',
            'display_date' => 'yes',
            'display_share' => 'yes',
            'display_read_more' => 'yes',
            'background_color' => '',
        );

        $params = shortcode_atts($default_atts, $atts);
        extract($params);
        $params['holder_classes'] = $this->getBlogHolderClasses($params);

        $queryArray = $this->generateBlogQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;

        $thumbImageSize = $this->generateImageSize($params);
        $params['thumb_image_size'] = $thumbImageSize;
        $params['text_holder_styles'] = $this->getTextHolderStyles($params);

        $html = '';
        $html .= industrialist_mikado_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
        return $html;

    }

    /*
     * generates text holder styles
     *
     * @param $params, array
     *
     * @return string
     */
    private function getTextHolderStyles($params) {
        $text_holder_styles = array();

        if (!empty($params['background_color'])) {
            $text_holder_styles[] = 'background-color:' . $params['background_color'];
        }

        return implode(';', $text_holder_styles);

        return $text_holder_styles;
    }

    /**
     * Generates holder classes
     *
     * @param $params
     *
     * @return string
     */
    private function getBlogHolderClasses($params) {
        $holderClasses = '';

        $columnNumber = $this->getColumnNumberClass($params);

        $display_separator = '';

        if (!empty($params['type'])) {
            switch ($params['type']) {
                case 'image_in_box':
                    $holderClasses = 'mkd-image-in-box';
                    break;
                case 'boxes' :
                    $holderClasses = 'mkd-boxes';
                    break;
                case 'masonry' :
                    $holderClasses = 'mkd-masonry';
                    $display_separator = ($params['display_separator'] == 'yes') ? 'mkd-with-separator' : '';
                    break;
                case 'minimal' :
                    $holderClasses = 'mkd-minimal';
                    break;
                default:
                    $holderClasses = 'mkd-boxes';
            }
        }

        $holderClasses .= ' ' . $display_separator;
        $holderClasses .= ' ' . $columnNumber;

        return $holderClasses;

    }

    /**
     * Generates column classes for boxes type
     *
     * @param $params
     *
     * @return string
     */
    private function getColumnNumberClass($params) {

        $columnsNumber = '';
        $columns = $params['number_of_columns'];

        switch ($columns) {
            case 1:
                $columnsNumber = 'mkd-column-1';
                break;
            case 2:
                $columnsNumber = 'mkd-column-2';
                break;
            case 3:
                $columnsNumber = 'mkd-column-3';
                break;
            case 4:
                $columnsNumber = 'mkd-column-4';
                break;
            default:
                $columnsNumber = 'mkd-column-1';
                break;
        }
        return $columnsNumber;
    }

    /**
     * Generates query array
     *
     * @param $params
     *
     * @return array
     */
    public function generateBlogQueryArray($params) {

        $queryArray = array(
            'orderby' => $params['order_by'],
            'order' => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'category_name' => $params['category']
        );
        return $queryArray;
    }

    /**
     * Generates image size option
     *
     * @param $params
     *
     * @return string
     */
    private function generateImageSize($params) {
        $thumbImageSize = '';
        $imageSize = $params['image_size'];

        if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'industrialist_mikado_landscape';
        } else if ($imageSize === 'square') {
            $thumbImageSize .= 'industrialist_mikado_square';
        } else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
        return $thumbImageSize;
    }

    /**
     * Filter categories
     *
     * @param $query
     *
     * @return array
     */
    public function blogListCategoryAutocompleteSuggester($query) {
        global $wpdb;
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['category_title']) > 0) ? esc_html__('Category', 'industrialist') . ': ' . $value['category_title'] : '');
                $results[] = $data;
            }
        }

        return $results;
    }

    /**
     * Find categories by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function blogListCategoryAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get category
            $category = get_term_by('slug', $query, 'category');
            if (is_object($category)) {

                $category_slug = $category->slug;
                $category_title = $category->name;

                $category_title_display = '';
                if (!empty($category_title)) {
                    $category_title_display = esc_html__('Category', 'industrialist') . ': ' . $category_title;
                }

                $data = array();
                $data['value'] = $category_slug;
                $data['label'] = $category_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }
}
