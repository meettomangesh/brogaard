<?php

if ( ! function_exists('industrialist_mikado_logo_options_map') ) {

	function industrialist_mikado_logo_options_map() {

		$panel_logo = industrialist_mikado_add_admin_panel(
			array(
				'page' => '',
				'name' => '_logo_page',
				'title' => esc_html__('Branding','industrialist'),
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' =>esc_html__( 'Hide Logo','industrialist'),
				'description' => esc_html__('Enabling this option will hide logo image','industrialist'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#mkd_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = industrialist_mikado_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Default','industrialist'),
				'description' => esc_html__('Choose a default logo image to display ','industrialist'),
				'parent' => $hide_logo_container
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo-dark.png",
				'label' => esc_html__('Logo Image - Dark','industrialist'),
				'description' =>esc_html__( 'Choose a default logo image to display ','industrialist'),
				'parent' => $hide_logo_container
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo-light.png",
				'label' => esc_html__('Logo Image - Light','industrialist'),
				'description' =>esc_html__( 'Choose a default logo image to display ','industrialist'),
				'parent' => $hide_logo_container
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Sticky','industrialist'),
				'description' =>esc_html__( 'Choose a default logo image to display ','industrialist'),
				'parent' => $hide_logo_container
			)
		);

		industrialist_mikado_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => MIKADO_ASSETS_ROOT."/img/logo-dark.png",
				'label' => esc_html__('Logo Image - Mobile','industrialist'),
				'description' =>esc_html__( 'Choose a default logo image to display ','industrialist'),
				'parent' => $hide_logo_container
			)
		);

	}

    add_action('industrialist_mikado_before_general_options_map', 'industrialist_mikado_logo_options_map');

}