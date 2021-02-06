<?php

/***** Page Title Output *****/

if (!function_exists('mh_elegance_lite_page_title')) {
	function mh_elegance_lite_page_title() {
		if (!is_front_page()) {
			echo '<div class="separator">' . "\n";
			echo '<h1 class="page-title section-title">';
			if (is_archive()) {
				if (is_category() || is_tax()) {
					single_cat_title();
				} elseif (is_tag()) {
					single_tag_title();
				} elseif (is_author()) {
					global $author;
					$user_info = get_userdata($author);
					printf(_x('Articles by %s', 'post author', 'mh-elegance-lite'), esc_attr($user_info->display_name));
				} elseif (is_day()) {
					echo get_the_date();
				} elseif (is_month()) {
					echo get_the_date('F Y');
				} elseif (is_year()) {
					echo get_the_date('Y');
				} elseif (is_post_type_archive()) {
					global $post;
					$post_type = get_post_type_object(get_post_type($post));
					echo $post_type->labels->name;
				} else {
					_e('Archives', 'mh-elegance-lite');
				}
			} else {
				if (is_home()) {
					echo get_the_title(get_option('page_for_posts', true));
				} elseif (is_404()) {
					_e('Page not found (404)', 'mh-elegance-lite');
				} elseif (is_search()) {
					printf(__('Search Results for %s', 'mh-elegance-lite'), esc_attr(get_search_query()));
				} else {
					the_title();
				}
			}
			echo '</h1>' . "\n";
			echo '</div>' . "\n";
		}
	}
}
add_action('mh_elegance_lite_before_page_content', 'mh_elegance_lite_page_title');

/***** Output Post Meta Data *****/

if (!function_exists('mh_elegance_lite_post_meta')) {
	function mh_elegance_lite_post_meta() {
		echo '<p class="entry-meta">' . "\n";
			echo sprintf(_x('Date: %s', 'post date', 'mh-elegance-lite'), '<span class="updated">' . get_the_date() . '</span><br>') . "\n";
			echo sprintf(_x('Author: %s', 'post author', 'mh-elegance-lite'), '<span class="vcard author"><a class="fn" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span><br>') . "\n";
			echo __('Comments:', 'mh-elegance-lite') . ' <span>' . sprintf(_nx('1 Comment', '%1$s Comments', get_comments_number(), 'comments number', 'mh-elegance-lite'), number_format_i18n(get_comments_number())) . '</span><br>' . "\n";
			echo sprintf(__('Categories: %s', 'mh-elegance-lite'), '<span>' . get_the_category_list(', ', '') . '</span>') . "\n";
		echo '</p>' . "\n";
	}
}

/***** Featured Image on Posts *****/

if (!function_exists('mh_elegance_lite_featured_image')) {
	function mh_elegance_lite_featured_image() {
		global $page, $post;
		if (has_post_thumbnail() && $page == '1') {
			$caption_text = get_post(get_post_thumbnail_id())->post_excerpt;
			echo "\n" . '<div class="entry-thumbnail">' . "\n";
				the_post_thumbnail('blog-single');
				if ($caption_text) {
					echo '<span class="wp-caption-text">' . esc_attr($caption_text) . '</span>' . "\n";
				}
			echo '</div>' . "\n";
		}
	}
}

/***** Custom Excerpts *****/

if (!function_exists('mh_elegance_lite_trim_excerpt')) {
	function mh_elegance_lite_trim_excerpt($text = '') {
		$raw_excerpt = $text;
		if ('' == $text) {
			$mh_elegance_lite_options = mh_elegance_lite_theme_options();
			$text = get_the_content('');
			$text = do_shortcode($text);
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
			$excerpt_length = apply_filters('excerpt_length', esc_attr($mh_elegance_lite_options['excerpt_length']));
			$excerpt_more = apply_filters('excerpt_more', '...');
			$text = wp_trim_words($text, $excerpt_length, $excerpt_more);
		}
		return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
	}
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'mh_elegance_lite_trim_excerpt');

