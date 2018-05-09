<?php
	/*
	    Template Name: Blog: Masonry Full Width
	*/

    get_header();
    industrialist_mikado_get_title();
    get_template_part('slider');

?>


<div class="mkd-full-width">
    <div class="mkd-full-width-inner clearfix">
        <?php industrialist_mikado_get_blog('masonry-full-width'); ?>
    </div>
</div>


<?php get_footer(); ?>