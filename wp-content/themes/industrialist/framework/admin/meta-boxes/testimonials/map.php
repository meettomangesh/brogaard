<?php

//Testimonials

$testimonial_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('testimonials'),
        'title' =>esc_html__( 'Testimonial','industrialist'),
        'name' => 'testimonial_meta'
    )
);

    industrialist_mikado_add_meta_box_field(
        array(
            'name'        	=> 'mkd_testimonial_title',
            'type'        	=> 'text',
            'label'       	=> esc_html__( 'Title','industrialist'),
            'description' 	=> esc_html__( 'Enter testimonial title','industrialist'),
            'parent'      	=> $testimonial_meta_box,
        )
    );


    industrialist_mikado_add_meta_box_field(
        array(
            'name'        	=> 'mkd_testimonial_author',
            'type'        	=> 'text',
            'label'       	=> esc_html__( 'Author','industrialist'),
            'description' 	=> esc_html__( 'Enter author name','industrialist'),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    industrialist_mikado_add_meta_box_field(
        array(
            'name'        	=> 'mkd_testimonial_author_position',
            'type'        	=> 'text',
            'label'       	=>esc_html__(  'Job Position','industrialist'),
            'description' 	=> esc_html__( 'Enter job position','industrialist'),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    industrialist_mikado_add_meta_box_field(
        array(
            'name'        	=> 'mkd_testimonial_text',
            'type'        	=> 'text',
            'label'       	=> esc_html__( 'Text','industrialist'),
            'description' 	=> esc_html__( 'Enter testimonial text','industrialist'),
            'parent'      	=> $testimonial_meta_box,
        )
    );