<div class="mkd-progress-circle-holder">

    <div class="mkd-progress-circle" <?php echo industrialist_mikado_get_inline_attrs($progress_circle_data); ?>>

        <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/' . $layout, 'progress-circle', '', $params); ?>

    </div>

    <div class="mkd-progress-circle-text" <?php industrialist_mikado_inline_style($progress_circle_style) ?>>

        <?php if ($layout == 'title'): ?>
            <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/percentage', 'progress-circle', '', $params); ?>
        <?php elseif ($layout == 'percentage'): ?>
            <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/title', 'progress-circle', '', $params); ?>
        <?php else: ?>
            <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/title', 'progress-circle', '', $params); ?>
            <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/percentage', 'progress-circle', '', $params); ?>
        <?php endif; ?>

        <p><?php echo esc_html($text); ?></p>

    </div>
</div>