<div class="mkd-tabs <?php echo esc_attr($tab_class); ?> clearfix">
    <ul class="mkd-tabs-nav">
        <?php foreach ($tabs_titles as $tab_title) { ?>
            <li>
            <<?php echo esc_attr($title_tag); ?> class="mkd-tab-title">
            <a href="#tab-<?php echo sanitize_title($tab_title) ?>">
                <span class="mkd-icon-frame"></span>

                <!--<span class="mkd-advanced-tab-text-after-icon">-->
                <?php echo esc_attr($tab_title) ?>
                <!--</span>-->

            </a>
            </<?php echo esc_attr($title_tag) ?>>


            </li>
        <?php } ?>
    </ul><!-- .mkd-tabs-nav -->

    <?php echo do_shortcode($content); ?>
</div>