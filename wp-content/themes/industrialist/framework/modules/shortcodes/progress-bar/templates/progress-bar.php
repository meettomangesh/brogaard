<div class="mkd-progress-bar">
    <<?php echo esc_attr($title_tag); ?> class="mkd-progress-title-holder clearfix">
    <span class="mkd-progress-title"><?php echo esc_attr($title) ?></span>
		<span class="mkd-progress-number-wrapper <?php echo esc_attr($percentage_classes) ?> ">
			<span class="mkd-progress-number">
				<span class="mkd-percent">0</span>
                <?php if ($floating_type == 'floating_outside') { ?>
                    <span class="mkd-down-arrow"></span>
                <?php } ?>
			</span>
		</span>
</<?php echo esc_attr($title_tag) ?>>
<div class="mkd-progress-content-outer" <?php echo industrialist_mikado_get_inline_style($inactive_styles) ?>>
    <div data-percentage=<?php echo esc_attr($percent) ?> class="mkd-progress-content" <?php echo industrialist_mikado_get_inline_style($active_styles) ?>></div>
</div>
</div>	