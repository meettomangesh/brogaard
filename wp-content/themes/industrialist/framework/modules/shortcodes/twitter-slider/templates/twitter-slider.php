<?php if ($response->status) : ?>
    <?php if (is_array($response->data) && count($response->data)) : ?>
        <div class="mkd-twitter-slider mkd-owl-shortcode-slider clearfix <?php echo esc_attr($twitter_classes); ?>">
            <div class="mkd-grid">

                <?php if ($title !== ''): ?>
                <<?php echo esc_attr($title_tag); ?> class="mkd-twitter-slider-title">
                <?php echo esc_html($title); ?>
            </<?php echo esc_attr($title_tag); ?>>
            <?php endif; ?>

            <div class="mkd-twitter-slider-inner" <?php industrialist_mikado_inline_style($tweet_styles); ?> <?php echo industrialist_mikado_get_inline_attrs($twitter_slider_data); ?>>
                <?php foreach ($response->data as $tweet) : ?>
                    <div class="item mkd-twitter-slider-item">
                        <div class="mkd-twitter-text">
                            <?php echo MikadoTwitterApi::getInstance()->getHelper()->getTweetText($tweet); ?>
                        </div>
                        <div class="mkd-twitter-time">
                            <?php echo MikadoTwitterApi::getInstance()->getHelper()->getTweetTime($tweet); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    <?php endif; ?>

<?php else: ?>
    <?php echo esc_html($response->message); ?>
<?php endif; ?>
