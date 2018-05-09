<?php

$i = 0;

switch ($frame) {
    case 'frame-one':
        $frame_image = 'frame-slider-1.png';
        $image_width = '281';
        $image_height = '498';
        break;
    case 'frame-two':
        $frame_image = 'frame-slider-2.png';
        $image_width = '640';
        $image_height = '401';
        break;
    case 'frame-three':
        $frame_image = 'frame-slider-3.png';
        $image_width = '870';
        $image_height = '490';
        break;
}

?>

<div class="mkd-frame-slider-holder mkd-owl-shortcode-slider <?php echo esc_attr($frame); ?>" <?php echo industrialist_mikado_get_inline_attrs($frame_slider_data); ?>>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo esc_url($frame_image); ?>">

    <div class="mkd-frame-slider">
        <?php foreach ($images as $image) { ?>
            <div class="mkd-frame-slide">
                <?php if (!empty($links)){ ?>
                <a class="mkd-image-link" href="<?php echo esc_url($links[$i++]) ?>" title="<?php echo esc_attr($image['alt']); ?>" target="<?php echo esc_attr($target); ?>">
                    <?php } ?>

                    <?php echo industrialist_mikado_generate_thumbnail($image['image_id'], '', $image_width, $image_height); ?>

                    <?php if (!empty($links)){ ?>
                </a>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
    <div class="owl-external-controls"></div>
</div>
