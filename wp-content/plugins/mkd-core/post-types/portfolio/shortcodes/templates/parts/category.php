<?php if ($enable_category === 'yes') {
    $categories = wp_get_post_terms($params['current_id'], 'portfolio-category');

    if (!empty($categories)) { ?>
        <div class="mkd-pli-category-holder">
            <?php foreach ($categories as $cat) { ?>
                <h6>
                    <a itemprop="url" class="mkd-pli-category" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
                </h6>
            <?php } ?>
        </div>
    <?php } ?>
<?php } ?>