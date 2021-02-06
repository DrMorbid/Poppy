<?php

/***** MH News Widget *****/

class mh_elegance_lite_news_widget extends WP_Widget {
    function __construct() {
		parent::__construct(
			'mh_news_widget', esc_html_x('MH News Widget (Front Page)', 'widget name', 'mh-elegance-lite'),
			array('classname' => 'mh_news_widget', 'description' => esc_html__('Widget to display news from blog.', 'mh-elegance-lite'))
		);
	}
    function widget($args, $instance) {
        extract($args);
        global $post;
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $category = isset($instance['category']) ? $instance['category'] : '';
        $offset = empty($instance['offset']) ? '' : $instance['offset'];

        if ($category) {
        	$cat_url = get_category_link($category);
	        $before_title = '<a href="' . esc_url($cat_url) . '" class="widget-title-link">';
	        $after_title = '</a>';
        } else {
	      	$before_title = '';
	        $after_title = '';
        }

        echo $before_widget;
        if (!empty( $title)) { echo '<div class="separator"><h4 class="widget-title section-title">' . $before_title . esc_attr($title) . $after_title . '</h4></div>'; } ?>
        <ul class="latest-news-widget row clearfix"><?php
		$args = array('posts_per_page' => '3', 'offset' => $offset, 'cat' => $category, 'ignore_sticky_posts' => 1);
		$widget_loop = new WP_Query($args);
		while ($widget_loop->have_posts()) : $widget_loop->the_post(); ?>
			<li class="news-item mh-col-1-3">
				<h3 class="news-item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<div class="news-item-excerpt"><?php the_excerpt(); ?></div>
				<a class="news-item-more button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e('Read more', 'mh-elegance-lite'); ?></a>
			</li><?php
		endwhile;
		wp_reset_postdata(); ?>
        </ul><?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['category'] = absint($new_instance['category']);
        $instance['offset'] = absint($new_instance['offset']);
        return $instance;
    }
    function form($instance) {
        $defaults = array('title' => '', 'category' => '', 'offset' => '0');
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mh-elegance-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Select a Category:', 'mh-elegance-lite'); ?></label>
			<select id="<?php echo $this->get_field_id('category'); ?>" class="widefat" name="<?php echo $this->get_field_name('category'); ?>">
				<option value="0" <?php if (!$instance['category']) echo 'selected="selected"'; ?>><?php _e('All', 'mh-elegance-lite'); ?></option>
				<?php
				$categories = get_categories(array('type' => 'post'));
				foreach($categories as $cat) {
					echo '<option value="' . $cat->cat_ID . '"';
					if ($cat->cat_ID == $instance['category']) { echo ' selected="selected"'; }
					echo '>' . $cat->cat_name . ' (' . $cat->category_count . ')';
					echo '</option>';
				}
				?>
			</select>
		</p>
	    <p>
        	<label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Skip Posts (Offset):', 'mh-elegance-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['offset']); ?>" name="<?php echo $this->get_field_name('offset'); ?>" id="<?php echo $this->get_field_id('offset'); ?>" />
	    </p>
	    <p>
    		<strong>Info:</strong> <?php _e('This is the lite version of this widget with only basic features. If you need more features and options, you can upgrade to the premium version of this theme.', 'mh-elegance-lite'); ?>
    	</p><?php
    }
}

?>