<?php

/*** Video Post Format ***/

$video_post_format_meta_box = industrialist_mikado_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' =>esc_html__( 'Video Post Format','industrialist'),
		'name' 	=> 'post_format_video_meta'
	)
);

industrialist_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_video_type_meta',
		'type'        => 'select',
		'label'       => esc_html__('Video Type','industrialist'),
		'description' => esc_html__('Choose video type','industrialist'),
		'parent'      => $video_post_format_meta_box,
		'default_value' => 'social_networks',
		'options'     => array(
			'social_networks' => esc_html__('Youtube or Vimeo','industrialist'),
			'self' => esc_html__('Self Hosted','industrialist')
		),
		'args' => array(
		'dependence' => true,
		'hide' => array(
			'social_networks' => '#mkd_mkd_video_self_hosted_container',
			'self' => '#mkd_mkd_video_embedded_container'
		),
		'show' => array(
			'social_networks' => '#mkd_mkd_video_embedded_container',
			'self' => '#mkd_mkd_video_self_hosted_container')
	)
	)
);

$mkd_video_embedded_container = industrialist_mikado_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'mkd_video_embedded_container',
		'hidden_property' => 'mkd_video_type_meta',
		'hidden_value' => 'self'
	)
);

$mkd_video_self_hosted_container = industrialist_mikado_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'mkd_video_self_hosted_container',
		'hidden_property' => 'mkd_video_type_meta',
		'hidden_value' => 'social_networks'
	)
);



industrialist_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_video_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video URL','industrialist'),
		'description' => esc_html__('Enter Video URL','industrialist'),
		'parent'      => $mkd_video_embedded_container,

	)
);

industrialist_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_video_image_meta',
		'type'        => 'image',
		'label'       => esc_html__('Video Image','industrialist'),
		'description' => esc_html__('Upload video image','industrialist'),
		'parent'      => $mkd_video_self_hosted_container,

	)
);

industrialist_mikado_add_meta_box_field(
	array(
		'name'        => 'mkd_post_video_mp4_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Selfhosted Video URL','industrialist'),
		'description' =>esc_html__( 'Enter video URL for MP4 format','industrialist'),
		'parent'      => $mkd_video_self_hosted_container,

	)
);
