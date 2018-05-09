<?php

get_header();
industrialist_mikado_get_title();
do_action('industrialist_mikado_before_slider_action');
get_template_part('slider');
do_action('industrialist_mikado_after_slider_action');
industrialist_mikado_single_portfolio();
get_footer();