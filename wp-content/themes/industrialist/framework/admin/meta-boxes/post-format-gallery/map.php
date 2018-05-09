<?php

/*** Gallery Post Format ***/

$gallery_post_format_meta_box = industrialist_mikado_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Gallery Post Format','industrialist'),
		'name' 	=> 'post_format_gallery_meta'
	)
);

industrialist_mikado_add_multiple_images_field(
	array(
		'name'        => 'mkd_post_gallery_images_meta',
		'label'       => esc_html__('Gallery Images','industrialist'),
		'description' => esc_html__('Choose your gallery images','industrialist'),
		'parent'      => $gallery_post_format_meta_box,
	)
);
