<div class="mkd-st <?php echo esc_attr($section_title_classes); ?>">
    <div class="mkd-st-inner">
        <div class="mkd-st-title-holder">
            <<?php echo esc_attr($title_tag); ?> class="mkd-st-title">
            <span><?php echo esc_attr($title); ?></span>
        </<?php echo esc_attr($title_tag); ?>>
    </div>

    <?php if ($enable_separator !== 'no') {
        echo industrialist_mikado_execute_shortcode('mkd_separator', $separator_params);
    } ?>

    <div class="mkd-st-text-holder" <?php echo esc_attr($section_title_classes); ?>>
        <span class="mkd-st-text-text"><?php echo do_shortcode($content); ?></span>
    </div>
</div>
</div>