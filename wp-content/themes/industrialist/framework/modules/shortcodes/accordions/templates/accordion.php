<?php

$icon = ($icon_pack !== '') ? $icon : '';

?>

<div class="mkd-accordion-title-holder">

    <?php
    echo industrialist_mikado_get_shortcode_module_template_part('templates/icon', 'accordions', '', array(
        'icon' => $icon,
        'icon_pack' => $icon_pack,
        'params' => $params
    ));
    ?>

    <<?php echo esc_attr($title_tag) ?> class="clearfix mkd-accordion-title">
    <?php echo esc_attr($title) ?>
</<?php echo esc_attr($title_tag) ?>>

<div class="mkd-accordion-mark-holder">
    <div class="mkd-accordion-mark-icon">
        <span class="arrow_carrot-up mkd-close"></span>
        <span class="arrow_carrot-down mkd-open"></span>
    </div>
</div><!-- .mkd-accordion-mark-holder -->

</div><!-- .mkd-accordion-title-holder -->
<div class="mkd-accordion-content">
    <div class="mkd-accordion-content-inner">
        <?php echo do_shortcode($content); ?>
    </div>
</div>