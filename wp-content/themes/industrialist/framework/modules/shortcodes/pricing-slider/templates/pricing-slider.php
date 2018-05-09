<div class="mkd-pricing-slider <?php echo esc_attr($pricing_slider_classes) ?>" <?php echo industrialist_mikado_get_inline_attrs($slider_data); ?>>

    <div class="mkd-pricing-slider-inner-left">

        <?php if (!empty($title)): ?>
        <div class="mkd-pricing-slider-title-holder">
            <<?php echo esc_attr($title_tag) ?> class="clearfix mkd-pricing-slider-title">
            <?php echo esc_attr($title) ?>
        </<?php echo esc_attr($title_tag) ?>>

        <?php echo industrialist_mikado_execute_shortcode('mkd_separator', $separator_params); ?>

    </div><!-- .mkd-pricing-slider-title-holder -->
    <?php endif; ?>

    <?php if (!empty($description)): ?>
        <div class="mkd-pricing-slider-description">
            <p><?php echo esc_attr($description) ?></p>
        </div><!-- .mkd-pricing-slider-description -->
    <?php endif; ?>

    <div class="mkd-pricing-slider-button-holder">

        <?php if ($price_period !== '') : ?>
            <span class="mkd-pricing-slider-button <?php echo ($extra_initially_active != 'yes') ? 'active' : '' ?>" <?php echo industrialist_mikado_get_inline_attrs($button_value); ?>>
                    <?php echo industrialist_mikado_get_button_html(array(
                        'link' => 'javascript:void(0)',
                        'text' => $price_period,
                        'size' => 'normal',
                        'custom_class' => 'button-first-period',
                        'html_type' => 'input',
                        'color' => $button_text_color
                    )); ?>
                </span>
        <?php endif; ?>

        <?php if ($extra_period === 'yes' && $price_period_extra !== '') : ?>
            <span class="mkd-pricing-slider-button-extra <?php echo ($extra_initially_active) == 'yes' ? 'active' : '' ?>" <?php echo industrialist_mikado_get_inline_attrs($button_value_extra); ?>>
                    <?php echo industrialist_mikado_get_button_html(array(
                        'link' => 'javascript:void(0)',
                        'text' => $price_period_extra,
                        'size' => 'normal',
                        'custom_class' => 'button-second-period',
                        'html_type' => 'input',
                        'color' => $button_text_color
                    )); ?>
                </span>
        <?php endif; ?>

    </div><!-- .mkd-pricing-slider-button-holder -->

</div><!-- .mkd-pricing-slider-inner-left -->

<div class="mkd-pricing-slider-inner-right">
    <div class="mkd-pricing-slider-inner-right2">

        <div class="mkd-pricing-slider-description-holder">

            <<?php echo esc_attr($info_title_tag); ?> class="mkd-pricing-info-title">
            <?php echo esc_html($info_title); ?>
        </<?php echo esc_attr($info_title_tag) ?>>
        <div class="mkd-pricing-info-description">
            <?php print $info_description; ?>
        </div>

    </div>

    <div class="mkd-pricing-slider-info-holder">
        <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/pricing-info', 'pricing-slider', '', $pricing_info_params); ?>
    </div>

    <div class="clearfix"></div>

    <div class="mkd-pricing-slider-bar-holder">
        <div class="mkd-pricing-slider-bar" style="width: 0">
                <span class="mkd-pricing-slider-drag">
                    <i class="ion-arrow-left-b"></i>
                    <i class="ion-arrow-right-b"></i>
                    <span class="mkd-pricing-slider-value-holder">
                        <h6 class="mkd-pricing-slider-value" <?php echo industrialist_mikado_get_inline_style($unit_text_style); ?>>0 <?php echo esc_attr($unit_name) . 's'; ?></h6>
                    </span>
                </span>
        </div>
    </div>

</div><!-- .mkd-pricing-slider-inner-right2 -->
</div><!-- .mkd-pricing-slider-inner-right -->


</div><!-- .mkd-pricing-slider -->