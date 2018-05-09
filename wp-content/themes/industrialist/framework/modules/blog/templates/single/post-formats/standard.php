<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <div class="mkd-post-image-holder">

            <?php
            industrialist_mikado_get_module_template_part('templates/lists/parts/image', 'blog');
            industrialist_mikado_post_info(array(
                'category' => $display_category,
            ));
            ?>

        </div>
        <div class="mkd-post-text">
            <div class="mkd-post-text-inner">

                <?php
                industrialist_mikado_get_module_template_part('templates/single/parts/title', 'blog');
                industrialist_mikado_get_blog_list_separator(array('separator' => $display_separator));

                the_content();

                $args_pages = array(
                    'before' => '<div class="mkd-single-links-pages"><div class="mkd-single-links-pages-inner">',
                    'after' => '</div></div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'pagelink' => '%'
                );

                wp_link_pages($args_pages);
                ?>

                <div class="mkd-post-info clearfix">
                    <?php industrialist_mikado_post_info(array(
                        'date' => $display_date,
                        'author' => $display_author,
                        'comments' => $display_comments,
                        'share' => $display_share,
                        'like' => $display_like,
                    )) ?>
                </div>

            </div>
        </div>
    </div>
    <?php do_action('industrialist_mikado_before_blog_article_closed_tag'); ?>
</article>