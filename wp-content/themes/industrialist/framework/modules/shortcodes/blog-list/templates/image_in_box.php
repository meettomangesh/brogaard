<li class="mkd-blog-list-item clearfix">
    <div class="mkd-blog-list-item-inner">
        <div class="mkd-item-image clearfix">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>">
                <?php
                echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
                ?>
            </a>
        </div>
        <div class="mkd-item-text-holder">
            <<?php echo esc_html($title_tag) ?> itemprop="name" class="mkd-item-title entry-title">
            <a itemprop="url" href="<?php echo esc_url(get_permalink()) ?>">
                <?php echo esc_attr(get_the_title()) ?>
            </a>
        </<?php echo esc_html($title_tag) ?>>

        <?php if ($display_excerpt == 'yes') {
            $excerpt = ($excerpt_length > 0) ? substr(get_the_excerpt(), 0, intval($excerpt_length)) : get_the_excerpt(); ?>
            <p itemprop="description" class="mkd-excerpt"><?php echo esc_html($excerpt) ?>...</p>
        <?php } ?>

        <?php if ($display_date == 'yes' || $display_categories == 'yes' || $display_share == 'yes') { ?>
            <div class="mkd-item-info-section clearfix">
                <?php industrialist_mikado_post_info(array(
                    'date' => $display_date,
                    'category' => $display_categories,
                    'share' => $display_share,
                )) ?>
            </div>
        <?php } ?>

        <?php
        if ($display_read_more == 'yes') {
            industrialist_mikado_read_more_button();
        }
        ?>

    </div>
    </div>
</li>
