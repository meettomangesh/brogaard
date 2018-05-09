<?php

$mkd_blog_categories = array();
$categories = get_categories();
foreach ($categories as $category) {
    $mkd_blog_categories[$category->term_id] = $category->name;
}

$blog_meta_box = industrialist_mikado_add_meta_box(
    array(
        'scope' => array('page'),
        'title' => esc_html__('Blog','industrialist'),
        'name' => 'blog_meta'
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_blog_category_meta',
        'type' => 'selectblank',
        'label' => esc_html__('Blog Category','industrialist'),
        'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)','industrialist'),
        'parent' => $blog_meta_box,
        'options' => $mkd_blog_categories,
        'args' => array(
            'select2' => true
        )
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_show_posts_per_page_meta',
        'type' => 'text',
        'label' =>esc_html__( 'Number of Posts','industrialist'),
        'description' => esc_html__('Enter the number of posts to display','industrialist'),
        'parent' => $blog_meta_box,
        'options' => $mkd_blog_categories,
        'args' => array("col_width" => 3)
    )
);

industrialist_mikado_add_meta_box_field(
    array(
        'name' => 'mkd_blog_list_standard_date_position_meta',
        'type' => 'selectblank',
        'default_value' => '',
        'label' =>esc_html__( 'Date outside','industrialist'),
        'description' => esc_html__('Date outside','industrialist'),
        'options' => array(
            'no' => esc_html__('No', 'industrialist'),
            'yes' => esc_html__('Yes', 'industrialist')
        ),
        'parent' => $blog_meta_box,
    )
);
