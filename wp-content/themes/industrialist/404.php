<?php get_header(); ?>

    <div class="mkd-container">
        <?php do_action('industrialist_mikado_after_container_open'); ?>
        <div class="mkd-container-inner mkd-404-page">
            <div class="mkd-page-not-found">

                <?php if (industrialist_mikado_options()->getOptionValue('404_image')): ?>
                    <img src="<?php echo industrialist_mikado_options()->getOptionValue('404_image'); ?>" alt="">
                <?php endif; ?>

                <h2>
                    <?php if (industrialist_mikado_options()->getOptionValue('404_title')) : ?>
                        <?php echo esc_html(industrialist_mikado_options()->getOptionValue('404_title')); ?>
                    <?php else: ?>
                        <?php esc_html_e('Page you are looking is not found', 'industrialist'); ?>
                    <?php endif; ?>
                </h2>
                <p>
                    <?php if (industrialist_mikado_options()->getOptionValue('404_text')) : ?>
                        <?php echo esc_html(industrialist_mikado_options()->getOptionValue('404_text')); ?>
                    <?php else:
                        esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'industrialist');
                    endif; ?>
                </p>

                <?php
                $params = array();
                if (industrialist_mikado_options()->getOptionValue('404_back_to_home')) {
                    $params['text'] = industrialist_mikado_options()->getOptionValue('404_back_to_home');
                } else {
                    $params['text'] = esc_html__("Back to Home Page", 'industrialist');
                }
                $params['link'] = esc_url(home_url('/'));
                $params['target'] = '_self';
                $params['type'] = 'solid';
                echo industrialist_mikado_execute_shortcode('mkd_button', $params); ?>

            </div>
        </div>
        <?php do_action('industrialist_mikado_before_container_close'); ?>
    </div>
<?php get_footer(); ?>