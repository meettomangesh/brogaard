<?php

$params['display_excerpt'] = $display_excerpt;
$params['excerpt_length'] = $excerpt_length;
$params['display_date'] = $display_date;
$params['display_categories'] = $display_categories;
$params['display_share'] = $display_share;

?>

<div class="mkd-blog-list-holder <?php echo esc_attr($holder_classes) ?>">
    <ul class="mkd-blog-list">
        <?php if ($type == 'masonry') { ?>
            <li class="mkd-blog-list-masonry-grid-sizer"></li>
            <li class="mkd-blog-list-masonry-grid-gutter"></li>
        <?php }
        $html = '';
        if ($query_result->have_posts()):
            while ($query_result->have_posts()) : $query_result->the_post();
                $html .= industrialist_mikado_get_shortcode_module_template_part('templates/' . $type, 'blog-list', '', $params);
            endwhile;
            print $html;
        else: ?>
            <div class="mkd-blog-list-messsage">
                <p><?php esc_html_e('No posts were found.', 'industrialist'); ?></p>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </ul>
</div>
