<?php
    /*
        Template Name: Blog: Standard
    */

    get_header();
    industrialist_mikado_get_title();
    get_template_part('slider');

?>


<div class="mkd-container">
    <?php do_action('industrialist_mikado_after_container_open'); ?>
    <div class="mkd-container-inner" >
        <?php industrialist_mikado_get_blog('standard'); ?>
    </div>
    <?php do_action('industrialist_mikado_before_container_close'); ?>
</div>
<?php get_footer(); ?>