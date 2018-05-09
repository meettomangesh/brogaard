<?php if (industrialist_mikado_options()->getOptionValue('enable_social_share') == 'yes' && industrialist_mikado_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="mkd-portfolio-info-item mkd-portfolio-social">
        <h5 class="mkd-portfolio-info-title"><?php esc_html_e('Share: ', 'industrialist'); ?></h5>
        <?php echo industrialist_mikado_get_social_share_html() ?>
    </div>
<?php endif; ?>