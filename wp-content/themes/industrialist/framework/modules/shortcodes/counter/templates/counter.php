<?php

$icon = ($icon_pack !== '') ? $icon : '';

?>

<div class="mkd-counter-holder <?php echo esc_attr($counter_classes); ?>" <?php echo industrialist_mikado_get_inline_style($counter_styles); ?>>

    <?php
    echo industrialist_mikado_get_shortcode_module_template_part('templates/icon', 'counter', '', array(
        'icon' => $icon,
        'icon_pack' => $icon_pack,
        'params' => $params
    ));
    ?>

    <span class="mkd-counter <?php echo esc_attr($type) ?>" <?php echo industrialist_mikado_get_inline_style($counter_digit_styles); ?>>
		<?php echo esc_attr($digit); ?>
	</span>
    <?php if ($enable_separator !== 'no') {
        echo industrialist_mikado_execute_shortcode('mkd_separator', $separator_params);
    } ?>
    <<?php echo esc_html($title_tag); ?> class="mkd-counter-title">
    <?php echo esc_attr($title); ?>
</<?php echo esc_html($title_tag);; ?>>
<?php if ($text != "") { ?>
    <p class="mkd-counter-text"><?php echo esc_html($text); ?></p>
<?php } ?>

</div>