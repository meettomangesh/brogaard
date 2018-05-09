<?php
/*
Template Name: Landing Page
*/
$sidebar = industrialist_mikado_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        /**
         * industrialist_mikado_header_meta hook
         *
         * @see industrialist_mikado_header_meta() - hooked with 10
         * @see mkd_user_scalable_meta() - hooked with 10
         */
        if (!industrialist_mikado_is_ajax_request()) do_action('industrialist_mikado_header_meta');
        ?>

        <?php if (!industrialist_mikado_is_ajax_request()) wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

<?php 
if ((!industrialist_mikado_is_ajax_request()) && industrialist_mikado_options()->getOptionValue('smooth_page_transitions') == "yes") { 
	$ajax_class = industrialist_mikado_options()->getOptionValue('smooth_pt_true_ajax') === 'no' ? 'mkd-mimic-ajax' : 'mkd-ajax';
?>
<div class="mkd-smooth-transition-loader <?php echo esc_attr($ajax_class); ?>">
    <div class="mkd-st-loader">
        <div class="mkd-st-loader1">
            <?php industrialist_mikado_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="mkd-wrapper">
	<div class="mkd-wrapper-inner">
		<div class="mkd-content">
            <?php if(industrialist_mikado_is_ajax_enabled()) { ?>
            <div class="mkd-meta">
                <?php do_action('industrialist_mikado_ajax_meta'); ?>
                <span id="mkd-page-id"><?php echo esc_html(get_queried_object_id()); ?></span>
                <div class="mkd-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
			<div class="mkd-content-inner">
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part('slider');?>
				<div class="mkd-full-width">
					<div class="mkd-full-width-inner">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(($sidebar == 'default')||($sidebar == '')) : ?>
								<?php the_content(); ?>
								<?php do_action('industrialist_mikado_page_after_content'); ?>
							<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
								<div <?php echo industrialist_mikado_sidebar_columns_class(); ?>>
									<div class="mkd-column1 mkd-content-left-from-sidebar">
										<div class="mkd-column-inner">
											<?php the_content(); ?>
											<?php do_action('industrialist_mikado_page_after_content'); ?>
										</div>
									</div>
									<div class="mkd-column2">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php elseif($sidebar == 'sidebar-33-left' || $sidebar == 'sidebar-25-left'): ?>
								<div <?php echo industrialist_mikado_sidebar_columns_class(); ?>>
									<div class="mkd-column1">
										<?php get_sidebar(); ?>
									</div>
									<div class="mkd-column2 mkd-content-right-from-sidebar">
										<div class="mkd-column-inner">
											<?php the_content(); ?>
											<?php do_action('industrialist_mikado_page_after_content'); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>