/***** Pagination *****/

if (!function_exists('mh_elegance_lite_pagination')) {
	function mh_elegance_lite_pagination() {
		global $wp_query;
	    $big = 9999;
	    $paginate_links = paginate_links(array(
	    	'base' 		=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
	    	'format' 	=> '?paged=%#%',
	    	'current' 	=> max(1, get_query_var('paged')),
	    	'prev_next' => true,
	    	'prev_text' => __('&laquo;', 'mh-elegance-lite'),
	    	'next_text' => __('&raquo;', 'mh-elegance-lite'),
	    	'total' 	=> $wp_query->max_num_pages)
	    );
		if ($paginate_links) {
	    	echo '<div class="pagination clearfix">';
				echo $paginate_links;
			echo '</div>';
		}
	}
}

/***** Pagination for paginated Posts *****/

if (!function_exists('mh_elegance_lite_posts_pagination')) {
	function mh_elegance_lite_posts_pagination($content) {
		if (is_singular() && is_main_query()) {
			$content .= wp_link_pages(array('before' => '<div class="pagination clear">', 'after' => '</div>', 'link_before' => '<span class="pagelink">', 'link_after' => '</span>', 'nextpagelink' => __('&raquo;', 'mh-elegance-lite'), 'previouspagelink' => __('&laquo;', 'mh-elegance-lite'), 'pagelink' => '%', 'echo' => 0));
		}
		return $content;
	}
}
add_filter('the_content', 'mh_elegance_lite_posts_pagination', 1);

/***** Post / Image Navigation *****/

if (!function_exists('mh_elegance_lite_postnav')) {
	function mh_elegance_lite_postnav() {
		global $post;
		$parent_post = get_post($post->post_parent);
		$attachment = is_attachment();
		$previous = ($attachment) ? $parent_post : get_adjacent_post(false, '', true);
		$next = get_adjacent_post(false, '', false);

		if (!$next && !$previous)
		return;

		if ($attachment) {
			$attachments = get_children(array('post_type' => 'attachment', 'post_mime_type' => 'image', 'post_parent' => $parent_post->ID));
			$count = count($attachments);
		}
		if ($attachment && $count == 1) {
			$permalink = get_permalink($parent_post);
			echo '<nav class="post-nav-wrap" role="navigation">' . "\n";
			echo '<ul class="post-nav clearfix">' . "\n";
			echo '<li class="post-nav-prev"><a href="' . $permalink . '"><i class="fa fa-chevron-left"></i>' . __('Back to post', 'mh-elegance-lite') . '</a>';
			echo '</ul>' . "\n";
			echo '</nav>' . "\n";
		} elseif (!$attachment || $attachment && $count > 1) {
			echo '<nav class="post-nav-wrap" role="navigation">' . "\n";
			echo '<ul class="post-nav clearfix">' . "\n";
			echo '<li class="post-nav-prev">' . "\n";
			if ($attachment) {
				previous_image_link('%link', '<i class="fa fa-chevron-left"></i>' . __('Previous image', 'mh-elegance-lite'));
			} else {
				previous_post_link('%link', '<i class="fa fa-chevron-left"></i>' . __('Previous post', 'mh-elegance-lite'));
			}
			echo '</li>' . "\n";
			echo '<li class="post-nav-next">' . "\n";
			if ($attachment) {
				next_image_link('%link', __('Next image', 'mh-elegance-lite') . '<i class="fa fa-chevron-right"></i>');
			} else {
				next_post_link('%link', __('Next post', 'mh-elegance-lite') . '<i class="fa fa-chevron-right"></i>');
			}
			echo '</li>' . "\n";
			echo '</ul>' . "\n";
			echo '</nav>' . "\n";
		}
	}
}

/***** Custom Commentlist *****/

