<?php

/*** Audio Post Format ***/

$audio_post_format_meta_box = industrialist_mikado_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Audio Post Format','industrialist'),
		'name' 	=> 'post_format_audio_meta'
	)
);

industrialist_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_audio_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Link','industrialist'),
		'description' => esc_html__('Enter audion link','industrialist'),
		'parent'      => $audio_post_format_meta_box,

	)
);
