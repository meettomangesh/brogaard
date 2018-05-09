<?php

add_action('after_setup_theme', 'industrialist_mikado_meta_boxes_map_init', 1);
function industrialist_mikado_meta_boxes_map_init() {
    /**
    * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
    * and loads map.php file in each.
    *
    * @see http://php.net/manual/en/function.glob.php
    */

    do_action('industrialist_mikado_before_meta_boxes_map');

	global $industrialist_options;
	global $industrialist_Framework;
	global $industrialist_options_fontstyle;
	global $industrialist_options_fontweight;
	global $industrialist_options_texttransform;
	global $industrialist_options_fontdecoration;
	global $industrialist_options_arrows_type;

    foreach(glob(MIKADO_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
        include_once $meta_box_load;
    }

	do_action('industrialist_mikado_meta_boxes_map');

	do_action('industrialist_mikado_after_meta_boxes_map');
}