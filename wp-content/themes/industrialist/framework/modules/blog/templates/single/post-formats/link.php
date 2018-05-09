<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <div class="mkd-post-link-holder" style="background-image: url(' <?php echo esc_url($params['link_image'][0]); ?> ')">
            <div class="mkd-post-text">
                <div class="mkd-post-text-inner">

                    <a itemprop="url" href="<?php echo esc_html(get_post_meta(get_the_ID(), "mkd_post_link_link_meta", true)); ?>" title="<?php the_title_attribute(); ?>">
                        <div class="mkd-post-mark">
                            <span class="icon_link_alt"></span>
                        </div>

                        <?php industrialist_mikado_get_module_template_part('templates/single/parts/title', 'blog'); ?>
                    </a>

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
            <div class="mkd-post-overlay"></div>
        </div>
        <div class="mkd-post-content-text">
            <?php the_content(); ?>
        </div>
    </div>
</article>