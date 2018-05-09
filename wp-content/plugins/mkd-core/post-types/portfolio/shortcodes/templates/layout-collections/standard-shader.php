<a itemprop="url" href="<?php echo esc_url($item_link); ?>">
	<i class="fa fa-external-link" aria-hidden="true"></i>
	<?php echo mkd_core_get_shortcode_module_template_part('portfolio', 'parts/image', $item_layout, $params); ?>
</a>

<div class="mkd-pli-text-holder">
	<div class="mkd-pli-text-wrapper">
		<div class="mkd-pli-text">
			<a itemprop="url" href="<?php echo esc_url($item_link); ?>">
				<?php echo mkd_core_get_shortcode_module_template_part('portfolio', 'parts/title', $item_layout, $params); ?>
			</a>

            <?php echo mkd_core_get_shortcode_module_template_part('portfolio', 'parts/category', $item_layout, $params); ?>
			
			<?php echo mkd_core_get_shortcode_module_template_part('portfolio', 'parts/excerpt', $item_layout, $params); ?>
		</div>
	</div>
</div>