<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
    <?php industrialist_mikado_post_date(array(
        'date' => industrialist_mikado_date_position($display_date, $date_outside, 'outside', $blog_type),
    )) ?>
    <div class="mkd-post-content">

        <?php if ( has_post_thumbnail() ) { ?>

        <div class="mkd-post-image-holder">
            <div class="mkd-icon-holder">
                <div class="mkd-icon"><span class="icon_music"></span></div>

                <?php
                industrialist_mikado_get_module_template_part('templates/lists/parts/image', 'blog');
                industrialist_mikado_get_module_template_part('templates/parts/audio', 'blog');
                industrialist_mikado_post_info(array(
                    'category' => $display_category,
                ));
                ?>

            </div>
        </div>

        <?php } else {

            industrialist_mikado_post_info(array(
                'category' => $display_category,
            ));

        } ?>

        <div class="mkd-post-text">
            <div class="mkd-post-text-inner">
                <?php

                industrialist_mikado_get_module_template_part('templates/lists/parts/title', 'blog');
                industrialist_mikado_get_blog_single_separator(array('separator' => $display_separator));

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
                        'date' => industrialist_mikado_date_position($display_date, $date_outside, 'inside', $blog_type),
                        'author' => $display_author,
                        'comments' => $display_comments,
                        'share' => $display_share,
                        'like' => $display_like,
                    )) ?>
                </div>

                <?php
                if ($display_read_more == 'yes') {
                    industrialist_mikado_read_more_button();
                }
                ?>

            </div>
        </div>
    </div>
</article>