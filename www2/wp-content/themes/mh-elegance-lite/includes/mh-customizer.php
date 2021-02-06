<?php

function mh_elegance_lite_customize_register($wp_customize) {

	/***** Register Custom Controls *****/

	class MH_Elegance_Lite_Upgrade extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="mh-upgrade-thumb">
        		<img src="<?php echo get_template_directory_uri(); ?>/images/mh_elegance.png" />
        	</p>
        	<p class="customize-control-title mh-upgrade-title">
        		<?php esc_html_e('MH Elegance Pro', 'mh-elegance-lite'); ?>
        	</p>
        	<p class="textfield mh-upgrade-text">
        		<?php esc_html_e('If you like the free version of this theme, you will LOVE the full version of MH Elegance which includes unique custom widgets, additional features and more useful options to customize your website.', 'mh-elegance-lite'); ?>
			</p>
			<p class="customize-control-title mh-upgrade-title">
        		<?php esc_html_e('Additional Features:', 'mh-elegance-lite'); ?>
        	</p>
        	<ul class="mh-upgrade-features">
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Options to modify color scheme', 'mh-elegance-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Typography options', 'mh-elegance-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Several additional widget areas', 'mh-elegance-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Additional custom widgets', 'mh-elegance-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Additional custom menu slots', 'mh-elegance-lite'); ?>
	        	</li>
	        	<li class="mh-upgrade-feature-item">
	        		<?php esc_html_e('Social buttons, and more...', 'mh-elegance-lite'); ?>
	        	</li>
        	</ul>
			<p class="mh-upgrade-button">
				<a href="http://www.mhthemes.com/themes/mh/elegance/" target="_blank" class="button button-secondary">
					<?php esc_html_e('Learn more about MH Elegance', 'mh-elegance-lite'); ?>
				</a>
			</p><?php
        }
    }

	/***** Add Panels *****/

	$wp_customize->add_panel('mh_theme_options', array('title' => esc_html__('Theme Options', 'mh-elegance-lite'), 'description' => '', 'capability' => 'edit_theme_options', 'theme_supports' => '', 'priority' => 1,));

	/***** Add Sections *****/

	$wp_customize->add_section('mh_elegance_lite_general', array('title' => esc_html__('General', 'mh-elegance-lite'), 'priority' => 1, 'panel' => 'mh_theme_options'));
	$wp_customize->add_section('mh_elegance_lite_upgrade', array('title' => esc_html__('More Features', 'mh-elegance-lite'), 'priority' => 2, 'panel' => 'mh_theme_options'));

    /***** Add Settings *****/

    $wp_customize->add_setting('mh_elegance_lite_options[excerpt_length]', array('default' => 50, 'type' => 'option', 'sanitize_callback' => 'mh_elegance_lite_sanitize_integer'));
    $wp_customize->add_setting('mh_elegance_lite_options[excerpt_more]', array('default' => esc_html__('Read More', 'mh-elegance-lite'), 'type' => 'option', 'sanitize_callback' => 'mh_elegance_lite_sanitize_text'));
	$wp_customize->add_setting('mh_elegance_lite_options[premium_version_upgrade]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));

    /***** Add Controls *****/

    $wp_customize->add_control('excerpt_length', array('label' => esc_html__('Custom Excerpt Length in Words', 'mh-elegance-lite'), 'section' => 'mh_elegance_lite_general', 'settings' => 'mh_elegance_lite_options[excerpt_length]', 'priority' => 1, 'type' => 'text'));
    $wp_customize->add_control('excerpt_more', array('label' => esc_html__('Custom Excerpt More-Text', 'mh-elegance-lite'), 'section' => 'mh_elegance_lite_general', 'settings' => 'mh_elegance_lite_options[excerpt_more]', 'priority' => 2, 'type' => 'text'));
	$wp_customize->add_control(new MH_Elegance_Lite_Upgrade($wp_customize, 'premium_version_upgrade', array('section' => 'mh_elegance_lite_upgrade', 'settings' => 'mh_elegance_lite_options[premium_version_upgrade]', 'priority' => 1)));
}
add_action('customize_register', 'mh_elegance_lite_customize_register');

/***** Data Sanitization *****/

function mh_elegance_lite_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}
function mh_elegance_lite_sanitize_integer($input) {
    return strip_tags(intval($input));
}

/***** Return Theme Options / Set Default Options *****/

if (!function_exists('mh_elegance_lite_theme_options')) {
	function mh_elegance_lite_theme_options() {
		$theme_options = wp_parse_args(
			get_option('mh_elegance_lite_options', array()),
			mh_elegance_lite_default_options()
		);
		return $theme_options;
	}
}

if (!function_exists('mh_elegance_lite_default_options')) {
	function mh_elegance_lite_default_options() {
		$default_options = array(
			'excerpt_length' => 50,
			'excerpt_more' => esc_html__('Read More', 'mh-elegance-lite')
		);
		return $default_options;
	}
}

/***** Enqueue Customizer CSS *****/

function mh_elegance_lite_customizer_css() {
	wp_enqueue_style('mh-customizer', get_template_directory_uri() . '/admin/customizer.css', array());
}
add_action('customize_controls_print_styles', 'mh_elegance_lite_customizer_css');

/***** Enqueue Customizer JS *****/

function mh_elegance_lite_customizer_js() {
	wp_enqueue_script('mh-customizer', get_template_directory_uri() . '/js/mh-customizer.js', array(), '1.0.0', true);
	wp_localize_script('mh-customizer', 'mh_elegance_lite_links', array(
		'upgradeURL' => esc_url('http://www.mhthemes.com/themes/mh/elegance/'),
		'upgradeLabel' => esc_html__('Upgrade to MH Elegance Pro', 'mh-elegance-lite'),
		'title'	=> esc_html__('Theme Related Links:', 'mh-elegance-lite'),
		'themeURL' => esc_url('http://www.mhthemes.com/themes/mh/elegance-lite/'),
		'themeLabel' => esc_html__('Theme Info Page', 'mh-elegance-lite'),
		'docsURL' => esc_url('http://www.mhthemes.com/support/documentation-mh-elegance/'),
		'docsLabel'	=> esc_html__('Theme Documentation', 'mh-elegance-lite'),
		'supportURL' => esc_url('https://wordpress.org/support/theme/mh-elegance-lite'),
		'supportLabel' => esc_html__('Support Forum', 'mh-elegance-lite'),
		'rateURL' => esc_url('https://wordpress.org/support/view/theme-reviews/mh-elegance-lite?filter=5'),
		'rateLabel'	=> esc_html__('Rate this theme', 'mh-elegance-lite'),
	));
}
add_action('customize_controls_enqueue_scripts', 'mh_elegance_lite_customizer_js');


/***** CSS Output *****/

function mh_elegance_lite_custom_css() {
	$background_color = get_background_color();
	if ($background_color != '252336') : ?>
		<style type="text/css">
			<?php if ($background_color != '252336') { ?>
    			footer { background: <?php echo '#' . $background_color; ?>; }
			<?php } ?>
		</style><?php
	endif;
}
add_action('wp_head', 'mh_elegance_lite_custom_css');

?>