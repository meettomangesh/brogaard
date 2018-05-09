<?php
$blog_archive_pages_classes = industrialist_mikado_blog_archive_pages_classes(industrialist_mikado_get_default_blog_list());
?>
<?php get_header(); ?>
<?php industrialist_mikado_get_title(); ?>
<div class="<?php echo esc_attr($blog_archive_pages_classes['holder']); ?>">
<?php do_action('industrialist_mikado_after_container_open'); ?>
	<div class="<?php echo esc_attr($blog_archive_pages_classes['inner']); ?>">
		<?php industrialist_mikado_get_blog(industrialist_mikado_get_default_blog_list()); ?>
	</div>
<?php do_action('industrialist_mikado_before_container_close'); ?>
</div>
<?php get_footer(); ?>