<?php
if (isset($title_tag)) {
    $title_tag = $title_tag;
} else {
    $title_tag = 'h3';
}

?>
<<?php echo esc_attr($title_tag); ?> itemprop="name" class="entry-title mkd-post-title">
<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
</<?php echo esc_attr($title_tag); ?>>