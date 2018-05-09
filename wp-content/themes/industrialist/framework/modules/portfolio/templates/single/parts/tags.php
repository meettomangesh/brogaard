<?php

$tags = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$tag_names = array();

if (is_array($tags) && count($tags)) : ?>

    <div class="mkd-portfolio-info-item mkd-portfolio-tags">
        <h5 class="mkd-portfolio-info-title"><?php esc_html_e('Tags:', 'industrialist'); ?></h5>

        <?php foreach ($tags as $tag) : ?>
            <h6>
                <a itemprop="url" class="mkd-portfolio-info-tag" href="<?php echo esc_url(get_term_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>
            </h6>
        <?php endforeach; ?>

    </div>

<?php endif; ?>