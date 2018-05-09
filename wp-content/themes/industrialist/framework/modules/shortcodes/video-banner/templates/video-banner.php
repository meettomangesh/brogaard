<?php if (!empty($video_link)) : ?>
    <div class="mkd-video-banner-holder <?php echo esc_attr($video_banner_classes); ?>">
        <a class="mkd-video-banner-link" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto[<?php echo esc_attr($banner_id); ?>]">

            <?php if (!empty($video_banner)) : ?>
                <?php echo wp_get_attachment_image($video_banner, 'full'); ?>
            <?php endif; ?>

            <div class="mkd-video-banner-overlay">
                <div class="mkd-video-banner-overlay-inner1">
                    <div class="mkd-video-banner-overlay-inner2">

                        <?php if ($title !== ''): ?>
                        <<?php echo esc_attr($title_tag); ?> class="mkd-video-banner-title">
                        <?php echo esc_html($title); ?>
                    </<?php echo esc_attr($title_tag); ?>>
                    <?php endif; ?>

                    <?php if ($subtitle !== ''): ?>
                    <<?php echo esc_attr($subtitle_tag); ?> class="mkd-video-banner-subtitle">
                    <?php echo esc_html($subtitle); ?>
                </<?php echo esc_attr($subtitle_tag); ?>>
                <?php endif; ?>

                <div class="mkd-icon-holder">
                </div><!-- .icon-holder -->
            </div>
    </div>
    </div><!-- .mkd-video-banner-overlay -->

    </a>
    </div><!-- .mkd-video-banner-holder -->
<?php endif; ?>