<div class="mkd-pricing-info">
    <div class="mkd-pricing-info-inner">

        <div class="mkd-pricing-info-pricing">
            <div>
                <span class="mkd-value"><?php echo esc_html($currency) ?></span>
                <span class="mkd-price"><?php echo esc_html($price) ?></span>
            </div>
            <span class="mkd-mark"><?php echo esc_html($price_period) ?></span>
        </div><!-- .mkd-pricing-info-pricing -->

        <?php if ($show_button == "yes" && $button_text !== '') : ?>
            <div class="mkd-pricing-info-button">
                <?php echo industrialist_mikado_get_button_html(array(
                    'link' => $link,
                    'text' => $button_text,
                    'size' => 'normal',
                    'type' => 'solid',
                )); ?>
            </div>
        <?php endif; ?>

    </div><!-- .mkd-pricing-info-inner -->
</div><!-- .mkd-pricing-info -->