<?php
/**
 * Call to action shortcode template
 */

 $content = preg_replace('#^<\/p>|<p>$#', '', $content);
?>
<?php if ($full_width == "no") { ?>
	<div class="mkd-container-inner">
<?php } ?>
	<div class="mkd-call-to-action <?php echo esc_attr($type).' '.esc_attr($call_to_action_classes); ?>">

		<?php if ($content_in_grid == 'yes' && $full_width == 'yes') { ?>
		<div class="mkd-container-inner">
		<?php }

		if ($grid_size == "75") { ?>
			<div class="mkd-call-to-action-row-75-25 clearfix" <?php echo industrialist_mikado_get_inline_style($call_to_action_styles) ?>>
		<?php } elseif ($grid_size == "66") { ?>
			<div class="mkd-call-to-action-row-66-33 clearfix" <?php echo industrialist_mikado_get_inline_style($call_to_action_styles) ?>>
		<?php } else { ?>
			<div class="mkd-call-to-action-row-50-50 clearfix" <?php echo industrialist_mikado_get_inline_style($call_to_action_styles) ?>>
		<?php } ?>
				<div class="mkd-text-wrapper <?php echo esc_attr($text_wrapper_classes) ?>">
				<?php if ($type == "with-icon") { ?>
					<div class="mkd-call-to-action-icon-holder">
						<div class="mkd-call-to-action-icon">
							<div class="mkd-call-to-action-icon-inner"><?php print $icon; ?></div>
						</div>
					</div>
				<?php } ?>
					<div class="mkd-call-to-action-text" <?php echo industrialist_mikado_get_inline_style($content_styles) ?>><?php echo do_shortcode($content); ?></div>
				</div>

				<?php if ($show_button == 'yes') { ?>
					<div class="mkd-button-wrapper mkd-call-to-action-column2 mkd-call-to-action-cell" style ="text-align: <?php echo esc_attr($button_position) ?> ;">
						<?php echo industrialist_mikado_get_button_html($button_parameters); ?>
					</div>
				<?php } ?>
			</div>
		<?php if ($content_in_grid == 'yes' && $full_width == 'yes') { ?>
		</div>
		<?php } ?>
	</div>
<?php if ($full_width == 'no') { ?>
	</div>
<?php } ?>