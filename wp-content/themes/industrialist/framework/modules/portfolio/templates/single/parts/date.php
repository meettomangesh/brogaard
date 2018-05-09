<?php if (industrialist_mikado_options()->getOptionValue('portfolio_single_date') === 'yes') : ?>

    <div class="mkd-portfolio-info-item mkd-portfolio-date">
        <h5 class="mkd-portfolio-info-title"><?php esc_html_e('Date:', 'industrialist'); ?></h5>
        <h6 itemprop="dateCreated"><?php the_time(get_option('date_format')); ?></h6>
        <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(industrialist_mikado_get_page_id()); ?>"/>
    </div>

<?php endif; ?>
