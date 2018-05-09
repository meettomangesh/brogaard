<?php

if ( ! function_exists('industrialist_mikado_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function industrialist_mikado_reset_options_map() {

		industrialist_mikado_add_admin_page(
			array(

				'slug'  => '_reset_page',
				'title' => esc_html__('Reset','industrialist'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = industrialist_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' =>esc_html__( 'Reset','industrialist')
			)
		);

		industrialist_mikado_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=>esc_html__( 'Reset to Defaults','industrialist'),
			'description'	=> esc_html__('This option will reset all Select Options values to defaults','industrialist'),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'industrialist_mikado_options_map', 'industrialist_mikado_reset_options_map', 100 );

}