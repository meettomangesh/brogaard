<div itemprop="dateCreated" class="mkd-post-info-date entry-date updated">

    <?php if (!industrialist_mikado_post_has_title()) : ?>
    <a itemprop="url" href="<?php the_permalink() ?>">
        <?php endif; ?>

        <?php the_time(get_option('date_format')); ?>

        <?php if (!industrialist_mikado_post_has_title()) : ?>
    </a>
<?php endif; ?>

    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(industrialist_mikado_get_page_id()); ?>"/>

</div>