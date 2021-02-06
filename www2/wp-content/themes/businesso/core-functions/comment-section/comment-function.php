<?php
// code for comment
if ( ! function_exists( 'asiathemes_comment' ) ) :
function asiathemes_comment( $comment, $args, $depth ) 
{
	$GLOBALS['comments'] = $comment;
	//get theme data
	global $comment_data;

	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	__('Reply','businesso');?>
	<div class="comment_section animate" data-anim-type="fadeInUp" data-anim-delay="600">
		<div class="media comment_box">
			<a class="pull_left_comment" href="#">
			   <?php echo get_avatar($comment,$size = '75'); ?>
			</a>
			<div class="media-body">
				<div class="comment_detail">
				<h4 class="comment_detail_title"><?php the_author();?></h4>
				<span class="comment_date"><?php comment_date('F j, Y');?>&nbsp;<?php _e('at','businesso');?>&nbsp;<?php comment_time('g:i a'); ?></span>
				<p><?php comment_text() ;?></p>
				<div class="reply"><a href="#"><i class="fa fa-mail-reply"></i><?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></div>
			
			
			</div>
			</div>
			</div>
		</div>
<?php
}
endif;
add_filter('get_avatar','asiathemes_add_gravatar_class');
function asiathemes_add_gravatar_class($class) {
    $class = str_replace("class='comment_img'", "class='author-image'", $class);
    return $class;
}
?>