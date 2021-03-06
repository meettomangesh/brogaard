<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="mkd-blockquote-shortcode" <?php industrialist_mikado_inline_style($blockquote_style); ?> >
	<span class="mkd-icon-quotations-holder">
		<?php echo industrialist_mikado_icon_collections()->getQuoteIcon("font_elegant", true); ?>
	</span>
	<<?php echo esc_attr($blockquote_title_tag); ?> class="mkd-blockquote-text">
	<span><?php echo esc_attr($text); ?></span>
	</<?php echo esc_attr($blockquote_title_tag);?>>
</blockquote>