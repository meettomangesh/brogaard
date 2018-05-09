<?php

/*** Link Post Format ***/

$link_post_format_meta_box = industrialist_mikado_add_meta_box(
	array(
		'scope' => array('post'),
		'title' => esc_html__('Link Post Format','industrialist'),
		'name' => 'post_format_link_meta'
	)
);

industrialist_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_link_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Link','industrialist'),
		'description' => esc_html__('Enter link','industrialist'),
		'parent'      => $link_post_format_meta_box,

	)
);

