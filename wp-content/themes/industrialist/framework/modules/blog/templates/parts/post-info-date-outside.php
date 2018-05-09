<div itemprop="dateCreated" class="mkd-post-info-date entry-date updated">

    <?php if (!industrialist_mikado_post_has_title()) : ?>
    <a itemprop="url" href="<?php the_permalink() ?>">
        <?php endif; ?>

        <?php /* this is hardcoded due the theme design */ ?>
        <div class="month"><?php the_time('M'); ?></div>
        <div class="day"><?php the_time('d'); ?></div>
        <div class="year"><?php the_time('Y'); ?></div>

        <?php if (!industrialist_mikado_post_has_title()) : ?>
    </a>
<?php endif; ?>

    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(industrialist_mikado_get_page_id()); ?>"/>

</div>