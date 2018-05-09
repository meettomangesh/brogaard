<div id="mkd-testimonials<?php echo esc_attr($current_id) ?>" class="mkd-testimonial-content">
    <div class="mkd-testimonial-content-inner">

        <div class="mkd-testimonial-text-holder">
            <div class="mkd-testimonial-text-inner">

                <?php if ($show_title == "yes") : ?>
                    <h5 class="mkd-testimonial-title">
                        <?php echo esc_attr($title) ?>
                    </h5>
                <?php endif; ?>

                <p class="mkd-testimonial-text"><?php echo trim($text) ?></p>

            </div><!-- .mkd-testimonials-text-inner -->
        </div><!-- .mkd-testimonials-text-holder -->

        <?php if ($show_author == "yes") : ?>
            <div class="mkd-testimonial-bottom">

                <div class="mkd-testimonial-image-holder">
                    <?php esc_html(the_post_thumbnail('thumbnail')) ?>
                </div>

                <h5 class="mkd-testimonial-author" <?php echo industrialist_mikado_get_inline_style($author_name_style); ?>>- <?php echo esc_attr($author) ?></h5>
                <?php if ($show_position == "yes" && $job !== '') : ?>
                    <h6 class="mkd-testimonial-job"><?php echo esc_attr($job) ?></h6>
                <?php endif; ?>

            </div><!-- .mkd-testimonial-bototm -->
        <?php endif; ?>

    </div>
</div>
