<div class="mkd-testimonial-content" id="mkd-testimonials-<?php echo esc_attr($current_id) ?>">
    <div class="mkd-testimonial-text-holder">
        <?php if(!empty($title)) { ?>
            <h2 class="mkd-testimonial-title"><?php echo esc_html($title); ?></h2>
        <?php } ?>
        <?php if(!empty($text)) { ?>
            <p class="mkd-testimonial-text"><?php echo esc_html($text); ?></p>
        <?php } ?>
        <?php if(!empty($author)) { ?>
            <h4 class="mkd-testimonial-author"><?php echo esc_html($author); ?></h4>
        <?php } ?>
    </div>
    <?php if(has_post_thumbnail()) { ?>
        <div class="mkd-testimonial-image">
            <?php echo get_the_post_thumbnail(get_the_ID(), array(66, 66)); ?>
        </div>
    <?php } ?>
</div>