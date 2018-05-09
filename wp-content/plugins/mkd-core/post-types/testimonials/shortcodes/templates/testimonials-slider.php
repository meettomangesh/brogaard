<div id="mkd-testimonials<?php echo esc_attr($current_id) ?>" class="mkd-testimonial-content">
    <div class="mkd-testimonial-content-inner">
        <div class="mkd-testimonial-text-holder">
            <div class="mkd-testimonial-text-inner">
                <p class="mkd-testimonial-text"><?php echo trim($text) ?></p>

                <?php if ($show_author == "yes"): ?>
                    <?php echo industrialist_mikado_execute_shortcode('mkd_separator', $separator_params); ?>

                    <h5 class="mkd-testimonial-author" <?php echo industrialist_mikado_get_inline_style($author_name_style); ?>><?php echo esc_attr($author) ?></h5>

                    <?php if ($show_position == "yes" && $job !== ''): ?>
                        <h6 class="mkd-testimonials-job"><?php echo esc_attr($job) ?></h6>
                    <?php endif; ?>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
