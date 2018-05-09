<div <?php industrialist_mikado_class_attribute($iwt_classes); ?>>
    <div class="mkd-iwt-icon-holder">
        <?php if (!empty($custom_icon)) : ?>
            <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
        <?php else: ?>
            <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_params' => $icon_params)); ?>
        <?php endif; ?>
    </div>
    <div class="mkd-iwt-content-holder" <?php industrialist_mikado_inline_style($content_styles); ?>>
        <div class="mkd-iwt-title-holder">
            <<?php echo esc_attr($title_tag); ?> <?php industrialist_mikado_inline_style($title_styles); ?> class="mkd-iwt-title">
            <?php echo esc_html($title); ?>
        </<?php echo esc_attr($title_tag); ?>>
    </div>
    <div class="mkd-iwt-text-holder">
        <p <?php industrialist_mikado_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>

        <?php if (!empty($link) && !empty($link_text)) : ?>
            <a itemprop="url" class="mkd-iwt-link" href="<?php echo esc_attr($link); ?>" <?php industrialist_mikado_inline_attr($target, 'target'); ?>><?php echo esc_html($link_text); ?></a>
        <?php endif; ?>
    </div>
</div>
</div>