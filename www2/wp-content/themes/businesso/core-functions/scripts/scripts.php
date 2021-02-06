<?php
function asiathemes_scripts()
{
 /*--------Css----------*/
 
		$businesso_custom_css = wp_parse_args(  get_option( 'businesso_option', array() ) );
		$custom_css= esc_attr($businesso_custom_css['businesso_custom_css']);
		
		wp_enqueue_style('businesso-style', get_stylesheet_uri());
		wp_add_inline_style( 'businesso-style', $custom_css );
        wp_enqueue_style('businesso-bootstrap',ASIATHEMES_TEMPLATE_DIR_URI.'/css/bootstrap.css');
		wp_enqueue_style('businesso-media-responsive', ASIATHEMES_TEMPLATE_DIR_URI.'/css/media-responsive.css');
		wp_enqueue_style('businesso-photobox', ASIATHEMES_TEMPLATE_DIR_URI.'/css/photobox.css');
		wp_enqueue_style('businesso-animate.min', ASIATHEMES_TEMPLATE_DIR_URI.'/css/animate.min.css');
		wp_enqueue_style('businesso-animate.min', ASIATHEMES_TEMPLATE_DIR_URI.'/css/animate.css');
		wp_enqueue_style('businesso-animations.min', ASIATHEMES_TEMPLATE_DIR_URI.'/css/animations.min.css');
		wp_enqueue_style('businesso-animations', ASIATHEMES_TEMPLATE_DIR_URI.'/css/animations.css');
		wp_enqueue_style('businesso-fonts', ASIATHEMES_TEMPLATE_DIR_URI.'/css/font/font.css');
		wp_enqueue_style('businesso-google-fonts-style', '//fonts.googleapis.com/css?family=Bitter:400,600,700,800,300|Fira Sans:300,400,500,700,400italic,300italic');
		wp_enqueue_style('businesso-font-awesome.min', ASIATHEMES_TEMPLATE_DIR_URI.'/css/font-awesome-4.4.0/css/font-awesome.min.css');	
		
		/* Js */ 
		wp_enqueue_script('businesso-jquery-1.11.0', ASIATHEMES_TEMPLATE_DIR_URI.'/js/jquery-1.11.0.js');
		wp_enqueue_script('businesso-bootstrap',ASIATHEMES_TEMPLATE_DIR_URI.'/js/bootstrap.js');	
		wp_enqueue_script('businesso-menu',ASIATHEMES_TEMPLATE_DIR_URI.'/js/menu.js');
		wp_enqueue_script('businesso-carousel',ASIATHEMES_TEMPLATE_DIR_URI.'/js/carousel.js');
		wp_enqueue_script('businesso-animations',ASIATHEMES_TEMPLATE_DIR_URI.'/js/animations.js');
		 wp_enqueue_script('businesso-animations.min',ASIATHEMES_TEMPLATE_DIR_URI.'/js/animations.min.js');
		 wp_enqueue_script('businesso-jquery.photobox',ASIATHEMES_TEMPLATE_DIR_URI.'/js/jquery.photobox.js');
		wp_enqueue_script('businesso-page-scroll', ASIATHEMES_TEMPLATE_DIR_URI.'/js/page-scroll.js');
		
		if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}

}
add_action('wp_enqueue_scripts', 'asiathemes_scripts');

?>