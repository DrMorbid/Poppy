<?php

/***** Fetch Options *****/

$mh_elegance_lite_options = get_option('mh_elegance_lite_options');

/***** Custom Hooks *****/

function mh_elegance_lite_before_page_content() {
    do_action('mh_elegance_lite_before_page_content');
}

/***** Theme Setup *****/

if (!function_exists('mh_elegance_lite_themes_setup')) {
	function mh_elegance_lite_themes_setup() {
		add_theme_support('custom-header', array('default-image' => get_template_directory_uri() . '/images/logo.png', 'default-text-color' => 'fff', 'width' => 120, 'height' => 120, 'flex-width' => true, 'flex-height' => true));
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('custom-background', array('default-color' => '#252336'));
		add_theme_support('post-thumbnails');
		add_image_size('blog', 440, 280, true);
		add_image_size('blog-single', 690, 440, true);
		add_filter('use_default_gallery_style', '__return_false');
		add_filter('widget_text', 'do_shortcode');
		register_nav_menus(array('main_nav' => __('Main Navigation', 'mh-elegance-lite')));
		load_theme_textdomain('mh-elegance-lite', get_template_directory() . '/languages');
	}
}
add_action('after_setup_theme', 'mh_elegance_lite_themes_setup');

/***** Set Content Width *****/

if (!function_exists('mh_elegance_lite_content_width')) {
	function mh_elegance_lite_content_width() {
		global $content_width;
		if (!isset($content_width)) {
			if (is_page_template('page-full.php')) {
				$content_width = 980;
			} else {
				$content_width = 690;
			}
		}
	}
}
add_action('template_redirect', 'mh_elegance_lite_content_width');

/***** Load CSS & JavaScript *****/

if (!function_exists('mh_elegance_lite_scripts')) {
	function mh_elegance_lite_scripts() {
		wp_enqueue_style('mh-google-fonts', "https://fonts.googleapis.com/css?family=Prata|Open+Sans:300,400,400italic,600,700", array(), null);
		wp_enqueue_style('mh-font-awesome', get_template_directory_uri() . '/includes/font-awesome.min.css', array(), null);
		wp_enqueue_style('mh-style', get_stylesheet_uri(), false, '1.2.1');
		wp_enqueue_script('mh-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
		if (!is_admin()) {
			if (is_singular() && comments_open() && (get_option('thread_comments') == 1))
				wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'mh_elegance_lite_scripts');

if (!function_exists('mh_elegance_lite_admin_scripts')) {
	function mh_elegance_lite_admin_scripts($hook) {
		if ('appearance_page_elegance' === $hook || 'widgets.php' === $hook) {
			wp_enqueue_style('mh-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'mh_elegance_lite_admin_scripts');

/***** Register Widget Areas / Sidebars	*****/

if (!function_exists('mh_elegance_lite_widgets_init')) {
	function mh_elegance_lite_widgets_init() {
		register_sidebar(array('name' => __('Sidebar', 'mh-elegance-lite'), 'id' => 'sidebar', 'description' => __('Sidebar on Posts/Pages.', 'mh-elegance-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<div class="separator"><h4 class="widget-title section-title">', 'after_title' => '</h4></div>'));
		register_sidebar(array('name' => sprintf(_x('Home %d', 'widget area name', 'mh-elegance-lite'), 1), 'id' => 'home-1', 'description' => __('Widget Area on Front Page above Content.', 'mh-elegance-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<div class="separator"><h4 class="widget-title section-title">', 'after_title' => '</h4></div>'));
		register_sidebar(array('name' => sprintf(_x('Home %d', 'widget area name', 'mh-elegance-lite'), 2), 'id' => 'home-2', 'description' => __('Widget Area on Front Page below Content.', 'mh-elegance-lite'), 'before_widget' => '<div id="%1$s" class="sb-widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<div class="separator"><h4 class="widget-title section-title">', 'after_title' => '</h4></div>'));
	}
}
add_action('widgets_init', 'mh_elegance_lite_widgets_init');

/***** Include Several Functions *****/

require_once('includes/mh-customizer.php');
require_once('includes/mh-custom-functions.php');
require_once('includes/mh-widgets.php');

if (is_admin()) {
	require_once('admin/admin.php');
}

?>