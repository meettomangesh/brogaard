<?php if (!empty($lightbox)) : ?>
    <div class="mkd-ps-image-inner-holder">
        <div class="mkd-ps-text-overlay">
            <div class="mkd-ps-text-overlay-inner-holder">
                <div class="mkd-ps-text-overlay-inner">
                    <h4><?php echo esc_attr($media['description']); ?></h4>
                </div>
            </div>
        </div>
        <a itemprop="image" title="<?php echo esc_attr($media['title']); ?>" data-rel="prettyPhoto[single_pretty_photo]" href="<?php echo esc_url($media['image_url']); ?>"></a>
<?php endif; ?>
    <img itemprop="image" src="<?php echo esc_url($media['image_url']); ?>"
         alt="<?php echo esc_attr($media['description']); ?>"/>
<?php if (!empty($lightbox)) : ?>
    </div>
<?php endif; ?>