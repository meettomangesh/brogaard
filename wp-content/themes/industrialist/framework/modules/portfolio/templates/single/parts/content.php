<div class="mkd-portfolio-info-item">
    <h3 class="mkd-portfolio-title"><?php the_title(); ?></h3>

    <?php if (industrialist_mikado_options()->getOptionValue('portfolio_single_hide_separator') !== 'yes') {

        $separator_params['position'] = 'left';

        echo industrialist_mikado_execute_shortcode('mkd_separator', $separator_params);
    } ?>

    <div class="mkd-portfolio-content">
        <?php the_content(); ?>
    </div>
</div>