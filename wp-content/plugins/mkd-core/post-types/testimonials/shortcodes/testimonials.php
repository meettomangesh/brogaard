<?php

namespace MikadoCore\CPT\Testimonials\Shortcodes;

use MikadoCore\Lib;

/**
 * Class Testimonials
 * @package MikadoCore\CPT\Testimonials\Shortcodes
 */
class Testimonials implements Lib\ShortcodeInterface
{
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'mkd_testimonials';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Testimonials category filter
        add_filter('vc_autocomplete_mkd_testimonials_category_callback', array(&$this, 'testimonialsCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        //Testimonials category render
        add_filter('vc_autocomplete_mkd_testimonials_category_render', array(&$this, 'testimonialsCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map()
     */
    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(array(
                'name' => esc_html__('Testimonials', 'mkd-core'),
                'base' => $this->base,
                'category' => 'by MIKADO',
                'icon' => 'icon-wpb-testimonials extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Custom CSS class', 'mkd-core'),
                        'param_name' => 'custom_class',
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Layout', 'mkd-core'),
                        'param_name' => 'layout',
                        'value' => array(
                            esc_html__('Slider', 'mkd-core') => 'slider',
                            esc_html__('Carousel', 'mkd-core') => 'carousel',
                        ),
                        'save_always' => true,
                        'description' => '',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Type', 'mkd-core'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__('Flat', 'mkd-core') => 'flat-layout',
                            esc_html__('Boxed', 'mkd-core') => 'boxed-layout',
                        ),
                        'save_always' => true,
                        'description' => '',
                        'dependency' => array('element' => 'layout', 'value' => array('carousel')),
                    ),
                    array(
                        'type' => 'autocomplete',
                        'param_name' => 'category',
                        'heading' => esc_html__('Category', 'mkd-core'),
                        'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'mkd-core')
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Number', 'mkd-core'),
                        'param_name' => 'number',
                        'value' => '',
                        'description' => esc_html__('Number of Testimonials', 'mkd-core')
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Show Title', 'mkd-core'),
                        'param_name' => 'show_title',
                        'value' => array(
                            esc_html__('No', 'mkd-core') => 'no',
                            esc_html__('Yes', 'mkd-core') => 'yes',
                        ),
                        'save_always' => true,
                        'description' => '',
                        'group' => esc_html__('Content Styles', 'mkd-core'),
                        'dependency' => array('element' => 'layout', 'value' => array('carousel')),
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Show Author', 'mkd-core'),
                        'param_name' => 'show_author',
                        'value' => array(
                            esc_html__('Yes', 'mkd-core') => 'yes',
                            esc_html__('No', 'mkd-core') => 'no'
                        ),
                        'save_always' => true,
                        'group' => esc_html__('Content Styles', 'mkd-core'),
                        'description' => ''
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html('Author Name Color', 'mkd-core'),
                        'param_name' => 'author_name_color',
                        'description' => '',
                        'dependency' => array('element' => 'show_author', 'value' => array('yes')),
                        'group' => esc_html__('Content Styles', 'mkd-core'),
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Show Author Job Position', 'mkd-core'),
                        'param_name' => 'show_position',
                        'value' => array(
                            esc_html__('Yes', 'mkd-core') => 'yes',
                            esc_html__('No', 'mkd-core') => 'no',
                        ),
                        'save_always' => true,
                        'group' => esc_html__('Content Styles', 'mkd-core'),
                        'dependency' => array('element' => 'show_author', 'value' => array('yes')),
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Skin', 'mkd-core'),
                        'param_name' => 'skin',
                        'value' => array(
                            esc_html__('Default', 'mkd-core') => '',
                            esc_html__('Light', 'mkd-core') => 'light',
                            esc_html__('Dark', 'mkd-core') => 'dark',
                        ),
                        'admin_label' => true,
                        'group' => esc_html__('Content Styles', 'mkd-core'),
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Padding', 'mkd-core'),
                        'param_name' => 'padding',
                        'value' => '',
                        'group' => esc_html__('Content Styles', 'mkd-core'),
                        'description' => esc_html__('Insert padding in either px or percentage using the format: 0 10px 20px 0. (top right bottom left)', 'mkd-core'),
                        'dependency' => array('element' => 'layout', 'value' => array('slider'))
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
                        'admin_label' => true,
                        'param_name' => 'visible_items',
                        'heading' => esc_html__('Visible Items', 'mkd-core'),
                        'save_always' => true,
                        'value' => array(
                            '2' => '2',
                            '3' => '3',
                            '4' => '4'
                        ),
                        'group' => esc_html__('Content Styles', 'mkd-core'),
                        'dependency' => array('element' => 'layout', 'value' => array('carousel')),
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
                        'dependency' => array('element' => 'navigation', 'value' => array('yes')),
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
            'layout' => '',
            'type' => '',
            'number' => '-1',
            'category' => '',
            'background_color' => '',
            'show_title' => 'no',
            'show_author' => 'yes',
            'author_name_color' => '',
            'show_position' => 'yes',
            'show_navigation' => '',
            'visible_items' => '3',
            'skin' => '',
            'padding' => '',
            'autoplay' => '',
            'pause' => '',
            'loop' => '',
            'navigation' => '',
            'navigation_position' => '',
            'pagination' => '',
        );
        $params = shortcode_atts($args, $atts);


        $params['number'] = esc_attr($params['number']);
        $params['category'] = esc_attr($params['category']);
        $params['separator_params'] = $this->getSeparatorStyles($params);
        $params['rand'] = rand();
        $params['author_name_style'] = $this->getAuthorNameStyle($params);

        //Extract params for use in method
        extract($params);

        $data_attr = $this->getTestimonialsData($params);
        $query_args = $this->getQueryParams($params);
        $query_results = new \WP_Query($query_args);

        $holder_classes = $this->getTestimonialsClasses($params);
        $paramClasses = $this->getParamClasses($params);
        $typeClasses = $this->getTypeClasses($params);
        $testimonials_wrapper_styles = $this->getTestimonialsStyle($params);

        $html = '';
        $html .= '<div id="mkd-testimonials-id-' . rand() . '" class="mkd-testimonials-holder clearfix ' . $holder_classes . '">';
        $html .= '<div class="mkd-testimonials-inner">';
        $html .= '<div class="mkd-grid">';

        if ($layout == 'slider') {
            $slider_params['query_results'] = $query_results;
            $html .= mkd_core_get_shortcode_module_template_part('testimonials', 'testimonials-image-dots', '', $slider_params);
        }

        $html .= '<div class="mkd-testimonials mkd-owl-shortcode-slider ' . $paramClasses . ' ' . $typeClasses . '" ' . industrialist_mikado_get_inline_attrs($data_attr) . ' ' . industrialist_mikado_get_inline_style($testimonials_wrapper_styles) . '>';

        if ($query_results->have_posts()):
            while ($query_results->have_posts()) : $query_results->the_post();
                $author = get_post_meta(get_the_ID(), 'mkd_testimonial_author', true);
                $text = get_post_meta(get_the_ID(), 'mkd_testimonial_text', true);
                $title = get_post_meta(get_the_ID(), 'mkd_testimonial_title', true);
                $job = get_post_meta(get_the_ID(), 'mkd_testimonial_author_position', true);

                $params['author'] = $author;
                $params['text'] = $text;
                $params['title'] = $title;
                $params['job'] = $job;
                $params['current_id'] = get_the_ID();

                $html .= mkd_core_get_shortcode_module_template_part('testimonials', 'testimonials-' . $layout, '', $params);

            endwhile;
        else:
            $html .= esc_html__('Sorry, no posts matched your criteria.', 'mkd-core');
        endif;

        wp_reset_postdata();

        $html .= '</div>';

        if ($layout == 'slider') {
            $html .= '<div class="owl-external-controls-' . esc_attr($params['rand']) . '"></div>';
        }

        $html .= '</div><!-- .mkd-grid -->';
        $html .= '</div><!-- .mkd-testimonials-inner -->';
        $html .= '</div><!-- .mkd-testimonials-holder -->';

        return $html;
    }

    /*
     * Return style for author name
     */
    private function getAuthorNameStyle($params) {

        $author_name_style = array();

        if (!empty($params['author_name_color'])) {
            $author_name_style[] = 'color: ' . $params['author_name_color'];
        }

        return implode(';', $author_name_style);
    }

    /**
     * Returns array of holder classes
     *
     * @param $params
     *
     * @return array
     */
    private function getTestimonialsClasses($params) {
        $testimonias_classes = array();

        if (!empty($params['custom_class'])) {
            $testimonias_classes[] = $params['custom_class'];
        }

        if ($params['layout'] == 'carousel') {
            $testimonias_classes[] = 'mkd-' . $params['type'];

        }

        if ($params['skin'] !== '') {
            switch ($params['skin']) {
                case 'light':
                    $testimonias_classes[] = 'mkd-light';
                    break;
                case 'dark':
                    $testimonias_classes[] = 'mkd-dark';
                    break;
            }
        }

        return implode(' ', $testimonias_classes);
    }

    /**
     * Return all configuration data for slider
     *
     * @param $params
     * @return array
     */
    private function getTestimonialsData($params) {
        $testimonials_data = array();

        $testimonials_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
        $testimonials_data['data-pause'] = ($params['pause'] != '') ? $params['pause'] : '';
        $testimonials_data['data-loop'] = ($params['loop'] !== '') ? $params['loop'] : '';
        $testimonials_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
        $testimonials_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';
        $testimonials_data['data-visible-items'] = ($params['visible_items'] !== '') ? $params['visible_items'] : '';
        $testimonials_data['data-nav-container'] = ($params['layout'] == 'slider') ? 'owl-external-controls-' . $params['rand'] : '';

        return $testimonials_data;
    }

    /**
     * Generates testimonials query attribute array
     *
     * @param $params
     *
     * @return array
     */
    private function getQueryParams($params) {

        $args = array(
            'post_type' => 'testimonials',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $params['number']
        );

        if ($params['category'] != '') {
            $args['testimonials-category'] = $params['category'];
        }
        return $args;
    }

    /**
     * Generates testimonials type classes
     *
     * @param $params
     *
     * @return array
     */
    private function getTypeClasses($params) {

        $classes = array();

        if ($params['layout'] == 'slider') {
            $classes[] = 'mkd-testimonials-slider';
        } elseif ($params['layout'] == 'carousel') {
            $classes[] = 'mkd-testimonials-carousel';
        } elseif ($params['layout'] == 'classic') {
            $classes[] = 'mkd-testimonials-classic';
        }
        return implode(' ', $classes);
    }

    /**
     * Generates testimonials param classes
     *
     * @param $params
     *
     * @return array
     */
    private function getParamClasses($params) {
        $param_classes = array();

        $param_classes[] = ($params['number'] == 1) ? 'mkd-single-testimonial' : '';
        $param_classes[] = ($params['navigation_position'] == 'inside') ? 'mkd-nav-inside' : '';

        return implode(' ', $param_classes);
    }

    /**
     * Generates testimonials styles
     *
     * @param $params
     *
     * @return array
     */

    private function getTestimonialsStyle($params) {
        $style = array();

        if (!empty($params['background_color'])) {
            $style[] = 'background-color: ' . $params['background_color'];
        }

        if ($params['layout'] == 'slider') {
            if (!empty($params['padding'])) {
                $style[] = 'padding: ' . $params['padding'];
            }
        }

        return $style;
    }

    /*
     * Return args for separator shortcode
     *
     * @params $params
     * @return array
     */

    private function getSeparatorStyles($params) {
        $separator_styles = array();

        $separator_styles['position'] = 'center';
        $separator_styles['width'] = '40';
        $separator_styles['thickness'] = '2';
        $separator_styles['top_margin'] = '0';
        $separator_styles['bottom_margin'] = '24';

        return $separator_styles;
    }

    /**
     * Filter testimonials categories
     *
     * @param $query
     *
     * @return array
     */
    public function testimonialsCategoryAutocompleteSuggester($query) {
        global $wpdb;
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS testimonials_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'testimonials-category' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['testimonials_category_title']) > 0) ? esc_html__('Category', 'mkd-core') . ': ' . $value['testimonials_category_title'] : '');
                $results[] = $data;
            }
        }

        return $results;

    }

    /**
     * Find testimonials category by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function testimonialsCategoryAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get portfolio category
            $testimonials_category = get_term_by('slug', $query, 'testimonials-category');
            if (is_object($testimonials_category)) {

                $testimonials_category_slug = $testimonials_category->slug;
                $testimonials_category_title = $testimonials_category->name;

                $testimonials_category_title_display = '';
                if (!empty($testimonials_category_title)) {
                    $testimonials_category_title_display = esc_html__('Category', 'mkd-core') . ': ' . $testimonials_category_title;
                }

                $data = array();
                $data['value'] = $testimonials_category_slug;
                $data['label'] = $testimonials_category_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }
}