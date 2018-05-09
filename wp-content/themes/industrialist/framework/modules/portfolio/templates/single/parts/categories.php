<?php if (industrialist_mikado_options()->getOptionValue('portfolio_single_hide_categories') !== 'yes') : ?>

    <?php
    $categories = wp_get_post_terms(get_the_ID(), 'portfolio-category');
    $categy_names = array();

    if (is_array($categories) && count($categories)) :
        foreach ($categories as $category) {
            $categy_names[] = $category->name;
        }

        ?>
        <div class="mkd-portfolio-info-item mkd-portfolio-categories">
            <h5 class="mkd-portfolio-info-title"><?php esc_html_e('Category:', 'industrialist'); ?></h5>

            <?php foreach ($categories as $cat) : ?>
                <h6 class="mkd-portfolio-info-category">
                    <a itemprop="url" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
                </h6>
            <?php endforeach; ?>

        </div>
    <?php endif; ?>

<?php endif; ?>