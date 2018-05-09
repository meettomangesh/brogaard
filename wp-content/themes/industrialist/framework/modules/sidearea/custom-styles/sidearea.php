<?php

if (!function_exists('industrialist_mikado_side_area_slide_from_right_type_style')) {

	function industrialist_mikado_side_area_slide_from_right_type_style()
	{

		if (industrialist_mikado_options()->getOptionValue('side_area_type') == 'side-menu-slide-from-right') {

			if (industrialist_mikado_options()->getOptionValue('side_area_width') !== '' && industrialist_mikado_options()->getOptionValue('side_area_width') >= 25) {
				echo industrialist_mikado_dynamic_css('.mkd-side-menu-slide-from-right .mkd-side-menu', array(
					'right' => '-'.industrialist_mikado_options()->getOptionValue('side_area_width') . '%',
					'width' => industrialist_mikado_options()->getOptionValue('side_area_width') . '%'
				));
			}

			if (industrialist_mikado_options()->getOptionValue('side_area_content_overlay_color') !== '') {

				echo industrialist_mikado_dynamic_css('.mkd-side-menu-slide-from-right .mkd-wrapper .mkd-cover', array(
					'background-color' => industrialist_mikado_options()->getOptionValue('side_area_content_overlay_color')
				));

			}
			if (industrialist_mikado_options()->getOptionValue('side_area_content_overlay_opacity') !== '') {

				echo industrialist_mikado_dynamic_css('.mkd-side-menu-slide-from-right.mkd-right-side-menu-opened .mkd-wrapper .mkd-cover', array(
					'opacity' => industrialist_mikado_options()->getOptionValue('side_area_content_overlay_opacity')
				));

			}
		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_slide_from_right_type_style');

}

if (!function_exists('industrialist_mikado_side_area_icon_color_styles')) {

	function industrialist_mikado_side_area_icon_color_styles()
	{

		if (industrialist_mikado_options()->getOptionValue('side_area_icon_font_size') !== '') {

			echo industrialist_mikado_dynamic_css('a.mkd-side-menu-button-opener', array(
				'font-size' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_icon_font_size')) . 'px!important'
			));

			if (industrialist_mikado_options()->getOptionValue('side_area_icon_font_size') > 30) {
				echo '@media only screen and (max-width: 480px) {
						a.mkd-side-menu-button-opener {
						font-size: 30px!important;
						}
					}';
			}

		}

		if (industrialist_mikado_options()->getOptionValue('side_area_icon_color') !== '') {

			echo industrialist_mikado_dynamic_css('a.mkd-side-menu-button-opener', array(
				'color' => industrialist_mikado_options()->getOptionValue('side_area_icon_color')
			));

		}
		if (industrialist_mikado_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo industrialist_mikado_dynamic_css('a.mkd-side-menu-button-opener:hover', array(
				'color' => industrialist_mikado_options()->getOptionValue('side_area_icon_hover_color')
			));

		}
		if (industrialist_mikado_options()->getOptionValue('side_area_light_icon_color') !== '') {

			echo industrialist_mikado_dynamic_css('.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-side-menu-button-opener,
			.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-side-menu-button-opener,
			.mkd-light-header .mkd-top-bar .mkd-side-menu-button-opener', array(
				'color' => industrialist_mikado_options()->getOptionValue('side_area_light_icon_color') . ' !important'
			));

		}
		if (industrialist_mikado_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

			echo industrialist_mikado_dynamic_css('.mkd-light-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-side-menu-button-opener:hover,
			.mkd-light-header.mkd-header-style-on-scroll .mkd-page-header .mkd-side-menu-button-opener:hover,
			.mkd-light-header .mkd-top-bar .mkd-side-menu-button-opener:hover', array(
				'color' => industrialist_mikado_options()->getOptionValue('side_area_light_icon_hover_color') . ' !important'
			));

		}
		if (industrialist_mikado_options()->getOptionValue('side_area_dark_icon_color') !== '') {

			echo industrialist_mikado_dynamic_css('.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-side-menu-button-opener,
			.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-side-menu-button-opener,
			.mkd-dark-header .mkd-top-bar .mkd-side-menu-button-opener', array(
				'color' => industrialist_mikado_options()->getOptionValue('side_area_dark_icon_color') . ' !important'
			));

		}
		if (industrialist_mikado_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

			echo industrialist_mikado_dynamic_css('.mkd-dark-header .mkd-page-header > div:not(.mkd-sticky-header) .mkd-side-menu-button-opener:hover,
			.mkd-dark-header.mkd-header-style-on-scroll .mkd-page-header .mkd-side-menu-button-opener:hover,
			.mkd-dark-header .mkd-top-bar .mkd-side-menu-button-opener:hover', array(
				'color' => industrialist_mikado_options()->getOptionValue('side_area_dark_icon_hover_color') . ' !important'
			));

		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_icon_color_styles');

}

