<?php /* Comments Template */
if (post_password_required()) {
	return;
}
$comments_by_type = separate_comments($comments);
if (have_comments()) {
	if (!empty($comments_by_type['comment'])) {
		$comment_count = count($comments_by_type['comment']); ?>
		<h4 class="comment-section-title"><?php printf(_n('1 Comment on %2$s', '%1$s Comments on %2$s', $comment_count, 'mh-elegance-lite'), number_format_i18n($comment_count), get_the_title()); ?></h4>
		<ol class="commentlist">
			<?php echo wp_list_comments('callback=mh_elegance_lite_comments&type=comment'); ?>
		</ol><?php
	}
	if (get_comments_number() > get_option('comments_per_page')) { ?>
		<div class="comments-pagination">
			<?php paginate_comments_links(array('prev_text' => __('&laquo;', 'mh-elegance-lite'), 'next_text' => __('&raquo;', 'mh-elegance-lite'))); ?>
		</div><?php
	}
	if (!empty($comments_by_type['pings'])) {
		$pings = $comments_by_type['pings'];
		$ping_count = count($comments_by_type['pings']); ?>
		<h4 class="comment-section-title"><?php printf(__('%s Trackbacks & Pingbacks', 'mh-elegance-lite'), $ping_count); ?></h4>
		<ol class="pinglist">
        <?php foreach ($pings as $ping) { ?>
			<li class="pings"><i class="fa fa-link"></i><?php echo get_comment_author_link($ping); ?></li>
        <?php } ?>
        </ol><?php
	}
	if (!comments_open()) { ?>
		<p class="no-comments"><?php _e('Comments are closed.', 'mh-elegance-lite'); ?></p><?php
	}
}
if (comments_open()) {
	$custom_args = array(
    	'title_reply' => __('Leave a comment', 'mh-elegance-lite'),
        'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published.', 'mh-elegance-lite') . '</p>',
        'comment_notes_after'  => '',
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('Comment', 'mh-elegance-lite') . '</label><br/><textarea id="comment" name="comment" cols="45" rows="5" aria-required="true"></textarea></p>');
	comment_form($custom_args);
}
?>