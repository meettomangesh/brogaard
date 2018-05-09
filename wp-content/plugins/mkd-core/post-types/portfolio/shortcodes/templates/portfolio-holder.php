<div class="mkd-portfolio-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<?php echo mkd_core_get_shortcode_module_template_part('portfolio', 'parts/filter', '', $params); ?>
	
	<div class="mkd-pl-inner clearfix">
		<?php
			if($query_results->have_posts()):
				while ( $query_results->have_posts() ) : $query_results->the_post();
					$params['current_id'] = get_the_ID();
					$article_classes = $this_object->getArticleClasses($params);
					$article_class = get_post_class(array($article_classes));
					$params['article_class'] = implode(' ', $article_class);
					
					$params['item_link'] = $this_object->getItemLink($params);
					
					echo mkd_core_get_shortcode_module_template_part('portfolio', 'portfolio-item', $params['item_layout'], $params);
				endwhile;
			else:
				echo mkd_core_get_shortcode_module_template_part('portfolio', 'parts/posts-not-found', '', $params);
			endif;
		
			wp_reset_postdata();
		?>
	</div>
	
	<?php echo mkd_core_get_shortcode_module_template_part('portfolio', 'pagination/'.$params['pagination_type'], '', $params); ?>
</div>