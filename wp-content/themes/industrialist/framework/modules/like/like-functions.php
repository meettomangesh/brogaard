<?php

if ( ! function_exists('industrialist_mikado_like') ) {
	/**
	 * Returns IndustrialistMikadoLike instance
	 *
	 * @return IndustrialistMikadoLike
	 */
	function industrialist_mikado_like() {
		return IndustrialistMikadoLike::get_instance();
	}

}

function industrialist_mikado_get_like() {

	echo wp_kses(industrialist_mikado_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
/*		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),*/
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('industrialist_mikado_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function industrialist_mikado_like_latest_posts() {
		return industrialist_mikado_like()->add_like();
	}

}

if ( ! function_exists('industrialist_mikado_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	function industrialist_mikado_like_portfolio_list($portfolio_project_id) {
		return industrialist_mikado_like()->add_like_portfolio_list($portfolio_project_id);
	}

}