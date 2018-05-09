<div <?php industrialist_mikado_class_attribute($pricing_table_classes) ?>>
    <div class="mkd-price-table-inner">
        <ul>
            <li class="mkd-price-table-title">
                <h4><?php echo esc_html($title) ?></h4>
            </li>
            <li class="mkd-price-table-price">
                <div class="mkd-price-holder">
                    <sup class="mkd-currency"><?php echo esc_attr($currency) ?></sup>
                    <span class="mkd-value"><?php echo esc_attr($price) ?></span>
                </div>
                <span class="mkd-interval"><?php echo esc_attr($price_period) ?></span>
            </li>
            <li class="mkd-price-table-content">
                <?php
                echo do_shortcode($content);
                ?>
            </li>
            <?php
            if ($show_button == "yes" && $button_text !== '') { ?>
                <li class="mkd-price-table-button">
                    <?php echo industrialist_mikado_get_button_html(array(
                        'link' => $link,
                        'text' => $button_text,
                        'type' => 'solid',
                        'hover_color' => '#ffffff',
                        'background_color' => '#2b2a28',
                        'hover_background_color' => '#fdc94b',
                        'border_color' => '#2b2a28',
                        'hover_border_color' => '#fdc94b',
                    )); ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>