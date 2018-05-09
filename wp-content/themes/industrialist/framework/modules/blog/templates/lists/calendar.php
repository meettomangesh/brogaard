<div class="<?php echo esc_attr($blog_classes)?>"   <?php echo esc_attr($blog_data_params) ?> >
	<?php

	if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
		industrialist_mikado_get_post_format_html($blog_type, $blog_params);
	endwhile;

	else:
		industrialist_mikado_get_module_template_part('templates/parts/no-posts', 'blog');
	endif;

	if(industrialist_mikado_options()->getOptionValue('pagination') == 'yes') {
		industrialist_mikado_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
	}
	?>
</div>