if (!function_exists('industrialist_mikado_side_area_icon_spacing_styles')) {

	function industrialist_mikado_side_area_icon_spacing_styles()
	{
		$icon_spacing = array();

		if (industrialist_mikado_options()->getOptionValue('side_area_icon_padding_left') !== '') {
			$icon_spacing['padding-left'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_icon_padding_left')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_icon_padding_right') !== '') {
			$icon_spacing['padding-right'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_icon_padding_right')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_icon_margin_left') !== '') {
			$icon_spacing['margin-left'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_icon_margin_left')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_icon_margin_right') !== '') {
			$icon_spacing['margin-right'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_icon_margin_right')) . 'px';
		}

		if (!empty($icon_spacing)) {

			echo industrialist_mikado_dynamic_css('a.mkd-side-menu-button-opener', $icon_spacing);

		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_icon_spacing_styles');
}

if (!function_exists('industrialist_mikado_side_area_icon_border_styles')) {

	function industrialist_mikado_side_area_icon_border_styles()
	{
		if (industrialist_mikado_options()->getOptionValue('side_area_icon_border_yesno') == 'yes') {

			$side_area_icon_border = array();

			if (industrialist_mikado_options()->getOptionValue('side_area_icon_border_color') !== '') {
				$side_area_icon_border['border-color'] = industrialist_mikado_options()->getOptionValue('side_area_icon_border_color');
			}

			if (industrialist_mikado_options()->getOptionValue('side_area_icon_border_width') !== '') {
				$side_area_icon_border['border-width'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_icon_border_width')) . 'px';
			} else {
				$side_area_icon_border['border-width'] = '1px';
			}

			if (industrialist_mikado_options()->getOptionValue('side_area_icon_border_radius') !== '') {
				$side_area_icon_border['border-radius'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_icon_border_radius')) . 'px';
			}

			if (industrialist_mikado_options()->getOptionValue('side_area_icon_border_style') !== '') {
				$side_area_icon_border['border-style'] = industrialist_mikado_options()->getOptionValue('side_area_icon_border_style');
			} else {
				$side_area_icon_border['border-style'] = 'solid';
			}

			if (!empty($side_area_icon_border)) {
				$side_area_icon_border['-webkit-transition'] = 'all 0.15s ease-out';
				$side_area_icon_border['transition'] = 'all 0.15s ease-out';
				echo industrialist_mikado_dynamic_css('a.mkd-side-menu-button-opener', $side_area_icon_border);
			}

			if (industrialist_mikado_options()->getOptionValue('side_area_icon_border_hover_color') !== '') {
				$side_area_icon_border_hover['border-color'] = industrialist_mikado_options()->getOptionValue('side_area_icon_border_hover_color');
                echo industrialist_mikado_dynamic_css('a.mkd-side-menu-button-opener:hover', $side_area_icon_border_hover);
			}


		}
	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_icon_border_styles');

}

if (!function_exists('industrialist_mikado_side_area_alignment')) {

	function industrialist_mikado_side_area_alignment()
	{

		if (industrialist_mikado_options()->getOptionValue('side_area_aligment')) {

			echo industrialist_mikado_dynamic_css('.mkd-side-menu-slide-from-right .mkd-side-menu, .mkd-side-menu-slide-with-content .mkd-side-menu, .mkd-side-area-uncovered-from-content .mkd-side-menu', array(
				'text-align' => industrialist_mikado_options()->getOptionValue('side_area_aligment')
			));

		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_alignment');

}

if (!function_exists('industrialist_mikado_side_area_styles')) {

	function industrialist_mikado_side_area_styles()
	{

		$side_area_styles = array();

		if (industrialist_mikado_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = industrialist_mikado_options()->getOptionValue('side_area_background_color');
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_padding_top') !== '') {
			$side_area_styles['padding-top'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_padding_top')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_padding_right') !== '') {
			$side_area_styles['padding-right'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_padding_right')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_padding_bottom') !== '') {
			$side_area_styles['padding-bottom'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_padding_bottom')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_padding_left') !== '') {
			$side_area_styles['padding-left'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_padding_left')) . 'px';
		}

		if (!empty($side_area_styles)) {
			echo industrialist_mikado_dynamic_css('.mkd-side-menu, .mkd-side-area-uncovered-from-content .mkd-side-menu, .mkd-side-menu-slide-from-right .mkd-side-menu', $side_area_styles);
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_close_icon') == 'dark') {
			echo industrialist_mikado_dynamic_css('.mkd-side-menu a.mkd-close-side-menu span, .mkd-side-menu a.mkd-close-side-menu i', array(
				'color' => '#000000'
			));
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_close_icon_size') !== '') {
			echo industrialist_mikado_dynamic_css('.mkd-side-menu a.mkd-close-side-menu', array(
				'height' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'padding' => 0,
			));
			echo industrialist_mikado_dynamic_css('.mkd-side-menu a.mkd-close-side-menu span, .mkd-side-menu a.mkd-close-side-menu i', array(
				'font-size' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'height' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_close_icon_size')) . 'px',
			));
		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_styles');

}

if (!function_exists('industrialist_mikado_side_area_title_styles')) {

	function industrialist_mikado_side_area_title_styles()
	{

		$title_styles = array();

		if (industrialist_mikado_options()->getOptionValue('side_area_title_color') !== '') {
			$title_styles['color'] = industrialist_mikado_options()->getOptionValue('side_area_title_color');
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_title_fontsize') !== '') {
			$title_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_title_fontsize')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_title_lineheight') !== '') {
			$title_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_title_lineheight')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_title_texttransform') !== '') {
			$title_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('side_area_title_texttransform');
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
			$title_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('side_area_title_google_fonts')) . ', sans-serif';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_title_fontstyle') !== '') {
			$title_styles['font-style'] = industrialist_mikado_options()->getOptionValue('side_area_title_fontstyle');
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_title_fontweight') !== '') {
			$title_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('side_area_title_fontweight');
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_title_letterspacing') !== '') {
			$title_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_title_letterspacing')) . 'px';
		}

		if (!empty($title_styles)) {

			echo industrialist_mikado_dynamic_css('.mkd-side-menu h4, .mkd-side-menu h5', $title_styles);

		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_title_styles');

}

if (!function_exists('industrialist_mikado_side_area_text_styles')) {

	function industrialist_mikado_side_area_text_styles()
	{
		$text_styles = array();

		if (industrialist_mikado_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('side_area_text_google_fonts')) . ', sans-serif';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_text_fontsize') !== '') {
			$text_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_text_fontsize')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_text_lineheight') !== '') {
			$text_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_text_lineheight')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('side_area_text_letterspacing')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_text_fontweight') !== '') {
			$text_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('side_area_text_fontweight');
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_text_fontstyle') !== '') {
			$text_styles['font-style'] = industrialist_mikado_options()->getOptionValue('side_area_text_fontstyle');
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_text_texttransform') !== '') {
			$text_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('side_area_text_texttransform');
		}

		if (industrialist_mikado_options()->getOptionValue('side_area_text_color') !== '') {
			$text_styles['color'] = industrialist_mikado_options()->getOptionValue('side_area_text_color');
		}

		if (!empty($text_styles)) {

			echo industrialist_mikado_dynamic_css('.mkd-side-menu .widget, .mkd-side-menu .widget.widget_search form, .mkd-side-menu .widget.widget_search form input[type="text"], .mkd-side-menu .widget.widget_search form input[type="submit"], .mkd-side-menu .widget h6, .mkd-side-menu .widget h6 a, .mkd-side-menu .widget p, .mkd-side-menu .widget li a, .mkd-side-menu .widget.widget_rss li a.rsswidget, .mkd-side-menu #wp-calendar caption,.mkd-side-menu .widget li, .mkd-side-menu h3, .mkd-side-menu .widget.widget_archive select, .mkd-side-menu .widget.widget_categories select, .mkd-side-menu .widget.widget_text select, .mkd-side-menu .widget.widget_search form input[type="submit"], .mkd-side-menu #wp-calendar th, .mkd-side-menu #wp-calendar td, .mkd-side-menu .q_social_icon_holder i.simple_social', $text_styles);

		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_text_styles');

}

if (!function_exists('industrialist_mikado_side_area_link_styles')) {

	function industrialist_mikado_side_area_link_styles()
	{
		$link_styles = array();

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
			$link_styles['font-family'] = industrialist_mikado_get_formatted_font_family(industrialist_mikado_options()->getOptionValue('sidearea_link_font_family')) . ',sans-serif';
		}

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_font_size') !== '') {
			$link_styles['font-size'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sidearea_link_font_size')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_line_height') !== '') {
			$link_styles['line-height'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sidearea_link_line_height')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
			$link_styles['letter-spacing'] = industrialist_mikado_filter_px(industrialist_mikado_options()->getOptionValue('sidearea_link_letter_spacing')) . 'px';
		}

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_font_weight') !== '') {
			$link_styles['font-weight'] = industrialist_mikado_options()->getOptionValue('sidearea_link_font_weight');
		}

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_font_style') !== '') {
			$link_styles['font-style'] = industrialist_mikado_options()->getOptionValue('sidearea_link_font_style');
		}

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_text_transform') !== '') {
			$link_styles['text-transform'] = industrialist_mikado_options()->getOptionValue('sidearea_link_text_transform');
		}

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_color') !== '') {
			$link_styles['color'] = industrialist_mikado_options()->getOptionValue('sidearea_link_color');
		}

		if (!empty($link_styles)) {

			echo industrialist_mikado_dynamic_css('.mkd-side-menu .widget li a, .mkd-side-menu .widget a:not(.qbutton)', $link_styles);

		}

		if (industrialist_mikado_options()->getOptionValue('sidearea_link_hover_color') !== '') {
			echo industrialist_mikado_dynamic_css('.mkd-side-menu .widget a:hover, .mkd-side-menu .widget.widget_archive li:hover, .mkd-side-menu .widget.widget_categories li:hover,  .mkd-side-menu .widget_rss li a.rsswidget:hover', array(
				'color' => industrialist_mikado_options()->getOptionValue('sidearea_link_hover_color')
			));
		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_link_styles');

}

if (!function_exists('industrialist_mikado_side_area_border_styles')) {

	function industrialist_mikado_side_area_border_styles()
	{

		if (industrialist_mikado_options()->getOptionValue('side_area_enable_bottom_border') == 'yes') {

			if (industrialist_mikado_options()->getOptionValue('side_area_bottom_border_color') !== '') {

				echo industrialist_mikado_dynamic_css('.mkd-side-menu .widget', array(
					'border-bottom' => '1px solid ' . industrialist_mikado_options()->getOptionValue('side_area_bottom_border_color'),
					'margin-bottom' => '10px',
					'padding-bottom' => '10px',
				));

			}

		}

	}

	add_action('industrialist_mikado_style_dynamic', 'industrialist_mikado_side_area_border_styles');

}