if (!function_exists('mh_elegance_lite_comments')) {
	function mh_elegance_lite_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="vcard meta">
					<?php echo get_avatar($comment->comment_author_email, 70); ?>
					<span class="comment-author"><?php echo get_comment_author_link() ?></span> |
					<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)) ?>"><?php printf(__('%1$s at %2$s', 'mh-elegance-lite'), get_comment_date(),  get_comment_time()) ?></a> |
					<?php if (comments_open() && $args['max_depth']!=$depth) { ?>
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					<?php } ?>
					<?php edit_comment_link(__('(Edit)', 'mh-elegance-lite'),'  ','') ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="comment-info"><?php _e('Your comment is awaiting moderation.', 'mh-elegance-lite') ?></div>
				<?php endif; ?>
				<div class="comment-text">
					<?php comment_text() ?>
				</div>
			</div><?php
	}
}

/***** Custom Comment Fields *****/

if (!function_exists('mh_elegance_lite_comment_fields')) {
	function mh_elegance_lite_comment_fields($fields) {
		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');
		$fields =  array(
			'author'	=>	'<p class="comment-form-author"><label for="author">' . __('Name ', 'mh-elegance-lite') . '</label>' . ($req ? '<span class="required">*</span>' : '') . '<br/><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
			'email' 	=>	'<p class="comment-form-email"><label for="email">' . __('Email ', 'mh-elegance-lite') . '</label>' . ($req ? '<span class="required">*</span>' : '' ) . '<br/><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
			'url' 		=>	'<p class="comment-form-url"><label for="url">' . __('Website', 'mh-elegance-lite') . '</label><br/><input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>'
		);
		return $fields;
	}
}
add_filter('comment_form_default_fields', 'mh_elegance_lite_comment_fields');

/***** Logo / Header Image Fallback *****/

if (!function_exists('mh_elegance_lite_logo')) {
	function mh_elegance_lite_logo() {
		$header_img = get_header_image();
		$header_title = get_bloginfo('name');
		$header_desc = get_bloginfo('description');
		if ($header_img || display_header_text()) {
			echo '<div class="logo" role="banner">' . "\n";
				echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr($header_title) . '" rel="home">' . "\n";
					if ($header_img) {
						echo '<img src="' . esc_url($header_img) . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt="' . esc_attr($header_title) . '" />' . "\n";
					}
					if (display_header_text()) {
						$text_color = get_header_textcolor();
						if ($text_color != get_theme_support('custom-header', 'default-text-color')) {
							echo '<style type="text/css" id="mh-header-css">';
								echo '.logo-name, .logo-desc { color: #' . esc_attr($text_color) . '; }';
							echo '</style>' . "\n";
						}
						echo '<div class="logo-text">' . "\n";
							if ($header_title) {
								echo '<h1 class="logo-name">' . esc_attr($header_title) . '</h1>' . "\n";
							}
							if ($header_desc) {
								echo '<h2 class="logo-desc">' . esc_attr($header_desc) . '</h2>' . "\n";
							}
						echo '</div>' . "\n";
					}
				echo '</a>' . "\n";
			echo '</div>' . "\n";
		}
	}
}

/***** Load Social Scripts *****/

if (!function_exists('mh_elegance_lite_social_scripts')) {
	function mh_elegance_lite_social_scripts() {
		if (is_active_widget('', '', 'mh_elegance_lite_facebook_widget')) {
			global $locale;
			echo "<div id='fb-root'></div><script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/" . $locale . "/all.js#xfbml=1'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>" . "\n";
		}
	}
}
add_action('wp_footer', 'mh_elegance_lite_social_scripts');

/***** Add CSS3 Media Queries Support for older versions of IE *****/

function mh_elegance_lite_ie_media_queries() {
	echo '<!--[if lt IE 9]>' . "\n";
	echo '<script src="' . get_template_directory_uri() . '/js/css3-mediaqueries.js"></script>' . "\n";
	echo '<![endif]-->' . "\n";
}
add_action('wp_head', 'mh_elegance_lite_ie_media_queries');

?>