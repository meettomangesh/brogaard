<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php industrialist_mikado_inline_style($button_styles); ?> <?php industrialist_mikado_class_attribute($button_classes); ?> <?php echo industrialist_mikado_get_inline_attrs($button_data); ?> <?php echo industrialist_mikado_get_inline_attrs($button_custom_atts); ?>>
    <span class="mkd-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo industrialist_mikado_icon_collections()->renderIcon($icon, $icon_pack); ?>
</a>