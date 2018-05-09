<?php
$slider_shortcode = get_post_meta(industrialist_mikado_get_page_id(), 'mkd_page_slider_meta', true);
if (!empty($slider_shortcode)) { 
	echo do_shortcode(wp_kses_post($slider_shortcode)); // XSS OK 
} 
?>