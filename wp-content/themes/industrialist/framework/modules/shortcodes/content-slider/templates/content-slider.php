<div class="mkd-content-slider-item">

    <?php if ($image_position === 'left') : ?>
        <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/image', 'content-slider', '', array('image' => $image)); ?>
        <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/content', 'content-slider', '', array('content' => $content)); ?>
    <?php elseif ($image_position === 'right') : ?>
        <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/content', 'content-slider', '', array('content' => $content)); ?>
        <?php echo industrialist_mikado_get_shortcode_module_template_part('templates/image', 'content-slider', '', array('image' => $image)); ?>
    <?php endif; ?>

</div>