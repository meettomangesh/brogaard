<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <div class="mkd-post-quote-holder" style="background-image: url(' <?php echo esc_url($params['quote_image'][0]); ?> ')">
            <div class="mkd-post-text">
                <div class="mkd-post-text-inner">

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

                    <div class="mkd-post-mark">
                        <span class="icon_quotations quote_mark"></span>
                    </div>
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