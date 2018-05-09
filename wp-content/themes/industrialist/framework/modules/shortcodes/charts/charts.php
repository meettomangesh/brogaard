<?php
namespace Industrialist\Modules\Shortcodes\Charts;

use Industrialist\Modules\Shortcodes\Lib\ShortcodeInterface;

class Charts implements ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'mkd_charts';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {

        $no_of_datasets = 3;
        $no_of_points = 12;

        /*
         * points tab begin
         */

        // first point group w/o dependency
        $points_array[] = array(
            'type' => 'dropdown',
            'class' => '',
            'heading' => esc_html__('Use Point Group 1', 'industrialist'),
            'param_name' => 'points_1',
            'value' => array(
                esc_html__('Yes', 'industrialist') => 'yes',
                esc_html__('No', 'industrialist') => 'no',
            ),
            'save_always' => true,
            'description' => '',
            'group' => esc_html__('Points', 'industrialist'),
        );

        $points_array[] = array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Point 1 Color', 'industrialist'),
            'param_name' => 'point_1_color',
            'value' => '',
            'group' => esc_html__('Points', 'industrialist'),
        );

        $points_array[] = array(
            'type' => 'textfield',
            'heading' => esc_html__('Point 1 Label', 'industrialist'),
            'param_name' => 'point_1_label',
            'value' => '',
            'group' => esc_html__('Points', 'industrialist'),
        );

        // from second to twelfth w/ dependency
        for ($i = 2; $i <= $no_of_points; $i++) {
            $points_array[] = array(
                'type' => 'dropdown',
                'class' => '',
                'heading' => esc_html__('Use Point Group ', 'industrialist') . $i,
                'param_name' => 'points_' . $i,
                'value' => array(
                    esc_html__('No', 'industrialist') => 'no',
                    esc_html__('Yes', 'industrialist') => 'yes',
                ),
                'save_always' => true,
                'description' => '',
                'group' => esc_html__('Points', 'industrialist'),
                'dependency' => array('element' => 'points_' . ($i - 1), 'value' => 'yes')
            );

            $points_array[] = array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Point ', 'industrialist') . $i . esc_html__(' Color', 'industrialist'),
                'param_name' => 'point_' . $i . '_color',
                'value' => '',
                'group' => esc_html__('Points', 'industrialist'),
                'dependency' => array('element' => 'points_' . $i, 'value' => 'yes')
            );

            $points_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Point ', 'industrialist') . $i . esc_html__(' Label', 'industrialist'),
                'param_name' => 'point_' . $i . '_label',
                'value' => '',
                'group' => esc_html__('Points', 'industrialist'),
                'dependency' => array('element' => 'points_' . $i, 'value' => 'yes')
            );
        }

        /*
         * points tab end
         */

        /*
         * dataset tabs begin
         */

        for ($i = 1; $i <= $no_of_datasets; $i++) { // no of datasets

            $dataset_array[] = array(
                'type' => 'textfield',
                'heading' => esc_html__('Dataset ', 'industrialist') . $i . esc_html__(' Label', 'industrialist'),
                'param_name' => 'dataset_' . $i . '_label',
                'value' => '',
                'group' => esc_html__('Dataset ', 'industrialist') . $i,
            );

            $dataset_array[] = array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Dataset ', 'industrialist') . $i . esc_html__(' Color', 'industrialist'),
                'param_name' => 'dataset_' . $i . '_color',
                'value' => '',
                'group' => esc_html__('Dataset ', 'industrialist') . $i,
                'dependency' => array('element' => 'color_scheme', 'value' => 'dataset')
            );

            for ($j = 1; $j <= $no_of_points; $j++) { // no of points in dataset
                $dataset_array[] = array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Point ', 'industrialist') . $j . esc_html__(' Value', 'industrialist'),
                    'param_name' => 'point_' . $i . '_' . $j,
                    'value' => '',
                    'group' => esc_html__('Dataset ', 'industrialist') . $i,
                    'dependency' => array('element' => 'points_' . $j, 'value' => 'yes')
                );
            }
        }

        /*
         * dataset tabs end
         */

        vc_map(array(
            'name' => esc_html__('Charts', 'industrialist'),
            'base' => $this->base,
            'icon' => 'icon-wpb-charts extended-custom-icon',
            'category' => esc_html__('by MIKADO','industrialist'),
            'allowed_container_element' => 'vc_row',
            'params' => array_merge(
                array(
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Type', 'industrialist'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__('Line', 'industrialist') => 'line',
                            esc_html__('Vertical Bars', 'industrialist') => 'bar',
                            esc_html__('Horizontal Bars', 'industrialist') => 'horizontalBar',
                            esc_html__('Radar', 'industrialist') => 'radar',
                            esc_html__('Polar', 'industrialist') => 'polarArea',
                            esc_html__('Pie', 'industrialist') => 'pie',
                            esc_html__('Doughnut', 'industrialist') => 'doughnut',
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),

                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Legend Position', 'industrialist'),
                        'std' => 'right',
                        'param_name' => 'legend_position',
                        'value' => array(
                            esc_html__('Top', 'industrialist') => 'top',
                            esc_html__('Right', 'industrialist') => 'right',
                            esc_html__('Bottom', 'industrialist') => 'bottom',
                            esc_html__('Left', 'industrialist') => 'left',
                        ),
                        'save_always' => true,
                        'description' => ''
                    ),

                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Color Scheme', 'industrialist'),
                        'param_name' => 'color_scheme',
                        'value' => array(
                            esc_html__('One Color per Dataset', 'industrialist') => 'dataset',
                            esc_html__('One Color per Point Group', 'industrialist') => 'point',
                        ),
                        'save_always' => true,
                    ),
                ),
                $points_array,
                $dataset_array
            )
        ));
    }

    public function render($atts, $content = null) {
        $args = array(
            'type' => '',
            'color_scheme' => '',
            'legend_position' => '',
        );

        $no_of_datasets = 3;
        $no_of_points = 12;

        $point_fields = array();
        $dataset_fields = array();

        for ($i = 1; $i <= $no_of_points; $i++) {
            $point_fields['point_' . $i . '_color'] = '';
            $point_fields['point_' . $i . '_label'] = '';
        }

        for ($i = 1; $i <= $no_of_datasets; $i++) {
            $dataset_fields['dataset_' . $i . '_color'] = '';
            $dataset_fields['dataset_' . $i . '_label'] = '';

            for ($j = 1; $j <= $no_of_points; $j++) {
                $dataset_fields['point_' . $i . '_' . $j] = '';
            }
        }

        $args = array_merge($args, $point_fields, $dataset_fields);
        $params = shortcode_atts($args, $atts);

        // extract params for use in method
        extract($params);

        for ($i = 1; $i <= $no_of_datasets; $i++) {
            $params['dataset_' . $i . '_values'] = $this->getDatasetValues($params, $i, $no_of_points);
        }
        $params['no_of_used_datasets'] = $this->getNoOfUsedDatasets($params, $no_of_datasets);
        $params['point_group_labels'] = $this->getPointGroupLabels($params, $no_of_points);
        $params['point_group_colors'] = $this->getPointGroupColors($params, $no_of_points);

        //var_dump($params);

        $html = '';
        $html .= '<div class="mkd-charts" ';

        // inline data begin
        $html .= ' '. $this->getDataAttribute('type', $params['type']);
        $html .= ' '. $this->getDataAttribute('no_of_used_datasets', $params['no_of_used_datasets']);
        for ($i = 1; $i <= $params['no_of_used_datasets']; $i++) {
            $html .= ' '.$this->getDataAttribute('dataset_' . $i, $params['dataset_' . $i . '_values']);
        }
        $html .= ' '. $this->getDataAttribute('point_group_labels', $params['point_group_labels']);
        $html .= ' '. $this->getDataAttribute('point_group_colors', $params['point_group_colors']);
        for ($i = 1; $i <= $params['no_of_used_datasets']; $i++) {
            $html .= ' '. $this->getDataAttribute('dataset_' . $i . '_label', $params['dataset_' . $i . '_label']);
            $html .= ' '. $this->getDataAttribute('dataset_' . $i . '_color', $params['dataset_' . $i . '_color']);
        }
        $html .= ' '.$this->getDataAttribute('color_scheme', $params['color_scheme']);
        $html .= ' '.$this->getDataAttribute('legend_position', $params['legend_position']);

        // inline data end

        $html .= '>';
        $html .= industrialist_mikado_get_shortcode_module_template_part('templates/charts', 'charts', '', $params);
        $html .= '</div>';
        return $html;
    }

    /*
     * convert dataset values from shortcode into usable string
     *
     * @params $params - mixed, shortcode params
     * @params $dataset - integer, current dataset, since function is being called from loop
     * @params $no_of_points - integer, total number of points
     *
     * @return string
     */
    private function getDatasetValues($params, $dataset, $no_of_points) {
        $dataset_values = array();

        for ($i = 1; $i <= $no_of_points; $i++) {

            if ($params['point_' . $dataset . '_' . $i] != '')
                $dataset_values[] = $params['point_' . $dataset . '_' . $i];
        }

        $dataset_values = implode(',', $dataset_values);

        return $dataset_values;
    }

    /*
     * create data attribute for inline print in html
     *
     * @params $title - string, name of the data attribute
     * @params $raw_attribute - string, value of the data attribute
     *
     * @return string
     */
    private function getDataAttribute($title, $raw_attribute) {

        $data_attribute = 'data-' . $title . '="' . $raw_attribute . '"';

        //var_dump($data_attribute);

        return $data_attribute;
    }

    /*
     * determine how many datasets are being used in shortcode
     *
     * @params $params - mixed, shortcode params
     * @params $no_of_datasets - integer, total number of datasets available in shortcode interface
     *
     * @return integer
     */
    private function getNoOfUsedDatasets($params, $no_of_datasets) {

        for ($i = $no_of_datasets; $i >= 1; $i--) {
            if ($params['dataset_' . $i . '_values'] != '') {
                return $i;
            }
        }
    }

    /*
     *
     */
    private function getPointGroupLabels($params, $no_of_labels) {
        $point_group_labels = array();

        for ($i = 1; $i <= $no_of_labels; $i++) {

            if ($params['point_' . $i . '_label'] != '')
                $point_group_labels[] = $params['point_' . $i . '_label'];
        }

        $point_group_labels = implode(',', $point_group_labels);

        return $point_group_labels;
    }

    /*
     *
     */
    private function getPointGroupColors($params, $no_of_labels) {
        $point_group_colors = array();

        for ($i = 1; $i <= $no_of_labels; $i++) {

            if ($params['point_' . $i . '_color'] != '')
                $point_group_colors[] = $params['point_' . $i . '_color'];
        }

        $point_group_colors = implode(',', $point_group_colors);

        return $point_group_colors;
    }
}