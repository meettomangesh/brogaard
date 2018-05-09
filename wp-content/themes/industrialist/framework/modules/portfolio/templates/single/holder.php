<div class="mkd-container">
    <div class="mkd-container-inner clearfix">
        <div class="mkd-portfolio-single-holder <?php echo esc_attr($holder_classes); ?>">
            <?php if(post_password_required()) {
                echo get_the_password_form();
            } else {
	            do_action('industrialist_mikado_portfolio_page_before_content');
	            
                industrialist_mikado_get_module_template_part('templates/single/layout-collections/'.$item_layout, 'portfolio', '', $params);
	
	            do_action('industrialist_mikado_portfolio_page_after_content');
	            
                industrialist_mikado_get_module_template_part('templates/single/parts/navigation', 'portfolio', $item_layout);

                industrialist_mikado_get_module_template_part('templates/single/parts/comments', 'portfolio');
            } ?>
        </div>
    </div>
</div>