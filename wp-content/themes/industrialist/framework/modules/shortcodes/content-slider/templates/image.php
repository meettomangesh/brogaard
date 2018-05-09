<?php if ($image) : ?>
    <div class="mkd-content-slider-image">
        <?php echo wp_get_attachment_image($image, 'full'); ?>
    </div>
<?php endif; ?>