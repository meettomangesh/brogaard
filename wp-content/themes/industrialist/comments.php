<div class="mkd-comment-holder clearfix <?php if ( !have_comments() && !comments_open() ) { echo "mkd-comment-holder-without-comments"; } ?>" id="comments">
	<div class="mkd-comment-number">
		<div class="mkd-comment-number-inner">
			<h5><?php comments_number( esc_html__('No Comments','industrialist'), '1'.esc_html__(' Comment ','industrialist'), '% '.esc_html__(' Comments ','industrialist')); ?></h5>
		</div>
	</div>
<div class="mkd-comments">
<?php if ( post_password_required() ) : ?>
				<p class="mkd-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'industrialist' ); ?></p>
			</div></div>
<?php
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>

	<ul class="mkd-comment-list">
		<?php wp_list_comments(array( 'callback' => 'industrialist_mikado_comment')); ?>
	</ul>


<?php // End Comments ?>

 <?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->

	 
		<!-- If comments are closed. -->
		<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'industrialist'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div></div>
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> esc_html__( 'Post a Comment','industrialist' ),
	'title_reply_to' => esc_html__( 'Post a Reply to %s','industrialist' ),
	'cancel_reply_link' => esc_html__( 'Cancel Reply','industrialist' ),
	'label_submit' => esc_html__( 'Submit','industrialist' ),
	'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Write your comment here...','industrialist' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="mkd-three-columns clearfix"><div class="mkd-three-columns-inner"><div class="mkd-column"><div class="mkd-column-inner"><input id="author" name="author" placeholder="'. esc_html__( 'Your full name','industrialist' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>',
		'url' => '<div class="mkd-column"><div class="mkd-column-inner"><input id="email" name="email" placeholder="'. esc_html__( 'E-mail address','industrialist' ) .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div></div>',
		'email' => '<div class="mkd-column"><div class="mkd-column-inner"><input id="url" name="url" type="text" placeholder="'. esc_html__( 'Website','industrialist' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div></div>'
		 ) ) );
 ?>
<?php if(get_comment_pages_count() > 1){
	?>
	<div class="mkd-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
 <div class="mkd-comment-form">
	<?php comment_form($args); ?>
</div>
								
							


