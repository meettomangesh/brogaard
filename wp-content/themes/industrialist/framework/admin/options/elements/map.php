<?php

if ( ! function_exists('industrialist_mikado_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function industrialist_mikado_load_elements_map() {

		industrialist_mikado_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' =>esc_html__( 'Elements','industrialist'),
				'icon' => 'fa fa-header'
			)
		);

		do_action( 'industrialist_mikado_options_elements_map' );

	}

	add_action('industrialist_mikado_options_map', 'industrialist_mikado_load_elements_map', 10);

}