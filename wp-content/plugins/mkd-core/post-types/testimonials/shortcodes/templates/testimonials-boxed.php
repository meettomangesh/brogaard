<div class="mkd-testimonial-content" id="mkd-testimonials-<?php echo esc_attr($current_id) ?>" <?php industrialist_mikado_inline_style($box_styles); ?>>
    <div class="mkd-testimonial-text-holder">
        <?php if(!empty($text)) { ?>
            <p class="mkd-testimonial-text"><?php echo esc_html($text); ?></p>
        <?php } ?>
        <?php if(has_post_thumbnail() || !empty($author)) { ?>
            <div class="mkd-testimonials-author-holder clearfix">
                <?php if(has_post_thumbnail()) { ?>
                    <div class="mkd-testimonial-image">
                        <?php echo get_the_post_thumbnail(get_the_ID(), array(85, 85)); ?>
                    </div>
                <?php } ?>
                <?php if(!empty($author)) { ?>
                    <h4 class="mkd-testimonial-author"><span class="mkd-testimonial-author-inner"><?php echo esc_html($author); ?></span></h4>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>