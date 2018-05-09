<?php get_header(); ?>
<?php industrialist_mikado_get_title(); ?>
<div class="mkd-container mkd-default-page-template">
	<?php do_action('industrialist_mikado_after_container_open'); ?>
	<div class="mkd-container-inner clearfix">
		<?php
			$cat_id = get_queried_object_id();
			$cat = get_category($cat_id);
			$cat_slug = $cat->slug;

			industrialist_mikado_get_portfolio_category_list($cat_slug);
		?>
	</div>
	<?php do_action('industrialist_mikado_before_container_close'); ?>
</div>
<?php get_footer(); ?>
