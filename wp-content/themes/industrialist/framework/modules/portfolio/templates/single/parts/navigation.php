<?php /*if(industrialist_mikado_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : */?><!--
    <?php
/*    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = industrialist_mikado_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    */?>
    <div class="mkd-ps-navigation">
        <?php /*if(get_previous_post() !== '') : */?>
            <div class="mkd-ps-prev">
                <?php /*if($nav_same_category) {
	                previous_post_link('%link','<span class="mkd-ps-nav-mark ion-ios-arrow-thin-left"></span>', true, '', 'portfolio-category');
                } else {
	                previous_post_link('%link','<span class="mkd-ps-nav-mark ion-ios-arrow-thin-left"></span>');
                } */?>
            </div>
        <?php /*endif; */?>

        <?php /*if($back_to_link !== '') : */?>
            <div class="mkd-ps-back-btn">
                <a itemprop="url" href="<?php /*echo esc_url(get_permalink($back_to_link)); */?>">
                    <span class="social_flickr"></span>
                </a>
            </div>
        <?php /*endif; */?>

        <?php /*if(get_next_post() !== '') : */?>
            <div class="mkd-ps-next">
                <?php /*if($nav_same_category) {
                    next_post_link('%link', '<span class="mkd-ps-nav-mark ion-ios-arrow-thin-right"></span>', true, '', 'portfolio-category');
                } else {
                    next_post_link('%link', '<span class="mkd-ps-nav-mark ion-ios-arrow-thin-right"></span>');
                } */?>
            </div>
        <?php /*endif; */?>
    </div>
--><?php /*endif; */?>


<?php if (industrialist_mikado_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>

    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = industrialist_mikado_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    ?>

    <div class="mkd-portfolio-single-nav">
        <?php if (get_previous_post() !== '') : ?>

            <?php
            $previous_post_link = wp_get_attachment_image(get_post_thumbnail_id(get_previous_post()->ID), 'industrialist_mikado_thumb', '', array('class' => 'nav-image'));
            $previous_post_link .= '<div class="nav-item">';
            $previous_post_link .= '<h5>' . get_previous_post()->post_title . '</h5>';
            $previous_post_link .= '<span class="fa fa-angle-left"></span>';
            $previous_post_link .= '<h6>' . esc_html__('Previous project', 'industrialist') . '</h6>';
            $previous_post_link .= '</div>';
            ?>

            <div class="mkd-portfolio-prev">
                <?php if ($nav_same_category): ?>
                    <?php previous_post_link('%link', "$previous_post_link", true, '', 'portfolio_category'); ?>
                <?php else: ?>
                    <?php previous_post_link('%link', "$previous_post_link"); ?>
                <?php endif; ?>
            </div>

        <?php endif; ?>

        <?php if ($back_to_link !== '') : ?>
            <div class="mkd-portfolio-back-btn">
                <a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                    <span class="icon_grid-2x2"></span>
                </a>
            </div>
        <?php endif; ?>

        <?php if (get_next_post() !== '') : ?>

            <?php
            $next_post_link = '<div class="nav-item">';
            $next_post_link .= '<h5>' . get_next_post()->post_title . '</h5>';
            $next_post_link .= '<h6>' . esc_html__('Next project', 'industrialist') . '</h6>';
            $next_post_link .= '<span class="fa fa-angle-right"></span>';
            $next_post_link .= '</div>';
            $next_post_link .= wp_get_attachment_image(get_post_thumbnail_id(get_next_post()->ID), 'industrialist_mikado_thumb', '', array('class' => 'nav-image'));
            ?>

            <div class="mkd-portfolio-next">
                <?php if ($nav_same_category) {
                    next_post_link('%link', "$next_post_link", true, '', 'portfolio_category');
                } else {
                    next_post_link('%link', "$next_post_link");
                } ?>
            </div>
        <?php endif; ?>
    </div>

<?php endif; ?>
