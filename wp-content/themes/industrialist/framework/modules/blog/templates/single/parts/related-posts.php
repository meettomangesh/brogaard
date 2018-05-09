<div class="mkd-related-posts-holder <?php echo esc_attr($related_posts_columns) ?>">
	<?php if ( $related_posts && $related_posts->have_posts() ) : ?>
		<div class="mkd-related-posts-title">
			<h4>
				<?php esc_html_e( 'Related Posts', 'industrialist' ); ?>
			</h4>
		</div>
		<div class="mkd-related-posts-inner clearfix">

			<?php while ( $related_posts->have_posts() ) :

				$related_posts->the_post();
				$related_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
				?>
				<div class="mkd-related-post">

					<?php if ( has_post_thumbnail() ) {	?>
						<a itemprop="url" href="<?php the_permalink(); ?> ">
                            <?php
                            if ($related_posts_image_size == '') {
                                echo get_the_post_thumbnail(get_the_ID(), 'industrialist_mikado_square');
                            } else {
                                echo industrialist_mikado_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $related_posts_image_size, $related_posts_image_size);
                            }
                            ?>
						</a>
					<?php } ?>

					<div class="mkd-related-post-title-holder">
						<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_title( '<h4 itemprop="name" class="mkd-related-post-title entry-title">', '</h4>' ); ?>
						</a>
					</div>
					<div class="mkd-related-post-excerpt">
						<?php industrialist_mikado_excerpt(4); ?>
					</div>
				</div>
				<?php
			endwhile; ?>
		</div>
	<?php endif;
	wp_reset_postdata();
	?>
</div>