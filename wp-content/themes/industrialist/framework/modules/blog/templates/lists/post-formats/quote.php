<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix '.$background_image_class); ?>>
    <?php industrialist_mikado_post_date(array(
        'date' => industrialist_mikado_date_position($display_date, $date_outside, 'outside', $blog_type),
    )) ?>
    <div class="mkd-post-content" style="background-image: url(' <?php echo esc_url($params['quote_image'][0]); ?> ')">
        <div class="mkd-post-text">
            <div class="mkd-post-text-inner">
                <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php if($quote_text != '') { ?>
                        <h3 class="mkd-post-title">
                            <?php echo esc_html($quote_text); ?>
                        </h3>
                        <h5 itemprop="name" class="quote-author entry-title">&mdash; <?php the_title(); ?></h5>

                    <?php } else { ?>
                        <h3 class="mkd-post-title">
                            <?php the_title() ?>
                        </h3>
                    <?php } ?>
                </a>
                <div class="mkd-post-mark">
                    <span class="icon_quotations quote_mark"></span>
                </div>
                <div class="mkd-post-info clearfix">
                    <?php industrialist_mikado_post_info(array(
                        'date' => industrialist_mikado_date_position($display_date, $date_outside, 'inside', $blog_type),
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
</article>