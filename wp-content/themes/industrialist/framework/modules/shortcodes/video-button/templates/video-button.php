<div class="mkd-video-button">
    <a itemprop="image" class="mkd-video-button-play" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto" <?php echo industrialist_mikado_inline_style($video_button_style); ?>>
		<span class="mkd-video-button-wrapper">
			<span class="ion-ios-play"></span>
		</span>
    </a>
    <?php if ($title !== ''){ ?>
    <<?php echo esc_attr($title_tag); ?> class="mkd-video-button-title">
    <?php echo esc_html($title); ?>
</<?php echo esc_attr($title_tag); ?>>
<?php } ?>
</div>