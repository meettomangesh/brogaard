<?php get_header(); ?>
<?php industrialist_mikado_get_title(); ?>
<div class="mkd-container mkd-default-page-template">
	<?php do_action('industrialist_mikado_after_container_open'); ?>
	<div class="mkd-container-inner clearfix">
		<?php
			$tag_id = get_queried_object_id();
			$tag = get_tag($tag_id);
			$tag_slug = $tag->slug;

			industrialist_mikado_get_portfolio_tag_list($tag_slug);
		?>
	</div>
	<?php do_action('industrialist_mikado_before_container_close'); ?>
</div>
<?php get_footer(); ?>
