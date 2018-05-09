<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

$id = get_option('woocommerce_shop_page_id');
$shop = get_post($id);
$sidebar = industrialist_mikado_sidebar_layout();

if(get_post_meta($id, 'mkd_page_background_color', true) != ''){
	$background_color = 'background-color: '.esc_attr(get_post_meta($id, 'mkd_page_background_color', true));
}else{
	$background_color = '';
}

$content_style = '';
if(get_post_meta($id, 'mkd_content-top-padding', true) != '') {
	if(get_post_meta($id, 'mkd_content-top-padding-mobile', true) == 'yes') {
		$content_style = 'padding-top:'.esc_attr(get_post_meta($id, 'mkd_content-top-padding', true)).'px !important';
	} else {
		$content_style = 'padding-top:'.esc_attr(get_post_meta($id, 'mkd_content-top-padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

get_header();

industrialist_mikado_get_title();
do_action('industrialist_mikado_before_slider_action');
get_template_part('slider');
do_action('industrialist_mikado_after_slider_action');

//Woocommerce content
if ( ! is_singular('product') ) { ?>
	<div class="mkd-container" <?php industrialist_mikado_inline_style($background_color); ?>>
		<div class="mkd-container-inner clearfix" <?php industrialist_mikado_inline_style($content_style); ?>>
			<?php
			switch( $sidebar ) {
				case 'sidebar-33-right': ?>
					<div class="mkd-two-columns-66-33 mkd-content-has-sidebar mkd-woocommerce-with-sidebar clearfix">
						<div class="mkd-column1">
							<div class="mkd-column-inner">
								<?php industrialist_mikado_woocommerce_content(); ?>
							</div>
						</div>
						<div class="mkd-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-25-right': ?>
					<div class="mkd-two-columns-75-25 mkd-content-has-sidebar mkd-woocommerce-with-sidebar clearfix">
						<div class="mkd-column1 mkd-content-left-from-sidebar">
							<div class="mkd-column-inner">
								<?php industrialist_mikado_woocommerce_content(); ?>
							</div>
						</div>
						<div class="mkd-column2">
							<?php get_sidebar();?>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-33-left': ?>
					<div class="mkd-two-columns-33-66 mkd-content-has-sidebar mkd-woocommerce-with-sidebar clearfix">
						<div class="mkd-column1">
							<?php get_sidebar();?>
						</div>
						<div class="mkd-column2">
							<div class="mkd-column-inner">
								<?php industrialist_mikado_woocommerce_content(); ?>
							</div>
						</div>
					</div>
				<?php
					break;
				case 'sidebar-25-left': ?>
					<div class="mkd-two-columns-25-75 mkd-content-has-sidebar mkd-woocommerce-with-sidebar clearfix">
						<div class="mkd-column1">
							<?php get_sidebar();?>
						</div>
						<div class="mkd-column2 mkd-content-right-from-sidebar">
							<div class="mkd-column-inner">
								<?php industrialist_mikado_woocommerce_content(); ?>
							</div>
						</div>
					</div>
				<?php
					break;
				default:
					industrialist_mikado_woocommerce_content();
			} ?>		
		</div>
	</div>			
<?php } else { ?>
	<div class="mkd-container" <?php industrialist_mikado_inline_style($background_color); ?>>
		<div class="mkd-container-inner clearfix" <?php industrialist_mikado_inline_style($content_style); ?>>
			<?php industrialist_mikado_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>