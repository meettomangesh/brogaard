<?php
$masonry_classes = '';
$number_of_columns = industrialist_mikado_get_meta_field_intersect('portfolio_single_masonry_columns_number');
if(!empty($number_of_columns)) {
	$masonry_classes .= ' mkd-ps-'.$number_of_columns.'-columns';
}
$space_between_items = industrialist_mikado_get_meta_field_intersect('portfolio_single_masonry_space_between_items');
if(!empty($space_between_items)) {
	$masonry_classes .= ' mkd-ps-'.$space_between_items.'-space';
}
?>
<div class="mkd-ps-image-holder mkd-ps-masonry-images <?php echo esc_attr($masonry_classes); ?>">
	<div class="mkd-ps-image-inner">
		<div class="mkd-ps-grid-sizer"></div>
		<div class="mkd-ps-grid-gutter"></div>
		<?php
		$media = industrialist_mikado_get_portfolio_single_media();
		
		if(is_array($media) && count($media)) : ?>
			<?php foreach($media as $single_media) : ?>
				<div class="mkd-ps-image <?php echo esc_attr($single_media['holder_classes']); ?>">
					<?php industrialist_mikado_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<div class="mkd-two-columns-75-25 clearfix">
	<div class="mkd-column1">
		<div class="mkd-column-inner">
			<?php industrialist_mikado_get_module_template_part('templates/single/parts/content', 'portfolio', $item_layout); ?>
		</div>
	</div>
	<div class="mkd-column2">
		<div class="mkd-column-inner">
			<div class="mkd-ps-info-holder">
				<?php
				//get portfolio custom fields section
				industrialist_mikado_get_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);
				
				//get portfolio categories section
				industrialist_mikado_get_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);
				
				//get portfolio date section
				industrialist_mikado_get_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);
				
				//get portfolio tags section
				industrialist_mikado_get_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);
				
				//get portfolio share section
				industrialist_mikado_get_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
				?>
			</div>
		</div>
	</div>
</div>