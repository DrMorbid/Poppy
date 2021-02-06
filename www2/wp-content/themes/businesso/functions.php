<?php
/*
	*Theme Name	: Businesso
	*Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('ASIATHEMES_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('ASIATHEMES_TEMPLATE_DIR',get_template_directory());
	define('ASIATHEMES_THEME_FUNCTIONS_PATH',ASIATHEMES_TEMPLATE_DIR.'/core-functions');
	define('ASIATHEMES_THEME_OPTIONS_PATH' , ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel');
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' ); // for Default Menus
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/menu/asiathemes_nav_walker.php' ); // for Custom Menus		
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/scripts/scripts.php' );
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/comment-section/comment-function.php' ); //for comments sections
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/widgets/register-sidebar.php' ); //for widget register
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/pagination/asiathemes_pagination.php'); // Paggination
	
	//Customizer
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');
	require_once('asia_breadcrumbs.php');

add_action( 'after_setup_theme', 'asiathemes_setup' ); 	
		function asiathemes_setup()
		{	// Load text domain for translation-ready
			load_theme_textdomain( 'businesso', ASIATHEMES_THEME_FUNCTIONS_PATH . '/lang' );
			add_theme_support( 'title-tag' );
			
			$header_args = array(
				 'flex-height' => true,
				 'height' => 100,
				 'flex-width' => true,
				 'width' => 1200,
				 'admin-head-callback' => 'mytheme_admin_header_style',
				 );
				 
				 add_theme_support( 'custom-header', $header_args );
			// This theme uses wp_nav_menu() in one location.
			add_theme_support('post-thumbnails');
			// This theme uses wp_nav_menu() in one location.
			register_nav_menu( 'primary', __( 'Primary Menu', 'businesso' ) );
			// theme Background support
			add_theme_support( 'custom-background');
			add_theme_support( 'automatic-feed-links');
			//Default Data
			if ( ! isset( $content_width ) ) $content_width = 900;
			require_once('theme_default_data.php');
			$businesso_option=theme_default_data();
			require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/option-panel/businesso-option-setting.php' ); // for Option Panel 
			
}
			/****--- Navigation for Author, Category , Tag , Archive ---***/
				function asiathemes_navigation() {
				echo '<div class="blog-pagination animate" data-anim-type="fadeInLeft">';
				 posts_nav_link(' &#183; ', 'previous page', 'next page');
				echo '</div>'; }
			
			// Wordpress Editor style
			function asiathemes_add_editor_styles() {
				add_editor_style( 'custom-editor-style.css' );
			}
			add_action( 'admin_init', 'asiathemes_add_editor_styles' );
	
			require('template-tags.php');
?>