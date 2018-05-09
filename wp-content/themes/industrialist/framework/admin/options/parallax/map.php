<?php

if ( ! function_exists('industrialist_mikado_parallax_options_map') ) {
	/**
	 * Parallax options page
	 */
	function industrialist_mikado_parallax_options_map()
	{

		$panel_parallax = industrialist_mikado_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__('Parallax','industrialist')
			)
		);

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label'			=> esc_html__('Parallax on touch devices','industrialist'),
			'description'	=> esc_html__('Enabling this option will allow parallax on touch devices','industrialist'),
			'parent'		=> $panel_parallax
		));

		industrialist_mikado_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label'			=> esc_html__('Parallax Min Height','industrialist'),
			'description'	=>esc_html__( 'Set a minimum height for parallax images on small displays (phones, tablets, etc.)','industrialist'),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));

	}

    add_action('industrialist_mikado_options_elements_map', 'industrialist_mikado_parallax_options_map');

}