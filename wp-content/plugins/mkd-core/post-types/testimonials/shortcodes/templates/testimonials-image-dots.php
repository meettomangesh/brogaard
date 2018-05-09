<div class="mkd-tes-image-nav">
    <?php if ($query_results->have_posts()):
        while ($query_results->have_posts()) : $query_results->the_post(); ?>
            <div class="mkd-tes-image-single">
                <span class="mkd-tes-image-holder">
                    <?php esc_html(the_post_thumbnail('thumbnail')) ?>
                </span>
            </div>
        <?php endwhile;
    else: ?>
        <span><?php esc_html__('Sorry, no posts matched your criteria','mkd-core');?></span>
    <?php endif;
    wp_reset_postdata(); ?>
</div>