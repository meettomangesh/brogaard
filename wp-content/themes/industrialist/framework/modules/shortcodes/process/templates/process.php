<?php

$icon_parameters = ($icon_pack !== '') ? $icon_parameters : '';
$atts = (!empty($image)) ? array('background-image:url(' . wp_get_attachment_url($image, 'full') . ')') : '';

?>

<div class="mkd-process-item mkd-<?php echo esc_attr($type); ?>">

    <div class="mkd-process-item-icon-holder-wrapper">
        <div class="mkd-process-item-icon-holder-wrapper-inner">
            <div class="mkd-process-item-icon-holder">
            <span class="mkd-process-item-background-holder">

                <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/' . $type, 'process', '', array('icon_parameters' => $icon_parameters)); ?>
                <span class="mkd-process-item-background">
                    <span <?php echo industrialist_mikado_inline_style($atts); ?>></span>
                </span>
            </span>
            </div>
        </div>
    </div><!-- .mkd-process-item-icon-holder-wrapper -->

    <div class="mkd-process-item-content-holder">
        <div class="mkd-process-item-title-holder">
            <<?php echo esc_attr($title_tag); ?>>
            <?php echo esc_html($title); ?>
        </<?php echo esc_attr($title_tag); ?>>
    </div>
    <div class="mkd-process-item-text-holder">
        <p><?php echo esc_html($text); ?></p>
    </div>
</div><!-- .mkd-process-item-content-holder -->

</div><!-- .mkd-process-item -->