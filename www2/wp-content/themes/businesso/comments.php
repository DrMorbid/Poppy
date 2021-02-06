<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'businesso' ); ?></p>
	<?php return; endif; ?>
         <?php if ( have_comments() ) : ?>
		<div class="comment_section animate" data-anim-type="fadeInUp" data-anim-delay="600">
			<div class="comment_title">
				<h3><i class="fa fa-comments">
				<?php echo comments_number(__('No Comments','businesso'), __('1 Comment','businesso'), '% Comments'); ?>
			</i></h3></div>
			<div class="media comment_box">
			
					<ul>
						<li>
							<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>		
							<?php endif; ?>
							<?php wp_list_comments( array( 'callback' => 'asiathemes_comment' ) ); ?>
						</li>
					</ul>
				
		</div>
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'businesso' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'businesso' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'businesso' ) ); ?></div>
		</nav>
		<?php endif;  ?>
		<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : 
        //_e("Comments Are Closed!!!",'businesso');
		?>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e("You must be",'businesso'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in",'businesso')?></a> <?php _e('to post a comment','businesso'); ?>
</p>
<?php else : ?>
	<div class="comment_form_section animate" data-anim-type="fadeInUp" data-anim-delay="800">
	<?php  
	  $fields=array(
		'author' => '<div class="form_group">
								<label for="author">Name<small>*</small></label>
								<input type="text" name="author" id="author" class="con_input_control">
							</div>',
		'email' => '<div class="form_group">
								<label for="email">Email<small>*</small></label>
								<input type="text" name="email" id="email" class="con_input_control">
							</div>',
	);
	function my_fields($fields) { 
		return $fields;
	}
	add_filter('asiathemes_comment_form_default_fields','my_fields');
		$defaults = array(
		'fields'=> apply_filters( 'asiathemes_comment_form_default_fields', $fields ),
		'comment_field'=> '<div class="form_group">
								<label for="message">Comment</label>
								<textarea class="con_textarea_control" id="comment" name="comment" cols="45" rows="8"></textarea>
							</div>',		
		'logged_in_as' => '<p class="logged-in-as">' . __( "Logged in as ",'businesso' ).'<a href="'. admin_url( 'profile.php' ).'">'.$user_identity.'</a>'. '<a href="'. wp_logout_url( get_permalink() ).'" title="Log out of this account">'.__(" Log out?",'businesso').'</a>' . '</p>',
		'title_reply_to' => __( 'Leave a Reply to %s','businesso'),
		'class_submit' => 'main-btn btn-more btn-left',
		'label_submit'=>__( 'Send Message','businesso'),
		'comment_notes_before'=> '',
		'comment_notes_after'=>'',
		'title_reply'=> '<h2>'.__('Leave a Reply','businesso').'</h2>',		
		'role_form'=> 'form',		
		);
	comment_form($defaults);?>						
	</div>
<?php endif; // If registration required and not logged in ?>
<?php endif;  ?>