<?php $sidebar = industrialist_mikado_sidebar_layout(); ?>
<?php get_header(); ?>
<?php

$blog_page_range = industrialist_mikado_get_blog_page_range();
$max_number_of_pages = industrialist_mikado_get_max_number_of_pages();
$industrialist_custom_thumb_image_width = 127;
$industrialist_custom_thumb_image_height = 107;

if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
?>
<?php industrialist_mikado_get_title(); ?>
    <div class="mkd-container">
        <?php do_action('industrialist_mikado_after_container_open'); ?>
        <div class="mkd-container-inner clearfix">
            <div class="mkd-container">
                <?php do_action('industrialist_mikado_after_container_open'); ?>
                <div class="mkd-container-inner">
                    <div class="mkd-two-columns-66-33 mkd-content-has-sidebar clearfix">
                        <div class="mkd-column1 mkd-content-left-from-sidebar">
                            <div class="mkd-column-inner">

                                <h4 class="mkd-search-results-holder">
                                    <?php if (get_search_query() != '') { ?>
                                        <span>
                                        <?php echo get_search_query() . " - " . esc_html__('Search Results', 'industrialist') ?>
                                    </span>
                                    <?php } else {
                                        echo esc_html__('Search Results', 'industrialist');
                                    }   ?>

                                </h4>
                                <div class="mkd-search-label-holder">
                                    <span class="mkd-search-label"><?php esc_html_e("If you're not happy with the results, please do another search", 'industrialist'); ?></span>
                                </div>
                                <form action="<?php echo esc_url(home_url('/')); ?>" class="mkd-search-page-form" method="get">
                                    <div class="mkd-search-page-form-holder">
                                        <div class="mkd-search-page-form-inner-column-1">
                                            <input type="text"  name="s" class="mkd-search-field" placeholder="<?php echo esc_html__('Search', 'industrialist') ?>" autocomplete="off" />
                                        </div>
                                        <div class="mkd-search-page-form-inner-column-2">
                                            <button class="mkd-search-submit" type="submit" value="Search">
                                                <span class="icon_search"></span>
                                            </button>
                                        </div>


                                    </div>
                                </form>

                                <div class="mkd-blog-holder mkd-blog-type-standard">
                                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="mkd-post-image-holder">
                                                    <div class="mkd-post-image-holder-inner">
                                                        <a itemprop="url" class="mkd-post-image-link" href="<?php echo esc_url(get_permalink()); ?>" target="_self" style="width:<?php echo industrialist_mikado_filter_px($industrialist_custom_thumb_image_width)?>px">
                                                            <?php echo industrialist_mikado_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $industrialist_custom_thumb_image_width, $industrialist_custom_thumb_image_height); ?>
                                                        </a>
                                                    </div><!-- .mkd-post-image-holder-inner -->
                                                </div><!-- .mkd-post-image-holder -->
                                            <?php } ?>

                                            <div class="mkd-post-content">
                                                <div class="mkd-post-text">
                                                    <div class="mkd-post-text-inner">
                                                        <h5 itemprop="name" class="entry-title">
                                                            <a itemprop="url" href="<?php the_permalink(); ?>"
                                                               title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                                        </h5>

                                                        <div itemprop="description" class="mkd-pt-excerpt">
                                                            <p itemprop="description" class="mkd-post-excerpt"><?php echo esc_html(rtrim(substr(get_the_excerpt(), 0, 300))); ?>...</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endwhile; ?>
                                        <?php
                                        if (industrialist_mikado_options()->getOptionValue('pagination') == 'yes') {
                                            industrialist_mikado_pagination($max_number_of_pages, $blog_page_range, $paged);
                                        }
                                        ?>
                                    <?php else: ?>
                                        <div class="entry">
                                            <p><?php esc_html_e('No posts were found.', 'industrialist'); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="mkd-column2">
                            <?php get_sidebar(); ?>
                        </div>
                        <?php do_action('industrialist_mikado_before_container_close'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php do_action('industrialist_mikado_before_container_close'); ?>
    </div>
<?php get_footer(); ?>