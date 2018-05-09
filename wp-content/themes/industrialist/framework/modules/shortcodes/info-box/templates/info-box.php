<div <?php industrialist_mikado_class_attribute($info_box_classes); ?>>

    <div class="mkd-info-box-inner">
        <div class="mkd-ib-front-holder">
            <div class="mkd-ib-front-holder-inner">
                <div class="mkd-ib-top-holder">

                    <?php if ($show_icon) : ?>
                        <div class="mkd-ib-media-holder">
                            <div class="mkd-ib-icon-holder">
                                <?php echo industrialist_mikado_icon_collections()->renderIcon($icon, $icon_pack, array(
                                    'icon_attributes' => array(
                                        'style' => $icon_styles
                                    )
                                )); ?>
                            </div>
                            <?php echo industrialist_mikado_generate_thumbnail($image, null, '150', '150'); ?>
                        </div><!-- .mkd-ib-media-holder -->
                    <?php endif; ?>

                    <?php if (!empty($title)) : ?>
                        <div class="mkd-ib-title-holder">
                            <h5 class="mkd-ib-title"><?php echo esc_html($title); ?></h5>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($text)) : ?>
                        <div class="mkd-ib-text-holder">
                            <p><?php echo esc_html($text); ?></p>
                        </div>
                    <?php endif; ?>

                </div><!-- .mkd-ib-top-holder -->

                <div class="mkd-ib-bottom-holder">
                    <?php if (is_array($button_params) && count($button_params)) : ?>
                        <div class="mkd-ib-button-holder">
                            <?php echo industrialist_mikado_get_button_html($button_params); ?>
                        </div>
                    <?php endif; ?>
                </div><!-- .mkd-ib-bottom-holder -->

            </div>
        </div>
        <div class="mkd-ib-overlay" <?php industrialist_mikado_inline_style($info_box_styles); ?>></div>
    </div>
</div>