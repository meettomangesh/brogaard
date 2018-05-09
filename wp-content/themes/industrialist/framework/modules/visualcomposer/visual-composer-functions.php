<?php

if(!function_exists('industrialist_mikado_vc_grid_elements_enabled')) {

	/**
	 * Function that checks if Visual Composer Grid Elements are enabled
	 *
	 * @return bool
	 */
	function industrialist_mikado_vc_grid_elements_enabled() {

		return (industrialist_mikado_options()->getOptionValue('enable_grid_elements') == 'yes') ? true : false;

	}
}

if(!function_exists('industrialist_mikado_visual_composer_grid_elements')) {

	/**
	 * Removes Visual Composer Grid Elements post type if VC Grid option disabled
	 * and enables Visual Composer Grid Elements post type
	 * if VC Grid option enabled
	 */
	function industrialist_mikado_visual_composer_grid_elements() {

		if(!industrialist_mikado_vc_grid_elements_enabled()) {
			remove_action('init', 'vc_grid_item_editor_create_post_type');
		}
	}

	add_action('vc_after_init', 'industrialist_mikado_visual_composer_grid_elements', 12);
}

if(!function_exists('industrialist_mikado_grid_elements_ajax_disable')) {
	/**
	 * Function that disables ajax transitions if grid elements are enabled in theme options
	 */
	function industrialist_mikado_grid_elements_ajax_disable() {
		global $industrialist_options;

		if(industrialist_mikado_vc_grid_elements_enabled()) {
			$industrialist_options['page_transitions'] = '0';
		}
	}

	add_action('wp', 'industrialist_mikado_grid_elements_ajax_disable');
}


if(!function_exists('industrialist_mikado_get_vc_version')) {
	/**
	 * Return Visual Composer version string
	 *
	 * @return bool|string
	 */
	function industrialist_mikado_get_vc_version() {
		if(industrialist_mikado_visual_composer_installed()) {
			return WPB_VC_VERSION;
		}

		return false;
	}
}